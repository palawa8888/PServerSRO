<?php


namespace PServerSRO\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminSMCLogFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AdminSMCLogController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var \ZfcDatagrid\Datagrid $dataGridService */
        $dataGridService = $container->get('ZfcDatagrid\Datagrid');

        /** @var \PServerSRO\Service\AdminSMCLog $adminSMCLog */
        $adminSMCLog = $container->get('pserversro_admin_smc_log_service');

        return new AdminSMCLogController($dataGridService, $adminSMCLog);
    }

    /**
     * @param ServiceLocatorInterface|AbstractPluginManager $serviceLocator
     *
     * @return AdminSMCLogController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator->getServiceLocator(), AdminSMCLogController::class);
    }
}