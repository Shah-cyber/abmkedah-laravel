<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nonmember extends Model
{
    use HasFactory;

    protected $table = 'nonmember';  // Specify the table name if it doesn't follow Laravel's naming convention
    protected $primaryKey = 'nonmember_id';  // Specify the primary key if it's not 'id'

    protected $fillable = [
        'name',
        'ic_number',
        'email',
        'phone_number',
    ];

    // Define relationships if needed
    public function joinevents()
    {
        return $this->hasMany(Joinevent::class, 'nonmember_id');
    }

    

}
