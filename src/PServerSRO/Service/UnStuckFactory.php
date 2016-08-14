<?php


namespace PServerSRO\Service;


use Interop\Container\ContainerInterface;
use PServerPanel\Service\Character;
use Zend\ServiceManager\Factory\FactoryInterface;

class UnStuckFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return UnStuck
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new UnStuck(
            $container->get('gamebackend_dataservice'),
            $container->get('pserversro_unstuck_options'),
            $container->get(Character::class),
            $container->get('doctrine.entitymanager.orm_sro_shard')
        );
    }

}