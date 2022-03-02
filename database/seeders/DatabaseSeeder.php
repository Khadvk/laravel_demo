<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        DB::table('admin')->insert([
            [
                'name' => 'Admin',
                'role_id' => '1',
                'created_by' => '1',
                'modified_by' => '1',
                'fullname' => 'Administrator',
                'email' => 'admin@xxx.com',
                'password' => bcrypt('admin123'),
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'User',
                'role_id' => '0',
                'created_by' => '1',
                'modified_by' => '1',
                'fullname' => 'Normal user',
                'email' => 'user@xxx.com',
                'password' => bcrypt('admin123'),
            ]
        ]);
    }
}
