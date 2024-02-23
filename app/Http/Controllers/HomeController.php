<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\message;
use App\Models\Courses;
use App\Models\Contact;

use Session;
use Hash;

use Illuminate\Http\Request;

class HomeController extends Controller
{
 
   // Function  Handle the index or Home page and return Landing Page   
            public function index()
                {
                 $teachers  =  User::all(); 
                 $courses  = Courses::all();

                return view ('home',compact('teachers','courses'));
                     }
  
    // Function for Handle   Register form         
            public function create()
                {
                  return view('register');// view a Register Page  
                     }


    // Function for Store the information in the database 
            public function store(Request $request)

                 {    
                     $request->validate([
                      'name'       => 'required',
                      'email'      => 'required',
                      'password'   => 'required',
                      'user_type'  => 'required|in:teacher,student',
                      'image'      => 'required',
                      'contact_number'=>'required|min:10|max:10',
                      'address'       => 'required',
                      'contact_number'=> 'required',
                       ]);

                      $user = new User();
                      $user->name =  $request->name;
                      $user->email     = $request->email;
                      $user->password  = Hash::make($request->password);
                      $user->user_type = $request->user_type;
              
    
                    $user->image = $request->file('image')->store('uploads', 'public');
                     
                      $user->contact_number = $request->contact_number;
                      $user->address   = $request->address;
        
                     // stroe the all information in a $res variable 
                      $res = $user->save();
         
                    // check the condition of saving the data in the database
                     if($res)
                           {
                             // if Teacher input is right then it store in the teacher table in the database 
                                 return back()->with('success','You have registered sucessfully'); 
                               }
                      else
                            {   
                             return back()->with('fail','Something Wrong');
                            }

                }
    // Function for  view the login page 
            public function loginView() 
              {
                return view('login');
              }
    // Function for Handle the login credentials 
             public function login(Request $request)
              {
                $request->validate([
                'email'    =>'required|email',
                'password' =>'required|min:3|max:10'
                 ]);
                $user = User::where('email','=',$request->email)->first();
        
              // login Teacher
                 if ($user && $user->user_type === 'teacher')
                  {
                    if (Hash::check($request->password, $user->password)) 
                     {
       
                    $teacherInfo = User::find($user->id, ['name', 'email', 'user_type','contact_number', 'address','experience','contact_email','skills','course_detail']);
             

             // Store the teacher information in the session
        
              $data          = $request->session()->put('loginid', $user->id);
              $name          = $request->session()->put('name', $teacherInfo->name);
              $email         = $request->session()->put('email', $teacherInfo->email);
              $user_type     = $request->session()->put('user_type', $teacherInfo->user_type);
              $address       = $request->session()->put('address', $teacherInfo->address);
              $contact       = $request->session()->put('contact_number', $teacherInfo->contact_number);
              $experience    = $request->session()->put('experience', $teacherInfo->experience);
              $contact_email = $request->session()->put('contact_email',$teacherInfo->contact_email);
              $skills        = $request->session()->put('skills',$teacherInfo->skills);
              $course_detail = $request->session()->put('course_detail',$teacherInfo->course_detail);

           
                   return view('Teacher.dashboard',compact('teacherInfo'));
                  } 

                  else {
                       return back()->with('fail', 'Password Not Match');
                          }
                  } 
                  else 
                       {
                      return back()->with('fail', 'This email is not valid');
                        }
              }

    // Function for Handle the edit details of the Teacher 
              public function edit() 
                { 
    
                        $teacherInfo = 
                            [
                              'name' => session('name'),
                              'email' => session('email'),
                               'user_type' => session('user_type'),
                              'contact_number' => session('contact_number'),
                              'address' => session('address'),
                              'experience'=> session('experience'),
                              'contact_email'=>session('contact_email'),
                              'skills'=>session('skills'),
                              'course_detail'=>session('course_detail')
                            ];

                        return view('Teacher.edit')->with('teacherInfo', $teacherInfo);
                }

   // Function for update the details of Teacher 
             public function update(Request $request)
                 {
                  // Validate the update request
                         $request->validate
                         ([
                             'name' => 'required|string|max:255',
                             'email'=> 'required|',
                         ]);


                 // Update the teacher information in the database
                     $teacherInfo = User::find(session('loginid'));

                     $teacherInfo->update
                         ([
                            'name' => $request->input('name'),
                            'email' => $request->input('email'),
                            'user_type' => $request->input('user_type'),
                            'skills'=>$request->input('skills'),
                            'experience'=>$request->input('experience'),
                            'course_detail'=>$request->input('course_detail'),
                            'contact_email'=>$request->input('contact_email'),
                            'contact_number'=> $request->input('contact_number'),
                            'address'=> $request->input('address'),
                         ]);
  
                     $teacherInfo->save();

                    // Update the session with the new information
                        session([
                      'name' => $request->input('name'),
                      'email'=> $request->input('email'),
                      'user_type' => $request->input('user_type'),
                      'skills'=>$request->input('skills'),
                      'contact_number'=> $request->input('contact_number'),
                      'address' => $request->input('address'),
                      'experience'=>$request->input('experience'),
                      'skills'=>$request->input('skills'),
                      'contact_email'=>$request->input('contact_email'),

                   // Update other session variables accordingly
                     ]);
                     return view('Teacher.profile',compact('teacherInfo'));
                  }


    //  Function for  view the dasdboard page 
                 public function dashboard()
                         {
                             $teacherInfo = User::find(session('loginid'));

                          return view('Teacher.dashboard',compact('teacherInfo'));
                         }

    // Function for handle  Delete
                 public function delete()
                           {
                    // find the teacher by Id
                        $teacher = User:: find(session('loginid'));

                    // delete the teacher from the database
                          $teacher->delete();


                   // Clear the session data
                    session()->forget(['loginid', 'name', 'email', 'user_type', 'contact_number', 'address']);

                   // Redirect to the login page with a success message
                      return redirect()->route('home')->with('success', 'Account deleted successfully');
 
                        }

            


    // sendmail
             public function sendmail()
               {
                  $user = User::find(session('loginid'));
               
                  return view('Teacher.sendmail' , ['user' => $user]);
        }

    // store email in table 
         public function storemail(Request $request)
             {
               $request->validate([
             'receiver_user_email' =>'required',
             'sender_user_email'   => 'required',
             'content'          => 'required',
              
           ]);

            // Fetch the Ids of the senders and receiver  from the user table on the basis of the email 
                $sender   = User::where('contact_email',$request->input('sender_user_email'))->first();
                $receiver = User::where('contact_email', $request->input('receiver_user_email'))->first();
            

            // Store the email in the messages table in the db 
                 // First way to store the data  
                 $message = new message([
                'sender_user_email'   =>$request->input('sender_user_email'),
                'receiver_user_email' =>$request->input('receiver_user_email'),
                'content' => $request->input('content'),
               'sender_user_id' => $sender->id,
                'sender_name' => $sender->name,
                'receiver_user_id' => $receiver->id,
                'receiver_name' => $receiver->name,

                 ]);
                                             
           
                                // Second way to store the data 
                                 // $message->receiver_user_email  = $request->receiver_user_email;
                                 // $message->sender_user_email    = $request->sender_user_email;
                                 // $message->content           = $request->content;
                                 // $message->sender_user_id      = $request->sender_user_id;
          
            // Store the message details in the $res variable 
               $res = $message->save();
                                             // echo'<pre>';
                                             // print_r($message);
                                             // echo'</pre>';
                                             // die;
                                                     
              

           //check the condition of saving the data in the database 
           if($res)
             {
             // if email input is right then it store in the message table in the database 
               return redirect('maillist');
              }
               else {
                   return back()->with('fail','Something Wrong');
               } 


        }



     // profile 
             public function profile()
             {  
                
            $teacherInfo = User::find(session('loginid'));
               return view('Teacher.profile', ['teacherInfo' => $teacherInfo]);
            }




    //Show The emails in the inbox page        
                    
        public function maillist()
          {
             $userId = session('loginid');
             // $data = Message::with('children')
             //        ->where('sender_user_id', $userId)
             //         ->whereNull('messages.parent_id')
             //         ->get();


                 
                //  $data = User::join('messages', 'users.id', '=', 'messages.receiver_user_id')
                // ->where('users.id', $userId)
                // ->whereNull('messages.parent_id')
                // ->get(['users.*', 'messages.*']);

                $data = User::join('messages', 'users.id', '=', 'messages.receiver_user_id')
            ->where(function ($query) use ($userId) {
                $query->where('users.id', $userId)
                      ->orWhere('messages.sender_user_id', $userId);
            })
            ->whereNull('messages.parent_id')
            ->get(['users.*', 'messages.*']);

       
           // dd($data);
           //  die();

                return view('Teacher.maillist', ['data' => $data]);
               }


   // show the Intials sent message in the sentlist  
            public function sentlist()
              {
                 $users =  User:: find(session('loginid'));                
                 $contact_email = $users->contact_email;
    
                  $data = User::join('messages', 'users.id', '=', 'messages.sender_user_id')
                             ->where('users.contact_email', '=', $contact_email)
                             ->whereNull('messages.parent_id') 
                              // Assuming parent_id is a column in the messages table
                                ->get(['users.*', 'messages.*']);
                              return view('Teacher.maillist', ['data' => $data]);
              }

      // Test Code 1

    // Show the messages on the bases of Id of message in messages table 

                //  public function showMessage($id)
                // {
                //         $message = Message::find($id);

                //         if ($message) {

                //          $senderId = $message->sender_user_id;
                //          $receiverId = $message->receiver_user_id;
                //          $id = $message->id;
                //          $parent_id = $message->parent_id;

                //      $message1 = Message::where(function ($query) use ($senderId, $receiverId) {
                //            $query->where('sender_user_id', $senderId)
                //            ->where('receiver_user_id', $receiverId);
                           
                //            })->orWhere(function ($query) use ($senderId, $receiverId) {
                //            $query->where('sender_user_id', $receiverId)
                //             ->where('receiver_user_id', $senderId);
                            
                //            })
                             
                //               ->orderBy('created_at', 'asc')->get();

                //         if ($message) {
                //             // Update status to 1 when the message is viewed
                //              $message->update(['status' => 1]);
                //                        }

                //      return view('Teacher.show_message',compact('message1'));
                //        }
                //   }


// Test code 2 
 // public function showMessage($id)
 //  {
 //    $message = Message::find($id);

 //    if ($message) {        
 //        $senderId = $message->sender_user_id;
 //         $receiverId = $message->receiver_user_id;
 //         $msgId = $message->id;
 //         $parent_id = $message->parent_id;

 //         $message1 = Message::with('children')->where('parent_id', null)
 //                     ->Where('id', $msgId) 
 //               ->where(function ($query) use ($senderId, $receiverId,$msgId) {

 //               $query         
 //                 ->where('receiver_user_id', $receiverId)
 //                  ->where('sender_user_id', $senderId);
                
 //         })->orWhere(function ($query) use ($senderId, $receiverId) {
 //             $query->where('sender_user_id', $receiverId)
 //                 ->where('receiver_user_id', $senderId);
 //         })
         
 //         ->orderBy('created_at', 'asc')->get();

 //         if ($message1->isNotEmpty()) {
 //           // Update status to 1 when the message is viewed
 //             $message->update(['status' => 1]);
 //         }
 //     dd($message1);
 //     die;
 //        return view('Teacher.show_message', compact('message1'));
 //     }
 // }       

     // test code 3 
 //               public function showMessage($id)
 //                {   
 //    $message = Message::find($id);
 //    if($message){
 //        $msgId = $message->id;
 //        $parent_id = $message->parent_id;

       
 //     $message1 = message::with('children')
                  
 //               ->where(function ($query) use ($msgId, $parent_id) {

 //               $query->where('parent_id', $parent_id)
 //                    ->where('id',$msgId);
                 
                
 //         })
 //        ->orWhere(function ($query) use ($msgId, $parent_id) {
 //             $query->where('parent_id', $msgId);
 //          })
         
 //         ->orderBy('created_at', 'asc')->get();
 //     }
 
    


    
 //                                             // echo'<pre>';
 //                                             // print_r($message1);                          
 //                                             // echo'</pre>';
 //                                             //  die;
 //    return view('Teacher.show_message', compact('message1'));
 // }

public function showMessage($id)
{
    $message = Message::find($id);

    if ($message) {
        $msgId = $message->id;
        $parent_id = $message->parent_id;

        $message1 = Message::with('children')
            ->where(function ($query) use ($msgId, $parent_id) {
                $query->where('parent_id', $parent_id)
                       ->where('id', $msgId);
            })
            ->orWhere(function ($query) use ($msgId, $parent_id) {
                $query->where('parent_id', $msgId);
            })
            ->orderBy('created_at', 'asc')
            ->get();
            // dd($messages);
            // die();
              return view('Teacher.show_message', compact('message1'));
 }

        // You can now use $messages to display the parent and its children.
    }




//    // Test code 4 
// public function showMessage($id)
// {
//     $message = Message::find($id);

//     if ($message) {
//         $msgId = $message->id;
//         $parent_id = $message->parent_id;
//         $sender_id = $message->sender_id;
//         $message1 = Message::with('children_rec')
//             ->where(function ($query) use ($msgId, $parent_id) {
//                 $query->where('parent_id', $parent_id)
//                       ->Where('id', $msgId);
                      

//             })

//             ->orWhere(function ($query) use ($msgId) {
//                 $query->where('parent_id', $msgId);
//             }) 
//             ->orderBy('created_at', 'asc')
//             ->get();


       



//     }

//     return view('Teacher.show_message', compact('message1'));
// }



        //show replyform 
            public function sendReply($id)
            {
                $message = message::find($id,);
                 $users =  User:: find(session('loginid'));
                 return view('Teacher.sendreply',compact('message','users'));
            }


           //store reply form data 
        
                 public function storeReply(Request $request)
                 {
                      $request->validate([
                      'receiver_user_email' =>'required',
                      'sender_user_email'   => 'required',
                      'content'          => 'required',
                        ]);

                       // Fetch all the details of sender and receiver from users table on the bases of the email
                        $sender   = User::where('contact_email',$request->input('sender_user_email'))->        first(); 
                        $receiver = User::where('contact_email', $request->input('receiver_user_email'))->        first();
               
                     $message = new message([
                'parent_id'          => $request->input('parent_id'),
                'receiver_user_email' =>$request->input('receiver_user_email'),
                'sender_user_email'   =>$request->input('sender_user_email'),
                'content' => $request->input('content'),
                'sender_user_id' => $sender->id,
                'sender_name' => $sender->name,
                'receiver_user_id' => $receiver->id,
                'receiver_name' => $receiver->name,

            ]);

                         // save the message data in the reply form
                         $res = $message->save();
                          //check the condition of saving the data in the database 
                             if($res)
                                      {
                                     // if email input is right then it store in the message table in the database 
                                       return redirect('maillist');
                                                   }
                                        else {
                                      return back()->with('fail','Something Wrong');
                                            }
                                         }


       //    Delete a message from the  maillist 
                public function deleteMessage($id)
                 {
                    // Logic to delete the message based on $id
                       message::find($id)->delete();

               // Redirect back or to another page
                   return redirect()->back();
                  }

        // contact us 
                  public function contactUs(Request $request)
                  {
                    $request->validate([
                        'name' => 'required',
                        'email'=>  'required',
                        'message' => 'required',
                    ]);

                    $contactuser = new Contact();
                    $contactuser->name = $request->name;
                    $contactuser->email = $request->email;
                    $contactuser->message = $request->message;
                    $res = $contactuser->save();
                    return back()->with('Thanku, we will try to contact to you soon');
                  }


   
  
}
         

   