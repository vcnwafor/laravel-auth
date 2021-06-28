<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Report;
use App\Models\User;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

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
            'project_id' => Project::factory(),
            'actiondate' => $this->faker->dateTime(),
            'user_id' => User::factory(),
        ];
    }
}
