<?php


namespace PServerSRO\Service;


use PServerPanel\Service\Character;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UnStuckFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return UnStuck
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @noinspection PhpParamsInspection */
        return new UnStuck(
            $serviceLocator->get('gamebackend_dataservice'),
            $serviceLocator->get('pserversro_unstuck_options'),
            $serviceLocator->get(Character::class),
            $serviceLocator->get('doctrine.entitymanager.orm_sro_shard')
        );
    }

}