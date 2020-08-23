<?php
use App\Tax;
use Illuminate\Database\Seeder;

class TaxTableSeeder extends Seeder
{
  	public function run()
  	{
        $user = new Tax;
        $user->name = "VAT";
        $user->percent = "12";
        $user->save();
    }
}
