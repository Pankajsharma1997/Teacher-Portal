<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <!-- bootstrap css link  -->
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
/*            overflow: hidden;*/
        }
    </style>
</head>
<body>
   
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="./images/adminreg.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="{{route('registration')}}" method="post" enctype='multipart/form-data'>
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}} </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}} </div>
                    @endif
                    @csrf

<!-- Label and Input box for Name  -->
                    <div class="form-outline mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your Name" value="{{old('name')}}">
                        <span class="text-danger">@error('name'){{$message}}@enderror </span>
                    </div>

<!-- Label and Input box for Email  -->
                    <div class="form-outline mb-3">
                        <label for="email" class="form-label"> Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email"class="form-control"  value="{{old('email')}}">
                         <span class="text-danger">@error('email'){{$message}}@enderror </span>
                    </div>

<!-- Label and Input box for  Password -->
                    <div class="form-outline mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control" value="{{old('password')}}">
                    <span class="text-danger">@error('password'){{$message}}@enderror </span>

 <!-- label and Input box for user type -->

                    <div class="form-outline mb-4 mt-4">
                    <label for="user_type" class="form-label">User Type  </label>
                    <select name="user_type" id="user_types" class="ms-4 mb-3">
                    <option value="choose"> Choose The Type</option>
                     <option value="student">Student</option>
                      <option value="teacher">Teacher</option>
                    </select>

<!-- Label and Input box for Image  -->
                     <div class="form-outline mb-3">  
                     <label for ="Image" class="form-label"> Upload a Image </label>
                     <input type ="file" name="image" class="form-control" placeholder="Choose a file" value = "{{old('image')}}"> 
                     <span class="text-danger">@error('image'){{$message}}@enderror </span>
                     </div>

<!-- Label and Input box for Phone-number -->
                    <div class="form-outline mb-3">
                       <label for="contact-number" class="form-label"> Contact Number</label>
                       <input type="text" name="contact_number" class="form-control" placeholder="Enter the contact_number" value="{{old('contact_number')}}" />
                    <span class="text-danger">@error('phone-number'){{$message}}@enderror     </span>
                     </div>


<!-- Label and input box for address -->
                    <div class="form-outline mb-3">
                    <label for ="address" class="form-label"> Address </label>
                    <input type ="text" name="address" class="form-control" placeholder="Enter the address"> 
                    <span class="text-danger">@error('address'){{$message}}@enderror </span>
                    </div>



                    <div class="form-outline mb-3">
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="register" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? 
                            <a href="{{route('login')}}" class="link-danger">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</html>
