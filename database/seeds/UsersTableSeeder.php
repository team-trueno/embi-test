<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->states('admin', 'superadmin')->create([
            'name' => env('SEEDER_USER_NAME', 'Jon'),
            'apellido' => env('SEEDER_USER_APELLIDO', 'Doe'),
            'usuario' => env('SEEDER_USER_USUARIO', 'test'),
            'pais' => env('SEEDER_USER_PAIS', 'Argentina'),
            'email' => env('SEEDER_USER_EMAIL', 'test@test.com'),
            'password' => Hash::make((env('SEEDER_USER_PASSWORD', 'password'))),
        ]);

        factory(User::class, 5)->states('jugador')->create();

    }
}
