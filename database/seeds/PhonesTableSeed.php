<?php

use Illuminate\Database\Seeder;

class PhonesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('AppClient\Phone', 10)->create();
    }
}
