<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Question;
use App\Models\Notes;
use Auth;

class NotesController extends Controller
{
   public function index(Request $request){
     $notes = Notes::where('user_id',Auth::user()->id)->where('status','1')->get();
     return view('Student.notes',compact('notes'));
   }

   public function addnotes(Request $request){

     $data['notes_title'] = $request->notes_title;
     $data['notes'] = $request->notescontent;
     $data['user_id'] = Auth::user()->id;
     $data['status'] = 1;
     $add = Notes::create($data);
     return 1;

   }

   public function notelist(Request $request){
    $notes = Notes::where('user_id',Auth::user()->id)->where('status','1')->get();
    return view('Student.noteslist',compact('notes'));
   }

   public function deletenotes(Request $request){
    $notes = Notes::where('id',$request->id)->delete();
    return 1;
   }
}
