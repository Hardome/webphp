<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            [
                'name' => 'Бедрин Семен Олегович',
                'email' => 'bedrin@example.com',
                'login' => 'bedrin',
                'isAdmin' => false,
                'created_at' => now(),
                'password' => '$2y$12$imkz9a2rkqzfHIfnFeJjnes.aHKvYV1GOUoY4Z/XPHNAXguXFCOVO' //user
            ],
            [
                'name' => 'Иванов Иван Иванович',
                'email' => 'admin@example.com',
                'login' => 'admin',
                'isAdmin' => true,
                'created_at' => now(),
                'password' => '$2y$12$af/zIyHR.jLYcHbfuFpzf.58KywB7kadDrcVDJoCrsYTv/hgt39fC' //admin
            ]
        ]);
    }
}
