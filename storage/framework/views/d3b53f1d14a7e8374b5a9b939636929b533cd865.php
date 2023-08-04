
<?php $__env->startSection('title'); ?>
  <?php echo e(__('Login Panel')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('admin.auth.login_submit')); ?>" method="post" class="validate-form">

    <span class="login100-form-title p-b-43">
        <?php echo e(__('Login')); ?>

    </span>

    <div class="wrap-input100 validate-input <?php if($errors->has('user_name')): ?> error-validation <?php endif; ?>">
        <input class="input100" type="text" name="user_name" id="user_name" value="<?php echo e(old('user_name')); ?>" required>
        <span class="focus-input100"></span>
        <span class="label-input100"><?php echo e(__('User Name')); ?></span>
    </div>

    <div class="wrap-input100 validate-input <?php if($errors->has('password_hash')): ?> error-validation <?php endif; ?>">
        <input class="input100" type="password" name="password_hash" id="password_hash" required>
        <span class="focus-input100"></span>
        <span class="label-input100"><?php echo e(__('Password')); ?></span>
    </div>

    <div class="flex-sb-m w-full p-t-3 p-b-32">
        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
            <label class="label-checkbox100" for="ckb1">
                <?php echo e(__('Remember Me')); ?>

            </label>
        </div>

        <div>
            <a href="<?php echo e(route('admin.reset.mail')); ?>" class="txt1">
                <?php echo e(__('Forgot Password?')); ?>

            </a>
        </div>
    </div>


    <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit">
            <?php echo e(__('Login')); ?>

        </button>
    </div>


</form>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url('js/admin/disableInspectElecment.js')); ?>"></script>
<script src="<?php echo e(url('js/admin/preventbackbutton.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Interweb\resources\views/auth/admin/login.blade.php ENDPATH**/ ?>