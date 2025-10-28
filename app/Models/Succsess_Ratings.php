<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Succsess_Ratings extends Model
{
    protected $fillable=[
        'schoolId',
        'A',
        'B',
        'C',
        'D'
    ];
    
    public function school()
    {
        return $this->belongsTo(school::class,'schoolId','id');
    }
}
