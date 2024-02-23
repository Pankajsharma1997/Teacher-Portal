@extends('Teacher.layout')
@section('content')

<div class = "container">
    <div class ="row">
           <div class="col-12 text-center">
          <h1 class="display-one mt-5"> Show Message  </h1> 
          <div class ="col-8 text-center">
  

       @foreach($message1 as $record)
         <ul>

            {{dd($record);}}
          
            <li>  <h6 class="text-success"> FROM:(Name) {{ $record->sender_name}} :- <b> Email </b> ( {{ $record->sender_user_email}} ) </h6> </li>

            
            <li> <h6>TO : Name: {{ $record->receiver_name}} :Email {{ $record->receiver_user_email}} </h6>   </li>
        </ul>
        <ul> 
          <li> <h5> Message: {{$record->content}} <h5> </li>
          </ul>
          </ul>
          <li> <a href="{{route('sendreply',$record->id)}}" class="btn btn-outline-primary mb-4"> Send Reply   </a> </li>

          @endforeach
     </td>
</div>
</div>
</div> 

<div>
 @endsection





    
   
     
        
        