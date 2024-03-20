<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory , SoftDeletes;
    
protected $fillable = [
    'name',
];

public function event()
{
    return $this->hasMany(Event::class, 'category_id');
}
}