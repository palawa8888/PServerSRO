<?php


namespace PServerSRO\Service;


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
            ->select('p', 'user')
            ->join('p.user', 'user')
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