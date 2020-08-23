<?php
use App\CustomerGroup;
use Illuminate\Database\Seeder;

class CustomerGroupTableSeeder extends Seeder
{
  	public function run()
  	{
        $user = new CustomerGroup;
        $user->name = 'Customer';
        $user->discount = 0;
        $user->showPrice = 1;
        $user->save();

        $user = new CustomerGroup;
        $user->name = 'Guest';
        $user->discount = 0;
        $user->showPrice = 1;
        $user->save();

        $user = new CustomerGroup;
        $user->name = 'B2B';
        $user->discount = 10;
        $user->showPrice = 1;
        $user->save();
    }
}
