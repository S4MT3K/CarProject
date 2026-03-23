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

    private function __construct(string $type, bool $isAdaptiveLight, bool $isCurveLight, float $lightRange, float $lightHeightStep)
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
    public function setLightRange($amount) : void
    {
        $this->lightRange = $amount;
    }
    public function setLightHeightStep($amount) : void
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
    public function turnOn() : string
    {
        if($this->isBroken())
        {
            return "Light is broken, cant turn on";
        }
        if($this->isShining())
        {
            return "Light is already shining, cant turn on";
        }
        $this->status = true;
        return "Light has been turned on";
    }
    public function turnOff() : string
    {
        if(!$this->isShining())
        {
            return "Light is already turned off";
        }
        $this->status = false;
        return "Light has been turned off";
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
        if($this->isAdaptive())
        {
            switch ($load) {
                case $load <= 0.25:
                    $this->setLightHeightStep(0.00);
                    echo  "Light height " . "(" . $this->getType() . ")" . " set to " . $this->getLightHeightStep() . "%";
                    break;
                case $load >= 0.26 && $load <= 0.50:
                    $this->setLightHeightStep(25);
                    echo  "Light height " . "(" . $this->getType() . ")" . " set to " . $this->getLightHeightStep() . "%";
                    break;
                case $load >= 0.51 && $load <= 0.75:
                    $this->lightHeightStep = 50;
                    echo  "Light height " . "(" . $this->getType() . ")" . " set to " . $this->getLightHeightStep() . "%";
                    break;
                case $load >= 0.76 && $load <= 0.99:
                    $this->lightHeightStep = 75;
                    echo  "Light height " . "(" . $this->getType() . ")" . " set to " . $this->getLightHeightStep() . "%";
                    break;
                case $load >= 1.00:
                    $this->lightHeightStep = 100;
                    echo  "Light height " . "(" . $this->getType() . ")" . " set to " . $this->getLightHeightStep() . "%";
                    break;
                    default:
                        echo "Error";
            }
        }
        else
        {
            echo "Cant set Height. Light is not Adaptive";
        }
    }
    public static function createLight(string $type, bool $isAdaptiveLight, bool $isCurveLight, float $lightRange, float $lightHeightStep) : self
    {
        return new self($type, $isAdaptiveLight, $isCurveLight, $lightRange, $lightHeightStep);
    }

    public static function createMultipleLights(array $types, $isAdaptiveLight, $isCurveLight, $lightRange, $lightHeightStep) : array
    {
        $array = [];
        foreach ($types as $type) {
            $array[] = self::createLight($type, $isAdaptiveLight, $isCurveLight, $lightRange, $lightHeightStep);
        }
        return $array;
    }
}