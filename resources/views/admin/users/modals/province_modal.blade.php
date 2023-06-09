<div class="modal fade" id="province_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{__('Create Province')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{route('ajax.create_province')}}" method="POST" id="create_province">
            @csrf
            <div class="text-danger" id="province_modal_error"></div>
            <div class="modal-body" id="create_province_inputs">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="create_name">{{__('Name')}}</label>
                            <input type="name"  name="prov_desc" placeholder="{{__('Province Description')}}" class="form-control" required>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Close')}}</button>
                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>