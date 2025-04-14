
<?php $__env->startSection("title","Trang chủ Golden Tree"); ?>
<?php $__env->startSection("content"); ?>
    <?php echo $__env->make('homepage.sections.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('homepage.sections.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('homepage.sections.about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('homepage.sections.room_detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\BTN-PTUDMNM-tcdt\resources\views/homepage/trangchu.blade.php ENDPATH**/ ?>