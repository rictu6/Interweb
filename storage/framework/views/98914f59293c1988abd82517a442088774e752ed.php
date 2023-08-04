<?php $__env->startSection('title'); ?>
<?php echo e(__('Encode Sub-Allotment')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('plugins/datetimepicker/css/jquery.datetimepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    <i class="fa fa-home"></i>
                    <?php echo e(__('FDMS')); ?>

                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.orsheaders.index')); ?>"><?php echo e(__('FDMS Dashboard')); ?></a></li>
                    
                    <li class="breadcrumb-item active"><?php echo e(__('Encode Sub-Allotment')); ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><?php echo e(__('Create Sub-Allotment')); ?></h3>
    </div>
    <!-- /.card-header -->
    <form method="POST" action="<?php echo e(route('admin.suballotments.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="col-lg-12">
                <?php echo $__env->make('admin.suballotments._form_suballotment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-check"></i>  <?php echo e(__('Save')); ?>

                </button>
            </div>
        </div>
    </form>
    <!-- /.card-body -->
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script>
    //components
    var count=$('#count').val();
 $('.add_component').on('click',function(){
   count++;
   console.log(count);
   $('.components .items').append(`
   <tr dtl_id="approdtls${count}" num="${count}">
    <td>
        <div class="form-group">
        <select class="form-control" id="uacs_subobject_code" name="approdtls[${count}][uacs_subobject_code]" >
        <option value="">Select</option>
        <?php $__currentLoopData = $uacs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($row->uacs_subobject_id); ?>"><?php echo e($row->code); ?> - <?php echo e($row->description); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
    </td>
                                                <td>
                                            <div class="form-group">
                                                                <div class="input-group form-group mb-3">
                                                                    <input type="number" class="form-control" name="approdtls[${count}][allotment_received]"  min="0" class="allotment_received" required>
                                                                    <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <?php echo e(get_currency()); ?>

                                                                    </span>
                                                                    </div>
                                                                </div>
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
    <script src="<?php echo e(url('plugins/datetimepicker/js/jquery.datetimepicker.full.js')); ?>"></script>
    <script src="<?php echo e(url('js/admin/disableInspectElecment.js')); ?>"></script>
    <script src="<?php echo e(url('js/admin/suballotment.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Interweb\resources\views/admin/suballotments/index.blade.php ENDPATH**/ ?>