<?php


namespace PServerSRO\View\Helper;


use PServerCore\Service\CachingHelper;
use PServerSRO\Service\RankingJob;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RankingJobTraderFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface|ServiceLocatorAwareInterface $serviceLocator
     * @return RankingJobTrader
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceLocator = $serviceLocator->getServiceLocator();
        /** @noinspection PhpParamsInspection */
        return new RankingJobTrader(
            $serviceLocator->get(CachingHelper::class),
            $serviceLocator->get(RankingJob::class)
        );
    }

}