<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $table = 'buildings';
    protected $primaryKey = 'id_building';
    protected $fillable = ['code_building', 'name_building', 'address_building', 'image_building'];

    public function floors()
    {
        return $this->hasMany(Floor::class, 'id_building');
    }
}
