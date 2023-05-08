<div class="form-group">
    <label>DILG Office</label>
    <select class="form-control select2" disabled="disabled" style="width: 100%;">
      <option selected="selected">REGION VI - WESTERN VISAYAS</option>
    </select>
  </div>
    <div class="row">
      <div class="col-5">
        <label for="">ORS No</label>
        <input disabled="disabled" type="text"  class="form-control" id="">
      </div>
      <div class="col-4">
        <label for="">ORS Date</label>
        <input disabled="disabled" type="date"  class="form-control" id="" value="{{ date('MM/DD/YYYY') }}">
      </div>
      <div class="col-3">
        <label for="">Date Received</label>
        <input  type="date"  class="form-control" id="" placeholder="Select Date Received">
      </div>
    </div>
 <div class="row">
  <div class="col-4">
    <label>Payee</label>
    <select class="form-control input-sm" name="" >
        <option value="">Select Payee</option>
        @foreach ($payees as $row)
            <option value="{{$row->payee_id}}">{{ $row->tin_no}} - {{ $row->name}}</option>
        @endforeach
    </select>
  </div>
  <div class="col-4">
    <label for="">Office</label>
    <input type="text" class="form-control" id="" placeholder="">
  </div>
  <div class="col-4">
    <label for="">Address</label>
    <input type="text" class="form-control" id="" placeholder="">
  </div>
 </div>
 <div class="form-group">
  <label for="">Particulars</label>
  <textarea type="text" class="form-control" id="" placeholder=""></textarea>
 </div>

 <div class="row">
  <div class="col-3">
    <label>Allotment Class</label>
    <select class="form-control input-sm" name="" >
        <option value="">Select Allotment Class</option>
        @foreach ($allotments as $row)
            <option value="{{$row->alot_id}}">{{$row->code}} - {{$row->description}}</option>
        @endforeach
    </select>
  </div>
  <div class="col-3">
    <label>Fund Cluster</label>
    <select class="form-control input-sm" name="" >
        <option value="">Select Fund Cluster</option>
        @foreach ($fundclusters as $row)
            <option value="{{$row->fund_cluster_id }}">{{ $row->code}} - {{ $row->description}} </option>
        @endforeach
    </select>
  </div>
  <div class="col-3">
    <label>Authorization</label>
    <select class="form-control input-sm" id="select_type" name="budg_type" >
        <option value="">Select Authorization</option>
        @foreach ($budgettypes as $row)
            <option value="{{$row->budget_type_id}}">{{ $row->description}}</option>
        @endforeach
    </select>
  </div>

  <div class="col-3">
    <label>Fund Source</label>
    <select class="form-control input-sm" name="" >
        <option value="">Select</option>
        @foreach ($fundsources as $row)
            <option value="{{$row->fund_source_id}}">{{ $row->code}} - {{ $row->description}}</option>
        @endforeach
    </select>
  </div>

</div>
<br>

<!-- /.card -->
<span style="font-size: 14pt; font-weight: bold; line-height: 35px; color: #31708f;"> ORS LINE ITEMS</span>
<!-- general form elements disabled -->
<div class="card card-warning">
<div class="card-header">
<h3 class="card-title">UACS</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
{{-- <form> --}}


<div class="dynamicform_wrapper" data-dynamicform="dynamicform_e6450593">
  <div class="panel panel-primarys">
    <div class="panel-body container-items" style="padding: 0px;">
      <!-- widgetContainer -->
      <div class="item panel panel-info">
        {{-- <div class="panel-heading">
          <span class="panel-title-address">UACS #1</span>
          <button type="button" class="pull-right remove-item btn btn-danger btn-xs">
            <i class="glyphicon glyphicon-minus-sign"></i> Remove</button>
          <div class="clearfix"></div>
        </div> --}}
          <div class="panel-body">
          <div class="row">
          <!-- REGIONAL ENCODING -->
          <div class="col-md-2">
          <div class="form-group required field-orsdetails-0-responsibility_center">
            <label class="control-label" for="orsdetails-0-responsibility_center">Responsibility Center</label>
            <select id="orsdetails-responsibility_center" class="responsibility_center form-control select2-hidden-accessible"
            name="ORSDetails[0][responsibility_center]" onchange="" tabindex="-1" aria-hidden="true">
              <option value="">Select RC</option>
              @foreach ($responsibilitycenters as $row)
              <option value="{{$row->res_center_id}}">{{$row->code}}  {{$row->description}}</option>
              {{-- <option value="{{$row->pos_id}}" {{in_array($row->pos_id, old("row") ?: []) ? "selected": ""}}>{{$row->pos_desc}}</option> --}}
          @endforeach</select>
          </div>
          </div>
        <div class="col-md-2">
        <div class="form-group field-orsdetails-0-charge_to">
          <label class="control-label" for="orsdetails-0-charge_to">Charge To</label>
          <select id="orsdetails-charge_to" class="charge_to form-control select2-hidden-accessible"
           name="ORSDetails[0][charge_to]" onchange="loadPap($(&quot;.charge_to&quot;).index(this))"
           tabindex="-1" aria-hidden="true">
            <option value=""></option>
            <option value="1">Allotment</option>
            <option value="2">Sub-Allotment</option>
          </select>
        </div>
        </div>
        <div class="col-md-2">
          <label class="control-label" for="orsdetails-pap_id">P/A/P</label>
          <select class="form-control input-sm" id="orsdetails-pap_id" name="orsdetails-pap_id">
          <option value="">Select PAP</option>
          @foreach ($paps as $row)
            <option value="{{$row->pap_id}}">{{ $row->code}} -{{ $row->description}}</option>
          @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label>Sub Allotment No</label>
          <select class="form-control input-sm" id="orsdetails-sub_allotment_id" name="orsdetails-sub_allotment_id" >
          <option value="">Select Sub Allotment No</option>
          @foreach ($uacs as $row)
            <option value="{{$row->uacs_subobject_id}}">{{ $row->code}} - {{ $row->description}}</option>
          @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label>UACS Code</label>
          <select class="form-control input-sm" id="orsdetails-uacs_id" name="orsdetails-uacs_id">
          <option value="">Select UACS Code</option>
          @foreach ($uacs as $row)
            <option value="{{$row->uacs_subobject_id}}">{{ $row->code}} - {{ $row->description}}</option>
          @endforeach
          </select>
        </div>


        <div class="col-md-2">
        <div class="form-group field-orsdetails-0-amount">
          <label class="control-label" for="orsdetails-0-amount">Amount</label>
          <input type="text" id="orsdetails-amount" class="form-control" name="orsdetails-0-amount-disp"><input type="hidden" id="orsdetails-0-amount" name="ORSDetails[0][amount]" data-krajee-maskmoney="maskMoney_f31a811b" value=""><div class="help-block"></div>
          </div>
          </div>
          </div>
        </div>
        </div></div>
