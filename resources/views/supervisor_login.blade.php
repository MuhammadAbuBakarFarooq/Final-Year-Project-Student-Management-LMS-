<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>CPM - Supervisor login</title>

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">
       <style>
         html{
        zoom:0.8;
      }
.dropbtn {
  background-color: transparent;
  color: #FFA630;
  font-weight: bold;  
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a:hover {
  color: #FFA630;
}
.dropdown-content a {
  color: #FFA630;
  text-decoration: none;
  text-align: left !important;
  padding: 0px !important;
  float: left;
}



.dropdown-content a:hover {background-color: transparent;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: transparent;}
</style>
  </head>
  <body style="background-color: #e8ebee;">   


   <!--  <nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">CPM</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
          <a href="">lOGOUT</a>

    </form>
  </div>
</nav> -->
<div class="container mt-3">
        @if(Session::has('msg'))
                <div class="alert alert-danger"> {{Session::pull('msg')}}</div>
        @endif
    </div>
<div class="row mt-5">
  <div class="col-lg-3 col-sm-2"></div>
  <div class="col-lg-6 col-sm-8">
    



<div class="container">
  <div class="mr-auto main">
    <div class="text-center">
    <i class="fa fa-user faa"></i>
    <h3>lOGIN </h3><label> as a <!-- <div style="display: inline" class="dropdown">
  <a class="dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
   Supervisor <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a class="ddm" href="{{url('student_login_page')}}">Student</a></li>
    <li><a class="ddm" href="{{url('/')}}">Coodinator</a></li>
    <li><a class="ddm" href="{{url('faculty_login_page')}}">Faculty</a></li>
  </ul>
</div> --></label>
<div class="dropdown">
  <button class="dropbtn">Supervisor <i class="fa fa-caret-down"></i></button>
  <div class="dropdown-content">
    <a class="ddm" href="{{url('student_login_page')}}">Student</a><br>
    <a class="ddm" href="{{url('/')}}">Coodinator</a><br>
    <a class="ddm" href="{{url('faculty_login_page')}}">Faculty</a>
  </div>
</div>
    </div>
<form class="container pl-5 pr-5" action="{{url('supervisor_login')}}" method="POST" enctype="multipart/form-data">
  @csrf
 
  <div class="form-group ">
    <label for="Email" class="inplabel">Email</label> 
      <input id="Email" name="email" type="Email" class="form-control {{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }}">
       @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('email')}} </p>
  @endif
  </div>
 
  <div class="form-group ">
    <label for="Password" class="inplabel">Password</label> 
      <input id="Password" name="password" type="Password" class="form-control {{ ($errors->any() && $errors->first('password')) ? 'is-invalid' : '' }}">
       @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('password')}} </p>
  @endif
  </div> 
  <div class="form-group ">
    <div class="">
      <button name="submit" type="submit" class="btn btn-light">Login</button>
    </div>
  </div>
</form>
  </div>
</div>


    
  </div>
  <div class="col-lg-3 col-sm-2"></div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>