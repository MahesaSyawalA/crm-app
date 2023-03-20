<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $table = 'industries';
    protected $fillable = ['name'];

    public function industryLeadManagement()
    {
        return $this->hasMany(Industry::class);
    }

    public function leadManagements()
    {
        return $this->belongsToMany(LeadManagement::class, 'industry_lead_management');
    }
}
