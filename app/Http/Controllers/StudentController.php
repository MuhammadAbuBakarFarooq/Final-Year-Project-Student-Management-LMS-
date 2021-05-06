<?php

namespace App\Http\Controllers;
use App\Coodinator;
use App\Student;
use App\Supervisor;
use App\Faculty_member;
use App\Supervisor_ideas;
use App\Student_idea;
use App\Fb_notifs;
use App\Student_supervisor;
use App\All_quries;
use App\Query_notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
class StudentController extends Controller
{
    function student_login(Request $request){
        
 $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'

        ]);
        if($validator->passes()){
            $student = new Student;
            $student->email = $request->email;
            $student->password = $request->password;
            $hashp = md5($student->password);
            $students = Student::all();
            foreach ($students as $key) {
                # code...
            
            if ($student->email == $key['student_email'] && $hashp == $key['pass']) {
            	# code...
                if ($key['st'] == "0") {
                    # code...

                    $request->session()->put('key', 'student');
                    $request->session()->put('name', $key['student_name']);
                    $request->session()->put('student_id', $key['student_id']);
                    $request->session()->put('student_type', $key['is_manager']);
                 return redirect('student_change_pass')->with(['id'=> $key['id']]);   
                }else{
            $request->session()->put('key','student');
            $request->session()->put('name', $key['student_name']);
            $request->session()->put('student_type', $key['is_manager']);       
            $request->session()->put('student_id', $key['student_id']);


            return redirect('student_dashboard');
            }
            }
        }


            $request->session()->put('msg', "Email and password does't match");            	
            return redirect('/student_login_page');
            


        } else {
            return redirect('/student_login_page')->withErrors($validator)->withInput();
        }
        // dd($request->all());
    } 
 

 function change_pass_student(Request $request){

     

 $validator = Validator::make($request->all(), [
            'opass' => 'required',
            'npass' => 'required_with:npass2|same:npass2|min:6',
            'npass2' => 'required|min:6'

        ]);

        if($validator->passes()){
            $student = new Student;
            $student->opass = md5($request->opass);
            $student->password = md5($request->npass);
            $id = $request->id;

          $students = DB::select("select * from students WHERE student_id = '$id'");
          
            if ($student->opass == $students[0]->pass) {
                # code...
            // DB::table('students')->update(['pass' => $student->password,'st' => 1]);
             DB::update("update students set pass = '$student->password' WHERE student_id = '$id'");
             DB::update("update students set st = '1' WHERE student_id = '$id'");
            $request->session()->put('msg', "Password Changed successfully");
             $request->session()->put('student_id', $id);
            return redirect('student_dashboard');
            
            }else{
            
            $request->session()->put('msg', "Your Password is incorect");               
            return redirect('/student_change_pass')->with(['student_id'=> $id]);
            }


        } else {
            $id = $request->id;
            return redirect('/student_change_pass')->with(['student_id'=> $id])->withErrors($validator)->withInput();
        }
        // dd($request->all());
    } 




 function student_feedbacks(Request $request){
     if ($request->session()->get('key') == 'student') {

        $student_id = $request->session()->get('student_id');

        $group_id = DB::table('students')->where([
            ['student_id', '=', $student_id],
            ])->pluck('group_id');

        $group_id = $group_id[0];



        $feedbacks = DB::table('feed_backs')->where([
            ['g_id', '=', $group_id],
            ])->get();

        if (count($feedbacks) != '0') {
          
        $i = 0;
        foreach ($feedbacks as $key) {
            $fid = $key->f_id;
             $f_names = DB::select("select * from faculty_members WHERE faculty_member_id = '$fid'");
             $faculty_name[$i]= $f_names[0]->faculty_member_name;
            $i++;
            }
        }else{
            $faculty_name = "null";
        }

          $tsd = '3';

        DB::update("update Fb_notifs set st = '1' WHERE st_id = '$student_id'");
         $pid = DB::table('student_supervisors')->where([
            ['group_id', '=', $group_id],
            ])->pluck('project_id');

            $project_id = $pid[0];
            $project_details = DB::table('student_ideas')->where([
            ['id', '=', $project_id],
            ])->get();
        return view('view_all_feedback')->with(compact('group_id','project_details','feedbacks','faculty_name','tsd'));
        
        }else{
              return redirect('/student_login_page');
        }
    }


 function view_student_dashboard(Request $request){
     if ($request->session()->get('key') == 'student') {




        return view('student_dashboard');
       
        }else{
              return redirect('/student_login_page');
        }
    }

    function forgot_password(Request $request){

        return view('student_forgot_password');
       
    }

    
     function send_new_pass_student(Request $request){

      $students = Student::where('student_email',$request->email)->get();
      

      $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
      $pass = substr($random, 0, 5);
      $password = md5($pass);

      DB::update("update students set pass = '$password' WHERE student_email = '$request->email'");
      DB::update("update students set st = '0' WHERE student_email = '$request->email'");

       $students[0]->student_name;
       $students[0]->student_email;
          $data = array(
                    'name' => $students[0]->student_name,
                    'email' => $students[0]->student_email,
                    'pass' => $pass
            );
                Mail::to($students[0]->student_email)->send(new SendMail($data));

                $request->session()->put('msg_succ', "Password Changed Successfully | Kindly Check Your Email");
                return redirect()->action('StudentController@view_student_login_page');

    }

 public function student_logout(Request $request) {
      
     $request->session()->flush('key');
     $request->session()->flush('name');
     $request->session()->flush('student_id');
     $request->session()->flush('student_type');
     return redirect('student_login_page');

   }

     public function view_student_login_page(Request $request) {
        
     if ($request->session()->get('key') == 'student') {
        
        return view('student_dashboard');
       
        }else{
    return view('student_login');
              
        }

   }

   public function view_supervisors_list(Request $request) {
     if ($request->session()->get('key') == 'student') {
         $supervisor = Supervisor::orderBy('id','desc')->get();
         $student_id = $request->session()->get('student_id');
         $student_type = $request->session()->get('student_type');
         
         
        $group_id = Student::where('student_id', $student_id)->pluck('group_id');
        
        $g = $group_id[0];

        $cot = Student_idea::where('group_id', $g)->get();

        if (count($cot) == 0) {
            # code...
            $pidea = 1;
        }else{

         foreach ($cot as $key) {
             # code...

         if($key->action == 0 || $key->action == 1 || $key->action == 3){
            $pidea = 0;
         }
         
         elseif($key->action == 2 ){
            $pidea = 1;
         }
         
         
        }
      }
      
         
        
       
        return view('view_supervisors_list',['pidea'=>$pidea])->with(compact('supervisor'));
       
       
        }else{
    return view('student_login');
              
        }

   }

   public function view_project_ideas(Request $request) {
     $names = array();
     if ($request->session()->get('key') == 'student') {
         $supervisor_ideas = Supervisor_ideas::orderBy('id','desc')->get();
         foreach ($supervisor_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          array_push($names, $name[0]);
          }
        

        return view('view_supervisors_ideas_list')->with(compact('supervisor_ideas','names'));
       
       
        }else{
    return view('student_login');
              
        }

   }

      public function requested_idea(Request $request) {

    
     if ($request->session()->get('key') == 'student') {
      
      $student_id = $request->session()->get('student_id');
      $g_id = Student::where('student_id', $student_id)->pluck('group_id');
      $group_id = $g_id[0];

      $aa1 = DB::table('student_ideas')
              ->where('group_id', $group_id)
              ->update(['student_notif' => 0]);
        
        $student_id = $request->session()->get('student_id');
        $group_id  = Student::where('student_id',$student_id)->pluck('group_id');
        $group_id = $group_id[0];

        $student_ideas  = Student_idea::where('group_id',$group_id)->orderBy('id','desc')->get();
        $i =0;
         foreach ($student_ideas as $key) {
          $supervisor_id = $key->supervisor_id;

          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          
          if (count($name) > 0) {
            # code...
            $names[$i] = $name[0];
          }else{
            $names[$i] = "Supervisor Removed";
          }
          $i++;

          }
          if (count($student_ideas) == 0) {
            # code...
           $names[0] = 0;
          }

        return view('view_student_requested_ideas_list')->with(compact('student_ideas','names'));
       
       
        }else{
    return view('student_login');
              
        }

   }
    public function requested_idea_details($id, Request $request) {
     $names = array();
     if ($request->session()->get('key') == 'student') {
        

        $student_ideas  = Student_idea::where('id',$id)->get();
        $i = 0;
         foreach ($student_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          if (count($name)>0) {
            # code...
            $names[$i] = $name[0];
          }
          else{
           $names[$i] = 'Supervisor Removed';
          }
          $i++;
          }
         

        return view('view_student_requested_ideas_details')->with(compact('student_ideas','names'));
       
       
        }else{
    return view('student_login');
              
        }

   }

    public function requested_idea_edit($id, Request $request) {
     $names = array();
     if ($request->session()->get('key') == 'student') {
        

        $student_ideas  = Student_idea::where('id',$id)->get();
        
         foreach ($student_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          array_push($names, $name[0]);
          }
         

        return view('view_student_requested_ideas_edit')->with(compact('student_ideas','names'));
       
       
        }else{
    return view('student_login');
              
        }

   }
      public function view_supervisor_ideas($id, Request $request) {
     $names = array();
     if ($request->session()->get('key') == 'student') {
         $supervisor_ideas = Supervisor_ideas::where('supervisor_id',$id)->orderBy('id','desc')->get();
         if (count($supervisor_ideas)>0) {
           # code...
         foreach ($supervisor_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          array_push($names, $name[0]);
          }
         }else{
          $name =  Supervisor::where('supervisor_id', $id)->pluck('supervisor_name');
          array_push($names, $name[0]);
         }

        

        return view('view_one_supervisors_ideas_list')->with(compact('supervisor_ideas','names'));
       
       
        }else{
    return view('student_login');
              
        }

   }

     
      public function view_faculty_list(Request $request) {
     if ($request->session()->get('key') == 'student') {
          $faculty_members = Faculty_member::all();
        return view('view_faculty_list')->with(compact('faculty_members'));
       
        }else{
    return view('Coodinator_login');
              
        }

   }

     public function add_idea($id, Request $request) {
     if ($request->session()->get('key') == 'student' && $request->session()->get('student_type') == '1') {

        return view('add_idea',["supervisor_id"=>$id]);
       
        }else{
    return view('student_login');
              
        }

   }



      public function add_idea_student(Request $request) {

     if ($request->session()->get('key') == 'student') {
     

      $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required'
            
        ]);
        if($validator->passes()){


            $student_idea = new Student_idea;
            $student_idea->title = $request->title;
            $student_idea->desc = $request->desc;
            $student_idea->supervisor_id = $request->supervisor_id; 
            $student_idea->student_id = $request->student_id; 
            $group =  Student::where('student_id', $request->student_id)->pluck('group_id');
            $student_idea->group_id = $group[0];
            $student_idea->action = 0;
            $student_idea->from = -1;

          

            $student_idea->save();
            $request->session()->put('msg', "Idea Requested Successfully");
            return redirect()->action('StudentController@requested_idea');       
          }
          return redirect('student/add_idea')->withErrors($validator)->withInput();
        }else{
    return view('student_login');
              
        }

   }

      public function update_idea(Request $request) {
 $names = array();
     if ($request->session()->get('key') == 'student') {
     

      $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required'
            
        ]);
        if($validator->passes()){


            $student_idea = new Student_idea;
            $student_idea->title = $request->title;
            $student_idea->desc = $request->desc;
            $student_idea->id = $request->id; 

             $affected = DB::table('student_ideas')
              ->where('id', $student_idea->id)
              ->update(['title' => $student_idea->title]);
        $affected1 = DB::table('student_ideas')
              ->where('id', $student_idea->id)
              ->update(['desc' => $student_idea->desc]);
          
          
        $student_id = $request->session()->get('student_id');
        $group_id  = Student::where('student_id',$student_id)->pluck('group_id');
        $group_id = $group_id[0];

        $student_ideas  = Student_idea::where('group_id',$group_id)->orderBy('id','desc')->get();
          $i =0;
         foreach ($student_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          if (count($name) > 0) {
            # code...
            $names[$i] = $name[0];
          }else{
            $names[$i] = "Supervisor Removed";
          }
          $i++;
          }

        $request->session()->put('msg', "Idea Updated Successfully");
        return redirect()->action('StudentController@requested_idea');
       
           
          }
          $id = $request->id;
          return redirect()->action('StudentController@requested_idea_edit',['id' => $id])->withErrors($validator)->withInput();
        }else{
    return view('student_login');
              
        }

   }
         public function idea_delete_requested($id, Request $request) {
          $names = array();
      if ($request->session()->get('key') == 'student') {
     

        Student_idea::where('id', $id)->delete();
        $student_id = $request->session()->get('student_id');
        $group_id  = Student::where('student_id',$student_id)->pluck('group_id');
        $group_id = $group_id[0];

        $student_ideas  = Student_idea::where('group_id',$group_id)->get();
        $i =0;
         foreach ($student_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          if (count($name) > 0) {
            # code...
            $names[$i] = $name[0];
          }else{
            $names[$i] = "Supervisor Removed";
          }
          $i++;
          }


        $request->session()->put('msg', "Idea Deleted Successfully");
        return redirect()->action('StudentController@requested_idea');
        }else{
    return view('student_login');
              
        }

   }

   public function request_supervisor_idea($id, Request $request){
     $names = array();

     $supervisor_idea = Supervisor_ideas::where('id', $id)->get();
     $requested_ideas = DB::table('student_ideas')->where([
     ['from', '=', $id],
     ['action', '=', '3'],
     ])->get();
     if (count($requested_ideas) > 0) {
       # code...
      $request->session()->put('idea_taken', "Idea Is Already Taken...");
      return redirect()->action('SupervisorController@supervisor_idea_details',['id' => $id]);
     }
     $group_id = Student::where('student_id', $request->session()->get('student_id'))->pluck('group_id');
     $g = $group_id[0];
     foreach ($supervisor_idea as $row) {
         # code...

        $student_idea = new Student_idea;
        $student_idea->title = $row->title;
        $student_idea->desc = $row->desc;
        $student_idea->supervisor_id = $row->supervisor_id;
        $student_idea->group_id = $g;
        $student_idea->student_id = $request->session()->get('student_id');
        $student_idea->action = 0;
        $student_idea->from = $id;

        $student_idea->save();
     }
          
          $student_ideas  = Student_idea::where('group_id',$group_id)->get();
          $i = 0;
          foreach ($student_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
         if (count($name) > 0) {
            # code...
            $names[$i] = $name[0];
          }else{
            $names[$i] = "Supervisor Removed";
          }
          $i++;
          }


        $request->session()->put('msg', "Idea Requested Successfully");
        return redirect()->action('StudentController@requested_idea');
       

   }



    public function our_project(Request $request) {
     if ($request->session()->get('key') == 'student') {


            $g_id = DB::table('students')->where([
            ['student_id', '=', $request->session()->get('student_id')],
            ])->pluck('group_id');
            $group_id = $g_id[0];
            
            $pid = DB::table('student_supervisors')->where([
            ['group_id', '=', $group_id],
            ])->pluck('project_id');
            count($pid);
    
             if (count($pid) == 0) {
              # code...
              $project_id = 0;
              $students = DB::table('students')->where([
            ['group_id', '=', $group_id],
            ])->get();
             return view('view_our_project_details')->with(compact('project_id','students','group_id'));
            }else{
            $project_id = $pid[0];        
            $sid = DB::table('student_supervisors')->where([
            ['group_id', '=', $group_id],
            ])->pluck('supervisor_id');
            $supervisor_id = $sid[0];

            $sname = DB::table('supervisors')->where([
            ['supervisor_id', '=', $supervisor_id],
            ])->pluck('supervisor_name');
            $supervisor_name = $sname[0];

            $project_details = DB::table('student_ideas')->where([
            ['id', '=', $project_id],
            ])->get();
            $students = DB::table('students')->where([
            ['group_id', '=', $group_id],
            ])->get();
          


            
       
        return view('view_our_project_details')->with(compact('project_details','students','supervisor_name','project_id','group_id'));
      }
        }else{
    return view('student_login');
              
        }

   }

    function count_snot(Request $request){

    if ($request->session()->get('key') == 'student') {
          $student_id = $request->session()->get('student_id');
          $g_id = Student::where('student_id', $student_id)->pluck('group_id');
          $group_id = $g_id[0];
         $names = DB::table('student_ideas')->where([
            ['group_id', '=', $group_id],
            ['student_notif', '=', '1'],
            ])->get();
        
              $req  = count($names);

              if ($req == 0) {
                # code...
                echo " ";
              }else{
              echo $req;
              }

        }else{
              return redirect('/student_login_page');
        }
    }


    function count_q_s_not(Request $request){

    if ($request->session()->get('key') == 'student') {
          
          $gid = Student::where('student_id', $request->session()->get('student_id'))->pluck('group_id');
          $group_id = $gid[0];
          $notif = DB::table('query_notifications')->where([
            ['t_student_id', '=', $request->session()->get('student_id')],
            ['notif', '=', '0'],
            ['group_id', '=', $group_id],
            ['q_for', '=', '0'],
            ])->get();
        
              $req  = count($notif);

              if ($req == 0) {
                # code...
                echo " ";
              }else{
              echo $req;
              }

        }else{
              return redirect('/student_login_page');
        }
    }


  function count_fnot(Request $request){

    if ($request->session()->get('key') == 'student') {
          
          $gid = Student::where('student_id', $request->session()->get('student_id'))->pluck('group_id');
          $group_id = $gid[0];
          $notif = DB::table('Fb_notifs')->where([
            ['st_id', '=', $request->session()->get('student_id')],
            ['st', '=', '0'],
            ])->get();

        
              $req  = count($notif);

              if ($req == 0) {
                # code...
                echo " ";
              }else{
              echo $req;
              }

        }else{
              return redirect('/student_login_page');
        }
    }


      function quries_list(Request $request){
     if ($request->session()->get('key') == 'student') {
     

        $gid = Student::where('student_id', $request->session()->get('student_id'))->get();
        if ($gid[0]->in_a_group != 0) {
          # code...
        $group_id = $gid[0]->group_id;
        $gg =1;


        $has_supervisor = Student_supervisor::where('group_id', $group_id)->get();
        if (count($has_supervisor) > 0) {
             # code...
           
        $ss = 1;
        $quries = All_quries::orderBy('updated_at','desc')->where([['group_id', $group_id],['reply_of','0']])->get();
        $quries2 = All_quries::orderBy('updated_at','desc')->where([['group_id', $group_id],['reply_of','!=','0']])->get();
        
        $student_id = All_quries::where('group_id', $group_id)->pluck('student_id');
        
        $supervisor_id = All_quries::where('group_id', $group_id)->pluck('supervisor_id');

        $j=0;
        foreach ($quries2 as $row2) {
          # code...
        $ss_name2 = Supervisor::where('supervisor_id', $row2->supervisor_id)->pluck('supervisor_name');
        $s_name2[$j] = $ss_name2[0];
        $j++;
        }


        $i = 0;
        foreach ($quries as $row) {
          # code...
       if ($row->q_from == 0) {
            # code...
          
        $s_name = Student::where('student_id', $row->student_id)->pluck('student_name');
        

        if ($row->student_id == $request->session()->get('student_id')) {
          # code...
           $name[$i] = 'Me';
        }else{
        $name[$i] = $s_name[0];
         }
           }else if($row->q_from == 1){
        $s_name = Supervisor::where('supervisor_id', $row->supervisor_id)->pluck('supervisor_name');
        $name[$i] = $s_name[0];
           }
        $i++;
        }
       if (count($quries) == 0) {
         # code...
        $name[0] = '';
        $s_name2[0] = '';
       }
       if (count($quries2) == 0) {
         # code...
        $s_name2[0] = '';

       }


       $qq=0;
       foreach ($quries as $q ) {
         
        $notif[$qq] = DB::table('query_notifications')->where([
            ['t_student_id', '=', $request->session()->get('student_id')],
            ['notif', '=', '0'],
            ['is_reply', '=', '0'],
            ['q_id', '=', $q->id],
            ['group_id', '=', $group_id],
            ['q_for', '=', '0'],
            ])->get();
            $qq++; 
       }

       $qq2=0;
       foreach ($quries2 as $q2 ) {
         
        $notif1[$qq2] = DB::table('query_notifications')->where([
            ['t_student_id', '=', $request->session()->get('student_id')],
            ['notif', '=', '0'],
            ['is_reply', '=', '1'],
            ['q_id', '=', $q2->id],
            ['group_id', '=', $group_id],
            ['q_for', '=', '0'],
            ])->get();
            $qq2++; 
       }

        if (count($quries) == 0) {
         # code...
        $notif[0] = -1;
       }
       if (count($quries2) == 0) {
         # code...
        $notif1[0] = -1;
        
       }



       
        $aa1 = DB::table('query_notifications')->where([
          ['t_student_id','=', $request->session()->get('student_id')],
          ['group_id','=', $group_id],
          ['notif', '=', '0'],
          ['q_for','=', '0'],
          ])->delete();



      

  
     return view('student_quries_list')->with(compact('gg','quries','quries2','name','s_name2','ss','notif','notif1'));
}else{

  $gg = 1;
  $ss = 0;
  $notif[0] = -1;
  $notif1[0] = -1;
  return view('student_quries_list')->with(compact('gg','ss','notif','notif1'));

}
    }else{
        $gg = 0;
        $ss = 0;
        $notif[0] = -1;
        $notif1[0] = -1;
        return view('student_quries_list')->with(compact('gg','ss','notif','notif1'));

    }



      }else{
    return view('student_login');
              
        }
      }

      function ask_query(Request $request){
     if ($request->session()->get('key') == 'student') {
     


      return view('student_ask_query');



      }else{
    return view('student_login');
              
        }
      }

          // public function delete_query_student($id, Request $request) {


          //     $reply_of =  All_quries::where('reply_of', $id)->get();
              
          //     if (count($reply_of) > 0) {
          //       return redirect()->action('StudentController@quries_list');
          //     }else{

          //     All_quries::where('id', $id)->delete();
          //     Query_notification::where('q_id', $id)->delete();
          //     $request->session()->put('msg', "Query Deleted Successfully");
          //      return redirect()->action('StudentController@quries_list');
          //   }
          // }


      public function post_query(Request $request) {

     if ($request->session()->get('key') == 'student') {
      


      $validator = Validator::make($request->all(), [
            'askquery' => 'required'
            
        ]);
        if($validator->passes()){
         
            $group_id = Student::where('student_id', $request->session()->get('student_id'))->pluck('group_id');
            $supervisor_id = Student_supervisor::where('group_id', $group_id[0])->pluck('supervisor_id');

            
            $quries = new All_quries;
            $quries->askquery = $request->askquery;
            $quries->student_id = $request->session()->get('student_id');
            $quries->group_id = $group_id[0];
            $quries->supervisor_id = $supervisor_id[0];
            $quries->q_from = '0';
            $quries->q_not = '0';
            $quries->reply_of = '0';
            $quries->save();


            $students = Student::where('group_id', $group_id[0])->get();
             $get_id = All_quries::where([['group_id', $group_id],['supervisor_id',$supervisor_id[0]],['q_from','0']])->orderBy('created_at','desc')->pluck('id');

            foreach ($students as $row) {
              if ($row->student_id == $request->session()->get('student_id')) {
                # code...
              }else{
            $notif = new Query_notification;
            $notif->f_student_id = $request->session()->get('student_id');
            $notif->t_student_id = $row->student_id;
            $notif->group_id = $group_id[0];
            $notif->supervisor_id = $supervisor_id[0];
            $notif->notif = '0';
            $notif->q_from = '0';
            $notif->q_for = '0';
            $notif->q_id = $get_id[0];
            $notif->save();
              }
            }
            $notif = new Query_notification;
            $notif->f_student_id = $request->session()->get('student_id');
            $notif->t_student_id = 0;
            $notif->group_id = $group_id[0];
            $notif->supervisor_id = $supervisor_id[0];
            $notif->notif = '0';
            $notif->q_from = '0';
            $notif->q_for = '1';
            $notif->q_id = $get_id[0];
            $notif->save();



       $request->session()->put('msg', "Query Posted Successfully");
       return redirect()->action('StudentController@quries_list');
          }

          return redirect('student/ask_query')->withErrors($validator)->withInput();





      }else{
    return view('student_login');
              
        }
      }



    

}
