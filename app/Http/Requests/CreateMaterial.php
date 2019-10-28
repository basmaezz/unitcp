<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMaterial extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
             'faculty_id'=>'required',
            'name_ar'=> 'required',
            'name_en'=> 'required',
            'class_id'=>'required',
            'department_id'=> 'required',
            'semester_id'=> 'required',

        ];
    }
}
