<?php

namespace Tests\Feature\API\BloodTests;

use App\API\BloodTests\Controllers\BloodTestCategoryController;
use Domain\BloodTests\Models\BloodTest;
use Domain\Categories\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BloodTestCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function invoked_controller_shows_blood_tests_from_given_category()
    {
        $bloodTestsCount = 5;

        $category = Category::factory()->has(BloodTest::factory()->count($bloodTestsCount))->create();

        $this->get(action([BloodTestCategoryController::class], ['category' => $category]))
            ->assertSuccessful()
            ->assertJsonCount($bloodTestsCount, 'data');
    }
}
