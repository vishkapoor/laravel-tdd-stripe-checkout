<?php

namespace App\Contracts;

interface PaymentGatewayContract
{
    public function charge($total, $token);
}