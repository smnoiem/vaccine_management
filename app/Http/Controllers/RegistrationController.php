<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function create() 
    {
        return view('front.registration.create');
    }

    function store(StoreRegistrationRequest $request) 
    {
        $validated = $request->validated();

        // $registration = Registration::create([
        //     'center_id' => $validated['center_id']
        // ]);

        $registration = new Registration;

        $registration->center_id = $validated['center_id'];
        $registration->user_id = auth()->user()->id;
        
        if($registration->save()) {
            return view('front.registration.success');
        }
        else {
            return view('front.registration.failure');
        }
    }

    function status(Request $request)
    {
        $registration = auth()->user()->registration;

        return view('front.registration.show', ['registration' => $registration]);
    }
}
