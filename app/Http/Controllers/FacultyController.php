<?php

namespace App\Http\Controllers;
use App\Coodinator;
use App\Student;
use App\Supervisor;
use App\Faculty_member;
use App\Student_idea;
use App\FeedBack;
use App\Presentations;
use App\Fb_notifs;
use App\Scheduled_presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
class FacultyController extends Controller
{
    function faculty_login(Request $request){
        
 $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'

        ]);
        if($validator->passes()){
            $faculty = new Faculty_member;
            $faculty->email = $request->email;
            $faculty->password = $request->password;
            $hashp = md5($faculty->password);
            $facultys = Faculty_member::all();
            foreach ($facultys as $key) {
                # code...
           

            if ($faculty->email == $key['faculty_member_email'] && $hashp == $key['pass']) {
            	# code...
                 if ($key['st'] == "0") {
                    # code...
                  if ($key->is_supervisor == 0) {
                    # code...
                    $request->session()->put('key', 'faculty');
                  }
                  else if ($key->is_supervisor == 1) {
                    # code...
                    $request->session()->put('key', 'supervisor');
                  }
                    $request->session()->put('name', $key['faculty_member_name']);
                    $request->session()->put('user_id', $key['faculty_member_id']);
                 return redirect('faculty_change_pass')->with(['id'=> $key['id']]);   
                }else{

                  $request->session()->put('name', $key['faculty_member_name']);
                    $request->session()->put('user_id', $key['faculty_member_id']);
                  if ($key->is_supervisor == 0) {
                    # code...
                    $request->session()->put('key', 'faculty');
                    return redirect('faculty_dashboard');
                  }
                  else if ($key->is_supervisor == 1) {
                    # code...
                    $request->session()->put('key', 'supervisor');
                    return redirect('supervisor_dashboard');

                  }
                    
                   
            }
            }
        }
            $request->session()->put('msg', "Email and password does't match");            	
            return redirect('/faculty_login_page');
            


        } else {
            return redirect('/faculty_login_page')->withErrors($validator)->withInput();
        }
        // dd($request->all());
    }

         function change_pass_faculty(Request $request){
         
 $validator = Validator::make($request->all(), [
            'opass' => 'required',
            'npass' => 'required_with:npass2|same:npass2|min:6',
            'npass2' => 'required|min:6'

        ]);
        if($validator->passes()){
            $faculty = new Faculty_member;
            $faculty->opass = md5($request->opass);
            $faculty->password = md5($request->npass);
            $id = $request->id;
            if ($id == "") {

              $uid = $request->session()->get('user_id');
              $facultys = DB::select("select * from faculty_members WHERE faculty_member_id = '$uid'");
              $id = $facultys[0]->id;
            }
            

            $facultys = DB::select("select * from faculty_members WHERE id = '$id'");
            if ($faculty->opass == $facultys[0]->pass) {
                # code...
            
            // DB::table('supervisors')->update(['pass' => $supervisor->password,'st' => 1]);
             DB::update("update faculty_members set pass = '$faculty->password' WHERE id = '$id'");
             DB::update("update faculty_members set st = '1' WHERE id = '$id'");
            $request->session()->put('msg', "Password Changed successfully");
            if ($facultys[0]->is_supervisor == 0) {
                    # code...
                    return redirect('faculty_dashboard');
                  }
                  else if ($facultys[0]->is_supervisor == 1) {
                    # code...
                    return redirect('supervisor_dashboard');

                  }
            
            }else{
            
            $request->session()->put('msg', "Your Password is incorect");               
            return redirect('/faculty_change_pass')->with(['id'=> $id]);
            }


        } else {
            $id = $request->id;
            return redirect('/faculty_change_pass')->with(['id'=> $id])->withErrors($validator)->withInput();
        }
        // dd($request->all());
    } 




 function view_faculty_dashboard(Request $request){
    if ($request->session()->get('key') == 'faculty') {
        
        return view('faculty_dashboard');
       
        }else{
              return redirect('/faculty_login_page');
        }
    }

    function forgot_password(Request $request){

        return view('faculty_forgot_password');
       
    }

     function send_new_pass_faculty(Request $request){

      $facultys = Faculty_member::where('faculty_member_email',$request->email)->get();
      

      $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
      $pass = substr($random, 0, 5);
      $password = md5($pass);

      DB::update("update faculty_members set pass = '$password' WHERE faculty_member_email = '$request->email'");
      DB::update("update faculty_members set st = '0' WHERE faculty_member_email = '$request->email'");

       $facultys[0]->faculty_member_name;
       $facultys[0]->faculty_member_email;
          $data = array(
                    'name' => $facultys[0]->faculty_member_name,
                    'email' => $facultys[0]->faculty_member_email,
                    'pass' => $pass
            );
                Mail::to($facultys[0]->faculty_member_email)->send(new SendMail($data));

                $request->session()->put('msg_succ', "Password Changed Successfully | Kindly Check Your Email");
                return redirect()->action('FacultyController@view_Faculty_login_page');

    }

 public function faculty_logout(Request $request) {
      $request->session()->flush('key');
      $request->session()->flush('name');
      $request->session()->flush('user_id');
     return redirect('faculty_login_page');

   }
    
     public function view_Faculty_login_page(Request $request) {
        
     if ($request->session()->get('key') == 'supervisor') {
        
        return view('faculty_dashboard');
       
        }else{
    return view('faculty_login');
              
        }

   }

   public function view_supervisors_list(Request $request) {
     if ($request->session()->get('key') == 'faculty') {
         $supervisor = Supervisor::all();
        return view('view_supervisors_list')->with(compact('supervisor'));
       
       
        }else{
    return view('faculty_login');
              
        }

   }


   public function feedbacks(Request $request) {
     if ($request->session()->get('key') == 'faculty' || $request->session()->get('key') == 'supervisor'|| $request->session()->get('key') == 'coodinator') {

         $prese = Scheduled_presentation::orderBy('date','asc')->get();
         if (count($prese) == 0) {
           $presentation_name = "no Presentations Yet";
           $p_title = "Null";

         }else{

         $presentation_name = $prese[0]->presentation_name;

         
         $i=1;
         foreach ($prese as $key) {
          if($key->mon != '-'){
            $g_id = $key->mon;
          }elseif($key->tues != '-'){
            $g_id = $key->tues;
          }elseif($key->wed != '-'){
            $g_id = $key->wed;
          }elseif($key->thurs != '-'){
            $g_id = $key->thurs;
          }elseif($key->fri != '-'){
            $g_id = $key->fri;
          }elseif($key->sat != '-'){
            $g_id = $key->sat;
          } 

          // $names = DB::table('student_ideas')->where([
          //   ['group_id', '=', '$g_id'],
          //    ])->get();


          $names = DB::select("select * from student_ideas WHERE group_id = '$g_id'");
          
          if (count($names) == 0) {
            $p_title[$i] = "Null";
          }elseif (count($names) == 1) {
            $p_title[$i] = $names[0]->title;
          }

          $i++;
         }

         }


           return view('feedbacks')->with(compact('prese','p_title','presentation_name'));
       
       
        }else{
    return view('faculty_login');
              
        }

   }

     public function view_students_list(Request $request) {
     if ($request->session()->get('key') == 'faculty') {
        $students = Student::all();
        return view('view_students_list')->with(compact('students'));
       
        }else{
    return view('faculty_login');
              
        }

   }

   public function student_group_details($id,Request $request) {
     if ($request->session()->get('key') == 'faculty' || $request->session()->get('key') == 'supervisor' || $request->session()->get('key') == 'coodinator') {
      
      $group_id = $id;
      
            
            $pid = DB::table('student_supervisors')->where([
            ['group_id', '=', $group_id],
            ])->pluck('project_id');
            
            if (count($pid) == 0) {
              # code...
              $project_id = 0;
               $students = DB::table('students')->where([
            ['group_id', '=', $group_id],
            ])->get();

              return view('view_our_project_details')->with(compact('students','project_id','group_id'));
            }
            else{
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
        }}else{
    return view('faculty_login');
              
        }

   }


    public function view_add_feedback($id,Request $request) {
     if ($request->session()->get('key') == 'faculty' || $request->session()->get('key') == 'supervisor'|| $request->session()->get('key') == 'coodinator') {
      
           $group_id = $id;
            $log_id = $request->session()->get('user_id');
            
            $feedbacks = DB::table('feed_backs')->where([
            ['g_id', '=', $group_id],
            ])->get();

            if ($feedbacks == "") {
              $feedbacks = "No Feedback Yet";
            }
            $prese = Scheduled_presentation::all();
            $presentation_name =  $prese[0]->presentation_name;
            
            $ttt = DB::table('feed_backs')->where([
            ['f_id', '=', $log_id],
            ['g_id', '=', $group_id],
            ['presentation_name', '=', $presentation_name],
            ])->get();


            if (count($ttt) > 0) {
              $tsd = 0;
            }else{
              $tsd = 1;
            }

            if (count($feedbacks) == 0) {
              $feedbacks = [0][0];
              $faculty_name = "null";
            }else{
           
            $i=0;
            foreach ($feedbacks as $key) {
            $fid = $key->f_id;
             $f_names = DB::select("select * from faculty_members WHERE faculty_member_id = '$fid'");
             $faculty_name[$i]= $f_names[0]->faculty_member_name;

           
            $i++;
            }

            }


            $pid = DB::table('student_supervisors')->where([
            ['group_id', '=', $group_id],
            ])->pluck('project_id');
            $project_id = $pid[0];
            $project_details = DB::table('student_ideas')->where([
            ['id', '=', $project_id],
            ])->get();

              return view('view_all_feedback')->with(compact('project_details','group_id','feedbacks','faculty_name','tsd','presentation_name'));
        }else{
    return view('faculty_login');
              
        }

   }


public function give_feedback($id,Request $request) {


     if ($request->session()->get('key') == 'faculty' || $request->session()->get('key') == 'supervisor'|| $request->session()->get('key') == 'coodinator') {
      
           $group_id = $id;
            $log_id = $request->session()->get('user_id');
            
            $feedbacks = DB::table('feed_backs')->where([
            ['g_id', '=', $group_id],
            ])->get();

            if ($feedbacks == "") {
              $feedbacks = "No Feedback Yet";
            }
            $prese = Scheduled_presentation::all();
            $presentation_name =  $prese[0]->presentation_name;
            
            $ttt = DB::table('feed_backs')->where([
            ['f_id', '=', $log_id],
            ['g_id', '=', $group_id],
            ['presentation_name', '=', $presentation_name],
            ])->get();


            if (count($ttt) > 0) {
              $tsd = 0;
              $request->session()->put('msg1', "Feedback already submitted");
            return redirect()->action('FacultyController@feedbacks');
            }else{
              $tsd = 1;

            if (count($feedbacks) == 0) {
              $feedbacks = [0][0];
              $faculty_name = [0][0];
            }else{
           
            $i=0;
            foreach ($feedbacks as $key) {
            $fid = $key->f_id;
             $f_names = DB::select("select * from faculty_members WHERE faculty_member_id = '$fid'");
             $faculty_name[$i]= $f_names[0]->faculty_member_name;

           
            $i++;
            }

            }

            $pid = DB::table('student_supervisors')->where([
            ['group_id', '=', $group_id],
            ])->pluck('project_id');
            $project_id = $pid[0];
            $project_details = DB::table('student_ideas')->where([
            ['id', '=', $project_id],
            ])->get();

              return view('give_feedback')->with(compact('project_details','group_id','feedbacks','faculty_name','tsd','presentation_name'));
            }
        }else{
    return view('faculty_login');
              
        }

   }


   public function give_fb(Request $request) {
     if ($request->session()->get('key') == 'faculty' || $request->session()->get('key') == 'supervisor') {

      $id = $request->g_id;
      $validator = Validator::make($request->all(), [
            'fb' => 'required'
        ]);
        if($validator->passes()){


            $feed_backs = new FeedBack; 
            $feed_backs->feedback = $request->fb;
            $feed_backs->g_id = $request->g_id;
            $feed_backs->f_id = $request->f_id; 
            $feed_backs->presentation_name = $request->presentation_name; 

            $students = DB::table('students')->where([
            ['group_id', '=', $id],
            ])->get();

            foreach ($students as $key) {
              $s_id =  $key->student_id;
              
              $fb_notifs = new Fb_notifs;
              $fb_notifs->f_id = $request->f_id;
              $fb_notifs->st_id = $s_id;
              $fb_notifs->st = "0";
              $fb_notifs->pres_name = $request->presentation_name;
              
              $fb_notifs->save();

            }
            
              $feed_backs->save();


            $request->session()->put('msg', "Feedback Added Successfully");
            return redirect()->action('FacultyController@view_add_feedback',$id);       
          }
          return redirect('faculty/view_add_feedback',$id)->withErrors($validator)->withInput();
        }else{
    return view('faculty_login');
              
        }

   }



}
