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
                    <?php if(isset($car->photos()->first()->path)): ?>
                        <a href="<?php echo e(route('cars::show', $car->id)); ?>">
                            <img src="/imager<?php echo e($car->photos()->first()->path); ?>" alt="Luxusklasse"
                                 class="img-responsive carDetailImg">
                        </a>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div class="tableHeader">
                        <a href="<?php echo e(route('cars::show', $car->id)); ?>"><h3 class="m_center"><?php echo e($car->title); ?></h3></a>
                    </div>
                    <div class="carDetails">
                        <div>
                            <?php $data = new \Carbon\Carbon($car->first_registration) ?>
                            <p>EZ <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data)->format('m.Y')); ?></p>
                            <p><?php echo e(number_format($car->mileage, 0, ',', '.')); ?> km</p>
                            <?php if($car->power != 0): ?>
                                <p><?php echo e($car->power); ?> kW (<?php echo e(\App\Helpers\Helper::kwToPS($car->power)); ?> PS)</p>
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
                            <?php if(isset($car->specifics()->where('name', 'door-count')->get()->first()->value)): ?>
                                <span style="background: #fff;"></span>
                                <span>
                                <img src="/<?php echo e(\App\Helpers\Helper::assetsUrl('/img/doorsCount.png')); ?>"
                                     alt="doors_count">
                                    <?php if($car->specifics()->where('name', 'door-count')->get()->first()->key == 'FOUR_OR_FIVE'): ?>
                                        4/5
                                    <?php elseif($car->specifics()->where('name', 'door-count')->get()->first()->key == 'TWO_OR_THREE'): ?>
                                        2/3
                                    <?php endif; ?>
                            </span>
                            <?php endif; ?>
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