<?php

namespace App\Http\Controllers\Admins;

use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\storeBuildingRequest;
use App\Http\Requests\updateBuildingRequest;

class BuildingController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $buildings = Building::withCount('floors')
            ->where('code_building', 'LIKE', '%'.$keyword.'%')
            ->orWhere('name_building', 'LIKE', '%'.$keyword.'%')
            ->orWhere('address_building', 'LIKE', '%'.$keyword.'%')
            ->latest()
            ->paginate(9);

        return view('admins.places.buildings.index', compact('buildings'));
    }

    public function store(storeBuildingRequest $request)
    {
        $building = new Building([
            'code_building' => $request->code_building,
            'name_building' => $request->name_building,
            'address_building' => $request->address_building,
        ]);
        if($request->file('image_building')) {
            $building->image_building = $request->file('image_building')->store('images');
        }

        $building->save();

        return back()->with('success', ' Data gedung berhasil ditambahkan.');
    }

    //Use Modal Form
    // public function edit($id)
    // {
    //     $building = Building::find($id);
    //     return response()->json([
    //         'status' => 200,
    //         'building'=>$building,
    //     ]);
    // }

    public function edit($id)
    {
        $building = Building::find($id);
        return view('admins.places.buildings.edit', compact('building'));
    }

    public function update(updateBuildingRequest $request)
    {
        $id_building = $request->input('id_building', false);
        $building = Building::find($id_building);
        $building->id_building = $request->id_building;
        $building->code_building = $request->code_building;
        $building->name_building = $request->name_building;
        $building->address_building = $request->address_building;
        if($request->file('image_building')) {
            if($building->image_building) {
                Storage::delete($building->image_building);
            }
            $building->image_building = $request->file('image_building')->store('attachments/image-building');
        }

        $building->update();

        return redirect()->route('buildings.index')->with('success', ' Data gedung berhasil diubah.');
    }

    public function destroy($id)
    {
        $building = Building::find($id);
        $building->delete();

        return back()->with('success', ' Data gedung berhasil dihapus.');
    }
}
