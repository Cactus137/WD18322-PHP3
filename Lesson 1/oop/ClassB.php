<?php

namespace Oop;

class ClassB extends ClassA
{
    public function setColor($color)
    {
        $this->color = $color;
    }


    public static function showStatic()
    {
        $static = new static("Static", "Black", 40);

        echo "Static Name:" . $static->getName() .  "<br>";
        echo "Static Color:" . $static->color .  "<br>";
        echo "Static Age:" . $static->age .  "<br>";
    }
}
