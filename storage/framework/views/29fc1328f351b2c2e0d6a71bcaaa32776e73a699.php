<?php
$cars = \Modules\Car\Models\Car::newCars();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 text-center">
            <h1>Frisch eingetroffen!</h1>
        </div>
    </div>
    <div class="row">
        <div class="carSlider saleSlider">
            <?php foreach($cars as $car): ?>
                <div>
                    <?php if(isset($car->photos()->first()->path)): ?>
                        <a href="<?php echo e(route('cars::show', $car->id)); ?>"></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('cars::show', $car->id)); ?>"><img src="/imager<?php echo e($car->photos()->first()->path); ?>"></a>
                    <?php endif; ?>
                    <h2 class="carSlide_name">
                        <?php if(strlen($car->company->name.' '.$car->title) > 30): ?>
                            <?php echo e(substr($car->company->name.' '.$car->title, 0, 30)); ?>...
                        <?php else: ?>
                            <?php echo e($car->company->name.' '.$car->title); ?>

                        <?php endif; ?>

                    </h2>
                    <div class="carSlide_price">
                        <span>€</span>
                        <?php echo e(\App\Helpers\Helper::smartPrice($car->price)); ?>

                    </div>
                    <?php if($car->vatable == 1): ?>
                        <div class="carSlide_text mb40">inkl. 19% MwSt.</div>
                    <?php endif; ?>
                    <div class="carSlide_action">
                        <a href="<?php echo e(route('cars::show', $car->id)); ?>">
                            <button type="button" class="btn btn-negative" aria-label="Jetzt Prüfen">
                                Details Ansehen
                            </button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>