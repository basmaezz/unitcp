<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $fillable = [
         'id','name_ar','name_en','faculty_id','class_id','semester_id','department_id'
    ];

    public function faculty(){
        return $this->belongsTo('App\Faculty','faculty_id','id');
    }
}
