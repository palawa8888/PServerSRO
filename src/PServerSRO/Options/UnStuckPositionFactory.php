<?php


namespace PServerSRO\Options;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UnStuckPositionFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return UnStuckPositionOptions
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new UnStuckPositionOptions($container->get('config')['p-server-sro']['un_stuck_position']);
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return UnStuckPositionOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, UnStuckPositionOptions::class);
    }

}