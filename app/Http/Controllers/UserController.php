<?php

namespace App\Http\Controllers;

use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }

        return view('pages.user.home');
    }

    public function procedures()
    {
        return view('pages.procedures.home');
    }

    public function saveprocedure()
    {
        return view('pages.user.procedures');
    }

    public function reports()
    {
        return view('pages.reports.home');
    }

    public function savereports()
    {
        return view('pages.user.reports');
    }

    public function qaqc()
    {
        return view('pages.qaqc.home');
    }

    public function saveqaqc()
    {
        return view('pages.user.qaqc');
    }

    public function sheets()
    {
        return view('pages.sheets.home');
    }

    public function savesheet()
    {
        return view('pages.user.sheets');
    }

    public function personnels()
    {
        return view('pages.personnels.home');
    }

    public function savepersonnel()
    {
        return view('pages.user.personnels');
    }

    public function configs()
    {
        return view('pages.configs.home');
    }

    public function saveconfigs()
    {
        return view('pages.user.configs');
    }

    public function cassets()
    {
        return view('pages.cassets.home');
    }

    public function saveasset()
    {
        return view('pages.user.cassets');
    }

    public function services()
    {
        return view('pages.services.home');
    }

    public function saveservice()
    {
        return view('pages.user.services');
    }

    public function projects()
    {
        return view('pages.projects.home');
    }

    public function saveproject()
    {
        return view('pages.user.projects');
    }
}
