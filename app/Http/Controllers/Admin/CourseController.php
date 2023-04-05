<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Question;
use App\Models\Enroll;
use App\Models\DeleteCourse;
use Auth;
use App\Models\User;

class CourseController extends Controller
{

    public function addcourse(Request $request){

        $data['coursename'] = $request->coursename;
        $data['user_id'] = $request->tutorId;
        $data['coursecode'] =$request->corsecode;
        $data['description'] = $request->coursedesc;
        $data['status'] =1;
        $course = Course::create($data);
        return 1;

    }

    public function courselist(){
        $course = Course::where('status',1)->where('user_id',Auth::user()->id)->get();
        return view('admin.courselist',compact('course'));
    }

    public function deletecourse(Request $request){
        $course = Course::where('id',$request->id)->delete();
        return 1;
    }

    public function editcoursedata(Request $request){
        $course = Course::where('id',$request->id)->first();
        return $course;
    }

    public function updatecourse(Request $request){

        $data['coursename'] = $request->coursename;
        $data['user_id'] = $request->tutorId;
        $data['coursecode'] =$request->edit_corsecode;
        $data['description'] = $request->coursedesc;

        $course = Course::where('id',$request->courseId)->update($data);
        return 1;
    }

    public function replycourse(Request $request){
       $data['reply']=$request->replytext;
       $update = Question::where('id',$request->questionId)->update($data);
       return 1;
    }
  

    // student enroll course
    public function enrollcourse(Request $request){
       
       $check = Enroll::where('user_id',Auth::user()->id)->where('course_id',$request->id)->first();
       if(empty($check)){
            $data['user_id'] = Auth::user()->id;
            $data['course_id'] = $request->id;
            $data['status'] = 1;
            $course = Enroll::create($data);
            return 1;
       }else{
           return 0;
       }
      
    }

    public function mycourse(Request $request){
        $course = Course::where('status',1)->get();
        $enroll = Enroll::with('course')->where('status',1)->where('user_id',Auth::user()->id)->get();
        return view('Student.mycourse',compact('enroll','course'));

    }

    public function deleteenrolledcourse(Request $request){
        $enroll = Enroll::where('id',$request->id)->delete();
        return 1;
    }

    public function enrollcourselist(Request $request){
        $course = Course::where('status',1)->get();
        $enroll = Enroll::with('course')->where('status',1)->where('user_id',Auth::user()->id)->get();
        return view('Student.enrolledcourselist',compact('enroll','course'));
    }

    public function studentdeletecourse(Request $request){
         
         $data['course_id'] = $request->id;
         $data['user_id'] = Auth::user()->id;
         $data['status'] = "1";
         $course = DeleteCourse::create($data);
         return 1;
    }

    public function courselisting(Request $request){

        $data = Course::with('user')->where('status','1')->get();
        $course=[];
        foreach($data as $val){
            $check = DeleteCourse::where('course_id',$val->id)->where('user_id',Auth::user()->id)->first();
            if(empty($check)){
                $course[] = $val;
            }
        }

        return view('Student.courselist',compact('course'));
    }

    public function viewcourse(Request $request){
        $data = Course::where('id',$request->id)->first();
        $enrollcourse = Enroll::with('user')->where('course_id',$request->id)->get();
        $enroll=[];
        foreach ($enrollcourse as $val){
            $user = User::where('id',$val->user_id)->first();
            if($user){
                $enroll[] = $user;
            }

        }
        return view('Admin.viewcourse',compact('data','enroll'));
    }

    public function studentviewcourse(Request $request){
        if(Auth::user()->hasRole('user')){
        $data = Course::where('id',$request->id)->first();
        $enrollcourse = Enroll::with('user')->where('course_id',$request->id)->get();
        $enroll=[];
        foreach ($enrollcourse as $val){
            $user = User::where('id',$val->user_id)->first();
            if($user){
                $enroll[] = $user;
            }

        }
        return view('Student.viewcourse',compact('data','enroll'));
    }else{
        Auth::logout();
        return redirect('/login');
    }

    }
}
