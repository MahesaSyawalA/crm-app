<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryLeadManagement extends Model
{
    use HasFactory;

    protected $table = "industry_lead_management";

    public function LeadManagement()
    {
        return $this->belongsTo(LeadManagement::class);
    }
}
