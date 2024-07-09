<?php

namespace oop;

class ABBank implements InterfaceBank
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
            echo "ABBank: The amount of money in the account is not enough!<br>";
        } else {
            $this->money -= $money + 25;
            $person->money += $money;
            echo "ABBank: Transfer is successfully (Transaction fee: $25 !<br>";
            echo "ABBank: Transfer is successfully!<br>";
        }
    }

    public function show()
    {
        echo "Account: $this->name ($this->account) <br>";
        echo "Money: $$this->money <br>";
        echo "-----<br>";
    }
}
