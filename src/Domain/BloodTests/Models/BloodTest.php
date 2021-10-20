<?php

namespace Domain\BloodTests\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\BloodTestCategories\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BloodTest extends Model
{
    use HasFactory;

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
