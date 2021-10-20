<?php

namespace App\API\BloodTests\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloodTestRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],
        ];
    }
}
