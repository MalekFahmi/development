<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolTeacher extends Model
{
    protected $fillable=[
        'schoolId',
        'teacherId',
        'gradeId',
        'year'
    ];
    public function school()
    {
        return $this->belongsTo(School::class,'schoolId','id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacherId','id');
    }
    public function grade()
    {
        return $this->belongsTo(Level::class,'gradeId','id');
    }
}
