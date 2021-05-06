<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>CPM - Feedbacks</title>

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   

  @include('layouts.header')
<div id="main">  

  


<?php  
$uuid = Session::get('user_id');


?>

<div class="row">
  <div class="col-10">
    
<div class="container mt-3">
        @if(Session::has('msg'))
                <div class="alert alert-success"> {{Session::pull('msg')}}</div>
        @endif
    </div>

  </div>
  </div>



<?php if (Session::get('key') == 'student' || Session::get('key') == 'coodinator') { ?>

<?php }else{ ?>

<?php if ($tsd == 1){ ?>
  
  <div class="row">
  <div class="col-10">
<div class="main" style="margin-right: -10%;">
   <div class="main mb-3 mt-3" style="margin:auto; width:90%">
    @foreach($project_details as $row)
     <div class="container pt-3 mb-2">
        <h3 style="font-size: 20px; font-weight: bolder;">Project Title:</h3>
    <label style="font-size: 20px">{{$row->title}}</label><hr>
  </div>
   <div class="container pt-3 mb-2">
        <h3 style="font-size: 20px; font-weight: bolder;">Description:</h3>
    <label style="font-size: 17px">{{$row->desc}}</label><hr>
</div>

 @endforeach
  </div>

    <form class="container pl-5 pr-5" action="{{url('faculty/give_fb')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="g_id" value="{{$group_id}}">
  <input type="hidden" name="f_id" value="{{$uuid}}">
  <input type="hidden" name="presentation_name" value="{{$presentation_name}}">
  <div class="form-group">
    <label for="fb" class="inplabel"><b>Give Feedback To Presentation: {{$presentation_name}}</b></label> 
    <textarea class="form-control {{ ($errors->any() && $errors->first('fb')) ? 'is-invalid' : '' }}" name="fb" id="fb" rows="3" required></textarea>
       @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('fb')}} </p>
  @endif
  </div> 
  <div class="form-group ">
    <div class="">
      <button name="submit" type="submit" class="btn btn-light">Submit</button>
      <button class="btn btn" style="margin-right: 3%; background-color: #fd7e14;"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="color: white; text-decoration: none;">Cancle</a></button>
    </div>
  </div>
</form>

</div>
  </div>
  </div>
   <?php }else{ ?>
     <div class="row">
  <div class="col-10">
<div class="main" style="margin-right: -10%;">
   FeedBack Sumitted
   </div> 
   </div> 
   </div> 
 <?php  } }?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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