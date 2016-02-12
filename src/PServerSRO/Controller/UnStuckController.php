<?php


namespace PServerSRO\Controller;


use PServerSRO\Service\UnStuck;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class UnStuckController extends AbstractActionController
{

    public function indexAction()
    {
        $characterId = $this->params()->fromPost('characterId', 0);
        /** @var \PServerCore\Entity\UserInterface $user */
        $user = $this->getUserService()->getAuthService()->getIdentity();
        $response = $this->getUnStuckService()->unStuckCharacter($user, $characterId);

        return new JsonModel($response);
    }

    /**
     * @return UnStuck
     */
    protected function getUnStuckService()
    {
        return $this->getServiceLocator()->get('pserversro_unstuck_service');
    }

    /**
     * @return \PServerCore\Service\User
     */
    protected function getUserService()
    {
        return $this->getServiceLocator()->get('small_user_service');
    }

}