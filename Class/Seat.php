<?php
class Seat
{
    private string $material;
    private bool $isheatable;

    private function __constructor(string $material, bool $isheatable,): void
    {
        $this->material = $material;
        $this->isheatable = $isheatable;
    }

    public static function createSeat(string $material, bool $isheatable): self
    {
        return new self($material, $isheatable);
    }
}
