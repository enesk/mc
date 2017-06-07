<div class="mainSlider">
    <?php foreach(\App\Helpers\Helper::getSlider('sales-home') as $slide): ?>
        <div>
            <img alt="<?php echo e($slide->title); ?>" src="/<?php echo e($slide->image); ?>">
        </div>
    <?php endforeach; ?>
</div>
