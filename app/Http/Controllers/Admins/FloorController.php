<?php

namespace App\Http\Controllers\Admins;

use App\Models\Floor;
use App\Models\Building;
// use App\Support\Collection;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;


class FloorController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $buildings = Building::all();
        // $floors = Floor::with('building')->withCount('rooms')->where('building_id', 'LIKE', '%' . $keyword . '%')
        //     ->orWhere('code', 'LIKE', '%' . $keyword . '%')
        //     ->orWhere('name', 'LIKE', '%' . $keyword . '%')
        //     ->latest()->get();

        // $buildings = Building::all();

        // if($request->searchBuilding)
        // {
        //     $floors = Floor::where('id_building', 'LIKE', '%'.$request.'%')->latest()->get();
        // }

        // if($keyword = $request->search)
        // {
        //     $floors = Floor::where('id_building', 'LIKE', '%'.$request.'%')
        //         ->orWhere('code_floor', 'LIKE', '%'.$keyword.'%')
        //         ->orWhere('name_floor', 'LIKE', '%'.$keyword.'%')
        //         ->latest()
        //         ->get();
        // } else {
        //     $floors = Floor::all()->paginate(20);
        // }

        return view('admins.places.floors.index', compact('buildings'));
    }

    public function table()
    {
        $query = Floor::with('building')->withCount('rooms');

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->editColumn('building.name', function($data){
                            return $data->building->name;
                        })
                        ->addColumn('Aksi', function ($data){
                            return '<ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Edit">
                                <a href=""
                                    class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Delete">
                                <button type="submit" class="btn btn-sm btn-danger"">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </li>
                        </ul>';
                        })
                        ->rawColumn(['Aksi'])
                        ->make(true);
    }

    public function create()
    {
        $buildings = Building::all();
        return view('admins.places.floors.create', compact('buildings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'unique:floors'],
            'name' => ['required'],
            'monthly_price' => ['required'],
            'daily_price' => ['required'],
            'service_charge' => ['required'],
            'own_electricity' => ['required'],
            'overtime_up_4' => ['required'],
            'overtime_down_4' => ['required'],
            'building_id' => ['required'],
        ],
            [
                'building_id.required' => 'The building field is required.',
            ]);

        Floor::create($request->all());

        return redirect()->route('floors.index')->with('success', ' Data lantai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buildings = Building::all();
        $floor = Floor::find($id);

        return view('admins.places.floors.edit', compact('floor', 'buildings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => ['required'],
            'name' => ['required'],
            'monthly_price' => ['required'],
            'daily_price' => ['required'],
            'service_charge' => ['required'],
            'own_electricity' => ['required'],
            'overtime_up_4' => ['required'],
            'overtime_down_4' => ['required'],
            'building_id' => ['required'],
        ],
        [
            'building_id.required' => 'The building field is required.',
        ]);

        $floor = Floor::find($id);
        $floor->update($request->all());

        return redirect()->route('floors.index')->with('success', ' Data lantai berhasil diubah.');
    }

    public function destroy($id)
    {
        $floor = Floor::find($id);
        $floor->delete();

        return back()->with('success', ' Data lantai berhasil dihapus.');
    }
}
