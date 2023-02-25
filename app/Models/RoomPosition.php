<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPosition extends Model
{
    use HasFactory;

    protected $table = 'room_positions';
    protected $fillable = ['room_id', 'front', 'back', 'left', 'right'];

    //didefinisikan masing"
    public function parentRoom()
    {
        return $this->belongsTo(Room::class, 'room_id');
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
