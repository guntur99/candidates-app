<?php

namespace App\Http\Controllers;

use App\Models\TCandidate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

class TCandidateController extends Controller
{
    public function __construct(){
        $this->now = Carbon::now('Asia/Jakarta');
    }

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

    public function store()
    {
        request()->validate([
            'full_name'     => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email'],
            'pob'           => ['required', 'string'],
            'dob'           => ['required', 'string'],
            'gender'        => ['required', 'string'],
            'year_exp'      => ['required', 'string'],
            'last_salary'   => ['required', 'string'],
        ]);

        $candidate                = new TCandidate;
        $candidate->full_name     = request()->full_name;
        $candidate->email         = request()->email;
        $candidate->phone_number  = request()->phone_number;
        $candidate->pob           = request()->pob;
        $candidate->dob           = request()->dob;
        $candidate->gender        = request()->gender;
        $candidate->year_exp      = request()->year_exp;
        $candidate->last_salary   = request()->last_salary;
        $candidate->created_at    = $this->now;
        $candidate->save();

        return redirect()->route('index.candidates');
    }

    public function update()
    {
        $candidate                  = TCandidate::find((int)request()->candidate_id);
        $candidate->full_name       = request()->full_name;
        $candidate->email           = request()->email;
        $candidate->phone_number    = request()->phone_number;
        $candidate->pob             = request()->pob;
        $candidate->dob             = request()->dob;
        $candidate->gender          = request()->gender;
        $candidate->year_exp        = request()->year_exp;
        $candidate->last_salary     = request()->last_salary;
        $candidate->updated_at      = $this->now;
        $candidate->save();

        return redirect()->route('index.candidates');
    }

    public function destroy()
    {
        TCandidate::find(request()->id)->delete();

        return response('Delete Successfuly!', 200);
    }
}
