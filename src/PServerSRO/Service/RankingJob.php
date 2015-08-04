<?php

namespace PServerSRO\Service;

use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;

class RankingJob implements ServiceManagerAwareInterface
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
    public function setServiceManager( ServiceManager $serviceManager )
    {
        $this->serviceManager = $serviceManager;

        return $this;
    }

    /**
     * @param int $page
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopTrader($page = 1)
    {
        $topTrader = $this->getGameBackendService()->getTopJobCharacter(1);

        return $this->getPaginator4QueryBuilder($topTrader, $page);
    }

    /**
     * @param int $page
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopHunter($page = 1)
    {
        $topHunter = $this->getGameBackendService()->getTopJobCharacter(3);

        return $this->getPaginator4QueryBuilder($topHunter, $page);
    }

    /**
     * @param int $page
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopThieves($page = 1)
    {
        $topThieves = $this->getGameBackendService()->getTopJobCharacter(2);

        return $this->getPaginator4QueryBuilder($topThieves, $page);
    }

    /**
     * @param int $limit
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopTraderEntityData($limit = 10)
    {
        $topTrader = $this->getGameBackendService()->getTopJobCharacter(1);

        return $topTrader->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param int $limit
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopHunterEntityData($limit = 10)
    {
        $topHunter = $this->getGameBackendService()->getTopJobCharacter(3);

        return $topHunter->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param int $limit
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopThievesEntityData($limit = 10)
    {
        $topThieves = $this->getGameBackendService()->getTopJobCharacter(2);

        return $topThieves->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param     $queryBuilder
     * @param int $page
     *
     * @return Paginator|null
     */
    protected function getPaginator4QueryBuilder($queryBuilder, $page = 1)
    {
        if (!$queryBuilder) {
            return null;
        }

        $adapter = new DoctrineAdapter(new ORMPaginator($queryBuilder));
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(25);
        $paginator->setCurrentPageNumber($page);

        return $paginator;
    }

    /**
     * @return \GameBackend\DataService\SRO
     */
    protected function getGameBackendService()
    {
        return $this->getServiceManager()->get('gamebackend_dataservice');
    }
}