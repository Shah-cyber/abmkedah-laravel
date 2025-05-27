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

    public function findNonmemberByEmail($email)
    {
        return Nonmember::where('email', $email)->first();
    }

    public function verifyIfJoinedEvent($email, $eventId)
    {
        // Check if the nonmember email exists
        $existingNonmember = Nonmember::where('email', $email)->first();

        if ($existingNonmember) {
            // Check if the nonmember has already joined the event
            $existingJoinEvent = Joinevent::where('event_id', $eventId)
                                        ->where('nonmember_id', $existingNonmember->nonmember_id)
                                        ->first();

            if ($existingJoinEvent) {
                // Check if payment is required and completed
                $completedPayment = PaymentReceipt::where('event_id', $eventId)
                                                ->where('nonmember_id', $existingNonmember->nonmember_id)
                                                ->where('payment_status', 'completed')
                                                ->first();

                // If no completed payment found, treat as not joined
                if (!$completedPayment) {
                    return true;
                }

                // Completed payment exists, consider as already joined
                return [
                    'success' => false,
                    'message' => 'You have already joined this event.'
                ];
            }
        }

        // Return true if not joined
        return true;
    }


}
