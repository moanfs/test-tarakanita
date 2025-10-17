<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    //
    public function index()
    {
        $applicants = Applicant::paginate(10);
        return view('applicants.table', compact('applicants'));
    }
}
