<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="agenda_date">{{__('Date of Agenda')}}</label>
           
            <select class="form-control" name="div_id" id="division">
                {{-- @if(isset($user)&&isset($user['division']))
                <option value="{{$user['division']['div_id']}}" selected>{{$user['division']['div_desc']}}
                </option>
                @endif --}}
            </select>


           
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="organize_by">{{__('Organize By')}}</label>
            <div class="input-group form-group mb-3">
              
                    <input type="text" class="form-control" placeholder="{{__('Organize By')}}" name="middle_name" @if(isset($user)) value="{{$user['middle_name']}}" @endif required>
       
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="bio_id">{{__('Weekday')}}</label>
            <div class="input-group form-group mb-3">
               
                <select class="form-control" name="weekday" placeholder="{{__('Weekday')}}" id="weekday" required>
                    <option value="" disabled selected>{{__('Select Days')}}</option>
                    <option value="1" @if(isset($timetable)&&$timetable['weekday']=='1' ) selected @endif>{{__('Monday')}}
                    </option>
                    <option value="2" @if(isset($timetable)&&$timetable['weekday']=='2' ) selected @endif>{{__('Tuesday')}}
                    </option>
                    <option value="3" @if(isset($timetable)&&$timetable['weekday']=='3' ) selected @endif>{{__('Wednesday')}}
                    </option>
                    <option value="4" @if(isset($timetable)&&$timetable['weekday']=='4' ) selected @endif>{{__('Thursday')}}
                    </option>
                    <option value="5" @if(isset($timetable)&&$timetable['weekday']=='5' ) selected @endif>{{__('Friday')}}
                    </option>
                    <option value="6" @if(isset($timetable)&&$timetable['weekday']=='6' ) selected @endif>{{__('Saturday')}}
                    </option>
                    <option value="7" @if(isset($timetable)&&$timetable['weekday']=='7' ) selected @endif>{{__('Sunday')}}
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="start_time">{{__('Start Time')}}</label>
            <div class="input-group form-group mb-3">
              
                    <input type="text" class="form-control" placeholder="{{__('Start Time')}}" name="middle_name" @if(isset($user)) value="{{$user['middle_name']}}" @endif required>
       
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="end_time">{{__('End Time')}}</label>
            <div class="input-group form-group mb-3">
              
                    <input type="text" class="form-control" placeholder="{{__('End Time')}}" name="middle_name" @if(isset($user)) value="{{$user['middle_name']}}" @endif required>
       
            </div>
        </div>
    </div>
    
</div>
