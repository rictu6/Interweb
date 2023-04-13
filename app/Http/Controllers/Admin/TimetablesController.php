<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Models\Weekday;
use App\Http\Requests\Admin\TimetableRequest;
use DataTables;

class TimetablesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_timetable',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_timetable',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_timetable',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_timetable',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timetables=Timetable::all();
        return view('admin.timetables.index',compact('timetables'));
    }

    /**
    * get timetable datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Timetable::query()->with('weekday');
      
        return DataTables::eloquent($model)
        ->addColumn('action',function($timetable){
            return view('admin.timetables._action',compact('timetable'));
        })
        ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.timetables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimetableRequest $request)
    {
        Timetable::create($request->except('_token'));
        session()->flash('success','Timetable saved successfully');
        return redirect()->route('admin.timetables.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timetable=Timetable::find($id);

        $timetable->update(['read'=>true]);

        return view('admin.timetables.show',compact('timetable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timetable=Timetable::findOrFail($id);
        return view('admin.timetables.edit',compact('timetable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimetableRequest $request, $id)
    {
        $timetable=Timetable::findOrFail($id);
        $timetable->update($request->except('_token','_method'));

        session()->flash('success','Timetable updated successfully');
        return redirect()->route('admin.timetables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timetable=Timetable::findOrFail($id);
        $timetable->delete();

        session()->flash('success','Timetable deleted successfully');
        return redirect()->route('admin.timetables.index');
    }
}
