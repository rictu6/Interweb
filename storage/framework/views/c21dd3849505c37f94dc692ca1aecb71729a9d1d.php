<?php if($errors->any()): ?>
<div class="callout callout-danger">
    <h5 class="text-danger">
        <i class="fa fa-times"></i> <?php echo e(__('Failed')); ?>

    </h5>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<?php if(session()->has('success')): ?>
<div class="callout callout-success">
    <h5 class="text-success">
        <i class="fa fa-check"></i> <?php echo e(__('Success')); ?>

    </h5>
    <p>
        <?php echo e(session()->get('success')); ?>

    </p>
</div>
<?php endif; ?>

<?php if(session()->has('failed')): ?>
<div class="callout callout-danger">
    <h5 class="text-danger">
        <i class="fa fa-times"></i> <?php echo e(__('Failed')); ?>

    </h5>
    <p>
        <?php echo e(session()->get('failed')); ?>

    </p>
</div>
<?php endif; ?>

<?php /**PATH C:\laragon\www\Interweb\resources\views/partials/validation_errors.blade.php ENDPATH**/ ?>