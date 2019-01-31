<?php

namespace App\Listeners;

use App\Events\OrderFinalized;
use App\Mail\OrderFinalizedNotification;
use Illuminate\Support\Facades\Mail;

class SendOrderFinalizedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param OrderFinalized $event
     * @return void
     */
    public function handle(OrderFinalized $event)
    {
        $order = $event->order;

        Mail::to($order->user)->send(new OrderFinalizedNotification($order));
    }
}
