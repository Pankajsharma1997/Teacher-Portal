<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
Use App\Models\Courses;
Use App\Models\User;


class EnrollmentController extends Controller
{




    public function enroll($id)
    {
        $course = Courses::find($id);
         return view('enrollment.enrollform',['course' => $course]);
    }





    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email'=> 'required',
         'password' => 'required|confirmed|min:4',
         'course_id' => 'required',
        ]);
        $enroll = new Enrollment();
          $enroll->name = $request->name;
          $enroll->email = $request->email;
          $enroll->password = bcrypt($request->password);
          // $enroll->password_confirmation = bcrypt($request->password);
          $enroll->course_id = $request->course_id;

           $res = $enroll->save();


           //check the condition of saving the data in the database 
           if($res)
             {
             // if email input is right then it store in the message table in the database 
               return back()->with('sucess','You sucessfully enroll in the Course');
              }
               

    }
}
