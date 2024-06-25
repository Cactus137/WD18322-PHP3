<?php

namespace Oop;

class ClassA
{
    private string $name;
    protected string $color;
    public int $age;

    public function __construct($name, $color, $age)
    {
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
    }

    public function show()
    {
        echo "Name: $this->name <br>";
        echo "Color: $this->color <br>";
        echo "Age: $this->age <br>";
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
