<?php


namespace PServerSRO\Controller;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminSMCLogFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface|AbstractPluginManager $serviceLocator
     *
     * @return AdminSMCLogController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \ZfcDatagrid\Datagrid $dataGridService */
        $dataGridService = $serviceLocator->getServiceLocator()->get('ZfcDatagrid\Datagrid');

        /** @var \PServerSRO\Service\AdminSMCLog $adminSMCLog */
        $adminSMCLog = $serviceLocator->getServiceLocator()->get('pserversro_admin_smc_log_service');


        return new AdminSMCLogController($dataGridService, $adminSMCLog);
    }
}