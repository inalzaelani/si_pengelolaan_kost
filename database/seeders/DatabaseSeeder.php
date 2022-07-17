<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'pemilik',
            'password' => bcrypt('pemilik'),
            'level' => 'pemilik'
        ]);
        DB::table('users')->insert([
            'username' => 'pengelola',
            'password' => bcrypt('pengelola'),
            'level' => 'pengelola'
        ]);
    }
}
