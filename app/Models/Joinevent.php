<?php

namespace App\Models;

use App\Models\AbmEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Joinevent extends Model
{
    use HasFactory;

    protected $table = 'joinevent';  // Specify the table name if it doesn't follow Laravel's naming convention
    protected $primaryKey = 'join_event_id';  // Specify the primary key if it's not 'id'

    // Define the fillable properties
    protected $fillable = [
        'event_id',
        'member_id',
        'nonmember_id',
    ];

    // Define relationships
    public function event()
    {
        return $this->belongsTo(AbmEvent::class, 'event_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    
    public function nonmember()
    {
        return $this->belongsTo(Nonmember::class, 'nonmember_id');
    }

}
