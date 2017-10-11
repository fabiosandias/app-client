<?php

use Illuminate\Database\Seeder;

class AddressesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('AppClient\Address', 10)->create();
    }
}
