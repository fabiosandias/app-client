<?php

use Illuminate\Database\Seeder;

class AddressesEmailsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('AppClient\AddressEmail', 10)->create();
    }
}
