<?php


namespace PServerSRO\Service;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminCharacterFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AdminCharacter
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AdminCharacter(
            $container->get('doctrine.entitymanager.orm_sro_shard'),
            $container->get('gamebackend_sro_options')
        );
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return AdminCharacter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, AdminCharacter::class);
    }

}