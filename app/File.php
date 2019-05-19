<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'display_name', 'file_name', 'mime_type', 'size'
    ];

    public static $rules = [
        'file' => 'required|mimes:pdf,PDF,doc,docx,zip'
    ];

    public static $messages = [
        'file.mimes' => 'الملف الذي تحاول رفعه له صيغة غير مدعومة',
        'file.required' => 'الملف مطلوب'
    ];
}