<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>CPM - Coodinator Dashboard</title>

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #fff;">   

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
  <div class="mb-5">
  <div class="row" style="margin-top: 5%;">


    <div class="col-lg-4">
      <a href="{{url('cdashboard/add_student')}}">
      <div class="mind text-center">
          <i class="fa fa-user-plus faa ml-4"></i><br><br>
          <label class="lab">Add Student</label>
      </div>
      </a>
    </div>
 <div class="col-lg-4">
      <a href="{{url('cdashboard/add_faculty')}}">
      <div class="mind text-center">
          <i class="fa fa-user-plus faa ml-3"></i><br><br>
          <label class="lab">Add Faculty Member</label>
      </div>
      </a>
    </div>
     <div class="col-lg-4">
      <a href="{{url('cdashboard/view_students_groups')}}">
      <div class="mind text-center">
          <i class="fa fa-users faa"></i><br><br>
          <label class="lab">Veiw Students Groups</label>
      </div>
      </a>
    </div>

  </div>
  <div style="margin-top: 5%;">
  <div class="row">


    <div class="col-lg-4">
      <a href="{{url('cdashboard/view_students_list')}}">
      <div class="mind text-center">
          <i class="fa fa-list faa"></i><br><br>
          <label class="lab">Veiw Students</label>
      </div>
      </a>
    </div>
 <div class="col-lg-4">
      <a href="{{url('cdashboard/view_supervisors_list')}}">
      <div class="mind text-center">
          <i class="fa fa-list faa"></i><br><br>
          <label class="lab">Veiw Supervisors</label>
      </div>
      </a>
    </div>
 <div class="col-lg-4">
      <a href="{{url('cdashboard/view_faculty_list')}}">
      <div class="mind text-center">
          <i class="fa fa-list faa"></i><br><br>
          <label class="lab">Veiw Faculty Members</label>
      </div>
      </a>
    </div>

  </div>
  </div>


   <div style="margin-top: 5%;">
  <div class="row">


    <div class="col-lg-4">
      <a href="{{url('CPM/view_calendar')}}">
      <div class="mind text-center">
          <i class="faa fa fa-calendar"></i><br><br>
          <label class="lab">Capston Calendar</label>
      </div>
      </a>
    </div>

    <div class="col-lg-4">
      <a href="{{url('view_scheduled_presentations')}}">
      <div class="mind text-center">
          <i class="faa fa fa-calendar-alt"></i><br><br>
          <label class="lab">Presentations</label>
      </div>
      </a>
    </div>


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