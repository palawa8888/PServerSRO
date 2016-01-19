<?php


namespace PServerSRO\View\Helper;

use Zend\View\Model\ViewModel;

class RankingJobHunter extends InvokerBase
{
    /**
     * @param int $limit
     * @return string
     */
    public function __invoke($limit = 10)
    {
        $viewModel = new ViewModel([
            'jobList' => $this->getRankingJobService()->getTopHunterEntityData($limit)
        ]);

        $viewModel->setTemplate('p-server-sro/ranking-job-hunter');

        return $this->getView()->render($viewModel);
    }
}