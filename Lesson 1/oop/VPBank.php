<?php

namespace Oop;

class VPBank extends AbtractBank
{
    public function recharge($money)
    {
        $this->money += $money;
    }

    public function withdraw($money)
    {
        $this->money -= $money;
    }

    public function show()
    {
        echo "Name: $this->name <br>";
        echo "Account: $this->account <br>";
        echo "Money: $this->money <br>";
    }
}
