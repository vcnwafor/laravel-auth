<?php

namespace Tests\Feature\Http\Controllers;

use App\Mail\ReviewReport;
use App\Project;
use App\Report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ReportController
 */
class ReportControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $reports = Report::factory()->count(3)->create();

        $response = $this->get(route('report.index'));

        $response->assertOk();
        $response->assertViewIs('report.index');
        $response->assertViewHas('reports');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('report.create'));

        $response->assertOk();
        $response->assertViewIs('report.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReportController::class,
            'store',
            \App\Http\Requests\ReportStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $description = $this->faker->text;

        Mail::fake();

        $response = $this->post(route('report.store'), [
            'description' => $description,
        ]);

        $reports = Report::query()
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $reports);
        $report = $reports->first();

        $response->assertRedirect(route('report.index'));

        Mail::assertSent(ReviewReport::class, function ($mail) use ($report) {
            return $mail->hasTo($report->project->pteam->personnel->email) && $mail->report->is($report);
        });
    }


    /**
     * @test
     */
    public function download_responds_with()
    {
        $report = Report::factory()->create();

        $response = $this->get(route('report.download'));

        $response->assertOk();
        $response->assertJson($report);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $report = Report::factory()->create();

        $response = $this->get(route('report.show', $report));

        $response->assertOk();
        $response->assertViewIs('report.show');
        $response->assertViewHas('report');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $report = Report::factory()->create();

        $response = $this->get(route('report.edit', $report));

        $response->assertOk();
        $response->assertViewIs('report.edit');
        $response->assertViewHas('report');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReportController::class,
            'update',
            \App\Http\Requests\ReportUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $report = Report::factory()->create();
        $project = Project::factory()->create();

        $response = $this->put(route('report.update', $report), [
            'project_id' => $project->id,
        ]);

        $report->refresh();

        $response->assertRedirect(route('report.index'));
        $response->assertSessionHas('report.id', $report->id);

        $this->assertEquals($project->id, $report->project_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $report = Report::factory()->create();

        $response = $this->delete(route('report.destroy', $report));

        $response->assertRedirect(route('report.index'));

        $this->assertSoftDeleted($report);
    }
}
