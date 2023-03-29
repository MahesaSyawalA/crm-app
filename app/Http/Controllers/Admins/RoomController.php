<?php

namespace App\Http\Controllers\Admins;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $buildings = Building::withCount('floors')->get();
        // $rooms = Room::query()->with('floor.building')->withCount('room_positions')->latest();

        // $rooms->when($request->qglobal, function ($query) use ($request) {
        //     return $query->where('code', 'LIKE', '%'.$request->qglobal.'%')
        //                 ->orWhere('name', 'LIKE', '%'.$request->qglobal.'%')
        //                 ->orWhere('wide', 'LIKE', '%'.$request->qglobal.'%');
        // });

        // $rooms->whereHas('floor.building', function ($query) use ($request) {
        //     return $query->where('building_id', 'LIKE', '%'.$request->qbuilding);
        // });

        // $rooms->when($request->qfloor, function ($query) use ($request) {
        //     return $query->where('floor_id', 'LIKE', '%'.$request->qfloor);
        // });

        // $rooms->when($request->qstatus, function ($query) use ($request) {
        //     return $query->where('status', 'LIKE', '%'.$request->qstatus);
        // });

        // return view('admins.places.rooms.index', ['rooms' => $rooms->paginate(10), 'buildings' => $buildings]);
        return view('admins.places.rooms.index', compact('buildings'));
    }
    public function create()
    {
        $buildings = Building::withCount('floors')->get();

        return view('admins.places.rooms.create', compact('buildings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'building' => ['required'],
            'floor_id' => ['required'],
            'code' => ['required', 'unique:rooms'],
            'name' => ['required'],
            'status' => ['required'],
            'wide' => ['required'],
            'overtime_up_4_total' => ['required'],
            'overtime_down_4_total' => ['required'],
            'service_charge_total' => ['required'],
            'own_electricity_total' => ['required'],
            'image' => ['image', 'file', 'max:2048'],
            'description' => ['required'],
        ],
        [
            'floor_id.required' => 'The floor field is required.',
        ]);

        $room = new Room([
            'code' => $request->code,
            'name' => $request->name,
            'status' => $request->status,
            'wide' => $request->wide,
            'overtime_up_4_total' => $request->overtime_up_4_total,
            'overtime_down_4_total' => $request->overtime_down_4_total,
            'service_charge_total' => $request->service_charge_total,
            'own_electricity_total' => $request->own_electricity_total,
            'description' => $request->description,
            'floor_id' => $request->floor_id,
        ]);
        if ($request->file('image')) {
            $path = $request->file('image')->store('images/rooms');
            $splits = explode('/', $path);

            $room->image = end($splits);
        }

        $room->save();

        return redirect()->route('rooms.index')->with('success', ' Data ruang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buildings = Building::withCount('floors')->get();
        $room = Room::with('floor.building')->find($id);
        return view('admins.places.rooms.edit', compact('room', 'buildings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'building' => ['required'],
            'floor_id' => ['required'],
            'code' => ['required'],
            'name' => ['required'],
            'status' => ['required'],
            'wide' => ['required'],
            'overtime_up_4_total' => ['required'],
            'overtime_down_4_total' => ['required'],
            'service_charge_total' => ['required'],
            'own_electricity_total' => ['required'],
            'image' => ['image', 'file', 'max:2048'],
            'description' => ['required'],
        ],
        [
            'floor_id.required' => 'The floor field is required.',
        ]);

        $room = Room::find($id);
        $room->code = $request->code;
        $room->name = $request->name;
        $room->status = $request->status;
        $room->wide = $request->wide;
        $room->overtime_up_4_total = $request->overtime_up_4_total;
        $room->overtime_down_4_total = $request->overtime_down_4_total;
        $room->service_charge_total = $request->service_charge_total;
        $room->own_electricity_total = $request->own_electricity_total;
        $room->description = $request->description;
        $room->floor_id = $request->floor_id;
        if ($request->file('image')) {
            if ($request->old_image) {
                Storage::delete('images/rooms/'.$request->old_image);
            }
            $path = $request->file('image')->store('images/rooms');
            $splits = explode('/', $path);

            $room->image = end($splits);
        }
        $room->update();

        return redirect()->route('rooms.index')->with('success', ' Data ruang berhasil diubah.');
    }

    public function show($id)
    {
        $room = Room::with('floor.building')->find($id);

        return view('admins.places.rooms.show', compact('room'));
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();

        return back()->with('success', ' Data ruang berhasil dihapus.');
    }
}
