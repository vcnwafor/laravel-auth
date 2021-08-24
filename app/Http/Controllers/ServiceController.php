<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Http\Requests\SheetStoreRequest;
use App\Models\Sheet;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$services = Service::all();

        $paginationEnabled = config('servicesmanagement.enablePagination');
        if ($paginationEnabled) {
            $services = Service::paginate(config('servicesmanagement.paginateListSize'));
        } else {
            $services = Service::all();
        }

        return View('service.show-services', compact('services'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('service.create-service');
    }

    /**
     * @param \App\Http\Requests\ServiceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStoreRequest $request)
    {
        $service = Service::create($request->validated());

        return redirect()->route('service.index');
    }

     /**
     * @param \App\Http\Requests\ServiceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function newsheet(SheetStoreRequest $request)
    {

        $nsheet = [];
        if($request->input('type') == 'Sub-Service'){
            $subservice = [];
            $subservice['parent_id'] = $request->input('service_id');
            $subservice['name'] = $request->input('name');
            $service = Service::create($subservice);
            return redirect()->route('service.show', compact('service'));
        }

        $nsheet['service_id'] = $request->input('service_id');
        $nsheet['name'] = $request->input('name');
        $nsheet['type'] = $request->input('type');
        if ($request->file('image')) {
            //$fileName = time().'_'.$request->image->getClientOriginalName();
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $filePath = $request->file('image')->storeAs('uploads/service/sheets', $fileName);
            $nsheet['image'] = $fileName;
        }
        if($request->validated()){
            $sheet = Sheet::create($nsheet);
        }
        $service = Service::find($request->service_id);

        return redirect()->route('service.show', compact('service'));
    }

    public function downloadsheet($file){
        $name = $file;

        //var_dump($file);

        //$filepath = public_path("storage/uploads/service/sheets/".$file);
        $filepath = storage_path('app/public/uploads/service/sheets/' . $file);
        //var_dump($ifile);
        //$file = Storage::disk('public')->get(storage_path()."/uploads/service/sheets/".$file);
        $dray = explode('.',$filepath);
        $headers  = array(
            'Content-Type: application/'.$dray[count($dray) - 1],
        );

        return Response::download($filepath, $name, $headers);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Service $service)
    {
        return view('service.show-service', compact('service'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Service $service)
    {
        return view('service.edit-service', compact('service'));
    }

    /**
     * @param \App\Http\Requests\ServiceUpdateRequest $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdateRequest $request, Service $service)
    {
        $service->update($request->validated());

        $request->session()->flash('service.id', $service->id);

        return redirect()->route('service.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Service $service)
    {
        $service->delete();

        return redirect()->route('service.index');
    }

    public function destroysheet(Request $request, Sheet $sheet)
    {
        $service_id = $request->service_id;
        $sheet = Sheet::find($request->id);
        $sheet->delete();
        $service = Service::find($service_id);
        return redirect()->route('service.show',['service' => $service]);
    }


        /**
     * Method to search the users.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    // public function search(Request $request)
    // {
    //     $searchTerm = $request->input('user_search_box');
    //     $searchRules = [
    //         'user_search_box' => 'required|string|max:255',
    //     ];
    //     $searchMessages = [
    //         'user_search_box.required' => 'Search term is required',
    //         'user_search_box.string'   => 'Search term has invalid characters',
    //         'user_search_box.max'      => 'Search term has too many characters - 255 allowed',
    //     ];

    //     $validator = Validator::make($request->all(), $searchRules, $searchMessages);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             json_encode($validator),
    //         ], Response::HTTP_UNPROCESSABLE_ENTITY);
    //     }

    //     $results = User::where('id', 'like', $searchTerm.'%')
    //                         ->orWhere('name', 'like', $searchTerm.'%')
    //                         ->orWhere('email', 'like', $searchTerm.'%')->get();

    //     // Attach roles to results
    //     foreach ($results as $result) {
    //         $roles = [
    //             'roles' => $result->roles,
    //         ];
    //         $result->push($roles);
    //     }

    //     return response()->json([
    //         json_encode($results),
    //     ], Response::HTTP_OK);
    // }
}
