<?php

namespace Devise;

class Money
{
    private $amount;

    private $currency;

    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getCurrency(){
        return $this->currency;
    }

}