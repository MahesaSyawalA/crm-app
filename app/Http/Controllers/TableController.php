<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TableController extends Controller
{
    public function tableFloors(Request $request)
    {
        $floors = Floor::with('building')->withCount('rooms')
                    ->latest();

        return DataTables::of($floors)
                        ->addIndexColumn()
                        ->editColumn('building.name', function($model) {
                            return $model->building->name;
                        })
                        ->editColumn('monthly_price', function($model) {
                            return 'Rp '.number_format($model->monthly_price).' / m<sup>2</sup>/Bulan';
                        })
                        ->editColumn('service_charge', function($model) {
                            return 'Rp '.number_format($model->service_charge).' / m<sup>2</sup>/Bulan';
                        })
                        ->editColumn('own_electricity', function($model) {
                            return 'Rp '.number_format($model->own_electricity).' / m<sup>2</sup>/Bulan';
                        })
                        ->addColumn('action', 'admins.places.floors.action')
                        ->rawColumns(['monthly_price', 'service_charge', 'own_electricity', 'action'])
                        ->make(true);
    }
}
