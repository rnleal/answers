<?php

namespace App\Actions;

class Promos
{
    protected $promos = [];

    public static function make()
    {
        return new static;
    }

    public function addPromo($promo)
    {
        $promo['discount'] = $promo['price'] / $promo['quantity'];
        $promo['name'] = 'First Promo';

        array_push($this->promos, $promo);

        return $this;
    }

    public function addAnotherPromo($promo)
    {
        $promo['discount'] = $promo['price'] / $promo['quantity'];
        $promo['name'] = 'Second Promo';

        array_push($this->promos, $promo);

        return $this;
    }
  
    public function evaluate()
    {
        
      $deals =  collect($this->promos)->sortByDesc('discount');

      return 'The ' . $deals->first()['name'] . ' is a better deal. You save ' .  $deals->first()['discount'] - $deals->last()['discount'];
    }


}