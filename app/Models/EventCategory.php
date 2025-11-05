<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCategory extends Model
{

    use SoftDeletes, HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'image',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function event(): HasMany
    {
        return $this->hasMany(Event::class);
    }

 
}



