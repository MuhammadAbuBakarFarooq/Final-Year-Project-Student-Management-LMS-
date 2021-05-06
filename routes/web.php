<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/presentations', 'PresentationsController@index')->name('/presentations');
Route::post('/save_present', 'CoodinatorController@save_present')->name('save_present/');


Route::get('/', 'CoodinatorController@view_coodinator_login_page');
Route::get('/student_login_page', 'StudentController@view_student_login_page');
Route::get('/faculty_login_page', 'SupervisorController@view_faculty_login_page');
Route::get('/faculty_login_page', 'FacultyController@view_Faculty_login_page');
Route::get('faculty/feedbacks', 'FacultyController@feedbacks');



Route::post('/validation_check_name', 'CoodinatorController@validation_check_name');
Route::post('/validation_check_email', 'CoodinatorController@validation_check_email');
Route::post('/validation_check_email_faculty', 'CoodinatorController@validation_check_email_faculty');




Route::get('/student_change_pass', function () {
    return view('student_change_pass');
});
Route::get('/supervisor_change_pass', function () {
    return view('supervisor_change_pass');
});

Route::get('/faculty_change_pass', function () {
    return view('faculty_change_pass');
});



Route::get('/edit_event{id}', 'CoodinatorController@edit_event')->name('event.edit/');
Route::get('/delete_event{id}', 'CoodinatorController@delete_event')->name('event.delete/');
Route::post('coodinator/add_event', 'CoodinatorController@add_event');
Route::post('cpm/upadate_event', 'CoodinatorController@upadate_event');
Route::get('CPM/view_calendar', 'CoodinatorController@CPM_view_calendar');
Route::get('/cdashboard/add_calender', 'CoodinatorController@add_calender');


Route::get('forgot/password/student', 'StudentController@forgot_password');
Route::get('forgot/password/faculty', 'FacultyController@forgot_password');

Route::get('student/our_project', 'StudentController@our_project');

Route::get('view_scheduled_presentations', 'CoodinatorController@view_scheduled_presentations')->name('view_scheduled_presentations');


Route::get('student/quries_list', 'StudentController@quries_list');
Route::get('supervisor/quries_list', 'SupervisorController@quries_list');

Route::get('supervisor/reply{id}', 'SupervisorController@reply')->name('query.reply/');

Route::get('suquery.details/{id}', 'SupervisorController@suquery_details')->name('suquery.details/');
Route::get('stquery.details/{id}', 'SupervisorController@stquery_details')->name('stquery.details/');


Route::get('delete_query{id}', 'SupervisorController@delete_query')->name('delete.query/');

// Route::get('delete_query_student{id}', 'StudentController@delete_query_student')->name('delete.query.student/');

Route::get('/student/ask_query', 'StudentController@ask_query');
Route::get('/supervisor/ask_query', 'SupervisorController@ask_query');

Route::post('/student/post_query', 'StudentController@post_query');
Route::post('/supervisor/post_query', 'SupervisorController@post_query');


Route::post('faculty/give_fb', 'FacultyController@give_fb');



Route::post('/supervisor/reply_query', 'SupervisorController@reply_query');


Route::get('faculty/student_group_details{id}', 'FacultyController@student_group_details')->name('student.group.details/');

Route::get('faculty/view_add_feedback{id}', 'FacultyController@view_add_feedback')->name('view.feedback/');
Route::get('faculty/give_feedback{id}', 'FacultyController@give_feedback')->name('give.feedback/');
Route::get('student/feedbacks', 'StudentController@student_feedbacks')->name('student.feedbacks/');

Route::get('student/supervised_group_details{id}', 'SupervisorController@supervised_group_details')->name('supervised.group.details/');

Route::get('student/remove_from_supervison{id}', 'SupervisorController@remove_from_supervison')->name('remove.from.supervison/');

Route::get('student/view_supervisors_list', 'StudentController@view_supervisors_list');
Route::get('student/view_faculty_list', 'StudentController@view_faculty_list');


Route::get('student/view_project_ideas', 'StudentController@view_project_ideas');
Route::get('student/view_supervisor_ideas{id}', 'StudentController@view_supervisor_ideas')->name('supervisor.ideas/');
Route::get('supervisor/view_project_ideas', 'SupervisorController@view_project_ideas');

Route::get('student/requested_idea_details{id}', 'StudentController@requested_idea_details')->name('requested.idea.details/');
Route::get('student/requested_idea_edit{id}', 'StudentController@requested_idea_edit')->name('requested.idea.edit/');
Route::get('student/requested_idea', 'StudentController@requested_idea');
Route::get('student/request_supervisor_idea{id}', 'StudentController@request_supervisor_idea')->name('request.supervisor.idea/');
Route::get('student/add_idea{id}', 'StudentController@add_idea')->name('student.idea/');
Route::post('student/add_idea_student', 'StudentController@add_idea_student');


Route::get('faculty/view_supervisors_list', 'FacultyController@view_supervisors_list');
Route::get('faculty/view_students_list', 'FacultyController@view_students_list');

Route::get('supervisor/view_faculty_list', 'SupervisorController@view_faculty_list');
Route::get('supervisor/view_students_list', 'SupervisorController@view_students_list');

Route::get('supervisor/view_student_request', 'SupervisorController@view_student_request');
Route::get('supervisor/view_my_students', 'SupervisorController@view_my_students');


Route::get('supervisor/add_idea_supervisor', 'SupervisorController@add_idea_supervisor');
Route::post('supervisor/add_idea', 'SupervisorController@add_idea');



Route::get('cdashboard/view_students_groups', 'CoodinatorController@view_students_groups');


Route::get('cdashboard/add_new_member_list{id}', 'CoodinatorController@add_new_member_list');


Route::get('cdashboard/view_students_list', 'CoodinatorController@view_students_list');
Route::get('cdashboard/view_supervisors_list', 'CoodinatorController@view_supervisors_list');
Route::get('cdashboard/view_faculty_list', 'CoodinatorController@view_faculty_list');


Route::get('/cdashboard/add_student', 'CoodinatorController@view_add_student');
Route::get('/cdashboard/add_supervisor', 'CoodinatorController@view_add_supervisor');
Route::get('/cdashboard/add_faculty', 'CoodinatorController@view_add_faculty');

Route::get('/add_to_group/{id}/{id1}', 'CoodinatorController@add_to_group')->name('add.to.group/');

Route::get('/student.make_manager/{id}/{id1}', 'CoodinatorController@make_manager')->name('student.make_manager/');
Route::get('/make_supervisor/{id}', 'CoodinatorController@make_supervisor')->name('make.supervisor/');

Route::get('/remove_from_group/{id}/{id1}', 'CoodinatorController@remove_from_group')->name('student.remove/');
Route::get('/delete_student_group{id}', 'CoodinatorController@delete_student_group')->name('group.delete/');
Route::get('/student_group_details{id}', 'CoodinatorController@student_group_details')->name('group.details/');

Route::get('/supervisor_idea_details{id}', 'SupervisorController@supervisor_idea_details')->name('idea.details/');

Route::get('/delete_student{id}', 'CoodinatorController@delete_student')->name('student.delete/');
Route::get('/delete_supervisor{id}', 'CoodinatorController@delete_supervisor')->name('supervisor.delete/');
Route::get('/delete_faculty{id}', 'CoodinatorController@delete_faculty')->name('faculty.delete/');


Route::get('/reject_idea{id}', 'SupervisorController@reject_idea')->name('reject.idea/');
Route::get('/accept_idea/{id}/{id2}', 'SupervisorController@accept_idea')->name('accept.idea/');
Route::get('/idea_details{id}', 'SupervisorController@student_idea_details')->name('idea.details.student/');

Route::get('/delete_idea{id}', 'SupervisorController@delete_idea')->name('idea.delete/');
Route::get('/idea_delete_requested{id}', 'StudentController@idea_delete_requested')->name('idea.delete.requested/');

Route::get('/edit_student{id}', 'CoodinatorController@edit_student')->name('student.edit/');
Route::get('/edit_supervisor{id}', 'CoodinatorController@edit_supervisor')->name('supervisor.edit/');
Route::get('/edit_faculty{id}', 'CoodinatorController@edit_faculty')->name('faculty.edit/');

Route::get('/edit_idea{id}', 'SupervisorController@edit_idea')->name('idea.edit/');

Route::post('/update_student/{id}', 'CoodinatorController@update_student');
Route::post('/update_supervisor/{id}', 'CoodinatorController@update_supervisor');
Route::post('/update_faculty/{id}', 'CoodinatorController@update_faculty');





Route::post('/supervisor/update_idea', 'SupervisorController@update_idea');
Route::post('/student/update_idea', 'StudentController@update_idea');

Route::get('/coodinator_dashboard', 'CoodinatorController@viewcdashboard');
Route::get('/student_dashboard', 'StudentController@view_student_dashboard');
Route::get('/supervisor_dashboard', 'SupervisorController@view_supervisor_dashboard');
Route::get('/faculty_dashboard', 'FacultyController@view_faculty_dashboard');


Route::get('/count_not', 'SupervisorController@count_not')->name('count_not');
Route::get('/count_snot', 'StudentController@count_snot')->name('count_snot');
Route::get('/count_fnot', 'StudentController@count_fnot')->name('count_fnot');

Route::get('/count_q_su_not', 'SupervisorController@count_q_su_not')->name('count_q_su_not');
Route::get('/count_q_s_not', 'StudentController@count_q_s_not')->name('count_q_s_not');

Route::post('/coodinator_login', 'CoodinatorController@coodinator_login')->name('coodinator_login');
Route::post('/student_login', 'StudentController@student_login')->name('student_login');
Route::post('/supervisor_login', 'SupervisorController@supervisor_login')->name('supervisor_login');
Route::post('/faculty_login', 'FacultyController@faculty_login')->name('faculty_login');

Route::post('/send_new_pass_student', 'StudentController@send_new_pass_student')->name('send_new_pass_student');
Route::post('/send_new_pass_faculty', 'FacultyController@send_new_pass_faculty')->name('send_new_pass_faculty');

Route::post('/change_pass_student', 'StudentController@change_pass_student')->name('change_pass_student');
Route::post('/change_pass_supervisor', 'SupervisorController@change_pass_supervisor')->name('change_pass_supervisor');
Route::post('/change_pass_faculty', 'FacultyController@change_pass_faculty')->name('change_pass_faculty');

Route::post('/create_group', 'CoodinatorController@create_group');

Route::post('/add_new_student', 'CoodinatorController@add_new_student')->name('add_new_student');
Route::post('/add_new_supervisor', 'CoodinatorController@add_new_supervisor')->name('add_new_supervisor');
Route::post('/add_new_faculty', 'CoodinatorController@add_new_faculty')->name('add_new_faculty');


Route::get('logout','CoodinatorController@logout');
Route::get('student_logout','StudentController@student_logout');
Route::get('supervisor_logout','SupervisorController@supervisor_logout');
Route::get('faculty_logout','FacultyController@faculty_logout');


Auth::routes();

