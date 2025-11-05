<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'event_category_id',
        'title',
        'slug',
        'description',
        'event_date',
        'location',
        'ticket_price',
        'status',
        'image',
    ];

    protected $casts = [

        'event_date' => 'datetime',
    ];

       public function getRouteKeyName()
    {
        return 'slug';
    }

    // relationship with category
    public function category(): BelongsTo 
    {
      return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    // date & time format
    public function getFormatedDate() 
    {
        return $this->event_date->format('d, M - Y');
    }

      public function getFormatedTime() 
    {
        return $this->event_date->format('g:i A');

    }

        public function getFormatedDateTime() 
    {
        return $this->event_date->format('F d, Y \a\t g:i A');
        
    }
}

