<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vaccine;
use App\Models\VaccineStock;
use Illuminate\Http\Request;

class VaccineStockController extends Controller
{
    public function index(Request $request)
    {
        $vaccineStocks = VaccineStock::doesntHave('center') ?? [];

        return view('admin.vaccine-stock.index', ['vaccineStocks' => $vaccineStocks]);
    }

    public function create(Request $request)
    {
        $vaccines = Vaccine::all();

        return view('admin.vaccine-stock.create', ['vaccines' => $vaccines]);
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
