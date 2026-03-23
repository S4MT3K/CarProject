<?php
function myAutoloader($className ): void
{
    $classFile = "Class/".$className . '.php'; //Class/Kunde.php

    if (file_exists($classFile)) {
        require_once $classFile;
    }
}
spl_autoload_register('myAutoloader');




$BMW_Engine = Engine::createEngine(Constants::ENGINE_TYPE_D);

$lightTypeConstants = [Constants::LIGHT_TYPE_LED, Constants::LIGHT_TYPE_HALOGEN];
$wheelTypeConstants = [Constants::WHEEL_TYPE_FL, Constants::DOOR_TYPE_FR, Constants::WHEEL_TYPE_RR, Constants::DOOR_TYPE_RL];
$doorTypeConstants = [Constants::DOOR_TYPE_FL, Constants::DOOR_TYPE_FR, Constants::DOOR_TYPE_RL, Constants::DOOR_TYPE_RR];
$windowTypeConstants_Sides = [Constants::WINDOW_TYPE_FL, Constants::WINDOW_TYPE_FR, Constants::WINDOW_TYPE_RL, Constants::WINDOW_TYPE_RR];
$windowTypeConstants_Rear_Front = [Constants::WINDOW_TYPE_FL, Constants::WINDOW_TYPE_FR, Constants::WINDOW_TYPE_RL, Constants::WINDOW_TYPE_RR];

$BMW = Car::createCar("White", "BMW", "180210", 35, Engine::createEngine(Constants::ENGINE_TYPE_P),
    Light::createMultipleLights($lightTypeConstants,true, true, 20, 0),
    Wheel::createMultipleWheels($wheelTypeConstants, Constants::WHEEL_MATERIAL_A, "black", 19),
    Door::createMultipleDoors($doorTypeConstants,Window::createMultipleWindows($windowTypeConstants_Sides,false, true, true)),
    Window::createMultipleWindows($windowTypeConstants_Rear_Front,false, true, true), [Seat::createSeat(Constants::SEAT_MATERIAL_L, true)], 150);


var_dump($BMW);

