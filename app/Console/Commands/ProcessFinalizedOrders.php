<?php

namespace App\Console\Commands;

use App\Jobs\OrderProcessed;
use App\Order;
use Illuminate\Console\Command;

class ProcessFinalizedOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process all finalized orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $orders = Order::where('status', 1)->get();

        $orders->map(function ($order) {
            $this->info(sprintf('Start processing order [%s]', $order->id));

            dispatch(new OrderProcessed($order));

            $this->info(sprintf('Order [%s] processed', $order->id));
        });
    }
}
