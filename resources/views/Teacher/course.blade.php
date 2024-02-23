@extends('Teacher.layout')
@section('content')
<div class="container mt-5 mx-auto">
	<h1 class="mb-4 text-center"> Add Course </h1> 
	<form action ="{{route('courses')}}" method="post" enctype='multipart/form-data'> 

		@csrf
		<div class = "control-group col-8 mb-3">
		<label for="courseTitle" class ="form-label"> Course Title </label>
		<input type="text" class="form-control"  name="courseTitle" placeholder="Enter Course Title" required> 
		</div>

		<div class ="control-group col-8 mb-3">
		 <label for="courseDescription" class="form-label"> Course Description </label>
		 <textarea class="form-control" name="courseDescription" row="5" placeholder="Course Description" required> </textarea> 
		</div>

		<div class = "control-group col-8 mb-3">
			<label for="duration" class="form-label">Duration </label>
			<input type="text" class="form-control" name="duration" placeholder="Course Duration" required>
		</div>
		<div class="control-group col-8 mb-3">
                  <label for ="chapters" class = "form-label"> Chapters </label>
                  <input type ="text" class="form-control" name ="chapters" placeholder="Total chapters" required>         
         		  </div>
		<div class = "control-group col-8 mb-3">
			<label for ="startdate" class="form-label">Start Date </label>
			<input type ="date" class="form-control" name ="startdate" placeholder="choose a date" required>
            

		 </div>
		<div class = "control-group col-8 mb-3">
            <label for ="prize" class="form-label"> Prize </label>
            <input type="text" class ="form-control" name="prize" placeholder="Course Prize" required> 
		 </div>

		 <div class ="control-group col-8 mb-3"> 
            <label for ="authorDetails" class= "form-label"> Author Details </label>
            <input type ="text" class="form-control ms-3" name="authorDetails" placeholder="Author_Details" required>
		 </div>
		 <div class="control-group col-8 mb-3">
                  <label for ="image" class = "form-label"> Course Image </label>
                  <input type ="file" class="form-control" name ="image" placeholder="choose a file" required>         
         		  </div>
         		  <div> 
                    <input type ="hidden" name="teacher_id" value = {{$userId->id}}

         		  </div>

                
         		  <button type="submit" class="btn btn-primary" name="submit">Add Course</button>
	</form> 



 </div>


@endsection


      

        