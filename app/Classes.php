<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use SoftDeletes;

    protected $table = 'classes';
    protected $fillable=[
        'id','faculty_id','name_en','name_ar'
    ];


    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }


}
