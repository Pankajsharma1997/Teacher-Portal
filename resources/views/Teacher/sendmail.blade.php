@extends('Teacher.layout')
@section('content')
<div class="container">
<div class="col-sm-10">
	<h1 class= 'text-center mt-3 ml-3'> Email Chatbox </h1> 
  <form action="{{route('teacher.sendmail')}}" method="post">
  	@csrf
    
    <div class="form-group">
    <label for="To">To</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="receiver_user_email">
  </div>

<div class="form-group">
    <label for="From">From</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="sender_user_email" value ="{{ $user->contact_email}}">
  </div>

  <div class="form-group">
  <label for= "message"> Message </label>
   <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Message" name="content"></textarea>
  </div>
  
   <input type ="submit" class = "btn btn-outline-success mt-3 ml-4" name="sendmail" value="Send Message"/> 
  </div>
  </form>
 </div>

</div>
@endsection