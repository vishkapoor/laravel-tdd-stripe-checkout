<?php

namespace Tests\Unit;

use App\Models\FakePayment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class FakePaymentTest extends TestCase
{
   use RefreshDatabase;

   /** @test */
   public function it_has_a_total_charged()
   {
        $payment = new FakePayment;

        $payment->charge(1000, $payment->getTestToken());

        $this->assertEquals('10.00', $payment->totalCharged());
   }

   /**
    * @test
    */
   public function it_has_a_total_charged_in_numbers()
   {
        $payment = new FakePayment;

        $payment->charge(1000, $payment->getTestToken());

        $this->assertEquals(1000, $payment->total());
   }

}
