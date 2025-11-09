<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
     protected $fillable=[
        'userId',
        'schoolId',
        'rating'
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
