<?php

namespace App\Models;

use App\Enums\BillingStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Billing extends Model
{
    use HasFactory;

    protected $table = 'billings';
    protected $fillable = ['code', 'name', 'release_date', 'due_date', 'status', 'contract_id'];

    protected $casts = [
        'status' => BillingStatus::class,
    ];

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }
}
