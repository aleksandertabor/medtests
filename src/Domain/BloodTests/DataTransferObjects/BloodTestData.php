<?php

namespace Domain\BloodTests\DataTransferObjects;

use App\API\BloodTests\Requests\BloodTestRequest;
use Spatie\DataTransferObject\DataTransferObject;

class BloodTestData extends DataTransferObject
{
    public ?string $name;

    public ?array $categories;

    public static function fromRequest(BloodTestRequest $request): BloodTestData
    {
        return new self([
            'name' => $request->input('name'),
            'categories' => $request->input('categories'),
        ]);
    }
}
