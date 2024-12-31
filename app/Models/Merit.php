<?php
 
namespace App\Models;

use App\Models\AbmEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merit extends Model
{
    use HasFactory;
    protected $table = 'merit';  // Specify the table name if it doesn't follow Laravel's naming convention
    protected $primaryKey = 'merit_id';  // Specify the primary key if it's not 'id'

    protected $fillable = [
        'event_id',
        'merit_point',
        'admin_id',
        'allocation_date',
    ];

    // Define relationships if necessary
    public function event()
    {
        return $this->belongsTo(AbmEvent::class, 'event_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function Joinevent()
    {
        return $this->hasMany(JoinEvent::class, 'event_id');
    }
}
