<?php


namespace PServerSRO\Service;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RankingJobFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return RankingJob
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @noinspection PhpParamsInspection */
        return new RankingJob($serviceLocator->get('gamebackend_dataservice'));
    }

}