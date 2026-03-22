<?php
class Car
{
    private string $color;
    private string $brand;
    private float $health = 100;
    private float $kilometers;
    private float $fuelstand;
    private Engine $engine;
    private Light $light;
    private array $wheels;
    private array $doors;
    private array $windows;
    private array $seats;
    private float $payload;
    private bool $isDriving;

    private function __construct()
    {

    }
    private function getWheelsCount() : int
    {
        return count($this->wheels);
    }
    public function getHealth() : float
    {
        return $this->health;
    }
    public function repair() : void
    {
        $this->health = 100;
    }
    public function refuel($amount) : void
    {
        $this->fuelstand += $amount;
        if($this->fuelstand > 100)
            {
            $this->fuelstand = 100;
            }
    }
    public function damage(float $damage) : void
    {
        $this->health -= $damage;
    }
    public function isBroken() : bool
    {
        return $this->health <= 0;
    }
    public function getColor() : string
    {
        return $this->color;
    }
    public function getBrand() : string
    {
        return $this->brand;
    }
    public function getKilometers() : float
    {
        return $this->kilometers;
    }
    public function getFuelstand() : float
    {
        return $this->fuelstand;
    }
    public function getPayload() : float
    {
        return $this->payload;
    }
    public function setPayload(float $payload) : string
    {
        $this->payload += $payload;
        $this->light->setLightHeightFromLoad($this->getpayload());
        if($payload > 500)
        {
            return "Payload is too big, car can't carry it and wont be able to drive. Light height set to " . $this->light->getLightHeightStep();
        }
        return "Payload set. Light height set to " . $this->light->getLightHeightStep();
    }
    public function drive($distance) : string
    {
        if($this->isBroken()) {
             return "Car is broken";
         }
        if($this->engine->isBroken()) {
             return "Engine is broken";
         }
        if($this->getFuelstand() <= 0)
            {
            return "Fuelstand is empty";
            }
        if($this->getpayload() > 500)
            {
            return "Car is overloaded, can't drive";
            }
        if($this->getWheelsCount() < 4)
            {
            return "Car is not ready to drive. There are " . (4 - $this->getWheelsCount()) . " Wheels missing";
            }
        $this->isDriving = true;
        $this->fuelstand -= $distance/0.05;
        $this->kilometers += $distance;
        return "Car is driving";
    }
    public function break() : string
    {
        if($this->isDriving) {
             return "Car is breaking";
         }
        return "Car is not driving, can't break";
    }
    public function stopEngine() : string
    {
        if($this->isDriving) {
            return "Cant turn off Engine, Car is Driving";
        }
        $this->engine->stop();
        return "Engine stopped";
    }
    public function startEngine() : string
    {
        if($this->engine->isBroken()) {
            return "Cant Start, Engine is broken";
        }
        if($this->engine->isRunning()) {
            return "Engine is already running";
        }
        if($this->getFuelstand() <= 0)
            {
            return "Fuelstand is empty, engine can't start";
            }
        $this->engine->start();
        return "Engine started";
    }
}

