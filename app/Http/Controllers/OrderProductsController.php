<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderProductRequest;
use App\Order;
use App\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderProductsController extends Controller
{
    public function create(Order $order): View
    {
        $order->load('products');

        $totalPrice = $order->products->sum(function (Product $product) {
            return $product->pivot->price * $product->pivot->quantity;
        });

        $products = Product::with(['categories', 'image', 'tax'])->get();

        return view('orders.products.create', compact('order', 'products', 'totalPrice'));
    }

    public function store(Order $order, OrderProductRequest $request): RedirectResponse
    {
        $product = Product::findOrFail($request->get('product_id'));

        $order->products()->attach($product, [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->get('quantity', 1),
        ]);

        return redirect()->route('orders.products.create', $order);
    }
}
