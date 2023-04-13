<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUpdateFTARequest;
use App\Http\Requests\Admin\UpdateFTARequest;
use view;
use DataTables;
use Carbon\Carbon;
use App\Models\FTA;
use App\Models\LCE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateFTARequest;
use App\Http\Requests\Admin\UpdateUserRequest;

class FTAsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
       // $this->middleware('can:view_fta_list',     ['only' => ['fta_list']]);
        $this->middleware('can:view_fta',     ['only' => ['index', 'show','ajax','fta_list']]);
        $this->middleware('can:create_fta',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_fta',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_fta',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $fta_count = FTA::count();
            return view('admin.ftas.index',compact('fta_count'));
        } catch (\Exception $th) {

            dd($th->getMessage());
        }


    }
    public function fta_list()
    {try {
        return view('admin.ftas.fta_list');
    } catch (\Exception $th) {
        dd($th->getMessage());
    }



    }
    /**
    * get users datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        try {
            $model = FTA::with('LCE.Province','LCE.Muncit')->orderBy('lce_id','desc');
            // $count = $model->countBy(function ($item) {
            //     return $item['lce_id'];
            // });

            // dd($count);
        if($request['filter_status']!=null)
        {
            $model->where('status',$request['filter_status']);
        }


        return DataTables::eloquent($model)

        ->editColumn('frequency_of_travel',function($fta){
            return view('admin.ftas._frequency_of_travel',compact('fta'));
        })
        ->addColumn('action',function($fta){
            return view('admin.ftas._action',compact('fta'));
        })
        ->toJson();
    } catch (\Exception $th) {
            dd($th->getMessage());
    }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = FTA::with('LCE.Province','LCE.Muncit')->get();
    //     foreach ($model as $fta) { working
    //         $fta->remarks = $model->where('lce_id','=',$fta->lce_id)->count();
    //        //$model->push($fta);
    //     }
    //   dd($model);
        return view('admin.ftas.create');//,compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateFTARequest $request)
    {
        //dd($request);
        try {
        $fta=new FTA;
        $fta->lce_id=$request->lce_id;

        $fta->leavetype=$request->leavetype;
        $fta->destination=$request->destination;
        $fta->exact_destination=$request->exact_destination;
        //$datefrom=Carbon::createFromFormat('m/d/Y', $request->datefrom)->format('Y-m-d');
        $fta->datefrom = $request->datefrom;//$request->datefrom;//Carbon::createFromFormat('d/m/Y', $request->datefrom)->format('Y-m-d');//Carbon::parse($request->datefrom)->format('Y-m-d');
        $fta->dateto=$request->dateto;
        $fta->remarks=$request->remarks;
        $fta->deleted_at=null;
        //dd($fta);
        $fta->save();



        session()->flash('success',__('FTA created successfully'));

        return redirect()->route('admin.fta_list');
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
        //dd($request);
        //create new user

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
           // Portfolio::with('previews')->find($id);
           // FTA::with('LCE.Province','LCE.Muncit')->get();
            $fta=FTA::with('LCE.Province','LCE.Muncit')->find($id);
            //dd($fta);
            return view('admin.ftas.edit',compact('fta'));
    } catch (\Exception $th) {
        dd($th->getMessage()) ;
    }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateFTARequest $request, $id)
    {
        $fta=FTA::findOrFail($id);
        $fta->update($request->except('_token','_method'));

        session()->flash('success','FTA updated successfully');
        return redirect()->route('admin.fta_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fta=FTA::findOrFail($id);


        //delete fta finally
        $fta->delete();

        session()->flash('success',__('FTA deleted successfully'));

        return redirect()->route('admin.fta_list');
    }
}
