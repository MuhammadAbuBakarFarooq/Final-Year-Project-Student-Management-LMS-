<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   <title>CPM - Query Details</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body>   



  @include('layouts.header')
<div id="main">  



<div style="margin-top: 5%;" class="container">  
    <div class="row">
     <div class="col-6">
    <h2>Quries Details</h2><br>
     </div>
     <div class="col-6">

      <?php if (Session::get('key') == 'student') { ?>
     <a href="{{url('/student/ask_query')}}" style="float: right"><button class="btn btn-info"><i class="far fa-comment-dots">&nbsp&nbsp</i>
       Ask Query
    </button></a>
  <?php }if (Session::get('key') == 'supervisor') { ?>
    <a href="{{url('/supervisor/ask_query')}}" style="float: right"><button class="btn btn-info"><i class="far fa-comment-dots">&nbsp&nbsp</i>
       Post a new Query
    </button></a>
  <?php } ?>
   </div>
   
 </div>
 <div class="row">
   <div class="col-12">
      <div class="jumbotron">    
     <table class="table table_list">
      <tbody>
        <tr>
        <th style="width:50px">From: </th>
        <td> {{$name}}</td>
        </tr>
        <tr>
        <th>Query: </th>
        <td> {{$query[0]->askquery}}</td>
        </tr>
      </tbody>
    </table>
        <hr>
<?php if ($test == 1) {
        # code...
       ?>
<div class="container">  
  <div class="mr-auto main text-right" style="width:70%">
    
    <form class="container pl-5 pr-5" <?php if (Session::get('key') == 'student') { ?> action="{{url('/student/reply_query')}}" <?php } elseif (Session::get('key') == 'supervisor') { ?> action="{{url('/supervisor/reply_query')}}" <?php } ?> method="POST" enctype="multipart/form-data">
    @csrf


  <div class="form-group mt-4">

 <input type="hidden" name="id" value="{{$query[0]->id}}">
    <textarea class="form-control {{ ($errors->any() && $errors->first('askquery')) ? 'is-invalid' : '' }}" name="askquery" id="askquery" rows="4"></textarea>
       @if($errors->any())
    <p class="invalid-feedback" style="color: red;"> The Query Field is required </p>
  @endif
  </div> 
  <div class="form-group m-auto">
    <div class="m-auto">
      <button name="submit" type="submit" class="btn btn-light">Reply</button>

    </div>
  </div>
</form>
  </div>
</div>
<?php } ?>

      </div>
   </div>

 </div>
</div>
</div>






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