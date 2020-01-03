<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_the_product_list()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'Test product description',
            'price' => 2999
        ]);

        $response = $this->get(route('products.index'));

        $response
            ->assertSee('Test Product')
            ->assertSee('29.99');
    }

}
