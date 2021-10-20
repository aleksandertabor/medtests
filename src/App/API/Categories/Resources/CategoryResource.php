<?php

namespace App\API\Categories\Resources;

use App\API\BloodTests\Resources\BloodTestResource;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Domain\Categories\Models\Category */
class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'blood_tests' => BloodTestResource::collection($this->whenLoaded('bloodTests')),
        ];
    }
}
