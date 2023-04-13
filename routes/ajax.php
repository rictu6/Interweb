<?php
Route::group(['prefix'=>'ajax','as'=>'ajax.'],function(){

    // //get patients
    // Route::get('get_patient_by_code','AjaxController@get_patient_by_code')->name('get_patient_by_code');
    // Route::get('get_patient_by_name','AjaxController@get_patient_by_name')->name('get_patient_by_name');

    Route::get('get_fta_by_name','AjaxController@get_fta_by_name')->name('get_fta_by_name');
    Route::get('get_weekday_by_name','AjaxController@get_weekday_by_name')->name('get_weekday_by_name');
    Route::get('get_filecategory_by_name','AjaxController@get_filecategory_by_name')->name('get_filecategory_by_name');
    Route::get('get_module_by_name','AjaxController@get_module_by_name')->name('get_module_by_name');
    Route::get('get_folder_by_name','AjaxController@get_folder_by_name')->name('get_folder_by_name');


    //get patient
    Route::get('get_patient','AjaxController@get_patient')->name('get_patient');

    //create patient
    Route::post('create_patient','AjaxController@create_patient')->name('create_patient');

 //get lce
 Route::get('get_lce','AjaxController@get_lce')->name('get_lce');
 Route::get('get_lces','AjaxController@get_lces')->name('get_lces');
 Route::get('get_lce_by_name','AjaxController@get_lce_by_name')->name('get_lce_by_name');

    //get tests
    Route::get('get_tests','AjaxController@get_tests')->name('get_tests');

    //delete test
    Route::get('delete_test/{test_id}','AjaxController@delete_test')->name('delete_test');

    //delete option
    Route::get('delete_option/{option_id}','AjaxController@delete_option')->name('delete_option');


    //get cultures
    Route::get('get_cultures','AjaxController@get_cultures')->name('get_cultures');

    //get modules
    Route::get('get_modules','AjaxController@get_modules')->name('get_modules');
    //create modules
    Route::post('create_module','AjaxController@create_module')->name('create_module');



    //get divisions
    Route::get('get_divisions','AjaxController@get_divisions')->name('get_divisions');
    //create divisions
    Route::post('create_division','AjaxController@create_division')->name('create_division');


    //get nationality
    Route::get('get_nationalities','AjaxController@get_nationalities')->name('get_nationalities');
    //create nationality
    Route::post('create_nationality','AjaxController@create_nationality')->name('create_nationality');



    //get files
    Route::get('get_files','AjaxController@get_files')->name('get_files');
    //create file
    Route::post('create_file','AjaxController@create_file')->name('create_file');
 //get filecategories
 Route::get('get_filecategories','AjaxController@get_filecategories')->name('get_filecategories');
 //create filecategory
 Route::post('create_filecategory','AjaxController@create_filecategory')->name('create_filecategory');



    //get agendass
    Route::get('get_agendas','AjaxController@get_agendas')->name('get_agendas');
    //create agendas
    Route::post('create_agenda','AjaxController@create_agenda')->name('create_agenda');


    //get timetables
    Route::get('get_timetables','AjaxController@get_timetables')->name('get_timetables');
    //create timetables
    Route::post('create_timetable','AjaxController@create_timetable')->name('create_timetable');

      //get permission
      Route::get('get_permissions','AjaxController@get_permissions')->name('get_permissions');
    Route::post('create_permission','AjaxController@create_permission')->name('create_permission');

    //get users
    Route::get('get_users','AjaxController@get_users')->name('get_users');
    //create users
    Route::post('create_user','AjaxController@create_user')->name('create_user');


    //get positions
    Route::get('get_positions','AjaxController@get_positions')->name('get_positions');
    //create positions
    Route::post('create_position','AjaxController@create_position')->name('create_position');

    //get section
    Route::get('get_sections','AjaxController@get_sections')->name('get_sections');
    Route::get('get_sections_by_div','AjaxController@get_sections_by_div')->name('get_sections_by_div');
    //create section
    Route::post('create_section','AjaxController@create_section')->name('create_section');

    //get employees
    Route::get('get_employees','AjaxController@get_employees')->name('get_employees');

    //create employees
    Route::post('create_employee','AjaxController@create_employee')->name('create_employee');




    //get offices
    Route::get('get_offices','AjaxController@get_offices')->name('get_offices');
    //create offices
    Route::post('create_office','AjaxController@create_office')->name('create_office');


    //get empstatuss
    Route::get('get_empstatuss','AjaxController@get_empstatuss')->name('get_empstatuss');
    //create empstatus
    Route::post('create_empstatus','AjaxController@create_empstatus')->name('create_empstatus');


      //get muncit
      Route::get('get_muncits','AjaxController@get_muncits')->name('get_muncits');
      Route::get('get_muncits_by_prov','AjaxController@get_muncits_by_prov')->name('get_muncits_by_prov');

    //create empstatus
    Route::post('create_muncit','AjaxController@create_muncit')->name('create_muncit');



      //get provinces
      Route::get('get_provinces','AjaxController@get_provinces')->name('get_provinces');
      Route::get('get_province','AjaxController@get_province')->name('get_province');
      //create provinces
      Route::post('create_province','AjaxController@create_province')->name('create_province');


    //get doctors
    Route::get('get_doctors','AjaxController@get_doctors')->name('get_doctors');

    //create doctor
    Route::post('create_doctor','AjaxController@create_doctor')->name('create_doctor');

    //add options
    Route::post('add_sample_type','AjaxController@add_sample_type')->name('add_sample_type');
    Route::post('add_organism','AjaxController@add_organism')->name('add_organism');
    Route::post('add_colony_count','AjaxController@add_colony_count')->name('add_colony_count');

    //get roles
    Route::get('get_roles','AjaxController@get_roles')->name('get_roles');

    //get online users
    Route::get('online','AjaxController@online')->name('online')->middleware('Admin');

    //get chat
    Route::get('get_chat/{id}','AjaxController@get_chat')->name('get_chat')->middleware('Admin');
    Route::get('chat_unread/{id}','AjaxController@chat_unread')->name('chat_unread')->middleware('Admin');
    Route::post('send_message/{id}','AjaxController@send_message')->name('send_message')->middleware('Admin');

    //change visit status
    Route::post('change_visit_status/{id}','AjaxController@change_visit_status')->name('change_visit_status')->middleware('Admin');

    //change lang status
    Route::post('change_lang_status/{id}','AjaxController@change_lang_status')->name('change_lang_status')->middleware('Admin');

    //add category
    Route::post('add_expense_category','AjaxController@add_expense_category')->name('add_expense_category')->middleware('Admin');

    //get unread messages
    Route::get('get_unread_messages','AjaxController@get_unread_messages')->name('get_unread_messages')->middleware('Admin');
    Route::get('get_unread_messages_count/{id}','AjaxController@get_unread_messages_count')->name('get_unread_messages_count')->middleware('Admin');

    //get my messages
    Route::get('get_my_messages/{id}','AjaxController@get_my_messages')->name('get_my_messages')->middleware('Admin');

    //get new visits
    Route::get('get_new_visits','AjaxController@get_new_visits')->name('get_new_visits')->middleware('Admin');

    //load more messages
    Route::get('load_more/{user_id}/{message_id}','AjaxController@load_more')->name('load_more')->middleware('Admin');

    //get current patient
    Route::get('get_current_patient','AjaxController@get_current_patient')->name('get_current_patient')->middleware('Patient');

});

?>
