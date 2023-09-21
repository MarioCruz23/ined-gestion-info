<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Regina Peña',
            'email' => 'regina.pena@gmail.com',
            'password' => Hash::make('reg12345'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Mara',
            'email' => 'mara.1243@gmail.com',
            'password' => Hash::make('mara12345'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Secretaria',
            'email' => 'secre.1970@gmail.com',
            'password' => Hash::make('secretaria'),
            'role' => 'admin',
        ]);
    }
}
