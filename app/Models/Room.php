<?php

namespace App\Models;

use App\Enums\RoomStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => RoomStatus::class
    ];

    protected $table = 'rooms';
    protected $fillable = ['code', 'name', 'status', 'wide', 'overtime_up_4_total', 'overtime_down_4_total', 'service_charge_total', 'own_electricity_total', 'image', 'description', 'floor_id'];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function room_positions()
    {
        return $this->hasMany(RoomPosition::class);
    }
}
