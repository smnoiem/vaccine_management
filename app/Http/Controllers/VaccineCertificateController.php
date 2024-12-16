<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VaccineCertificateController extends Controller
{
    public function index(Request $request)
    {
        $registration = auth()->user()->registration;
        
        return view('front.vaccine-certificate', ['registration' => $registration]);
    }

    function download(Request $request) {

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
            return redirect()->back()->with('warning', 'No appointment found for taking a dose');
        }

        $pdf = Pdf::loadView('front.pdf.vaccine-card', [
            'user' => auth()->user(),
        ]);

        $rand = rand(1, 500);
        return $pdf->download("vaccine-card-" . auth()->user()->name . "-{$rand}.pdf");
    }
}
