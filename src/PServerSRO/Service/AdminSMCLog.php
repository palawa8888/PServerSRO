<?php


namespace PServerSRO\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use GameBackend\Options\SroOptions;

class AdminSMCLog
{
    /** @var  EntityManager */
    protected $accountEntityManager;

    /** @var  SroOptions */
    protected $gameOptions;

    /**
     * AdminSMCLog constructor.
     * @param EntityManager $accountEntityManager
     * @param SroOptions $gameOptions
     */
    public function __construct(EntityManager $accountEntityManager, SroOptions $gameOptions)
    {
        $this->accountEntityManager = $accountEntityManager;
        $this->gameOptions = $gameOptions;
    }

    /**
     * @return QueryBuilder
     */
    public function getCharacterQueryBuilder()
    {
        $repository = $this->accountEntityManager->getRepository($this->gameOptions->getEntityAccountSmcLog());

        $queryBuilder = $repository->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.dlogdate', 'desc');

        return $queryBuilder;
    }


}