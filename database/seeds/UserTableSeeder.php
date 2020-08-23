<?php
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
  	public function run()
  	{
        $user = new User;
        $user->firstname = "Jay-Ar";
        $user->lastname = "Datol";
        $user->email = "jayar@harperandhill.com";
        $user->contact = "1234567";
        $user->password = bcrypt('secret');
        $user->status = 1;
        $user->isAdmin = 1;
        $user->save();
    }
}
