<?php

namespace App\Http\Controllers;
use App\Coodinator;
use App\Student;
use App\Student_group;
use App\Supervisor;
use App\Faculty_member;
use App\Supervisor_ideas;
use App\Student_idea;
use App\Student_supervisor;
use App\All_quries;
use App\Capston_calendar;
use App\Query_notification;
use App\Scheduled_presentation;
use App\FeedBack;
use App\Fb_notifs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Validation\Rule; //import Rule class 

use DB;

class CoodinatorController extends Controller
{
  function coodinator_login(Request $request){

   $validator = Validator::make($request->all(), [
    'email' => 'required',
    'password' => 'required'

  ]);
   if($validator->passes()){
    $coodinator = new Coodinator;
    $coodinator->email = $request->email;
    $coodinator->password = $request->password;

    if ($coodinator->email == "Coordinator@gift.edu.pk" && $coodinator->password == "123456") {
            	# code...

      $request->session()->put('key', 'coodinator');
      $request->session()->put('name', 'coodinator');

      return redirect('coodinator_dashboard');
    }else{
      $request->session()->put('msg', "Emaill and password does't match");

      return redirect('/');
    }


  } else {
    return redirect('/')->withErrors($validator)->withInput();
  }
        // dd($request->all());
} 


function add_new_student(Request $request){

  $validator = Validator::make($request->all(), [
    'name' => 'required|regex:/^[a-zA-Z ]+$/u',
    'email' => 'required|regex:/^[0-9\.]*@(gift)[.](edu.pk)$/',
    'id' => 'required',
    'cgpa' => 'required|lt:4.1|gt:0'

  ]);
  if($validator->passes()){
    $student = new Student;
    $student->student_name = $request->name;
    $student->student_email = $request->email;
    $student->student_id = $request->id;
    $student->cgpa = $request->cgpa;
    $student->st = "0";
    $student->in_a_group = "0";
    $student->is_manager = "0";
    $student->group_id = "0";

    $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
    $password = substr($random, 0, 5);
    $student->pass = $password;
    $student->pass = md5($student->pass);

    $query = DB::select("select * from students WHERE student_email = '$student->student_email'");
    if (count($query) != 0) {
                # code...

      $request->session()->put('msg1', "Emaill Already Exists");               
      return redirect('cdashboard/add_student');
      die();

    }
    $query1 = DB::select("select * from students WHERE student_id = '$student->student_id'"); 
    if (count($query1) != 0) {
                # code...

      $request->session()->put('msg2', "Student ID Already Exists");               
      return redirect('cdashboard/add_student');
      die();
    } else{


     $student->save();


     $data = array(
      'name' => $student->student_name,
      'email' => $student->student_email,
      'pass' => $password
    );
     Mail::to($student->student_email)->send(new SendMail($data));




     $request->session()->put('msg', "Student Added Successfully");              
     return redirect()->action('CoodinatorController@view_add_student');
   }

 } else {

           // echo $validator->errors()->first('email');


  return redirect('cdashboard/add_student')->withErrors($validator)->withInput();
}
        // dd($request->all());
}

function add_new_supervisor(Request $request){

  $validator = Validator::make($request->all(), [
    'name' => 'required|regex:/^[a-zA-Z ]+$/u',
    'email' => 'required|regex:/^[0-9\.]*@(gift)[.](edu.pk)$/',

    'id' => 'required'
  ]);
  if($validator->passes()){
    $supervisor = new Supervisor;
    $supervisor->supervisor_name = $request->name;
    $supervisor->supervisor_email = $request->email;
    $supervisor->supervisor_id = $request->id;
    $supervisor->st = "0";
    $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
    $password = substr($random, 0, 5);
    $supervisor->pass = $password;
    $supervisor->pass = md5($supervisor->pass);
    $query = DB::select("select * from supervisors WHERE supervisor_email = '$supervisor->supervisor_email'");
    if (count($query) != 0) {
                # code...

      $request->session()->put('msg1', "Emaill Already Exists");               
      return redirect('cdashboard/add_supervisor');
      die();

    }
    $query1 = DB::select("select * from supervisors WHERE supervisor_id = '$supervisor->supervisor_id'"); 
    if (count($query1) != 0) {
                # code...

      $request->session()->put('msg2', "Supervisor ID Already Exists");               
      return redirect('cdashboard/add_supervisor');
      die();
    } else{

      $supervisor->save();
      $data = array(
        'name' => $supervisor->supervisor_name,
        'email' => $supervisor->supervisor_email,
        'pass' => $password
      );
      Mail::to($supervisor->supervisor_email)->send(new SendMail($data));

      $request->session()->put('msg', "Supervisor Added Successfully");              
      return redirect('cdashboard/add_supervisor');

    }

  } else {
    return redirect('cdashboard/add_supervisor')->withErrors($validator)->withInput();
  }
        // dd($request->all());
}


function add_new_faculty(Request $request){




  $validator = Validator::make($request->all(), [
    'name' => 'required|regex:/^[a-zA-Z ]+$/u',
    'email' => 'required|regex:/^[0-9\.a-zA-Z]*@(gift)[.](edu.pk)$/',

    'id' => 'required'
  ]);
  if($validator->passes()){
    $faculty_member = new Faculty_member;
    $faculty_member->faculty_member_name = $request->name;
    $faculty_member->faculty_member_email = $request->email;
    $faculty_member->faculty_member_id = $request->id;
    $faculty_member->st = "0";

    if ($request->is_supervisor == "on") {
           # code...
      $faculty_member->is_supervisor = 1;
    }else{
      $faculty_member->is_supervisor = 0;
    }
    $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
    $password = substr($random, 0, 5);
    $faculty_member->pass = $password;
    $faculty_member->pass = md5($faculty_member->pass);
    $query = DB::select("select * from faculty_members WHERE faculty_member_email = '$faculty_member->faculty_member_email'");
    if (count($query) != 0) {
                # code...

      $request->session()->put('msg1', "Emaill Already Exists");               
      return redirect('cdashboard/add_faculty');
      die();

    }
    $query1 = DB::select("select * from faculty_members WHERE faculty_member_id = '$faculty_member->faculty_member_id'"); 
    if (count($query1) != 0) {
                # code...

      $request->session()->put('msg2', "Faculty Member ID Already Exists");               
      return redirect('cdashboard/add_faculty');
      die();
    } else{

      $faculty_member->save();
      $data = array(
        'name' => $faculty_member->faculty_member_name,
        'email' => $faculty_member->faculty_member_email,
        'pass' => $password
      );
      Mail::to($faculty_member->faculty_member_email)->send(new SendMail($data));

      if ($request->is_supervisor == "on") {
           # code...
        $supervisor = new Supervisor;
        $supervisor->supervisor_name = $request->name;
        $supervisor->supervisor_email = $request->email;
        $supervisor->supervisor_id = $request->id;
        $supervisor->save();
      }
      $request->session()->put('msg', "Faculty Member Added Successfully");              
      return redirect()->action('CoodinatorController@view_add_faculty');

    }

  } else {
    return redirect('cdashboard/add_faculty')->withErrors($validator)->withInput();
  }
        // dd($request->all());
}

function viewcdashboard(Request $request){

  if ($request->session()->get('key') == 'coodinator') {


    return view('cdashboard');
  }else{
    return redirect('/');
  }

}
function coodinatorlogin(){

  return view('coodinator_login');
}
function view_add_student(Request $request){


  if ($request->session()->get('key') == 'coodinator') {

    return view('add_student');
  }else{
    return redirect('/');
  }
}
function view_add_supervisor(Request $request){
 if ($request->session()->get('key') == 'coodinator') {

  return view('add_supervisor');

}else{
  return redirect('/');
}
}
function view_add_faculty(Request $request){
 if ($request->session()->get('key') == 'coodinator') {

  return view('add_faculty_member');

}else{
  return redirect('/');
}
}

public function logout(Request $request) {
  $request->session()->flush('key');
  $request->session()->flush('name');
  return redirect('/');

}

public function view_coodinator_login_page(Request $request) {
 if ($request->session()->get('key') == 'coodinator') {

  return view('cdashboard');

}else{
  return view('Coodinator_login');

}

}



public function add_new_member_list($id,Request $request) {

 if ($request->session()->get('key') == 'coodinator') {
  $students = Student::all();

  $data['ggid']=$id;
  return view('add_new_member_to_group_view')->with(compact('students','data'));

}else{
  return view('Coodinator_login');

}

}

public function view_students_list(Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
  $students = Student::orderBy('group_id','asc')->get();

  return view('view_students_list')->with(compact('students'));

}else{
  return view('Coodinator_login');

}

}
public function view_supervisors_list(Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
   $supervisor = Supervisor::orderBy('id','desc')->get();
   return view('view_supervisors_list')->with(compact('supervisor'));


 }else{
  return view('Coodinator_login');

}

}   
public function view_faculty_list(Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
  $faculty_members = Faculty_member::orderBy('id','desc')->get();
  return view('view_faculty_list')->with(compact('faculty_members'));

}else{
  return view('Coodinator_login');

}

}
public function delete_student($id, Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
  $student_id = Student::where('id', $id)->get();
  foreach ($student_id as $key) {
          # code...
    $group_id = $key->group_id;
    $student_id = $key->student_id;
  }

  $tg = Student::where('group_id', $group_id)->get();
  if (count($tg) == 3) {

    $request->session()->put('1msg', "Cannot Delete | student is in a group of three member");
    return redirect()->action('CoodinatorController@view_students_list');
  }else{


    All_quries::where('student_id', $student_id)->delete();
    Query_notification::where('f_student_id', $id)->delete();

    $student_group = Student_group::where('group_id', $group_id)->get();
    foreach ($student_group as $key) {
          # code...

      if ($key->student1 == $student_id) {
            # code...
        DB::update("update student_groups set student1 = '0' WHERE group_id = '$group_id'");
      } 
      elseif ($key->student2 == $student_id) {
            # code...
        DB::update("update student_groups set student2 = '0' WHERE group_id = '$group_id'");
      }
      elseif ($key->student3 == $student_id) {
            # code...
        DB::update("update student_groups set student3 = '0' WHERE group_id = '$group_id'");
      }
      elseif ($key->student4 == $student_id) {
            # code...
        DB::update("update student_groups set student4 = '0' WHERE group_id = '$group_id'");
      }
      elseif ($key->student5 == $student_id) {
            # code...
        DB::update("update student_groups set student5 = '0' WHERE group_id = '$group_id'");
      }
    }

    $s = Student::where('id', $id)->get();
    Student::where('id', $id)->delete();
    $students = Student::orderBy('group_id','asc')->get();

    $request->session()->put('msg_delete', "Student Deleted Secessfully ...");
    return redirect()->action('CoodinatorController@view_students_list');
  }
}else{
  return view('Coodinator_login');

}

}

public function remove_from_group($id,$id1, Request $request) {

 if ($request->session()->get('key') == 'coodinator') {
  $group = Student_group::where('group_id', $id)->get();

  $tm = Student::where('group_id', $id)->get();
  if (count($tm) == 3) {
    $request->session()->put('1msg', "Cannot delete | Group must contain atleast 3 members");
    return redirect()->action('CoodinatorController@student_group_details',$id);
  }else{




    All_quries::where('student_id', $id1)->delete();
    Query_notification::where('f_student_id', $id1)->delete();

    foreach ($group as $key) {
          # code...
      if ($key->student1 == $id1) {
            # code...
        DB::update("update student_groups set student1 = '0' WHERE group_id = '$id'");
      } 
      elseif ($key->student2 == $id1) {
            # code...
        DB::update("update student_groups set student2 = '0' WHERE group_id = '$id'");
      }
      elseif ($key->student3 == $id1) {
            # code...
        DB::update("update student_groups set student3 = '0' WHERE group_id = '$id'");
      }
      elseif ($key->student4 == $id1) {
            # code...
        DB::update("update student_groups set student4 = '0' WHERE group_id = '$id'");
      }
      elseif ($key->student5 == $id1) {
            # code...
        DB::update("update student_groups set student5 = '0' WHERE group_id = '$id'");
      }
    }
    $affected = DB::table('students')
    ->where('student_id', $id1)
    ->update(['group_id' => 0]);
    $affected1 = DB::table('students')
    ->where('student_id', $id1)
    ->update(['in_a_group' => 0]);
    $affected2 = DB::table('students')
    ->where('student_id', $id1)
    ->update(['is_manager' => 0]);



    $request->session()->put('msg_delete', "Student removed Secessfully ...");
    return redirect()->action('CoodinatorController@student_group_details',$id);

  }
}else{
  return view('Coodinator_login');

}

}


public function add_to_group($id,$id1, Request $request) {

 if ($request->session()->get('key') == 'coodinator') {


  $group = Student_group::where('group_id', $id1)->get();



  $p = 0;
  foreach ($group as $key) {
          # code...
    if ($key->student1 == 0) {
            # code...
      DB::update("update student_groups set student1 = $id WHERE group_id = '$id1'");
      $p =1;
    } 
    elseif ($key->student2 == 0 && $p == 0) {
            # code...
      DB::update("update student_groups set student2 = $id WHERE group_id = '$id1'");
      $p =1;
    }
    elseif ($key->student3 == 0 && $p == 0) {
            # code...
      DB::update("update student_groups set student3 = $id WHERE group_id = '$id1'");
      $p =1;
    }
    elseif ($key->student4 == 0 && $p == 0) {
            # code...
      DB::update("update student_groups set student4 = $id WHERE group_id = '$id1'");
      $p =1;
    }
    elseif ($key->student5 == 0 && $p == 0) {
            # code...
      DB::update("update student_groups set student5 = $id WHERE group_id = '$id1'");
      $p =1;
    }
  }

  $affected = DB::table('students')
  ->where('student_id', $id)
  ->update(['group_id' => $id1]);
  $affected1 = DB::table('students')
  ->where('student_id', $id)
  ->update(['in_a_group' => 1]);


  $students = Student::where('group_id', $id1)->get();
  $student_n = Student::where('student_id', $id)->pluck('student_name');

  foreach ($students as $key) {
   $supervisor_id = Student_supervisor::where('group_id', $id1)->pluck('supervisor_id');
   if (count($supervisor_id) > 0) {
           # code...
     $ss = Supervisor::where('supervisor_id', $supervisor_id[0])->pluck('supervisor_name');
     $sname = $ss[0];
   }else{
    $sname = 'None';
  }
}
$request->session()->put('msg', $student_n[0].' is added to group sucessfully');
return redirect()->action('CoodinatorController@student_group_details',$id1);

}else{
  return view('Coodinator_login');

}

}
public function delete_student_group($id, Request $request) {
 if ($request->session()->get('key') == 'coodinator') {

  $groups = Student_group::where('group_id', $id)->get();
  Student_group::where('group_id', $id)->delete();
  Student_supervisor::where('group_id', $id)->delete();
  Student_idea::where('group_id', $id)->delete(); 
  All_quries::where('group_id', $id)->delete();
  Query_notification::where('group_id', $id)->delete();
  $students = Student::where('group_id', $id)->get();

  foreach ($students as $key){         

    DB::update("update students set is_manager = '0' WHERE group_id = '$id'");
    DB::update("update students set in_a_group = '0' WHERE group_id = '$id'");
    DB::update("update students set group_id = '' WHERE group_id = '$id'");
  }

  $groups = Student_group::get();
  $i =0;
  if (count($groups)  > 0) {
                 # code...

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
 $supervisor_id = Student_supervisor::where('group_id', $key->group_id)->pluck('supervisor_id');

 if(count($supervisor_id) != 0){
  $ss = Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
  $sname[$i] = $ss[0]; 
}else{
 $sname[$i] = 'Null';
}
$i++;
}
}else{
  $name[0][0] ='null';
  $sname[0] = 'null';
  $is_manager[0][0] = 0;
}


$request->session()->put('msg_delete', "Student Group Deleted Secessfully ...");
return redirect()->action('CoodinatorController@view_students_groups');


}else{
  return view('Coodinator_login');

}

}


public function delete_supervisor($id, Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
  $s = Supervisor::where('id', $id)->get();
  foreach ($s as $key) {
          # code...
    $supervisor_id = $key->supervisor_id;
  }

  All_quries::where('supervisor_id', $supervisor_id)->delete();
  FeedBack::where('f_id', $supervisor_id)->delete();
  Fb_notifs::where('f_id', $supervisor_id)->delete();
  Query_notification::where('supervisor_id', $supervisor_id)->delete();
  $affected0 = DB::table('faculty_members')
  ->where('faculty_member_id', $supervisor_id)
  ->update(['is_supervisor' => 0]);
  $affected = DB::table('student_ideas')
  ->where('supervisor_id', $supervisor_id)
  ->update(['action' => 2]);
  $affected1 = DB::table('student_ideas')
  ->where('supervisor_id', $supervisor_id)
  ->update(['student_notif' => 1]);
  Student_supervisor::where('supervisor_id', $supervisor_id)->delete();
  Supervisor_ideas::where('supervisor_id', $supervisor_id)->delete();
  Supervisor::where('id', $id)->delete();
  $supervisor = Supervisor::all();

  $request->session()->put('msg', "Supervisor Deleted Secessfully ...");
  return redirect()->action('CoodinatorController@view_supervisors_list');

}else{
  return view('Coodinator_login');

}

}


public function delete_faculty($id, Request $request) {
 if ($request->session()->get('key') == 'coodinator') {

  $f = Faculty_member::where('id', $id)->get();
  $is_supervisor = Faculty_member::where('id', $id)->pluck('is_supervisor');
  if ($is_supervisor[0] == 0) {


    FeedBack::where('f_id', $id)->delete();
    Fb_notifs::where('f_id', $id)->delete();
    Faculty_member::where('id', $id)->delete();
    $faculty_members = Faculty_member::orderBy('id','desc')->get();

    $request->session()->put('msg', "Faculty Member Deleted Secessfully ...");
    return redirect()->action('CoodinatorController@view_faculty_list');
  }else{
    $faculty_members = Faculty_member::orderBy('id','desc')->get();
    $request->session()->put('msg1', "Faculty Member is a Supervisor first delete from Supervisor List ...");
    return redirect()->action('CoodinatorController@view_faculty_list');
  }
}else{
  return view('Coodinator_login');

}

}

public function edit_student($id, Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
  $students = Student::where('id', $id)->get();
  return view('view_edit_student')->with(compact('students'));

}else{
  return view('Coodinator_login');

}

}



public function edit_supervisor($id, Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
  $supervisor = Supervisor::where('id', $id)->get();
  return view('view_edit_supervisor')->with(compact('supervisor'));

}else{
  return view('Coodinator_login');

}

}


public function edit_faculty($id, Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
  $faculty_members = Faculty_member::where('id', $id)->get();
  return view('view_edit_faculty')->with(compact('faculty_members'));

}else{
  return view('Coodinator_login');

}

}




function update_student($id, Request $request){

  $validator = Validator::make($request->all(), [

    'name' => 'required|regex:/^[a-zA-Z ]+$/u',
    'student_id' => 'required|unique:students,student_id,'.$id,
            // 'student_email' => 'required|unique:students',
    'student_email' => 'required|regex:/^[0-9\.]*@(gift)[.](edu.pk)$/|unique:students,student_email,'.$id,

    'cgpa' => 'required|lt:4.1|gt:0'

  ]);
  if($validator->passes()){
    $student = new Student;
    $student->student_name = $request->name;
    $student->student_email = $request->student_email;
    $student->student_id = $request->student_id;
    $student->cgpa = $request->cgpa;

    DB::update("update students set student_name = '$student->student_name' WHERE id = '$id'");
    DB::update("update students set student_email = '$student->student_email' WHERE id = '$id'");
    DB::update("update students set student_id = '$student->student_id' WHERE id = '$id'");  
    DB::update("update students set cgpa = '$student->cgpa' WHERE id = '$id'");  

    $students = Student::orderBy('group_id','asc')->get();
    $request->session()->put('msg', "Student Updated Successfully");
    return redirect()->action('CoodinatorController@view_students_list');



  } else {
   return redirect()->action('CoodinatorController@edit_student',['id' => $id])->withErrors($validator)->withInput();
 }
        // dd($request->all());
}

function update_supervisor($id, Request $request){

  $validator = Validator::make($request->all(), [
    'name' => 'required|regex:/^[a-zA-Z ]+$/u',
    'supervisor_email' => 'required|regex:/^[0-9\.]*@(gift)[.](edu.pk)$/|unique:supervisors,supervisor_email,'.$id,
    'supervisor_id' => 'required|unique:supervisors,supervisor_id,'.$id

  ]);

  if($validator->passes()){
    $supervisor = new Supervisor;
    $supervisor->supervisor_name = $request->name;
    $supervisor->supervisor_email = $request->supervisor_email;
    $supervisor->supervisor_id = $request->supervisor_id;

    DB::update("update supervisors set supervisor_name = '$supervisor->supervisor_name' WHERE id = '$id'");
    DB::update("update supervisors set supervisor_email = '$supervisor->supervisor_email' WHERE id = '$id'");
    DB::update("update supervisors set supervisor_id = '$supervisor->supervisor_id' WHERE id = '$id'");  



    $supervisor = Supervisor::all();
    $request->session()->put('msg', "Supervisor Updated Successfully");
    return view('view_supervisors_list')->with(compact('supervisor'));




  } else {
   return redirect()->action('CoodinatorController@edit_supervisor',['id' => $id])->withErrors($validator)->withInput();
 }
        // dd($request->all());
}


function update_faculty($id, Request $request){

  $validator = Validator::make($request->all(), [
    'name' => 'required|regex:/^[a-zA-Z ]+$/u',

    'faculty_member_email' => 'required|regex:/^[0-9\.a-zA-Z]*@(gift)[.](edu.pk)$/|unique:faculty_members,faculty_member_email,'.$id,            
    'faculty_member_id' => 'required|unique:faculty_members,faculty_member_id,'.$id

  ]);

  if($validator->passes()){
    $supervisor_id1 = Faculty_member::where('id',$id)->pluck('faculty_member_id');
    $supervisor_id = $supervisor_id1[0];

    $faculty_members = new Faculty_member;
    $faculty_members->faculty_members_name = $request->name;
    $faculty_members->faculty_members_email = $request->faculty_member_email;
    $faculty_members->faculty_members_id = $request->faculty_member_id;

    DB::update("update faculty_members set faculty_member_name = '$faculty_members->faculty_members_name' WHERE id = '$id'");
    DB::update("update faculty_members set faculty_member_email = '$faculty_members->faculty_members_email' WHERE id = '$id'");
    DB::update("update faculty_members set faculty_member_id = '$faculty_members->faculty_members_id' WHERE id = '$id'");  

    $is_supervisor = Faculty_member::where('id',$id)->pluck('is_supervisor');

    if ($is_supervisor[0] == 1) {

      $supervisor = new Supervisor;
      $supervisor->supervisor_name = $request->name;
      $supervisor->supervisor_email = $request->faculty_member_email;
      $supervisor->supervisor_id = $request->faculty_member_id;

      DB::update("update supervisors set supervisor_name = '$supervisor->supervisor_name' WHERE supervisor_id = '$supervisor_id'");

      DB::update("update supervisors set supervisor_email = '$supervisor->supervisor_email' WHERE supervisor_id = '$supervisor_id'");
      DB::update("update supervisors set supervisor_id = '$supervisor->supervisor_id' WHERE supervisor_id = '$supervisor_id'");

      $faculty_members = Faculty_member::orderBy('id','desc')->get();
      $request->session()->put('msg', "Faculty Member + Supervisor Updated Successfully");
      return redirect()->action('CoodinatorController@view_faculty_list');
    }else{

      $faculty_members = Faculty_member::orderBy('id','desc')->get();
      $request->session()->put('msg', "Faculty Member Updated Successfully");
      return redirect()->action('CoodinatorController@view_faculty_list');
    }



  } else {
            // return redirect('view_edit_faculty')->withErrors($validator)->withInput();
   return redirect()->action('CoodinatorController@edit_faculty',['id' => $id])->withErrors($validator)->withInput();
 }
        // dd($request->all());
}


function create_group(Request $request){

  $check = $request->check;
  $student1 = 0;
  $student2 = 0;
  $student3 = 0;
  $student4 = 0;
  $student5 = 0;

  if (!isset($check)) {
          # code...
    $students = Student::orderBy('group_id','asc')->get();
    $request->session()->put('1msg', "Group must contain 3 to 5 students");
    return redirect()->action('CoodinatorController@view_students_list');
  }else{
    $size = count($check);
    if ($size < 3 || $size >5) {
          # code...\
     $students = Student::orderBy('group_id','asc')->get();
     $request->session()->put('1msg', "Group must contain 3 to 5 students");
     return redirect()->action('CoodinatorController@view_students_list');
   }else{

    for ($i=0; $i < $size ; $i++) { 
          # code...
      if ($i == 0) {
            # code...
        $student1 = $check[$i];
      }
      if ($i == 1) {
            # code...
        $student2 = $check[$i];
      }
      if ($i == 2) {
            # code...
        $student3 = $check[$i];
      }
      if ($i == 3) {
            # code...
        $student4 = $check[$i];
      }
      if ($i == 4) {
            # code...
        $student5 = $check[$i];
      }

    }
  }


  $student_group = new Student_group;
  $student_group->student1 = $student1;
  $student_group->student2 = $student2;
  $student_group->student3 = $student3;
  $student_group->student4 = $student4;
  $student_group->student5 = $student5;
        // $random = str_shuffle('234567890');
        // $group_id = substr($random, 0, 5);

  $all_g = Student_group::orderBy('id','desc')->pluck('group_id');

        // echo $all_g[0];
        // die();

  if (count($all_g) == 0) {
    $group_id = "1";
          # code...
  }else{

    $group_id = $all_g[0]+1;

  }


  $student_group->group_id = $group_id;

  $student_group->save();


  foreach ($check as $key) {
   $key1 = explode(' ', $key);

   foreach ($key1 as $key2){         

     $student_id = $key2; 
     DB::update("update students set in_a_group = '1' WHERE student_id = '$student_id'");
     DB::update("update students set group_id = '$group_id' WHERE student_id = '$student_id'");
   }
 }

 $students = Student::orderBy('group_id','asc')->get();

 $request->session()->put('msg', "Group Created Successfully");
 return redirect()->action('CoodinatorController@view_students_list');
}
}

public function view_students_groups(Request $request) {
 if ($request->session()->get('key') == 'coodinator' || $request->session()->get('key') == 'faculty' || $request->session()->get('key') == 'supervisor') {

   $groups = Student_group::orderBy('id','desc')->get();

   if (count($groups)!=0) {
     $i = 0;

     foreach ($groups as $key) {
         # code...
      $j = 0;
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


     $supervisor_id = Student_supervisor::where('group_id', $key->group_id)->pluck('supervisor_id');

     if(count($supervisor_id) != 0){
      $ss = Supervisor::where('supervisor_id', $supervisor_id)->pluck('supervisor_name');
      if (count($ss) > 0) {
            # code...
        $sname[$i] = $ss[0]; 
      }else{
        $sname = 'null';
      }
    }else{
      $sname[$i] = 'Null';
    }

    $i++;
  }




}else{

        # code...
  $sname[0] = 'Null';
  $name[0][0] =0;
  $is_manager[0][0] = 0;
}


return view('view_students_groups_list')->with(compact('groups','name','sname','is_manager'));

}else{
  return view('Coodinator_login');

}

}

public function student_group_details($id,Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
   $students = Student::where('group_id', $id)->get();

   foreach ($students as $key) {
     $supervisor_id = Student_supervisor::where('group_id', $id)->pluck('supervisor_id');
     if (count($supervisor_id) > 0) {
           # code...
       $ss = Supervisor::where('supervisor_id', $supervisor_id[0])->pluck('supervisor_name');
       $sname = $ss[0];
     }else{
      $sname = 'None';
    }
  }
  return view('view_group_details')->with(compact('students','sname'));

}else{
  return view('Coodinator_login');

}

}

public function make_manager($id,$id1, Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
  $students = Student::where('group_id', $id1)->get();
  $student_name = Student::where('student_id', $id)->pluck('student_name');
  foreach ($students as $key) {
   $supervisor_id = Student_supervisor::where('group_id', $id1)->pluck('supervisor_id');
   if (count($supervisor_id) > 0) {
           # code...
     $ss = Supervisor::where('supervisor_id', $supervisor_id[0])->pluck('supervisor_name');
     $sname = $ss[0];
   }else{
    $sname = 'None';
  }
}
foreach ($students as $key) {
          # code...
  DB::update("update students set is_manager = '0' WHERE student_id = '$key->student_id'");
}
$nn =  $student_name[0];

DB::update("update students set is_manager = '1' WHERE student_id = '$id'");
$request->session()->put('msg', $nn.' is manager now');
return redirect()->action('CoodinatorController@student_group_details',$id1);

}else{
  return view('Coodinator_login');

}

}


public function make_supervisor($id, Request $request) {
 if ($request->session()->get('key') == 'coodinator') {
  $member = Faculty_member::orderBy('id','desc')->where('id', $id)->get();


  foreach ($member as $key) {
    $supervisor = new Supervisor;
    $supervisor->supervisor_name = $key->faculty_member_name;
    $supervisor->supervisor_email = $key->faculty_member_email;
    $supervisor->supervisor_id = $key->faculty_member_id;           
    $supervisor->save();
  }

  DB::update("update faculty_members set is_supervisor = '1' WHERE id = '$id'");
  $faculty_members = Faculty_member::orderBy('id','desc')->get();

  $request->session()->put('msg', "Supervisor Added Successfully");              

  return redirect()->action('CoodinatorController@view_faculty_list');






}else{
  return view('Coodinator_login');

}

}

function validation_check_name(Request $request){

 $name = $request->name;

 $validator = Validator::make($request->all(), [
  'name' => 'required|regex:/^[a-zA-Z ]+$/u',

]);
 if($validator->passes()){

 }else{
  echo $validator->errors()->first('name');

}

}

function validation_check_email(Request $request){

 $name = $request->Email;

 $validator = Validator::make($request->all(), [
  'email' => 'required|regex:/^[0-9\.]*@(gift)[.](edu.pk)$/',

]);
 if($validator->passes()){

 }else{
  echo $validator->errors()->first('email');

}

}

function validation_check_email_faculty(Request $request){

 $name = $request->Email;

 $validator = Validator::make($request->all(), [
  'email' => 'required|regex:/^[0-9\.a-zA-Z]*@(gift)[.](edu.pk)$/',

]);
 if($validator->passes()){

 }else{
  echo $validator->errors()->first('email');

}

}

function CPM_view_calendar(){

  $events = Capston_calendar::orderBy('start_date','asc')->get();

  return view('view_calendar')->with(compact('events'));

}

function edit_event($id){

  $events = Capston_calendar::where('id',$id)->get();

  return view('edit_calender')->with(compact('events'));

}
function delete_event($id, Request $request){

  Capston_calendar::where('id', $id)->delete();
  $request->session()->put('msg', "Event Deleted Successfully");
  return redirect()->action('CoodinatorController@CPM_view_calendar');

}


function add_calender(Request $request){
  if ($request->session()->get('key') == 'coodinator') {

    return view('add_calender');

  }    
}

function add_event(Request $request){

  $validator = Validator::make($request->all(), [
    'title' => 'required',
    'week' => 'required',
  // 'current_date' => 'required',
  // 'start_date' => 'required|date_format:Y-m-d|after:current_date|unique:capston_calendars,start_date,'.$request->start_date,
  // 'end_date' => 'required|date_format:Y-m-d||unique:capston_calendars,end_date,'.$request->end_date,

  ]);
  if($validator->passes()){
    $calendar = new Capston_calendar;
    $calendar->title = $request->title;
    $calendar->week = $request->week;
    $calendar->start_date = 0;
    $calendar->end_date = 0;

            // $calendar->start_date = $request->start_date;
            // $calendar->end_date = $request->end_date;

    $calendar->save();

    $request->session()->put('msg', "Event Added Successfully");              
    return redirect()->action('CoodinatorController@add_calender');

  }

  else {


    return redirect('/cdashboard/add_calender')->withErrors($validator)->withInput();
  }
        // dd($request->all());
}

function upadate_event(Request $request){

  $validator = Validator::make($request->all(), [
    'title' => 'required',
    'week' => 'required',
  // 'current_date' => 'required',
  // 'start_date' => 'required|date_format:Y-m-d|after:current_date|unique:capston_calendars,start_date,'.$request->start_date,
  // 'end_date' => 'required|date_format:Y-m-d||unique:capston_calendars,end_date,'.$request->end_date,

  ]);
  if($validator->passes()){

    $id = $request->id;
    $title = $request->title;
    $week = $request->week;

            // $start_date = $request->start_date;
            // $end_date = $request->end_date;

    DB::update("update capston_calendars set title = '$title' WHERE id = '$id'");
    DB::update("update capston_calendars set week = '$week' WHERE id = '$id'");

    // DB::update("update capston_calendars set start_date = '$start_date' WHERE id = '$id'");
    // DB::update("update capston_calendars set end_date = '$end_date' WHERE id = '$id'");

    $request->session()->put('msg', "Event updated Successfully");              
    return redirect()->action('CoodinatorController@CPM_view_calendar');

  }

  else {

    $id = $request->id;
    return redirect()->action('CoodinatorController@edit_event',['id' => $id])->withErrors($validator)->withInput();
  }
        // dd($request->all());
}

public function view_scheduled_presentations(Request $request){
  $prese = Scheduled_presentation::orderBy('date','asc')->get();

  if (count($prese) == 0) {
    $prese = "null";
    $presentation_name = "No Presentation Schecduled Yet";
  }else{
    $presentation_name = $prese[0]->presentation_name;
  }
  return view('scheduled_presentations')->with(compact('prese','presentation_name'));
}

public function save_present(Request $request){ 

  if ($request->session()->get('key') == 'coodinator') {



    Scheduled_presentation::truncate();

    $presentation_name = $request->presentation_name;

    $date = $request->date;
    $time = $request->timmings;
    $mon = $request->mon;
    $tues = $request->tues;
    $wed = $request->wed;
    $thurs = $request->thurs;
    $fri = $request->fri;
    $sat = $request->sat;

    $c = count($date);
    for ($i=0; $i < $c; $i++) { 

      $scheduled_presentation = new Scheduled_presentation;
      $scheduled_presentation->date = $date[$i];
      $scheduled_presentation->time = $time[$i];
      $scheduled_presentation->mon = $mon[$i];
      $scheduled_presentation->tues = $tues[$i];
      $scheduled_presentation->wed = $wed[$i];
      $scheduled_presentation->thurs = $thurs[$i];
      $scheduled_presentation->fri = $fri[$i];
      $scheduled_presentation->sat = $sat[$i];
      $scheduled_presentation->presentation_name = $presentation_name;
      // $scheduled_presentation->st = '0';
      $scheduled_presentation->save();
      

    }

    $request->session()->put('msg', "Presentation Updated Successfully");
    return redirect()->action('CoodinatorController@view_scheduled_presentations');
  }else{
    return redirect('/');
  }

}



}
