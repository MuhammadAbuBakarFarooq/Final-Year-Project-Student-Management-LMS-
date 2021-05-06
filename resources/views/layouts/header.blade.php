<style type="text/css">
  .log:active{
    background-color: #fff;
    color-rendering: #FFA630;
  }
</style>
<style type="text/css">
      @charset "UTF-8";
/*
4px:  $spacer * 0.25
8px:  $spacer * 0.5
16px: $spacer
20px: $spacer * 1.25
24px: $spacer * 1.5
*/
html,
body {
  zoom:.9;
  overflow-x: hidden;
  font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
  color: #333;
  background-color: #eeeded;
  height: 100%;
}

.sidebar-toggler {
  padding: 0.25rem 0.75rem;
  font-size: 1.25rem;
  line-height: 1;
  background-color: transparent;
  border: 1px solid transparent;
  border-radius: 0.25rem;
  color: rgba(0, 0, 0, 0.5);
  border-color: rgba(0, 0, 0, 0.1);
}
.sidebar-toggler .sidebar-toggler-icon {
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  vertical-align: middle;
  content: "";
  background: no-repeat center center;
  background-size: 100% 100%;
  background-image: url("data:image/svg+xml;charset=utf8,<svg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'><path stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/></svg>");
  cursor: pointer;
}

.sidebar {
  position: relative;
  width: 100%;
  z-index: 99;
}
.sidebar .sidebar-user .category-content {
  padding: 1rem;
  text-align: center;
  color: #fff;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}
.sidebar .sidebar-user .category-content:first-child {
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}
.sidebar .sidebar-user .category-content:last-child {
  border-top-right-radius: 0.25rem;
  border-top-left-radius: 0.25rem;
}
.sidebar .sidebar-content {
  position: relative;
  border-radius: 0.25rem;
  margin-bottom: 1.25rem;
}
.sidebar .category-title {
  position: relative;
  margin: 0;
  padding: 12px 20px;
  padding-right: 46px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}
.sidebar.sidebar-default .category-title {
  border-bottom-color: #dee2e6;
}
.sidebar.sidebar-default .category-title > span {
  display: block;
  text-transform: uppercase;
  font-weight: 500;
  font-size: 0.75rem;
}
.sidebar.sidebar-default .category-content .nav li > a {
  color: #333;
}
.sidebar.sidebar-default .category-content .nav li > a.active, .sidebar.sidebar-default .category-content .nav li > a[aria-expanded=true], .sidebar.sidebar-default .category-content .nav li > a:hover, .sidebar.sidebar-default .category-content .nav li > a:focus {
  background-color: #f4f4f4;
}
.sidebar .category-content {
  position: relative;
}
.sidebar .category-content .nav {
  position: relative;
  margin: 0;
  padding: 0.5rem 0;
}
.sidebar .category-content .nav li {
  position: relative;
  list-style: none;
}
.sidebar .category-content .nav li > a {
  font-size: 0.875rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.5);
  transition: background 0.15s linear, color 0.15s linear;
}
.sidebar .category-content .nav li > a[data-toggle=collapse] {
  padding-right: 2rem;
}
.sidebar .category-content .nav li > a[data-toggle=collapse]:after {
  position: absolute;
  top: 0.5rem;
  right: 1rem;
  height: 1.5rem;
  line-height: 1.5rem;
  display: block;
  content: "";
  font-family: FontAwesome;
  font-size: 1.5rem;
  font-weight: normal;
  transform: rotate(0deg);
  transition: -webkit-transform 0.2s ease-in-out;
}
.sidebar .category-content .nav li > a[data-toggle=collapse][aria-expanded=true]:after {
  transform: rotate(90deg);
}
.sidebar .category-content .nav li > a > i {
  float: left;
  top: 0;
  margin-top: 2px;
  margin-right: 15px;
  transition: opacity 0.2s ease-in-out;
}
.sidebar .category-content .nav li ul {
  padding: 0;
}
.sidebar .category-content .nav li ul > li a {
  padding-left: 2.75rem;
}
.sidebar .category-content .nav > li > a {
  font-weight: 500;
}

@media (min-width: 768px) {
  .sidebar {
    display: table-cell;
    vertical-align: top;
    width: 280px;
    padding: 0 1.25rem;
  }
  .sidebar.sidebar-fixed {
    position: sticky;
    top: 5.5rem;
  }
  .sidebar.sidebar-default .sidebar-category {
    background-color: #fff;
  }
  .sidebar.sidebar-separate .sidebar-content {
    box-shadow: none;
  }


  .sidebar.sidebar-separate .sidebar-category:hover span{
    color: #FFA630;
  }
  .sidebar.sidebar-separate .sidebar-category:hover {
    box-shadow: 0 12px 25px rgba(0,0,0,0.25), 0 9px 9px rgba(0,0,0,0.22);
  }
  .sidebar.sidebar-separate .sidebar-category {
    margin-bottom: 1.25rem;
    border-radius: 0.25rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.12), 0 2px 3px rgba(0,0,0,0.24);
    transition: all 1s cubic-bezier(.25,.8,.25,1);
  }

  .content-wrapper {
    display: table-cell;
  }
  .nav-link:hover{
    color: #F17720  !important;
  }
}

    </style>

<div id="sidebar-main" class="sidebar sidebar-default sidebar-separate sidebar-fixed" style="position:absolute;  overflow: auto;"  >
  <div class="sidebar-content">
   
    <!-- /Sidebar Category -->


      <div class="sidebar-category sidebar-default">
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
           <li class="nav-item">
          <a class="nav-link mt-2" style=""

          <?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>
        href="{{url('coodinator_dashboard')}}"
      <?php } ?>
      <?php if (Session::get('key') == 'student') {
        # code...
       ?>
        href="{{url('student_dashboard')}}"
      <?php } ?>
      <?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
      href="{{url('supervisor_dashboard')}}" 
      <?php } ?>      
      <?php if (Session::get('key') == 'faculty') {
        # code...
       ?>
     href="{{url('faculty_dashboard')}}"
      <?php } ?>

   style="color: #fff;"><i class="fa fa-home"></i>&nbsp Dashboard<span style="font-weight: lighter; font-size: 15px;"></span></a>
          </li>
        </ul></div></div>


  <!-- ////////    Coodinator Side Nav Start   /////////// -->

  <?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>


    <!-- /Sidebar Category -->
    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Students</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
           


          <li class="nav-item">
            <a href="{{url('cdashboard/add_student')}}" class="nav-link 
                <?php if(url()->current() == "http://localhost/CPM/public/cdashboard/add_student"){?>
                   bc
                <?php } ?>
                "><i class="fa fa-user-plus"></i>&nbsp Add New Student</a>
                
          </li>
          <li class="nav-item">
             <a href="{{url('cdashboard/view_students_list')}}" class="nav-link 
                <?php if(url()->current() == "http://localhost/CPM/public/cdashboard/view_students_list"){?>
                   bc
                <?php } ?>
                "><i class="fa fa-list"></i>&nbsp View all Students</a>
          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>


    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Student Group</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
            

 <li class="nav-item">
            <a href="{{url('faculty/feedbacks')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/faculty/view_students_list"){?>
                 bc
              <?php } ?>
              "><i class="fas fa-edit"></i>&nbsp Feedbacks</a>
             
          </li>
          <li class="nav-item">
            <a href="{{url('cdashboard/view_students_groups')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/cdashboard/view_students_groups"){ ?>
                 bc
              <?php } ?>
              "><i class="fa fa-users"></i>&nbsp View Student Groups</a>
                
          </li>
          
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>



 <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Supervisors</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
            


          <li class="nav-item">
            <a href="{{url('cdashboard/view_supervisors_list')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/cdashboard/view_supervisors_list"){?>
                 bc
              <?php } ?>
              "><i class="fa fa-list"></i>&nbsp View all Supervisors</a>
                
          </li>
          
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>

     <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Faculty Members</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
            


          <li class="nav-item">
          <a href="{{url('cdashboard/add_faculty')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/cdashboard/add_faculty"){?>
                 bc
              <?php } ?>
              "><i class="fa fa-user-plus"></i>&nbsp Add New Faculty</a>
          </li>
          <li class="nav-item">
            

              <a href="{{url('cdashboard/view_faculty_list')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/cdashboard/view_faculty_list"){?>
                 bc
              <?php } ?>
             "><i class="fa fa-list"></i>&nbsp View all Faculty</a>
                
          </li>
          
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>




     <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Calender & Presentations</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
            


          <li class="nav-item">
         
          <a href="{{url('CPM/view_calendar')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/CPM/view_calendar"){?>
               bc
            <?php } ?>
            "><i class="fas fa-calendar"></i>&nbsp Capston Calender</a>      
          </li>

          <li class="nav-item">
          
          <a href="{{url('view_scheduled_presentations')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/view_scheduled_presentations"){?>
               bc
            <?php } ?>
            "><i class="fa fa-calendar-alt"></i>&nbsp Presentations</a>
                
          </li>
          
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>


  <?php } ?>

  <!-- ////////    Coodinator Side Nav End   /////////// -->


  <!-- ////////    Student Side Nav Start   /////////// -->

    <?php if (Session::get('key') == 'student') {
        # code...
       ?>

    <!-- /Sidebar Category -->

     <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Calender & Presentations</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
            
         <li class="nav-item">
            <a href="{{url('student/feedbacks')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/student/feedbacks"){?>
                 bc
              <?php } ?>
              "><i class="fas fa-edit"></i>&nbsp Feedbacks <span class="fnot" style="float: right !important; margin-top: 2%;"></span></a>
             
          </li>

          <li class="nav-item">
         
          <a href="{{url('CPM/view_calendar')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/CPM/view_calendar"){?>
               bc
            <?php } ?>
            "><i class="fas fa-calendar"></i>&nbsp Capston Calender</a>      
          </li>

          <li class="nav-item">
          
          <a href="{{url('/view_scheduled_presentations')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/presentations"){?>
               bc
            <?php } ?>
            "><i class="fa fa-calendar-alt"></i>&nbsp Presentations</a>
                
          </li>
          
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>
    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Project</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
          <li class="nav-item">
               <a href="{{url('student/our_project')}}" class="nav-link
                  <?php if(url()->current() == "http://localhost/CPM/public/student/our_project"){?>
                     bc
                  <?php } ?>

                  "><i class="fas fa-file-alt"></i>&nbsp Our Project</a>   
                          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>


    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Quries</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
          <li class="nav-item">
            <a href="{{url('student/quries_list')}}" class="nav-link
            <?php if(url()->current() == "http://localhost/CPM/public/student/quries_list"){?>
               bc
            <?php } ?>
            "><i class="far fa-comments"></i>&nbsp Quries &nbsp<span class="q_s_not" style="float: right"></span></a>

          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>


    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>FAculty Members</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
          <li class="nav-item">
             <a href="{{url('student/view_faculty_list')}}" class="nav-link
            <?php if(url()->current() == "http://localhost/CPM/public/student/view_faculty_list"){?>
               bc
            <?php } ?>
            "><i class="fa fa-list"></i>&nbsp View Faculty Members</a>

          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>



     <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Supervisors</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
          <li class="nav-item">
            <a href="{{url('student/view_supervisors_list')}}" class="nav-link
              <?php if(url()->current() == "http://localhost/CPM/public/student/view_supervisors_list"){?>
                 bc
              <?php } ?>
              "><i class="fa fa-list"></i>&nbsp View Supervisors</a>

          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>


    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Project Ideas</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
          <li class="nav-item">
               
              <a href="{{url('student/view_project_ideas')}}" class="nav-link
              <?php if(url()->current() == "http://localhost/CPM/public/student/view_project_ideas"){?>
                 bc
              <?php } ?>
              "><i class="fa fa-file-alt"></i>&nbsp View Project Ideas</a>
          </li>


          <li class="nav-item">
               <a href="{{url('student/requested_idea')}}" class="nav-link

              <?php if(url()->current() == "http://localhost/CPM/public/student/requested_idea"){?>
                 bc
              <?php } ?>

              "><i class="fa fa-user-clock"></i>&nbsp Veiw requested Ideas <span class="snot" style="float: right !important; margin-top: 2%;"></span></a>
          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>


  <?php } ?>

  <!-- ////////    Stufdent Side Nav End   /////////// -->


  <!-- ////////    faculty Side Nav Start   /////////// -->

    <?php if (Session::get('key') == 'faculty') {
        # code...
       ?>

    <!-- /Sidebar Category -->
    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Latest News</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
          <li class="nav-item">
            <a href="{{url('faculty/feedbacks')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/faculty/view_students_list"){?>
                 bc
              <?php } ?>
              "><i class="fas fa-edit"></i>&nbsp Feedbacks</a>
             
          </li>

          <li class="nav-item">
            <a href="{{url('faculty/view_students_list')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/faculty/view_students_list"){?>
                 bc
              <?php } ?>
              "><i class="fas fa-list"></i>&nbsp View Students</a>
             
          </li>
          <li class="nav-item">
            <a href="{{url('cdashboard/view_students_groups')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/cdashboard/view_students_groups"){ ?>
                 bc
              <?php } ?>
              "><i class="fa fa-users"></i>&nbsp View Student Groups</a>
          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>




    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Calender & Presentations</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
            


          <li class="nav-item">
         
          <a href="{{url('CPM/view_calendar')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/CPM/view_calendar"){?>
               bc
            <?php } ?>
            "><i class="fas fa-calendar"></i>&nbsp Capston Calender</a>      
          </li>

          <li class="nav-item">
          
          <a href="{{url('/view_scheduled_presentations')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/presentations"){?>
               bc
            <?php } ?>
            "><i class="fa fa-calendar-alt"></i>&nbsp Presentations</a>
                
          </li>
          
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>


  <?php } ?>

  <!-- ////////    faculty Side Nav End   /////////// -->


  <!-- ////////    sepervisor Side Nav Start   /////////// -->

    <?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>

    <!-- /Sidebar Category -->
    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Project Ideas</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
          
          <li class="nav-item">
            <a href="{{url('supervisor/add_idea_supervisor')}}" class="nav-link
              <?php if(url()->current() == "http://localhost/CPM/public/supervisor/add_idea_supervisor"){?>
                 bc
              <?php } ?>
              "><i class="far fa-edit"></i>&nbsp Add an Idea</a>
            
          </li>
          <li class="nav-item">
            <a href="{{url('supervisor/view_project_ideas')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/supervisor/view_project_ideas"){?>
                 bc
              <?php } ?>
              "><i class="fas fa-file-alt"></i>&nbsp View Project Ideas</a>
          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>



    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Students & Requests</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
         
         <li class="nav-item">
            <a href="{{url('faculty/feedbacks')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/faculty/view_students_list"){?>
                 bc
              <?php } ?>
              "><i class="fas fa-edit"></i>&nbsp Feedbacks</a>
             
          </li>
          <li class="nav-item">
            <a href="{{url('cdashboard/view_students_groups')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/cdashboard/view_students_groups"){ ?>
                 bc
              <?php } ?>
              "><i class="fa fa-users"></i>&nbsp View Student Groups</a>
                
          </li>
          <li class="nav-item">
            <a href="{{url('supervisor/view_students_list')}}" class="nav-link 
              <?php if(url()->current() == "http://localhost/CPM/public/supervisor/view_students_list"){?>
                 bc
              <?php } ?>
              "><i class="fas fa-list"></i>&nbsp View Students</a> 
            
          </li>

          <li class="nav-item">
          <a href="{{url('supervisor/view_student_request')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/supervisor/view_student_request"){?>
               bc
            <?php } ?>
            " ><i class="fas fa-user-clock"></i>&nbsp View Student Requests <span style="float: right !important; margin-top: 2%;" class="not"></span></a> 
          </li>

          <li class="nav-item">
                <a href="{{url('supervisor/view_my_students')}}" class="nav-link 
          <?php if(url()->current() == "http://localhost/CPM/public/supervisor/view_my_students"){?>
             bc
          <?php } ?>
          " ><i class="fas fa-user-check"></i>&nbsp View Supervised Groups</a>
          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>

     <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Quries</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
            


          <li class="nav-item">
                   
            <a href="{{url('supervisor/quries_list')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/supervisor/quries_list"){?>
               bc
            <?php } ?>
            " style="font-size:17px; "><i class="far fa-comments"></i>&nbsp Student Quries &nbsp<span class="q_su_not" style="float: right"></span></a>
          </li>
          
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>


    <div class="sidebar-category sidebar-default">
        <div class="category-title">
          <span>Calender & Presentations</span>
        </div>
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
            


          <li class="nav-item">
         
          <a href="{{url('CPM/view_calendar')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/CPM/view_calendar"){?>
               bc
            <?php } ?>
            "><i class="fas fa-calendar"></i>&nbsp Capston Calender</a>      
          </li>

          <li class="nav-item">
          
          <a href="{{url('/view_scheduled_presentations')}}" class="nav-link 
            <?php if(url()->current() == "http://localhost/CPM/public/presentations"){?>
               bc
            <?php } ?>
            "><i class="fa fa-calendar-alt"></i>&nbsp Presentations</a>
                
          </li>
          
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>


  <?php } ?>

  <!-- ////////    supervisor Side Nav End   /////////// -->

      <div class="sidebar-category sidebar-default">
      <div class="category-content">
        <ul id="sidebar-editable-nav" class="nav flex-column">
         
          <li class="nav-item">
          

             <?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>
        <a class="nav-link" href="{{url('logout')}}" ><i class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
      <?php } ?>
      <?php if (Session::get('key') == 'student') {
        # code...
       ?>
        <a class="nav-link" href="{{url('student_logout')}}" ><i class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
      <?php } ?>
      <?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
        <a class="nav-link" href="{{url('supervisor_logout')}}"><i class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
      <?php } ?>      
      <?php if (Session::get('key') == 'faculty') {
        # code...
       ?>
        <a class="nav-link" href="{{url('faculty_logout')}}" ><i class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
      <?php } ?>
          </li>
        </ul>
        <!-- /Nav -->
      </div>
      <!-- /Category Content -->
    </div>

</div>
</div>






<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="width: 100%" >
 <!--  <span style="font-size:30px;cursor:pointer; color: #fff" onclick="closeNav()">&#9776;</span> -->&nbsp
  <a class="navbar-brand" 

          <?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>
        href="{{url('coodinator_dashboard')}}"
      <?php } ?>
      <?php if (Session::get('key') == 'student') {
        # code...
       ?>
        href="{{url('student_dashboard')}}"
      <?php } ?>
      <?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
      href="{{url('supervisor_dashboard')}}" 
      <?php } ?>      
      <?php if (Session::get('key') == 'faculty') {
        # code...
       ?>
     href="{{url('faculty_dashboard')}}"
      <?php } ?>

   style="color: #fff;">Capston Management System<span style="font-weight: lighter; font-size: 15px;"></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <style type="text/css">
    .q_su_not{
      margin-left: 11%;
      font-size: 11px;
    }
     .q_s_not{
      margin-left: 11%;
      font-size: 11px;
    }
    .not{
      
      font-size: 11px;
    }
    .snot{
      margin-left: 11%;
      font-size: 11px;
    }
  </style>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto" style="display: inherit;">
      <?php if (Session::get('key') == 'supervisor'): ?>
        <a href="{{url('supervisor/quries_list')}}">
      <li class="far fa-comments" style="color:#fff;"><span class="q_su_not"></span></li></a>&nbsp&nbsp&nbsp&nbsp
        <a href="{{url('supervisor/view_student_request')}}">
      <li class="fa fa-bell" style="color:#fff;"><span class="not"></span></li></a>&nbsp&nbsp&nbsp&nbsp
      <?php endif ?>
      <?php if (Session::get('key') == 'student'): ?>
        <a href="{{url('student/quries_list')}}">
          <li class="far fa-comments" style="color:#fff;"><span class="q_s_not"></span></li></a>&nbsp&nbsp&nbsp&nbsp
        <a href="{{url('student/requested_idea')}}">
      <li class="fa fa-bell" style="color:#fff;"><span class="snot"></span></li></a>&nbsp&nbsp&nbsp&nbsp
      
      <?php endif ?>
      <li class="nav-item active">
 <div class="dropdown ">

    <span style="color:#fff;">
      <?php if (Session::get('name') == 'coodinator') {
        echo "Coordinator";
      }else{ ?>

      {{Session::get('name')}}

    <?php } ?>
      <i class="fa fa-caret-down" style="margin-top: 5%; margin-right: 10px; margin-left: 4px;"></i></span>
    <div class="dropdown-content">
    
      <?php if (Session::get('key') == 'coodinator') {
        # code...
       ?>
        <a class="nav-link dropdown-item log" href="{{url('logout')}}" style="color: #FFA630;"><i class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
      <?php } ?>
      <?php if (Session::get('key') == 'student') {
        # code...
       ?>
        <a class="nav-link dropdown-item log" href="{{url('student_logout')}}" style="color: #FFA630;"><i class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
        <a class="nav-link dropdown-item log" href="{{url('student_change_pass')}}" style="color: #FFA630;"><i class="fa fa-cog"></i>&nbsp Change Password</a>
      <?php } ?>
      <?php if (Session::get('key') == 'supervisor') {
        # code...
       ?>
        <a class="nav-link dropdown-item log" href="{{url('supervisor_logout')}}" style="color: #FFA630;"><i class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
        <a class="nav-link dropdown-item log" href="{{url('faculty_change_pass')}}" style="color: #FFA630;"><i class="fa fa-cog"></i>&nbsp Change Password</a>
      <?php } ?>      
      <?php if (Session::get('key') == 'faculty') {
        # code...
       ?>
        <a class="nav-link dropdown-item log" href="{{url('faculty_logout')}}" style="color: #FFA630;"><i class="fas fa-sign-out-alt"></i>&nbsp Logout</a>
         <a class="nav-link dropdown-item log" href="{{url('faculty_change_pass')}}" style="color: #FFA630;"><i class="fa fa-cog"></i>&nbsp Change Password</a>
      <?php } ?>



    </div>
</div>
      </li>
    </ul>
  </div></nav>
