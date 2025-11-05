<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EventBooking extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'booking_reference',
        'quantity',
        'amount',
        'status',
    ];

    public function user(): BelongsTo
    {
        return$this->belongsTo(User::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function transaction():HasOne
    {
        return $this->hasOne(Transaction::class);
    }

    public static function generateBookingReference(): string {
        do{
            $reference = 'BK-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        }while(self::where('booking_reference', $reference)->exists());
        return $reference;
    }
}
