<?php


namespace PServerSRO\Service;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminCharacterFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return AdminCharacter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @noinspection PhpParamsInspection */
        return new AdminCharacter(
            $serviceLocator->get('doctrine.entitymanager.orm_sro_shard'),
            $serviceLocator->get('gamebackend_sro_options')
        );
    }

}