<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

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
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
