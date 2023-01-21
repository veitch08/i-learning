<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = New User();
        $user_admin->name = 'evo';
        $user_admin->email = 'admin@gmail.com';
        $user_admin->password = bcrypt('12345678');
        $user_admin->id_role = 1;
        $user_admin->save();

        $user_admin = New User();
        $user_admin->name = 'Bambang';
        $user_admin->email = 'bambang@gmail.com';
        $user_admin->password = bcrypt('12345678');
        $user_admin->id_role = 2;
        $user_admin->save();
    }
}
