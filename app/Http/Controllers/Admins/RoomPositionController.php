<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomPositionController extends Controller
{
    public function index()
    {
        return view('admins.places.room-positions.index');
    }
    public function create()
    {
        return view('admins.places.room-positions.create');
    }
}
