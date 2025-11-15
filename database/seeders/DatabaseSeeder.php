<?php

namespace Database\Seeders;

use App\Models\Speaker;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::createOrFirst([
            'email' => 'admin@test.com'
        ], [
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => '123456',
        ]);

        Speaker::factory(100)->create()->each(function ($speaker) {
            $speaker->talks()->saveMany(
                \App\Models\Talk::factory(rand(1, 5))->make()
            );
        });
    }
}
