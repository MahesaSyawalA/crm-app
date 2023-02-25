<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getFloors($id)
    {
        $floors = Floor::where('building_id', $id)->get();

        return response()->json($floors);
    }

    public function getRooms($id)
    {
        $rooms = Room::where('floor_id', $id)->get();

        return response()->json($rooms);
    }

    public function getPrices($id)
    {
        $prices = Floor::where('id', $id)->first();

        return response()->json($prices);
    }
}
