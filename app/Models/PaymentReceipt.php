<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReceipt extends Model
{
    use HasFactory;

    protected $table = 'payment_receipt';
    protected $primaryKey = 'payment_receipt_id';

    protected $fillable = [
        'payment_name',
        'payment_fee',
        'payment_time',
        'payment_date',
        'member_id',
        'nonmember_id',
        'payment_status',
        'transaction_id',
        'event_id',
        'payment_allocation_id'
    ];

    // Relationships
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function nonmember()
    {
        return $this->belongsTo(NonMember::class, 'nonmember_id');
    }

    public function event()
    {
        return $this->belongsTo(AbmEvent::class, 'event_id');
    }
}
