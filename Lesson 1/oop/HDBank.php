<?php

namespace oop;

class HDBank implements InterfaceBank
{
    public $name;
    public $account;
    public $money;

    public function __construct($name, $account, $money)
    {
        $this->name = $name;
        $this->account = $account;
        $this->money = $money;
    }

    public function transferMoney($person, $money)
    {
        if ($money > $this->money) {
            echo "HDBank: The amount of money in the account is not enough!<br>";
        } else {
            $this->money -= $money;
            $person->money += $money;
            echo "HDBank: Transfer is successfully!<br>";
        }
    }

    public function show()
    {
        echo "Account: $this->name ($this->account) <br>";
        echo "Money: $$this->money <br>";
        echo "-----<br>";
    }
}
