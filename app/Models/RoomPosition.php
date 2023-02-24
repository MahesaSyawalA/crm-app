<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPosition extends Model
{
    use HasFactory;

    protected $table = 'room_positions';
    protected $primaryKey = 'id_room_position';
    protected $fillable = ['front', 'back', 'left', 'right', 'id_building', 'id_floor', 'id_room'];

    public function building()
    {
        return $this->belongsTo(Building::class, 'id_building');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'id_floor');
    }

    //didefinisikan masing"
    public function parentRoom()
    {
        return $this->belongsTo(Room::class, 'id_room');
    }

    public function frontRoom()
    {
        return $this->belongsTo(Room::class, 'front');
    }

    public function backRoom()
    {
        return $this->belongsTo(Room::class, 'back');
    }

    public function leftRoom()
    {
        return $this->belongsTo(Room::class, 'left');
    }

    public function rightRoom()
    {
        return $this->belongsTo(Room::class, 'right');
    }
}
