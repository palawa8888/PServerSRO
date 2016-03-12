<?php


namespace PServerSRO\View\Helper;

use PServerCore\Service\CachingHelper;
use GameBackend\DataService\DataServiceInterface;
use GameBackend\DataService\SRO;
use Zend\Form\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class Fortress extends AbstractHelper
{
    /** @var  CachingHelper */
    protected $serviceCache;

    /** @var  DataServiceInterface|SRO */
    protected $gameDataService;

    /**
     * Fortress constructor.
     * @param CachingHelper $serviceCache
     * @param DataServiceInterface|SRO $gameDataService
     */
    public function __construct(CachingHelper $serviceCache, DataServiceInterface $gameDataService)
    {
        $this->serviceCache = $serviceCache;
        $this->gameDataService = $gameDataService;
    }

    /**
     * @return string
     */
    public function __invoke()
    {
        $guildList = $this->serviceCache->getItem('PServerSROFortressInfo', function () {
            $gameBackend = $this->gameDataService;

            $guildList = null;
            if ($gameBackend instanceof SRO) {
                $guildList = $gameBackend->getFortressGuildList();
            }

            return $guildList;
        }, 180);

        $viewModel = new ViewModel([
            'fortressGuildList' => $guildList
        ]);

        $viewModel->setTemplate('p-server-sro/fortress');

        return $this->getView()->render($viewModel);
    }
}