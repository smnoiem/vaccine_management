<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VaccineStockController extends Controller
{
    public function getVaccineStock(Request $request)
    {
        $vaccineStocks = auth()->user()->center->vaccineStocks ?? [];

        return view('operator.vaccine-stock.index', ['vaccineStocks' => $vaccineStocks]);
    }
}
