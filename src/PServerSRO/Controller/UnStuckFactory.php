<?php


namespace PServerSRO\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class UnStuckFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return UnStuckController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var \PServerSRO\Service\UnStuck $unStuckService */
        $unStuckService = $container->get('pserversro_unstuck_service');
        /** @var \PServerCore\Service\User $userService */
        $userService = $container->get('small_user_service');

        return new UnStuckController($unStuckService, $userService);
    }

}