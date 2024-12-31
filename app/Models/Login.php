<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login extends Authenticatable
{
    use Notifiable;

    protected $table = 'login';  // Specify the table name
    protected $primaryKey = 'login_id';  // Specify the primary key

    protected $fillable = [
        'member_id',
        'admin_id',
        'acc_status',
        'username',
        'password', 
        'email',
        'application_id',
    ];

    // Define relationships if necessary
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function application()
    {
        return $this->hasOne(Application::class, 'login_id', 'login_id'); // Correct the relationship
    }


    public function joinevents()
    {
        return $this->hasMany(Joinevent::class, 'member_id');
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'login_id', 'login_id');
    }


}
