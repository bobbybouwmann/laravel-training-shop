<?php

use App\Product;
use App\Tax;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxes = Tax::all();

        factory(Product::class, 20)->create([
            'tax_id' => $taxes->random(1)->first()->id,
        ]);
    }
}
