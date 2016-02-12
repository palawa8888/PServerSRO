<?php


namespace PServerSRO\View\Helper;

use PServerCore\Helper\HelperService;
use Zend\View\Model\ViewModel;

class RankingJobHunter extends InvokerBase
{
    use HelperService;

    /**
     * @param int $limit
     * @return string
     */
    public function __invoke($limit = 10)
    {
        $hunterEntityData = $this->getCachingHelperService()->getItem(
            'PServerSRORankingJobHunterInfo',
            function () use ($limit) {
                return $this->getRankingJobService()->getTopHunterEntityData($limit);
            },
            180
        );

        $viewModel = new ViewModel([
            'jobList' => $hunterEntityData
        ]);

        $viewModel->setTemplate('p-server-sro/ranking-job-hunter');

        return $this->getView()->render($viewModel);
    }
}