<?php
function front_url($route)
{
    return url('front/' . $route);
}

function get_current_locale()
{
    return \Illuminate\Support\Facades\App::getLocale();
}


function is_auth()
{
    return (isset(auth()->user()->id)) ? true : false;
}

function get_fac_data()
{
    return \App\Faculty::where('active',1)->get();
}
function get_fac_data_user()
{
    return \App\Faculty::where('id',Auth::user()->faculty_id)->get();
}

function get_classes_data()
{
    return \App\Classes::all();
}

function get_department_data()
{
    return \App\Department::all();
}

function get_material_data()
{
    return \App\Material::all();
}

function get_semester_data()
{
    return \App\Semester::all();
}

function get_year_data()
{
    return \App\Year::all();
}

function ajax_render_view($view, $data)
{
    try {
        return view($view, $data)->render();
    } catch (\Throwable $e) {
    }
    return [''];
}

function get_constant_value($key)
{
    $constant = new \App\Setting();
    return $constant->valueOf($key);
}

function panel_url($route)
{
    return url('panel/' . $route);
}

function image_url($img, $size = '')
{
    return (!empty($size)) ? url('image/' . $size . '/' . $img) : url('image/' . $img);
}


function file_url($file)
{
    return url('file/' . $file);
}

function get_date_from_timestamp($timestamp)
{
    return format_timestamp_date($timestamp, 'Y-m-d');
}

function get_time_from_timestamp($timestamp)
{
    return format_timestamp_date($timestamp, 'H:i');
}

function format_timestamp_date($timestamp, $format)
{
    return (isset($timestamp) && isset($format)) ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestamp)->format($format) : '';
}

function format_12_to_24($input)
{
    return date("H:i", strtotime($input));
}

function format_24_to_12($input)
{
    return date("g:i a", strtotime($input));
}


function get_most_teacher_request()
{
    $teachers = new \App\User();
    return $teachers->active()->teachers()->orderBy('rating', 'DESC')->take(8)->get();
}

function get_all_teachers()
{
    $teachers = new \App\User();
    return $teachers->active()->teachers()->orderBy('rating', 'DESC')->get();
}





function no_data()
{
    return 'لا يوجد بيانات';
}



function get_unread_notifications_count()
{
    return (isset(auth()->user()->unreadNotifications) && auth()->user()->unreadNotifications->count() > 0) ? auth()->user()->unreadNotifications->count() : 0;
}


function admin_url($uri)
{
    return url('admin/' . $uri);
}

function units_url($uri)
{
    return url('units/' . $uri);
}

function is_menu_element_active($uri)
{
    if (preg_match($uri, url()->current())) {
        return 'current dropdown';
    }
    return '';
}

function diff_for_humans($timestamp)
{
    \Carbon\Carbon::setLocale(get_current_locale());
    return (is_string($timestamp)) ? \Carbon\Carbon::createFromTimestampUTC(strtotime($timestamp))->diffForHumans() : $timestamp->diffForHumans();
}

function is_nav_active($array)
{
    foreach ($array as $item) {
        if (strpos(url()->current(), $item) !== false) {
            return 'display: block';
        }
    }
    return '';

}

function is_active($uri)
{
    if (admin_url($uri) == url()->current()) {
        return 'active';
    }
    return '';
}


function is_element_active($uri, $uri2 = null)
{
    return (isset($uri2)) ? ((preg_match($uri, url()->current()) || (preg_match($uri2, url()->current())) ? 'active menu-open' : '')) : ((preg_match($uri, url()->current())) ? 'active nav-active' : '');
}

function is_parent_active($uri)
{
    return (preg_match('/' . $uri . '/i', url()->current())) ? 'active' : '';
}

function get_unread_message_count()
{
    $messages = new \App\VisitorMessage();
    return $messages->unReadMessages()->count();
}

function is_menu_active($uri)
{
    if (preg_match($uri, url()->current())) {
        return 'active';
    }
    return '';
}

function get_locale_changer_URL($locale)
{
    $uri = request()->segments();
    $uri[0] = $locale;
    return url(implode($uri, '/'));
}

function get_text_locale($obj, $text)
{
    if (isset($obj)) {
        $val = (get_current_locale() =='ar') ? $text : $text ;
        return $obj->$val;
    }
    return no_data();
}


function is_selected($var1, $var2)
{
    return ($var1 == $var2) ? 'selected' : '';
}

function get_visitor_data()
{
    $items = new \App\VisitorMessage;
    return $items->getArrayCount();
}



function get_teachers_data()
{
    $items = \App\User::where('type', '2');
    $all = $items;
    $day = $items;
    $month = $items;
    $array['all'] = $all->count();
    $array['day'] = $day->whereRaw('Date(created_at) = CURDATE()')->get()->count();
    $array['month'] = $month->where(\Illuminate\Support\Facades\DB::raw('MONTH(created_at)'), '=', date('n'))->get()->count();
    return $array;
}

function get_students_data()
{
    $items = \App\User::where('type', '1');
    $all = $items;
    $day = $items;
    $month = $items;
    $array['all'] = $all->count();
    $array['day'] = $day->whereRaw('Date(created_at) = CURDATE()')->get()->count();
    $array['month'] = $month->where(\Illuminate\Support\Facades\DB::raw('MONTH(created_at)'), '=', date('n'))->get()->count();
    return $array;
}

if(!function_exists('getFullNamearray')){
    function getFullNamearray(...$id)
    {
        $lang = app()->getLocale();
        if ($lang == 'ar') {
            return \App\Faculty::whereId($id[0])->first()->name_ar . '/' . \App\Classes::whereId($id[1])->first()->name_ar . '/' . \App\Material::whereId($id[2])->first()->name_ar . '/' . \App\Semester::whereId($id[3])->first()->name_ar . '/' . \App\Year::whereId($id[4])->first()->name;
        }else{
            return \App\Faculty::whereId($id[0])->first()->name_en . '/' . \App\Classes::whereId($id[1])->first()->name_en . '/' . \App\Material::whereId($id[2])->first()->name_en . '/' . \App\Semester::whereId($id[3])->first()->name_en . '/' . \App\Year::whereId($id[4])->first()->name;

        }
    }
}

if(!function_exists('getFullexamNamearray')) {
    function getFullexamNamearray(...$id)
    {
        $lang=app()->getLocale();
        if($lang=='ar'){
            return \App\Department::whereId($id[0])->first()->name_ar . '-' . \App\Year::whereId($id[1])->first()->name . '-' . \App\Material::whereId($id[2])->first()->name_ar;

        }else{
            return \App\Department::whereId($id[0])->first()->name_en . '-' . \App\Year::whereId($id[1])->first()->name . '-' . \App\Material::whereId($id[2])->first()->name_en;

        }

    }

    if (!function_exists('getFullresentNamearray')) {
        function getFullresentNamearray(...$id)
        {
            $lang=app()->getLocale();
            if($lang=='ar'){
                return \App\Faculty::whereId($id[0])->first()->name_ar . '-' . \App\Department::whereId($id[1])->first()->name . '-' . \App\Classes::whereId($id[2])->first()->name_ar . '-' . \App\Material::whereId($id[3])->first()->name_ar;

            }
            return \App\Faculty::whereId($id[0])->first()->name_en . '-' . \App\Department::whereId($id[1])->first()->name . '-' . \App\Classes::whereId($id[2])->first()->name_en . '-' . \App\Material::whereId($id[3])->first()->name_en;
        }
    }
}






