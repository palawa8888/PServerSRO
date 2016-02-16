<?php


namespace PServerSRO\Service;


class AdminSMCLog extends InvokableBase
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getCharacterQueryBuilder()
    {
        $repository = $this->getAccountEntityManager()->getRepository($this->getGameOptions()->getEntityAccountSmcLog());

        $queryBuilder = $repository->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.dlogdate', 'desc');

        return $queryBuilder;
    }


    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getAccountEntityManager()
    {
        return $this->getServiceManager()->get('doctrine.entitymanager.orm_sro_account');
    }

    /**
     * @return \GameBackend\Options\SroOptions
     */
    protected function getGameOptions()
    {
        return $this->getServiceManager()->get('gamebackend_sro_options');
    }
}