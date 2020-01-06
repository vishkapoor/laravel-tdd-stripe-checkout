<?php

namespace App\Models;


class Cart 
{
    public $items;

    public function __construct()
    {
        $this->items = collect();
        if(session()->has('cart')) {
            $this->items = session('cart')->items;
        }

    }

    public function add($product, $key)
    {
        $this->items->put($key, $product);
        session()->put('cart', $this);

    }

    public function totalPrice() 
    {
        $totalPrice = $this->items->reduce(function($total, $item) {
            return $total + $item->price;
        });

        return number_format($totalPrice / 100 , 2);
    }
}