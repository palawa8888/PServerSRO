<?php


namespace PServerSRO\View\Helper;


use PServerCore\Service\CachingHelper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FortressFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface|ServiceLocatorAwareInterface $serviceLocator
     * @return Fortress
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceLocator = $serviceLocator->getServiceLocator();

        return new Fortress(
            $serviceLocator->get(CachingHelper::class),
            $serviceLocator->get('gamebackend_dataservice')
        );
    }

}