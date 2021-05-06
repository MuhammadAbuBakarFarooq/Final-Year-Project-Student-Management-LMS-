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
    <title>CPM - Students Requests</title>

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   





  @include('layouts.header')
<div id="main">  

<div class="container pl-5 pr-5">
  <div class="row">
    <div class="col-12">

<div class="container mt-3">
        @if(Session::has('msg'))
                <div class="alert alert-success">{{Session::pull('msg')}}</div>       
        @endif          
</div>


  </div>
</div>
</div>

<style type="text/css">
  .pills{
    color: #FFA630; 
  }
  .pills:hover{
    color: #FFA630; 
  }
  .active{
    background-color: #FFA630 !important;
    color: #fff !important;
  }

</style>

<section class="container py-4 mt-2">
    <div class="row container">
        <div class="col-md-12">
            <h2>Student Requests</h2>
            <ul id="tabs" class="nav nav-tabs mt-3">
                <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab" class="nav-link small text-uppercase pills active">Pending Request</a></li>
                <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link small text-uppercase pills">Accepted</a></li>
                <li class="nav-item"><a href="" data-target="#messages1" data-toggle="tab" class="nav-link small text-uppercase pills">Rejected</a></li>
            </ul>
            <br>
              <div class="row">
      <div class="col-6">
     <input class="form-control search" id="myInput" type="text" placeholder="Search..">
     
     </div>
      <div class="col-6">

   </div>
    </div>
    <br>
            <div id="tabsContent" class="tab-content">
                <div id="profile1" class="tab-pane fade active show">
                    <div class="row pb-2" style="background-color: #e8ebee; color: black;">
                        <div class="col-12">
    <table class="table table_list table-bordered">
  <thead class="tdark">
    <tr><?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
    <?php } ?>
      <th scope="col">#</th>
      <th scope="col">Group Id</th>
      <th scope="col">Title</th>
      <th scope="col">View Details</th>
      <?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
      <th scope="col">Accept</th>
      <th scope="col">Reject</th>
    <?php } ?>
    </tr>
  </thead>
  <tbody id="myTable">
     @if($requested_ideas)
     <?php $i =1; ?>
      @foreach($requested_ideas as $row)
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td>{{$row->group_id}}</td>
      <td>{{$row->title}}</td>

      
      <td><a href="{{ route('idea.details.student/', $row->id) }}" name="details" class=""><i class="fa fa-list" style="color: #17a2b8;"></i></a></td>
       <?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
      
       <td><a href="{{ route('accept.idea/', [$row->id,$row->from]) }}" name="edit" class="

<?php if( Session::get('user_id') != $row->supervisor_id){ ?>
          disabled
        <?php } ?>
        "><i class="fa fa-check"></i></a></td>

        <td><a href="{{ route('reject.idea/', $row->id) }}" onclick="return  confirm('Do you want to reject this request')" name="delete" class="
        <?php if( Session::get('user_id') != $row->supervisor_id){ ?>
          disabled
        <?php } ?>
        "><i class="fa fa-times" style="color:#ff2828"></i></a></td>
       <?php } ?>

       

    </tr>
    <?php $i =$i+1; ?>
     @endforeach
     <?php if (count($requested_ideas) == 0): ?>
       <table>
         <td>
           No Request Yet
         </td>
       </table>
     <?php endif ?>
      @else
        <tr> Records not found </tr>
      @endif
  
</form>
  </tbody>
</table>
                        </div>
                        
                    </div>
                </div>
                <div id="home1" class="tab-pane fade">
                    <div class="list-group" style="background-color: #e8ebee; color: black;"> 
                          <table class="table table_list table-bordered">
  <thead class="tdark">
    <tr><?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
    <?php } ?>
      <th scope="col">#</th>
      <th scope="col">Group Id</th>
      <th scope="col">Title</th>
      <th scope="col">View Details</th>
      <?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
     
    <?php } ?>
    </tr>
  </thead>
  <tbody id="myTable">
     @if($requested_ideas3)
     <?php $i =1; ?>
      @foreach($requested_ideas3 as $row)
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td>{{$row->group_id}}</td>
      <td>{{$row->title}}</td>

      
      <td><a href="{{ route('idea.details.student/', $row->id) }}" name="details" class=""><i class="fa fa-list" style="color: #17a2b8;"></i></a></td>
      

       

    </tr>
    <?php $i =$i+1; ?>
     @endforeach
     <?php if (count($requested_ideas3) == 0): ?>
       <table>
         <td>
           No Request Yet
         </td>
       </table>
     <?php endif ?>
      @else
        <tr> Records not found </tr>
      @endif
  
</form>
  </tbody>
</table>                      
                     </div>
                </div>
                <div id="messages1" class="tab-pane fade">
                    <div class="list-group" style="background-color: #e8ebee; color: black;"> 
                          <table class="table table_list table-bordered">
  <thead class="tdark">
    <tr><?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
    <?php } ?>
      <th scope="col">#</th>
      <th scope="col">Group Id</th>
      <th scope="col">Title</th>
      <th scope="col">View Details</th>
      <?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
     
    <?php } ?>
    </tr>
  </thead>
  <tbody id="myTable">
     @if($requested_ideas2)
     <?php $i =1; ?>
      @foreach($requested_ideas2 as $row)
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td>{{$row->group_id}}</td>
      <td>{{$row->title}}</td>

      
      <td><a href="{{ route('idea.details.student/', $row->id) }}" name="details" class=""><i class="fa fa-list" style="color: #17a2b8;"></i></a></td>
       

       

    </tr>
    <?php $i =$i+1; ?>
     @endforeach
     <?php if (count($requested_ideas2) == 0): ?>
       <table>
         <td>
           No Request Yet
         </td>
       </table>
     <?php endif ?>
      @else
        <tr> Records not found </tr>
      @endif
  
</form>
  </tbody>
</table>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>



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