<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $fillable = [
         'id','name_ar','name_en','faculty_id'
    ];

    public function faculty(){
        return $this->belongsTo('App\Faculty','faculty_id','id');
    }
}
