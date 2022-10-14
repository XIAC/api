<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'user'.Str::random(3),
            'email' => 'correo'.Str::random(4).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'user'.Str::random(3),
            'email' => 'correo'.Str::random(4).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'user'.Str::random(3),
            'email' => 'correo'.Str::random(4).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
