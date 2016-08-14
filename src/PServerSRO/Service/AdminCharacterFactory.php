<?php


namespace PServerSRO\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

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

}