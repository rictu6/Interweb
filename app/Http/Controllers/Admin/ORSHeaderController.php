<?php

namespace App\Http\Controllers\Admin;
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

class ORSHeaderController extends \Illuminate\Routing\Controller
{

    public function __construct()
    {

        $this->middleware('can:view_orsheader',     ['only' => ['index', 'show','ajax','orsheader_list']]);
        $this->middleware('can:create_orsheader',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_orsheader',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_orsheader',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {



            return view('admin.orsheaders.index');
        } catch (\Exception $th) {

            dd($th->getMessage());
        }


    }
    public function orsheader_list()
    {try {
        return view('admin.orsheaders.orsheader_list');
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
        $model = ORSHeader::query()
        ->with('processed','details','fundsource','payee');// Include the 'details' relationship
        return DataTables::eloquent($model)

            ->addColumn('action',function($ors){
                return view('admin.orsheaders._action',compact('ors'));
            })
            ->toJson();

    } catch (\Exception $th) {
        dd($th->getMessage());
    }
}

public function create()
{
         $rescenter=ResponsibilityCenter::all();
         $paps=PAP::all();
    return view('admin.orsheaders.create', compact('paps','rescenter'));
}
function store (Request $request){
  //dd ($request);
$ors =new ORSHeader;
$ors_last_no=ORSHeader::latest()->first();
if (empty($ors_last_no)) {
    $ors_last_no = new ORSHeader();
    $ors_last_no->ors_hdr_id = 1;
} else {
    $ors_last_no->ors_hdr_id += 1;
}
$user_id =     Auth::guard('admin')->user()->emp_id;
 $ors->office_id= $request->office_id;
//  $ors->type= $request->type;
//  $ors->ors_id= $request->ors_id;
$currentDate = Carbon::now()->format('Y-n');
$fund_source_code=FundSource::where('fund_source_id', '=', $request->fund_source_id)->first();


 $ors->ors_date= $currentDate;
 $ors->particulars= $request->particulars;
 $ors->budget_type= $request->budget_type;
 $ors->fund_cluster_id= $request->fund_cluster_id;
 $ors->fund_source_id= $request->fund_source_id;
 $ors->uacs_subclass_id= $request->uacs_subclass_id;
 $ors->payee_id= $request->payee_id;
 $ors->office_id= $request->office_id;
 $ors->address= $request->address;
//  $ors->status_code= $request->status_code;
 $ors->created_by= $user_id;
 $ors->date_created= $currentDate;
 $ors->date_received= $request->date_received;
//  $ors->dv_received_id= $request->dv_received_id;
//  $ors->cms_submission_history_id= $request->cms_submission_history_id;
 //$ors->payee= $request->payee;
//  $ors->dv_trust_receipts_id= $request->dv_trust_receipts_id;
$ors_number=$request->uacs_subclass_id."-".$fund_source_code->code."-".$currentDate."-"."000".$ors_last_no->ors_hdr_id;
$ors->ors_no= $ors_number;
// dd($ors_number);
//dd($request->ORSDetails);
foreach ($request->details as $detail) {
    if ($ors->save()) {

        ORSDetails::create([
            'ors_id' => $ors->ors_hdr_id,
            'allotment_class_id' => $detail['allotment_class_id'],
            'responsibility_center' => $detail['responsibility_center'],
            'pap_id' => $detail['pap_id'],
            'uacs_id' => $detail['uacs_id'],
            'sub_allotment_id' => $detail['sub_allotment_id'],
            'amount' => $detail['amount'],
        ]);
    }
 }

 //$save=$ors->save();
 //if($save){
    session()->flash('success',__('New ORS has been successfully added to database'));
    return redirect()->route('admin.orsheader_list');
    // return back()->with('success', 'New ORS has been successfully added to database');
 ///}else{
   //  return back()->with('fail', 'Please try again');
 //}
}


}
