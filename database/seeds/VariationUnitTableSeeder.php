<?php
use App\VariationUnit;
use Illuminate\Database\Seeder;

class VariationUnitTableSeeder extends Seeder
{
  	public function run()
  	{
        $user = new VariationUnit;
        $user->unit = "Kg";
        $user->save();

        $user = new VariationUnit;
        $user->unit = "Pack";
        $user->save();

        $user = new VariationUnit;
        $user->unit = "Piece";
        $user->save();
    }
}
