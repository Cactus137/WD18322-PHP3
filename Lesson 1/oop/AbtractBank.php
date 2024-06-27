<?php

namespace Oop;

abstract class AbtractBank
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

    public abstract function recharge($money);
    // {} abstract method haven't any body
    public abstract function withdraw($money);
    public abstract function show();
}
