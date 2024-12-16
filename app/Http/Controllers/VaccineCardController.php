<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VaccineCardController extends Controller
{
    function showForm () {

        $registration = auth()->user()->registration;
        
        return view('front.vaccine-card', ['registration' => $registration]);
    }

    function generateVaccineCard (Request $request) {

        $registration = auth()->user()->registration;

        $appointmentFound = false;

        foreach($registration->doses as $dose)
        {
            if($dose)
            {
                if($dose->scheduled_date && $dose->taken_date == null)
                {
                    $appointmentFound = true;

                    break;
                }
            }
        }

        if(!$appointmentFound)
        {
            return response()->json(['message', 'No appointment found for taking a dose']);
        }

        // return view('vaccine-card-pdf-view');
    }
}
