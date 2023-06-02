@extends('layouts.app')

@section('title')
{{ __('Encode ORS') }}
@endsection

@section('css')
<link rel="stylesheet" href="{{url('plugins/datetimepicker/css/jquery.datetimepicker.min.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-home"></i>
                    {{__('ORS')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.orsheaders.index')}}">{{__('FDMS')}}</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.orsheader_list')}}">{{ __('ORS Listing') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Encode ORS') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('Create ORS ') }}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.orsheaders.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="col-lg-12">
                @include('admin.orsheaders._form_test')
            </div>
        </div>
        <div class="card-footer">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> {{__('Save')}}
                </button>
            </div>
        </div>
    </form>
    <!-- /.card-body -->
</div>



@endsection
@section('scripts')
<script>

    var rcOption = "{{ isset($ors) && isset($ors['ORSDetails']['responsibilitycenter']['code']) ? $ors['ORSDetails']['responsibilitycenter']['code'] : '' }}";
    var papOption = "{{ isset($ors) && isset($ors['ORSDetails']['pap']['code']) ? $ors['ORSDetails']['pap']['code'] : '' }}";
    var subOption = "{{ isset($ors) && isset($ors['ORSDetails']['appro_sub_allotment']['sub_allotment_no']) ? $ors['ORSDetails']['appro_sub_allotment']['sub_allotment_no'] : '' }}";
    // var rcOption = "{{ isset($ors) && isset($ors['ORSDetails']['responsibilitycenter']['code']) ? $ors['ORSDetails']['responsibilitycenter']['code'] : '' }}";
    var uacsOption = "{{ isset($ors) && isset($ors['ORSDetails']['approsetupdtl_uacs']['uacs_subobject_code']) ? $ors['ORSDetails']['approsetupdtl_uacs']['uacs_subobject_code'] : '' }}";
    var currency =" {{get_currency()}}"
</script>
<script src="{{url('plugins/datetimepicker/js/jquery.datetimepicker.full.js')}}"></script>
<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
<script src="{{url('js/admin/orsheaders.js')}}"></script>
@endsection
