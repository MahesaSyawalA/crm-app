<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TableController extends Controller
{
    public function tableFloors(Request $request)
    {
        $floors = Floor::with('building')->withCount('rooms')
                    ->latest();

        if ($request->qglobal) {
            $floors = $floors->where('code', 'LIKE', '%'.$request->qglobal.'%')
                            ->orWhere('name', 'LIKE', '%'.$request->qglobal.'%')
                            ->latest();
        }

        if($request->qbuilding) {
            $floors = $floors->where('building_id', 'LIKE', $request->qbuilding)
                            ->latest();
        }

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

    public function tableRooms(Request $request)
    {
        $rooms = Room::with('floor.building')->withCount('room_positions')
                    ->latest();

        // $rooms->when($request->qglobal, function ($query) use ($request) {
        //     return $query->where('code', 'LIKE', '%'.$request->qglobal.'%')
        //                 ->orWhere('name', 'LIKE', '%'.$request->qglobal.'%')
        //                 ->orWhere('wide', 'LIKE', '%'.$request->qglobal.'%');
        // });

        // $rooms->whereHas('floor.building', function ($query) use ($request) {
        //     return $query->where('building_id', 'LIKE', $request->qbuilding);
        // });

        // $rooms->when($request->qfloor, function ($query) use ($request) {
        //     return $query->where('floor_id', 'LIKE', $request->qfloor);
        // });

        // $rooms->when($request->qstatus, function ($query) use ($request) {
        //     return $query->where('status', 'LIKE', $request->qstatus);
        // });

        if ($request->qglobal) {
            $rooms = $rooms->where('code', 'LIKE', '%'.$request->qglobal.'%')
                            ->orWhere('name', 'LIKE', '%'.$request->qglobal.'%')
                            ->orWhere('wide', 'LIKE', '%'.$request->qglobal.'%')
                            ->latest();
        }

        if($request->qbuilding) {
            $rooms->whereHas('floor.building', function ($query) use ($request) {
                    return $query->where('building_id', 'LIKE', $request->qbuilding)
                                ->latest();
            });
        }

        if($request->qfloor) {
            $rooms = $rooms->where('floor_id', 'LIKE', $request->qfloor)
                            ->latest();
        }

        if($request->qstatus) {
            $rooms = $rooms->where('status', 'LIKE', $request->qstatus)
                            ->latest();
        }

        return DataTables::of($rooms)
                        ->addIndexColumn()
                        ->editColumn('building.name', function($model) {
                            return $model->floor->building->name;
                        })
                        ->editColumn('floor.name', function($model) {
                            return $model->floor->name;
                        })
                        ->editColumn('wide', function($model) {
                            return 'Rp '.number_format($model->wide).' m<sup>2</sup>';
                        })
                        ->editColumn('status', function($model) {
                            if ($model->status->value === 'inactive') {
                                return '<span class="badge font-size-12 badge-soft-warning">Tidak Aktif</span>';
                            }
                            elseif ($model->status->value === 'rented') {
                                return '<span class="badge font-size-12 badge-soft-primary">Disewa</span>';
                            }
                            elseif ($model->status->value === 'booked') {
                                return '<span class="badge font-size-12 badge-soft-info">Dibooking</span>';
                            }
                            elseif ($model->status->value === 'sealed')
                                return '<span class="badge font-size-12 badge-soft-danger">Disegel</span>';
                            else {
                                return '<span class="badge font-size-12 badge-soft-success">Aktif</span>';
                            }
                        })
                        ->addColumn('action', 'admins.places.rooms.action')
                        ->rawColumns(['wide', 'status', 'action'])
                        ->make(true);
    }
}
