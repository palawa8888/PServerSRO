<?php


namespace PServerSRO\Service;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

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

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return AdminSMCLog
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, AdminSMCLog::class);
    }

}