<?php


namespace PServerSRO\View\Helper;

use Zend\View\Model\ViewModel;

class RankingJobThieves extends InvokerBase
{
    /**
     * @param int $limit
     * @return string
     */
    public function __invoke($limit = 10)
    {
        $viewModel = new ViewModel([
            'jobList' => $this->getRankingJobService()->getTopThievesEntityData($limit)
        ]);

        $viewModel->setTemplate('p-server-sro/ranking-job-thieves');

        return $this->getView()->render($viewModel);
    }
}