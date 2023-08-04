<?php $__env->startSection('title'); ?>
    <?php echo e(__('Fund Disbursement Monitoring System')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-layer-group"></i>
            <?php echo e(__('Fund Disbursement Monitoring System')); ?>

          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.orsheaders.index')); ?>"><?php echo e(__('FDMS Dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="#"><?php echo e(__('ORS Listing')); ?></a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title"><?php echo e(__('ORS Listing Table')); ?></h3>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_orsheader')): ?>
        <a href="<?php echo e(route('admin.orsheaders.create')); ?>" class="btn btn-primary btn-sm float-right">
          <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

        </a>
      <?php endif; ?>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
       <div class="col-lg-12 table-responsive">
          <table id="ordheaders_table" class="table table-striped table-hover table-bordered"  width="100%">
            <thead>
              <tr>
                

                <th><?php echo e(__('ORS No')); ?></th>
                <th><?php echo e(__('Allotment Class/ Fund Source')); ?></th>
                <th><?php echo e(__('Payee/ Particulars')); ?></th>
                <th><?php echo e(__('Amount')); ?></th>
                <th><?php echo e(__('Processed By ')); ?></th>
                
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
       </div>
    </div>
    <!-- /.card-body -->
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(url('js/admin/orsheaders.js')); ?>"></script>
  <script src="<?php echo e(url('js/admin/disableInspectElecment.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Interweb\resources\views/admin/orsheaders/orsheader_list.blade.php ENDPATH**/ ?>