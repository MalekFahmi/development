<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $fillable=[
        'schoolId',
        'levellId',
        'price'
    ];
    public function level()
    {
        return $this->belongsTo(Level::class,'levellId','id');
    }
    public function school()
    {
        return $this->belongsTo(school::class,'schoolId','id');
    }
}
