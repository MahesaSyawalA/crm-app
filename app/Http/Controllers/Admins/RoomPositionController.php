<?php

namespace App\Http\Controllers\Admins;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Building;
use App\Models\RoomPosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomPositionController extends Controller
{
    public function index()
    {
        $room_positions = RoomPosition::with('building', 'floor', 'parentRoom', 'frontRoom', 'backRoom', 'leftRoom', 'rightRoom')
            ->paginate(9);

        return view('admins.places.roompositions.index', compact('room_positions'));
    }

    public function create()
    {
        $buildings = Building::withCount('floors')->get();
        $floors = Floor::withCount('rooms')->get();

        return view('admins.places.roompositions.create', compact('buildings', 'floors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'front' => ['required'],
            'back' => ['required'],
            'left' => ['required'],
            'right' => ['required'],
            'id_building' => ['required'],
            'id_floor' => ['required'],
            'id_room' => ['required'],
        ],
        [
            'id_building.required' => 'The building field is required.',
            'id_floor.required' => 'The floor field is required.',
            'id_room.required' => 'The room field is required.',
        ]);

        RoomPosition::create($request->all());

        return redirect()->route('roompositions.index')->with('success', ' Data posisi ruang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buildings = Building::withCount('floors')->get();
        $floors = Floor::withCount('rooms')->get();
        $rooms = Room::get();
        $room_position = RoomPosition::with('building', 'floor', 'parentRoom', 'frontRoom', 'backRoom', 'leftRoom', 'rightRoom')
            ->find($id);

        return view('admins.places.roompositions.edit', compact('room_position', 'buildings', 'floors', 'rooms'));
    }
}
