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

        // validate
        // return view('vaccine-card-pdf-view');
    }
}
