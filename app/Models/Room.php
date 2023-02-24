<?php

namespace App\Models;

use App\Enums\RoomStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $casts = [
        'status_room' => RoomStatus::class
    ];

    protected $table = 'rooms';
    protected $primaryKey = 'id_room';
    protected $fillable = ['code_room', 'name_room', 'status_room', 'wide_room', 'overtime_up_4_total', 'overtime_down_4_total', 'service_charge_total', 'own_electricity_total', 'image_room', 'desc_room', 'id_building', 'id_floor'];

    public function building()
    {
        return $this->belongsTo(Building::class, 'id_building');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'id_floor');
    }
}
