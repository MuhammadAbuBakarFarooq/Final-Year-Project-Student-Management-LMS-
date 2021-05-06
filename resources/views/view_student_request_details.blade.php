<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>CPM - Student Request Details</title>

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   


  <!--   <nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="{{url('coodinator_dashboard')}}">CPM</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a href="{{url('logout')}}">Coodinator</a>

    </form>
  </div>
</nav> -->

  @include('layouts.header')
<div id="main">  

<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    

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
  <div class="main" style="width:110vh !important; margin-left: -5%">
    
  <div class="jumbotron ml-5 mr-5 mt-5 pt-2" style="margin-top: 5% !important">
    <div class="container pt-3 mb-2">
    <h3 style="font-size: 20px; font-weight: bolder;">Student Details:</h3>
     <table class="table table_list table-bordered">
  <thead class="tdark">
        <tr>

          <th>#</th>
          <th>Name</th>
          <th>Roll No</th>
          <th>Email</th>
          <th>CGPA</th>
        </tr>
        </thead>
        <tbody>
          <?php $i =1; ?>
          @foreach($student_details as $row)
        <tr style="<?php if ($row->is_manager == 1){ ?>
          font-weight: bold
        <?php } ?>">
          <th>{{$i}}</th>
          <td>{{$row->student_name}}</td>
          <td>{{$row->student_id}}</td>
          <td>{{$row->student_email}}</td>
          <td>{{$row->cgpa}}</td>
        </tr>
        <?php $i++; ?>
        @endforeach
      </tbody>
    </table>
    
    <hr>
    </div>
    @foreach($student_idea as $row)
     <div class="container pt-3 mb-2">
        <h3 style="font-size: 20px; font-weight: bolder;">Project Title:</h3>
    <label style="font-size: 20px">{{$row->title}}</label><hr>
  </div>
   <div class="container pt-3 mb-2">
        <h3 style="font-size: 20px; font-weight: bolder;">Description:</h3>
    <label style="font-size: 17px">{{$row->desc}}</label><hr>
</div>
 
  <?php if ($action == 0 || $action == 1): ?>
    
   <a href="{{ route('reject.idea/', $row->id) }}" onclick="return  confirm('Do you want to reject this request')" name="delete" class="btn btn-danger float-right ml-2">Reject </a>

    <a href="{{ route('accept.idea/', [$row->id,$row->from]) }}" name="edit" class="btn btn-primary float-right">Accept </a>
  <?php endif ?>
  <button class="btn btn" style="float: right; margin-right: 2%; background-color: #fd7e14;"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="color: white; text-decoration: none;">Exit</a></button>
       



  </div>
 @endforeach
  </div>
</div>


    
  </div>
  <div class="col-lg-2"></div>
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