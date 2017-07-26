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
    }

    public function index(){
    	$customer= Customer::all();
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
            $query->where('played_at','=',$date);
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
}
