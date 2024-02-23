@extends('Teacher.layout')
@section('content')
<div class="container">
    <div class="row">
     <div class="col-12 text-center"> 
          <h1 class="display-one mt-5"> Inbox Message-list </h1>
        <h2 class = "text-right mb-3"> <a href="{{route('sendmail')}}" class ="btn btn-outline-primary">Compose  </a> </h2>         
          <table class="table mt-3 text-center pt-5"> 
            <thead>
               <tr> 
                     
                         <th scope="col"> <h2>  Name    </h2>  </th>
                         <th scope="col"> <h2>  Message </h2> </th>
                       
                       </tr> 
                    </thead>
          <tbody> 
       <tr> 
       @foreach($data as $record)
     
        <td> Conversation Of <b> {{$record->sender_name}} </b> &  <b> {{$record->receiver_name}} </b> </td>
         <td>  <a href="{{route('showMessage', $record->id)}}" class = "btn btn-outline-primary mt-3"> Show Message </a>  </td>
             <td>
              <!-- Add a delete button with a form -->
            <form action="{{ route('deleteMessage', $record->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
            </form>

     </td>
      
        
 </tr>
 @endforeach

          </tbody>
          </table>
    </div>


 </div>
@endsection
