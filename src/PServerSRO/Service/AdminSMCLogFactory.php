<?php


namespace PServerSRO\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AdminSMCLogFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AdminSMCLog
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AdminSMCLog(
            $container->get('doctrine.entitymanager.orm_sro_account'),
            $container->get('gamebackend_sro_options')
        );
    }

}