<?php

namespace PServerSRO\View\Helper;

use PServerCore\Service\CachingHelper;
use GameBackend\DataService\DataServiceInterface;
use GameBackend\DataService\SRO;
use PServerSRO\Options\Fortress as FortressOptions;
use Zend\Form\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class Fortress extends AbstractHelper
{
    /** @var  CachingHelper */
    protected $serviceCache;

    /** @var  DataServiceInterface|SRO */
    protected $gameDataService;

    /** @var  FortressOptions */
    protected $fortressOptions;

    /**
     * Fortress constructor.
     * @param CachingHelper $serviceCache
     * @param DataServiceInterface|SRO $gameDataService
     * @param FortressOptions $fortressOptions
     */
    public function __construct(CachingHelper $serviceCache, DataServiceInterface $gameDataService, FortressOptions $fortressOptions)
    {
        $this->serviceCache = $serviceCache;
        $this->gameDataService = $gameDataService;
        $this->fortressOptions = $fortressOptions;
    }

    /**
     * @return string
     */
    public function __invoke()
    {
        /** @var \GameBackend\Entity\SRO\Shard\SiegeFortress[] $fortressList */
        $fortressList = $this->serviceCache->getItem(
            'PServerSROFortressInfo',
            function () {
                $gameBackend = $this->gameDataService;

                $guildList = null;
                if ($gameBackend instanceof SRO) {
                    $guildList = $gameBackend->getFortressGuildList();
                }

                return $guildList;
            },
            180
        );

        $fortressFilterList = [];
        foreach ($fortressList as $fortress) {
            if ($this->fortressOptions->getMod() == FortressOptions::MOD_VALID_GUILD) {
                if (!$fortress->getGuild() || $fortress->getGuild()->getId() < 1) {
                    continue;
                }
            }

            if (in_array($fortress->getId(), $this->fortressOptions->getDisable())) {
                continue;
            }

            $fortressFilterList[] = $fortress;
        }

        $viewModel = new ViewModel([
            'fortressGuildList' => $fortressFilterList
        ]);

        $viewModel->setTemplate('p-server-sro/fortress');

        return $this->getView()->render($viewModel);
    }
}