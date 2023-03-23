<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryTenant extends Model
{
    use HasFactory;

    protected $table = 'industry_tenant';

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
