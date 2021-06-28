<?php

namespace Tests\Feature\Http\Controllers;

use App\Service;
use App\Sheet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SheetController
 */
class SheetControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $sheets = Sheet::factory()->count(3)->create();

        $response = $this->get(route('sheet.index'));

        $response->assertOk();
        $response->assertViewIs('sheet.index');
        $response->assertViewHas('sheets');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('sheet.create'));

        $response->assertOk();
        $response->assertViewIs('sheet.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SheetController::class,
            'store',
            \App\Http\Requests\SheetStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('sheet.store'), [
            'name' => $name,
        ]);

        $sheets = Sheet::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $sheets);
        $sheet = $sheets->first();

        $response->assertRedirect(route('sheet.index'));
    }


    /**
     * @test
     */
    public function download_responds_with()
    {
        $sheet = Sheet::factory()->create();

        $response = $this->get(route('sheet.download'));

        $response->assertOk();
        $response->assertJson($sheet);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $sheet = Sheet::factory()->create();

        $response = $this->get(route('sheet.show', $sheet));

        $response->assertOk();
        $response->assertViewIs('sheet.show');
        $response->assertViewHas('sheet');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $sheet = Sheet::factory()->create();

        $response = $this->get(route('sheet.edit', $sheet));

        $response->assertOk();
        $response->assertViewIs('sheet.edit');
        $response->assertViewHas('sheet');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SheetController::class,
            'update',
            \App\Http\Requests\SheetUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $sheet = Sheet::factory()->create();
        $name = $this->faker->name;
        $service = Service::factory()->create();

        $response = $this->put(route('sheet.update', $sheet), [
            'name' => $name,
            'service_id' => $service->id,
        ]);

        $sheet->refresh();

        $response->assertRedirect(route('sheet.index'));
        $response->assertSessionHas('sheet.id', $sheet->id);

        $this->assertEquals($name, $sheet->name);
        $this->assertEquals($service->id, $sheet->service_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $sheet = Sheet::factory()->create();

        $response = $this->delete(route('sheet.destroy', $sheet));

        $response->assertRedirect(route('sheet.index'));

        $this->assertSoftDeleted($sheet);
    }
}
