<?php


namespace PServerSRO\View\Helper;

use PServerCore\Service\CachingHelper;
use PServerSRO\Service\RankingJob;
use Zend\Form\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class RankingJobThieves extends AbstractHelper
{
    /** @var  CachingHelper */
    protected $serviceCache;

    /** @var  RankingJob */
    protected $rankingService;

    /**
     * RankingJobHunter constructor.
     * @param CachingHelper $serviceCache
     * @param RankingJob $rankingService
     */
    public function __construct(CachingHelper $serviceCache, RankingJob $rankingService)
    {
        $this->serviceCache = $serviceCache;
        $this->rankingService = $rankingService;
    }

    /**
     * @param int $limit
     * @return string
     */
    public function __invoke($limit = 10)
    {
        $thievesEntityData = $this->serviceCache->getItem(
            'PServerSRORankingJobThievesInfo',
            function () use ($limit) {
                return $this->rankingService->getTopThievesEntityData($limit);
            },
            180
        );

        $viewModel = new ViewModel([
            'jobList' => $thievesEntityData
        ]);

        $viewModel->setTemplate('p-server-sro/ranking-job-thieves');

        return $this->getView()->render($viewModel);
    }
}