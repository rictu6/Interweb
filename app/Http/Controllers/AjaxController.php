<?php

namespace App\Http\Controllers;

use App\Models\LCE;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PatientRequest;
use App\Http\Requests\Admin\DoctorRequest;
use App\Http\Requests\Admin\DivisionRequest;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Group;
use App\Models\Option;
use App\Models\Role;
use App\Models\Nationality;
use App\Models\User;
use App\Models\Test;
use App\Models\Culture;
use App\Models\Antibiotic;
use App\Models\Division;
use App\Models\Folder;
use App\Models\File;
use App\Models\Timetable;
use App\Models\FileCategory;
use App\Models\Module;
use App\Models\Province;
use App\Models\Position;
use App\Models\Section;
use App\Models\Office;
use App\Models\EmpStatus;
use App\Models\Muncit;
use App\Models\Permission;
use App\Models\Chat;
use App\Models\Visit;
use App\Models\Branch;
use App\Models\Contract;
use App\Models\Expense;
use App\Models\Language;
use App\Models\TestOption;
use App\Models\ExpenseCategory;
use Yajra\DataTables\Html\Button;
use App\Mail\PatientCode;
use DataTables;
use Mail;
use Str;
use Illuminate\Validation\Rule;

class AjaxController extends Controller
{
    public function get_lces(Request $request)
    {

        if(isset($request->term))
        {
            $lces=LCE::where('fullname','like','%'.$request->term.'%')->get();
        }
        else{
            $lces=LCE::All();
        }

        return response()->json($lces);
    }
    public function get_lce(Request $request)
    {

        $lce=LCE::with('muncit','province')->get()->find($request->lce_id);

        return response()->json($lce);
    }
    /**
    * get patient by name select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_lce_by_name(Request $request)
    {
        if(isset($request->term))
        {

            $lces=LCE::where('fullname','like','%'.$request->term.'%')->get();
        }
        else{
            $lces = LCE::take(20)->get();
        }

        return response()->json($lces);

    }
    public function get_muncits(Request $request)
    {
        if(isset($request->term))
        {
            $muncits=Muncit::where('muncit_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $muncits=Muncit::All();
        }

        return response()->json($muncits);
    }

    public function get_muncit_by_prov(Request $request)
    {

        $municipalities=Muncit::where('prov_code','like','%'.$request->term.'%')->get();

        return response()->json($municipalities);
    }

    public function get_office_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $offices=Office::where('office_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $offices=Office::All();
        }

        return response()->json($offices);

    }
    public function get_folder_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $folders=Folder::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $folders=Folder::All();
        }

        return response()->json($folders);

    }
    public function get_division_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $divisions=Division::where('div_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $divisions=Division::All();
        }

        return response()->json($divisions);

    }
    public function get_filecategory_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $filecategories=FileCategory::where('cat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $filecategories=FileCategory::All();
        }

        return response()->json($filecategories);

    }
    public function get_nationality_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $nationalities=Nationality::where('nat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $nationalities=Nationality::All();
        }

        return response()->json($nationalities);

    }


    public function get_file_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $files=File::where('uuid','like','%'.$request->term.'%')->get();
        }
        else{
            $files=File::All();
        }

        return response()->json($files);

    }
    public function get_agenda_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $agendas=Agenda::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $agendas=Agenda::All();
        }

        return response()->json($agendas);

    }
    public function get_timetable_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $timetables=Timetable::where('weekday','like','%'.$request->term.'%')->get();
        }
        else{
            $timetables=Timetable::All();
        }

        return response()->json($timetables);

    }
    public function get_permission_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $permissions=Permission::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $permissions=Permission::All();
        }

        return response()->json($permissions);

    }
    public function get_module_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $modules=Module::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $modules=Module::All();
        }

        return response()->json($modules);

    }

    public function get_muncit_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $muncits=Muncit::where('muncit_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $muncits=Muncit::All();
        }

        return response()->json($muncits);

    }
    public function get_muncits_by_prov(Request $request)
    {//wala sya ng gana pag omit ko muncit::all kay didti sya ga dirirtso after ka if condition
        if(isset($request->prov_code))
        {

            $muncits=Muncit::query()->where('prov_code','=',$request->prov_code)->get();
        }

        return response()->json($muncits);

    }
    public function get_sections_by_div(Request $request)
    {//wala sya ng gana pag omit ko muncit::all kay didti sya ga dirirtso after ka if condition
        if(isset($request->div_id))
        {
            $secs=Section::query()->where('div_id','=',$request->div_id)->get();
        }

        return response()->json($secs);

    }
    public function get_province_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $provinces=Province::where('prov_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $provinces=Province::take(20)->All();
        }

        return response()->json($provinces);

    }
    public function get_province(Request $request)
    {
        if(isset($request->term))
        {
            $province=Province::find($request->prov_code)->get();
        }


        return response()->json($province);

    }
    public function get_empstatus_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $empstatuss=EmpStatus::where('stat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $empstatuss=EmpStatus::All();
        }

        return response()->json($empstatuss);

    }
    public function get_section_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $sections=Section::where('sec_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $sections=Section::All();
        }

        return response()->json($sections);

    }
    public function get_position_by_desc(Request $request)
    {
        if(isset($request->term))
        {
            $positions=Position::where('pos_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $positions=Position::All();
        }

        return response()->json($positions);

    }
    /**
    * get patient by name select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_patient_by_name(Request $request)
    {
        if(isset($request->term))
        {
            $patients=Patient::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $patients=Patient::take(20)->get();
        }

        return response()->json($patients);

    }
    public function get_weekday_by_name(Request $request)
    {
        if(isset($request->term))
        {
            $weekdays=Weekday::where('wd_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $weekdays=Weekday::All();
        }

        return response()->json($weekdays);

    }
    public function get_module_by_name(Request $request)
    {
        if(isset($request->term))
        {
            $modules=Module::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $modules=Module::All();
        }

        return response()->json($modules);

    }
    public function get_filecategory_by_name(Request $request)
    {
        if(isset($request->term))
        {
            $filecategories=FileCategory::where('cat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $filecategories=FileCategory::All();
        }

        return response()->json($filecategories);

    }
    public function get_folder_by_name(Request $request)
    {
        if(isset($request->term))
        {
            $folders=Folder::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $folders=Folder::All();
        }

        return response()->json($folders);

    }


    /**
    * create patient
    *
    * @access public
    * @var  @Request $request
    */
    public function create_patient(PatientRequest $request)
    {
        $request['code']=patient_code();

        $patient=Patient::create($request->except('_token'));

        send_notification('patient_code',$patient);

        return response()->json($patient);
    }

    /**
    * get doctors select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_doctors(Request $request)
    {
        if(isset($request->term))
        {
            $doctors=Doctor::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $doctors=Doctor::take(20)->get();
        }

        return response()->json($doctors);
    }

    /**
    * get tests select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_tests(Request $request)
    {
        if(isset($request->term))
        {
            $tests=Test::where(function($q){
              return $q->where('parent_id',0)->orWhere('separated',true);
            })->where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $tests=Test::where(function($q){
                return $q->where('parent_id',0)->orWhere('separated',true);
              })->take(20)->get();
        }

        return response()->json($tests);
    }

    /**
    * get cultures select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_cultures(Request $request)
    {
        if(isset($request->term))
        {
            $cultures=Culture::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $cultures=Culture::All();
        }

        return response()->json($cultures);
    }



    public function get_users(Request $request)
    {
        if(isset($request->term))
        {
            $users=User::where('emp_id','like','%'.$request->term.'%')->get();
        }
        else{
            $users=User::All();
        }

        return response()->json($users);
    }
    public function get_offices(Request $request)
    {
        if(isset($request->term))
        {
            $offices=Office::where('office_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $offices=Office::All();
        }

        return response()->json($offices);
    }

    public function get_empstatuss(Request $request)
    {
        if(isset($request->term))
        {
            $empstatuss=EmpStatus::where('stat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $empstatuss=EmpStatus::All();
        }

        return response()->json($empstatuss);
    }
    public function get_positions(Request $request)
    {
        if(isset($request->term))
        {
            $positions=Position::where('pos_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $positions=Position::All();
        }

        return response()->json($positions);
    }
    public function get_sections(Request $request)
    {
        if(isset($request->term))
        {
            $sections=Section::where('sec_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $sections=Section::All();
        }

        return response()->json($sections);
    }
    public function get_filecategories(Request $request)
    {
        if(isset($request->term))
        {
            $filecategories=FileCategory::where('cat_desc','like','%'.$request->term.'%')->get();


        }
        else{
            $filecategories=FileCategory::All();
        }

        return response()->json($filecategories);
    }
    public function get_divisions(Request $request)
    {
        if(isset($request->term))
        {
            $divisions=Division::where('div_desc','like','%'.$request->term.'%')->get();


        }
        else{
            $divisions=Division::All();
        }

        return response()->json($divisions);
    }
     public function get_nationalities(Request $request)
    {
        if(isset($request->term))
        {
            $nationalities=Nationality::where('nat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $nationalities=Nationality::All();
        }

        return response()->json($nationalities);
    }

    public function get_folders(Request $request)
    {
        if(isset($request->term))
        {
            $folders=Folder::where('name','like','%'.$request->term.'%')->get();


        }
        else{
            $folders=Folder::All();
        }

        return response()->json($folders);
    }
    public function get_files(Request $request)
    {
        if(isset($request->term))
        {
            $files=File::where('uuid','like','%'.$request->term.'%')->get();


        }
        else{
            $files=File::All();
        }

        return response()->json($files);
    }
    public function get_agendas(Request $request)
    {
        if(isset($request->term))
        {
            $agendas=Agenda::where('name','like','%'.$request->term.'%')->get();


        }
        else{
            $agendas=Agenda::All();
        }

        return response()->json($agendas);
    }
    public function get_timetables(Request $request)
    {
        if(isset($request->term))
        {
            $timetables=Timetable::where('weekday','like','%'.$request->term.'%')->get();


        }
        else{
            $timetables=Timetable::All();
        }

        return response()->json($timetables);
    }


    public function get_permissions(Request $request)
    {
        if(isset($request->term))
        {
            $permissions=Permission::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $permissions=Permission::All();
        }

        return response()->json($permissions);
    }
    public function get_modules(Request $request)
    {
        if(isset($request->term))
        {
            $modules=Module::where('name','like','%'.$request->term.'%')->get();
        }
        else{
            $modules=Module::All();
        }

        return response()->json($modules);
    }


    public function get_provinces(Request $request)
    {
        if(isset($request->term))
        {
            $provinces=Province::where('prov_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $provinces=Province::All();
        }

        return response()->json($provinces);
    }

    /**
    * create doctor
    *
    * @access public
    * @var  @Request $request
    */

    public function create_doctor(Request $request)
    {
        $request->validate([
            'name'=>[
                'required',
                Rule::unique('doctors')->whereNull('deleted_at')
            ],
        ]);

        $request['code']=doctor_code();

        $doctor=Doctor::create($request->except('_token'));

        return response()->json($doctor);
    }
    public function create_filecategory(Request $request)
    {
        $request->validate([
            'cat_desc'=>[
                'required',
                Rule::unique('filecategories')->whereNull('deleted_at')
            ],
        ]);

        $request['cat_id']=filecategory_cat_id();

        $filecategory=FileCategory::create($request->except('_token'));

        return response()->json($filecategory);
    }


    public function create_nationality(Request $request)
    {
        $request->validate([
            'nat_desc'=>[
                'required',
                Rule::unique('nationalities')->whereNull('deleted_at')
            ],
        ]);

        $request['nat_desc']=nationality_description();

        $nationality=Nationality::create($request->except('_token'));

        return response()->json($nationality);
    }
    public function create_office(Request $request)
    {
        $request->validate([
            'office_desc'=>[
                'required',
                Rule::unique('offices')->whereNull('deleted_at')
            ],
        ]);

        $request['office_desc']=office_description();

        $office=Office::create($request->except('_token'));

        return response()->json($office);
    }
    public function create_folder(Request $request)
    {
        $request->validate([
            'name'=>[
                'required',
                Rule::unique('folders')->whereNull('deleted_at')
            ],
        ]);

        $request['name']=folder_description();

        $folder=Folder::create($request->except('_token'));

        return response()->json($folder);
    }
    public function create_permission(Request $request)
    {
        $request->validate([
            'name'=>[
                'required',
                Rule::unique('permissions')->whereNull('deleted_at')
            ],
        ]);

        $request['name']=permission_description();

        $permission=Permission::create($request->except('_token'));

        return response()->json($permission);
    }
    public function create_module(Request $request)
    {
        $request->validate([
            'name'=>[
                'required',
                Rule::unique('modules')->whereNull('deleted_at')
            ],
        ]);

        $request['name']=module_description();

        $module=Module::create($request->except('_token'));

        return response()->json($module);
    }
    public function create_user(Request $request)
    {
        $request->validate([
            'last_name'=>[
                'required',
                Rule::unique('users')->whereNull('deleted_at')
            ],
        ]);

        $request['last_name']=user_description();

        $user=User::create($request->except('_token'));

        return response()->json($user);
    }
    public function create_empstatus(Request $request)
    {
        $request->validate([
            'stat_desc'=>[
                'required',
                Rule::unique('empstatuss')->whereNull('deleted_at')
            ],
        ]);

        $request['stat_desc']=empstatus_description();

        $empstatus=Empstatus::create($request->except('_token'));

        return response()->json($empstatus);
    }
    public function create_muncit(Request $request)
    {
        $request->validate([
            'muncit_desc'=>[
                'required',
                Rule::unique('muncits')->whereNull('deleted_at')
            ],
        ]);

        $request['muncit_desc']=muncit_description();

        $muncit=Muncit::create($request->except('_token'));

        return response()->json($muncit);
    }
    public function create_section(Request $request)
    {
        $request->validate([
            'sec_desc'=>[
                'required',
                Rule::unique('sections')->whereNull('deleted_at')
            ],
        ]);

        $request['section_desc']=section_description();

        $section=Section::create($request->except('_token'));

        return response()->json($section);
    }
    public function create_province(Request $request)
    {
        $request->validate([
            'prov_desc'=>[
                'required',
                Rule::unique('provinces')->whereNull('deleted_at')
            ],
        ]);

        $request['prov_desc']=province_description();

        $province=Province::create($request->except('_token'));

        return response()->json($province);
    }
    public function create_position(Request $request)
    {
        $request->validate([
            'pos_desc'=>[
                'required',
                Rule::unique('positions')->whereNull('deleted_at')
            ],
        ]);

        $request['pos_desc']=position_description();

        $position=Position::create($request->except('_token'));

        return response()->json($position);
    }

    /**
    * get online users
    *
    * @access public
    * @var  @Request $request
    */
    public function online()
    {
        $online_users=[];

        $users=\App\Models\User::all();

        foreach($users as $user)
        {
            $online=\Cache::get('user-'.$user['emp_id']);
            if(!empty($online))
            {
                array_push($online_users,$user['emp_id']);
            }
        }

        $online_users=\App\Models\User::whereIn('emp_id',$online_users)
                                    ->where('emp_id','!=',auth()->guard('admin')->user()['emp_id'])
                                    ->get();

        return response()->json($online_users);
    }


    /**
    * get chat messages
    *
    * @access public
    * @var  @Request $request
    */
    public function get_chat($id)
    {
        $chats=Chat::with('from_user')->where([
            ['from',$id],['to',auth()->guard('admin')->user()['emp_id']]
        ])->orWhere([
            ['to',$id],['from',auth()->guard('admin')->user()['emp_id']]
        ])->orderBy('id','desc')->take(20)->get();

        $to_chats=Chat::where([['from',$id],['to',auth()->guard('admin')->user()['emp_id']]])->get();

        foreach($to_chats as $chat)
        {
            $chat->update(['read'=>1]);
        }

        return response()->json($chats);
    }

    /**
    * get chat unread messages
    *
    * @access public
    * @var  @Request $request
    */
    public function chat_unread($id)
    {
        $chats=Chat::with('from_user')->where([
            ['from',$id],['to',auth()->guard('admin')->user()['id']]
        ])->where('read',0)
        ->get();

        foreach($chats as $chat)
        {
            $chat->update(['read'=>1]);
        }

        return response()->json($chats);
    }

    /**
    * send message
    *
    * @access public
    * @var  @Request $request
    */
    public function send_message(Request $request,$id)
    {
        $chat=Chat::create([
            'from'=>auth()->guard('admin')->user()['id'],
            'to'=>$id,
            'message'=>$request->message
        ]);

        return $chat;
    }


    /**
    * Change visit status
    *
    * @access public
    * @var  @Request $request
    */
    public function change_visit_status($id)
    {
        $visit=Visit::find($id);

        $visit->update([
            'read'=>true,
            'status'=>($visit['status'])?false:true,
        ]);

        return response()->json(__('Visit status updated successfully'));
    }

    /**
    * Change lang status
    *
    * @access public
    * @var  @Request $request
    */
    public function change_lang_status($id)
    {
        $lang=Language::find($id);

        $lang->update([
            'active'=>($lang['active'])?false:true,
        ]);

        return response()->json(__('Language status updated successfully'));
    }


    /**
    * create expenses category
    *
    * @access public
    * @var  @Request $request
    */
    public function add_expense_category(Request $request)
    {
        $category=ExpenseCategory::create([
            'name'=>$request['name']
        ]);

        return response()->json($category);
    }


    /**
    * get unread mesasges
    *
    * @access public
    * @var  @Request $request
    */
    public function get_unread_messages(Request $request)
    {
        $messages=Chat::with('from_user')->where('to',auth()->guard('admin')->user()['id'])->where('read',false)->get();

        return response()->json($messages);
    }

    /**
    * get unread mesasges count
    *
    * @access public
    * @var  @Request $request
    */
    public function get_unread_messages_count($user_id)
    {
        $count=Chat::with('from_user')->where([['to',auth()->guard('admin')->user()['id']],['from',$user_id]])->where('read',false)->count();

        return $count;
    }

    /**
    * load more messages
    *
    * @access public
    * @var  @Request $request
    */
    public function load_more($user_id,$message_id)
    {
        $chats=Chat::with(['from_user','to_user'])->where(function($q)use($user_id){
            return $q->where([
                ['to',$user_id],['from',auth()->guard('admin')->user()['id']]
            ])->orWhere([
                ['from',$user_id],['to',auth()->guard('admin')->user()['id']]
            ]);
        })->where('id','<',$message_id)->orderBy('id','desc')->take(10)->get();

        return response()->json($chats);

    }

    /**
    * get my messages to user
    *
    * @access public
    * @var  @Request $requestonl
    */
    public function get_my_messages($id)
    {
        $chats=Chat::where([['from',auth()->guard('admin')->user()['id']],['to',$id]])->orderBy('id','desc')->take(20)->get();

        return response()->json($chats);
    }

    /**
    * get new visits
    *
    * @access public
    * @var  @Request $request
    */
    public function get_new_visits()
    {
        $visits=Visit::where('read',false)->orderBy('id','desc')->with('patient')->get();

        return response()->json($visits);

    }

    /**
    * get current patient
    *
    * @access public
    * @var  @Request $request
    */
    public function get_current_patient()
    {
        $patient=Patient::where('id',auth()->guard('patient')->user()['id'])->first();

        return response()->json($patient);
    }


    /**
    * get patient
    *
    * @access public
    * @var  @Request $request
    */
    public function get_patient(Request $request)
    {
        $patient=Patient::find($request->id);

        return response()->json($patient);
    }


    /**
    * delete test
    *
    * @access public
    * @var  @Request $request
    */
    public function delete_test($test_id)
    {
        $test=Test::find($test_id);

        if(isset($test))
        {
            $test->options()->delete();

            $test->delete();
        }

        return response()->json('success');
    }

    public function delete_option($option_id)
    {
        TestOption::where('id',$option_id)->delete();

        return response()->json('success');
    }


}



