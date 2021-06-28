<?php

namespace Tests\Feature\Http\Controllers;

use App\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServiceController
 */
class ServiceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $services = Service::factory()->count(3)->create();

        $response = $this->get(route('service.index'));

        $response->assertOk();
        $response->assertViewIs('service.index');
        $response->assertViewHas('services');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('service.create'));

        $response->assertOk();
        $response->assertViewIs('service.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceController::class,
            'store',
            \App\Http\Requests\ServiceStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('service.store'), [
            'name' => $name,
        ]);

        $services = Service::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $services);
        $service = $services->first();

        $response->assertRedirect(route('service.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $service = Service::factory()->create();

        $response = $this->get(route('service.show', $service));

        $response->assertOk();
        $response->assertViewIs('service.show');
        $response->assertViewHas('service');
        $response->assertViewHas('sheets');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $service = Service::factory()->create();

        $response = $this->get(route('service.edit', $service));

        $response->assertOk();
        $response->assertViewIs('service.edit');
        $response->assertViewHas('service');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceController::class,
            'update',
            \App\Http\Requests\ServiceUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $service = Service::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('service.update', $service), [
            'name' => $name,
        ]);

        $service->refresh();

        $response->assertRedirect(route('service.index'));
        $response->assertSessionHas('service.id', $service->id);

        $this->assertEquals($name, $service->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $service = Service::factory()->create();

        $response = $this->delete(route('service.destroy', $service));

        $response->assertRedirect(route('service.index'));

        $this->assertSoftDeleted($service);
    }
}
