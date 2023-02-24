<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getFloors($id)
    {
        $floors = Floor::where('id_building', $id)->get();

        return response()->json($floors);
    }

    public function getRooms($id)
    {
        $rooms = Room::where('id_floor', $id)->get();

        return response()->json($rooms);
    }

    public function getPrices($id)
    {
        $prices = Floor::where('id_floor', $id)->first();

        return response()->json($prices);
    }
}
