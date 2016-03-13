<?php


namespace PServerSRO\Controller;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminCharacterFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface|AbstractPluginManager $serviceLocator
     *
     * @return AdminCharacterController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \ZfcDatagrid\Datagrid $dataGridService */
        $dataGridService = $serviceLocator->getServiceLocator()->get('ZfcDatagrid\Datagrid');

        /** @var \PServerSRO\Service\AdminCharacter $adminCharacterService */
        $adminCharacterService = $serviceLocator->getServiceLocator()->get('pserversro_admin_character_service');

        return new AdminCharacterController($dataGridService, $adminCharacterService);
    }
}