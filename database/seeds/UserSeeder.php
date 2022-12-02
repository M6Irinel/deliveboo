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
                'name'      => 'Da Gianluca',
                'email'     => 'primo@ristorante.it',
                'password'  => 'pippo123'
            ],
            [
                'name'      => 'Da Mauro',
                'email'     => 'secondo@ristorante.it',
                'password'  => 'pippo123'
            ],
            [
                'name'      => 'da Alessandro',
                'email'     => 'terzo@ristorante.it',
                'password'  => 'pippo123'
            ],
            [
                'name'      => 'da Massimo',
                'email'     => 'quarto@ristorante.it',
                'password'  => 'pippo123'
            ],
            [
                'name'      => 'Da Tiziano',
                'email'     => 'quinto@ristorante.it',
                'password'  => 'pippo123'
            ],
            [
                'name'      => 'Osteria del Borgo',
                'email'     => 'sesto@ristorante.it',
                'password'  => 'pippo123'
            ],
            [
                'name'      => 'Il forno del Vicolo',
                'email'     => 'settimo@ristorante.it',
                'password'  => 'pippo123'
            ],
            [
                'name'      => 'Bottega della Carne',
                'email'     => 'ottavo@ristorante.it',
                'password'  => 'pippo123'
            ],
        ];

        foreach ($users as $u) {
            User::create([
                'name'      => $u['name'],
                'email'     => $u['email'],
                'password'  => Hash::make($u['password']),
                'slug'      => strtolower(str_replace(' ', '-', $u['name'])),
            ]);
        }
    }
}
