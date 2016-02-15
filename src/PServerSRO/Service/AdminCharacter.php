<?php


namespace PServerSRO\Service;

use Doctrine\ORM\Query\Expr\Join;

class AdminCharacter extends InvokableBase
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getCharacterQueryBuilder()
    {
        /** @var \GameBackend\Entity\SRO\Shard\Repository\Character $repository */
        $repository = $this->getShardEntityManager()->getRepository($this->getGameOptions()->getEntityShardCharacter());

        $queryBuilder = $repository->createQueryBuilder('p')
            ->select('p', 'user', 'job', 'guild')
            ->join('p.user', 'user')
            ->leftJoin('p.job', 'job')
            ->leftJoin('p.guild', 'guild', Join::WITH, 'guild.id > 0')
            ->orderBy('p.id', 'desc')
            ->where('p.id > 0');

        return $queryBuilder;
    }


    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getShardEntityManager()
    {
        return $this->getServiceManager()->get('doctrine.entitymanager.orm_sro_shard');
    }

    /**
     * @return \GameBackend\Options\SroOptions
     */
    protected function getGameOptions()
    {
        return $this->getServiceManager()->get('gamebackend_sro_options');
    }
}