<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=> 'required',
             'username'=> 'required',
            'password'=>'required',
            'email'=>'required',
        ];
    }
}
