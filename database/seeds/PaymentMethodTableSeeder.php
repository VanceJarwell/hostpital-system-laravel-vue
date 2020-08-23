<?php
use App\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodTableSeeder extends Seeder
{
  	public function run()
  	{
        $user = new PaymentMethod;
        $user->name = "COD";
        $user->position = "0";
        $user->status = 1;
        $user->function = "cod";
        $user->save();

        $user = new PaymentMethod;
        $user->name = "Credit Card";
        $user->position = "1";
        $user->status = 1;
        $user->function = "credit_card";
        $user->save();

        $user = new PaymentMethod;
        $user->name = "Alipay";
        $user->position = "2";
        $user->status = 1;
        $user->function = "alipay";
        $user->save();
    }
}
