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
                'name' => 'Gianluca',
                'email' => 'giangi@bool.it',
                'password' => 'pippo123'
            ],
            [
                'name' => 'Mauro',
                'email' => 'mauro@bool.it',
                'password' => 'giangi123'
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
