<?php

namespace App\API\Categories\Controllers;

use App\API\Categories\Requests\CategoryRequest;
use App\API\Categories\Resources\CategoryResource;
use App\API\Controller;
use Domain\Categories\Actions\CreateCategoryAction;
use Domain\Categories\Actions\DeleteCategoryAction;
use Domain\Categories\Actions\UpdateCategoryAction;
use Domain\Categories\DataTransferObjects\CategoryData;
use Domain\Categories\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $query = Category::query();

        return CategoryResource::collection($query->paginate());
    }

    public function store(CategoryRequest $request, CreateCategoryAction $createCategoryAction)
    {
        $categoryData = CategoryData::fromRequest($request);

        $category = $createCategoryAction($categoryData);

        return new CategoryResource($category);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(Category $category, CategoryRequest $request, UpdateCategoryAction $updateCategoryAction)
    {
        $categoryData = CategoryData::fromRequest($request);

        $category = $updateCategoryAction($category, $categoryData);

        return new CategoryResource($category);
    }

    public function destroy(Category $category, DeleteCategoryAction $deleteCategoryAction)
    {
        $deleteCategoryAction($category);

        return response()->json([], 204);
    }
}
