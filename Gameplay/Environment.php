<?php

namespace Futilities\Gameplay;

class Environment
{
    protected $seasons = array('spring', 'summer', 'autumn', 'winter');
    protected $weathers = array('fair', 'cloudy', 'overcast', 'foggy', 'snowy', 'rainy', 'stormy');
    protected $periods = array('morning','afternoon','evening','night');

    protected $season;
    protected $weather;
    protected $period;

    protected $dateTime;

    function __construct(\DateTime $dateTime = null)
    {
        $this->dateTime = ($dateTime) ? $dateTime : new \DateTime();

        $this->setWeather();
        $this->setPeriod();
        $this->setSeason();
    }

    protected function setWeather()
    {
        $weatherKey = array_rand($this->weathers, 1);
        $this->weather = $this->weathers[$weatherKey];
    }

    public function getWeather()
    {
        return $this->weather;
    }

    protected function setPeriod()
    {
        $currentHour = (int)$this->dateTime->format('g');
        $key = ceil($currentHour/3) - 1;
        $this->period = $this->periods[$key];
    }

    public function getPeriod()
    {
        return $this->period;
    }

    protected function setSeason()
    {
        $currentWeek = (int)$this->dateTime->format('W');
        $key = $currentWeek % 4;
        $this->season = $this->seasons[$key];
    }

    public function getSeason()
    {
        return $this->season;
    }
}