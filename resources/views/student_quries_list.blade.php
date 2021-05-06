<?php session_start(); ?>
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

       

        @if(Session::has('mess_d'))
                <div class="alert alert-danger"> {{Session::pull('mess_d')}}</div>
                
        @endif        
      
         @if(Session::has('mess'))
                <div class="alert alert-success"> {{Session::pull('mess')}}</div>
                
        @endif     
                 @if(Session::has('msg'))
                <div class="alert alert-success"> {{Session::pull('msg')}}</div>
                
        @endif     
        
               
    </div>
  <div style="margin-top: 5%;">
    <h2>Quries</h2><br>
      <?php if ($gg == 1 && $ss == 1){  ?>
        <div class="row">
      <div class="col-6">
     <input class="form-control search" id="myInput" type="text" placeholder="Search..">
     <br>
   </div>
     <div class="col-6">
     <a href="{{url('/student/ask_query')}}" style="float: right;"><button class="btn btn-info"><i class="far fa-comment-dots">&nbsp&nbsp</i>Ask Query</button></a>
   </div>
   <?php } ?>
 </div>
 <div class="row">
   <div class="col-12">
    <?php if ($gg == 1){ ?>
    <?php if ($ss == 1){ ?>
      
     <table class="table table_list">
  <thead>
        <tr>
          <th>From</th>
          <th>Content</th>
          <th style="margin-right: 16% !important; float: right">Time</th>
        </tr>
      </tbody>
      <?php $i =0; 
      foreach ($quries as $row) { ?>

       <tbody id="myTable">  
        <tr>
          <td style=" 

          <?php if ($name[$i] == 'Me') { ?>
            font-weight: 30px;
          <?php }else{ 
            if (count($notif[$i]) > 0) { ?>
              font-weight: bold;
          <?php }else{

            echo "font-weight: 30px";

          } } ?>

         ">{{$name[$i]}} :</td>


           <td style="width:66%;"> <div style="   

        <?php if ($name[$i] == 'Me') { ?>
            font-weight: 30px;
          <?php }else{ 
            if (count( $notif[$i]) > 0) { ?>
              font-weight: bold;
          <?php }else{
            echo "font-weight: 30px"; 
          }} ?> 

          ">  
              <!-- {{$row->askquery}} -->
              
              <?php if ($name[$i] == 'Me'){ ?>
          <a href="{{ route('stquery.details/', $row->id) }}" style="text-decoration: none; color:black;">
          <?php }else{ ?>
            <a href="{{ route('suquery.details/', $row->id) }}" style="text-decoration: none; color:black;">
            <?php } ?>
          {{substr($row->askquery,0,50)}} <?php if (strlen($row->askquery) > 50) {
            echo ".......";
          } ?> 
          </a>
</div>
            
          <?php
          $j=0;
           foreach ($quries2 as $key){ ?>
          <?php if ($row->id == $key->reply_of){ ?>
            <table class="mt-4" style="width: 100%; border-left: 2px solid #FFA630; border-right: 2px solid #FFA630;">
              <tbody>
                <tr>

                  <td style="">
                     <div style="
                     <?php if (count( $notif1[$j]) > 0) {
                       echo "font-weight: bold";
                     }else{ echo "font-weight: 30px"; } ?>
                      ">
                    <p>Supervisor :</p>

                    <!-- {{$key->askquery}} -->
                    
                   <a href="{{ route('suquery.details/', $key->id) }}" style="text-decoration: none; color:black;">
                    {{substr($key->askquery,0,50)}} <?php if (strlen($key->askquery) > 50) {
                      echo ".......";
                    } ?> 
                  </a>


</div><span style="float: right; font-size: 11px;">
                    <?php echo date('d  M Y | h:i A', strtotime($key->created_at)); ?></span></td>
                </tr>
              </tbody>
            </table>
          <?php } ?>
          <?php $j++; } ?>
        </td>

          <td class="text-right"><small><?php echo date('d  M Y | h:i A', strtotime($row->created_at)); ?></small></td>
            <?php if($name[$i] == 'Me'){ ?>
               
               <td><a onclick="return  confirm('Do you want to delete this message ?')" href="{{ route('delete.query/', $row->id) }}" ><i class="fa fa-trash-alt" style="color:#ff2828"></i></a></td>
              
            <?php } ?>
        </tr>
       </tbody>
     <?php $i++; } ?>
     </table>

   <?php }else{?>
      <table>You don't have a Supervisor</table>
    <?php } ?>

   <?php }else{?>
      <table>You are Not in any Group</table>
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
   

 <script type="text/javascript">

setInterval(function(){ 

  $.ajax({
  url: "{{url('count_snot')}}",
  cache: false,
  success: function(html){
    $(".snot").html(html);
  }
});

 }, 1000);

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

 }, 1000);

    </script>


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