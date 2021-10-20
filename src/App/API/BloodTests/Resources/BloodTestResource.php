<?php

namespace App\API\BloodTests\Resources;

use App\API\Categories\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Domain\BloodTests\Models\BloodTest */
class BloodTestResource extends JsonResource
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
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
        ];
    }
}
