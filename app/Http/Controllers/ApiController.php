<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Field;
use App\Customer;
use App\User;
use App\Mahasiswa;
use App\Schedule;
use App\Transaction;
use Auth;
class ApiController extends Controller{

    public function __construct(){
        $this->middleware('auth:api')->except('register','login');
        date_default_timezone_set('Asia/Singapore');
    }

    public function index(){
        $customer= Customer::with('field')->get();
        return response()->json($customer);
    }

    public function field($customer){
        $field= Field::where('customer_id',$customer)->get();
        return response()->json($field);
    }

    public function insert(Request $request){
        $data= $request->all();

        $nama=$data['nama'];
        $alamat=$data['alamat'];
        $telepon=$data['telepon'];

        $mahasiswa= new Mahasiswa;
        $mahasiswa->nama=$nama;
        $mahasiswa->alamat=$alamat;
        $mahasiswa->telepon=$telepon;
        $mahasiswa->save();

        return response()->json([
            'success' => 'Data Berhasil Diinput'
        ]);
    }

    public function viewSchedule($field_id,$date){
        $day= date_format(date_create($date),'N');
        $schedule=Schedule::with(['transaction'=>function($query) use($date){
            $query->where('played_at','=',$date)->where('status','!=','cancel');;
        }])->where([['field_id',$field_id],['day_id',$day]])->get();
        return response()->json($schedule);
    }

    public function booking(Request $request){
        $data = $request->all();
        $transaction= new Transaction;
        $transaction->user_id=$data['user_id'];
        $transaction->schedule_id=$data['schedule_id'];
        $transaction->played_at=$data['played_at'];
        $transaction->status='pending';
        $transaction->save();
        return response()->json([
            'success' => 'Data Berhasil Diinput'
        ]);
    }

    public function login(Request $request){
        $data=$request->all();
        $user= Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]);

        if ($user) {
            return response()->json([
                'success' => true,
                'user_id' => Auth::user()->id,
                'api_token' => Auth::user()->api_token,
            ]);
        }
        return response()->json([
            'success' => false
        ]);
    }

    public function register(Request $request){
        $data=$request->all();
        $user = new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->phone=$data['phone'];
        $user->password=Hash::make($data['password']);
        $user->api_token=str_random(60);
        $user->save();

        Auth::guard()->login($user);

        return response()->json([
            'success' => true,
            'user_id' => Auth::user()->id,
            'api_token' => Auth::user()->api_token,
        ]);

    }

    public function user(Request $request){
        $user= User::where('api_token','=',$request->api_token)->first();
        return response()->json($user);
    }

    public function progressTransaction(Request $request){
        $dateNow=date("Y-m-d");
        $user= User::where('api_token','=',$request->api_token)->first();
        $transaction=Transaction::join('schedules','transactions.schedule_id','=','schedules.id')
        ->join('fields','fields.id','=','schedules.field_id')
        ->join('customers','customers.id','=','fields.customer_id')
        ->select('transactions.id','transactions.user_id','transactions.status','transactions.played_at','transactions.schedule_id','schedules.field_id','schedules.day_id','schedules.pelajar','schedules.umum','schedules.start_at','fields.customer_id','fields.name AS field_name','customers.name AS customer_name')
        ->where([['user_id',$user->id],['played_at','>=',$dateNow],['status','!=','cancel']])
        ->getQuery()
        ->get();
        return response()->json($transaction);
    }

    public function historyTransaction(Request $request){
        $dateNow=date("Y-m-d");
        $user= User::where('api_token','=',$request->api_token)->first();
        $user_id=$user->id;

        $transaction=Transaction::join('schedules','transactions.schedule_id','=','schedules.id')
        ->join('fields','fields.id','=','schedules.field_id')
        ->join('customers','customers.id','=','fields.customer_id')
        ->select('transactions.id','transactions.user_id','transactions.status','transactions.played_at','transactions.schedule_id','schedules.field_id','schedules.day_id','schedules.pelajar','schedules.umum','schedules.start_at','fields.customer_id','fields.name AS field_name','customers.name AS customer_name')
        ->where([['user_id',$user->id],['played_at','<',$dateNow]])
        ->orWhere(function($query) use($user_id){
            $query  ->where('user_id',$user_id)
                    ->where('status','=','cancel');
        })
        ->orderBy('played_at','DESC')
        ->getQuery()
        ->get();
        return response()->json($transaction);
    }

    public function logout(){
        $user= User::where('api_token','=',$request->api_token)->first();
        $user_id=$user->id;        
    }

    public function editUser(Request $request){
        $api_token=$request->api_token;
        $data=$request->except('api_token');
        User::where('api_token',$api_token)
        ->update($data);
    }

    public function cancelingBook(Request $request){
        $id=$request->id;
        Transaction::where('id',$id)
        ->update(['status'=>'cancel']);
    }
}
