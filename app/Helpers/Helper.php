<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Helper{
    public static function IDGenerator($model, $prefix){
        $preff = $prefix;
		$value = '';
		$row = $model::orderBy('id','DESC')->get()->count();
		$nomor = sprintf("%03s", $row) + 1;
		$value = $preff.$nomor;
		return $value;
    }
}
