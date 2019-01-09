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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->sentence(2),
        'short' => $faker->text(140),
        'body' => $faker->text(200),
    ];
});

$factory->define(App\Razas::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->sentence(2),
        'descripcion' => $faker->text(20),
        'idusuario' => 1,
    ];
});

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->sentence(2),
        'direccion' => $faker->address(),
        'email' => $faker->email(),
        'descripcion' => $faker->address(),
        'sexo' => 'masculino',
    ];
});

$factory->define(App\Mascota::class, function (Faker\Generator $faker) {

    return [
        'idcliente' => 1,
        'idraza' => 1,
        'nombre' => $faker->name(),
        'descripcion' => $faker->text(22),
        'fechaNacimiento' => $faker->date('Y-m-d'),
        'peso' => 50,
    ];
});


$factory->define(App\Agenda::class, function (Faker\Generator $faker) {

    return [
        'idmascota' => 1,
        'descripcion' => $faker->text(20),
        'fechaDesde' => $faker->date('Y-m-d'),
        'fechaHasta' => $faker->date('Y-m-d'),
        'fechaFinalizacion' => $faker->date('Y-m-d'),
    ];
});