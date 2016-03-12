<?php

namespace PServerSRO\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\Expr\Join;
use GameBackend\Options\SroOptions;

class AdminCharacter
{
    /** @var  EntityManager */
    protected $shardEntityManager;

    /** @var  SroOptions */
    protected $gameOptions;

    /**
     * AdminCharacter constructor.
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
    public function getCharacterQueryBuilder()
    {
        /** @var \GameBackend\Entity\SRO\Shard\Repository\Character $repository */
        $repository = $this->shardEntityManager->getRepository($this->gameOptions->getEntityShardCharacter());

        $queryBuilder = $repository->createQueryBuilder('p')
            ->select('p', 'user', 'job', 'guild')
            ->join('p.user', 'user')
            ->leftJoin('p.job', 'job')
            ->leftJoin('p.guild', 'guild', Join::WITH, 'guild.id > 0')
            ->orderBy('p.id', 'desc')
            ->where('p.id > 0');

        return $queryBuilder;
    }


}