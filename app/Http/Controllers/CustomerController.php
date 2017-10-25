<?php

namespace App\Http\Controllers;

use App\Futsal;
use App\Field;
use App\Employee;
use App\Category;
use App\Schedule;
use App\Transaction;
use Illuminate\Http\Request;
use Auth;
use Session;
use Alert;
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

    public function error()
    {
        return view('customer.error');
    }
    public function profile()
    {   
        if((Auth::user()->privilege_id) == 1){
            $staffs = Employee::all()->where('futsal_id',Auth::user()->futsal_id)
            ->where('privilege_id','2');
            return view('customer.customerProfile', compact('staffs'));
        }elseif((Auth::user()->privilege_id) == 2){
            return view('customer.customerProfile');
        }
    }

    public function profileUpdate(Request $request, $id){
        
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $avatar = $request->file('avatar');
        $fileName = $employee->username.'.'.$avatar->extension();
        $request->avatar->move(public_path('/images/customer_user'), $fileName);
        $employee->picture = $fileName;
        $employee->save();
        // Session::flash('success', 'Profile Berhasil di Update');
        return redirect()->back()->with('success','Selamat Profile Sudah Berhaisl di Perbaharui!'); 
    }

    public function show(Futsal $futsal)
    {
        return view('includes.header', compact($futsal));
    }
    public function index(Request $request){
        $date=$request->date;
        if (is_null($date)||empty($date)) {
            $date=date("Y-m-d");
        }
        $day= date_format(date_create($date),'N');
        
        // $transaksi = Transaction::all();

        $field= Field::with(['schedule'=>function($query) use($day){
            $query->where('day_id',$day);
        },
        'schedule.transaction'=>function($query) use($date){
            $query->select('transactions.*')
            ->where('played_at',$date)
            ->where('status','!=','cancel');
        }
        ])->where('futsal_id',Auth::user()->futsal_id)->get();
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
