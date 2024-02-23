@extends('Teacher.layout')
@section('content')

<div class = "contianer">
 <div class = "row">
   <div class ="col-md-8 mx-4 my-5">
          <h1 class ="text-center"> Student Enrollments </h1>    
          <table class="table mx-5 my-5" class="table table-striped ">
  <thead>
    <tr>
      <th scope="col"> S.No.</th>
      <th scope="col"> Name </th>
      <th scope="col"> Email </th>
      <th scope="col"> course_id </th>
      <th scope="col"> Course_Title </th> 
      <th scope="col"> Course_Prize </th>
      <th scope="col"> Created_at </th> 

    </tr>
  </thead>
  <tbody>
  	<?php $i = 1; ?> 
   

  <tr> 
   <tr>@foreach($enrollmentlist as $list)
      <th scope="row">{{$i++}}</th>
      <td>{{$list->name }}</td>
      <td>{{$list->email}}</td>
      <td>{{$list->course_id}}</td>
      <td> {{$list->title}}</td>
      <td>{{$list->prize}}</td>
      <td>{{$list->created_at}}</td>
    </tr>

 @endforeach
  </tbody>
</table>


 </div> 



  </div>

@endsection

