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
    <title>CPM - Accepted Groups</title>

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">
<style type="text/css">
  .btn1{
    width: 45%;
  }
</style>
  </head>
  <body style="background-color: #e8ebee;">   





  @include('layouts.header')
<div id="main">  


<div class="container pl-5 pr-5">
  <div class="row">
    <div class="col-12">
<div class="container mt-3">

        @if(Session::has('msg_delete'))
                <div class="alert alert-success"> {{Session::pull('msg_delete')}}</div>
        @endif

    </div>
  <div style="margin-top: 5%;">
    <h2>Students Group List</h2><br>
    <div class="row">
      <div class="col-6">
     <input class="form-control search" id="myInput" type="text" placeholder="Search..">
     
     </div>
      <div class="col-6">
     
      <?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>

     <a href="{{url('/cdashboard/view_students_list')}}" style="float: right;"><button class="btn btn-info"><i class="fa fa-list">&nbsp&nbsp</i>View Student List</button></a>
      
            
   <?php } ?>
   </div>
    </div>
    <br>
<?php if (count($groups) > 0) {  ?>

     <?php $i =1; ?>
      <?php foreach ($groups as $key => $row) {?>
 <table class="table table_list table-bordered">
  <thead class="tdark">
    <tr><?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>
    <?php } ?>
      <th scope="col">#</th>
      <th scope="col">Group Id</th>
           <th>Students</th>
      <th scope="col">Project Title</th>
      <th scope="col">Details</th>
      <th scope="col">Remove</th>
   
    </tr>
  </thead>
  <tbody id="myTable">
   
        
    <tr>

      <th scope="row"><?php echo $i ?></th>
      <td>{{$row->group_id}}</td>
         
         <td>
         <?php

         $k=1; 
      foreach ($name[$key] as $key1) {?>
          <span style=" <?php if ($is_manager[$i-1][$k-1] ?? '' == 1){ ?>
          font-weight: bold;
        <?php } ?>">
           <?php echo $k.":&nbsp ".$key1."<br>"  ;?>
        </span>  
          <?php $k=$k+1;
      } ?> 
          </td>

      <td>{{$title[$key]}}</td>

           
  

         
    
      
      
       
        <td>
        <a href="{{ route('supervised.group.details/', $row->group_id) }}" name="details" class=""><i class="fa fa-list" style="color:#17a2b8"></i></td>
      <td><a href="{{ route('remove.from.supervison/', $row->group_id) }}" onclick="return  confirm('do you want to remove {{$row->student_name}} from your supervison..')" name="delete" class=""><i class="fa fa-trash-alt" style="color:#ff2828"></i></a></td>
       
    </tr>
         


</form>
  </tbody>
</table>

    <?php $i++;

    } }else{ ?>
     <table>
       <td>No data Found</td>
     </table>
   <?php } ?>

  </div>
  </div>
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