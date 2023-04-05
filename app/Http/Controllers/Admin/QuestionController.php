<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Question;
use Auth;

class QuestionController extends Controller
{
    public function myquestion(){
        $course = Course::with('user')->where('status','1')->get();
        $que = Question::with('course','user')->where('user_id',Auth::user()->id)->get();
        return view('Student.myquestions',compact('course','que')); 
    }

    public function addquestion(Request $request){
        $course_admin = Course::where('id',$request->courseId)->first();
        $data['course_id']=$request->courseId;
        $data['course_admin']=$course_admin->user_id;
        $data['user_id']=Auth::user()->id;
        $data['question']=$request->que_desc;
        $data['status']='1';
        $course = Question::create($data);
        return 1;
    }

    public function questionlist(){
        $que = Question::with('course','user')->where('user_id',Auth::user()->id)->get();
        return view('Student.questionslist',compact('que'));
    }
}
