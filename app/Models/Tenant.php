<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use HasFactory;

    protected $table = 'tenants';
    protected $fillable = ['company_name', 'company_phone', 'name', 'phone_number', 'address', 'user_id', 'grade_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function industryTenant()
    {
        return $this->hasMany(IndustryTenant::class);
    }

    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'industry_tenant', 'tenant_id', 'industry_id');
    }
}
