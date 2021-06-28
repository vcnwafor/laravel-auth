<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Client;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'businessname' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'firstname' => $this->faker->firstName,
            'middlename' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'lastname' => $this->faker->lastName,
            'sex' => $this->faker->randomElement(["Male","Female"]),
            'image' => $this->faker->text,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'website' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'rcno' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'industry' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'country' => $this->faker->country,
        ];
    }
}
