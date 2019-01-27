<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        $orders = Order::with(['products', 'user'])->get();

        return view('dashboard', compact('orders'));
    }
}
