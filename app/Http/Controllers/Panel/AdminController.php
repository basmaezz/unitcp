<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;

class AdminController extends Controller
{

    public function index()
    {
        return view('panel.admins.all');
    }


    public function get_user_data_table(user $items)
    {
        $items = $items ->orderBy('created_at', 'DESC')->get();
        return DataTables::of($items)->addColumn('status', function ($item) {
            return ($item->active ==1 ) ? 'active' : 'inactive';
        })->addColumn('action', function ($value) {
            return '   <button class="show-modal btn btn-success" data-id="'.$value->id.'" data-name="'.$value->name.'" 
            data-email="'.$value->email.'"><span class="glyphicon glyphicon-eye-open"></span> Show</button>
                    <button class="edit-modal btn btn-info " data-id="'.$value->id.'" data-name="'.$value->name.'" 
            data-email="'.$value->email.'" id=""><span class="glyphicon glyphicon-edit"></span> Edit</button>
                <button class="delete-modal btn btn-danger" data-id="'.$value->id.'" data-name="'.$value->name.'" 
            data-email="'.$value->email.'"><span class="glyphicon glyphicon-trash"></span> Delete</button>';
        })->rawColumns(['name', 'status', 'action'])->make(true);
    }


}
