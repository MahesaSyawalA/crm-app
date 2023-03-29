<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';
    protected $fillable = [
        'booking_status',
        'booking_code',
        'room_wide',
        'time_period',
        'term',
        'start_date',
        'end_date',
        'term_payment',
        'contract_payment',
        'service_charge',
        'ppn_type',
        'ppn',
        'contract_deposit',
        'line_deposit',
        'stamp',
        'description',
        'additional_service',
        'total_payment',
        'room_id',
        'room_position_id',
        'tenant_id',
        'service_id'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function room_position()
    {
        return $this->belongsTo(RoomPosition::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
