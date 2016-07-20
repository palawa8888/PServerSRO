<?php


namespace PServerSRO\View\Helper;


use Interop\Container\ContainerInterface;
use PServerCore\Service\CachingHelper;
use PServerSRO\Service\RankingJob;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RankingJobThievesFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return RankingJobThieves
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RankingJobThieves(
            $container->get(CachingHelper::class),
            $container->get(RankingJob::class)
        );
    }

    /**
     * @param ServiceLocatorInterface|ServiceLocatorAwareInterface $serviceLocator
     * @return RankingJobThieves
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator->getServiceLocator(), RankingJobThieves::class);
    }

}