<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function who_users()
    {
        return $this->belongsTo('App\User', 'who', 'id');
    }

}