<?php

namespace PServerSRO\Controller;

use PServerSRO\Service\RankingJob;
use Zend\Mvc\Controller\AbstractActionController;

class RankingJobController extends AbstractActionController
{
    /** @var  RankingJob */
    protected $rankingJobService;

    /**
     * RankingJobController constructor.
     * @param RankingJob $rankingJobService
     */
    public function __construct(RankingJob $rankingJobService)
    {
        $this->rankingJobService = $rankingJobService;
    }

    /**
     * @return array
     */
    public function topTraderAction()
    {
        return [
            'ranking' => $this->rankingJobService->getTopTrader($this->params()->fromRoute('page'))
        ];
    }

    /**
     * @return array
     */
    public function topHunterAction()
    {
        return [
            'ranking' => $this->rankingJobService->getTopHunter($this->params()->fromRoute('page'))
        ];
    }

    /**
     * @return array
     */
    public function topThievesAction()
    {
        return [
            'ranking' => $this->rankingJobService->getTopThieves($this->params()->fromRoute('page'))
        ];
    }


}