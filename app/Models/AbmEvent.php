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

    public function merits()
    {
        return $this->hasMany(Merit::class, 'event_id', 'event_id'); // Adjust the foreign key and local key if necessary
    }
}
