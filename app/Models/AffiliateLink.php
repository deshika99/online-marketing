<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'raffle_ticket_id',
        'link',
    ];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(Aff_Customer::class);
    }

    // Relationship to the RaffleTicket model
    public function raffleTicket()
    {
        return $this->belongsTo(RaffleTicket::class, 'raffle_ticket_id');
    }
}
