<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';  // Specify the table name if it doesn't follow Laravel's naming convention
    protected $primaryKey = 'member_id';  // Specify the primary key if it's not 'id'

    protected $fillable = [ 
        'application_id',
        'total_merit',
        'registration_status',
        'intake_session',
        'name',
        'ic_number',
        'age',
        'gender',
        'race',
        'religion',
        'birthdate',
        'birthplace',
        'address',
        'phone_number',
        'member_status',
        'login_id',
    ];

     // Define relationships

    // Relationship with Login model
    public function login()
    {
        return $this->belongsTo(Login::class, 'login_id', 'login_id'); // Assuming login_id is the foreign key
    }

    // Relationship with Application model
    public function application()
    {
        return $this->hasOne(Application::class, 'login_id', 'login_id'); // Assuming login_id links to Application
    }

    // Relationship with Joinevent model
    public function joinevents()
    {
        return $this->hasMany(Joinevent::class, 'member_id');
    }



}
