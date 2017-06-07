<?php $__env->startSection('content'); ?>
    <div class="container-fluid twoColorBorder"></div>
    <div class="container-fluid aboutUs" style="background-image: url(<?php echo e($page->header_bg); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="aboutUs_title"><?php echo e($page->title); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-xs-12 standard_main">
                        <?php echo \Shortcode::compile($page->content); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php echo e(\App\Helpers\MenuHelper::getSidebarMenu($page->sidebar_menu_id)); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>