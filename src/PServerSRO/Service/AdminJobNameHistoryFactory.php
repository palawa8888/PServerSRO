<?php

namespace PServerSRO\Service;

use GameBackend\Options\SroOptions;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AdminJobNameHistoryFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AdminJobNameHistory
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AdminJobNameHistory(
            $container->get('doctrine.entitymanager.orm_sro_shard'),
            $container->get(SroOptions::class)
        );
    }

}