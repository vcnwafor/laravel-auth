<?php

namespace Tests\Feature\Http\Controllers;

use App\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ClientController
 */
class ClientControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $clients = Client::factory()->count(3)->create();

        $response = $this->get(route('client.index'));

        $response->assertOk();
        $response->assertViewIs('client.index');
        $response->assertViewHas('clients');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('client.create'));

        $response->assertOk();
        $response->assertViewIs('client.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClientController::class,
            'store',
            \App\Http\Requests\ClientStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $businessname = $this->faker->word;

        $response = $this->post(route('client.store'), [
            'businessname' => $businessname,
        ]);

        $clients = Client::query()
            ->where('businessname', $businessname)
            ->get();
        $this->assertCount(1, $clients);
        $client = $clients->first();

        $response->assertRedirect(route('client.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $client = Client::factory()->create();

        $response = $this->get(route('client.show', $client));

        $response->assertOk();
        $response->assertViewIs('client.show');
        $response->assertViewHas('client');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $client = Client::factory()->create();

        $response = $this->get(route('client.edit', $client));

        $response->assertOk();
        $response->assertViewIs('client.edit');
        $response->assertViewHas('client');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ClientController::class,
            'update',
            \App\Http\Requests\ClientUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $client = Client::factory()->create();
        $businessname = $this->faker->word;
        $sex = $this->faker->randomElement(/** enum_attributes **/);
        $phone = $this->faker->phoneNumber;
        $email = $this->faker->safeEmail;

        $response = $this->put(route('client.update', $client), [
            'businessname' => $businessname,
            'sex' => $sex,
            'phone' => $phone,
            'email' => $email,
        ]);

        $client->refresh();

        $response->assertRedirect(route('client.index'));
        $response->assertSessionHas('client.id', $client->id);

        $this->assertEquals($businessname, $client->businessname);
        $this->assertEquals($sex, $client->sex);
        $this->assertEquals($phone, $client->phone);
        $this->assertEquals($email, $client->email);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $client = Client::factory()->create();

        $response = $this->delete(route('client.destroy', $client));

        $response->assertRedirect(route('client.index'));

        $this->assertSoftDeleted($client);
    }
}
