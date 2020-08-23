<?php
use App\ShippingMethod;
use Illuminate\Database\Seeder;

class ShippingMethodTableSeeder extends Seeder
{
  	public function run()
  	{
        $user = new ShippingMethod;
        $user->name = "Pickup";
        $user->position = "0";
        $user->status = 1;
        $user->function = "pick_up";
        $user->save();

        $user = new ShippingMethod;
        $user->name = "Grab Express";
        $user->position = "1";
        $user->status = 1;
        $user->function = "grab_express";
        $user->save();

        $user = new ShippingMethod;
        $user->name = "Jojo Pasabay";
        $user->position = "2";
        $user->status = 1;
        $user->function = "jojo_pasabay";
        $user->save();

        $user = new ShippingMethod;
        $user->name = "Lalamove";
        $user->position = "3";
        $user->status = 1;
        $user->function = "lalamove";
        $user->save();
    }
}
