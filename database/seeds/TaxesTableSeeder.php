<?php

use App\Tax;
use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tax::class)->state('nine-percent')->create();
        factory(Tax::class)->state('twenty-one-percent')->create();
    }
}
