<?php

use Illuminate\Database\Seeder;
use App\OrderDetails;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetails::truncate();
        factory(OrderDetails::class, 10)->create();
    }
}
