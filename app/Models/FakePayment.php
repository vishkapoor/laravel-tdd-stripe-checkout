<?php

namespace App\Models;

use App\Contracts\PaymentGatewayContract;
use Illuminate\Database\Eloquent\Model;

class FakePayment extends Model implements PaymentGatewayContract
{

    private $total;

    public function getTestToken()
    {
        return 'valid-token';
    }

    public function totalCharged()
    {
        return number_format($this->total / 100, 2);
    }

    public function total()
    {
        return $this->total;
    }

    public function charge($total, $token)
    {
        $this->total = $total;
    }
}
