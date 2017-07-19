<?php

namespace App\Http\Controllers;

use App\Field;
use App\Category;
use Illuminate\Http\Request;
use Validator;
use Session;
class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth:customer');
    } 

    public function viewDashboard()
    {
        $jenisLapangan  = Category::with('field')->get();
        $lapangan = Field::with('category')->get();
        return view('customer.fieldDashboard',['jenisLapangan'=>$jenisLapangan,'lapangan'=>$lapangan]);
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
        $validator = Validator::make($request->all(),
            [
                'name' => ['required', 'min:4'],
                'category_id' => ['required'],
                'picture' => ['required|image|mimes:jpeg,png,jpg']
            ]
        );

        $gambar = $request->file('picture');
        $namaFile = time().'.'.$gambar->extension();
        $request->picture->move(public_path('/images'), $namaFile);
        $lapangan = new Field($request->all());
        $lapangan -> picture = $namaFile;
        $lapangan -> customer_id = '1';
        $lapangan->save();
        return redirect('/dashboardAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin_model  $admin_model
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin_model  $admin_model
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $field = Field::with('category')->where('id',$id)->first();
        return view('customer.fieldEdit')->with(['field'=>$field,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin_model  $admin_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $field = Field::find($id);
        $field->name = $request->name;
        $field->category_id = $request->category_id;
        $picture = $request->file('picture');
        $fileName = time().'.'.$picture->extension();
        $request->picture->move(public_path('/images'), $fileName);
        $field->picture = $fileName;
        $field->customer_id = '1';
        $field->save();
        return redirect('/dashboardAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin_model  $admin_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin_model $admin_model)
    {
        //
    }
}