<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php foreach(\Modules\Rental\Models\Station::all() as $station): ?>
                <a href="<?php echo e(str_slug($station->city)); ?>/sales" class="col-lg-4 col-sm-4 col-xs-6 start-locations"
                   style="background-image: url(<?php echo e($station->photo); ?>);">
                    <span class="start-location-name"><?php echo e($station->city); ?> <i class="fa fa-arrow-right"></i></span>
                </a>
            <?php endforeach; ?>
            <a href="http://www.millenniumtrucks.de/" target="_blank" class="col-lg-4 col-sm-4 col-xs-12 start-locations"
               style="background-image: url(<?php echo e(\App\Helpers\Helper::uploadsURL('/stations/start-standort-4.png')); ?>);">
                <span class="start-location-name">Millenniumtrucks <i class="fa fa-arrow-right"></i></span>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>