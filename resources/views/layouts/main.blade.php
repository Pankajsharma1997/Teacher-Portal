<!DOCTYPE html>
<html lang="en">
<head>

     <title>Teacher Portal </title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
     <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

     <!-- MAIN CSS -->
      <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}"> 
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     <div> 
     @include('partials.header')
      </div>
   
    <div> 
    @yield('content')
  <div> 
    @include('partials.footer')
   </div>
  <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>



</body>
</html>