<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbmEvent extends Model
{

    use HasFactory;

    protected $table = 'abmevent';
    protected $primaryKey = 'event_id';

    protected $fillable = [
        'event_name',
        'banner',
        'event_description',
        'total_participation',
        'event_category',
        'event_status',
        'event_date',
        'event_session',
        'event_start_time',
        'event_end_time',
        'event_location',
        'event_price',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function joinevents()
    {
        return $this->hasMany(Joinevent::class, 'event_id');
    }

    public function merits()
    {
        return $this->hasMany(Merit::class, 'event_id');
    }

    public function paymentReceipts()
    {
        return $this->hasMany(PaymentReceipt::class, 'event_id');
    }
}
