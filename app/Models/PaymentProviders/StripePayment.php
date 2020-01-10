<?php

namespace App\Models\PaymentProviders;

use App\Contracts\PaymentGatewayContract;
use Stripe\Charge;

class StripePayment implements PaymentGatewayContract
{
	protected $stripeConfig;
    private $total;

	public function __construct()
	{
		$this->stripeConfig = [
			'api_key' => config('stripe.secret')
		];
	}

    public function charge($total, $token)
    {
        $charge = Charge::create([
		  'amount' => $total,
		  'currency' => 'gbp',
		  'source' => $token,
		], $this->stripeConfig);

        $this->total = $charge->amount;

    }

    public function total()
    {
        return $this->total;
    }

}
