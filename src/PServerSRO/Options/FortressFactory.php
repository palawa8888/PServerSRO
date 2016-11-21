<?php

namespace PServerSRO\Options;

use Interop\Container\ContainerInterface;
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
        return new Fortress($container->get('config')['p-server-sro']['fortress']);
    }

}