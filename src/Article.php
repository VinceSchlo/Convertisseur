<?php

namespace Devise;

use Devise\Money;

class Article 
{
    private $name;
    private $price;
    private $qantity;
    private $total;

    public function __construct($name, $amount, $currency, $qantity){
        $this->name = $name;
        $this->price = new Money($amount, $currency);
        $this->qantity = $qantity;
        $this->total = $this->price->getAmount() * $this->qantity;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getQantity(){
        return $this->qantity;
    }

    public function getTotal(){
        return $this->total;
    }

}
