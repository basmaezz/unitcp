<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Config;


class ConfigController extends Controller
{
    public function index(){
        $conf =config :: get();
//        dd($conf);
        return view('panel.config',compact('conf'));

    }


    public function update( Request $request)
    {
        $conf = Config::where('name', 'site_name')->first();
        $conf->config = $request->name_ar;

//        $imgconf = $request->file('img-off');
//        $img_size = $imgconf->getClientSize();
//        $extension = $imgconf->getClientOriginalExtension();
//
//        $originalName = str_replace('.' . $extension, '', $imgconf->getClientOriginalName());
//        $imgconf->move(public_path('uploads/settings/'),$originalName. '.'.$extension);
//
//        $conf->image= $originalName . '.' . $extension;

        $conf->save();

        $conf = Config::where('name', 'upload')->first();
        $conf->config = $request->upload;
        return $conf->save() ? $this->response_api(true, 'تمت عمليه التعديل بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }


}
