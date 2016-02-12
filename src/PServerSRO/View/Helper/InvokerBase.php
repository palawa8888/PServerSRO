<?php

namespace PServerSRO\View\Helper;

use GameBackend\Helper\Basic;
use GameBackend\Helper\Service;
use Zend\Form\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceLocatorInterface;

class InvokerBase extends AbstractHelper
{
    use Service, Basic;

    /** @var ServiceLocatorInterface */
    protected $serviceLocator;

    /**
     * @param ServiceLocatorInterface $serviceLocatorInterface
     */
    public function __construct(ServiceLocatorInterface $serviceLocatorInterface)
    {
        $this->setServiceLocator($serviceLocatorInterface);
    }

    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceManager()
    {
        return $this->serviceLocator;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return $this
     */
    protected function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    /**
     * @return \PServerSRO\Service\RankingJob
     */
    public function getRankingJobService()
    {
        return $this->getService('pserversro_ranking_job_service');
    }

} 