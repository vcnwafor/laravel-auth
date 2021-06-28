<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportStoreRequest;
use App\Http\Requests\ReportUpdateRequest;
use App\Mail\ReviewReport;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reports = Report::all();

        return view('report.index', compact('reports'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('report.create');
    }

    /**
     * @param \App\Http\Requests\ReportStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportStoreRequest $request)
    {
        $report = Report::create($request->validated());

        Mail::to($report->project->pteam->personnel->email)->send(new ReviewReport($report));

        return redirect()->route('report.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $report = Report::find($id);

        return $report;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Report $report
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Report $report)
    {
        return view('report.show', compact('report'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Report $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Report $report)
    {
        return view('report.edit', compact('report'));
    }

    /**
     * @param \App\Http\Requests\ReportUpdateRequest $request
     * @param \App\Models\Report $report
     * @return \Illuminate\Http\Response
     */
    public function update(ReportUpdateRequest $request, Report $report)
    {
        $report->update($request->validated());

        $request->session()->flash('report.id', $report->id);

        return redirect()->route('report.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Report $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Report $report)
    {
        $report->delete();

        return redirect()->route('report.index');
    }
}
