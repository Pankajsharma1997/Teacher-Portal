@extends('layouts.main')
@section('content')
	<div class ="container">
		<div class ="row">
           <div class ="col-md-12">
           	<h1> Course Detail </h1>
           	<table class="table">
  <thead>
    <tr>

      <!-- <th scope="col">CourseId </th> -->
      <th scope="col"> Course_Name </th>
      <th scope="col">Description </th>
      <th scope="col">Image  </th>
      <th scope="col">Duration </th>
       <th scope="col">Author </th> 
            <th scope="col">Chapters </th>
            <th scope ="col"> Start_date </th>
              <th scope="col">Prize </th> 
    </tr>
  </thead>
  <tbody>
  	@if($coursedetail)
    <tr>
      <!-- <th scope="row">{{$coursedetail->id}}</th> -->
      <td>{{$coursedetail->title}} </td>
      <td> {{$coursedetail->description}} </td>
     <td>   <img src=" {{ asset('uploads/images/'. $coursedetail->image) }}"  class="img-responsive" style="height: 100px; width: 200px;" alt="{{$coursedetail->course_auther}}"> </td>
      <!-- <td> {{$coursedetail->image}} </td> -->
      <td> {{$coursedetail->duration}}  </td>
      <td> {{$coursedetail->course_author}}  </td>
	  <td> {{$coursedetail->chapters}}  </td>
	  <td>  {{ \Carbon\Carbon::parse($coursedetail->start_date)->format('d/m/Y') }} </td>
	  <td> {{$coursedetail->prize}}  </td>
        
    </tr>
    <tr>
        <td> 
        
          <button class="btn btn-danger" type="submit"> <a href ="{{route('enroll', $coursedetail->id)}}"> Enroll The Course. </a></button> </td> 

     </tr>
    @endif

  </tbody>
</table>
  </div>

		</div>
	 </div>
   @endsection
  
 
  
  