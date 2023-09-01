<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TCandidate;
use Carbon\Carbon;

class APITCandidateController extends Controller
{
    public function __construct(){
        $this->now = Carbon::now('Asia/Jakarta');
    }

    public function index()
    {
        $candidates = TCandidate::get();

        return response()->json(['success' => true, 'data' => $candidates]);
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

        return response()->json(['success' => true, 'data' => $candidate]);
    }

    public function update(string $id)
    {
        $candidate                  = TCandidate::find($id);
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

        return response()->json(['success' => true, 'data' => $candidate]);
    }

    public function destroy(string $id)
    {
        TCandidate::find($id)->delete();

        return response('Delete Successfuly!', 200);
    }
}
