<?php

namespace Domain\Categories\DataTransferObjects;

use App\API\Categories\Requests\CategoryRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CategoryData extends DataTransferObject
{
    public ?string $name;

    public static function fromRequest(CategoryRequest $request): CategoryData
    {
        return new self([
            'name' => $request->input('name'),
        ]);
    }
}
