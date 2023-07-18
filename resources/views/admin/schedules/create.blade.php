@extends('layouts.app')

@section('title')
{{__('Create Schedule')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <h1 class="m-0 text-dark">
              <i class="fa fa-cogs nav-icon"></i> 
              {{__('Schedules')}}
            </h1>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">

            
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Create Schedule')}}</h3>
    </div>
   
    <form method="POST" action="{{route('admin.schedules.store')}}" enctype='multipart/form-data'>
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @include('admin.schedules._form')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-check"></i> {{__('Save')}}
            </button>
        </div>
    </form>
 
    

</div>
@endsection
@section('scripts')
  <script src="{{url('js/admin/schedules.js')}}"></script>

  <script src="{{url('plugins/ekko-lightbox/ekko-lightbox.js')}}"></script>
  {{-- <script src="{{url('js/admin/disableInspectElecment.js')}}"></script> --}}



  
  @parent



@endsection
