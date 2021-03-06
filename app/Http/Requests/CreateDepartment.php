<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDepartment extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'faculty_id'=> 'required',
            'name_en'=> 'required',
            'name_ar'=> 'required',

        ];
    }
}
