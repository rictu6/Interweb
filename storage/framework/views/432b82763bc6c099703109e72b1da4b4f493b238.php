<?php $__env->startSection('title'); ?>
  <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('plugins/swtich-netliva/css/netliva_switch.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-th"></i>
            <?php echo e(__('Dashboard')); ?>

          </h1>
        </div><!-- /.col -->

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><?php echo e(__('FDMS Dashboard')); ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_orsheader','view_accounting_reports','generate_report_accounting')): ?>
<div class="row">
    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="<?php echo e(route('admin.orsheader_list')); ?>" >
            <i class="fa fa-list"></i>
            <?php echo e(__('ORS Encoding')); ?>

          </a>

        </div>
    </div>

    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="<?php echo e(route('admin.suballotments.index')); ?>" >
            <i class="fa fa-list"></i>
            <?php echo e(__('Sub-Allotment Encoding')); ?>

          </a>

        </div>
    </div>
    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="<?php echo e(route('admin.allotments.index')); ?>" >
            <i class="fa fa-list"></i>
            <?php echo e(__('Allotment Encoding')); ?>

          </a>

        </div>
    </div>

    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="<?php echo e(route('admin.accounting.index')); ?>" >
            <i class="fa fa-list"></i>
            <?php echo e(__('Reports')); ?>

          </a>
        </div>
    </div>
    <div class="card card-primary" style="width: 400px; margin: 0 auto;">
        <div class="card-header" style="display: flex; justify-content: center; align-items: center;">
        <a class="btn btn-primary btn-sm text-uppercase" href="<?php echo e(route('admin.dvreceivings.index')); ?>" >
            <i class="fa fa-list"></i>
            <?php echo e(__('DV Entry')); ?>

          </a>
        </div>
    </div>
</div>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <!-- Switch -->
  <script src="<?php echo e(url('plugins/swtich-netliva/js/netliva_switch.js')); ?>"></script>
  <script src="<?php echo e(url('js/admin/orsheaders.js')); ?>"></script>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Interweb\resources\views/admin/orsheaders/index.blade.php ENDPATH**/ ?>