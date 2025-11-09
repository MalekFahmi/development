<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'userId',
        'schoolId',
        'description'
    ]; 
    public function school()
    {
        return $this->belongsTo(school::class,'schoolId','id');
    }
     public function user()
    {
        return $this->belongsTo(user::class,'userId','id');
    }
}
