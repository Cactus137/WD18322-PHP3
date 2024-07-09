<?php

use Oop\ClassA;
use Oop\ClassB;
use Oop\VPBank;
use Oop\HDBank;
use Oop\ABBank;

require "ClassA.php";
require "ClassB.php";
require "AbtractBank.php";
require "VPBank.php";
require "InterfaceBank.php";
require "HDBank.php";
require "ABBank.php";

/* Day 1 */
// // Tinh dong goi
// $person = new ClassA("John", "Blue", 25);
// $person->show();

// // echo $person->getName();

// // Age accessible because it is public
// // $person->age = 30;
// // $person->show();

// // Name not accessible because it is private
// // $person->name = "Jane";
// // $person->show(); 

// echo "----------<br>";

// // Tinh ke thua
// $personTwo = new ClassB("Jane", "Red", 30);
// $personTwo->show();

// $personTwo->setColor("Pink");
// $personTwo->show();

// echo "----------<br>";

// $personTwo->showStatic();
// // or
// echo "----------<br>";
// ClassB::showStatic();

// // Tinh truu tuong
// echo "----------<br>";

// $VPBank = new VPBank("John", "123456", 1000);
// $VPBank->recharge(500);
// $VPBank->withdraw(200);
// $VPBank->show();

/* Day 2 */

$you = new HDBank("Cactus", "cactus137", 50000);
$me = new ABBank("Ryan", "ryan105", 10000);

$you->show();
$me->show();

$you->transferMoney($me, 2000);
echo "-----------------------------<br> ";

$you->show();
$me->show();

$me->transferMoney($you, 2000);
echo "-----------------------------<br> ";

$you->show();
$me->show();

$me->transferMoney($you, 2000000);
echo "-----------------------------<br> ";
