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
    <title>CPM - Quries</title>

    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   





  @include('layouts.header')
<div id="main">  


<div class="container pl-5 pr-5">
    <div class="container mt-3">
      
        @if(Session::has('mess'))
                <div class="alert alert-success"> {{Session::pull('mess')}}</div>
                
        @endif  
        @if(Session::has('msg'))
                <div class="alert alert-success"> {{Session::pull('msg')}}</div>
                
        @endif 

    </div>
  <div style="margin-top: 5%;">
    <h2>Quries</h2><br>
      <?php if ($ss == 1){  ?>
        <div class="row">
      <div class="col-6">
     <input class="form-control search" id="myInput" type="text" placeholder="Search..">
     <br>
   </div>
     <div class="col-6">
     <a href="{{url('/supervisor/ask_query')}}" style="float: right;"><button class="btn btn-info"><i class="far fa-comment-dots">&nbsp&nbsp</i>Post Query</button></a>
   </div>
   <?php } ?>
 </div>
 <div class="row">
   <div class="col-12">
    <?php if ($ss == 1){ ?>
    <?php if (count($quries) != 0){ ?>
      
     <table class="table table_list">
  <thead>
        <tr>
          <th>From</th>
          <th>Query</th>
          <th style="float: right; margin-right: 22%">Time</th>
          <th></th>
          
        </tr>
      </tbody>
      <?php $i =0; 
      foreach ($quries as $row) { ?>

       <tbody id="myTable">  
        <tr>

          
         <td style=" 
          <?php if ($notif[$i]->notif ?? '' == 0){ ?>
            font-weight: 30px;
          <?php }else{ ?>
             <?php if ($name[$i] == 'Me') { ?>
            font-weight: 20px !important;
        <?php }else{ ?>
            font-weight: bolder;
          <?php }}?>
         ">{{$name[$i]}} :</td>


           <td style="  width:66%;  
          <?php if ($notif[$i]->notif ?? '' == 0){ ?>
            font-weight: 30px;
          <?php }else{ ?>
            <?php if ($name[$i] == 'Me') { ?>
            font-weight: 20px !important;
        <?php }else{ ?>
            font-weight: bolder;
          <?php }} ?>
          ">
          <!-- {{$row->askquery}} -->
          <?php if ($name[$i] == 'Me'){ ?>
          <a href="{{ route('suquery.details/', $row->id) }}" style="text-decoration: none; color:black;">
          <?php }else{ ?>
            <a href="{{ route('stquery.details/', $row->id) }}" style="text-decoration: none; color:black;">
            <?php } ?>
          {{substr($row->askquery,0,50)}} <?php if (strlen($row->askquery) > 50) {
            echo ".......";
          } ?> 
          </a>


          <?php
          $j=0;
           foreach ($quries2 as $key){ ?>
          <?php if ($row->id == $key->reply_of){ ?>
            <table class="mt-4" style="width: 100%; border-left: 2px solid #FFA630; border-right: 2px solid #FFA630;">
              <tbody>
                <tr>

                  <td style="">
                     
                    <p>Me :</p>
                    <!-- {{$key->askquery}} -->
                    
                    <a href="{{ route('suquery.details/', $key->id) }}" style="text-decoration: none; color:black;">
                    {{substr($key->askquery,0,50)}} <?php if (strlen($key->askquery) > 50) {
                      echo ".......";
                    } ?> 
                  </a>

                    <span style="float: right; font-size: 11px;">
                    <?php echo date('d  M Y | h:i A', strtotime($key->created_at)); ?><span style="margin-left: 5px; font-size: 15px">
                       <a onclick="return  confirm('Do you want to delete this message ?')"  href="{{ route('delete.query/', $key->id) }}"><i class="fa fa-trash-alt" style="color:#ff2828"></i></a>
                    </span></span></td>
                    
                </tr>
              </tbody>
            </table>
          <?php } ?>
          <?php $j++; } ?>

        </td>

<style type="text/css">
  #maind{
    min-width: 50px !important;
    margin-right:  -100%;
  }
  

</style>
          <td class="text-right"><small>
            <?php echo date('d  M Y | h:i A', strtotime($row->created_at)); ?>
            </small></td>
          <td style="width:5%;">
            
              <div class="dropdown">
                <i class="fa fa-ellipsis-h"></i>
                <div class="dropdown-content text-right" id="maind">
                 
            <?php if ($name[$i] != 'Me'){ ?>
                  <!--  <a href="{{ route('query.reply/', $row->id) }}" class="dda" data-toggle="tooltip" data-placement="top" title="Reply"><i style="color:#17a2b8;" class="fa fa-reply"></i></a> -->
            <?php }if ($name[$i] == 'Me') { ?>

                   <a href="{{ route('delete.query/', $row->id) }}"><i class="fa fa-trash-alt" style="color:#ff2828"></i></a>
                 <?php } ?>
                   <a href="{{ route('supervised.group.details/', $row->group_id) }}" class="dda" data-toggle="tooltip" data-placement="top" title="Group Details"><i style="color:#007bff;" class="fa fa-list"></i></a>



                </div>
              </div>
           </td>
        </tr>
       </tbody>
     <?php $i++; } ?>
     </table>

   <?php }else{ echo "<table>No Quries yet</table>";}}else{?>
      <table>You don't have a Group under your Supervison</table>
    <?php } ?>
     </div>
      
    </div>
 <br>
   
    
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