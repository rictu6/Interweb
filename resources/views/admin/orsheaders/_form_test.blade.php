<div class="form-group">
    <label>DILG Office</label>
    <select class="form-control select2" disabled="disabled" style="width: 100%;">
        <option selected="selected">REGION VI - WESTERN VISAYAS</option>
    </select>
</div>
<div class="row">
    <div class="col-5">
        <label for="">ORS No</label>
        <input disabled="disabled" type="text" class="form-control" id="">
    </div>
    <div class="col-4">
        <label for="">ORS Date</label>
        <input disabled="disabled" type="date" class="form-control" id="" value="{{ date('MM/DD/YYYY') }}">
    </div>
    <div class="col-3">
        <label for="">Date Received</label>
        <input type="date" class="form-control" id="" placeholder="Select Date Received">
    </div>
</div>
<div class="row">
    <div class="col-4">
        <label for="payee_id">{{__('Payee')}}</label>
        <select class="form-control" name="payee_id" id="payee_id">
            @if(isset($ors)&&isset($ors['payee']))
            <option value="{{$ors['payee']['payee_id']}}" selected>{{$ors['payee']['name']}}
            </option>
            @endif
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
        <label for="uacs_subclass_id">{{__('Allotment Class')}}</label>
        <select class="form-control" name="uacs_subclass_id" id="uacs_subclass_id">
            @if(isset($ors)&&isset($ors['allotmentclass']))
            <option value="{{$ors['allotmentclass']['uacs_subclass_id']}}" selected>{{$ors['allotmentclass']['code']}} -
                {{$ors['allotmentclass']['description']}}
            </option>
            @endif
        </select>
    </div>
    <div class="col-3">
        <label for="fund_cluster_id">{{__('Fund Cluster')}}</label>
        <select class="form-control" name="fund_cluster_id" id="fund_cluster_id">
            @if(isset($ors)&&isset($ors['fundcluster']))
            <option value="{{$ors['fundcluster']['fund_cluster_id']}}" selected>{{$ors['fundcluster']['code']}} -
                {{$ors['fundcluster']['description']}}
            </option>
            @endif
        </select>
    </div>
    <div class="col-3">

        <label for="budget_type">{{__('Authorization')}}</label>
        <select class="form-control" name="budget_type" id="budget_type">
            @if(isset($ors)&&isset($ors['budgettype']))
            <option value="{{$ors['budgettype']['budget_type_id']}}" selected> {{$ors['budgettype']['description']}}
            </option>
            @endif
        </select>
    </div>

    <div class="col-3">
        {{-- @foreach ($fundsources as $row)
            <option value="{{$row->fund_source_id}}">{{ $row->code}} - {{ $row->description}}</option>
        @endforeach --}}

        <label for="fund_source_id">{{__('Fund Source')}}</label>
        <select class="form-control" name="fund_source_id" id="fund_source_id">
            @if(isset($ors)&&isset($ors['fundsource']))
            <option value="{{$ors['fundsource']['fund_source_id']}}" selected>{{$ors['fundsource']['code']}} -
                {{$ors['fundsource']['description']}}
            </option>
            @endif
        </select>
    </div>

</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{__('UACS')}}</h3>
                <ul class="list-style-none">
                    <li class="d-inline float-right">
                        <button type="button" class="btn btn-primary btn-sm add_component">
                            <i class="fa fa-plus"></i>
                            {{__('Add UACS')}}
                        </button>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="overflow-x: auto">
                        <table class="table table-striped table-bordered table-hover components" width="100%">
                            <thead class="btn-primary">
                                <th width="200px">{{__('Resposibility Center')}}</th>
                                <th width="100px">{{__('Charge To')}}</th>
                                <th width="200px">{{__('P/A/P')}}</th>
                                <th width="200px">{{__('Sub Allotment No')}}</th>
                                <th width="150px" class="text-center">{{__('UACS Code')}}</th>
                                <th width="10px" class="text-center">{{__('Amount')}}</th>
                                <th width="10px">{{__('Action')}}</th>
                            </thead>
                            <tbody class="items">
                                @php
                                $count=0;
                                $option_count=0;
                                @endphp
                                {{-- @if(isset($ors))
                                @foreach($ors['orsdetails'] as $orsdtl) --}}
                                @php
                                $count++;
                                @endphp
                               {{-- num="{{$count}}"  test_id="{{$component['id']}}" --}}
                               {{-- dtl_id="{{$orsdtl['ors_dtl_id']}}" --}}
                               <tr>
                                    <td>
                                        <div class="form-group">
                                            {{-- <label for="res_center_id">{{__('Responsibility Center')}}</label> --}}
                                            <select class="form-control" name="ORSDetails[0][responsibility_center]"
                                                id="responsibility_center">
                                                @if(isset($ors)&&isset($ors['orsdetails']))
                                                <option value="{{$ors['orsdetails']['responsibilitycenter']}}" selected>
                                                    {{$ors['orsdetails']['responsibilitycenter']['code']}} -
                                                    {{$ors['orsdetails']['responsibilitycenter']['description']}}
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">

                                            {{-- <label for="charge_to">{{__('Charge to')}}</label> --}}

                                            <select class="form-control" name="charge_to" placeholder="{{__(' to')}}" id="charge_to" required>
                                                <option value="" disabled selected>{{__('CHARGE TO')}}</option>
                                                <option value="1" {{ old('charge_to') =="ALLOTMENT"? "selected" : '' }}>
                                                        {{__('ALLOTMENT')}}</option>
                                                <option value="2" {{ old('charge_to') =="SUB- ALLOTMENT"? "selected" : '' }}>
                                                        {{__('SUB- ALLOTMENT')}}</option>

                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">

                                            {{-- <label for="ORSDetails[0][pap_id]">{{__('PAP')}}</label> --}}
                                            <select class="form-control" name="ORSDetails[0][pap_id]" id="pap_id">
                                                @if(isset($ors)&&isset($ors['pap']))
                                                <option value="{{$ors['orsdetails']['pap_id']}}" selected>
                                                    {{$ors['orsdetails']['pap']['code']}} -
                                                    {{$ors['orsdetails']['pap']['description']}}
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">

                                            {{-- <label for="ORSDetails[0][pap_id]">{{__('Sub-Allotment')}}</label> --}}
                                            <select class="form-control" name="ORSDetails[0][sub_allotment_id]" id="sub_allotment_id">
                                                @if(isset($ors)&&isset($ors['orsdetails']))
                                                <option value="{{$ors['orsdetails']['sub_allotment_id']}}" selected>
                                                    {{$ors['orsdetails']['appro_sub_allotment']['sub_allotment_no']}}
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">

                                            {{-- <label for="ORSDetails[0][pap_id]">{{__('UACS')}}</label> --}}
                                            <select class="form-control" name="ORSDetails[0][uacs_id]" id="uacs_id">
                                                @if(isset($ors)&&isset($ors['orsdetails']))
                                                <option value="{{$ors['orsdetails']['uacs_id']}}" selected>
                                                    {{$ors['orsdetails']['approsetupdtl_uacs']['uacs_subobject_code']}}
                                                </option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">

                                         <input type="number" class="form-control" name="component[${count}][amount]" placeholder="{{__('Amount')}}"  required>
                                         <span class="input-group-text">
                                                      {{get_currency()}}
                                                  </span>
                                          </div>
                                      </td>
                                    <td>
                                        <button type="button" class="btn btn-danger delete_row">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>

                                </tr>
                                {{-- @endforeach
                             @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="" id="count" value="{{$count}}">
<input type="hidden" name="" id="option_count" value="{{$option_count}}">
