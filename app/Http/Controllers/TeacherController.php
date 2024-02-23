<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Courses;
use Session;
use Hash;

class TeacherController extends Controller
{
  public function course() {
    $userId = User::find(session('loginid'));
   
     return view('Teacher.course',compact('userId'));
   }

   public function storeCourse(Request $request)
   {
    $request->validate([
              'courseTitle'  => 'required',
              'courseDescription' => 'required',
              'duration'     => 'required',
              'chapters'     => 'required',
              'startdate'   => 'required',
              'prize'       => 'required',
              'authorDetails' => 'required',
              'image'  => 'required|image|mimes:jpeg,bmp,png,jpg',
              'teacher_id'=> 'required',
         ]);
    $course = new Courses();
    $course->title = $request->courseTitle;
    $course->description = $request->courseDescription;
    $course->duration = $request->duration;
    $course->chapters = $request->chapters;
    $course->start_date =  $request->startdate;
    $course->prize      = $request->prize;
    $course->course_author = $request->authorDetails;
    $course->teacher_id    = $request->teacher_id;
    //$course->image         = $request->file('image')->store('images');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/images/', $filename);
            $course->image = $filename;
        }
       
       $res = $course->save();
       // check the condition of saving the data in the database
                     if($res)
                           {
                             // if Course input is right then it store in the teacher table in the database 
                                 return redirect('courselist')->with('success','You have registered sucessfully course'); 
                               }
                      else
                            {   
                             return back()->with('fail','Something Wrong');
                            }

     
   }

   public function courselist()
      {
        $users = User::find(session('loginid'));
         $name = $users->name;
          $courses = User::join('courses','users.name','=','courses.course_author')
                 ->where('users.name', '=',$name)
                 ->get(['users.*','courses.*']);
                 
                 session(['courses' => $courses]);
        
         return view('Teacher.courselist',compact('courses'));

         }





     // Edit the course Details 
   
    public function editCourse($id){
      $course = Courses::find($id);
    return view('Teacher.editcourse',compact('course'));

    }
    
      // Update Course Details 
    
    public function updateCourse(Request $request, $id)
    {
        $course = Courses::find($id);
        $course->title         = $request->input('courseTitle');
        $course->description   = $request->input('courseDescription');
        $course->duration      = $request->input('duration');
        $course->chapters      = $request->input('chapters');
        $course->prize         = $request->input('prize');
        $course->course_author = $request->input('authorDetails');
        $course->save();
        

        return redirect('courselist')->with('status','Student Updated Successfully');
    }

    // Delete Course Details
    public function destroy($id)
    {
           Courses::find($id)->delete();
        
         
               // Redirect back or to another page
                   return redirect()->back();
                  }


   public function Coursedetail($id){
      $coursedetail = Courses:: find($id);
     



    return view('Teacher.coursedetail',compact('coursedetail'));
   }


}
 