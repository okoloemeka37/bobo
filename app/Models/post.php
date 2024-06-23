<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use HasFactory,SoftDeletes;
protected $fillable=[
    'title',
    'image',
    'content',
    'user_id'
];

public function comment()
{
   return $this->hasMany(comment::class);
}
}
