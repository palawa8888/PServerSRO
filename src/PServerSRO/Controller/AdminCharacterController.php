<?php


namespace PServerSRO\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use ZfcDatagrid\Column;

class AdminCharacterController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout('layout/admin');

        /* @var $grid \ZfcDatagrid\Datagrid */
        $grid = $this->getServiceLocator()->get('ZfcDatagrid\Datagrid');
        $grid->setTitle('character-panel grid');
        $grid->setDataSource($this->getAdminCharacterService()->getCharacterQueryBuilder());
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
        $col = new Column\Select('nickName', 'p');
        $col->setLabel('NickName');
        $grid->addColumn($col);
        $col = new Column\Select('level', 'p');
        $col->setLabel('Level');
        $grid->addColumn($col);

        $grid->render();

        return $grid->getResponse();
    }

    /**
     * @return \PServerSRO\Service\AdminCharacter
     */
    protected function getAdminCharacterService()
    {
        return $this->getServiceLocator()->get('pserversro_admin_character_service');
    }
}