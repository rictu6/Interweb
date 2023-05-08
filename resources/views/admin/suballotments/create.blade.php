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
                    {{__('Sub-Allotments')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.orsheaders.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.orsheader_list')}}">{{ __('FDMS') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Encode Sub-Allotment') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('Create Sub-Allotemet ') }}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.orsheaders.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="col-lg-12">
                @include('admin.suballotments._form')
            </div>
        </div>
        <div class="card-footer">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-check"></i>  {{__('Save')}}
                </button>
            </div>
        </div>
    </form>
    <!-- /.card-body -->
</div>



@endsection
@section('scripts')
<script>
 $('.add_component').on('click',function(){
   count++;
   $('.orsdetails .items').append(`
   <tr id="component_${count}" num="${count}">

        <td>
           <div class="form-group">

            <select  class="form-control" name="component[${count}][uacs_subobject_code]" id="uacs_subobject_code">
        @if(isset($saro)&&isset($saro['allotmentclass']))
        <option value="{{$saro['appro_dtl']['uacs_subobject_code']}}" selected>{{$saro['appro_dtl']['code']}} - {{$saro['appro_dtl']['description']}}
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
   `);
   //initialize text editor
   $('#component_'+count).find('textarea').summernote({
       toolbar: []
   });
});
</script>
    <script src="{{url('plugins/datetimepicker/js/jquery.datetimepicker.full.js')}}"></script>
    <script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
    <script src="{{url('js/admin/suballotmet.js')}}"></script>
@endsection
