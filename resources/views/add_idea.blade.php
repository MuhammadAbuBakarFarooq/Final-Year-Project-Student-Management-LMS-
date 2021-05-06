<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   <title>CPM - Add Idea</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   


@include('layouts.header')
<div id="main">


<div class="container mt-3">
        @if(Session::has('msg'))
                <div class="alert alert-success"> {{Session::pull('msg')}}</div>       
        @endif

             
</div>
<div class="row mt-5">
  <div class="col-lg-3 col-sm-2"></div>
  <div class="col-lg-6 col-sm-8">
    



<div class="container">
  <div class="mr-auto main">
    <div class="text-center">
    <i class="fa fa-user faa"></i>
    <h3>Add Idea</h3>
    </div>

    <form class="container pl-5 pr-5"
    <?php if (Session::get('key') == 'supervisor'){ ?>

    action="{{url('supervisor/add_idea')}}"
      
    <?php } ?>
    <?php if (Session::get('key') == 'student' && Session::get('student_type')  == 1){ ?>

    action="{{url('student/add_idea_student')}}"
      
    <?php } ?>
     method="POST" enctype="multipart/form-data">
  @csrf
 
  <div class="form-group ">
        <label for="text" class="inplabel">Title</label> 
      <input id="text" name="title" type="text" class="form-control {{ ($errors->any() && $errors->first('title')) ? 'is-invalid' : '' }}">
       @if($errors->any())  
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('title')}} </p>
  @endif
  </div>
     <?php if (Session::get('key')  == 'supervisor'): ?>
  <input type="hidden" name="supervisor_id" value="{{Session::get('user_id')}}">
  <?php endif ?>
   <?php if (Session::get('key')  == 'student'): ?>

  <input type="hidden" name="student_id" value="<?php echo Session::get('student_id'); ?>">

  <input type="hidden" name="supervisor_id" value="<?php echo $supervisor_id; ?>">
  <?php endif ?>
  <div class="form-group ">
    <label for="desc" class="inplabel">Description</label> 
    <textarea class="form-control {{ ($errors->any() && $errors->first('desc')) ? 'is-invalid' : '' }}" name="desc" id="desc" rows="3"></textarea>
       @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('desc')}} </p>
  @endif
  </div> 
  <div class="form-group ">
    <div class="">
      <button name="submit" type="submit" class="btn btn-light">Add Idea</button>

    </div>
  </div>
</form>
  </div>
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
      
  <?php if (Session::get('key') == 'supervisor') { ?>
 
 <script type="text/javascript">

setInterval(function(){ 

  $.ajax({
  url: "{{url('count_q_su_not')}}",
  cache: false,
  success: function(html){
    $(".q_su_not").html(html);
  }
});

 }, 100);

</script>

<script type="text/javascript">

setInterval(function(){ 

  $.ajax({
  url: "{{url('count_not')}}",
  cache: false,
  success: function(html){
    $(".not").html(html);
  }
});

 }, 100);

    </script>

<?php } ?>


<?php if (Session::get('key') == 'student'){ ?>
   
  
 <script type="text/javascript">

setInterval(function(){ 

  $.ajax({
  url: "{{url('count_q_s_not')}}",
  cache: false,
  success: function(html){
    $(".q_s_not").html(html);
  }
});

 }, 100);

</script>


 <script type="text/javascript">

setInterval(function(){ 

  $.ajax({
  url: "{{url('count_snot')}}",
  cache: false,
  success: function(html){
    $(".snot").html(html);
  }
});

 }, 100);

    </script>


    <script type="text/javascript">

setInterval(function(){ 

  $.ajax({
  url: "{{url('count_fnot')}}",
  cache: false,
  success: function(html){
    $(".fnot").html(html);
  }
});

 }, 100);

    </script>
  
<?php } ?>



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
  </body>
</html>