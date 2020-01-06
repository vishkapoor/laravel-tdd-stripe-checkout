<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_purchase_test()
    {
        $product = $this->create(Product::class);

        $cart = new Cart;

        $cart->add($product, $product->id);

        $payment = new FakePayment;

        $this->post('/orders', [
            'stripeEmail' => 'test@email.com',
            'stripeToken' => $payment->getTestToken(),
        ]);

        $this->assertEquals($product->price, $payment->totalCharge()); 

    }

}
