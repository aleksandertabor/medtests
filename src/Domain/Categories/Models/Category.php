<?php

namespace Domain\Categories\Models;

use Database\Factories\CategoryFactory;
use Domain\BloodTests\Models\BloodTest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function bloodTests(): BelongsToMany
    {
        return $this->belongsToMany(BloodTest::class);
    }
}
