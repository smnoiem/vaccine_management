<?php

use App\Models\Registration;
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
