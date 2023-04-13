@can('edit_office')
<a href="{{route('admin.offices.edit',$office['office_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_office')
<form method="POST" action="{{route('admin.offices.destroy',$office['office_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_office">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan