<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            PageSeeder::class,
            CategorySeeder::class,
            CourseSeeder::class,
            CollectionSeeder::class,
            CompletionSeeder::class,
            EnrollmentSeeder::class,
            FollowSeeder::class
        ]);
    }
}
