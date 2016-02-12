<?php


namespace PServerSRO\View\Helper;

use PServerCore\Helper\HelperService;
use Zend\View\Model\ViewModel;

class RankingJobThieves extends InvokerBase
{
    use HelperService;

    /**
     * @param int $limit
     * @return string
     */
    public function __invoke($limit = 10)
    {
        $thievesEntityData = $this->getCachingHelperService()->getItem(
            'PServerSRORankingJobThievesInfo',
            function () use ($limit) {
                return $this->getRankingJobService()->getTopThievesEntityData($limit);
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