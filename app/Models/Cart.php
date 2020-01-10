<?php

namespace App\Models;


class Cart
{
    public $items;

    public function __construct()
    {
        $this->items = session()->has('cart')
            ? session('cart')->items : collect();
    }

    public function add($product, $key)
    {
        $this->items->put($key, $product);

        session(['cart' => $this]);

    }

    public function totalPrice()
    {
        return number_format($this->total() / 100 , 2);
    }

    public function total()
    {
        return $this->items->reduce(function($total, $item) {
            return $total + $item->price;
        });
    }
}
