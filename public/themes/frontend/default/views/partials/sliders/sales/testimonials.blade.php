<?php
$testimonials = \Modules\Testimonial\Models\Testimonial::orderBy('order')->get();
?>
<div class="container-fluid testimonialSliderWrap">
    <div class="container">
        <div class="testimonialSlider">
            @foreach($testimonials as $testimonial)
            <div class="testimonial">
                <div class="testm_text">
                    {{ $testimonial->testimonial }}
                </div>
                <div class="testm_auth">{{ $testimonial->name }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>