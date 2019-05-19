<?php

namespace App;

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Year extends Model
{
    use SoftDeletes;


    protected $fillable=['id','name'];
 }
