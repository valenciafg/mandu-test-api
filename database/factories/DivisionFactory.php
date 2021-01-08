<?php

namespace Database\Factories;

use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

class DivisionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Division::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->unique()->word,
            'level' => $this->faker->numberBetween(0, 10),
            'employees' => $this->faker->numberBetween(0, 100),
            'ambassador' => $this->faker->name
        ];
    }
}
