@extends('Teacher.layout')
@section('content')
 <section id="courses">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Popular Courses <small>Upgrade your skills with newest courses</small></h2>
                         </div>
                         
                          <div class="owl-carousel owl-theme owl-courses"> 
                         
                                @foreach ($courses as $course)
                              <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="courses-thumb">
                                             <div class="courses-top">
                                                  <div class="courses-image">
                                                        <img src=" {{ asset('uploads/images/'. $course->image) }}"  class="img-responsive" alt="{{$course->course_auther}}">
                                                  </div>
                                                  <div class="courses-date">
                                                       <span><i class="fa fa-calendar">  {{ \Carbon\Carbon::parse($course->start_date)->format('d/m/Y') }}</i> </span>
                                                       <span><i class="fa fa-clock-o"></i>{{$course->duration}}</span>
                                                  </div>
                                             </div>
                                     
                                             <div class="courses-detail">
                                                  <h3><a href="#">{{$course->title }}</a></h3>
                                                  <p>{{$course->description}}.</p>
                                             </div>
                                                      
                                             <div class="courses-info">
                                                  <div class="courses-author">
                                                       <!-- <img src="images/author-image1.jpg" class="img-responsive" alt=""> -->
                                                       <span>{{$course->course_author}}</span>
                                                  </div>
                                                  <div class="courses-price">
                                                       <a href="#"><span>{{$course->prize}}</span></a>
                                                  </div>
                                             </div>

                                               <div> 
                                                 <button type ="submit" class="btn-outline-primary"> 
                                                 	<a href="{{ route('courses.edit',$course->id)}}" > Edit Course Details</a> </button>

                                               </div>
                                               <div class= "courses-info"> 
                                                 

          <form action="{{ route('deleteCourse', $course->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
            </form>

                                               </div>
                                               
                                        </div>
                                               @endforeach
                                   </div>

                              </div>
                            
                         </div>

                                       
                     </div>

               </div>
          </div>
     </section>



                        
@endsection

