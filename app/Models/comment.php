<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'post_id',
        'content',
        'user_id',
        'parent_id',
        'parent_user',
        
    ];



    function user()
    {
return $this->belongsTo(User::class);
    }
function post()
{
return $this->belongsTo(post::class);
}
}
