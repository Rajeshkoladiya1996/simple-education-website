<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Question;
use App\Models\DeleteCourse;
use Auth;


class DashboardController extends Controller
{
    public function index(){
    
        if(!Auth::user()->hasRole('user')){
        $que = Question::with('course','user')->get();
        $course = Course::with('user')->where('status','1')->where('user_id',Auth::user()->id)->get();
        return view('Admin.dashboard',compact('course','que'));
       }else{
        Auth::logout();
        return redirect('/login');
       }
    }

    public function studentdash(){
        $que = Question::with('course','user')->where('user_id',Auth::user()->id)->get();
        $data = Course::with('user')->where('status','1')->get();
        $course=[];
        foreach($data as $val){
            $check = DeleteCourse::where('course_id',$val->id)->where('user_id',Auth::user()->id)->first();
            if(empty($check)){
                $course[] = $val;
            }
        }
        return view('Student.dashboard',compact('course','que'));
    }
}
