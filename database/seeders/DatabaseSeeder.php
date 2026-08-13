<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\VisitorsSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        $this->call(VisitorsSeeder::class);
        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@yn.in',
        //     'password' => Hash::make('12345'),
        // ]);
    }
}
