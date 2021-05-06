<?php 
$c_date = date('d F, Y '); 
$c_time = date("h:i");
?>

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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   



  @include('layouts.header')  
<div id="main">  

<div class="container-fluid">
<div class="container-fluid" style="margin-top: 3%;">
        @if(Session::has('msg'))
                <div class="alert alert-success"> {{Session::pull('msg')}}</div>       
        @endif        
</div>

<div class="container-fluid" style="margin-top: 3%;">
        @if(Session::has('msg1'))
                <div class="alert alert-danger"> {{Session::pull('msg1')}}</div>       
        @endif        
</div>
<div class="row mt-5">

  <div class="col-12" style="padding-right: 35px; padding-left: 35px;">

  <div class="container-fluid">
   
<h2>Presentations Feedbacks: {{$presentation_name}}</h2><br>


       </div>
<table class="table table_list table-bordered">
  <thead class="tdark">
          <tr>
            <th scope="col">Group Id</th>
            <th scope="col">Project Title</th>
            <th scope="col">Date</th>
            <th scope="col">Day</th>
            <th scope="col">Timings</th>
            <th scope="col">Group Details</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach ($prese as $key)
          <tr>


            <th scope="row">
              <?php if ($key['mon'] != '-') { ?>
                {{$key['mon']}}
                <?php $group_id = $key['mon']; ?>
              <?php }elseif ($key['tues'] != '-') { ?>
                {{$key['tues']}}
                <?php $group_id = $key['tues']; ?>
              <?php }elseif ($key['wed'] != '-') { ?>
                {{$key['wed']}}
                <?php $group_id = $key['wed']; ?>
              <?php }elseif ($key['thurs'] != '-') { ?>
                {{$key['thurs']}}
                <?php $group_id = $key['thurs']; ?>
              <?php }elseif ($key['fri'] != '-') { ?>
                {{$key['fri']}}
                <?php $group_id = $key['fri']; ?>
              <?php }elseif ($key['sat'] != '-') { ?>
                {{$key['sat']}}
                <?php $group_id = $key['sat']; ?>
              <?php } ?>
            </th>
            <td>
              {{$p_title[$i]}}
            </td>
            <td >{{$key['date']}}</td>
            

             <td>
              <?php if ($key['mon'] != '-') { ?>
                Monday
              <?php }elseif ($key['tues'] != '-') { ?>
                Tuesday
              <?php }elseif ($key['wed'] != '-') { ?>
                Wednesday
              <?php }elseif ($key['thurs'] != '-') { ?>
                Thursday
              <?php }elseif ($key['fri'] != '-') { ?>
                Friday
              <?php }elseif ($key['sat'] != '-') { ?>
                Saturday
              <?php } ?>
            </td>
            <td>{{$key['time']}}</td>
            
            <td><a class="dropdown-item" href="{{ route('student.group.details/', $group_id) }}"><i class="fa fa-list" style="color: #fd7e14;"></i></a></td>
            <td>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #fd7e14; border:none;">
                  Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  

                  <?php if (Session::get('key') == 'supervisor' || Session::get('key') == 'faculty'): ?>
                  <a class="dropdown-item" href="{{ route('give.feedback/', $group_id) }}">Give Feedback</a> 
                  <?php endif ?>
                  <a class="dropdown-item" href="{{ route('view.feedback/', $group_id) }}">View Feedback</a>
                 
                </div>
              </div>
            </td>
          </tr>
          <?php $i++; ?>
          @endforeach
        </tbody>
      </table>
       

    </div>
  </div>
  

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