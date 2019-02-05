<?php

namespace Tests\Feature\Api;

use App\Category;
use App\Image;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    public function testFetchingProducts()
    {
    	$products = factory(Product::class, 5)->create();

        $response = $this->get('/api/products');

		$response
			->assertStatus(200)
			->assertJsonCount(5, 'products')
			->assertJsonStructure([
        		'products' => [
	        		'*' => [
	        			'id',
	        			'name',
	        			'price',
	        			'sku',
	        			'stock',
	        			'active',
	        			'tax' => [
	        				'id',
	        				'name',
	        				'value',
	        			],
	        		],
	        	],
        	]);
    }

    public function testFetchingProductsWithoutRelations()
    {
    	$products = factory(Product::class, 2)->create();

        $response = $this->get('/api/products');

		$response
			->assertStatus(200)
			->assertJsonCount(2, 'products')
			->assertJsonFragment([
				'categories' => [],
				'image' => null,
			]);
    }

    public function testFetchingProductsWithImage()
    {
    	$product = factory(Product::class)->create();

    	$image = factory(Image::class)->create([
    		'imageable_type' => Product::class,
        	'imageable_id' => $product->id,
    	]);

        $response = $this->get('/api/products');

		$response
			->assertStatus(200)
			->assertJsonCount(1, 'products')
			->assertJsonStructure([
        		'products' => [
	        		'*' => [
	        			'id',
	        			'name',
	        			'price',
	        			'sku',
	        			'stock',
	        			'active',
	        			'tax' => [
	        				'id',
	        				'name',
	        				'value',
	        			],
	        			'image' => [
	        				'imageable_id',
	        				'imageable_type',
	        				'path',
	        			]
	        		],
	        	],
        	]);
    }

    public function testFetchingProductsWithMultipleCategories()
    {
    	$product = factory(Product::class)->create();

    	$categories = factory(Category::class, 2)->create();

    	$product->categories()->sync($categories);

        $response = $this->get('/api/products');

		$response
			->assertStatus(200)
			->assertJsonCount(1, 'products')
			->assertJsonStructure([
        		'products' => [
	        		'*' => [
	        			'id',
	        			'name',
	        			'price',
	        			'sku',
	        			'stock',
	        			'active',
	        			'tax' => [
	        				'id',
	        				'name',
	        				'value',
	        			],
	        			'image',
	        			'categories' => [
	        				'*' => [
	        					'id',
	        					'name',
	        					'description',
	        				],
	        			],
	        		],
	        	],
        	]);
    }
}
