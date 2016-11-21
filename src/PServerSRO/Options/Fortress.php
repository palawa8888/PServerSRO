<?php

namespace PServerSRO\Options;

use Zend\Stdlib\AbstractOptions;

class Fortress extends AbstractOptions
{
    const MOD_VALID_GUILD = 1;
    const MOD_ALL_ENTRIES = 2;

    /** @var  bool  */
    protected $__strictMode__ = false;

    /** @var  int  */
    protected $mod = self::MOD_VALID_GUILD;

    /** @var  int[] */
    protected $disable = [];

    /**
     * @return int
     */
    public function getMod()
    {
        return $this->mod;
    }

    /**
     * @param int $mod
     * @return self
     */
    public function setMod($mod)
    {
        $this->mod = $mod;
        return $this;
    }

    /**
     * @return \int[]
     */
    public function getDisable()
    {
        return $this->disable;
    }

    /**
     * @param \int[] $disable
     * @return self
     */
    public function setDisable($disable)
    {
        $this->disable = $disable;
        return $this;
    }


}