<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Personnel;
use App\Models\User;

class PersonnelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personnel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employeeno' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'user_id' => User::factory(),
            'firstname' => $this->faker->firstName,
            'middlename' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'lastname' => $this->faker->lastName,
            'sex' => $this->faker->randomElement(["Male","Female"]),
            'image' => $this->faker->text,
            'skills' => $this->faker->text,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'designation' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'country' => $this->faker->country,
            'salary' => $this->faker->randomFloat(2, 0, 999999999999.99),
            'maritalstatus' => $this->faker->randomElement(["Married","Single","Separated","Divorced"]),
            'employmentstatus' => $this->faker->randomElement(["Active","Disengaged","Sacked"]),
            'employmenttype' => $this->faker->randomElement(["Fulltime","Contract","Consultant"]),
            'dob' => $this->faker->dateTime(),
        ];
    }
}
