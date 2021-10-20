<?php

namespace App\API\BloodTests\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloodTestStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'blood_test_category_id' => [],
            'name' => [],
        ];
    }
}
