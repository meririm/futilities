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

    public $odds;
    public $roll;
    public $rarity;

    function __construct()
    {
        $this->formatOdds();
        $this->setRoll();
        $this->calculateRarity();
    }

    protected function formatOdds()
    {
        $reflection = new \ReflectionClass(get_class($this));
        $this->odds = $reflection->getConstants();
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
        return strtoupper(substr($parentMethod, 2)) == $this->getRarity();
    }
}