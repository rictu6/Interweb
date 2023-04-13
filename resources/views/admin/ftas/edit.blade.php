@extends('layouts.app')

@section('title')
{{__('Edit FTA')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <i class="fa fa-cogs nav-icon"></i>
              {{__('Foreign Travel Authority')}}
            </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.ftas.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.fta_list')}}">{{ __('FTA') }}</a>
            </li>
            <li class="breadcrumb-item active">{{__('Edit FTA')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Edit FTA')}}</h3>
    </div>
    <!-- /.card-header -->
    <form id="edit_form" method="POST" action="{{route('admin.ftas.update',$fta->fta_id)}}">
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @method('put')
            @include('admin.ftas._form_edit')
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-check"></i> {{__('Save')}}
            </button>
        </div>
    </form>
    <!-- /.card-body -->
  </div>

@endsection
@section('scripts')
{{-- <script>
    window.onload = function() {
      // get the selected value from the select element
      var selectedOption = document.getElementById('destination').value;
      // call the myFunction function with the selectedOption parameter
      myFunction(selectedOption);
    };
  </script> --}}
  <script>
    var destinationInput = document.getElementById("destination");
    var appearDiv = document.getElementById("appear");

    if (destinationInput.value.toLowerCase() === "foreign" ) {
      appearDiv.style.display = "block";
    } else {
      appearDiv.style.display = "none";
    }

    destinationInput.addEventListener("input", function() {
      if (destinationInput.value.toLowerCase() === "foreign") {
        appearDiv.style.display = "block";
      } else {
        appearDiv.style.display = "none";
      }
    });
  </script>
<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
  <script src="{{url('js/admin/ftas.js')}}"></script>
  <script src="{{url('js/admin/window_load.js')}}"></script>
@endsection
