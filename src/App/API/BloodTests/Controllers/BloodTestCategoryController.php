<?php

namespace App\API\BloodTests\Controllers;

use App\API\BloodTests\Resources\BloodTestResource;
use App\API\Controller;
use Domain\Categories\Models\Category;

class BloodTestCategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        return BloodTestResource::collection($category->bloodTests()->paginate());
    }
}
