<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $users = [
            [
                'name' => 'Mimikyu',
                'email' => 'kyu@mail.com',
                'password' => 'asdf1234'
            ],
            [
                'name' => 'Caterina Bianchetti',
                'email' => 'cateb@mail.com',
                'password' => 'Damadellaluceb!tch'
            ],
            [
                'name' => 'Eliero Bosco',
                'email' => 'tiffany@mail.com',
                'password' => 'Miraildito'
            ],
            [
                'name' => 'Tommaso Crociera',
                'email' => 'tommy@mail.com',
                'password' => 'Tomtom82'
            ],
            [
                'name' => 'Gerardo Maggiordomo',
                'email' => 'butler@mail.com',
                'password' => 'thisispassword!'
            ],
            [
                'name' => 'Orlando Bocciolo',
                'email' => 'fiorellino@mail.com',
                'password' => 'password12345'
            ],
            [
                'name' => 'Daniele Scoglierarossa',
                'email' => 'dani@mail.com',
                'password' => 'theChosenOneissimo'
            ],
            [
                'name' => 'Sarta Celere',
                'email' => 'taysw@mail.com',
                'password' => 'P@ss123!'
            ],
            [
                'name' => 'Guglielmo Cancelli',
                'email' => 'astana@mail.com',
                'password' => 'noncielodicono!!1!'
            ],
            [
                'name' => 'Donaldo Trombone',
                'email' => 'st0rm1love@mail.com',
                'password' => 'moreTexlessMex'
            ]
        ];

        foreach ($users as $userData) {
            $user = new User();
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->password = bcrypt($userData['password']);
            $user->save();
        }
    }
}
