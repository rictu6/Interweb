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
            <li class="breadcrumb-item active">{{__('FTA Dashboard')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
@can('view_fta')
<!-- \Online Users -->
<div class="card card-primary">
    <div class="card-header">
    <a class="btn btn-primary btn-sm text-uppercase" href="{{route('admin.fta_list')}}" >
      <i class="nav-icon fas fa-layer-group"></i>
        {{__('Foreign Travel Authority')}}
      </a>

    </div>
</div>
<!-- Admin Reports -->
<div class="row">
    <div class="col-lg-2 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$fta_count}}</h3>
          <p>{{__('FTA')}}</p>
        </div>
        <div class="icon">
          <i class="fas fa-file-contract nav-icon"></i>
        </div>
        <a href="{{route('admin.fta_list')}}" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

</div>
@endcan
@endsection

@section('scripts')
  <!-- Switch -->
  <script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
  <script src="{{url('js/admin/ftas.js')}}"></script>
  {{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}
@endsection
