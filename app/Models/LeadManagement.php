<?php

namespace App\Models;

use App\Enums\PotentialStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeadManagement extends Model
{
    use HasFactory;

    protected $table = 'lead_managements';
    protected $fillable = ['name', 'phone_number', 'ktp_number', 'address', 'ktp_image', 'potential', 'company_name', 'company_phone'];

    protected $casts = [
        'potential' => PotentialStatus::class,
    ];

    public function industryLeadManagement()
    {
        return $this->hasMany(IndustryLeadManagement::class);
    }

    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'industry_lead_management', 'lead_management_id', 'industry_id');
    }
}
