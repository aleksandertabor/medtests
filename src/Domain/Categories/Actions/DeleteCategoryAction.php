<?php

namespace Domain\Categories\Actions;

use Domain\Categories\Models\Category;

class DeleteCategoryAction
{
    public function __invoke(Category $category): void
    {
        $category->delete();
    }
}
