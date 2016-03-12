<?php


namespace PServerSRO\View\Helper;

use PServerCore\Service\CachingHelper;
use PServerSRO\Service\RankingJob;
use Zend\Form\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class RankingJobTrader extends AbstractHelper
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
        $traderEntityData = $this->serviceCache->getItem(
            'PServerSRORankingJobTraderInfo',
            function () use ($limit) {
                return $this->rankingService->getTopTraderEntityData($limit);
            },
            180
        );

        $viewModel = new ViewModel([
            'jobList' => $traderEntityData
        ]);

        $viewModel->setTemplate('p-server-sro/ranking-job-trader');

        return $this->getView()->render($viewModel);
    }
}