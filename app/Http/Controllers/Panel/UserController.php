<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUser;
use App\User;
use App\Faculty;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public  function index(){

        return view('panel.users.all');

    }

    public  function studentindex(){

        return view('panel.students.all');

    }
    public function create()
    {
        return view('panel.users.create');
    }
    public function createstudent()
    {
        return view('panel.students.create');
    }

    public function store(CreateUser $request)
    {

        $user= new User();
        $user->name=$request->name;
        $user->faculty_id=$request->faculty_id;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password = bcrypt($request->password);

        $imgprofile = $request->file('img');
        $img_size = $imgprofile->getClientSize();
        $extension = $imgprofile->getClientOriginalExtension();

        $originalName = str_replace('.' . $extension, '', $imgprofile->getClientOriginalName());
        $imgprofile->move(public_path('uploads/users/profiles/'),$originalName. '.'.$extension);

        $user->img= $originalName . '.' . $extension;
        $user->active=$request->active;
        if( $request->user==1){
            $user->permission = 1;

        }elseif($request->user==2){
            $user->permission = 2;

        }else{

            $user->permission = 3;
        }
//        $request->faculty_id ? $user->permission = 2 : $user->permission = 1;
        $user->save();
//        flash('Success')->success();
//        return view('panel.users.all')->with('success','Item created successfully!');
//        return redirect()->route('panel.users.all');
//        return (isset($user)) ? view('panel.users.all'););

//        return (isset($user)) ? redirect()->route('panel.users.all') : $this->response_api(false, 'حدث خطأ غير متوقع');
        return (isset($user)) ? $this->response_api(true, 'تمت عمليه الاضافه بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');

//        return (isset($user) ? view('panel.users.all') : redirect()->route(get_current_locale() . '.panel.dashboard'));
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return (isset($data['user'])) ? view('panel.users.edit', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
    }


    public function update($id, CreateUser $request)
    {
        $user= new User();
        $user = User::updateOrCreate(['id' => $id]);
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password = bcrypt($request->password);
        $user->active=$request->active;



        if(!empty($request->repeat_pw)){
            $user->password = bcrypt($request->repeat_pw);
        }else{
            $user->password = bcrypt($request->password);
        }

        if(!empty($request->file('img')))
        {
            $imgprofile = $request->file('img');
            $img_size = $imgprofile->getClientSize();
            $extension = $imgprofile->getClientOriginalExtension();

            $originalName = str_replace('.' . $extension, '', $imgprofile->getClientOriginalName());
            $imgprofile->move(public_path('uploads/users/profiles/'),$originalName. '.'.$extension);

            $user->img= $originalName . '.' . $extension;

        }

//        $request->repeat_pw ?  $user->password=bcrypt($request->password)  : bcrypt($request->password);
        $request->faculty_id ? $user->permission = 2 : $user->permission = 1;
        $user->save();

        return (isset($user)) ? $this->response_api(true, 'تم التعديل بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }



    public function delete($id)
    {

        $item = user::find($id);
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'تمت عملية الحذف بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');
    }


    public function get_user_data_table(user $items)
    {
        $items= User::where('permission',1)
                    ->ORwhere('permission',2)
                    ->get();
        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;
            })->
//            addColumn('active', function ($item) {
////                return '<div class="row"> test</div>';
//
//                return ($item->active == 1) ? 'مفعل' : 'غير مفعل';//Done what it the problem?
//
//            })->
            editColumn('faculty_id', function ($item) {
                if(!empty($item->faculty))
                {
                    return ($item['faculty']->name_ar);
                } else {
                    return 'admin';
                }

            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);
            })->addColumn('action', function ($item) {

                if(Auth::user()->id == $item->id){
                    return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' .route('panel.users.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                         
                    </div>';

                }

              elseif ($item->active == 1) {
                    $statuss = '<a  style="margin-right: 10px;background-color: #FA2A00;color:white"  href="' . admin_url('user/status/' . $item->id) . '"   class="btn btn-sm btn-success ">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> نعطيل </a>';
                } else {
                    $statuss = '<a  style="margin-right: 10px;background-color: #5cbdc1;color:white"  href="' . admin_url('user/status/' . $item->id) . '"   class="btn btn-sm btn-success ">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> تفعيل </a>';
                }
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' .route('panel.users.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                       <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('user/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>
            
                       '.$statuss.'
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }


    public function get_student_data_table(user $items)
    {
        $items= User::where('permission',3)->get();


        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;
            })->
            editColumn('faculty_id', function ($item) {
                if(!empty($item->faculty))
                {
                    return ($item['faculty']->name_ar);
                }

            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);
            })->addColumn('action', function ($item) {
                if ($item->active == 1) {
                    $statuss = '<a  style="margin-right: 10px;background-color: #FA2A00;color:white"  href="' . admin_url('user/status/' . $item->id) . '"   class="btn btn-sm btn-success ">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> نعطيل </a>';
                } else {
                    $statuss = '<a  style="margin-right: 10px;background-color: #5cbdc1;color:white"  href="' . admin_url('user/status/' . $item->id) . '"   class="btn btn-sm btn-success ">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> تفعيل </a>';
                }
                return '<div class="row">
                      <a  title="Edit" style="margin-right: 10px"  href="' .route('panel.users.edit', ['id' => $item->id]) . '"  class="btn btn-sm btn-primary edit" > <i style="margin-left: 3px" class="fa fa-check-square-o"></i> تعديل</a>
                       <a  data-toggle="reject" title="Delete" style="margin-right: 10px;background-color: #FA2A00;color:white"  data-url="' . admin_url('user/delete/' . $item->id) . '"   class="btn btn-sm btn-danger delete">  <i style="margin-left:3px" class="fa  fa-trash-o"></i> حذف </a>

                       '.$statuss.'
                    </div>';
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }


    public function status($id)
    {
        if(is_numeric($id))
        {
            $user = User::find($id);
            if($user->active == 1)
            {
                $status = 'تم ايقاف الحساب';
                $user->active = 0;
            } else {
                $status = 'تم تفعيل الحساب';
                $user->active = 1;
            }
            $user->save();
            return redirect()->route('panel.users.all')->with('status', $status)->send();
        }
        return redirect()->route('panel.users.all')->with('status', 'Isn\'t numeric' )->send();
    }

    public function profile($id){
        $data['user'] = User::find($id);
        return (isset($data['user'])) ? view('panel.users.profile', $data) : redirect()->route(get_current_locale() . '.panel.dashboard');
    }

    public function editprof($id, CreateUser $request){
//        dd($request);

        $current_password = Auth::User()->password;
        if(Hash::check($request->password, $current_password)){
            $user= new User();
            $user = User::updateOrCreate(['id' => $id]);
            $user->name=$request->name;
            $user->username=$request->username;
            $user->email=$request->email;

            if(!empty($request->repeat_pw)){
                $user->password = bcrypt($request->repeat_pw);
            }else{
                $user->password = bcrypt($request->password);
            }

            if(!empty($request->file('img')))
            {
                $imgprofile = $request->file('img');
                $img_size = $imgprofile->getClientSize();
                $extension = $imgprofile->getClientOriginalExtension();

                $originalName = str_replace('.' . $extension, '', $imgprofile->getClientOriginalName());
                $imgprofile->move(public_path('uploads/users/profiles/'),$originalName. '.'.$extension);

                $user->img= $originalName . '.' . $extension;

            }
            $user->active='1';
//            $request->repeat_pw ?  $user->password=bcrypt($request->password)  : bcrypt($request->password);

            $user->save();

        }
//        return (isset($user)) ? $this->response_api(true, 'تم التعديل بنجاح') : $this->response_api(false, 'حدث خطأ غير متوقع');

    }

    public function online(){
        $users= User::where('online',1)->get();
        return view('panel.users.onlineusers',compact('users'));
    }



}
