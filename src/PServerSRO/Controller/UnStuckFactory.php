<?php


namespace PServerSRO\Controller;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UnStuckFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface|AbstractPluginManager $serviceLocator
     *
     * @return UnStuckController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \PServerSRO\Service\UnStuck $unStuckService */
        $unStuckService = $serviceLocator->getServiceLocator()->get('pserversro_unstuck_service');
        /** @var \PServerCore\Service\User $userService */
        $userService = $serviceLocator->getServiceLocator()->get('small_user_service');

        return new UnStuckController($unStuckService, $userService);
    }
}