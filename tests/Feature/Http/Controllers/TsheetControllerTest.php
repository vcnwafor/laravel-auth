<?php

namespace Tests\Feature\Http\Controllers;

use App\Mail\ReviewTimesheet;
use App\Tsheet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TsheetController
 */
class TsheetControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $tsheets = Tsheet::factory()->count(3)->create();

        $response = $this->get(route('tsheet.index'));

        $response->assertOk();
        $response->assertViewIs('tsheet.index');
        $response->assertViewHas('tsheets');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('tsheet.create'));

        $response->assertOk();
        $response->assertViewIs('tsheet.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TsheetController::class,
            'store',
            \App\Http\Requests\TsheetStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $status = $this->faker->randomElement(/** enum_attributes **/);

        Mail::fake();

        $response = $this->post(route('tsheet.store'), [
            'status' => $status,
        ]);

        $tsheets = Tsheet::query()
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $tsheets);
        $tsheet = $tsheets->first();

        $response->assertRedirect(route('tsheet.index'));

        Mail::assertSent(ReviewTimesheet::class, function ($mail) use ($tsheet) {
            return $mail->hasTo($tsheet->pteam->personnel->email) && $mail->tsheet->is($tsheet);
        });
    }


    /**
     * @test
     */
    public function download_responds_with()
    {
        $tsheet = Tsheet::factory()->create();

        $response = $this->get(route('tsheet.download'));

        $response->assertOk();
        $response->assertJson($tsheet);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $tsheet = Tsheet::factory()->create();

        $response = $this->get(route('tsheet.show', $tsheet));

        $response->assertOk();
        $response->assertViewIs('tsheet.show');
        $response->assertViewHas('tsheet');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $tsheet = Tsheet::factory()->create();

        $response = $this->get(route('tsheet.edit', $tsheet));

        $response->assertOk();
        $response->assertViewIs('tsheet.edit');
        $response->assertViewHas('tsheet');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TsheetController::class,
            'update',
            \App\Http\Requests\TsheetUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $tsheet = Tsheet::factory()->create();
        $status = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('tsheet.update', $tsheet), [
            'status' => $status,
        ]);

        $tsheet->refresh();

        $response->assertRedirect(route('tsheet.index'));
        $response->assertSessionHas('tsheet.id', $tsheet->id);

        $this->assertEquals($status, $tsheet->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $tsheet = Tsheet::factory()->create();

        $response = $this->delete(route('tsheet.destroy', $tsheet));

        $response->assertRedirect(route('tsheet.index'));

        $this->assertSoftDeleted($tsheet);
    }
}
