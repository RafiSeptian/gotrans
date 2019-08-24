<?php

use App\User;
use Illuminate\Database\Seeder;

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
                'role_id' => 2,
                'name' => 'Ricard',
                'email' => 'ricard17@me.com',
                'username' => 'ricard17',
                'password' => bcrypt('ricard17'),
            ],
            [
                'role_id' => 3,
                'name' => 'Ricard Driver',
                'email' => 'ricard10@me.com',
                'username' => 'ricard10',
                'password' => bcrypt('ricard10'),
            ],
        ];

        foreach ($users as $user => $value) {
            User::create($value);
        }
    }
}
