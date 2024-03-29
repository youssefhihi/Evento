<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_banned',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function event()
    {
        return $this->hasMany(event::class,'organizer_id');
    }
}
