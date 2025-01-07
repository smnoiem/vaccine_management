<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VaccineStock;
use Illuminate\Http\Request;

class VaccineStockController extends Controller
{
    public function getVaccineStock(Request $request)
    {
        $vaccineStocks = VaccineStock::doesntHave('center') ?? [];

        return view('admin.vaccine-stock.index', ['vaccineStocks' => $vaccineStocks]);
    }
}
