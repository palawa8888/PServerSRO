<?php

namespace PServerSRO\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use ZfcDatagrid\Datagrid;

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
        $dataGridService = $container->get(Datagrid::class);

        /** @var \PServerSRO\Service\AdminSMCLog $adminSMCLog */
        $adminSMCLog = $container->get('pserversro_admin_smc_log_service');

        return new AdminSMCLogController($dataGridService, $adminSMCLog);
    }

}