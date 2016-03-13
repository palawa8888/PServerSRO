<?php


namespace PServerSRO\Controller;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RankingJobFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface|AbstractPluginManager $serviceLocator
     *
     * @return RankingJobController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \PServerSRO\Service\RankingJob $rankingJobService */
        $rankingJobService = $serviceLocator->getServiceLocator()->get('pserversro_ranking_job_service');

        return new RankingJobController($rankingJobService);
    }
}