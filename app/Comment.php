<?php

namespace App;

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\User;

class Comment extends Model
{
    use SoftDeletes;


    protected $fillable=['id','student_id','exam_id','comment'];

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(User::class);

    }
}