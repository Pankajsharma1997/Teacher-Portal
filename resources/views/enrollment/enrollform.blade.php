@extends('layouts.main')
@section('content')
<div class ="container mx-5 my-5"> 
	 @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
  <div class ="row">
       <div class ="col-md-6">
        <h3 class ="text-primary mb-5"> Submit an application for course enrollment </h3>
        <form  action ="{{route('enroll.store')}}" method ="Post"> 
        	@csrf
           <div class ="form-group mt-10"> 
           	<input type ="text" name ="name" placeholder ="Name"  class ="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" value="{{old('name')}}">
           </div>

           <div class ="form-group"> 
           <input type ="email" name ="email" placeholder="Email Address" class="form-control"  onfocus ="this.placeholder =''" onblur = "this.placeholder = 'Email'"                      value ="{{old('email')}}"> 
            </div>
 
            <div class = "form-group mt-4"> 
                <input type ="password" name = "password" placeholder = "Password" class ="form-control" onfocus = "this.placeholder =''" onblur = "this.placeholder = 'Password'"/>
            </div>

            <div class ="form-group mt-4">
                <input type ="password" name="password_confirmation"  placeholder = "Confirm Password" class = "form-control" onfocus ="this.placeholder =''" onblur ="this.placeholder = 'Confirm Password'" />
            </div>
         
             <input type ="hidden" name ="course_id" value = "{{$course->id}}">
            
            <div class ="form-group mt-4">

                  <button type="submit" class="btn btn-primary" name="submit">Save</button>

            </div>
         </form>
      </div>



      <div class = "col-md-6"> 

         </div>

  </div>


</div>


 @endsection
  