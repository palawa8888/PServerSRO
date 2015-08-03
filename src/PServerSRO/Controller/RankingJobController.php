<?php

namespace PServerSRO\Controller;


use Zend\Mvc\Controller\AbstractActionController;

class RankingJobController extends AbstractActionController
{

    public function topTraderAction()
    {
        return [
            'ranking' => $this->getRankingJobService()->getTopTrader( $this->params()->fromRoute('page') )
        ];
    }

    public function topHunterAction()
    {
        return [
            'ranking' => $this->getRankingJobService()->getTopHunter( $this->params()->fromRoute('page') )
        ];
    }

    public function topThievesAction()
    {
        return [
            'ranking' => $this->getRankingJobService()->getTopThieves( $this->params()->fromRoute('page') )
        ];
    }

    /**
     * @return \PServerSRO\Service\RankingJob
     */
    public function getRankingJobService()
    {
        return $this->getServiceLocator()->get('pserversro_ranking_job_service');
    }
}