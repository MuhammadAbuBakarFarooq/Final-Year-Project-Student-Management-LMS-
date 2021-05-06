<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>CPM - Supervisor Dashboard</title>

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   


<!--     <nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">CPM</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      
        <a href="{{url('logout')}}"> Coodinator</a>
      

    </form>
  </div>
</nav>
 -->



  @include('layouts.header')
<div id="main">  

<div class="container">

<div class="container mt-3">
        @if(Session::has('msg'))
                <div class="alert alert-success"> {{Session::pull('msg')}}</div>
        @endif
</div>
  <div class="row" style="margin-top: 5%;">


   <div class="col-lg-4">
      <a href="{{url('supervisor/add_idea_supervisor')}}">
      <div class="mind text-center">
          <i class="far fa-edit faa"></i><br><br>
          <label class="lab">Add Project Idea</label>
      </div>
      </a>
    </div>
 <div class="col-lg-4">
      <a href="{{url('supervisor/view_faculty_list')}}">
      <div class="mind text-center">
          <i class="fa fa-user-tie faa"></i><br><br>
          <label class="lab">Veiw Faculty</label>
      </div>
      </a>
    </div>
 <div class="col-lg-4">
      <a href="{{url('supervisor/view_students_list')}}">
      <div class="mind text-center">
          <i class="fa fa-users faa"></i><br><br>
          <label class="lab">Veiw Students</label>
      </div>
      </a>
    </div>

  </div>
  <div class="row mt-4 mb-5">
    <div class="col-lg-4">
      <a href="{{url('supervisor/view_project_ideas')}}">
      <div class="mind text-center">
          <i class="fa fa-file-alt faa"></i><br><br>
          <label class="lab">View Project Ideas</label>
      </div>
      </a>
    </div>
    <div class="col-lg-4">
      <a href="{{url('supervisor/view_student_request')}}">
      <div class="mind text-center">
          <i class="fas fa-user-clock faa"></i><br><br>
          <label class="lab">View Student Requests</label>
      </div>
      </a>
    </div>
    <div class="col-lg-4">
      <a href="{{url('supervisor/view_my_students')}}">
      <div class="mind text-center">
          <i class="fas fa-user-check faa"></i><br><br>
          <label class="lab">View Supervised Groups</label>
      </div>
      </a>
    </div>
  </div>

  <div class="row mt-4 mb-5">
  
    <div class="col-lg-4">
        <a href="{{url('supervisor/quries_list')}}">
      <div class="mind text-center">
          <i class="far fa-comments faa"></i><br><br>
          <label class="lab">Quries</label>
      </div>
      </a>
    </div>

    <div class="col-lg-4">
      <a href="{{url('CPM/view_calendar')}}">
      <div class="mind text-center">
          <i class="faa fa fa-calendar"></i><br><br>
          <label class="lab">Capston Calendar</label>
      </div>
      </a>
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