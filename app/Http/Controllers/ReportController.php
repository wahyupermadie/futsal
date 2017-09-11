<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use App\Customer;
use App\Schedule;
use App\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use Auth;
use DB;
use Charts;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:customer');
    }

    public function chart()
    {
        $firstdate=date('l, d F Y');
        $seconddate=date('l, d F Y',strtotime($firstdate." + 2 days"));
        $month = date('m');
        $report = DB::table('transactions')
        ->join('schedules', 'transactions.schedule_id', '=', 'schedules.id')
        ->join('fields', 'schedules.field_id', '=', 'fields.id')
        ->join('customers','fields.customer_id','=','customers.id')
        ->select(DB::raw('date(played_at) as tanggal'), DB::raw('sum(price) as total_income') )
        ->whereBetween('transactions.played_at',[date("y-m-d",strtotime($firstdate)),date("y-m-d",strtotime($seconddate))])
        ->where('fields.customer_id',Auth::user()->id)
        ->groupBy(DB::raw('date(played_at)'))
        ->get();
        return (json_encode($report));
    }

    public function index()
    {

        $firstdate=date('l, d F Y');
        $seconddate=date('l, d F Y',strtotime($firstdate." + 2 days"));
        $month = date('m');
        $report = DB::table('transactions')
        ->join('schedules', 'transactions.schedule_id', '=', 'schedules.id')
        ->join('fields', 'schedules.field_id', '=', 'fields.id')
        ->join('customers','fields.customer_id','=','customers.id')
        ->select(DB::raw('date(played_at) as tanggal'), DB::raw('sum(price) as total_income') )
        ->whereBetween('transactions.played_at',[date("y-m-d",strtotime($firstdate)),date("y-m-d",strtotime($seconddate))])
        ->where('fields.customer_id',Auth::user()->id)
        ->groupBy(DB::raw('date(played_at)'))
        ->get();

        return view('customer.reportDashboard')
        ->with(['report' => $report,'firstdate' => $firstdate,'seconddate' => $seconddate,'chart' => $report])
        ->with(['chart'=> json_encode($report)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showReport(Request $request)
    {
        $firstdate=date("y-m-d",strtotime($request->firstDate));
        $seconddate=date("y-m-d",strtotime($request->secondDate));
        $report = DB::table('transactions')
        ->join('schedules', 'transactions.schedule_id', '=', 'schedules.id')
        ->join('fields', 'schedules.field_id', '=', 'fields.id')
        ->join('customers','fields.customer_id','=','customers.id')
        ->select(DB::raw('date(played_at) as tanggal'), DB::raw('sum(price) as total_income') )
        ->whereBetween('transactions.played_at',[$firstdate, $seconddate])
        ->where('fields.customer_id',Auth::user()->id)
        ->groupBy(DB::raw('date(played_at)'))
        ->get();

        return view('customer.reportDashboard')
        ->with(['report' => $report,'firstdate' => $request->firstDate,'seconddate' => $request->secondDate])
        ->with(['chart'=>json_encode($report)]);
    }
    public function showDetail($date)
    {   
        $day= date_format(date_create($date),'N'); 
        
        $detail= Field::with(['schedule'=>function($query) use($day){
            $query->where('day_id',$day);
        },
        'schedule.transaction'=>function($query) use($date){
            $query->select('transactions.*')
            ->where('played_at',$date)
            ->where('status','!=','Cancel');
        }
        ])->where('customer_id',Auth::user()->id)->get();
        // return $detail;
        return view('customer.reportDetail')
        ->with(['detail' => $detail]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
