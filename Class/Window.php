<?php
class Window
{
    private float $health = 100;
    private bool $isOpen = false;
    private string $type;
    private bool $heatable;
    private bool $isUnbreakable;
    private bool $isTinted;
    private bool $isHeating;

    private function __construct($type, $heatable, $isUnbreakable, $isTinted)
    {
        $this->type = $type;
        $this->heatable = $heatable;
        $this->isUnbreakable = $isUnbreakable;
        $this->isTinted = $isTinted;
    }
    public function isBroken() : bool
    {
        return $this->health <= 0;
    }
    public function open() : void
    {
        $this->isOpen = true;
    }
    public function close() : void
    {
        $this->isOpen = false;
    }
    public function isOpen() : bool
    {
        return $this->isOpen;
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
    public function getType() : string
    {
        return $this->type;
    }
    public function isHeatable() : bool
    {
        return $this->heatable;
    }
    public function isHeating() : bool
    {
        return $this->isHeating;
    }
    public function isUnbreakable() : bool
    {
        return $this->isUnbreakable;
    }
    public function isTinted() : bool
    {
        return $this->isTinted;
    }
    public function heat()
    {
        if ($this->isHeatable()) {
            $this->isHeating = true;
        }
        else {
            echo "This window is not heatable";
        }
    }
    public function stopHeating()
    {
        if ($this->isHeatable()) {
            $this->isHeating = false;
        }
        else {
            echo "This window is not heatable";
        }
    }
    public function createWindow($type, $heatable, $isUnbreakable, $isTinted)
    {
        if ($type == "front") {
            $isTinted = false;
         }
        return new Window($type, $heatable, $isUnbreakable, $isTinted);
    }
//    public function replace()
//    {
//        return new Window();
//    }

}