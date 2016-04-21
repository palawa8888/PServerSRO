<?php


namespace PServerSRO\Controller;

use PServerCore\Service\User;
use PServerSRO\Service\UnStuck;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class UnStuckController extends AbstractActionController
{
    /** @var  UnStuck */
    protected $unStuckService;

    /** @var  User */
    protected $userService;

    /**
     * UnStuckController constructor.
     * @param UnStuck $unStuckService
     * @param User $userService
     */
    public function __construct(UnStuck $unStuckService, User $userService)
    {
        $this->unStuckService = $unStuckService;
        $this->userService = $userService;
    }

    /**
     * @return JsonModel
     */
    public function indexAction()
    {
        $characterId = $this->params()->fromPost('characterId', 0);
        /** @var \PServerCore\Entity\UserInterface $user */
        $user = $this->userService->getAuthService()->getIdentity();
        $response = $this->unStuckService->unStuckCharacter($user, $characterId);

        return new JsonModel($response);
    }


}