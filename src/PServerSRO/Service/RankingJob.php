<?php

namespace PServerSRO\Service;

use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use GameBackend\DataService\DataServiceInterface;
use GameBackend\DataService\SRO;
use Zend\Paginator\Paginator;

class RankingJob
{
    /** @var  DataServiceInterface|SRO */
    protected $gameDataService;

    /**
     * RankingJob constructor.
     * @param DataServiceInterface|SRO $gameDataService
     */
    public function __construct(DataServiceInterface $gameDataService)
    {
        $this->gameDataService = $gameDataService;
    }

    /**
     * @param int $page
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopTrader($page = 1)
    {
        $topTrader = $this->gameDataService->getTopJobCharacter(1);

        return $this->getPaginator4QueryBuilder($topTrader, $page);
    }

    /**
     * @param int $page
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopHunter($page = 1)
    {
        $topHunter = $this->gameDataService->getTopJobCharacter(3);

        return $this->getPaginator4QueryBuilder($topHunter, $page);
    }

    /**
     * @param int $page
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopThieves($page = 1)
    {
        $topThieves = $this->gameDataService->getTopJobCharacter(2);

        return $this->getPaginator4QueryBuilder($topThieves, $page);
    }

    /**
     * @param int $limit
     *
     * @return Paginator|\GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getTopTraderEntityData($limit = 10)
    {
        $topTrader = $this->gameDataService->getTopJobCharacter(1);

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
        $topHunter = $this->gameDataService->getTopJobCharacter(3);

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
        $topThieves = $this->gameDataService->getTopJobCharacter(2);

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
}