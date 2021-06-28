<?php

namespace App\Http\Controllers;

use App\Http\Requests\SheetStoreRequest;
use App\Http\Requests\SheetUpdateRequest;
use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sheets = Sheet::all();

        return view('sheet.index', compact('sheets'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('sheet.create');
    }

    /**
     * @param \App\Http\Requests\SheetStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SheetStoreRequest $request)
    {
        $sheet = Sheet::create($request->validated());

        return redirect()->route('sheet.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $sheet = Sheet::find($id);

        return $sheet;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sheet $sheet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sheet $sheet)
    {
        return view('sheet.show', compact('sheet'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sheet $sheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sheet $sheet)
    {
        return view('sheet.edit', compact('sheet'));
    }

    /**
     * @param \App\Http\Requests\SheetUpdateRequest $request
     * @param \App\Models\Sheet $sheet
     * @return \Illuminate\Http\Response
     */
    public function update(SheetUpdateRequest $request, Sheet $sheet)
    {
        $sheet->update($request->validated());

        $request->session()->flash('sheet.id', $sheet->id);

        return redirect()->route('sheet.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sheet $sheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sheet $sheet)
    {
        $sheet->delete();

        return redirect()->route('sheet.index');
    }
}
