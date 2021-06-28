<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Personnel;
use App\Models\Work;

class WorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Work::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text,
            'image' => $this->faker->text,
            'startdate' => $this->faker->dateTime(),
            'enddate' => $this->faker->dateTime(),
            'personnel_id' => Personnel::factory(),
        ];
    }
}
