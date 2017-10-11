<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(AppClient\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(AppClient\Client::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'type' => $faker->randomElement(['Person', 'Company']),
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'date_birth' => $faker->date(),
        'cpf' => $faker->numberBetween(0, 14),
        'legal_name' => $faker->name,
        'responsible_name' => $faker->name,
        'cnpj' => $faker->numberBetween(0, 18),
        'state_registration' => $faker->numberBetween(0, 14),
        'excluded' => $faker->boolean(),
        'user_id' => random_int(\DB::table('users')->min('id'), \DB::table('users')->max('id'))
    ];
});


$factory->define(AppClient\Address::class, function (Faker\Generator $faker) {
    return [
        'street' => $faker->streetName,
        'number' => $faker->numberBetween(1, 5000),
        'state' => $faker->randomElement(['MG', 'SP', 'BA', 'RJ']),
        'district' => $faker->streetAddress,
        'complement' => $faker->randomElement(['Casa', 'Apartamento', 'Casa fundo']),
        'zip_code' => $faker->postcode,
        'city' => $faker->city,
        'client_id' => random_int(\DB::table('clients')->min('id'), \DB::table('clients')->max('id'))
    ];
});

$factory->define(AppClient\AddressEmail::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'client_id' => random_int(\DB::table('clients')->min('id'), \DB::table('clients')->max('id'))
    ];
});
$factory->define(AppClient\Phone::class, function (Faker\Generator $faker) {
    return [
        'num_phone' => $faker->phoneNumber(),
        'client_id' => random_int(\DB::table('clients')->min('id'), \DB::table('clients')->max('id')),
    ];
});