<?php

use Oop\ClassA;
use Oop\ClassB;
use Oop\VPBank;

require "ClassA.php";
require "ClassB.php";
require "AbtractBank.php";
require "VPBank.php";

// Tinh dong goi
$person = new ClassA("John", "Blue", 25);
$person->show();

// echo $person->getName();

// Age accessible because it is public
// $person->age = 30;
// $person->show();

// Name not accessible because it is private
// $person->name = "Jane";
// $person->show(); 

echo "----------<br>";

// Tinh ke thua
$personTwo = new ClassB("Jane", "Red", 30);
$personTwo->show();

$personTwo->setColor("Pink");
$personTwo->show();

echo "----------<br>";

$personTwo->showStatic();
// or
echo "----------<br>";
ClassB::showStatic();

// Tinh truu tuong
echo "----------<br>";

$VPBank = new VPBank("John", "123456", 1000);
$VPBank->recharge(500);
$VPBank->withdraw(200);
$VPBank->show();
