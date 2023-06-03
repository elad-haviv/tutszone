<?php

namespace Database\Seeders;

use App\Models\Category;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(7)
            ->hasCategories(5)
            ->create();
    }
}
