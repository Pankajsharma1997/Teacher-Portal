@extends('Teacher.layout')
@section('content')
<h1> Teacher Profile </h1>

 <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">Teacher Profile </h1>
                <p>Welcome to the Teacher Portal </p>
                <p>Teacher:Not only build the Character but make the Nation </p>
            
                <form action="{{ route('teacher.delete') }}" method="post">
                <table class="table mt-3 text-left"> 
                 <thead>
        <tr> 
            <th scope="col"> Name </th>
         <th scope="col"> EMAIL </th>
          <th scope="col"> User_Type </th>
          <th scope="col"> Skills </th>
           <th scope="col"> Experience </th>
           <th scope="col"> Course_detail</th>
           <th scope="col"> Contact_email</th>
           <th scope="col"> Contact </th>
            <th scope="col"> Address </th>
            <th scope="col"> Action </th>
         
         
     
        </tr> 
        </thead>
        <tbody> 
 
         <tr>
          
         <!-- Check if the user was found -->
@if ($teacherInfo)
      <td>{{ $teacherInfo->name }}</td>

      <td>{{ $teacherInfo->email}}</td>

      <td>{{ $teacherInfo->user_type}}</td>

         <td>{{ $teacherInfo->skills}}</td>

            <td>{{ $teacherInfo->experience}}</td>
               <td>{{ $teacherInfo->course_detail}}</td>
                  <td>{{ $teacherInfo->contact_email}}</td>
                     <td>{{ $teacherInfo->contact_number}}</td>
                     <td> {{$teacherInfo->address }} </td>
                     <td> <a href="{{ route('teacher.edit')}}"class="btn btn-outline-primary">       Add/Edit Info.</a></td>


    <!-- Add other attributes as needed -->
@else
    <p>User not found</p>
@endif
@csrf
       </tr>        
                
             
     </tbody>

                </table>

                 </form>

                
            </div>
        </div>
    </div>
    
 


@endsection

