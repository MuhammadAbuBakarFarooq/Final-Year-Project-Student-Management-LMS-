<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>CPM - Calendar</title>

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   





  @include('layouts.header')
<div id="main">  


<div class="container pl-5 pr-5">
    <div class="container mt-3">
        @if(Session::has('msg'))
                <div class="alert alert-success"> {{Session::pull('msg')}}</div>
        @endif
    </div>
  <div style="margin-top: 5%;">
    <h2>Capstone Calendar</h2><br>
        <div class="row">
      <div class="col-6">
     <!-- <input class="form-control search" id="myInput" type="text" placeholder="Search.."> -->
     <?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>
     <a href="{{url('/cdashboard/add_calender')}}" style="float: left; margin-bottom: -50%;"><button class="btn btn-info"><i class="fa fa-plus">&nbsp&nbsp</i>Add Event</button></a>
     
   <?php } ?>
     </div>
      <div class="col-6">
      
   </div>
    </div>
 <br>
   

   <br>
    <table class="table table_list table-bordered">
  <thead class="tdark">
    <tr>
      <th scope="col">#</th>
      <!-- <th scope="col">Date</th> -->
      <th scope="col">Week</th>
      <th scope="col">Event</th>
      <?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>
      <th scope="col">Action</th>
    <?php } ?>
    </tr>
  </thead>
  <tbody id="myTable">
     @if($events)
     <?php $i =1; ?>
      @foreach($events as $row)
    <tr>
      
      <th scope="row"><?php echo $i ?></th>
      <!-- <td>{{$row->start_date}} | {{$row->end_date}}</td> -->
      <td>{{$row->week}}</td>
      <td>{{$row->title}}</td>
       <?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>
      <td><a href="{{ route('event.delete/', $row->id) }}" onclick="return  confirm('do you want to delete {{$row->title}}')" name="delete" class="faaf"><i class="fa fa-trash-alt" style="color:#ff2828"></i>&nbsp&nbsp&nbsp

       <a href="{{ route('event.edit/', $row->id) }}" name="edit" class="faaf"><i class="far fa-edit" style="color:#17a2b8"></i></a></td>
       <?php } ?>
    </tr>
    <?php $i =$i+1; ?>
     @endforeach
      @else
        <tr> Records not found </tr>
      @endif
  
</form>
  </tbody>
</table>
    


 
</table>
  </div>
</div>
</div>



<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
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