<?php
use App\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new OrderStatus;
        $user->name = "Waiting for Agent's Call";
        $user->save();

        $user = new OrderStatus;
        $user->name = "Waiting for Payment";
        $user->save();

        $user = new OrderStatus;
        $user->name = "Processing Order";
        $user->save();

        $user = new OrderStatus;
        $user->name = "Dispatched for Delivery";
        $user->save();

        $user = new OrderStatus;
        $user->name = "Completed";
        $user->save();
    }
}
