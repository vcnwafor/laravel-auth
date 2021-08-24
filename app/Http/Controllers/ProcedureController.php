<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcedureStoreRequest;
use App\Http\Requests\ProcedureUpdateRequest;
use App\Models\Procedure;
use App\Models\Pdocs;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginationEnabled = config('proceduresmanagement.enablePagination');
        if ($paginationEnabled) {
            $procedures = Procedure::paginate(config('proceduresmanagement.paginateListSize'));
        } else {
            $procedures = Procedure::all();
        }

        return view('procedure.show-procedures', compact('procedures'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('procedure.create-procedure');
    }

    /**
     * @param \App\Http\Requests\ProcedureStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcedureStoreRequest $request)
    {
        $procedure = Procedure::create($request->validated());

        return redirect()->route('procedure.index');
    }

    public function newpdoc(Request $request)
    {

        $pdoc = [];
        $pdoc['procedure_id'] = $request->input('procedure_id');
        $pdoc['name'] = $request->input('name');
        if ($request->file('image')) {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $filePath = $request->file('image')->storeAs('uploads/procedure/pdocs', $fileName);
            $pdoc['image'] = $fileName;
        }
        $sheet = Pdocs::create($pdoc);
        $procedure = Procedure::find($request->procedure_id);

        return redirect()->route('procedure.show', compact('procedure'));
    }

    public function downloadpdoc($file){
        $name = $file;
        $filepath = storage_path('app/public/uploads/procedure/pdocs/' . $file);
        $dray = explode('.',$filepath);
        $headers  = array(
            'Content-Type: application/'.$dray[count($dray) - 1],
        );

        return Response::download($filepath, $name, $headers);
    }

    public function destroypdoc(Request $request, Pdocs $pdoc)
    {
        $procedure_id = $request->procedure_id;
        $pdoc = Pdocs::find($request->id);
        $pdoc->delete();
        $procedure = Procedure::find($procedure_id);
        return redirect()->route('procedure.show',['procedure' => $procedure]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Procedure $procedure
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Procedure $procedure)
    {
        return view('procedure.show-procedure', compact('procedure'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Procedure $procedure
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Procedure $procedure)
    {
        return view('procedure.edit-procedure', compact('procedure'));
    }

    /**
     * @param \App\Http\Requests\ProcedureUpdateRequest $request
     * @param \App\Models\Procedure $procedure
     * @return \Illuminate\Http\Response
     */
    public function update(ProcedureUpdateRequest $request, Procedure $procedure)
    {
        $procedure->update($request->validated());

        $request->session()->flash('procedure.id', $procedure->id);

        return redirect()->route('procedure.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Procedure $procedure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Procedure $procedure)
    {
        $procedure->delete();

        return redirect()->route('procedure.index');
    }
}
