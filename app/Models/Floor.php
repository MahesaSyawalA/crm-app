<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $table = 'floors';
    protected $primaryKey = 'id_floor';
    protected $fillable = ['id_building', 'code_floor', 'name_floor', 'monthly_price', 'daily_price', 'service_charge_floor', 'service_charge_own_electricity', 'overtime_up_4', 'overtime_down_4'];

    public function building()
    {
        return $this->belongsTo(Building::class, 'id_building');
    }
}
