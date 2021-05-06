<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   <title>CPM - Presentations</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

    <style type="text/css">
      
      #example_filter{
        display: none;
      }
      #example_paginate{
        margin-right: -24%;
      }

    </style>
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
<div class="row mt-5">

  <div class="col-12" style="padding-right: 35px; padding-left: 35px;">

  <div class="container-fluid">
    @if(Session::has('prst'))
                <div class="alert alert-danger"> {{Session::pull('prst')}}</div>
        @endif
   
<h2>Scheduled Presentation: {{$presentation_name}}</h2><br>

    <div class="row">
      <div class="col-12 text-right mb-4"><?php  if (Session::get('key') == 'coodinator'){ ?>
          
          <!-- <a href="{{url('/presentations')}}" style=" color: white; text-decoration: none;"><button class="btn btn-link" style="background-color: #FFA630 !important; color: white; text-decoration: none;">Re-Schedual Presentations</button></a>
           -->


          <button class="btn btn-link" style="background-color: #FFA630 !important; color: white; text-decoration: none;" data-toggle="modal" data-target="#exampleModal">Schedual a new Presentations</button>

          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="container pl-5 pr-5" action="{{url('/presentations')}}" method="POST" enctype="multipart/form-data">
  @csrf
 


  <div class="form-group ">
        <label for="text" class="inplabel">Presesntation Name</label> 
      <input id="presentation_name" name="presentation_name" type="text" class="form-control {{ ($errors->any() && $errors->first('presentation_name')) ? 'is-invalid' : '' }}" required="">
       @if($errors->any())  
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('presentation_name')}} </p>
  @endif
  </div>

    <div class="form-group ">
        <label for="text" class="inplabel">Start Date</label> 
      <input id="start_date" name="start_date" type="date" class="form-control {{ ($errors->any() && $errors->first('start_date')) ? 'is-invalid' : '' }}" required="">
       @if($errors->any())  
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('start_date')}} </p>
  @endif
  </div>
  <div class="form-group ">
        <label for="text" class="inplabel">End Date</label> 
      <input id="end_date" name="end_date" type="date" class="form-control {{ ($errors->any() && $errors->first('end_date')) ? 'is-invalid' : '' }}" required="">
       @if($errors->any())  
    <p class="invalid-feedback" style="color: red;"> {{$errors->first('end_date')}} </p>
  @endif
  </div>

  <input type="hidden" name="current_date" value="<?php echo date('Y-m-d');?>">
     
 
  <div class="form-group ">
    <div class="">
      <button name="submit" type="submit" class="btn btn-light">Re-Schedual Presentations</button>

    </div>
  </div>
</form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>

</div>

       <?php } ?></div>

   
<table class="table table_list table-bordered dt-responsive" id="example" style="width: 112.5% !important;">
  <thead class="tdark">
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Timings</th>
            <th scope="col">Monday</th>
            <th scope="col">Tuesday</th>
            <th scope="col">Wednesday</th>
            <th scope="col">Thursday</th>
            <th scope="col">Friday</th>
            <th scope="col">Saturday</th>
          </tr>
        </thead>
        <tbody>

          <?php if ($presentation_name == "No Presentation Schecduled Yet"){ ?>
            
          <?php }else{   ?>
          @foreach ($prese as $key)
          <tr>
            <th scope="row">{{$key['date']}}</th>
            <td>{{$key['time']}}</td>
            
            <td>
              <?php if ($key['mon'] != '-'): ?>
                
           Group - {{$key['mon']}}
              <?php endif ?>
          </td>
            
            <td>
              <?php if ($key['tues'] != '-'): ?>
                
           Group - {{$key['tues']}}
              <?php endif ?>
          </td>
            
            <td>
              <?php if ($key['wed'] != '-'): ?>
                
           Group - {{$key['wed']}}
              <?php endif ?>
          </td>
            
            <td>
              <?php if ($key['thurs'] != '-'): ?>
                
           Group - {{$key['thurs']}}
              <?php endif ?>
          </td>
            
            <td>
              <?php if ($key['fri'] != '-'): ?>
                
           Group - {{$key['fri']}}
              <?php endif ?>
          </td>
            
            <td>
              <?php if ($key['sat'] != '-'): ?>
                
           Group - {{$key['sat']}}
              <?php endif ?>
          </td>
          </
          tr>
          @endforeach
        <?php } ?>
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


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script>
  $(document).ready(function() {
      var table = $('#example').DataTable( {
          lengthChange: false,
          buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
      } );
   
      table.buttons().container()
          .appendTo( '#example_wrapper .col-md-6:eq(0)' );
  } );
     </script>
  </body>
</html>