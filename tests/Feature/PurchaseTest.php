<?php

namespace Tests\Feature;

use App\Contracts\PaymentGatewayContract;
use App\Models\Cart;
use App\Models\FakePayment;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_purchase_products()
    {
        $cart = new Cart;

        $product = $this->create(Product::class);

        $cart->add($product, $product->id);

        $payment = new FakePayment;

        $this->app->instance(PaymentGatewayContract::class, $payment);

        $response = $this->post('/orders', [
            'stripeEmail' => 'test@email.com',
            'stripeToken' => $payment->getTestToken(),
        ]);

        $order = Order::where('email', 'test@email.com')->first();

        $this->assertNotNull($order);

        $response->assertRedirect('/orders/'. $order->id);

        $this->get('/orders/' . $order->id)
            ->assertSee($order->email)
            ->assertSee($product->name);

        $this->assertEquals($product->getPrice(), $payment->totalCharged());

    }

    /**
     * @test
     */
    public function it_creates_orders_after_purchase()
    {
        $cart = new Cart;

        $product = $this->create(Product::class);

        $cart->add($product, $product->id);

        $payment = new FakePayment;

        $this->app->instance(PaymentGatewayContract::class, $payment);

        $this->post('/orders', [
            'stripeEmail' => 'test@email.com',
            'stripeToken' => $payment->getTestToken(),
        ]);

        $order = Order::where('email', 'test@email.com')->first();

        $this->assertNotNull($order);

        $this->assertEquals(1, $order->products->count());

    }



}
