<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonnelStoreRequest;
use App\Http\Requests\PersonnelUpdateRequest;
use App\Models\Personnel;
use App\Models\Certification;
use App\Models\Work;
use app\models\Pteam;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginationEnabled = config('personnelsmanagement.enablePagination');
        if ($paginationEnabled) {
            $personnels = Personnel::paginate(config('personnelsmanagement.paginateListSize'));
        } else {
            $personnels = Personnel::all();
        }

        return view('personnel.show-personnels', compact('personnels'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('personnel.create-personnel');
    }

    /**
     * @param \App\Http\Requests\PersonnelStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonnelStoreRequest $request)
    {
        if($request->validated()){
            $personnel = [];
            $personnel['employeeno'] = $request->input('employeeno');
            $personnel['firstname'] = $request->input('firstname');
            $personnel['middlename'] = $request->input('middlename');
            $personnel['lastname'] = $request->input('lastname');
            $personnel['sex'] = $request->input('sex');
            $personnel['designation'] = $request->input('designation');
            $personnel['phone'] = $request->input('phone');
            $personnel['address'] = $request->input('address');
            $personnel['email'] = $request->input('email');
            $personnel['employmentstatus'] = $request->input('employmentstatus');
            $personnel['employmenttype'] = $request->input('employmenttype');
            $personnel['maritalstatus'] = $request->input('maritalstatus');
            $personnel['skills'] = $request->input('skills');
            $personnel['country'] = $request->input('country');
            $personnel['salary'] = $request->input('salary');
            $personnel['dob'] = $request->input('dob');
            if ($request->file('image')) {
                $fileName = time().'.'.$request->image->getClientOriginalExtension();
                $filePath = $request->file('image')->storeAs('uploads/personnels/images', $fileName);
                $personnel['image'] = $fileName;
            }

            Personnel::create($personnel);
        }

        return redirect()->route('personnel.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Personnel $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Personnel $personnel)
    {
        return view('personnel.show-personnel', compact('personnel'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Personnel $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Personnel $personnel)
    {
        return view('personnel.edit-personnel', compact('personnel'));
    }

    public function newcertification(Request $request)
    {
        $cert = [];
        $cert['personnel_id'] = $request->input('personnel_id');
        $cert['name'] = $request->input('name');
        $cert['description'] = $request->input('description');
        $cert['obtainedon'] = $request->input('obtainedon');
        if ($request->file('image')) {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $filePath = $request->file('image')->storeAs('uploads/personnels/certifications', $fileName);
            $cert['image'] = $fileName;
        }
        $certification = Certification::create($cert);
        $personnel = Personnel::find($request->personnel_id);

        return redirect()->route('personnel.show', compact('personnel'));
    }

    public function downloadcertification($file){
        $name = $file;
        $filepath = public_path("storage/uploads/personnels/certifications/".$file);
        $dray = explode('.',$filepath);
        $headers  = array(
            'Content-Type: application/'.$dray[count($dray) - 1],
        );

        return Response::download($filepath, $name, $headers);
    }

    public function destroycertification(Request $request, Certification $cert)
    {
        $personnel_id = $request->personnel_id;
        $cert = Certification::find($request->id);
        $cert->delete();
        $personnel = Personnel::find($personnel_id);
        return redirect()->route('personnel.show',['personnel' => $personnel]);
    }

    public function newwork(Request $request)
    {
        $work = [];
        $work['personnel_id'] = $request->input('personnel_id');
        $work['name'] = $request->input('name');
        $work['description'] = $request->input('description');
        $work['startdate'] = $request->input('startdate');
        $work['enddate'] = $request->input('enddate');
        if ($request->file('image')) {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $filePath = $request->file('image')->storeAs('uploads/personnels/works', $fileName);
            $work['image'] = $fileName;
        }
        $sheet = Work::create($work);
        $personnel = Personnel::find($request->personnel_id);

        return redirect()->route('personnel.show', compact('personnel'));
    }

    public function downloadwork($file){
        $name = $file;
        $filepath = public_path("storage/uploads/personnels/works/".$file);
        $dray = explode('.',$filepath);
        $headers  = array(
            'Content-Type: application/'.$dray[count($dray) - 1],
        );

        return Response::download($filepath, $name, $headers);
    }

    public function destroywork(Request $request, Work $work)
    {
        $personnel_id = $request->personnel_id;
        $work = Work::find($request->id);
        $work->delete();
        $personnel = Personnel::find($personnel_id);
        return redirect()->route('personnel.show',['personnel' => $personnel]);
    }


    public function newpteam(Request $request)
    {
        $pteam = [];
        $pteam['personnel_id'] = $request->input('personnel_id');
        $pteam['project_id'] = $request->input('project_id');
        $pteam['name'] = $request->input('name');
        $pteam['description'] = $request->input('description');
        $pteam['startdate'] = $request->input('startdate');
        $pteam['enddate'] = $request->input('enddate');
        if ($request->file('image')) {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $filePath = $request->file('image')->storeAs('uploads/personnels/pteams', $fileName);
            $pteam['image'] = $fileName;
        }
        $sheet = Pteam::create($pteam);
        $personnel = Personnel::find($request->personnel_id);

        return redirect()->route('personnel.show', compact('personnel'));
    }

    public function downloadpteam($file){
        $name = $file;
        $filepath = storage_path('app/public/uploads/personnels/pteams/' . $file);
        $dray = explode('.',$filepath);
        $headers  = array(
            'Content-Type: application/'.$dray[count($dray) - 1],
        );

        return Response::download($filepath, $name, $headers);
    }

    public function destroypteam(Request $request, Pteam $pteam)
    {
        $personnel_id = $request->personnel_id;
        $pteam = Pteam::find($request->id);
        $pteam->delete();
        $personnel = Personnel::find($personnel_id);
        return redirect()->route('personnel.show',['personnel' => $personnel]);
    }

    /**
     * @param \App\Http\Requests\PersonnelUpdateRequest $request
     * @param \App\Models\Personnel $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(PersonnelUpdateRequest $request, Personnel $personnel)
    {
        $personnel->update($request->validated());


        $request->session()->flash('personnel.id', $personnel->id);

        return redirect()->route('personnel.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Personnel $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Personnel $personnel)
    {
        $personnel->delete();

        return redirect()->route('personnel.index');
    }
}
