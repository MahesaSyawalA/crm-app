<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Floor;

class RoomController extends Controller
{
    public function index()
    {
        return view('admins.places.rooms.index');
    }
    public function create()
    {
        $buidlings = [
            'buildings' => Building::withCount('floors')->get(),
        ];

        return view('admins.places.rooms.create', $buidlings);
    }

    public function getFloors($id)
    {
        $floors = Floor::where('id_building', $id)->get();

        return response()->json($floors);
    }
}
