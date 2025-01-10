<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAllocation extends Model
{
    protected $table = 'payment_allocation';
    protected $primaryKey = 'payment_allocation_id';

    protected $fillable = [
        'payment_allocation_name',
        'amount',
        'allocation_date',
        'admin_id',
        'session'
    ];

    // Relationship with Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
