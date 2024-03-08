<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'date',
        'local',
        'is_approved',
        'category_id',
        'type_booking',
        'placesNumber',
        'organizer_id',
        'is_approved',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function organizer()
    {
        return $this->belongsTo(Organizer::class,'organizer_id');
    }
    public function reservation()
    {
        return $this->hasMany(reservation::class,'event_id');
    }
}
