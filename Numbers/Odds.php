<?php
namespace Futilities\Numbers;

class Odds
{
    const COMMON = 60;
    const UNCOMMON = 25;
    const RARE = 10;
    const LEGENDARY = 4;
    const EPIC = 1;
    const MIRACULOUS = 0;

    protected $odds;
    protected $roll;
    protected $rarity;

    function __construct()
    {
        $this->formatOdds();
        $this->setRoll();
    }

    protected function formatOdds()
    {
        $reflection = new \ReflectionClass(get_class($this));
        $this->odds = $reflection->getConstants();
    }

    public function getOdds()
    {
        return $this->odds;
    }

    protected function setRoll()
    {
        $this->roll = rand(1, $this->getLimit());
    }

    public function getLimit()
    {
        $values = array_values($this->odds);
        return array_sum($values);
    }

    public function getRarity()
    {
        return ($this->rarity) ? $this->rarity : $this->calculateRarity();
    }

    protected function calculateRarity()
    {
        $compareTo = 0;
        foreach ($this->odds as $level => $value) {
            $compareTo += $value;
            if ($this->roll <= $compareTo) {
                $this->rarity = $level;
                return $this->rarity;
            }
        }
    }

    public function isCommon()
    {
        return $this->is(__FUNCTION__);
    }

    public function isUncommon()
    {
        return $this->is(__FUNCTION__);
    }

    public function isRare()
    {
        return $this->is(__FUNCTION__);
    }

    public function isLegendary()
    {
        return $this->is(__FUNCTION__);
    }

    public function isEpic()
    {
        return $this->is(__FUNCTION__);
    }

    public function isMiraculous()
    {
        return $this->is(__FUNCTION__);
    }

    protected function is($parentMethod)
    {
        $compareTo = strtoupper(substr($parentMethod, 2));
        return $compareTo == $this->getRarity();
    }
}