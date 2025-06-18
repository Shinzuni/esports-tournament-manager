<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Organization;
use App\Models\Team;
use App\Models\Tournament;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'admin@example.com',
            'role'  => 'admin',
        ]);

        User::factory(3)->create(['role' => 'organizer']);

        User::factory(3)->create(['role' => 'guest']);

        User::factory(3)->create(['role' => 'user']);

        Organization::factory(3)->create()->each(function ($org) {
            Team::factory(2)->create([
                'organization_id' => $org->id,
                'created_by' => User::inRandomOrder()->first()->id,
            ]);
        });

        Tournament::factory(5)->create([
            'organizer_id' => User::where('role', 'organizer')->inRandomOrder()->first()->id,
        ]);
    }
}
