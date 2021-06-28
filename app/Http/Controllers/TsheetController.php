<?php

namespace App\Http\Controllers;

use App\Http\Requests\TsheetStoreRequest;
use App\Http\Requests\TsheetUpdateRequest;
use App\Mail\ReviewTimesheet;
use App\Models\Tsheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TsheetController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tsheets = Tsheet::all();

        return view('tsheet.index', compact('tsheets'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tsheet.create');
    }

    /**
     * @param \App\Http\Requests\TsheetStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TsheetStoreRequest $request)
    {
        $tsheet = Tsheet::create($request->validated());

        Mail::to($tsheet->pteam->personnel->email)->send(new ReviewTimesheet($tsheet));

        return redirect()->route('tsheet.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $tsheet = Tsheet::find($id);

        return $tsheet;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tsheet $tsheet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tsheet $tsheet)
    {
        return view('tsheet.show', compact('tsheet'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tsheet $tsheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tsheet $tsheet)
    {
        return view('tsheet.edit', compact('tsheet'));
    }

    /**
     * @param \App\Http\Requests\TsheetUpdateRequest $request
     * @param \App\Models\Tsheet $tsheet
     * @return \Illuminate\Http\Response
     */
    public function update(TsheetUpdateRequest $request, Tsheet $tsheet)
    {
        $tsheet->update($request->validated());

        $request->session()->flash('tsheet.id', $tsheet->id);

        return redirect()->route('tsheet.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tsheet $tsheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tsheet $tsheet)
    {
        $tsheet->delete();

        return redirect()->route('tsheet.index');
    }
}
