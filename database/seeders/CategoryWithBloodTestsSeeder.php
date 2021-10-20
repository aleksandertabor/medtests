<?php

namespace Database\Seeders;

use Domain\BloodTests\Models\BloodTest;
use Domain\Categories\Models\Category;
use Illuminate\Database\Seeder;

class CategoryWithBloodTestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->has(BloodTest::factory()->count(10))
            ->count(50)
            ->create();
    }
}
