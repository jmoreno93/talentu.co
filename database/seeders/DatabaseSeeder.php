<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert(
            [
                'email' => 'moises@test.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'document_type' => 'DNI',
                'document_number' => '72391710',
            ]
        );
        \App\Models\User::factory(1000)->create();
        \App\Models\JobOffer::factory(1000)->create();
        \App\Models\UserJobOffer::factory(100)->create();
    }
}
