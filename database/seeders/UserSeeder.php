<?php
namespace Database\Seeders;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'      => 'Admin',
                'email'     => 'admin@gmail.com',
                'password'  => Hash::make('12345678'),
                'utype'     => 'adm',
            ],
        ]);
    }
}