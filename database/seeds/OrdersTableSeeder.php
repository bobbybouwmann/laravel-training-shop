<?php

use App\Order;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $range = collect(range(1001, 1020));

        $range->each(function ($invoiceNumber) {
            /** @var Order $order */
            $order = factory(Order::class)->create([
                'invoice_number' => $invoiceNumber,
            ]);

            /** @var User $user */
            $user = User::inRandomOrder()->first();
            $user->orders()->save($order);

            $products = Product::all()->random(2);
            $products->each(function (Product $product) use ($order) {
                $order->products()->attach($product, [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => random_int(1, 2),
                ]);
            });
        });
    }
}
