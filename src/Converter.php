<?php

namespace Devise;

use Devise\Money;
use Devise\Article;

class Converter 
{
    private $currencies = [
            "EUR" => [
                "EUR" => 1,
                "USD" => 1.13,
                "YEN" => 125.10
            ],
            "USD" => [
                "USD" => 1,
                "EUR" => 0.88,
                "YEN" => 110.59
            ],
            "YEN" => [
                "YEN" => 1,
                "USD" => 0.0090,
                "EUR" => 0.008
            ]
        ];

    public function convert(Article $article, $newCurrency)
    {
        $currency = $article->getPrice()->getCurrency();

        (float)$newAmount = (float)$article->getTotal() * (float)$this->currencies[$currency][$newCurrency];

        return new Money($newAmount, $this->currencies[$newCurrency]);
    }

    public function sum($allItem, $newCurrency){
        $sum = 0;
        foreach ($allItem as $article) {
            $sum += $this->convert($article, $newCurrency)->getAmount();
        }

        return $sum;
    }
}