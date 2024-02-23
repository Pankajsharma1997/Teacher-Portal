@extends('Teacher.layout')
@section('content')
<h1> DashBoard Page </h1>
 <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">Teacher Dashboard </h1>
                <p>Welcome to the Teacher Portal </p>
                <p>Teacher:Not only build the Character but make the Nation </p>
            
                <form action="{{ route('teacher.delete') }}" method="post">
                  
                @csrf
                <table class="table mt-3 text-center"> 
                 <thead>
                    <tr> 
                        <th scope="col"> NAME </th>
                         <th scope="col"> EMAIL </th>
                         <th scope="col"> USER_TYPE </th>
                         <th scope="col"> ADDRESS </th>
                          <th scope="col"> CONTACT</th>
                          <th scope="col"> Action</th>

                       </tr> 
                    </thead>
                        <tbody> 
                          <tr>
                            <td> {{$teacherInfo->name }}</td> 
                            <td>{{$teacherInfo->email}}</td>
                            <td>{{ $teacherInfo->user_type  }}</td>
                            <td> {{ $teacherInfo->address  }}</td>
                            <td> {{ $teacherInfo->contact_number }}</td> 
                             <td> <a href="{{ route('teacher.edit')}}"class="btn btn-outline-primary">       Add Info.</a></td>
                              <td><button type="submit" class="btn btn-outline-primary ml-3" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>  @method('delete')  </td>
                          </tr>
                        </tbody>
                <thead> 
                  
          
                </table>

                 </form>

                
            </div>
        </div>
    </div>
    
 

@endsection