<?php

namespace App\Http\Controllers;

use App\Models\TCandidate;
use Illuminate\Http\Request;

class TCandidateController extends Controller
{
    public function index()
    {
        $candidates = TCandidate::get();

        return view('layouts.dashboard.candidate.index', [
            'candidates'      => $candidates,
            'filter'        => 0,
        ]);
    }

    public function datatable(){

        $candidates = TCandidate::get();

        return datatables()->of($candidates)->toJson();
    }

    public function create()
    {
        return view('layouts.dashboard.candidate.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(TCandidate $tCandidate)
    {
        //
    }

    public function edit(TCandidate $tCandidate)
    {
        //
    }

    public function update(Request $request, TCandidate $tCandidate)
    {
        //
    }

    public function destroy(TCandidate $tCandidate)
    {
        //
    }
}
