<?php

namespace App\Models;

use App\Models\Member;
use App\Models\AbmEvent;
use App\Models\Nonmember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Joinevent extends Model
{
    use HasFactory;


    protected $table = 'joinevent';  // Specify the table name if it doesn't follow Laravel's naming convention
    protected $primaryKey = 'join_event_id';  // Specify the primary key if it's not 'id'
    public $timestamps = true;

    // Define the fillable properties
    protected $fillable = [
        'event_id',
        'member_id',
        'nonmember_id',
    ];

    public function event()
    {
        return $this->belongsToMany(AbmEvent::class, 'event_id', 'event_id'); // Replace column names if needed
    }

    public function member()
    {
        return $this->belongsToMany(Member::class, 'member_id', 'member_id'); // Replace column names if needed
    }
    
    public function nonmember()
    {
        return $this->belongsToMany(NonMember::class, 'nonmember_id', 'nonmember_id');
    }

}
