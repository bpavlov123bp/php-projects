<?php
require_once('view.php');
class ConverterModel{
    private $baseCurrency = 0;
    private $rates = [
        'BGN' => 1.0,
        'USD' => 1.76,
        'EUR' => 1.96,
        'GBP' => 2.22,
        'CHF' => 2.01
    ];
    private $view;

    


    public function setCurrency($amount, $currency){
        if(isset($this->rates[$currency])){
            $this->baseCurrency = $amount * $this->rates[$currency];
        }
    }

    public function getCurrency($currency){
        if(isset($this->rates[$currency])){
            $rate = 1 * $this->rates[$currency];
            return round($this->baseCurrency / $rate, 2);
        } else {
            return 0;
        }
    }

    public function getRates(){
        return $this->rates;
    }
}