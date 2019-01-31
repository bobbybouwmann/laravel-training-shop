<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::with(['categories.image', 'image', 'tax'])->get();

        return view('orders.create', compact('products'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        /** @var Order $order */
        $order = $user->orders()->create([
            'status' => Order::STATUS_CREATED,
        ]);

        return redirect()->route('orders.products.create', $order->id);
    }

    public function show(Order $order)
    {
        $order->load('products.image', 'user');

        $totalPrice = $order->products->sum(function (Product $product) {
            return $product->pivot->price * $product->pivot->quantity;
        });

        return view('orders.show', compact('order', 'totalPrice'));
    }
}
