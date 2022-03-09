<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('page.web.home.main');
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function dashboard(Request $request)
    {
        if(Auth::guard('web')->user()->register_code != null || Auth::guard('web')->user()->register_code != ''){
            if ($request->ajax()) {
                $tahun = $request->year;
                $bulan = $request->month;
                $date1 = date($request->year."-".Str::replace("0","",$request->month)."-d");
                $date2 = date("Y-m-d");
    
                $diff = abs(strtotime($date2) - strtotime($date1));
    
                $years = floor($diff/(365*60*60*24));
                $months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
                $total_month = number_format($months,0)+1;
                $arrc = array();
                $arrp = array();
                $arrv = array();
                $cpeserta = DB::select(DB::raw(" 
                    SELECT
                        DATE_FORMAT(cal.my_date, '%e %b %Y') as date_field,
                        SUM(case when t.st = 'n' AND t.role != '1' then 1 else 0 end) AS total
                    FROM
                        (
                        SELECT
                            s.start_date + INTERVAL ( days.d ) DAY AS my_date 
                        FROM
                            ( SELECT LAST_DAY( CURRENT_DATE ) + INTERVAL 1 DAY - INTERVAL $total_month MONTH AS start_date, LAST_DAY( CURRENT_DATE ) AS end_date ) AS s
                        LEFT JOIN days ON days.d <= DATEDIFF( s.end_date, s.start_date ) ) AS cal LEFT JOIN users AS t ON t.created_at >= cal.my_date 
                        AND t.created_at < cal.my_date + INTERVAL 1 DAY 
                    WHERE
                        MONTH ( my_date ) = '$request->month' AND YEAR(my_date) = '$request->year'
                    GROUP BY
                        date_field
                "));
                $peserta = DB::select(DB::raw(" 
                    SELECT
                        DATE_FORMAT(cal.my_date, '%e %b %Y') as date_field,
                        SUM(case when t.st = 'a' AND t.role != '1' then 1 else 0 end) AS total
                    FROM
                        (
                        SELECT
                            s.start_date + INTERVAL ( days.d ) DAY AS my_date 
                        FROM
                            ( SELECT LAST_DAY( CURRENT_DATE ) + INTERVAL 1 DAY - INTERVAL $total_month MONTH AS start_date, LAST_DAY( CURRENT_DATE ) AS end_date ) AS s
                        LEFT JOIN days ON days.d <= DATEDIFF( s.end_date, s.start_date ) ) AS cal LEFT JOIN users AS t ON t.created_at >= cal.my_date 
                        AND t.created_at < cal.my_date + INTERVAL 1 DAY 
                    WHERE
                        MONTH ( my_date ) = '$request->month' AND YEAR(my_date) = '$request->year'
                    GROUP BY
                        date_field
                "));
                $visitor = DB::select(DB::raw(" 
                    SELECT
                        DATE_FORMAT(cal.my_date, '%e %b %Y') as date_field,
                        COUNT( t.id ) AS total 
                    FROM
                        (
                        SELECT
                            s.start_date + INTERVAL ( days.d ) DAY AS my_date 
                        FROM
                            ( SELECT LAST_DAY( CURRENT_DATE ) + INTERVAL 1 DAY - INTERVAL $total_month MONTH AS start_date, LAST_DAY( CURRENT_DATE ) AS end_date ) AS s
                        LEFT JOIN days ON days.d <= DATEDIFF( s.end_date, s.start_date ) ) AS cal LEFT JOIN sessions AS t ON DATE_FORMAT(FROM_UNIXTIME(t.last_activity), '%Y-%m-%d') >= cal.my_date 
                        AND DATE_FORMAT(FROM_UNIXTIME(t.last_activity), '%Y-%m-%d') < cal.my_date + INTERVAL 1 DAY 
                    WHERE
                        MONTH ( my_date ) = '$request->month' AND YEAR(my_date) = '$request->year'
                    GROUP BY
                        date_field
                "));
                foreach($cpeserta as $item){
                    $temp=array(
                        "date_field"=>$item->date_field,
                        "total"=>$item->total
                    );
                    array_push($arrc,$temp);
                }
                foreach($peserta as $item){
                    $temp=array(
                        "date_field"=>$item->date_field,
                        "total"=>$item->total
                    );
                    array_push($arrp,$temp);
                }
                foreach($visitor as $item){
                    $temp=array(
                        "date_field"=>$item->date_field,
                        "total"=>$item->total
                    );
                    array_push($arrv,$temp);
                }
                $cpeserta = json_encode($arrc);
                $peserta = json_encode($arrp);
                $visitor = json_encode($arrv);
                return view('page.web.dashboard.list',compact('visitor','peserta','cpeserta','tahun','bulan'));
            }
            return view('page.web.dashboard.main');
        }else{
            return redirect()->route('web.profile.index');
        }
    }
}
