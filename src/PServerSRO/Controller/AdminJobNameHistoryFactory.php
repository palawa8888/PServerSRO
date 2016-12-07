<?php

namespace PServerSRO\Controller;

use Interop\Container\ContainerInterface;
use PServerSRO\Service\AdminJobNameHistory;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\View\Renderer\PhpRenderer;
use ZfcDatagrid\Datagrid;

class AdminJobNameHistoryFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AdminJobNameHistoryController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AdminJobNameHistoryController(
            $container->get(Datagrid::class),
            $container->get(AdminJobNameHistory::class),
            $container->get(PhpRenderer::class)
        );
    }

}