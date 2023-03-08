<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $buildings = Building::withCount('floors')
            ->where('code', 'LIKE', '%' . $keyword . '%')
            ->orWhere('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('address', 'LIKE', '%' . $keyword . '%')
            ->latest()
            ->paginate(10);

        return view('admins.places.buildings.index', compact('buildings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'unique:buildings'],
            'name' => ['required'],
            'address' => ['required'],
            'image' => ['image', 'file', 'max:2048'],
        ]);

        $building = new Building([
            'code' => $request->code,
            'name' => $request->name,
            'address' => $request->address,
        ]);
        if ($request->file('image')) {
            $path = $request->file('image')->store('images/buildings');
            $splits = explode('/', $path);

            $building->image = end($splits);
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => ['required'],
            'name' => ['required'],
            'address' => ['required'],
            'image' => ['image', 'file', 'max:2048'],
        ]);

        $building = Building::find($id);
        $building->code = $request->code;
        $building->name = $request->name;
        $building->address = $request->address;
        if ($request->file('image')) {
            if ($request->old_image) {
                Storage::delete('images/buildings/'.$request->old_image);
            }
            $path = $request->file('image')->store('images/buildings');
            $splits = explode('/', $path);

            $building->image = end($splits);
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
