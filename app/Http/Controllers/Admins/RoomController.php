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
    public function index()
    {
        $buildings = Building::withCount('floors')->get();
        $rooms = Room::with('building', 'floor')->latest()->paginate(9);

        // dd($rooms);
        return view('admins.places.rooms.index', compact('rooms', 'buildings'));
    }
    public function create()
    {
        $buildings = Building::withCount('floors')->get();

        return view('admins.places.rooms.create', compact('buildings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code_room' => ['required', 'unique:rooms'],
            'name_room' => ['required'],
            'status_room' => ['required'],
            'wide_room' => ['required'],
            'overtime_up_4_total' => ['required'],
            'overtime_down_4_total' => ['required'],
            'service_charge_total' => ['required'],
            'own_electricity_total' => ['required'],
            'image_room' => ['image', 'file', 'max:2048'],
            'desc_room' => ['required'],
            'id_building' => ['required'],
            'id_floor' => ['required'],
        ],
        [
            'id_building.required' => 'The building field is required.',
            'id_floor.required' => 'The floor field is required.',
        ]);

        $room = new Room([
            'code_room' => $request->code_room,
            'name_room' => $request->name_room,
            'status_room' => $request->status_room,
            'wide_room' => $request->wide_room,
            'overtime_up_4_total' => $request->overtime_up_4_total,
            'overtime_down_4_total' => $request->overtime_down_4_total,
            'service_charge_total' => $request->service_charge_total,
            'own_electricity_total' => $request->own_electricity_total,
            'desc_room' => $request->desc_room,
            'id_building' => $request->id_building,
            'id_floor' => $request->id_floor,
        ]);
        if ($request->file('image_room')) {
            $path = $request->file('image_room')->store('images/rooms');
            $splits = explode('/', $path);

            $room->image_room = end($splits);
        }

        $room->save();

        return redirect()->route('rooms.index')->with('success', ' Data ruang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buildings = Building::withCount('floors')->get();
        $room = Room::with('floor')->find($id);
        return view('admins.places.rooms.edit', compact('room', 'buildings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'code_room' => ['required'],
            'name_room' => ['required'],
            'status_room' => ['required'],
            'wide_room' => ['required'],
            'overtime_up_4_total' => ['required'],
            'overtime_down_4_total' => ['required'],
            'service_charge_total' => ['required'],
            'own_electricity_total' => ['required'],
            'image_room' => ['image', 'file', 'max:2048'],
            'desc_room' => ['required'],
            'id_building' => ['required'],
            'id_floor' => ['required'],
        ],
        [
            'id_building.required' => 'The building field is required.',
            'id_floor.required' => 'The floor field is required.',
        ]);

        $id_room = $request->input('id_room', false);
        $room = Room::find($id_room);
        $room->id_room = $request->id_room;
        $room->code_room = $request->code_room;
        $room->name_room = $request->name_room;
        $room->status_room = $request->status_room;
        $room->wide_room = $request->wide_room;
        $room->overtime_up_4_total = $request->overtime_up_4_total;
        $room->overtime_down_4_total = $request->overtime_down_4_total;
        $room->service_charge_total = $request->service_charge_total;
        $room->own_electricity_total = $request->own_electricity_total;
        $room->desc_room = $request->desc_room;
        $room->id_building = $request->id_building;
        $room->id_floor = $request->id_floor;
        if ($request->file('image_room')) {
            if ($room->image_room) {
                Storage::delete($room->image_room);
            }
            $path = $request->file('image_room')->store('images/rooms');
            $splits = explode('/', $path);

            $room->image_room = end($splits);
        }

        $room->update();

        return redirect()->route('rooms.index')->with('success', ' Data ruang berhasil diubah.');
    }

    public function show($id)
    {
        $room = Room::with('building', 'floor')->find($id);

        return view('admins.places.rooms.show', compact('room'));
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();

        return back()->with('success', ' Data ruang berhasil dihapus.');
    }
}
