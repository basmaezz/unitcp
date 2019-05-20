<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Faculty;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
use SoftDeletes;
    protected $fillable=[
        'id','faculty_id','name_en','name_ar'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'department_id', 'id');
    }
}
