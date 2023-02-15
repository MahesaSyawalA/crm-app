<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;

class RoomPositionController extends Controller
{
    public function index()
    {
        return view('admins.places.roompositions.index');
    }
    public function create()
    {
        return view('admins.places.roompositions.create');
    }
}
