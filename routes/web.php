<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Teacher\EnrollmentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
  // Route for the Home or landing Page 
     Route:: get('/',[HomeController::class,'index'])->name('home');



  // Route for the  Registeration page  
       Route::get('/register',[HomeController::class,'create'])->name('register');
       Route::post('/registration',[HomeController::class,'store'])->name('registration');

Route::middleware(['web', 'auth'])->group(function () {
     
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    

});






  // Route for the Login  page 
       Route::get('/login',[HomeController::class,'loginView'])->name('login');
      Route::post('/loginall',[HomeController::class,'login'])->name('loginall');


  Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

// Edit
 Route::get('/edit',[HomeController::class,'edit'])->name('teacher.edit');

// Update
  Route::put('/update', [HomeController::class, 'update'])->name('teacher.update');

// Delete 
 Route::delete('/delete', [HomeController::class, 'delete'])->name('teacher.delete');

// Profile 
  Route:: get('/profile',[HomeController::class,'profile'])->name('profile');

// send email
  Route::get('/sendmail',[HomeController::class,'sendmail'])->name('sendmail');

// store email 
    Route::post('/sendmail',[HomeController::class,'storemail'])->name('teacher.sendmail');

//maillist
    Route::get('/maillist/',[HomeController::class,'maillist'])->name('maillist');

// sentlist 
  Route::get('/sentlist',[HomeController::class,'sentlist'])->name('sentlist');






 Route::get('/listing',[TeacherController::class,'index'])->name('listing');


  // Delete the message 
 Route::delete('/delete-message/{id}', [HomeController::class,'deleteMessage'])->name('deleteMessage');

//show message 
 Route::get('/showMessage/{id}', [HomeController::class,'showMessage'])->name('showMessage');

 // send Reply 
 Route::get('/sendreply/{id}',[HomeController::class,'sendReply'])->name('sendreply');
Route::post('/sendreply/{id}',[HomeController::class,'storeReply'])->name('teacher.storereply');
// 
  // contact Us 
Route::post('/contactUs',[HomeController::class,'contactUs'])->name('contactUs');



   //Courses 
// Show Courses form
   Route::get('/course',[TeacherController::class,'course'])->name('course');
 // Save the Course form data 
   Route::post('/courses', [TeacherController::class, 'storeCourse'])->name('courses');
   // Course List 
   Route::get('/courselist',[TeacherController::class,'courselist'])->name('courselist');
   // Edit the Course details 
   Route::get('/editcourse/{id}',[TeacherController::class,'editCourse'])->name('courses.edit');
   //update 
Route::put('/updatecourse/{id}',[TeacherController::class,'updateCourse'])->name('courses.update');

Route::delete('/deleteCourse/{id}',[TeacherController::class,'destroy'])->name('deleteCourse');

Route::get('/coursedetail/{id}',[TeacherController::class,'Coursedetail'])->name('coursedetail');



// Enrollment 
// Show the Enrollment Form 
Route::get('/enroll/{id}',[EnrollmentController::class,'enroll'])->name('enroll');
Route::post('/enroll',[EnrollmentController::class,'store'])->name('enroll.store');


 // In Teacher Dashboard show the Enrolled students list 
 Route::get('/enrolllist',[EnrollmentsController::class,'index'])->name('enrolllist'); 






