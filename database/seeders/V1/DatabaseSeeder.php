<?php

namespace Database\Seeders\V1;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(2)->create(['role' => \App\Models\User::ROLE_ADMIN]);
        \App\Models\Customer::factory(2)->create();
    }
}
