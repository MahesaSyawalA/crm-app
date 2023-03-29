<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Floor;
use App\Models\Grade;
use App\Models\LeadManagement;
use App\Models\RoomPosition;
use App\Models\Service;
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

    public function getRoomPositions($id)
    {
        $room_positions = RoomPosition::with('frontRoom', 'backRoom', 'leftRoom', 'rightRoom')->where('room_id', $id)->first();

        return response()->json($room_positions);
    }

    public function getFloorDetails($id)
    {
        $details = Floor::where('id', $id)->first();

        return response()->json($details);
    }

    public function getRoomDetails($id)
    {
        $details = Room::where('id', $id)->first();

        return response()->json($details);
    }

    public function getUserDetails($id)
    {
        $details = User::where('id', $id)->first();

        return response()->json($details);
    }

    public function getGrade($id)
    {
        $grade = Grade::where('id', $id)->first();

        return response()->json($grade);
    }

    public function getService($id)
    {
        $service = Service::where('id', $id)->first();

        return response()->json($service);
    }

    public function getLeadManagements($id)
    {
        $lead_management = LeadManagement::where('id', $id)->first();

        return response()->json($lead_management);
    }
}
