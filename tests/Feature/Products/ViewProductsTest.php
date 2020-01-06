<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_the_product_list()
    {
        $product = $this->create(Product::class);

        $response = $this->get('/products');

        $response
            ->assertSee($product->name)
            ->assertSee($product->getPrice());
    }

}
