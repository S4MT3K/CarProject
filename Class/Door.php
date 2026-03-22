<?php
class Door
{
    private float $health = 100;
    private string $type;
    private bool $status = false;
    private bool $isLocked;
    private Window $window;

    private function __construct(string $type, Window $window)
    {
        $this->type = $type;
        $this->window = $window;
    }
    public function open() : void
    {
        $this->status = true;
    }
    public function close() : void
    {
        $this->status = false;
    }
    public function isLocked() : bool
    {
        return $this->isLocked;
    }
    public function Lock() : void
    {
        $this->isLocked = true;
    }
    public function Unlock() : void
    {
        $this->isLocked = false;
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
    public function getType() : string
    {
        return $this->type;
    }
    public function isOpened() : bool
    {
        return $this->status;
    }
    public static function createDoor(string $type, Window $window) : Door
    {
        return new Door($type, $window);
    }
//    public function replace()
//    {
//        return new Door();
//    }
}