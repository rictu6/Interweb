<?php if(count($info['socials'])): ?>
<div class="row pt-4">
    <div class="col-lg-12">
        <h6 class="text-center mb-3">- <?php echo e(__('Follow Us')); ?> -</h6>
    </div>
   <div class="col-lg-12">
    <ul class="social text-center">
        <?php $__currentLoopData = $info['socials']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(!empty($value)): ?>
            <li class="d-inline">
              <a href="<?php echo e($value); ?>">
                <img src="<?php echo e(url('img/'.$key.'.png')); ?>" width="40px">
              </a>
            </li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
   </div>
</div>
<?php endif; ?><?php /**PATH C:\laragon\www\Interweb\resources\views/partials/socials.blade.php ENDPATH**/ ?>