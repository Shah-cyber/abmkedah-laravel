<?php

namespace App\Models;

use App\Models\Merit;
use App\Models\Member;
use App\Models\AbmEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AllocatedMerit extends Model
{
    use HasFactory;

    protected $table = 'allocated_merit';  // Specify the table name if it doesn't follow Laravel's naming convention
    protected $primaryKey = 'allocated_merit_id';  // Specify the primary key if it's not 'id'

    protected $fillable = [
        'admin_id',
        'member_id',
        'event_id',
        'merit_id',
        'merit_point',
        'allocation_date',
    ];

    // Define relationships if necessary
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function event()
    {
        return $this->belongsTo(AbmEvent::class, 'event_id');
    }

    public function merit()
    {
        return $this->belongsTo(Merit::class, 'merit_id');
    }

    public function Joinevent()
    {
        return $this->hasMany(JoinEvent::class, 'event_id');
    }
}
