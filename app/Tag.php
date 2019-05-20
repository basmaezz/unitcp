<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
//    use SoftDeletes;
    protected $fillable=[
        'id','name_en','name_ar'
    ];

    public function exams(){
        return $this->belongsToMany(Exam::class,'tag_exams');
    }
}
