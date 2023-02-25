<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $table = 'floors';
    protected $fillable = ['code', 'name', 'monthly_price', 'daily_price', 'service_charge', 'own_electricity', 'overtime_up_4', 'overtime_down_4', 'building_id'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'floor_id');
    }
}
