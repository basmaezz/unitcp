<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateExam extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [


//            'faculty_id'=> 'required',

          'faculty'=> 'required',

        ];
    }
}
