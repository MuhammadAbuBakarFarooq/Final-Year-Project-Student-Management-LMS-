<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>CPM - Add Supervisor</title>

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   
<!-- 

    <nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="{{url('coodinator_dashboard')}}">CPM</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a href="{{url('logout')}}"> Coodinator</a>

    </form>
  </div>
</nav> -->


  @include('layouts.header')
<div id="main">  

<div class="row">
  <div class="col-lg-3 col-sm-2"></div>
  <div class="col-lg-6 col-sm-8">
    


<div class="container mt-3">
        @if(Session::has('msg'))
                <div class="alert alert-success"> {{Session::pull('msg')}}</div>
        @endif
    </div>

<div class="container mt-3">
        @if(Session::has('msg1'))
                <div class="alert alert-danger"> {{Session::pull('msg1')}}</div>
        @endif
    </div>
<div class="container mt-3">
        @if(Session::has('msg2'))
                <div class="alert alert-danger"> {{Session::pull('msg2')}}</div>
        @endif
    </div>

    
<div class="container">
  <div class="mr-auto main">
    <div class="text-center">
    <i class="fa fa-user-plus faa" style="font-size: 70PX"></i>
    <h3>Add new Supervisor</h3>
    </div>
   <form class="mainform" action="{{url('add_new_supervisor')}}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group ">
    <label for="name" class="inplabel">Name</label> 
      <input id="name" name="name" type="text" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}" >
    <p class="invalid-feedback" id="nm" style="color: red; display: none;"> {{$errors->first('name')}} </p>
        @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('name')}} </p>
  @endif
  </div>
  <div class="form-group ">
    <label for="email" class="inplabel">Email</label> 
      <input id="email" name="email" type="Email" class="form-control {{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }}" >
    <p class="invalid-feedback" id="em" style="color: red; display: none;"> {{$errors->first('email')}} </p>
        @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('email')}} </p>
  @endif
  </div>
  <div class="form-group ">
    <label for="ID" class="inplabel">ID</label> 
      <input id="ID" name="id" type="number"  class="form-control {{ ($errors->any() && $errors->first('id')) ? 'is-invalid' : '' }}" >
        @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('id')}} </p>
  @endif
  </div> 
  <div class="form-group ">
    <div class="">
      <button name="submit" type="submit" id="btt" class="btn btn-light">Add</button>
    </div>
  </div>



</form>
  </div>
</div>


    
  </div>
  <div class="col-lg-3 col-sm-2"></div>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
function openNav() {
  document.getElementById("mySidenav").style.left = "-250px";
  document.getElementById("main").style.marginLeft = "0";
}

function closeNav() {
  document.getElementById("mySidenav").style.left = "0px";
  document.getElementById("main").style.marginLeft= "250px";
}
</script>


     <script type="text/javascript">
      $('#name').on('keyup',function(){
        var nameValue = $('#name').val();
        $.ajax({
          type: 'POST',
          data: {"name":nameValue,"_token": "{{ csrf_token() }}"},
          url: "{{url('validation_check_name')}}",
          cache: false,
          success: function(html){
            console.log(html);
            if (html != "") {
              $("#nm").text(html);  
              $("#nm").css('display','block');  
              $("#name").css('border-color','red');  
               
            }else{
              $("#nm").css('display','none');  
              $("#name").css('border-color','#FFA630');
            }
               
          }    
        });
      });
    </script>

    <script type="text/javascript">
      $('#email').on('keyup',function(){
        var emailValue = $('#email').val();
        $.ajax({
          type: 'POST',
          data: {"email":emailValue,"_token": "{{ csrf_token() }}"},
          url: "{{url('validation_check_email')}}",
          cache: false,
          success: function(html){
            console.log(html);
            if (html != "") {
              $("#em").text(html);  
              $("#em").css('display','block');  
              $("#email").css('border-color','red');  

              }
              else{
                $("#email").css('border-color','#FFA630'); 
                $("#em").css('display','none');
              }
          }    
        });
      });
    </script>

  </body>
</html> 