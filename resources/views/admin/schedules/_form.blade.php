<div class="form-group">
    <label for="name">{{__('Posted By')}}</label>

    <input type="hidden" class="form-control" name="emp_id" value="{{Auth::guard('admin')->user()->emp_id}}" required>
    <input readonly type="text" class="form-control" placeholder="{{__('Posted By')}}" name="posted_by"
        value="{{Auth::guard('admin')->user()->user_name}}" required>
</div>

<div class="form-group">
    <label for="name">{{__('Posted Date')}}</label>
    <input readonly type="date" class="form-control" placeholder="{{__('Posted Date')}}" name="posted_date"
        value="<?php echo date('Y-m-d'); ?>" required>

</div>



<div class="form-group">
    <label for="name">{{__('Title/Description')}}</label>
    <input type="text" placeholder="Title/Description" name="title" id="title" class="form-control" @if(isset($user))
        value="{{$user['title']}}" @endif required>
</div>


<div class="form-group">
    <label for="name">{{__('Venue')}}</label>
    <input type="text" placeholder="Venue" name="venue" id="venue" class="form-control" @if(isset($user))
        value="{{$user['venue']}}" @endif required>
</div>





<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Hosted By')}}</h3>
    </div>

    <div class="card-body">


        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>{{__('Select Office')}}</label>



                    <select class="form-control" name="office_id" id="office" required>
                        @if(isset($user)&&isset($user['office']))
                        <option value="{{$user['office']['office_id']}}" selected>{{$user['office']['office_desc']}}
                        </option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>{{__('Select Division')}}</label>
                    <select class="form-control" name="div_id" id="division" required>
                        @if(isset($user)&&isset($user['division']))
                        <option value="{{$user['division']['div_id']}}" selected>{{$user['division']['acronym']}}
                        </option>
                        @endif
                    </select>


                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>{{__('Select Section')}}</label>
                    <select class="form-control" name="sec_id" id="sec_id">
                        @if(isset($user)&&isset($user['section']))
                        <option value="{{$user['section']['sec_id']}}" selected>{{$user['section']['sec_desc']}}
                        </option>
                        @endif
                    </select>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="datefrom">{{__('Start Date')}}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-calendar"></i>
                    </span>
                </div>



                {{-- <input type="date" class="form-control" id="start" placeholder="{{__('Start')}}"
                    name="start" value= "{{ Carbon\Carbon::now()->addDay()->format('Y-m-d') }}"  > --}}
                  
                    <input type="text" class="form-control datepicker" id="start" placeholder="{{__('Start')}}"
                    name="start" @if(isset($user)) value="{{$user['start']}}"  @endif>

                   

            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="dateto">{{__('End Date')}}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-calendar"></i>
                    </span>
                </div>
                <input type="text" class="form-control datepicker" id="end" placeholder="{{__('End')}}"
                name="end" @if(isset($user)) value="{{$user['end']}}"  @endif>
            </div>
        </div>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('Select Attendees By Position')}}</h3>
    </div>


    <div class="card-body">


        {{-- 
<button type="button" class="btn btn-warning btn-sm add_patient float-right"  >
    <i class="fa fa-exclamation-triangle" ><a href="{{route('admin.divisions.index')}}" ></a></i>
        {{__('Override Attendees ?')}}
        </button> --}}


        <div class="form-group">
            <label>{{__('Select Position')}}</label>
            <select class="form-control" name="pos_id" id="position" multiple>
                @if(isset($user)&&isset($user['position']))
                <option value="{{$user['position']['pos_id']}}" selected>{{$user['position']['pos_desc']}}</option>
                @endif
            </select>
        </div>


        {{-- <div class="form-group">
            <label>{{__('Select User')}}</label>
            <select class="form-control" name="emp_id" id="attendee">
                @if(isset($user)&&isset($user['attendee']))
                <option value="{{$user['attendee']['emp_id']}}" selected>{{$user['attendee']['last_name']}}</option>
                @endif
            </select>
        </div> --}}
        
     
        {{-- <div class="btn btn-warning btn-sm add_patient float-right">
            <a href="{{route('admin.divisions.index')}}" style="color: white"
                class="fa fa-exclamation-triangle">{{__('Override Attendees ?')}}</a>
        </div> --}}
        
        <div class="form-group">
            <label>{{__('Select Attendee/s')}}</label>
            <select  name="roles[]" id="roles_assign" placeholder="{{__('Select Attendee/s')}}"
                class="form-control select2" multiple required>
                @foreach($roles as $role)
                <option value="{{$role->emp_id}}">{{$role->last_name}}, {{$role->first_name}} {{$role->middle_name}}
                </option>

            
                @endforeach
            </select>

        </div>
      




    </div>


</div>



</div>


<script type="application/javascript">
  
</script>