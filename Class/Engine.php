<?php
class Engine
{
    private float $health = 100;
    private string $type;
    private bool $status = false;

    private function __construct($type)
    {
        $this->type = $type;
    }
    public function start() : void
    {
        $this->status = true;
    }
    public function stop() : void
    {
        $this->status = false;
    }
    public function getHealth() : float
    {
        return $this->health;
    }
    public function isRunning() : bool
    {
        return $this->status;
    }
    public function isBroken() : bool
    {
        return $this->health <= 0;
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
//    public function replace() //NEED?
//    {
//        return new Engine();
//    }
    public static function createEngine(string $type) : Engine
    {
        return new Engine($type);
    }
}