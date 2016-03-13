<?php


namespace PServerSRO\Controller;

use ZfcDatagrid\Datagrid;
use PServerSRO\Service\AdminSMCLog;
use PServerAdmin\ZfcDataGrid\Column\Type\DateTime as AdminDateTime;
use Zend\Mvc\Controller\AbstractActionController;
use ZfcDatagrid\Column;

class AdminSMCLogController extends AbstractActionController
{
    /** @var  Datagrid */
    protected $dataGridService;

    /** @var  AdminSMCLog */
    protected $adminSMCLog;

    /**
     * AdminSMCLogController constructor.
     * @param Datagrid $dataGridService
     * @param AdminSMCLog $adminSMCLog
     */
    public function __construct(Datagrid $dataGridService, AdminSMCLog $adminSMCLog)
    {
        $this->dataGridService = $dataGridService;
        $this->adminSMCLog = $adminSMCLog;
    }

    /**
     * @return \Zend\Http\Response\Stream|\Zend\Stdlib\ResponseInterface|\Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $this->layout('layout/admin');

        /* @var $grid \ZfcDatagrid\Datagrid */
        $grid = $this->dataGridService;
        $grid->setTitle('smc-log grid');
        $grid->setDataSource($this->adminSMCLog->getCharacterQueryBuilder());
        $grid->setToolbarTemplate(null);

        $col = new Column\Select('szuserid', 'p');
        $col->setLabel('UserName');
        $grid->addColumn($col);
        $col = new Column\Select('catagory', 'p');
        $col->setLabel('Category');
        $grid->addColumn($col);
        $col = new Column\Select('szlog', 'p');
        $col->setLabel('Log');
        $grid->addColumn($col);
        $col = new Column\Select('dlogdate', 'p');
        $col->setLabel('LogDate');
        $col->setType(new AdminDateTime());
        $grid->addColumn($col);

        $grid->render();

        return $grid->getResponse();
    }


}