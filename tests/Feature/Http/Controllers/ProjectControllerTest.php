<?php

namespace Tests\Feature\Http\Controllers;

use App\Client;
use App\Mail\NewProject;
use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProjectController
 */
class ProjectControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $projects = Project::factory()->count(3)->create();

        $response = $this->get(route('project.index'));

        $response->assertOk();
        $response->assertViewIs('project.index');
        $response->assertViewHas('projects');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('project.create'));

        $response->assertOk();
        $response->assertViewIs('project.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectController::class,
            'store',
            \App\Http\Requests\ProjectStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        Mail::fake();

        $response = $this->post(route('project.store'), [
            'name' => $name,
        ]);

        $projects = Project::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $projects);
        $project = $projects->first();

        $response->assertRedirect(route('project.index'));

        Mail::assertSent(NewProject::class, function ($mail) use ($project) {
            return $mail->hasTo($project->pteam->personnel->email) && $mail->project->is($project);
        });
    }


    /**
     * @test
     */
    public function download_responds_with()
    {
        $project = Project::factory()->create();

        $response = $this->get(route('project.download'));

        $response->assertOk();
        $response->assertJson($project);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $project = Project::factory()->create();

        $response = $this->get(route('project.show', $project));

        $response->assertOk();
        $response->assertViewIs('project.show');
        $response->assertViewHas('project');
        $response->assertViewHas('pservices');
        $response->assertViewHas('pteams');
        $response->assertViewHas('reports');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $project = Project::factory()->create();

        $response = $this->get(route('project.edit', $project));

        $response->assertOk();
        $response->assertViewIs('project.edit');
        $response->assertViewHas('project');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectController::class,
            'update',
            \App\Http\Requests\ProjectUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $project = Project::factory()->create();
        $name = $this->faker->name;
        $client = Client::factory()->create();
        $approvedamount = $this->faker->randomFloat(/** decimal_attributes **/);
        $status = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('project.update', $project), [
            'name' => $name,
            'client_id' => $client->id,
            'approvedamount' => $approvedamount,
            'status' => $status,
        ]);

        $project->refresh();

        $response->assertRedirect(route('project.index'));
        $response->assertSessionHas('project.id', $project->id);

        $this->assertEquals($name, $project->name);
        $this->assertEquals($client->id, $project->client_id);
        $this->assertEquals($approvedamount, $project->approvedamount);
        $this->assertEquals($status, $project->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $project = Project::factory()->create();

        $response = $this->delete(route('project.destroy', $project));

        $response->assertRedirect(route('project.index'));

        $this->assertSoftDeleted($project);
    }
}
