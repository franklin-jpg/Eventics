<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'event_booking_id',
        'transaction_reference',
        'payment_method',
        'channel',
        'status',
        'amount',
        'metadata',
    ];
    protected $cast = [
        'metadata' => 'array',
    ];


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function eventBooking():BelongsTo
    {
        return $this->belongsTo(EventBooking::class);
    }

    public function isCompleted(): bool
    {
        return $this->status == 'completed';
    }

    
    public function ispending(): bool
    {
        return $this->status == 'pending';
    }


    
    public function isFailed(): bool
    {
        return $this->status == 'failed';
    }
}
