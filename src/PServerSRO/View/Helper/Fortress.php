<?php


namespace PServerSRO\View\Helper;


use GameBackend\DataService\SRO;
use Zend\View\Model\ViewModel;

class Fortress extends InvokerBase
{

    /**
     * @return string
     */
    public function __invoke()
    {
        $gameBackend = $this->getGameBackendService();

        $guildList = null;
        if ($gameBackend instanceof SRO) {
            $guildList = $gameBackend->getFortressGuildList();
        }

        $viewModel = new ViewModel([
            'fortressGuildList' => $guildList
        ]);

        $viewModel->setTemplate('p-server-sro/fortress');

        return $this->getView()->render($viewModel);
    }
}