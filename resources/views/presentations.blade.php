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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="{{asset('asset/css/main.css')}}">

  </head>
  <body style="background-color: #e8ebee;">   


  @include('layouts.header')  
<div id="main">  

<div class="container-fluid">
<div class="container-fluid mt-3">
        @if(Session::has('msg'))
                <div class="alert alert-success"> {{Session::pull('msg')}}</div>       
        @endif        
</div>
<div class="row mt-5">

  <div class="col-12" style="padding-right: 35px; padding-left: 35px;">
    

<div class="container-fluid">
   
<h2>{{$presentation_name}}</h2><br>

 <div class="row">
      <div class="col-10"></div>
      <div class="col-2 text-center mb-1">
         
          <button class="btn btn-link" style="background-color: #fd7e14 !important; color: white; text-decoration: none;" data-toggle="modal" data-target="#exampleModal">Re-Schedual Presentations</button>
</div>
</div>
</div>
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
      <button name="submit" type="submit" class="btn btn-light float-right">Re-Schedual Presentations</button>

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
     <form action="{{url('save_present')}}" method="POST" enctype="multipart/form-data">
  @csrf
   <div class="row">
      <div class="col-10"></div>
      <div class="col-2 text-center mb-1">


        <input type="submit" value="Save Presentations" class="btn btn-link "  style="background-color: #FFA630 !important; color: white; text-decoration: none;">
       
        <input type="hidden" name="presentation_name" value="{{$presentation_name}}">
      </div>
<table class="table table_list table-bordered">
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
          @foreach ($df as $key)
          <tr>
            <th scope="row"><input type="hidden" name="date[]" value="{{$key[3]}}">{{$key[3]}}</th>
            <td>
             @if($key[1]=="Lecture 1")
                <input type="hidden" name="timmings[]" value="08:00 - 09:30">08:00 - 09:30
                @elseif($key[1]=="Lecture 2")
                <input type="hidden" name="timmings[]" value="9:30 - 11:00"> 9:30 - 11:00
                @elseif($key[1]=="Lecture 3")
                <input type="hidden" name="timmings[]" value="11:00 - 12:30"> 11:00 - 12:30
                @elseif($key[1]=="Lecture 4")
                <input type="hidden" name="timmings[]" value="12:30 - 14:00"> 12:30 - 14:00
                @elseif($key[1]=="Lecture 5")
                <input type="hidden" name="timmings[]" value="14:15 - 15:45"> 14:15 - 15:45
                @elseif($key[1]=="Lecture 6")
                <input type="hidden" name="timmings[]" value="15:45 - 17:15"> 15:45 - 17:15
              @endif

            </td>

            @if($key[2]=="Monday")
            <td><input type="hidden" name="mon[]" value="{{$key[0]}}">Group - {{$key[0]}}
            </td>

            @else
            <td><input type="hidden" name="mon[]" value="-"> - </td>
            @endif

            @if($key[2]=="Tuesday")
            <td><input type="hidden" name="tues[]" value="{{$key[0]}}">Group - {{$key[0]}}
            </td>
            
            @else
            <td><input type="hidden" name="tues[]" value="-"> - </td>
            @endif

            @if($key[2]=="Wednesday")
            <td><input type="hidden" name="wed[]" value="{{$key[0]}}">Group - {{$key[0]}}
            </td>

            @else
            <td><input type="hidden" name="wed[]" value="-"> - </td>
            @endif

            @if($key[2]=="Thursday")
            <td><input type="hidden" name="thurs[]" value="{{$key[0]}}">Group - {{$key[0]}}
           </td>
            
            @else
            <td><input type="hidden" name="thurs[]" value="-"> - </td>
            @endif

            @if($key[2]=="Friday")
            <td><input type="hidden" name="fri[]" value="{{$key[0]}}">Group - {{$key[0]}}</td>
            @else
            <td><input type="hidden" name="fri[]" value="-"> - </td>
            @endif
            @if($key[2]=="Saturday")
            <td><input type="hidden" name="sat[]" value="{{$key[0]}}">Group - {{$key[0]}}</td>

            @else
            <td><input type="hidden" name="sat[]" value="-"> - </td>
            @endif

          </tr>
          @endforeach
        </tbody>
      </table>
       

    </div>
  </form> 
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