<?php


namespace PServerSRO\Service;

use PServerCore\Entity\UserInterface;
use PServerSRO\Options\UnStuckPositionOptions;

class UnStuck extends InvokableBase
{
    /**
     * @param UserInterface $user
     * @param $charId
     * @return array
     */
    public function unStuckCharacter(UserInterface $user, $charId)
    {
        $errorList = $this->validation($user, $charId);

        if ($errorList) {
            return $errorList;
        }

        /** @var \GameBackend\Entity\SRO\Shard\Character $character */
        $character = $this->getCharacterService()->getCharacter4UserCharacterId($user, $charId);

        $position = $this->getUnStuckPosition();

        $character->setLatestRegion($position->getLatestRegion());
        $character->setWorldId($position->getWorldId());
        $character->setPosX($position->getPosX());
        $character->setPosY($position->getPosY());
        $character->setPosZ($position->getPosZ());
        $character->setTelRegion($position->getTelRegion());
        $character->setTelPosX($position->getTelPosX());
        $character->setTelPosY($position->getTelPosY());
        $character->setTelPosZ($position->getTelPosZ());
        $character->setDiedRegion($position->getDiedRegion());
        $character->setDiedPosX($position->getDiedPosX());
        $character->setDiedPosY($position->getDiedPosY());
        $character->setDiedPosZ($position->getDiedPosZ());
        $character->setTelWorldId($position->getTelWorldId());
        $character->setDiedWorldId($position->getDiedWorldId());

        $entityManager = $this->getShardEntityManager();
        $entityManager->persist($character);
        $entityManager->flush();

        return ['success'];
    }

    /**
     * @param UserInterface $user
     * @param $charId
     * @return array
     */
    protected function validation(UserInterface $user, $charId)
    {
        $errorList = [];

        if (!$character = $this->getCharacterService()->getCharacter4UserCharacterId($user, $charId)) {
            $errorList[] = 'That�s not your character!';
        }

        if (!$errorList && $this->getGameBackendService()->isCharacterOnline($character)) {
            $errorList[] = 'Please logout your character!';
        }

        if (!$errorList && $this->getGameBackendService()->getInventorySlot($character, 8)) {
            $errorList[] = 'Its not allowed with job-items!';
        }

        return $errorList;
    }

    /**
     * @return UnStuckPositionOptions
     */
    protected function getUnStuckPosition()
    {
        return $this->getServiceManager()->get('pserversro_unstuck_options');
    }

    /**
     * @return \PServerPanel\Service\Character
     */
    protected function getCharacterService()
    {
        return $this->getServiceManager()->get('pserverpanel_character_service');
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getShardEntityManager()
    {
        return $this->getServiceManager()->get('doctrine.entitymanager.orm_sro_shard');
    }

}