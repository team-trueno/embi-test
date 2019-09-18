<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'apellido' => $faker->lastName,
        'usuario' => $faker->userName,
        'pais' => $faker->country,
        'fecha_nac' => $faker->date($format = 'Y-m-d', $max = '1990-09-02'),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreating(User::class, function ($user, $faker) {
    $user->roles()->attach(App\Role::where('name', 'user')->first());
});

$factory->afterCreatingState(User::class, 'jugador', function ($user, $faker) {
    $user->jugador()->create();
});

$factory->afterCreatingState(User::class, 'admin', function ($user, $faker) {
    $user->roles()->attach(App\Role::where('name', 'admin')->first());
});

$factory->afterCreatingState(User::class, 'superadmin', function ($user, $faker) {
    $user->roles()->attach(App\Role::where('name', 'superadmin')->first());
});
