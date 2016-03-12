<?php


namespace PServerSRO\Service;

use Doctrine\ORM\EntityManager;
use GameBackend\DataService\DataServiceInterface;
use GameBackend\DataService\SRO;
use PServerCore\Entity\UserInterface;
use PServerPanel\Service\Character;
use PServerSRO\Options\UnStuckPositionOptions;

class UnStuck
{
    /** @var  DataServiceInterface|SRO */
    protected $gameDataService;

    /** @var  UnStuckPositionOptions */
    protected $unstuckOptions;

    /** @var  Character */
    protected $characterService;

    /** @var  EntityManager */
    protected $shardEntityManager;

    /**
     * UnStuck constructor.
     * @param DataServiceInterface|SRO $gameDataService
     * @param UnStuckPositionOptions $unstuckOptions
     * @param Character $characterService
     * @param EntityManager $shardEntityManager
     */
    public function __construct(
        DataServiceInterface $gameDataService,
        UnStuckPositionOptions $unstuckOptions,
        Character $characterService,
        EntityManager $shardEntityManager
    ) {
        $this->gameDataService = $gameDataService;
        $this->unstuckOptions = $unstuckOptions;
        $this->characterService = $characterService;
        $this->shardEntityManager = $shardEntityManager;
    }

    /**
     * @param UserInterface $user
     * @param $charId
     * @return string[]
     */
    public function unStuckCharacter(UserInterface $user, $charId)
    {
        $errorList = $this->validation($user, $charId);

        if ($errorList) {
            return $errorList;
        }

        /** @var \GameBackend\Entity\SRO\Shard\Character $character */
        $character = $this->characterService->getCharacter4UserCharacterId($user, $charId);

        $position = $this->unstuckOptions;

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

        $this->shardEntityManager->persist($character);
        $this->shardEntityManager->flush();

        return ['success'];
    }

    /**
     * @param UserInterface $user
     * @param $charId
     * @return string[]
     */
    protected function validation(UserInterface $user, $charId)
    {
        $errorList = [];

        if (!$character = $this->characterService->getCharacter4UserCharacterId($user, $charId)) {
            $errorList[] = 'Thats not your character!';
        }

        if (!$errorList && $this->gameDataService->isCharacterOnline($character)) {
            $errorList[] = 'Please logout your character!';
        }

        if (!$errorList && $this->gameDataService->getInventorySlot($character, 8)) {
            $errorList[] = 'Its not allowed with job-items!';
        }

        return $errorList;
    }

}