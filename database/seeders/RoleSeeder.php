<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            ['nama' => 'admin', 'slug' => 'admin'],
            ['nama' => 'guru', 'slug' => 'guru'],
            ['nama' => 'siswa', 'slug' => 'siswa']
        ];

        DB::table('roles')->insert($role);
    }
}
