<?php
namespace PServerSRO\Service;


use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;

abstract class InvokableBase implements ServiceManagerAwareInterface
{
    /** @var ServiceManager */
    protected $serviceManager;

    /**
     * @return ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    /**
     * @param ServiceManager $serviceManager
     *
     * @return $this
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        return $this;
    }

    /**
     * @return \GameBackend\DataService\SRO
     */
    protected function getGameBackendService()
    {
        return $this->getServiceManager()->get('gamebackend_dataservice');
    }
} 