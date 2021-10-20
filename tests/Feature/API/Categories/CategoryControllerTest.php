<?php

namespace Tests\Feature\API\Categories;

use App\API\Categories\Controllers\CategoryController;
use Domain\Categories\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function index_shows_categories()
    {
        $categoriesCount = 5;

        Category::factory()->count($categoriesCount)->create();

        $this->get(action([CategoryController::class, 'index']))
            ->assertSuccessful()
            ->assertJsonCount($categoriesCount, 'data');
    }

    /** @test */
    public function store_creates_category()
    {
        $categoryName = 'New category';

        $this->post(action([CategoryController::class, 'store'], ['name' => $categoryName]))
            ->assertSuccessful();

        $this->assertEquals(1, Category::count());
        $this->assertEquals($categoryName, Category::first()->name);
    }

    /** @test */
    public function show_returns_category()
    {
        $category = Category::factory()->create();

        $this->get(action([CategoryController::class, 'show'], ['category' => $category]))
            ->assertSuccessful()
            ->assertJsonStructure([
                'data',
            ]);
    }

    /** @test */
    public function update_changes_category()
    {
        $category = Category::factory()->create();

        $newCategoryName = 'New category';

        $this->patch(action([CategoryController::class, 'update'], ['category' => $category, 'name' => $newCategoryName]))
            ->assertSuccessful();

        $this->assertEquals($newCategoryName, Category::first()->name);
    }

    /** @test */
    public function destroy_removes_category()
    {
        $category = Category::factory()->create();

        $this->delete(action([CategoryController::class, 'destroy'], ['category' => $category]))
            ->assertSuccessful()
            ->assertStatus(204);

        $this->assertEquals(0, Category::count());
    }
}
