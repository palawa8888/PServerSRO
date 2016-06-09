<?php


namespace PServerSRO\Options;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UnStuckPositionFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return UnStuckPositionOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new UnStuckPositionOptions($serviceLocator->get('config')['p-server-sro']['un_stuck_position']);
    }

}