@can('edit_timetable')
<a href="{{route('admin.timetables.edit',$timetable['id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_timetable')
<form method="POST" action="{{route('admin.timetables.destroy',$timetable['id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_timetable">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan