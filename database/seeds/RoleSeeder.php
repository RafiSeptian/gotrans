<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $roles = [
        //     'Admin', 'User', 'Driver'
        // ];

        // foreach ($roles as $role) {
        //     Role::create([
        //         'display_name' => $role,
        //         'name' => strtolower($role)
        //     ]);
        // }

        Role::create([
            'name' => 'driver',
            'display_name' => 'Driver'
        ]);
    }
}
