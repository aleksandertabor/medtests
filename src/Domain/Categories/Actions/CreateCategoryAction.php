<?php

namespace Domain\Categories\Actions;

use Domain\Categories\DataTransferObjects\CategoryData;
use Domain\Categories\Models\Category;

class CreateCategoryAction
{
    public function __invoke(CategoryData $categoryData): Category
    {
        $category = Category::create([
            'name' => $categoryData->name,
        ]);

        return $category;
    }
}
