<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $applicants = Applicant::latest()->paginate(10);
        return view('applicants.table', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'graduated_from'   => 'required|string|max:255',
            'gpa_score'        => 'required|numeric|between:0,4.00',
            'portofolio_notes' => 'required|string',
        ]);

        Applicant::create($validated);
        return redirect()->route('applicants.index')->with('success', 'Data pelamar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
        //
        return view('applicants.edit', compact('applicant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'graduated_from'   => 'required|string|max:255',
            'gpa_score'        => 'required|numeric|between:0,4.00',
            'portofolio_notes' => 'required|string',
        ]);

        $applicant->update($validated);

        return redirect()->route('applicants.index')->with('success', 'Data pelamar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
        $applicant->delete();
        return redirect()->route('applicants.index')->with('success', 'Data pelamar berhasil dihapus.');
    }
}
