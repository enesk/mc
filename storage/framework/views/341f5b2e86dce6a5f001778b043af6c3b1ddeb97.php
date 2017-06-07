<?php
$testimonials = \Modules\Testimonial\Models\Testimonial::orderBy('order')->get();
?>
<div class="container-fluid testimonialSliderWrap">
    <div class="container">
        <div class="testimonialSlider">
            <?php foreach($testimonials as $testimonial): ?>
            <div class="testimonial">
                <div class="testm_text">
                    <?php echo e($testimonial->testimonial); ?>

                </div>
                <div class="testm_auth"><?php echo e($testimonial->name); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>