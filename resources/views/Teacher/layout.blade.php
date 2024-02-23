<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./Images/favicon.ico" type="image/ico" />

    <title>Laravel Teacher  Pannel  </title>

    <!-- Bootstrap -->
    <link href="{{ asset('admin-theme/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin-theme/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin-theme/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin-theme/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin-theme/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin-theme/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('admin-theme/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('admin-theme/build/css/custom.min.css')}}" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-paw"></i> <span>Dynamic World </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome</span>   
                 <h2>{{$teacherInfo->name ??''}} </h2>  
           
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />


            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                   <li><a href="{{route('dashboard')}}"> Home </a></li>
                  </li> 
                 <li><a href="{{route('profile')}}"> Profile </a></li>
                  </li>
                  <!--  <li><a href="#">Message</a>
                  </li> --> 

                 <li class ="dropdown"> 
                    <a class ="dropdown-toggle" data-toggle="dropdown"> Message  <span class="caret">  </span> </a>
                    <ul class="dropdown-menu"> 
                     
                     <li> <a href="{{route('maillist')}}"> Inbox  </a></li>
                   
                     <li> <a href="{{route('sentlist')}}"> Sentlist </a> </li>
                      
                    </ul>
                  </li>
                  <li class ="dropdown"> 
                    <a class ="dropdown-toggle" data-toggle="dropdown"> Courses <span class="caret">  </span> </a>
                    <ul class="dropdown-menu"> 
                     <li> <a href="course"> Add Course  </a></li>
                     <li> <a href="courselist"> Course List </a> </li> 
                    </ul>
                  </li>
                  <li> <a href="{{route('enrolllist')}}"> Enrollments  </a> </li>
               
                  <li><a><i class="#"></i> Contact Us </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->













            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="/">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>


        <!-- page content -->
        <div class="right_col" role="main">
        @yield('content')


          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin-theme/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin-theme/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('admin-theme/build/js/custom.min.js')}}"></script>
	  @stack('footer-scripts')
  </body>
</html>
