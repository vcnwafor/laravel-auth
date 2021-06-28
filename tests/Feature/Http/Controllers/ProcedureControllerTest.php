<?php

namespace Tests\Feature\Http\Controllers;

use App\Procedure;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProcedureController
 */
class ProcedureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $procedures = Procedure::factory()->count(3)->create();

        $response = $this->get(route('procedure.index'));

        $response->assertOk();
        $response->assertViewIs('procedure.index');
        $response->assertViewHas('procedures');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('procedure.create'));

        $response->assertOk();
        $response->assertViewIs('procedure.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProcedureController::class,
            'store',
            \App\Http\Requests\ProcedureStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('procedure.store'), [
            'name' => $name,
        ]);

        $procedures = Procedure::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $procedures);
        $procedure = $procedures->first();

        $response->assertRedirect(route('procedure.index'));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $procedure = Procedure::factory()->create();

        $response = $this->get(route('procedure.show', $procedure));

        $response->assertOk();
        $response->assertViewIs('procedure.show');
        $response->assertViewHas('procedure');
        $response->assertViewHas('pdocs');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $procedure = Procedure::factory()->create();

        $response = $this->get(route('procedure.edit', $procedure));

        $response->assertOk();
        $response->assertViewIs('procedure.edit');
        $response->assertViewHas('procedure');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProcedureController::class,
            'update',
            \App\Http\Requests\ProcedureUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $procedure = Procedure::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('procedure.update', $procedure), [
            'name' => $name,
        ]);

        $procedure->refresh();

        $response->assertRedirect(route('procedure.index'));
        $response->assertSessionHas('procedure.id', $procedure->id);

        $this->assertEquals($name, $procedure->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $procedure = Procedure::factory()->create();

        $response = $this->delete(route('procedure.destroy', $procedure));

        $response->assertRedirect(route('procedure.index'));

        $this->assertSoftDeleted($procedure);
    }
}
