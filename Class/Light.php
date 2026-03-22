<?php
class Light
{
    private float $brightness = 0;
    private float $health = 100;
    private bool $status = false;
    private string $type;
    private bool $isAdaptiveLight;
    private bool $isCurveLight;
    private float $lightRange = 0;
    private float $lightHeightStep = 0;

    private function __construct($type, $isAdaptiveLight, $isCurveLight, $lightRange, $lightHeightStep)
    {
        $this->type = $type;
        $this->isAdaptiveLight = $isAdaptiveLight;
        $this->isCurveLight = $isCurveLight;
        $this->lightRange = $lightRange;
        $this->lightHeightStep = $lightHeightStep;
    }
    public function isBroken() : bool
    {
        return $this->health <= 0;
    }
    public function isAdaptive() : bool
    {
        return $this->isAdaptiveLight;
    }
    public function isCurveLight() : bool
    {
        return $this->isCurveLight;
    }
    public function getLightRange() : float
    {
        return $this->lightRange;
    }
    public function getLightHeightStep() : float
    {
        return $this->lightHeightStep;
    }
    public function setLightRange($amount)
    {
        $this->lightRange = $amount;
    }
    public function setLightHeightStep($amount)
    {
        $this->lightHeightStep = $amount;
    }
    public function getBrightness() : float
    {
        return $this->brightness;
    }
    public function setBrightness(float $brightness) : void
    {
        $this->brightness = $brightness;
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
    public function isShining() : bool
    {
        return $this->status;
    }
    public function turnOn()
    {
        if($this->isBroken())
        {
            echo "Light is broken";
        }
        $this->status = true;
    }
    public function turnOff()
    {
        $this->status = false;
    }
    public function getType() : string
    {
        return $this->type;
    }
//    public function replace()
//    {
//        return new Light();
//    }
    public function setLightHeightFromLoad(float $load) : void
    {
        $load = $load / 100;
        if($this->isAdaptiveLight)
        {
            switch ($load) {
                case $load <= 0.25:
                    $this->lightHeightStep = 0.0;
                    break;
                case $load >= 0.26 && $load <= 0.5:
                    $this->lightHeightStep = 0.5;
                    break;
                case $load >= 0.51 && $load <= 0.75:
                    $this->lightHeightStep = 0.75;
                    break;
                case $load >= 0.76 && $load <= 1:
                    $this->lightHeightStep = 1.00;
                    break;
                    default:
                        echo "Error";
            }
        }
        else
        {
            echo "Light is not Adaptive";
        }
    }
    public static function createLight($type, $isAdaptiveLight, $isCurveLight, $lightRange, $lightHeightStep) : Light
    {
        return new Light($type, $isAdaptiveLight, $isCurveLight, $lightRange, $lightHeightStep);
    }
}