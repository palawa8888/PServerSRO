<?php


namespace PServerSRO\View\Helper;

use PServerCore\Helper\HelperService;
use Zend\View\Model\ViewModel;

class RankingJobTrader extends InvokerBase
{
    use HelperService;

    /**
     * @param int $limit
     * @return string
     */
    public function __invoke($limit = 10)
    {
        $traderEntityData = $this->getCachingHelperService()->getItem(
            'PServerSRORankingJobTraderInfo',
            function () use ($limit) {
                return $this->getRankingJobService()->getTopTraderEntityData($limit);
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