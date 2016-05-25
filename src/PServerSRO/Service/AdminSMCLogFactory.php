<?php


namespace PServerSRO\Service;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdminSMCLogFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return AdminSMCLog
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @noinspection PhpParamsInspection */
        return new AdminSMCLog(
            $serviceLocator->get('doctrine.entitymanager.orm_sro_account'),
            $serviceLocator->get('gamebackend_sro_options')
        );
    }

}