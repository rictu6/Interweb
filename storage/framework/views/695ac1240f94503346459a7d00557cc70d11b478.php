

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
                    <li class="breadcrumb-item active"><?php echo e(__('Dashboard')); ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
<div class="slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="slider/slider0.jpg" style="width:100%">

    </div>
    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="slider/slider1.jpeg" style="width:100%">

    </div>
    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="slider/slider2.jpg" style="width:100%">

    </div>
    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="slider/slider3.jpg" style="width:100%">

    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next_1" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(0)"></span>
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>


</div>

 


<br>

<div class="row">
    <div class="col-lg-6 table-responsive">
        <div class="card card-danger">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-bell"></i> <?php echo e(__('Anouncements')); ?> 
                </h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">
                <marquee class="product-list-in-card pl-2 pr-2">There is no announcements yet.</marquee>
            </div>
        </div>

    </div>
    <div class="col-lg-6 table-responsive">
        <div class="card card-danger">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-calendar"></i> <?php echo e(__('Events')); ?> 
                </h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">
                <marquee class="product-list-in-card pl-2 pr-2">There is no upcoming events yet.</marquee>
            </div>
        </div>

    </div>
</div>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_online_users')): ?>
<!-- Online Users -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-wifi"></i> <?php echo e(__('Online users')); ?> ( <span
                        class="online_count">0</span> )</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0 pb-0">
                <ul class="products-list product-list-in-card pl-2 pr-2 online_list">
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<!-- \Online Users -->
<?php endif; ?>
<!-- Admin Reports -->
<div class="row">
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo e($divisions_count); ?></h3>
                <p><?php echo e(__('Divisions')); ?></p>
            </div>
            <div class="icon">
                <i class="fas fa-file-contract nav-icon"></i>
            </div>
            <a href="<?php echo e(route('admin.divisions.index')); ?>" class="small-box-footer"><?php echo e(__('More info')); ?> <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    

<!-- ./col -->
<div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo e($positions_count); ?></h3>
            <p><?php echo e(__('Positions')); ?></p>
        </div>
        <div class="icon">
            <i class="fas fa-file-contract nav-icon"></i>
        </div>
        <a href="<?php echo e(route('admin.positions.index')); ?>" class="small-box-footer"><?php echo e(__('More info')); ?> <i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo e($offices_count); ?></h3>
            <p><?php echo e(__('Offices')); ?></p>
        </div>
        <div class="icon">
            <i class="fas fa-file-contract nav-icon"></i>
        </div>
        <a href="<?php echo e(route('admin.offices.index')); ?>" class="small-box-footer"><?php echo e(__('More info')); ?> <i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo e($sections_count); ?></h3>
            <p><?php echo e(__('Sections')); ?></p>
        </div>
        <div class="icon">
            <i class="fas fa-file-contract nav-icon"></i>
        </div>
        <a href="<?php echo e(route('admin.sections.index')); ?>" class="small-box-footer"><?php echo e(__('More info')); ?> <i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo e($muncits_count); ?></h3>
            <p><?php echo e(__('Municipality')); ?></p>
        </div>
        <div class="icon">
            <i class="fas fa-file-contract nav-icon"></i>
        </div>
        <a href="<?php echo e(route('admin.muncits.index')); ?>" class="small-box-footer"><?php echo e(__('More info')); ?> <i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo e($empstatuss_count); ?></h3>
            <p><?php echo e(__('Employee Status')); ?></p>
        </div>
        <div class="icon">
            <i class="fas fa-file-contract nav-icon"></i>
        </div>
        <a href="<?php echo e(route('admin.empstatuss.index')); ?>" class="small-box-footer"><?php echo e(__('More info')); ?> <i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo e($provinces_count); ?></h3>
            <p><?php echo e(__('Province')); ?></p>
        </div>
        <div class="icon">
            <i class="fas fa-file-contract nav-icon"></i>
        </div>
        <a href="<?php echo e(route('admin.provinces.index')); ?>" class="small-box-footer"><?php echo e(__('More info')); ?> <i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo e($permissions_count); ?></h3>
            <p><?php echo e(__('Permission')); ?></p>
        </div>
        <div class="icon">
            <i class="fas fa-file-contract nav-icon"></i>
        </div>
        <a href="<?php echo e(route('admin.permissions.index')); ?>" class="small-box-footer"><?php echo e(__('More info')); ?> <i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<!-- today statistics -->






</div>
<!-- /.row -->
<!-- /Admin Reports -->



<!-- Today scheduled visits -->

<!-- /Today scheduled visits -->
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- Switch -->
<script src="<?php echo e(url('plugins/swtich-netliva/js/netliva_switch.js')); ?>"></script>
<script src="<?php echo e(url('js/admin/dashboard.js')); ?>"></script>
<script src="<?php echo e(url('js/admin/slider.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Interweb\resources\views/admin/index.blade.php ENDPATH**/ ?>