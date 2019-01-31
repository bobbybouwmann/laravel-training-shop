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
        factory(Order::class, 20)->create()->each(function (Order $order) {
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
