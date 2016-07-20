<?php


namespace PServerSRO\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RankingJobFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return RankingJobController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RankingJobController($container->get('pserversro_ranking_job_service'));
    }

    /**
     * @param ServiceLocatorInterface|AbstractPluginManager $serviceLocator
     *
     * @return RankingJobController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator->getServiceLocator(), RankingJobController::class);
    }
}