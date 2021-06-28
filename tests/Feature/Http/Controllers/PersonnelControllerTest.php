<?php

namespace Tests\Feature\Http\Controllers;

use App\Personnel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PersonnelController
 */
class PersonnelControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $personnels = Personnel::factory()->count(3)->create();

        $response = $this->get(route('personnel.index'));

        $response->assertOk();
        $response->assertViewIs('personnel.index');
        $response->assertViewHas('personnels');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('personnel.create'));

        $response->assertOk();
        $response->assertViewIs('personnel.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PersonnelController::class,
            'store',
            \App\Http\Requests\PersonnelStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $firstname = $this->faker->firstName;
        $lastname = $this->faker->lastName;

        $response = $this->post(route('personnel.store'), [
            'firstname' => $firstname,
            'lastname' => $lastname,
        ]);

        $personnels = Personnel::query()
            ->where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->get();
        $this->assertCount(1, $personnels);
        $personnel = $personnels->first();

        $response->assertRedirect(route('personnel.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $personnel = Personnel::factory()->create();

        $response = $this->get(route('personnel.show', $personnel));

        $response->assertOk();
        $response->assertViewIs('personnel.show');
        $response->assertViewHas('personnel');
        $response->assertViewHas('certifications');
        $response->assertViewHas('works');
        $response->assertViewHas('pteams');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $personnel = Personnel::factory()->create();

        $response = $this->get(route('personnel.edit', $personnel));

        $response->assertOk();
        $response->assertViewIs('personnel.edit');
        $response->assertViewHas('personnel');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PersonnelController::class,
            'update',
            \App\Http\Requests\PersonnelUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $personnel = Personnel::factory()->create();
        $employeeno = $this->faker->word;
        $firstname = $this->faker->firstName;
        $lastname = $this->faker->lastName;
        $sex = $this->faker->randomElement(/** enum_attributes **/);
        $phone = $this->faker->phoneNumber;
        $email = $this->faker->safeEmail;
        $address = $this->faker->word;
        $salary = $this->faker->randomFloat(/** decimal_attributes **/);
        $maritalstatus = $this->faker->randomElement(/** enum_attributes **/);
        $employmentstatus = $this->faker->randomElement(/** enum_attributes **/);
        $employmenttype = $this->faker->randomElement(/** enum_attributes **/);
        $dob = $this->faker->dateTime();

        $response = $this->put(route('personnel.update', $personnel), [
            'employeeno' => $employeeno,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'sex' => $sex,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'salary' => $salary,
            'maritalstatus' => $maritalstatus,
            'employmentstatus' => $employmentstatus,
            'employmenttype' => $employmenttype,
            'dob' => $dob,
        ]);

        $personnel->refresh();

        $response->assertRedirect(route('personnel.index'));
        $response->assertSessionHas('personnel.id', $personnel->id);

        $this->assertEquals($employeeno, $personnel->employeeno);
        $this->assertEquals($firstname, $personnel->firstname);
        $this->assertEquals($lastname, $personnel->lastname);
        $this->assertEquals($sex, $personnel->sex);
        $this->assertEquals($phone, $personnel->phone);
        $this->assertEquals($email, $personnel->email);
        $this->assertEquals($address, $personnel->address);
        $this->assertEquals($salary, $personnel->salary);
        $this->assertEquals($maritalstatus, $personnel->maritalstatus);
        $this->assertEquals($employmentstatus, $personnel->employmentstatus);
        $this->assertEquals($employmenttype, $personnel->employmenttype);
        $this->assertEquals($dob, $personnel->dob);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $personnel = Personnel::factory()->create();

        $response = $this->delete(route('personnel.destroy', $personnel));

        $response->assertRedirect(route('personnel.index'));

        $this->assertSoftDeleted($personnel);
    }
}
