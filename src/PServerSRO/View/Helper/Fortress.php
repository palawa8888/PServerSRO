<?php


namespace PServerSRO\View\Helper;


use GameBackend\DataService\SRO;
use PServerCore\Helper\HelperService;
use Zend\View\Model\ViewModel;

class Fortress extends InvokerBase
{
    use HelperService;

    /**
     * @return string
     */
    public function __invoke()
    {
        $guildList = $this->getCachingHelperService()->getItem('PServerSROFortressInfo', function () {
            $gameBackend = $this->getGameBackendService();

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