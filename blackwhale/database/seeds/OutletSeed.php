<?php

use Illuminate\Database\Seeder;

class OutletSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Outlet::class, 20)->create();
    }
}
