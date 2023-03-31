<?php

namespace App\Models;

use App\Enums\ApprovalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Approval extends Model
{
    use HasFactory;

    protected $table = 'approvals';
    protected $fillable = ['status', 'description', 'contract_id', 'user_id'];

    protected $casts = [
        'status' => ApprovalStatus::class,
    ];

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
