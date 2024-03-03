<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\User;
use App\Models\Organizer;
use App\Models\Client;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create();
        User::factory()->count(15)->create()->each(function ($user) {
            if ($user->role === 'organizer') {
                Organizer::create(['user_id' => $user->id]);
            } elseif ($user->role === 'client') {
                Client::create(['user_id' => $user->id]);
            }
        });
    }
}
