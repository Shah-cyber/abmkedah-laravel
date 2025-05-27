<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetHistory extends Model
{
    protected $table = 'password_reset_history';

    protected $fillable = [
        'email',
        'reset_token',
        'requested_at',
        'completed_at',
        'ip_address',
        'user_agent',
        'success'
    ];

    protected $casts = [
        'requested_at' => 'datetime',
        'completed_at' => 'datetime',
        'success' => 'boolean'
    ];

    /**
     * Get the user associated with the password reset.
     */
    public function user()
    {
        return $this->belongsTo(Login::class, 'email', 'email');
    }

    /**
     * Scope a query to only include successful resets.
     */
    public function scopeSuccessful($query)
    {
        return $query->where('success', true);
    }

    /**
     * Scope a query to only include pending resets.
     */
    public function scopePending($query)
    {
        return $query->whereNull('completed_at');
    }

    /**
     * Check if the reset was successful.
     */
    public function isSuccessful()
    {
        return $this->success === true;
    }

    /**
     * Check if the reset is pending.
     */
    public function isPending()
    {
        return $this->completed_at === null;
    }
} 