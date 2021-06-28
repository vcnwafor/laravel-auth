<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Client;
use App\Models\Project;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'startdate' => $this->faker->dateTime(),
            'completiondate' => $this->faker->dateTime(),
            'client_id' => Client::factory(),
            'approvedamount' => $this->faker->randomFloat(2, 0, 999999999999.99),
            'status' => $this->faker->randomElement(["Ongoing","Paused","Inspected","Completed","Delivered"]),
        ];
    }
}
