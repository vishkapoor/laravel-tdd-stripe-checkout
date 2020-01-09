<?php

namespace App\Models\PaymentProviders;

use App\Contracts\PaymentGatewayContract;
use Stripe\Charge;

class StripePayment implements PaymentGatewayContract
{
	protected $stripeConfig;

	public function __construct()
	{
		$this->stripeConfig = [
			'api_key' => config('stripe.test_secret')
		];
	}

    public function charge($total, $token)
    {
        Charge::create([
		  'amount' => $total,
		  'currency' => 'gbp',
		  'source' => $token,
		], $this->stripeConfig);

    }

}
