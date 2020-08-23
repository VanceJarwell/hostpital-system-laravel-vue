<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*$this->call(UserTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(TaxTableSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);
        $this->call(ShippingMethodTableSeeder::class);
        $this->call(CustomerGroupTableSeeder::class);*/
        $this->call(OrderStatusTableSeeder::class);
    }
}
