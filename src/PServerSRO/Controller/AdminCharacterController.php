<?php


namespace PServerSRO\Controller;

use ZfcDatagrid\Datagrid;
use PServerSRO\Service\AdminCharacter;
use PServerAdmin\ZfcDataGrid\Column\Type\DateTime as AdminDateTime;
use Zend\Mvc\Controller\AbstractActionController;
use ZfcDatagrid\Column;

class AdminCharacterController extends AbstractActionController
{
    /** @var  Datagrid */
    protected $dataGridService;

    /** @var  AdminCharacter */
    protected $adminCharacterService;

    /**
     * AdminCharacterController constructor.
     * @param Datagrid $dataGridService
     * @param AdminCharacter $adminCharacterService
     */
    public function __construct(Datagrid $dataGridService, AdminCharacter $adminCharacterService)
    {
        $this->dataGridService = $dataGridService;
        $this->adminCharacterService = $adminCharacterService;
    }

    /**
     * @return \Zend\Http\Response\Stream|\Zend\Stdlib\ResponseInterface|\Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $this->layout('layout/admin');

        $grid = $this->dataGridService;
        $grid->setTitle('character-panel grid');
        $grid->setDataSource($this->adminCharacterService->getCharacterQueryBuilder());
        $grid->setToolbarTemplate(null);

        $col = new Column\Select('id', 'p');
        $col->setLabel('#');
        $grid->addColumn($col);
        $col = new Column\Select('jid', 'user');
        $col->setLabel('BackendId');
        $col->addFormatter(
            new Column\Formatter\GenerateLink(
                $this->getServiceLocator(),
                'PServerAdmin/user_detail',
                'usrId',
                ['action' => 'backend']
            )
        );
        $grid->addColumn($col);
        $col = new Column\Select('charName', 'p');
        $col->setLabel('CharName');
        $grid->addColumn($col);
        $col = new Column\Select('deleted', 'p');
        $col->setReplaceValues([0 => 'no', 1 => 'yes']);
        $col->setLabel('Deleted');
        $grid->addColumn($col);
        $col = new Column\Select('nickName', 'p');
        $col->setLabel('NickName');
        $grid->addColumn($col);
        $col = new Column\Select('name', 'guild');
        $col->setLabel('GuildName');
        $grid->addColumn($col);
        $col = new Column\Select('jobType', 'job');
        $col->setReplaceValues([0 => 'none', 1 => 'Trader', 2 => 'Thief', 3 => 'Hunter']);
        $col->setLabel('JobType');
        $grid->addColumn($col);
        $col = new Column\Select('level', 'job');
        $col->setLabel('Level');
        $grid->addColumn($col);
        $col = new Column\Select('level', 'p');
        $col->setLabel('Level');
        $grid->addColumn($col);
        $col = new Column\Select('lastLogout', 'p');
        $col->setLabel('LastLogout');
        $col->setType(new AdminDateTime());
        $grid->addColumn($col);

        $grid->render();

        return $grid->getResponse();
    }


}