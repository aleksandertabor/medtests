<?php

namespace Tests\Feature\API\BloodTests;

use App\API\BloodTests\Controllers\BloodTestController;
use Domain\BloodTests\Models\BloodTest;
use Domain\Categories\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BloodTestControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function index_shows_blood_tests()
    {
        $bloodTestsCount = 5;

        BloodTest::factory()->count($bloodTestsCount)->create();

        $this->get(action([BloodTestController::class, 'index']))
            ->assertSuccessful()
            ->assertJsonCount($bloodTestsCount, 'data');
    }

    /** @test */
    public function store_creates_blood_test()
    {
        $bloodTestName = 'New blood test';

        $this->post(action([BloodTestController::class, 'store'], ['name' => $bloodTestName]))
            ->assertSuccessful();

        $this->assertEquals(1, BloodTest::count());
        $this->assertEquals($bloodTestName, BloodTest::first()->name);
    }

    /** @test */
    public function show_returns_blood_test()
    {
        $bloodTest = BloodTest::factory()->create();

        $this->get(action([BloodTestController::class, 'show'], ['blood_test' => $bloodTest]))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data',
            ]);
    }

    /** @test */
    public function update_changes_blood_test()
    {
        $bloodTest = BloodTest::factory()->create();

        $newBloodTestName = 'New blood test';

        $this->patch(action([BloodTestController::class, 'update'], ['blood_test' => $bloodTest, 'name' => $newBloodTestName]))
            ->assertSuccessful();

        $this->assertEquals($newBloodTestName, BloodTest::first()->name);
    }

    /** @test */
    public function update_changes_blood_test_with_categories()
    {
        $bloodTest = BloodTest::factory()->create();

        $categories = Category::factory()->count(5)->create();

        $newBloodTestName = 'New blood test';

        $this->patch(action([BloodTestController::class, 'update'], ['blood_test' => $bloodTest, 'name' => $newBloodTestName, 'categories' => $categories->pluck('id')->toArray()]))
            ->assertSuccessful();

        $this->assertEquals($newBloodTestName, BloodTest::first()->name);
        $this->assertEquals($categories->count(), BloodTest::first()->categories()->count());
    }

    /** @test */
    public function destroy_removes_blood_test()
    {
        $bloodTest = BloodTest::factory()->create();

        $this->delete(action([BloodTestController::class, 'destroy'], ['blood_test' => $bloodTest]))
            ->assertSuccessful();

        $this->assertEquals(0, BloodTest::count());
    }
}
