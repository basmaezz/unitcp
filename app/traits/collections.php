<?php
namespace App\traits;

use App\Log;

trait collections {
    public static function log($who , $where, $what, $data, $status) {
        $log = new Log;
        $log->who = $who;
        $log->where = $where;
        $log->what = $what;
        $log->data = $data;
        $log->status = $status;
        $log->save();
    }
}