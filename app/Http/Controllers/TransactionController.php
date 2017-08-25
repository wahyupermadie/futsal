<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;

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
    public function index()
    {
        return view('customer.transaksiDashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewPending($id, $id_transaksi)
    {

        $user = User::with(['transaction'=>function($query) use($id,$id_transaksi){
                $query->where(['user_id'=>$id,'id'=>$id_transaksi]);
        }])->first();
        return view('customer.schedulePending')
        ->with(['user'=>$user,'transaksi'=>$id_transaksi]);
    }

    public function viewSuccess($id, $id_transaksi)
    {
        $user = User::with(['transaction'=>function($query) use($id,$id_transaksi){
            $query->where(['user_id'=>$id,'id'=>$id_transaksi]);
        }])->first();
        return view('customer.scheduleSuccess')
        ->with(['user'=>$user,'transaksi'=>$id_transaksi]);   
    }
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
        $transaksi = Transaction::find($id);
        $transaksi->status = "Success";
        $transaksi->save();
    }

    public function updateType(Request $request, $id_transaksi, $type) //update type transactions
    {
        $transaksi = Transaction::find($id_transaksi);
        if($type == 'pelajar'){
            $type_name = 1;
            $transaksi->type_id = $type_name;
            $transaksi->save();
        }elseif($type == 'umum'){
            $type_name = 2;
            $transaksi->type_id = $type_name;
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
    public function destroy($id)
    {
        $data = Transaction::find($id)->delete();
    }
}
