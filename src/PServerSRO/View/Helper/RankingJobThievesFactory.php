<?php


namespace PServerSRO\View\Helper;


use PServerCore\Service\CachingHelper;
use PServerSRO\Service\RankingJob;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RankingJobThievesFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface|ServiceLocatorAwareInterface $serviceLocator
     * @return RankingJobThieves
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceLocator = $serviceLocator->getServiceLocator();
        /** @noinspection PhpParamsInspection */
        return new RankingJobThieves(
            $serviceLocator->get(CachingHelper::class),
            $serviceLocator->get(RankingJob::class)
        );
    }

}