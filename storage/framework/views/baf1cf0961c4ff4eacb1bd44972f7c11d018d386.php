<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo e(url('img/logo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      
      <span class="brand-text font-weight-light"><img src="<?php echo e(url('img/r6.png')); ?>" alt="AdminLTE Logo" class="brand-image elevation-3"
        ></span>
    </a>
    <!-- \Brand Logo -->
    
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <!-- <img src="<?php echo e(url('dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image"> -->

            <img class="img-circle elevation-2" src="<?php if(!empty(auth()->guard('admin')->user()->pic_emp)): ?><?php echo e(url('uploads/signature/'.auth()->guard('admin')->user()->pic_emp)); ?> <?php else: ?> <?php echo e(url('img/no-image.png')); ?> <?php endif; ?>" alt="<?php echo e(__('pic_emp')); ?>">

          </div>
          <div class="info">
            <a href="<?php echo e(route('admin.profile.edit')); ?>" class="d-block">
              <?php if(Auth::guard('admin')->check()): ?>
                <?php echo e(Auth::guard('admin')->user()->first_name); ?>

                <?php echo e(Auth::guard('admin')->user()->middle_name); ?>

                <?php echo e(Auth::guard('admin')->user()->last_name); ?>

               
              <?php else: ?> 
               
              <?php endif; ?>
            </a>
          

            <a href="<?php echo e(route('admin.profile.edit')); ?>" class="d-block">
              <?php if(Auth::guard('admin')->check()): ?>
                <?php echo e(Auth::guard('admin')->user()->position->pos_desc); ?>

               
               
              <?php else: ?> 
               
              <?php endif; ?>
            </a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <!-- Admin sidebar -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
        <?php echo $__env->make('partials.admin_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- \Admin sidebar -->
        <!-- Patient sidebar -->
        <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('patient')): ?>
          <?php echo $__env->make('partials.patient_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <!-- \Patient sidebar -->
      <!-- /.sidebar-menu -->
    </div>
</aside>
<!-- /.sidebar --><?php /**PATH C:\laragon\www\Interweb\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>