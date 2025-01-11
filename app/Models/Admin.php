<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';  // Specify the table name
    protected $primaryKey = 'admin_id';  // Specify the primary key

    protected $fillable = [
        'role',
        'login_id',
        'phone_number',
        
    ];

    // Define relationships

    // One-to-Many relationship with Merit
    public function merits()
    {
        return $this->hasMany(Merit::class, 'admin_id');
    }

    // One-to-One relationship with Login
    public function login()
    {
        return $this->hasOne(Login::class, 'admin_id', 'admin_id'); // Ensure this relationship is correct
    }

    // Optional: You can add a method to get the admin's applications if needed
    public function applications()
    {
        return $this->hasMany(Application::class, 'login_id', 'login_id'); // Assuming login_id is the foreign key in Application
    }
}
