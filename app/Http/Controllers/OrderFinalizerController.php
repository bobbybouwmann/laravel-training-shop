<?php

namespace App\Http\Controllers;

use App\Events\OrderFinalized;
use App\Order;
use Illuminate\Http\RedirectResponse;

class OrderFinalizerController extends Controller
{
    public function store(Order $order): RedirectResponse
    {
        $order->update([
            'status' => Order::STATUS_PROCESSING,
        ]);

        event(new OrderFinalized($order));

        return redirect()->route('orders.show', $order);
    }
}
