<?php

namespace Domain\Categories\Actions;

use Domain\Categories\DataTransferObjects\CategoryData;
use Domain\Categories\Models\Category;

class UpdateCategoryAction
{
    public function __invoke(Category $category, CategoryData $categoryData): Category
    {
        $category->fill([
            'name' => $categoryData->name,
        ])->save();

        return $category->refresh();
    }
}
