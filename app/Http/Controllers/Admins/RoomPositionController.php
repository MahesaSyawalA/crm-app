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
    public function index(Request $request)
    {
        $keyword = $request->search;

        $room_positions = RoomPosition::with('parentRoom.floor.building', 'frontRoom', 'backRoom', 'leftRoom', 'rightRoom')
                                    ->orWhere('id', 'LIKE', '%' . $keyword . '%')
                                    ->latest()
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
            'room_id' => ['required'],
            'front' => ['required'],
            'back' => ['required'],
            'left' => ['required'],
            'right' => ['required'],
        ],
        [
            'room_id.required' => 'The parent room field is required.',
            'front.required' => 'The front room field is required.',
            'back.required' => 'The back room field is required.',
            'left.required' => 'The left room field is required.',
            'right.required' => 'The right room field is required.',
        ]);

        RoomPosition::create($request->all());

        return redirect()->route('roompositions.index')->with('success', ' Data posisi ruang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buildings = Building::withCount('floors')->get();
        $floors = Floor::withCount('rooms')->get();
        $rooms = Room::get();
        $room_position = RoomPosition::with('parentRoom.floor.building', 'frontRoom', 'backRoom', 'leftRoom', 'rightRoom')
            ->find($id);

        return view('admins.places.roompositions.edit', compact('room_position', 'buildings', 'floors', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => ['required'],
            'front' => ['required'],
            'back' => ['required'],
            'left' => ['required'],
            'right' => ['required'],
        ],
        [
            'room_id.required' => 'The parent room field is required.',
            'front.required' => 'The front room field is required.',
            'back.required' => 'The back room field is required.',
            'left.required' => 'The left room field is required.',
            'right.required' => 'The right room field is required.',
        ]);

        $room_position = RoomPosition::find($id);
        $room_position->update($request->all());

        return redirect()->route('roompositions.index')->with('success', ' Data posisi ruang berhasil diubah.');
    }

    public function destroy($id)
    {
        $room_position = RoomPosition::find($id);
        $room_position->delete();

        return back()->with('success', ' Data ruang berhasil dihapus.');
    }
}
