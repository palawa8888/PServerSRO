<?php

namespace PServerSRO\Controller;

use ZfcDatagrid\Datagrid;
use PServerSRO\Service\AdminJobNameHistory;
use PServerAdmin\ZfcDataGrid\Column\Type\DateTime as AdminDateTime;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Renderer\RendererInterface;
use ZfcDatagrid\Column;

class AdminJobNameHistoryController extends AbstractActionController
{
    /** @var  Datagrid */
    protected $dataGridService;
    /** @var  AdminJobNameHistory */
    protected $adminJobNameHistory;
    /** @var  RendererInterface */
    protected $viewRenderer;

    /**
     * AdminJobNameHistoryController constructor.
     * @param Datagrid $dataGridService
     * @param AdminJobNameHistory $adminJobNameHistory
     * @param RendererInterface $renderer
     */
    public function __construct(Datagrid $dataGridService, AdminJobNameHistory $adminJobNameHistory, RendererInterface $renderer)
    {
        $this->dataGridService = $dataGridService;
        $this->adminJobNameHistory = $adminJobNameHistory;
        $this->viewRenderer = $renderer;
    }

    /**
     * @return \Zend\Http\Response\Stream|\Zend\Stdlib\ResponseInterface|\Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $this->layout('layout/admin');

        /* @var $grid Datagrid */
        $grid = $this->dataGridService;
        $grid->setTitle('JobNameHistory grid');
        $grid->setDataSource($this->adminJobNameHistory->getNickNameQueryBuilder());
        $grid->setToolbarTemplate(null);

        $col = new Column\Select('id', 'char');
        $col->setLabel('#');
        $grid->addColumn($col);
        $col = new Column\Select('jid', 'user');
        $col->setLabel('BackendId');
        $col->addFormatter(
            new Column\Formatter\GenerateLink(
                $this->viewRenderer,
                'PServerAdmin/user_detail',
                'usrId',
                ['action' => 'backend']
            )
        );
        $grid->addColumn($col);
        $col = new Column\Select('nickName', 'p');
        $col->setLabel('History-NickName');
        $grid->addColumn($col);
        $col = new Column\Select('charName', 'char');
        $col->setLabel('CharName');
        $grid->addColumn($col);
        $col = new Column\Select('deleted', 'char');
        $col->setReplaceValues([0 => 'no', 1 => 'yes']);
        $col->setLabel('Deleted');
        $grid->addColumn($col);
        $col = new Column\Select('jobType', 'job');
        $col->setReplaceValues([0 => 'none', 1 => 'Trader', 2 => 'Thief', 3 => 'Hunter']);
        $col->setLabel('JobType');
        $grid->addColumn($col);
        $col = new Column\Select('level', 'job');
        $col->setLabel('JobLevel');
        $grid->addColumn($col);
        $col = new Column\Select('level', 'char');
        $col->setLabel('Level');
        $grid->addColumn($col);
        $col = new Column\Select('lastLogout', 'char');
        $col->setLabel('LastLogout');
        $col->setType(new AdminDateTime());
        $grid->addColumn($col);

        return $grid->getResponse();
    }
}