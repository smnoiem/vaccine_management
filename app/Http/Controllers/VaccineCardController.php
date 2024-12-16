<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VaccineCardController extends Controller
{
    function showForm () {
        return view('front.vaccine-card');
    }

    function generateVaccineCard (Request $request) {

        // validate
        // return view('vaccine-card-pdf-view');
    }
}
