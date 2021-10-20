<?php

namespace Database\Factories;

use Domain\BloodTests\Models\BloodTest;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloodTestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BloodTest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
