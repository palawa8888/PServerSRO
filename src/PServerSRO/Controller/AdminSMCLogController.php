<?php


namespace PServerSRO\Controller;


use PServerAdmin\ZfcDataGrid\Column\Type\DateTime as AdminDateTime;
use Zend\Mvc\Controller\AbstractActionController;
use ZfcDatagrid\Column;

class AdminSMCLogController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout('layout/admin');

        /* @var $grid \ZfcDatagrid\Datagrid */
        $grid = $this->getServiceLocator()->get('ZfcDatagrid\Datagrid');
        $grid->setTitle('smc-log grid');
        $grid->setDataSource($this->getAdminCharacterService()->getCharacterQueryBuilder());
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

    /**
     * @return \PServerSRO\Service\AdminSMCLog
     */
    protected function getAdminCharacterService()
    {
        return $this->getServiceLocator()->get('pserversro_admin_smc_log_service');
    }
}