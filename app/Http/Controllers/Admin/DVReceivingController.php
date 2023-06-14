<?php

namespace App\Http\Controllers\Admin;
use App\Models\DVReceiving;
use App\Models\Employee;

use App\Models\PAP;
use App\Models\UACS;
use App\Models\Payee;

use App\Models\ORSHeader;
use App\Models\BudgetType;
use App\Models\FundSource;
use App\Models\ORSDetails;
use App\Models\FundCluster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AllotmentClass;
use App\Models\ResponsibilityCenter;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Editor\Fields\Date;

class DVReceivingController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

        $this->middleware('can:view_dvreceive',     ['only' => ['index', 'show','ajax','dvreceiving_list']]);
        $this->middleware('can:create_dvreceive',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_dvreceive',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_dvreceive',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('admin.dvreceivings.index');
        } catch (\Exception $th) {

            dd($th->getMessage());
        }


    }
    public function dvreceiving_list()
    {try {
        return view('admin.dvreceivings.dvreceiving_list');
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
        $model = DVReceiving::query()
         ->with('processed','payee');// Include the 'details' relationship



        return DataTables::eloquent($model)

            // ->addColumn('action',function($dv){
            //     return view('admin.orsheaders._action',compact('ors'));
            // })
            ->toJson();

    } catch (\Exception $th) {
        dd($th->getMessage());
    }
}

public function create()
{
    $user =  Auth::guard('admin')->user();

         $selectedOffice=ResponsibilityCenter::where('res_center_id', '=', $user->office_id)->first();
         if(   $selectedOffice==1){
            // $selectedOffice=
         }

    return view('admin.dvreceivings.create', compact('selectedOffice'));
}


function store (Request $request){
  //dd ($request);
$dv =new DVReceiving;
$dv_last_no=DVReceiving::latest()->first();
if (empty($dv_last_no)) {
    $dv_last_no = new ORSHeader();
    $dv_last_no->ors_hdr_id = 1;
} else {
    $dv_last_no->ors_hdr_id += 1;
}
$user_id =     Auth::guard('admin')->user()->emp_id;
$currentDate = Carbon::now()->format('Y-n');

$dv->office_id= $request->office_id;
$dv->dv_no=$request->dv_no;
$dv->dv_type=$request->dv_type;
$dv->ors_hdr_id=$request->ors_hdr_id;
$dv->payee_id= $request->payee_id;
$dv->dv_date=  $request->dv_date;
$dv->check_no= $request->check_no;
$dv->generated_by= $user_id;
 $dv->save();

    session()->flash('success',__('New DV has been successfully added to database'));
    return redirect()->route('admin.dvreceiving_list');

}


}
