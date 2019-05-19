<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Log;
use Yajra\DataTables\DataTables;
use App\User;

use App\traits\collections;

class LogController extends Controller
{

    public function index()
    {
        $logs= Log::paginate(15);
        return view ('panel.log', compact('logs'));
//        return view('panel.log');

    }

    public function get_log_data_table(log $items)
    {
        $logs= Log::get();
        dd($logs);

        try {
            return DataTables::of($items)->editColumn('id', function ($item) {
                return $item->id;

            })->editColumn('who', function ($item) {
                return ($item['who_users']->username);

            })->editColumn('created_at', function ($item) {
                return get_date_from_timestamp($item->created_at);
            })->rawColumns([ 'action'])->make(true);
        } catch (\Exception $e) {
            return $this->response_api(false, 'failed');
        }
    }





}
