@extends('layouts.app')

@section('title')
  {{__('Dashboard')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/swtich-netliva/css/netliva_switch.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-th"></i>
            {{__('Dashboard')}}
          </h1>
        </div><!-- /.col -->

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.orsheaders.index')}}">{{__('FDMS Dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="#">{{__('Sub- Allotement Encoding')}}</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
@can('view_suballotment')
<div class="form-group">


 <div class="row">
  <div class="col-3">
    <label for="uacs_subclass_id">{{__('Allotment Class')}}</label>
    <select  class="form-control" name="uacs_subclass_id" id="uacs_subclass_id">
        @if(isset($ors)&&isset($ors['allotmentclass']))
        <option value="{{$ors['allotmentclass']['uacs_subclass_id']}}" selected>{{$ors['allotmentclass']['code']}} - {{$ors['allotmentclass']['description']}}
          </option>
          @endif
    </select>
  </div>
  <div class="col-3">
    <label for="fund_cluster_id">{{__('Fund Cluster')}}</label>
    <select  class="form-control" name="fund_cluster_id" id="fund_cluster_id">
        @if(isset($ors)&&isset($ors['fundcluster']))
        <option value="{{$ors['fundcluster']['fund_cluster_id']}}" selected>{{$ors['fundcluster']['code']}} - {{$ors['fundcluster']['description']}}
          </option>
          @endif
    </select>
  </div>
  <div class="col-3">

    <label for="budget_type_id">{{__('Authorization')}}</label>
    <select  class="form-control" name="budget_type_id" id="budget_type_id">
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
    <select  class="form-control" name="fund_source_id" id="fund_source_id">
        @if(isset($ors)&&isset($ors['fundsource']))
        <option value="{{$ors['fundsource']['fund_source_id']}}" selected>{{$ors['fundsource']['code']}} - {{$ors['fundsource']['description']}}
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
                                @if(isset($test))
                                    @foreach($test['components'] as $component)
                                        @php
                                            $count++;
                                        @endphp
                                        <tr num="{{$count}}" test_id="{{$component['id']}}">
                                            @if($component['title'])
                                                <td colspan="6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="responsibility_center">Responsibility Center</label>
                                                        <select id="responsibility_center" class="form-control"
                                                        name="ORSDetails[0][responsibility_center]" onchange="">
                                                          <option value="">Select RC</option>
                                                          @foreach ($responsibilitycenters as $row)
                                                          <option value="{{$row->res_center_id}}">{{$row->code}}  {{$row->description}}</option>
                                                          {{-- <option value="{{$row->pos_id}}" {{in_array($row->pos_id, old("row") ?: []) ? "selected": ""}}>{{$row->pos_desc}}</option> --}}
                                                      @endforeach</select>
                                                      </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger delete_row">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="form-group">
                                                        <input type="hidden" name="component[{{$count}}][id]" value="{{$component['id']}}">
                                                        <input type="text" class="form-control" name="component[{{$count}}][name]" placeholder="{{__('Name')}}" value="{{$component['name']}}" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="component[{{$count}}][unit]" placeholder="{{__('Unit')}}" value="{{$component['unit']}}" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="p-0 list-style-none">
                                                        <li>
                                                            <input class="select_type" value="text" type="radio" name="component[{{$count}}][type]" id="text_{{$count}}" @if($component['type']=='text') checked @endif required> <label for="text_{{$count}}">{{__('Text')}}</label>
                                                        </li>
                                                        <li>
                                                            <input class="select_type" value="select" type="radio" name="component[{{$count}}][type]" id="select_{{$count}}" @if($component['type']=='select') checked @endif required> <label for="select_{{$count}}">{{__('Select')}}</label>
                                                        </li>
                                                    </ul>
                                                    <div class="options">
                                                        @if($component['type']=='select')
                                                        <table width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{__('Option')}}</th>
                                                                    <th width="10px" class="text-center">
                                                                        <button type="button" class="btn btn-primary btn-sm add_option">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </head>
                                                            <tbody>
                                                            @foreach($component['options'] as $option)
                                                                @php
                                                                    $option_count++;
                                                                @endphp
                                                                <tr option_id="{{$option['id']}}">
                                                                    <td>
                                                                        <input type="text" name="component[{{$count}}][old_options][{{$option_count}}]" value="{{$option['name']}}" class="form-control" required>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-danger btn-sm text-center delete_option">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="component[{{$count}}][reference_range]" placeholder="{{__('Reference Range')}}">{!!$component['reference_range']!!}</textarea>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <input class="check_separated" num="{{$count}}" type="checkbox" name="component[{{$count}}][separated]" @if($component['separated']) checked @endif>
                                                    <div class="component_price">
                                                        @if($component['separated'])
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h5 class="card-title">
                                                                {{__('Price')}}
                                                                </h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="input-group form-group mb-3">
                                                                    <input type="number" class="form-control" name="component[{{$count}}][price]" value="{{$component['price']}}" min="0" class="price" required>
                                                                    <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        {{get_currency()}}
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <input  type="checkbox" name="component[{{$count}}][status]" @if($component['status']) checked @endif>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger delete_row">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
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

@endcan
@endsection

@section('scripts')
  <!-- Switch -->
  <script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
  <script src="{{url('js/admin/suballotment.js')}}"></script>
  {{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}
@endsection
