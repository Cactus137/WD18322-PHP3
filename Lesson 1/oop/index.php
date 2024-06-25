<?php

use Oop\ClassA;

require "ClassA.php";

$person = new ClassA("John", "Blue", 25);
$person->show();

// Age accessible because it is public
// $person->age = 30;
// $person->show();

// Name not accessible because it is private
// $person->name = "Jane";
// $person->show();


