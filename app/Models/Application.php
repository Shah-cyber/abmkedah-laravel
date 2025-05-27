<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Application extends Model
{
    use HasFactory;

    protected $table = 'application';  // Specify the table name
    protected $primaryKey = 'application_id';  // Specify the primary key

    protected $fillable = [
        'login_id',
        'name',
        'ic_number',
        'age',
        'race',
        'religion',
        'gender',
        'phone_number',
        'birthplace',
        'birthdate',
        'address',
        'prove_letter',
        'application_status'
    ];

   // Define the relationship with the Login model
   public function login()
{
    return $this->belongsTo(Login::class, 'login_id', 'login_id'); // Make sure these match your database columns
}



   // Optional: Define relationship with the Member model if needed
   public function member()
   {
       return $this->hasOne(Member::class, 'login_id', 'login_id'); // Assuming the member is linked to the login
   }

   // Optional: Define relationship with the Admin model if needed
   public function admin()
   {
       return $this->hasOne(Admin::class, 'login_id', 'login_id'); // Assuming the admin is linked to the login
   }
}
