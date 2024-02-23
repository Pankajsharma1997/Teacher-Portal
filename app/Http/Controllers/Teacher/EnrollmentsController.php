<?php

namespace App\Http\Controllers\Teacher;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
Use App\Models\Courses;
Use App\Models\User;

use Session;



class EnrollmentsController extends Controller
{
    public function index()
    {
         $userId = session('loginid');


         
        $enrollmentlist = DB::table('courses')
            ->leftJoin('enrollments', 'courses.id', '=', 'enrollments.course_id')
            ->where('courses.teacher_id','=', $userId)
            ->get();
        
       // $allenroll = Enrollment::all(); 
       // $courseid = $allenroll->course_id;
       // dd($courseid);
       // die();

     
      return view('Teacher.enrollment',['enrollmentlist'=>$enrollmentlist]);
     
        }






}
