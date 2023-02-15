<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Building;
// use App\Support\Collection;
use App\Models\Floor;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $buildings = Building::all();
        $floors = Floor::where('id_building', 'LIKE', '%' . $keyword . '%')
            ->orWhere('code_floor', 'LIKE', '%' . $keyword . '%')
            ->orWhere('name_floor', 'LIKE', '%' . $keyword . '%')
            ->latest()
            ->paginate(20);

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

        return view('admins.places.floors.index', compact('floors', 'buildings'));
    }

    public function create()
    {
        $buildings = Building::all();
        return view('admins.places.floors.create', compact('buildings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_building' => ['required'],
            'code_floor' => ['required', 'unique:floors'],
            'name_floor' => ['required'],
            'monthly_price' => ['required'],
            'daily_price' => ['required'],
            'service_charge_floor' => ['required'],
            'service_charge_own_electricity' => ['required'],
            'overtime_up_4' => ['required'],
            'overtime_down_4' => ['required'],
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

    public function update(Request $request)
    {
        $request->validate([
            'id_building' => ['required'],
            'code_floor' => ['required'],
            'name_floor' => ['required'],
            'monthly_price' => ['required'],
            'daily_price' => ['required'],
            'service_charge_floor' => ['required'],
            'service_charge_own_electricity' => ['required'],
            'overtime_up_4' => ['required'],
            'overtime_down_4' => ['required'],
        ]);

        $id_floor = $request->input('id_floor', false);
        $floor = Floor::find($id_floor);
        $floor->id_building = $request->id_building;
        $floor->code_floor = $request->code_floor;
        $floor->name_floor = $request->name_floor;
        $floor->monthly_price = $request->monthly_price;
        $floor->daily_price = $request->daily_price;
        $floor->service_charge_floor = $request->service_charge_floor;
        $floor->service_charge_own_electricity = $request->service_charge_own_electricity;
        $floor->overtime_up_4 = $request->overtime_up_4;
        $floor->overtime_down_4 = $request->overtime_down_4;

        $floor->update();

        return redirect()->route('floors.index')->with('success', ' Data lantai berhasil diubah.');
    }

    public function destroy($id)
    {
        $floor = Floor::find($id);
        $floor->delete();

        return back()->with('success', ' Data lantai berhasil dihapus.');
    }
}
