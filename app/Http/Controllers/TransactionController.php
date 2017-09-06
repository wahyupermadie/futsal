<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\Schedule;
use App\Offline;

class TransactionController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth:customer');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request){
        $played_at=$request->played_at;
        $schedule_id=$request->schedule_id;
        return view('customer.transactionNew')
        ->with('played_at',$played_at)
        ->with('schedule_id',$schedule_id);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->schedule_id=$request->schedule_id;
        $transaction->status="accepted";
        $transaction->played_at=$request->played_at;
        $transaction->save();

        $Offline= new Offline;
        $Offline->name=$request->name;
        $Offline->phone=$request->phone;
        $Offline->transaction_id=$transaction->id;
        $Offline->save();
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
    public function edit($id){
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $transaksi = Transaction::find($id);
        $transaksi->status = "accepted";
        $transaksi->save();
    }


    public function viewPending($id_transaksi)
    {

        $transaction= Transaction::find($id_transaksi);
        $user = User::where('id',$transaction->user_id)->first();
        return view('customer.schedulePending')
        ->with(['user'=>$user,'transaksi'=>$id_transaksi]);
    }

    public function viewSuccess($id_transaksi)
    {
        $transaction= Transaction::find($id_transaksi);
        if (is_null($transaction->user_id)) {
            $user= Offline::where('transaction_id',$id_transaksi)->first();
            return view('customer.scheduleOffline')->with(['user'=>$user,'transaksi'=>$id_transaksi]);
        }else{
            $user = User::where('id',$transaction->user_id)->first();
            return view('customer.scheduleSuccess')
            ->with(['user'=>$user,'transaksi'=>$id_transaksi]);
        }
    }

    public function viewUser($id_transaksi)
    {
        $transaction= Transaction::find($id_transaksi);
        if (is_null($transaction->user_id)) {
            $user= Offline::where('transaction_id',$id_transaksi)->first();
            return view('customer.userOffline')->with(['user'=>$user,'transaksi'=>$id_transaksi]);
        }else{
            $user = User::where('id',$transaction->user_id)->first();
            return view('customer.userOnline')
            ->with(['user'=>$user,'transaksi'=>$id_transaksi]);
        }
    }

    public function updateType(Request $request, $id_transaksi, $type) //update type transactions
    {
        $transaksi = Transaction::find($id_transaksi);
        $schedule = Schedule::find($transaksi->schedule_id);
        if($type == 'pelajar'){
            $type_name = 1;
            $transaksi->type_id = $type_name;
            $transaksi->status='success';
            $transaksi->price=$schedule->pelajar;
            $transaksi->save();
        }elseif($type == 'umum'){
            $type_name = 2;
            $transaksi->type_id = $type_name;
            $transaksi->status='success';
            $transaksi->price=$schedule->umum;
            $transaksi->save();
        }else{
            return view('customer.transaksiDashboard');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Transaction::find($id)->delete();
    }
}
