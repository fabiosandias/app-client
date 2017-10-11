<?php

use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('AppClient\User', 10)->create()->each(function ($u){
            $u->users()->save(factory('AppClient\Client')->make());
        });
    }
}
