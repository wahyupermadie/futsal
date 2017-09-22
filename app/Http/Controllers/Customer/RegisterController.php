<?php

namespace App\Http\Controllers\Customer;

use App\Employee;
use App\Futsal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request; 
use App\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showRegistrationForm()
    {
        return view('customer.register');
    }

      //Handles registration request for custome
    public function register(Request $request)
    {
            $name = $request->full_name;
            $futsal_name = $request->futsal_name;
            $phone = $request->phone;
            $picture = $request->file('futsalpicture');
            $username = $request->username;
            $address = $request->address;
            $password = $request->password;
            $password2 = $request->confirmpassword;
            $gambar_futsal = $futsal_name.'.'.time().'.'.$picture->extension();
            // $gambar_identitas = $full_name.'.'.time().'.'.$identitypicture->extension();
            if(is_null(Employee::find($username))){
                if($password == $password2){
                        $futsal = Futsal::create([
                            'name' => $futsal_name,
                            'phone' => $phone,
                            'futsalpicture' => $gambar_futsal,
                            'address' => $address,
                        ]);
                        $id_futsal = Futsal::select('id')
                                     ->where('phone',$phone)
                                     ->where('name',$futsal_name)
                                     ->where('address',$address)
                                     ->first();
                        // return $id_futsal;
                        $employee = Employee::create([
                            'name' => $name,
                            'futsal_id' => $id_futsal->id,
                            'phone' => $phone,
                            'username' => $username,
                            'password' => bcrypt($password),
                        ]);
                        $request->futsalpicture->move(public_path('/images/customer_futsal'), $gambar_futsal);
                        $alert = array(
                            "message" => "Anda Berhasil Mendaftar",
                            "alert-type" => "info"
                        );
                    return redirect()->route('customer.registerForm')->with(['alert'=>$alert]);
                }else{
                    return "Password Tidak Sesuai";
                }
            }else{
                return "Sudah Anda Sudah Terdaftar";
            }

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => 'required|string|max:50',
            'futsal_name' => 'required|string|max:25',
            'phone' => 'required|integer|max:15',
            'futsalpciture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'identitypicture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|string|email|max:25|unique:customers',
            'address' => 'required|string|max:125',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return Customer::create([
            'full_name' => $data['full_name'],
            'futsal_name' => $data['futsal_name'],
            'phone' => $data['phone'],
            'futsalpciture' => $data['futsalpciture'],
            'identitypicture' => $data['identitypicture'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function guard()
    {
           return Auth::guard('customer');
    }
}
