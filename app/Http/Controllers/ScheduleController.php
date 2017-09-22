<?php

namespace App\Http\Controllers;

use App\Field;
use App\Category;
use App\schedule;
use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;

class ScheduleController extends Controller
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
        // $kategori = Category::all();
        $field = Field::with('category')->where('futsal_id',Auth::user()->futsal_id)->get();
        return view('customer.scheduleDashboard',['field' => $field]);
    }

    public function viewScheduleByDay($field_id,$day){
        if ($day=='senin') {
            $day_id=1;
        }else if ($day=='selasa') {
            $day_id=2;
        }else if ($day=='rabu') {
            $day_id=3;
        }else if ($day=='kamis') {
            $day_id=4;
        }else if ($day=='jumat') {
            $day_id=5;
        }else if ($day=='sabtu') {
            $day_id=6;
        }else if ($day=='minggu') {
            $day_id=7;
        }else {
            return redirect("/schedule/".$field_id."/senin");
        }

        $schedules = Schedule::where([['field_id',$field_id],['day_id',$day_id]])->get();
        return  view('customer.viewSchedule')
                ->with('schedules',$schedules)
                ->with('day',$day)
                ->with('field_id',$field_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($field_id,$day)
    {
        return  view('customer.formSchedule')
                ->with('day',$day)
                ->with('field_id',$field_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($field_id,$day, Request $request)
    {
        if ($day=='senin') {
            $day_id=1;
        }else if ($day=='selasa') {
            $day_id=2;
        }else if ($day=='rabu') {
            $day_id=3;
        }else if ($day=='kamis') {
            $day_id=4;
        }else if ($day=='jumat') {
            $day_id=5;
        }else if ($day=='sabtu') {
            $day_id=6;
        }else if ($day=='minggu') {
            $day_id=7;
        }else {
            return redirect("/jadwal/".$field_id."/senin/create");
        }

        $start=$request->start;
        $finish=$request->finish;
        $pelajar=$request->pelajar;
        $umum=$request->umum;
        
        
        foreach ($start as $key => $value) {
            for ($i=$value; $i<$finish[$key] ; $i++) { 
                $finish_at=$i+1;
                $schedule=new schedule;
                $schedule->field_id=$field_id;
                $schedule->day_id=$day_id;
                $schedule->start_at=$i.":00";
                $schedule->finish_at=$finish_at.":00";
                $schedule->pelajar=$pelajar[$key];
                $schedule->umum=$umum[$key];
                $schedule->save();
            }
        }


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

    public function copy(Request $request,$field_id,$day){
        if ($day=='senin') {
            $day_id=1;
        }else if ($day=='selasa') {
            $day_id=2;
        }else if ($day=='rabu') {
            $day_id=3;
        }else if ($day=='kamis') {
            $day_id=4;
        }else if ($day=='jumat') {
            $day_id=5;
        }else if ($day=='sabtu') {
            $day_id=6;
        }else if ($day=='minggu') {
            $day_id=7;
        }else {
            return redirect("/jadwal/".$field_id."/senin/create");
        }
        $from=$request->from;
        $scheduleFrom = Schedule::where([['field_id',$field_id],['day_id',$from]])->get();

        foreach ($scheduleFrom as $key => $value) {
            $schedule = new Schedule;
            $schedule->field_id=$field_id;
            $schedule->day_id=$day_id;
            $schedule->start_at=$value->start_at;
            $schedule->finish_at=$value->finish_at;
            $schedule->pelajar=$value->pelajar;
            $schedule->umum=$value->umum;
            $schedule->save();
        }

        // return $scheduleFrom;
    }
}
