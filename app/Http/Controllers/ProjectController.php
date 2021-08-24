<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Mail\NewProject;
use App\Models\Project;
use App\Models\Report;
use App\Models\Client;
use App\Models\Service;
use App\Models\Personnel;
use App\Models\Pservice;
use App\Models\Pteam;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginationEnabled = config('projectsmanagement.enablePagination');
        if ($paginationEnabled) {
            $projects = Project::paginate(config('projectsmanagement.paginateListSize'));
        } else {
            $projects = Project::all();
        }

        return view('project.show-projects', compact('projects'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clients = Client::all()->pluck('businessname','id');
        return view('project.create-project',compact('clients'));
    }

    /**
     * @param \App\Http\Requests\ProjectStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());

        // TODO: remember to activate the email notification later.
        //Mail::to($project->pteam->personnel->email)->send(new NewProject($project));

        return redirect()->route('project.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $project = Project::find($request->id);

        return $project;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Project $project)
    {
        $services = Service::all()->pluck('name','id');
        $personnels = Personnel::all()->pluck('fullname','id');
        return view('project.show-project', compact('project','services','personnels'));
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function reports(Request $request, Project $project)
    {
        $services = Service::all()->pluck('name','id');
        $personnels = Personnel::all()->pluck('fullname','id');
        return view('project.show-project', compact('project','services','personnels'));
    }

    public function newreport(Request $request)
    {
        $report = [];
        $report['project_id'] = $request->input('project_id');
        $report['completion'] = $request->input('completion');
        $report['description'] = $request->input('description');
        $report['actiondate'] = $request->input('actiondate');
        $report['user_id'] = $request->input(Auth::user()->id);
        if ($request->file('image')) {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $filePath = $request->file('image')->storeAs('uploads/projects/preports/', $fileName);
            $report['image'] = $fileName;
        }
        $report = Report::create($report);
        $project = Project::find($request->project_id);

        return redirect()->route('project.show', compact('project'));
    }

    public function downloadreport($file){
        $name = $file;
        $filepath = storage_path('app/public/uploads/projects/preports/' . $file);
        $dray = explode('.',$filepath);
        $headers  = array(
            'Content-Type: application/'.$dray[count($dray) - 1],
        );

        return Response::download($filepath, $name, $headers);
    }

    public function destroyreport(Request $request, Report $preport)
    {
        $project_id = $request->project_id;
        $preport = Report::find($request->id);
        $preport->delete();
        $project = Project::find($project_id);
        return redirect()->route('project.show',['project' => $project]);
    }

    public function newservice(Request $request)
    {
        $service = [];
        $service['project_id'] = $request->input('project_id');
        $service['service_id'] = $request->input('service_id');
        $service = Pservice::create($service);
        $project = Project::find($request->project_id);

        return redirect()->route('project.show', compact('project'));
    }

    public function downloadservice($file){
        $name = $file;
        $filepath = storage_path('app/public/uploads/projects/pservices/' . $file);
        $dray = explode('.',$filepath);
        $headers  = array(
            'Content-Type: application/'.$dray[count($dray) - 1],
        );

        return Response::download($filepath, $name, $headers);
    }

    public function destroyservice(Request $request, Pservice $pservice)
    {
        $project_id = $request->project_id;
        $pservice = Pservice::find($request->id);
        $pservice->delete();
        $project = Project::find($project_id);
        return redirect()->route('project.show',['project' => $project]);
    }



    public function newpteam(Request $request)
    {
        $pteam = [];
        $pteam['project_id'] = $request->input('project_id');
        $pteam['personnel_id'] = $request->input('personnel_id');
        $pteam = Pteam::create($pteam);
        $project = Project::find($request->project_id);

        return redirect()->route('project.show', compact('project'));
    }

    public function downloadpteam($file){
        $name = $file;
        $filepath = storage_path('app/public/uploads/projects/pteams/' . $file);
        $dray = explode('.',$filepath);
        $headers  = array(
            'Content-Type: application/'.$dray[count($dray) - 1],
        );

        return Response::download($filepath, $name, $headers);
    }

    public function destroypteam(Request $request, Pteam $ppteam)
    {
        $project_id = $request->project_id;
        $pteam = Pteam::find($request->id);
        $pteam->delete();
        $project = Project::find($project_id);
        return redirect()->route('project.show',['project' => $project]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Project $project)
    {
        $clients = Client::all()->pluck('businessname','id');

        return view('project.edit-project', compact('project','clients'));
    }

    /**
     * @param \App\Http\Requests\ProjectUpdateRequest $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        $request->session()->flash('project.id', $project->id);

        return redirect()->route('project.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        $project->delete();

        return redirect()->route('project.index');
    }
}
