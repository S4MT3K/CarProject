<?php
class Wheel
{
    private float $health = 100;
    private string $material;
    private string $color;
    private string $type;
    private float $inch;
    private float $pressure;
    private bool $hasGas = false;

    private function __construct($type, $material, $color, $inch)
    {
        $this->type = $type;
        $this->material = $material;
        $this->color = $color;
        $this->inch = $inch;
    }
    public function getHealth() : float
    {
        return $this->health;
    }
    public function repair() : void
    {
        $this->health = 100;
    }
    public function damage(float $damage) : void
    {
        $this->health -= $damage;
    }
    public function isBroken() : bool
    {
        return $this->health <= 0;
    }
    public function getMaterial() : string
    {
        return $this->material;
    }
    public function getColor() : string
    {
        return $this->color;
    }
    public function getType() : string
    {
        return $this->type;
    }
    public function getInch() : float
    {
        return $this->inch;
    }
    public function getPressure() : float
    {
        return $this->pressure;
    }
    public function getHasGas() : float
    {
        return $this->hasGas;
    }
    public function setPressure(float $pressure) : void
    {
        $this->pressure = $pressure;
    }
    public function setHasGas(float $hasGas) : void
    {
        $this->hasGas = $hasGas;
    }
    public static function createWheel($type, $material, $color, $inch) : Wheel
    {
        return new Wheel($type, $material, $color, $inch);
    }
//    public function replace()
//    {
//        return new Wheel();
//    }
}
