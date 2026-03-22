<?php
include "Class/Car.php";
include "Class/Constants.php";
include "Class/Engine.php";

$BMW_Engine = Engine::createEngine(Constants::ENGINE_TYPE_D);

$BMW_Engine->start();
echo $BMW_Engine->getType();

