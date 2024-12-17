<?php

use App\Models\Dose;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/create_vaccine_registration', function (Request $request) {

    $registration = Registration::create([
        'user_id' => $request->input('user_id'),
        'center_id' => $request->input('center_id'),
    ]);
    
    return response()->json($registration, 201);

});

Route::get('/registration/{registration}', function (Request $request, Registration $registration) {
    $registration = $registration->toArray();
    return response()->json($registration);
});


Route::post('/create_vaccine_dose', function (Request $request) {

    $dose = Dose::create([
        'registration_id' => $request->input('registration_id'),
        'vaccine_id' => $request->input('vaccine_id'),
        'given_by' => null,
        'dose_type' => $request->input('dose_type'),
        'scheduled_date' => Carbon::parse($request->input('scheduled_date')),
        'taken_date' => null,
    ]);
    
    return response()->json($dose, 201);

});

Route::get('/dose/{dose}', function (Request $request, Dose $dose) {
    $dose = $dose->toArray();
    return response()->json($dose);
});
