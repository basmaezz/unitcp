<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use SoftDeletes;
    protected $fillable = [
'id', 'name_ar', 'name_en', 'active'
    ];

    public function child(){
        return $this->hasMany('App\Faculty','parent_id','id');
    }


    public function Users()
    {
        return $this->hasMany('App\User');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'faculty_id', 'id');
    }

    public function scopeSearch($q,Request $request){
        if ($request->has('id') && !empty($request->id)){
            $q->where('id',$request->id);
        }
        return $q;
    }

    public static function getExcerpt($str, $startPos = 0, $maxLength = 50)
    {
        if (strlen($str) > $maxLength) {
            $excerpt = substr($str, $startPos, $maxLength - 6);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt = substr($excerpt, 0, $lastSpace);
            $excerpt .= ' [...]';
        } else {
            $excerpt = $str;
        }

        return $excerpt;
    }

    public function exam()
    {
        return $this->hasMany(Exam::class,'faculty_id');
    }


    public function faculty()
    {
        return $this->belongsTo('\App\Faculty', 'faculty_id', 'id');
    }

}
