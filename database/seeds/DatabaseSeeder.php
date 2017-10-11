<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeed::class);
        $this->call(ClientTableSeed::class);
//         $this->call(PhonesTableSeed::class);
//         $this->call(AddressesTableSeed::class);
//         $this->call(AddressesEmailsTableSeed::class);
    }
}
