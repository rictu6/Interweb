<?php $__env->startSection('title'); ?>
<?php echo e(__('Accounting')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">
          <i class="nav-icon fas fa-calculator"></i>
          <?php echo e(__('Accounting')); ?>

        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.orsheaders.index')); ?>"><?php echo e(__('FDMS Dashboard')); ?></a></li>
          <li class="breadcrumb-item active"><?php echo e(__('Accounting')); ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_accounting_reports','generate_report_accounting')): ?>
<div class="card card-primary">
  <!-- card-header -->
  <div class="card-header">
    <h3 class="card-title"><?php echo e(__('Accounting Report')); ?></h3>
  </div>

  <div class="card-body">

    <!-- Filtering Form -->
    
    <!-- Filtering Form -->

    <div class="printable">
      <div class="row">
        <div class="col-12 text-center mt-3 mb-3">
          <h3><?php echo e(__('Accounting Report')); ?></h3>
          <h6 class="text-center"><?php echo e(__('Due Date')); ?>: <?php echo e(date('d-m-Y')); ?></h6>
          
        </div>
      </div>


      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Group Tests')); ?></h5>
          <div class="card-tools no-print">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered datatable">
            <thead>
              <tr>
                <th><?php echo e(__('Date')); ?></th>
                <th><?php echo e(__('DV No')); ?></th>
                <th><?php echo e(__('Check No')); ?></th>
                <th><?php echo e(__('ORS No')); ?></th>
                <th><?php echo e(__('Payee')); ?></th>
                <th><?php echo e(__('Deposits')); ?></th>
                <th><?php echo e(__('Withdrawal/Payments')); ?></th>
                <th><?php echo e(__('Balance')); ?></th>
                <th><?php echo e(__('Account Description')); ?></th>
                <th><?php echo e(__('UACS Code')); ?></th>

                
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($ors->date); ?></td>
                    <td><?php echo e($ors->dv_no); ?></td>
                    <td><?php echo e($ors->check_no); ?></td>
                    <td><?php echo e($ors->ors_no); ?></td>
                    <td><?php echo e($ors->payee); ?></td>
                    <td><?php echo e($ors->deposits); ?></td>
                    <td><?php echo e($ors->payments); ?></td>
                    <td><?php echo e($ors->balance); ?></td>
                    <td><?php echo e($ors->account_desc); ?></td>
                    <td><?php echo e($ors->uacs_code); ?></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

          </table>
        </div>
      </div>

      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title"><?php echo e(__('Accounting Report Summary')); ?></h5>
          <div class="card-tools no-print">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover table-stripped">

            <tbody>
              <tr>
                <th width="100px"><?php echo e(__('Total')); ?>:</th>
                
              </tr>

            </tbody>
          </table>
        </div>
      </div>

    </div>

  </div>

  <?php if(isset($pdf)): ?>
  <div class="card-footer">
    <a href="<?php echo e($pdf); ?>" class="btn btn-danger">
       <i class="fas fa-file-pdf"></i> <?php echo e(__('PDF')); ?>

    </a>
  </div>
  <?php endif; ?>

</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(url('plugins/print/jQuery.print.min.js')); ?>"></script>
<script src="<?php echo e(url('js/admin/accounting.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Interweb\resources\views/admin/accounting/index.blade.php ENDPATH**/ ?>