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
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.schedules.index')}}">{{__('Schedule')}}</a></li>
            <li class="breadcrumb-item active">{{__('Create schedule')}}</li>
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
      {{ csrf_field() }}
      <fieldset>
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
      </fieldset>
    </form>
 
    

</div>
@endsection
@section('scripts')
  <script src="{{url('js/admin/schedules.js')}}"></script>
  <script src="{{url('plugins/ekko-lightbox/ekko-lightbox.js')}}"></script>
 
  <script src="{{url('js/select2.js')}}"></script>
  {{-- <script>
    $(function() {
        $("#start" ).datepicker({dateFormat: 'dd/mm/yyyy'});
    });
    </script>
    
    <script type="text/javascript">
    $(function() {
        $("#end").datepicker({dateFormat: 'dd/mm/yyyy'});
    });
    </script> --}}
  
  @parent




@endsection

