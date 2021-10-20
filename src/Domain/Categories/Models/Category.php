<?php

namespace Domain\Categories\Models;

use Domain\BloodTests\Models\BloodTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    public function tests(): BelongsToMany
    {
        return $this->belongsToMany(BloodTest::class);
    }
}
