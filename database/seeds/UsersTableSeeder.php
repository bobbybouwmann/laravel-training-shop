<?php

use App\Company;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->state('admin')->create([
            'email' => 'bobbybouwmann@gmail.com',
        ]);

        factory(User::class, 10)->create()->each(function (User $user) {
            $company = factory(Company::class)->make();

            $user->company()->save($company);
        });
    }
}
