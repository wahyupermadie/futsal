<?php

namespace App\Http\Controllers;

use App\Field;
use App\Category;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisLapangan  = Category::with('field')->get();
        $lapangan = Field::with('category')->get();
        return view('customer.index',['jenisLapangan'=>$jenisLapangan,'lapangan'=>$lapangan]);
    }
    
}
