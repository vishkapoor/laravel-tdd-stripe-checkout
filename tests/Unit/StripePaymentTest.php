<?php

namespace Tests\Unit;

use App\Models\PaymentProviders\StripePayment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;
use Tests\TestCase;


class StripePaymentTest extends TestCase
{
    use RefreshDatabase;

    private $lastCharge;
    private $config;

    public function setUp() : void
    {
        parent::setUp();
        $this->config = [
            'api_key' => config('stripe.secret')
        ];
        $this->lastCharge = $this->lastCharge();
    }


    /** @test */
    public function it_can_make_charges_with_a_valid_token()
    {
        $payment = new StripePayment;

        $token = Token::create([
          'card' => [
                'number' => '4242424242424242',
                'exp_month' => 1,
                'exp_year' => date('Y') + 1,
                'cvc' => '123',
            ],
        ], $this->config);


        $payment->charge(1000, $token->id);

        $charges = Charge::all(['limit' => 1], $this->config);

        $this->assertCount(1, $this->newCharges());

        $this->assertEquals('1000', $this->lastCharge()->amount);
   }

    private function lastCharge()
    {
        return Charge::all(['limit' => 1], $this->config)->data[0];
    }

    private function newCharges()
    {
        return Charge::all([
            'limit' => 1,
            'ending_before' => $this->lastCharge->id
        ], $this->config)->data;
    }

}
