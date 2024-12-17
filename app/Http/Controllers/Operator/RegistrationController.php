<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = auth()->user()?->center?->registrations;

        return view('operator.registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        return view('operator.registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        $user = $registration->user;
        
        $user->phone = $request->input('phone', $user->phone);
        $user->dob = $request->input('dob', $user->dob);
        $user->save();

        return 1;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getDoses(Registration $registration)
    {
        return view('operator.registrations.doses', compact('registration'));
    }

    public function doseCreate(Registration $registration)
    {
        $vaccines = Vaccine::all();

        $selectedVaccine = $registration->doses()->whereHas('vaccine')->first()?->vaccine;

        return view('operator.registrations.doses.create', compact('registration', 'vaccines', 'selectedVaccine'));
    }

    public function doseStore()
    {
        //
    }
}
