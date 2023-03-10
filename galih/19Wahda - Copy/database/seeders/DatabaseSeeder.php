<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            ["name" => "admin", "email" => "admin@gmail.com", "password" => Hash::make('qwerty25'), "utype" => "ADM"]
        ]);

        DB::table('haris')->insert([
            ["name" => "Senin"],
            ["name" => "Selasa"],
            ["name" => "Rabu"],
            ["name" => "Kamis"],
            ["name" => "Jumat"],
            ["name" => "Sabtu"],
            ["name" => "Minggu"],
        ]);
    }
}
