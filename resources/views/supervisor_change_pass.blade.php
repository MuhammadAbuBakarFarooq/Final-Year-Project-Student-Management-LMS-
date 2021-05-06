<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>CPM - Supervisor Change Password</title>

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">
<style type="text/css">
   html{
        zoom:0.8;
      }
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
    <h3>Supervisor </h3><label> Change Password</label>
    </div>
<form action="{{url('change_pass_supervisor')}}" method="POST" enctype="multipart/form-data" class="ml-5 mr-5">
  @csrf
 <input type="hidden" name="id" value="{{Session::get('id')}}">
  <div class="form-group ">
    <label for="Email" class="inplabel">Old Password</label> 
      <input id="Email" name="opass" type="password" class="form-control {{ ($errors->any() && $errors->first('opass')) ? 'is-invalid' : '' }}">
       @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('opass')}} </p>
  @endif
  </div>
 
  <div class="form-group ">
    <label for="Password" class="inplabel">New Password</label> 
      <input id="Password" name="npass" type="Password" class="form-control {{ ($errors->any() && $errors->first('npass')) ? 'is-invalid' : '' }}">
       @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('npass')}} </p>
  @endif
  </div> 
  <div class="form-group ">
    <label for="Password" class="inplabel">Confirm Password</label> 
      <input id="Password" name="npass2" type="Password" class="form-control {{ ($errors->any() && $errors->first('npass')) ? 'is-invalid' : '' }}">
       @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('npass')}} </p>
  @endif
  </div> 
  <div class="form-group ">
    <div class="">
      <button name="submit" type="submit" class="btn btn-light">Change</button>
      <button class="btn btn-light" style="background-color: #fd7e14;"><a href="{{url('supervisor_dashboard')}}" style="color: white; text-decoration: none;">Cancle</a></button>
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