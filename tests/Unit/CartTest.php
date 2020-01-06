<?php

namespace Tests\Unit;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function it_can_add_items_to_the_cart()
    {
        $cart = new Cart;
        
        $product = $this->create(Product::class);

        $cart->add($product, $product->id);

        $this->assertEquals(1, $cart->items->count());

    }

    /** @test */
    public function it_has_a_total_price()
    {
        $cart = new Cart;

        $products = $this->create(Product::class, [], 3);

        foreach($products as $product) {
            $cart->add($product, $product->id);
        }

       $totalPrice = number_format( $products->reduce(function($total, $product) {
            return $total + $product->price;
        }) /100, 2);

        $this->assertEquals($totalPrice, $cart->totalPrice());

    }

}
