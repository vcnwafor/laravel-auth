<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Tsheet;
use App\Models\User;

class TsheetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tsheet::class;

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
            'completion' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'startdate' => $this->faker->dateTime(),
            'enddate' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(["Pending","Rejected","Approved","Paid"]),
            'user_id' => User::factory(),
        ];
    }
}
