<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_has_a_formatted_price()
    {
    	$product = factory(Product::class)->create([
    		'price' => 5999
    	]);

    	$this->assertEquals('59.99', $product->getPrice());

    }

}
