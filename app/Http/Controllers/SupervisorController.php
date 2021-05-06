<?php

namespace App\Http\Controllers;
use App\Coodinator;
use App\Student;
use App\Supervisor;
use App\Faculty_member;
use App\Supervisor_ideas;
use App\Student_idea;
use App\Student_supervisor;
use App\All_quries;
use App\Query_notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;
class SupervisorController extends Controller
{
    function supervisor_login(Request $request){
        
 $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'

        ]);
        if($validator->passes()){
            $supervisor = new Supervisor;
            $supervisor->email = $request->email;
            $supervisor->password = $request->password;
            $hashp = md5($supervisor->password);

            $supervisors = Supervisor::all();
            foreach ($supervisors as $key) {
                # code...
            
            if ($supervisor->email == $key['supervisor_email'] && $hashp == $key['pass']) {
            	# code...
                if ($key['st'] == "0") {
                    # code...
                    $request->session()->put('name', $key['supervisor_name']);
                    $request->session()->put('user_id', $key['supervisor_id']);
                    $request->session()->put('key', 'supervisor');
                 return redirect('supervisor_change_pass')->with(['id'=> $key['id']]);   
                }else{


                  
            
            $request->session()->put('name', $key['supervisor_name']);
            $request->session()->put('user_id', $key['supervisor_id']);
            $request->session()->put('key', 'supervisor');

            return redirect('supervisor_dashboard');
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

     function change_pass_supervisor(Request $request){
         
 $validator = Validator::make($request->all(), [
            'opass' => 'required',
            'npass' => 'required|min:6'

        ]);
        if($validator->passes()){
            $supervisor = new Supervisor;
            $supervisor->opass = md5($request->opass);
            $supervisor->password = md5($request->npass);
            $id = $request->id;

            $supervisors = DB::select("select * from supervisors WHERE id = '$id'");

            if ($supervisor->opass == $supervisors[0]->pass) {
                # code...
            
            // DB::table('supervisors')->update(['pass' => $supervisor->password,'st' => 1]);
             DB::update("update supervisors set pass = '$supervisor->password' WHERE id = '$id'");
             DB::update("update supervisors set st = '1' WHERE id = '$id'");
            $request->session()->put('msg', "Password Changed successfully");
            return redirect('supervisor_dashboard');
            
            }else{
            
            $request->session()->put('msg', "Your Password is incorect");               
            return redirect('/supervisor_change_pass')->with(['id'=> $id]);
            }


        } else {
          $id = $request->id;
            return redirect('/supervisor_change_pass')->with(['id'=> $id])->withErrors($validator)->withInput();
        }
        // dd($request->all());
    } 


 function view_supervisor_dashboard(Request $request){

    if ($request->session()->get('key') == 'supervisor') {
        
        return view('supervisor_dashboard');
       
        }else{
              return redirect('/faculty_login_page');
        }
    }

 function count_not(Request $request){

    if ($request->session()->get('key') == 'supervisor') {
          
         $names = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '<', '2'],
            ])->get();
        
              $req  = count($names);

              if ($req == 0) {
                # code...
                echo " ";
              }else{
              echo $req;
              }
        }else{
              return redirect('/faculty_login_page');
        }
    }


     function count_q_su_not(Request $request){

    if ($request->session()->get('key') == 'supervisor') {
          
         
        $notif = DB::table('query_notifications')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['notif', '=', '0'],
            ['q_from', '=', '0'],
            ['q_for', '=', '1'],
            ])->get();  
        
              $req  = count($notif);

              if ($req == 0) {
                # code...
                echo " ";
              }else{
              echo $req;
              }

        }else{
              return redirect('/faculty_login_page');
        }
    }
 public function supervisor_logout(Request $request) {
      $request->session()->flush('key');
      $request->session()->flush('user_id');
      $request->session()->flush('name');
     return redirect('faculty_login_page');

   }


     public function view_faculty_login_page(Request $request) {
        
     if ($request->session()->get('key') == 'supervisor') {
        
        return view('supervisor_dashboard');
       
        }else{
    return view('supervisor_login');
              
        }

   }


    public function view_students_list(Request $request) {
     if ($request->session()->get('key') == 'supervisor') {
        $students = Student::orderBy('id','desc')->get();
        return view('view_students_list')->with(compact('students'));
       
        }else{
    return view('supervisor_login');
              
        }

   }

   public function view_faculty_list(Request $request) {
     if ($request->session()->get('key') == 'supervisor') {
          $faculty_members = Faculty_member::all();
        return view('view_faculty_list')->with(compact('faculty_members'));
       
        }else{
    return view('supervisor_login');
              
        }

   }

   public function add_idea_supervisor(Request $request) {
     if ($request->session()->get('key') == 'supervisor') {

        return view('add_idea');
       
        }else{
    return view('supervisor_login');
              
        }

   }

   public function add_idea(Request $request) {
     if ($request->session()->get('key') == 'supervisor') {
      
      $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'supervisor_id' => 'required'
        ]);
        if($validator->passes()){

          
            $supervisor_ideas = new Supervisor_ideas;
            $supervisor_ideas->title = $request->title;
            $supervisor_ideas->desc = $request->desc;
            $supervisor_ideas->supervisor_id = $request->supervisor_id; 
             $supervisor_ideas->save();



            $request->session()->put('msg', "Idea Added Successfully");
            return redirect()->action('SupervisorController@add_idea_supervisor');       
          }
          return redirect('supervisor/add_idea_supervisor')->withErrors($validator)->withInput();
        }else{
    return view('supervisor_login');
              
        }

   }

      public function view_project_ideas(Request $request) {
        $names = array();
     if ($request->session()->get('key') == 'supervisor') {
         $supervisor_ideas = Supervisor_ideas::orderBy('id','desc')->get();
          
          foreach ($supervisor_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          array_push($names, $name[0]);
          }
        
        return view('view_supervisors_ideas_list')->with(compact('supervisor_ideas','names'));
       
       
        }else{
    return view('supervisor_login');
              
        }

   }

    public function view_student_request(Request $request) {

        
     if ($request->session()->get('key') == 'supervisor') {
         
          $requested_ideas = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '!=', '2'],
            ['action', '!=', '3'],
            ])->orderBy('id','desc')->get();
          $requested_ideas2 = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '=', '2'],
            ])->orderBy('id','desc')->get();
          $requested_ideas3 = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '=', '3'],
            ])->orderBy('id','desc')->get();

         // $affected = DB::table('student_ideas')
         //      ->where(['supervisor_id'=> $request->session()->get('user_id')],
         //      ['action'=> 0],
         //    )->update(['action' => 1]);
        
        $supervisor_id = $request->session()->get('user_id');
        DB::update("update student_ideas set action = '1' WHERE action = '0' && supervisor_id ='$supervisor_id'");
 
        return view('view_student_request_list')->with(compact('requested_ideas','requested_ideas2','requested_ideas3'));
       
       
        }else{
    return view('supervisor_login');
              
        }

   }

      public function delete_idea($id, Request $request) {
     if ($request->session()->get('key') == 'supervisor') {
        Supervisor_ideas::where('id', $id)->delete();

        $supervisor_ideas = Supervisor_ideas::all();

        $names = array();
        foreach ($supervisor_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          array_push($names, $name[0]);
          }
    
         
        
        $request->session()->put('msg_delete', "Idea Deleted Secessfully");
        return redirect()->action('SupervisorController@view_project_ideas');
        }else{
    return view('supervisor_login');
              
        }

   }

   public function reject_idea($id, Request $request) {

     if ($request->session()->get('key') == 'supervisor') {

        $aa = DB::table('student_ideas')
              ->where('id', $id)
              ->update(['action' => 2]);
        $aa1 = DB::table('student_ideas')
              ->where('id', $id)
              ->update(['student_notif' => 1]);

         $request->session()->put('msg', "Idea Rejected");
         return redirect()->action('SupervisorController@view_student_request');
        }else{
    return view('supervisor_login');
              
        }

   }

     public function accept_idea($id, $id2, Request $request) {

     if ($request->session()->get('key') == 'supervisor') {

      if ($id2 != -1) {
        # code...
      $aa = DB::table('student_ideas')
              ->where('from', $id2)
              ->update(['action' => 2]);        

      }

        $aa = DB::table('student_ideas')
              ->where('id', $id)
              ->update(['action' => 3]);
        $aa1 = DB::table('student_ideas')
              ->where('id', $id)
              ->update(['student_notif' => 1]);
        $supervisor_id = $request->session()->get('user_id');
        $g_id = Student_idea::where('id', $id)->pluck('group_id');
        $group_id = $g_id[0];

        $student_supervisor = new Student_supervisor;
        $student_supervisor->supervisor_id = $supervisor_id;
        $student_supervisor->group_id = $group_id;
         $student_supervisor->project_id = $id; 
        

        $student_supervisor->save();
        
        $request->session()->put('msg', "Idea Accepted");
        
         return redirect()->action('SupervisorController@view_student_request');
        }else{
    return view('supervisor_login');
              
        }

   }

      public function student_idea_details($id, Request $request) {

     if ($request->session()->get('key') == 'supervisor') {

       
        
         $student_idea = DB::table('student_ideas')->where([
            ['id', '=', $id],
            ])->get();
         $ac = DB::table('student_ideas')->where([
            ['id', '=', $id],
            ])->pluck('action');
        $action = $ac[0];
         
         foreach ($student_idea as $key) {
           # code...
         $student_details = DB::table('students')->where([
            ['group_id', '=', $key->group_id],
            ])->get();
        
       }
        return view('view_student_request_details')->with(compact('student_idea','student_details','action'));
        }else{
    return view('supervisor_login');
              
        }

   }

    public function edit_idea($id, Request $request) {
     if ($request->session()->get('key') == 'supervisor') {

        $supervisor_ideas = Supervisor_ideas::where('id', $id)->get();
        return view('view_edit_idea')->with(compact('supervisor_ideas'));
       
        }else{
    return view('supervisor_login');
              
        }

   }


    public function view_my_students(Request $request) {
     if ($request->session()->get('key') == 'supervisor') {

       $groups = Student_supervisor::where('supervisor_id', $request->session()->get('user_id'))->orderBy('id','desc')->get();


       if (count($groups)!=0) {
       $i =0;
       
       foreach ($groups as $key) {
         # code...
        $j =0;
        $students = Student::where('group_id', $key->group_id)->orderBy('id','desc')->get();
        

        foreach ($students as $row) {
          # code...
           if ($row->is_manager == 1) {
            # code...
            $is_manager[$i][$j] = 1;
          }
          else{
           $is_manager[$i][$j] = 0; 
          }
          $name[$i][$j] = $row->student_name;
          $j++;
        }
        $i++;
       }
     }else{
      
        # code...

        $name[0][0] = 0;
        $title[0] = 0;
        $is_manager[0][0] =0;
      }
      $title = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '=', '3'],
            ])->orderBy('id','desc')->pluck('title');

        return view('view_supervised_students_list')->with(compact('groups','name','title','is_manager'));
       
        }else{
    return view('supervisor_login');
              
        }

   }


         function update_idea(Request $request){
          $id = $request->id;
          

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required'

        ]);

        if($validator->passes()){
           
            $supervisor_ideas = new Supervisor_ideas;
            $supervisor_ideas->title = $request->title;
            $supervisor_ideas->desc = $request->desc;
            $supervisor_ideas->supervisor_id = $request->supervisor_id; 

        $affected = DB::table('supervisor_ideas')
              ->where('id', $id)
              ->update(['title' => $supervisor_ideas->title]);
        $affected1 = DB::table('supervisor_ideas')
              ->where('id', $id)
              ->update(['desc' => $supervisor_ideas->desc]);

         
        $names = array();   
        $supervisor_ideas = Supervisor_ideas::orderBy('id','desc')->get();
        foreach ($supervisor_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          array_push($names, $name[0]);
          }
        $request->session()->put('msg', "Idea Updated Successfully");
            return redirect()->action('SupervisorController@view_project_ideas');

              
           

        } else {
           return redirect()->action('SupervisorController@edit_idea',['id' => $id])->withErrors($validator)->withInput();
        }
        // dd($request->all());
    }
   
  public function supervisor_idea_details($id,Request $request) {
     if ($request->session()->has('key')) {
        
        $supervisor_ideas = Supervisor_ideas::where('id', $id)->get();
        $names = array();
        if (count($supervisor_ideas)!=0) {
          
        
        foreach ($supervisor_ideas as $key) {
          $supervisor_id = $key->supervisor_id;
          $name =  Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
          array_push($names, $name[0]);
          }
        }else{
          $name[0] =0; 
        }

        if ($request->session()->get('key') == 'student') {

     $supervisor_idea = Supervisor_ideas::where('id', $id)->get();
     $requested_ideas = DB::table('student_ideas')->where([
     ['from', '=', $id],
     ['action', '=', '3'],
     ])->get();
     if (count($requested_ideas) > 0) {
       # code...
      $requested = 0;
     }else{ 
      $requested = 1;
     }



        $student_id = $request->session()->get('student_id');
         
        $group_id = Student::where('student_id', $student_id)->pluck('group_id');
        
       $g = $group_id[0];

         $cot = Student_idea::where('group_id', $g)->get();
         

         if (count($cot) == 0)  {
           # code...
          $pidea = 1;
         }
         
         else{
         foreach ($cot as $key) {
             # code...
                         
         if($key->action == 0 || $key->action == 1 || $key->action == 3){
            $pidea = 0;
         }
         
         elseif($key->action == 2){
            $pidea = 1;
         }
         
         
        }
         
          }
        }
        elseif ($request->session()->get('key') == 'supervisor') {
          $pidea = 1;
          $requested = 1;
        }

        return view('view_idea_details',['pidea' => $pidea],['requested' => $requested])->with(compact('supervisor_ideas','names'));
       
        }else{
    return view('supervisor_login');
              
        }

   }

      public function supervised_group_details($id,Request $request) {
     if ($request->session()->get('key') == 'supervisor' || $request->session()->get('key') == 'faculty') {

       
             $group_id = $id;
            
            $pid = DB::table('student_supervisors')->where([
            ['group_id', '=', $group_id],
            ])->pluck('project_id');
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

        }else{
    return view('supervisor_login');
              
        }

   }

      public function remove_from_supervison($id,Request $request) {

     if ($request->session()->get('key') == 'supervisor') {

       
            $group_id = $id;
            Student_supervisor::where('group_id', $id)->delete();
            

            $update = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '=', '3'],
            ['group_id', '=', $group_id],
            ])->update(['student_notif' => 1]);

            $update = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '=', '3'],
            ['group_id', '=', $group_id],
            ])->update(['action' => 2]);

            
            DB::table('query_notifications')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['group_id', '=', $group_id],
            ])->delete();
            
            DB::table('all_quries')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['group_id', '=', $group_id],
            ])->delete();

            
          
       $groups = Student_supervisor::where('supervisor_id', $request->session()->get('user_id'))->orderBy('id' , 'desc')->get();


       if (count($groups)!=0) {
       $i =0;
       
       foreach ($groups as $key) {
         # code...
        $j =0;
        $students = Student::where('group_id', $key->group_id)->get();
        

        foreach ($students as $row) {
          # code...
           if ($row->is_manager == 1) {
            # code...
            $is_manager[$i][$j] = 1;
          }
          else{
           $is_manager[$i][$j] = 0; 
          }
          $name[$i][$j] = $row->student_name;
          $j++;
        }
        $i++;
       }
     }else{
      
        # code...

        $name[0][0] = 0;
        $title[0] = 0;
      }
      $title = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '=', '3'],
            ])->pluck('title');


     $request->session()->put('msg_delete', "Group Removed");
    return redirect()->action('SupervisorController@view_my_students');
       

        }else{
    return view('supervisor_login');
              
        }

   }




      function quries_list(Request $request){
     if ($request->session()->get('key') == 'supervisor') {
     

        
        $yes = Student_supervisor::where('supervisor_id', $request->session()->get('user_id'))->get();
        if (count($yes) > 0) {
          # code...
        $ss =1;
        $quries = All_quries::orderBy('updated_at','desc')->where([['supervisor_id', $request->session()->get('user_id')],['reply_of','0']])->get();
        $quries2 = All_quries::orderBy('updated_at','desc')->where([['supervisor_id', $request->session()->get('user_id')],['reply_of','!=','0']])->get();

        $i = 0;
        foreach ($quries as $row) {
          # code...
       if ($row->student_id != 0) {
            # code...
          
        $s_name = Student::where('student_id', $row->student_id)->pluck('student_name');
        $name[$i] = $s_name[0];
           }else if($row->student_id == 0){
        $name[$i] = 'Me';
           }
        $i++;
        }
        if (count($quries) == 0) {
          # code...
          $name[0] = '';
        }
       
       $notif = DB::table('query_notifications')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['notif', '=', '0'],
            ['q_from', '=', '0'],
            ['q_for', '=', '1'],
            ])->get();
        $aa1 = DB::table('query_notifications')->where([
          ['supervisor_id','=', $request->session()->get('user_id')],
          ['q_from','=', '0'],
          ['q_for','=', '1'],
          ])->delete();

     return view('supervisor_quries_list')->with(compact('quries','quries2','name','ss','notif'));

}else{
  $ss = 0; 
  $notif = -1;
   return view('supervisor_quries_list')->with(compact('ss','notif'));

}


      }else{
    return view('supervisor_login');
              
        }
      }



      function ask_query(Request $request){
     if ($request->session()->get('key') == 'supervisor') {
     
      
      $gid = Student_supervisor::where('supervisor_id', $request->session()->get('user_id'))->get();
        $i=0;
      foreach ($gid as $row) {
        # code...

        $ideas_title1 = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '=', '3'],
            ['group_id', '=', $row->group_id],
            ])->orderBy('id','desc')->get();
        $ideas_title[$i] = $ideas_title1[0];
        $i++;
      }


      return view('student_ask_query')->with(compact('ideas_title'));



      }else{
    return view('supervisor_login');
              
        }
      }



            public function delete_query($id, Request $request) {
              if ($request->session()->get('key') == 'student') {
                $reply_of =  All_quries::where('reply_of', $id)->get();
              
              if (count($reply_of) > 0) {

              $request->session()->put('mess_d', 'Query cannot be Deleted');

                return redirect()->action('StudentController@quries_list');
              }else{

              All_quries::where('id', $id)->delete();
              Query_notification::where('q_id', $id)->delete();
              $request->session()->put('mess', "Query Deleted Successfully");
               return redirect()->action('StudentController@quries_list');
            }
              }elseif ($request->session()->get('key') == 'supervisor' ){
              All_quries::where('id', $id)->delete();
              Query_notification::where('q_id', $id)->delete();
              $request->session()->put('mess', "Query Deleted Successfully");
              return redirect()->action('SupervisorController@quries_list');
            }

          }


            public function post_query(Request $request) {
     
     if ($request->session()->get('key') == 'supervisor') {
      $validator = Validator::make($request->all(), [
            'askquery' => 'required',
            'group' => 'required'
            
        ]);
        if($validator->passes() && $request->group != "Select Group:"){
         
            $quries = new All_quries;
            $quries->askquery = $request->askquery;
            $quries->student_id = '0';
            $id = explode(":",$request->group);
            $group_id =  $id[0];
            $quries->group_id = $group_id;
            $quries->supervisor_id = $request->session()->get('user_id');
            $quries->q_from = '1';
            $quries->q_not = '0';
            $quries->reply_of = '0';
            $quries->save();


            $students = Student::where('group_id', $group_id)->get();
            $get_id = All_quries::where([['group_id', $group_id],['supervisor_id',$request->session()->get('user_id')],['q_from','1']])->orderBy('created_at','desc')->pluck('id');

            foreach ($students as $row) {
              # code...
            $notif = new Query_notification;
            $notif->supervisor_id = $request->session()->get('user_id');
            $notif->group_id = $group_id;
            $notif->f_student_id = 0;
            $notif->t_student_id = $row->student_id;
            $notif->notif = '0';
            $notif->q_from = '1';
            $notif->q_for = '0';
            $notif->q_id = $get_id[0];
            $notif->save();

          }
           
             $gid = Student_supervisor::where('supervisor_id', $request->session()->get('user_id'))->get();
     $i=0;
      foreach ($gid as $row) {
        # code...

        $ideas_title1 = DB::table('student_ideas')->where([
            ['supervisor_id', '=', $request->session()->get('user_id')],
            ['action', '=', '3'],
            ['group_id', '=', $row->group_id],
            ])->orderBy('id','desc')->get();
        $ideas_title[$i] = $ideas_title1[0];
        $i++;
      }
       $request->session()->put('msg', "Query Posted Successfully");
       return redirect()->action('SupervisorController@quries_list');
          }

          return redirect('supervisor/ask_query')->withErrors($validator)->withInput();





      }else{
    return view('supervisor_login');
              
        }
      }



    public function reply($id,Request $request) {
        
     if ($request->session()->get('key') == 'supervisor') {
        

      $query = All_quries::where('id', $id)->get();
      $sname = Student::where('student_id', $query[0]->student_id)->pluck('student_name');
       $name = $sname[0];
      

        return view('query_reply')->with(compact('query','name'));
       
        }else{
    return view('supervisor_login');
              
        }

   }

   public function stquery_details($id,Request $request) {
        
      $query = All_quries::where('id', $id)->get();
      $sname = Student::where('student_id', $query[0]->student_id)->pluck('student_name');
      $name = $sname[0];
      if ($request->session()->get('key') == 'supervisor') { $test = 1; }
      if ($request->session()->get('key') == 'student') { $test = 0; }
      return view('query_details')->with(compact('query','name','test'));
    
         

   }

   public function suquery_details($id,Request $request) {
        
      $query = All_quries::where('id', $id)->get();
      $sname = Supervisor::where('supervisor_id', $query[0]->supervisor_id)->pluck('supervisor_name');
      $name = $sname[0];
      $test = 0;
      return view('query_details')->with(compact('query','name','test'));
       
      

   }


    public function reply_query(Request $request) {
     
     if ($request->session()->get('key') == 'supervisor') {
      $validator = Validator::make($request->all(), [
            'askquery' => 'required'
            
        ]);
        if($validator->passes() && $request->group != "Select Group:"){
         
            $quries = new All_quries;
            $query = All_quries::where('id', $request->id)->get();

            $quries->askquery = $request->askquery;
            $group_id =  $query[0]->group_id;
            $quries->group_id = $group_id;
            $quries->supervisor_id = $request->session()->get('user_id');
            $quries->q_from = '1';
            $quries->q_not = '0';
            $quries->student_id = '0';
            $quries->reply_of = $request->id;
            $quries->save();


            $students = Student::where('group_id', $group_id)->get();
            $get_id = All_quries::where([['group_id', $group_id],['supervisor_id',$request->session()->get('user_id')],['q_from','1']])->orderBy('created_at','desc')->pluck('id');
            foreach ($students as $row) {
              # code...
            $notif = new Query_notification;
            $notif->supervisor_id = $request->session()->get('user_id');
            $notif->group_id = $group_id;
            $notif->f_student_id = 0;
            $notif->t_student_id = $row->student_id;
            $notif->notif = '0';
            $notif->q_from = '1';
            $notif->q_for = '0';
            $notif->is_reply = '1';
            $notif->q_id = $get_id[0];
            $notif->save();

          }
            $query = All_quries::where('id', $request->id)->get();
            $tt = $query[0]->q_not + 1;
            DB::update("update all_quries set q_not = '$tt' WHERE id = '$request->id'");
      $sname = Student::where('student_id', $query[0]->student_id)->pluck('student_name');
       $name = $sname[0];
      

          $request->session()->put('msg', "Reply Posted Successfully");
          return redirect()->action('SupervisorController@quries_list');
          }

          return redirect()->action('SupervisorController@reply',['id' => $request->id])->withErrors($validator)->withInput();






      }else{
    return view('supervisor_login');
              
        }
      }



    

}
