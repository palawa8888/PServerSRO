<?php


namespace PServerSRO\Service;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RankingJobFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return RankingJob
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RankingJob($container->get('gamebackend_dataservice'));
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return RankingJob
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @noinspection PhpParamsInspection */
        return $this($serviceLocator);
    }

}