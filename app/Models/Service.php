<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = ['name', 'unit', 'price', 'description', 'user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
