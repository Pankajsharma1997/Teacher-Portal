@extends('Teacher.layout') @section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1 class="display-one mt-5">Edit Teacher Profile </h1>
        

            <form id="edit-frm" method="POST" action="{{ route('teacher.update') }}"  class="border p-3 mt-2">
            
                @method('PUT')
                @csrf
                 <div class="control-group col-6 text-left">
                    <label for="name">Name</label>
                    <div>
                        <input type="text" id="name" class="form-control mb-4" name="name"               value="{{ $teacherInfo['name'] }}" required>

                    </div>
                </div>

                 <div class="control-group col-6 text-left">
                    <label for="email">Email</label>
                    <div>
                        <input type="text" id="email" class="form-control mb-4" name="email" value="{{ $teacherInfo['email'] }}" required>
                    </div>
                </div>

               
                 <div class="control-group col-6 text-left">
                    <label for="user_type">User_Type
                    </label>
                    <div>
                        <input type="text" id="user_type" class="form-control mb-4" name="user_type" value="{{ $teacherInfo['user_type'] }}" readonly>
                    </div>
                </div>
                  <div class="control-group col-6 text-left">
                    <label for="address">Address 
                    </label>
                    <div>
                        <input type="text" id="address" class="form-control mb-4" name="address" value="{{ $teacherInfo['address'] }}" required>
                    </div>
                </div>

                <div class="control-group col-6 text-left">
                    <label for="contact">Contact
                    </label>
                    <div>
                        <input type="text" id="contact" class="form-control mb-4" name="contact_number" value="{{$teacherInfo['contact_number'] }}" required>
                    </div>
                </div>
                 <div class="control-group col-6 text-left">
                    <label for="experience">experience
                    </label>
                    <div>
                        <input type="number" id="experience" class="form-control mb-4" name="experience" value= "{{$teacherInfo['experience'] }}"required>
                    </div>
                </div>

                  <div class="control-group col-6 text-left">
                    <label for="skills">skills
                    </label>
                    <div>
                        <input type="text" id="skills" class="form-control mb-4" name="skills"value= "{{$teacherInfo['skills'] }}"required>
                    </div>
                </div>
 
   <div class="control-group col-6 text-left">
                    <label for="course_detail">Course-Details
                    </label>
                    <div>
                        <input type="text" id="course_detail" class="form-control mb-4" name="course_detail" value = "{{$teacherInfo['course_detail'] }}"required>
                    </div>
                </div>

                 <div class="control-group col-6 text-left">
                    <label for="contact_email">Contact-email
                    </label>
                    <div>
                        <input type="text" id="course_detail" class="form-control mb-4" name="contact_email" value= "{{$teacherInfo['contact_email'] }}"required>
                    </div>
                </div>
 
 
 
             <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Save Update</button></div>

        </div>
    </div>
</div>
@endsection