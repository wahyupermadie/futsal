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

    public function index()
    {
        $month = date('m');
        $report = DB::table('transactions')
        ->join('schedules', 'transactions.schedule_id', '=', 'schedules.id')
        ->join('fields', 'schedules.field_id', '=', 'fields.id')
        ->join('customers','fields.customer_id','=','customers.id')
        ->select(DB::raw('date(played_at) as tanggal'), DB::raw('sum(price) as total_income') )
        ->whereMonth('transactions.played_at',$month)
        ->where('fields.customer_id',Auth::user()->id)
        ->groupBy(DB::raw('date(played_at)'))
        ->get();

        // $report = Transaction::with('customer.field.shedule')->where('played_at',$month)->get();
        // return $report;
        return view('customer.reportDashboard',['report' => $report]);
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
    public function show($id)
    {
        //
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
