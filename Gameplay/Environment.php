<?php

namespace Futilities\Gameplay;

class Environment
{
    protected $seasons = array('spring', 'summer', 'autumn', 'winter');
    protected $weathers = array('fair', 'cloudy', 'overcast', 'foggy', 'snowy', 'rainy', 'stormy');
    protected $periods = array('morning','afternoon','evening','night');

    public $season;
    public $weather;
    public $period;

    protected $dateTime;

    function __construct(\DateTime $dateTime = null)
    {
        $this->dateTime = ($dateTime) ? $dateTime : new \DateTime();

        $this->calculateWeather();
        $this->calculatePeriod();
        $this->calculateSeason();
    }

    protected function calculateWeather()
    {
        $weatherKey = array_rand($this->weathers, 1);
        $this->weather = $this->weathers[$weatherKey];
    }

    protected function calculatePeriod()
    {
        $currentHour = (int)$this->dateTime->format('g');
        $key = ceil($currentHour/3) - 1;
        $this->period = $this->periods[$key];
    }

    protected function calculateSeason()
    {
        $currentWeek = (int)$this->dateTime->format('W');
        $key = $currentWeek % 4;
        $this->season = $this->seasons[$key];
    }

}