@extends('Teacher.layout')
@section('content')

<div class="container">
<div class ="row"> 
        <div class="col-12 pt-5">
        	<h1 class="display-one mt-5">Edit Courses Details  </h1>
             <form action ="{{route('courses.update',['id' => $course->id])}}" method="post" class ="border p-3 mt-3"> 
               
                @method('PUT')
                @csrf
   @if($course)
		<div class = "control-group col-8 mb-3">
		<label for="courseTitle" class ="form-label"> Course Title </label>
		<input type="text" class="form-control"  name="courseTitle" placeholder="Enter Course Title" required value="{{$course->title}}"> 
		</div>

		<div class ="control-group col-8 mb-3">
		 <label for="courseDescription" class="form-label"> Course Description </label>
		
		   <textarea type="text" class="form-control" rows="5" placeholder="Message" name="courseDescription">  {{$course->description}}</textarea>
		</div>

		<div class = "control-group col-8 mb-3">
			<label for="duration" class="form-label">Duration </label>
			<input type="text" class="form-control" name="duration" placeholder="Course Duration" required value="{{$course->duration}}">
		</div>

		<div class = "control-group col-8 mb-3">
			<label for="chapters" class="form-label">Chapters </label>
			<input type="text" class="form-control" name="chapters" placeholder="Course Chapters" required value="{{$course->chpaters}}">
		</div>
		<div class = "control-group col-8 mb-3">
			<label for ="startdate" class="form-label">Start Date </label>
			<input type ="date" class="form-control" name ="startdate" placeholder="choose a date" required 	value ="{{$course->	start_date}}">
            

		 </div>
		<div class = "control-group col-8 mb-3">
            <label for ="prize" class="form-label"> Prize </label>
            <input type="text" class ="form-control" name="prize" placeholder="Course Prize" required value="{{$course->prize}}"> 
		 </div>
		 <div class ="control-group col-8 mb-3"> 
            <label for ="authorDetails" class= "form-label"> Author Details </label>
            <input type ="text" class="form-control ms-3" name="authorDetails" placeholder="Author_Details" required value ="{{$course->course_author}}">
		 </div>
		 <!-- <div class="control-group col-8 mb-3">
                  <label for ="image" class = "form-label"> Course Image </label> -->
                  <!-- <div class="control-group col-8 mb-3">
                  	
              <label class="form-label">Current Image</label>
                 <input type="text" class="form-control" readonly value="{{ $course->image }}" disabled>
                 </div> -->
                  <!-- <input type ="file" class="form-control" name ="image" placeholder="choose a file" required value ="{{$course->image}}">         
         		  </div> --> 
         		  <button type="submit" class="btn btn-primary" name="submit">Save Update</button>
     @endif

             </form>
        </div>
</div> 



</div>
@endsection