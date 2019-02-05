<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
    	$products = Product::with(['categories', 'image', 'tax'])->get();

    	return response()->json([
    		'products' => $products
    	]);
    }
}
