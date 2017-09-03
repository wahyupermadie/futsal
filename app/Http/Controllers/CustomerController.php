<?php

namespace App\Http\Controllers;

use App\Field;
use App\Category;
use App\Schedule;
use App\Transaction;
use Illuminate\Http\Request;
use Auth;
class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
        date_default_timezone_set('Asia/Singapore');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $date=$request->date;
        if (is_null($date)||empty($date)) {
            $date=date("Y-m-d");
        }
        $day= date_format(date_create($date),'N');
        
        $transaksi = Transaction::all();

        $field= Field::with(['schedule'=>function($query) use($day){
            $query->where('day_id',$day);
        },
        'schedule.transaction'=>function($query) use($date){
            $query->select('transactions.*','users.name')
            ->join('users','users.id','=','transactions.user_id')
            ->where('played_at',$date);
        }
        ])->where('customer_id',Auth::user()->id)->get();
        return view('customer.index')
        ->with(['field'=>$field,'date'=>$date]);
    }

    public function showSchedule(Request $request){
        $date=$request->date;
        $day= date_format(date_create($date),'N');
        
        $transaksi = Transaction::all();
        // return $transaksi;
        $field= Field::with(['schedule'=>function($query) use($day){
            $query->where('day_id',$day);
        },
        'schedule.transaction'=>function($query) use($date){
            $query->select('transactions.*','users.name')
            ->join('users','users.id','=','transactions.user_id')
            ->where('played_at',$date);
        }
        ])->where('customer_id',Auth::user()->id)->get();
        return view('customer.index')
        ->with(['field'=>$field]);   
    }
    
}
