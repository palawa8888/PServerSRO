<?php


namespace PServerSRO\View\Helper;

use Interop\Container\ContainerInterface;
use PServerCore\Service\CachingHelper;
use Zend\ServiceManager\Factory\FactoryInterface;

class FortressFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Fortress
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Fortress(
            $container->get(CachingHelper::class),
            $container->get('gamebackend_dataservice')
        );
    }

}