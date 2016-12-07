<?php

namespace PServerSRO\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use GameBackend\Options\SroOptions;

class AdminJobNameHistory
{
    /** @var  EntityManager */
    protected $shardEntityManager;

    /** @var  SroOptions */
    protected $gameOptions;

    /**
     * AdminJobNameHistory constructor.
     * @param EntityManager $shardEntityManager
     * @param SroOptions $gameOptions
     */
    public function __construct(EntityManager $shardEntityManager, SroOptions $gameOptions)
    {
        $this->shardEntityManager = $shardEntityManager;
        $this->gameOptions = $gameOptions;
    }

    /**
     * @return QueryBuilder
     */
    public function getNickNameQueryBuilder()
    {
        $repository = $this->shardEntityManager->getRepository($this->gameOptions->getEntityShardCharNickNameList());

        $queryBuilder = $repository->createQueryBuilder('p')
            ->select('p', 'user', 'job', 'char')
            ->join('p.char', 'char')
            ->join('char.job', 'job')
            ->join('char.user', 'user')
            ->orderBy('char.id', 'desc');

        return $queryBuilder;
    }


}