<?php


namespace PServerSRO\View\Helper;

use Zend\View\Model\ViewModel;

class RankingJobTrader extends InvokerBase
{
    /**
     * @param int $limit
     * @return string
     */
    public function __invoke($limit = 10)
    {
        $viewModel = new ViewModel([
            'jobList' => $this->getRankingJobService()->getTopTraderEntityData($limit)
        ]);

        $viewModel->setTemplate('p-server-sro/ranking-job-trader');

        return $this->getView()->render($viewModel);
    }
}