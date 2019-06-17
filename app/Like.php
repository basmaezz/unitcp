<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Like extends Model
{
    use SoftDeletes;

    protected $fillable=['id','student_id','exam_id','likenum'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);

    }

    public function student()
    {
        return $this->belongsTo(User::class);

    }
}
