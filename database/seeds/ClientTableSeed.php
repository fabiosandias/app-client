<?php

use Illuminate\Database\Seeder;

class ClientTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('AppClient\Client', 10)->create()->each(function ($u){
            $u->addresses()->save(factory('AppClient\Address')->make());
            $u->addressEmails()->save(factory('AppClient\AddressEmail')->make());
            $u->phones()->save(factory('AppClient\Phone')->make());
        });

    }
}
