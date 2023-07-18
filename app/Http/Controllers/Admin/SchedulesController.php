<?php

namespace App\Http\Controllers\Admin;

use view;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Role;
use App\Models\User;
use App\Models\Attendee ;
use App\Models\ScheduleUser;
use Illuminate\Support\Str;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CreateScheduleRequest;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;



class SchedulesController extends Controller
{

   
    public function __construct()
    {
        $this->middleware('can:view_schedule',     ['only' => ['index', 'show','ajax','schedule_list']]);
        $this->middleware('can:create_schedule',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_schedule',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_schedule',   ['only' => ['destroy']]);
    }
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=Schedule::all();
        return view('admin.schedules.index',compact('users'));
    } 
    public function ajax(Request $request)
    {
        $model=Schedule::query()->with('division','office','section','position','roles');

        return DataTables::eloquent($model)
        ->addColumn('roles',function($user){
                return view('admin.schedules._attendees',compact('user'));
            })
        ->addColumn('action',function($user){
            return view('admin.schedules._action',compact('user'));
        })
        ->toJson();


      
    }
    public function create(Request $request)
    {

       
        //         $roles = Attendee::select(['emp_id', 'last_name', 'first_name', 'middle_name'])
        //         ->whereNotIn('emp_id', static function ($query)
        //          {
                  
        //             $query->select(['emp_id'])
        //             ->from((new ScheduleUser)->getTable())
        //             ->whereBetween('start',[$start_date->start, $start_date->start])
        //             ->whereBetween('end', [$end_date->start, $end_date->end])->get()
        //             ;
                 
        //         })
        //         ->orderBy('last_name','asc')
        //         ->get();
              
        
                $roles=Attendee::all();
                $user_attendee=User::all();
                return view('admin.schedules.create',compact('user_attendee','roles'));       
             
               
    }
    public function store(Request $request)
    {
       
        
        $user=new Schedule;

        $user->posted_by=$request->posted_by;
        $user->posted_date=$request->posted_date;
        $user->office_id=$request->office_id;
        $user->div_id=$request->div_id;
        $user->color=$request->color;
        $user->venue=$request->venue;
        $user->sec_id=$request->sec_id;
        $user->emp_id=$request->emp_id;
        $user->start=$request->start;
        $user->end=$request->end;
        $user->title=$request->title;
                         
        $user->save();

        if($request->has('roles'))
        {
            foreach($request['roles'] as $role)
            {      
                $group_test=User::where('emp_id',$role)->firstOrFail();
                        
                $rol=Attendee::pluck('emp_id');
                $fetch = ScheduleUser::pluck('emp_id');
                
              
                foreach($fetch as $list){
                    if($list == $rol){
                        return redirect()->back()->withErrors("Exist")->withInput();
                    }
                    else{
                        return redirect()->back()->withErrors("Correct")->withInput();
                    }           
                }













                ScheduleUser::firstOrCreate([
              
                'schedule_id'=>$user['id'],
                'emp_id'=>$role,
                'title'=>$request->title,
                'venue'=>$request->venue,
                'attendee_name'=>$group_test['last_name'] . ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                'start'=>$user['start'],
                'end'=>$user['end']]);
            }

        }       
        session()->flash('success','Schedule saved successfully');
            
        return redirect()->route('admin.schedule_list');              
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $user=Schedule::findOrFail($id);
        $roles=Attendee::all();
        $user_attendee=User::all();

        return view('admin.schedules.edit',compact('user','roles','user_attendee'));
      
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     

        $user=Schedule::findOrFail($id);
        $user->posted_by=$request->posted_by;
        $user->posted_date=$request->posted_date;
        $user->office_id=$request->office_id;
        $user->venue=$request->venue;
        $user->div_id=$request->div_id;
        $user->color=$request->color;
        $user->sec_id=$request->sec_id;
       
        $user->emp_id=$request->emp_id;
        $user->start=$request->start;
        $user->end=$request->end;
        $user->title=$request->title;
         
        $user->save();

        ScheduleUser::where('schedule_id',$id)->delete();

        if($request->has('roles'))
        {

            foreach($request['roles'] as $attendee_name)
            {
                foreach($request['roles'] as $role)
                {
               
                $group_test=User::where('emp_id',$role)->firstOrFail();
                        
                ScheduleUser::firstOrCreate([
    

                    'schedule_id'=>$id,
                    'emp_id'=>$role,
                    'title'=>$request->title,
                    'venue'=>$request->venue,
                    'attendee_name'=>$group_test['last_name'] . ' ' .$group_test['first_name']. ',' .$group_test['middle_name'],
                    'start'=>$user['start'],
                    'end'=>$user['end']


                ]);
            
                }
            }
        }
       


        session()->flash('success','Schedule saved successfully');
        
        return redirect()->route('admin.schedule_list');
    }

    public function schedule_list()
    {
        $users=Schedule::all();
        return view('admin.schedules.schedule_list',compact('users'));
    }
    public function schedule_popup($id)
    {
        try
        {
           
            $user=Schedule::findOrFail($id);
            $roles=Attendee::all();
            $user_attendee=User::all();


        return view('admin.schedules.schedule_popup',compact('user','roles','user_attendee'));
        }
        catch (\Exception $e)
        {
            dd($e -> getMessage());
        }
    }
    public function calendar_show()
    {
        // $tasks=Schedule::all();
        // return view('admin.schedules.calendar_show',compact('tasks'));
       
        $events = [];
        $data = Schedule::all();
        
        if($data->count()) 
         {
            foreach ($data as $key => $value) 
            {
                $events[] = Calendar::event(
                    $value->title, 
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.'+1 day'),
                    
                 [
                    'color'=> $value->color,
                     'textColor' => $value->textColor,
                    
                 ],
                 [
                   
                    'url' => 'schedules/' .$value->id. '/edit'
                 

                   
                 ]
                 
                );
                
            }
        }
                $calendar =\Calendar::addEvents($events);
                return view('admin.schedules.calendar_show',compact('events','calendar'));
      
    }




    public function destroy($id)
    {
        $users=Schedule::findOrFail($id);
        $users->delete();

        session()->flash('success','Schedule deleted successfully');
        return redirect()->route('admin.schedules.index');
    }
}