<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.headers.sales.subheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('partials.headers.sales.search',
    ['companyID' => Request::get('company'),
    'modelID' => Request::get('model'),
    'fuelID' => Request::get('fuel')
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container mb40">
        <div class="row">
            <div class="col-xs-12 sResult pL_sale">
                Wir haben
                <span class="isBold">
                    <?php
                    switch ($cars->count()):
                        case 0:
                            echo 'keine Angebote';
                            break;
                        case 1:
                            echo 'ein Angebot';
                            break;
                        default:
                            echo $cars->count() . ' Angebote';
                    endswitch;
                    ?>
                </span>
                gefunden
            </div>
        </div>
        <?php foreach($cars as $car): ?>
            <div class="row carBox pL_sale">
                <div class="col-md-4 pl0">
                    <a href="<?php echo e(route('cars::show', $car->id)); ?>">
                        <img src="/imager<?php echo e($car->photos()->first()->path); ?>" alt="Luxusklasse"
                             class="img-responsive carDetailImg">
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="tableHeader">
                        <a href="<?php echo e(route('cars::show', $car->id)); ?>"><h3 class="m_center"><?php echo e($car->title); ?></h3></a>
                        <p class="m_center"><?php echo e($car->specifics()->where('name', 'condition')->get()->first()->value); ?></p>
                    </div>
                    <div class="carDetails">
                        <div>
                            <?php $data = new \Carbon\Carbon($car->first_registration) ?>
                            <p>EZ <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data)->format('m.Y')); ?></p>
                            <p><?php echo e($car->mileage); ?> km</p>
                            <?php if($car->power != 0): ?>
                                <p><?php echo e($car->power); ?> kW (<?php echo e(\App\Helpers\Helper::kwToPS($car->power)); ?> PS)</p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <p><?php echo e($car->specifics()->where('name', 'fuel')->get()->first()->value); ?></p>
                            <p><?php echo e($car->specifics()->where('name', 'gearbox')->get()->first()->value); ?></p>
                        </div>
                        <div>
                            <?php if(isset($car->consumptions->combined)): ?>
                                <p>Kraftstoffverbr. komb.: ca. <?php echo e($car->consumptions->combined); ?> l/100 km - CO 2
                                    -Emissionen komb.: ca. <?php echo e($car->consumptions->co2_emission); ?> g/km</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 pr0 text-right">
                    <div class="carBox_priceInfo">
                        <div class="carSlide_price m_center">
                            <span>€</span>
                            <?php echo e(\App\Helpers\Helper::smartPrice($car->price)); ?>

                        </div>
                        <?php if($car->vatable): ?>
                            <div class="carSlide_text m_center">
                                <p>inkl. 19% MwSt.</p>
                                <p>€ <?php echo e(\App\Helpers\Helper::smartPrice(\App\Helpers\Helper::noneTax($car->price))); ?>

                                    Netto</p>
                            </div>
                        <?php endif; ?>
                        <div class="carBox_specs">
                            <?php if(isset($car->specifics()->where('name', 'door-count ')->get()->first()->value)): ?>
                            <span>
                                <img src="/<?php echo e(\App\Helpers\Helper::assetsUrl('/img/doorsCount.png')); ?>"
                                     alt="doors_count">
                                <?php echo e($car->specifics()->where('name', 'door-count ')->get()->first()->value); ?>

                            </span>
                            <?php endif; ?>
                            <span>
                                <img src="/<?php echo e(\App\Helpers\Helper::assetsUrl('/img/personCount.png')); ?>"
                                     alt="people_count">
                                </span>
                        </div>
                        <div class="carBox_action">
                            <a href="<?php echo e(route('cars::show', $car->id)); ?>">
                                <button class="btn btn-block" name="Fahrzeug wählen">Fahrzeug wählen</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>