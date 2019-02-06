<?php

namespace Tests\Feature\Api;

use App\Category;
use App\Image;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsUnauthenticatedTest extends TestCase
{
    use RefreshDatabase;

    public function testFetchingProducts()
    {
        $products = factory(Product::class, 5)->create();

        $response = $this->get('/api/products', [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(401);
    }

    public function testFetchingProductsUsingJsonMethod()
    {
        $products = factory(Product::class, 5)->create();

        $response = $this->json('GET', '/api/products');

        $response->assertStatus(401);
    }
}
