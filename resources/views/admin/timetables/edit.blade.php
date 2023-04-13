@extends('layouts.app')

@section('title')
{{__('Edit Timetable')}}
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <i class="fa fa-cogs nav-icon"></i>
              {{__('Timetables')}}
            </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.timetables.index')}}">{{__('Timetables')}}</a></li>
            <li class="breadcrumb-item active">{{__('Edit Timetable')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('Edit Timetable')}}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="{{route('admin.timetables.update',$timetable->id)}}">
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            @method('put')
            @include('admin.timetables._form')
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
<script src="{{url('js/admin/disableInspectElecment.js')}}"></script>
  <script src="{{url('js/admin/timetables.js')}}"></script>
@endsection