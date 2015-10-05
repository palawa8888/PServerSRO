<?php


namespace PServerSRO\Options;

use Zend\Stdlib\AbstractOptions;

class UnStuckPositionOptions extends AbstractOptions
{
    protected $__strictMode__ = false;

    /** @var int */
    protected $latestRegion = 0;

    /** @var int */
    protected $worldId = 0;

    /** @var float */
    protected $posX = 0;

    /** @var float */
    protected $posY = 0;

    /** @var float */
    protected $posZ = 0;

    /** @var int */
    protected $telRegion = 0;

    /** @var float */
    protected $telPosX = 0;

    /** @var float */
    protected $telPosY = 0;

    /** @var float */
    protected $telPosZ = 0;

    /** @var int */
    protected $diedRegion = 0;

    /** @var float */
    protected $diedPosX = 0;

    /** @var float */
    protected $diedPosY = 0;

    /** @var float */
    protected $diedPosZ = 0;

    /** @var int */
    protected $telWorldId = 0;

    /** @var int */
    protected $diedWorldId = 0;

    /**
     * @return int
     */
    public function getLatestRegion()
    {
        return $this->latestRegion;
    }

    /**
     * @param int $latestRegion
     * @return $this
     */
    public function setLatestRegion($latestRegion)
    {
        $this->latestRegion = $latestRegion;
        return $this;
    }

    /**
     * @return int
     */
    public function getWorldId()
    {
        return $this->worldId;
    }

    /**
     * @param int $worldId
     * @return $this
     */
    public function setWorldId($worldId)
    {
        $this->worldId = $worldId;
        return $this;
    }

    /**
     * @return float
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * @param float $posX
     * @return $this
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;
        return $this;
    }

    /**
     * @return float
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * @param float $posY
     * @return $this
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;
        return $this;
    }

    /**
     * @return float
     */
    public function getPosZ()
    {
        return $this->posZ;
    }

    /**
     * @param float $posZ
     * @return $this
     */
    public function setPosZ($posZ)
    {
        $this->posZ = $posZ;
        return $this;
    }

    /**
     * @return int
     */
    public function getTelRegion()
    {
        return $this->telRegion;
    }

    /**
     * @param int $telRegion
     * @return $this
     */
    public function setTelRegion($telRegion)
    {
        $this->telRegion = $telRegion;
        return $this;
    }

    /**
     * @return float
     */
    public function getTelPosX()
    {
        return $this->telPosX;
    }

    /**
     * @param float $telPosX
     * @return $this
     */
    public function setTelPosX($telPosX)
    {
        $this->telPosX = $telPosX;
        return $this;
    }

    /**
     * @return float
     */
    public function getTelPosY()
    {
        return $this->telPosY;
    }

    /**
     * @param float $telPosY
     * @return $this
     */
    public function setTelPosY($telPosY)
    {
        $this->telPosY = $telPosY;
        return $this;
    }

    /**
     * @return float
     */
    public function getTelPosZ()
    {
        return $this->telPosZ;
    }

    /**
     * @param float $telPosZ
     * @return $this
     */
    public function setTelPosZ($telPosZ)
    {
        $this->telPosZ = $telPosZ;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiedRegion()
    {
        return $this->diedRegion;
    }

    /**
     * @param int $diedRegion
     * @return $this
     */
    public function setDiedRegion($diedRegion)
    {
        $this->diedRegion = $diedRegion;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiedPosX()
    {
        return $this->diedPosX;
    }

    /**
     * @param float $diedPosX
     * @return $this
     */
    public function setDiedPosX($diedPosX)
    {
        $this->diedPosX = $diedPosX;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiedPosY()
    {
        return $this->diedPosY;
    }

    /**
     * @param float $diedPosY
     * @return $this
     */
    public function setDiedPosY($diedPosY)
    {
        $this->diedPosY = $diedPosY;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiedPosZ()
    {
        return $this->diedPosZ;
    }

    /**
     * @param float $diedPosZ
     * @return $this
     */
    public function setDiedPosZ($diedPosZ)
    {
        $this->diedPosZ = $diedPosZ;
        return $this;
    }

    /**
     * @return int
     */
    public function getTelWorldId()
    {
        return $this->telWorldId;
    }

    /**
     * @param int $telWorldId
     * @return $this
     */
    public function setTelWorldId($telWorldId)
    {
        $this->telWorldId = $telWorldId;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiedWorldId()
    {
        return $this->diedWorldId;
    }

    /**
     * @param int $diedWorldId
     * @return $this
     */
    public function setDiedWorldId($diedWorldId)
    {
        $this->diedWorldId = $diedWorldId;
        return $this;
    }

}