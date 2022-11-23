<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ristorante da Gianluca',
                'email' => 'primo@ristorante.it',
                'password' => 'pippo123'
            ],
            [
                'name' => 'Ristorante da Mauro',
                'email' => 'secondo@ristorante.it',
                'password' => 'pippo123'
            ],
            [
                'name' => 'Ristorante da Alessandro',
                'email' => 'terzo@ristorante.it',
                'password' => 'pippo123'
            ],
            [
                'name' => 'Ristorante da Massimo',
                'email' => 'quarto@ristorante.it',
                'password' => 'pippo123'
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'slug' => strtolower(str_replace(' ', '-', $user['name'])),
            ]);
        }
    }
}
