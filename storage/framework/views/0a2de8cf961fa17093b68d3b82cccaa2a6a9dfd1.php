<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('rental::headers.darksubheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('rental::headers.infobar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('rental::headers.changeData', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 sResult">
                Wählen Sie Ihren Tarif und weitere Extras
            </div>
        </div>
    </div>
    <div class="container price_extras">
        <div class="row carBox">
            <div class="col-md-4 pt15">
                <div class="row ">
                    <div class="col-xs-12 text-center">
                        <img class="img-responsive carDetailImg" alt="Luxusklasse" src="/<?php echo e($car->photo); ?>">
                    </div>
                    <div class="col-xs-12">
                        <div class="tableHeader">
                            <h3 class="isHighlighted"><?php echo e($car->name); ?></h3>
                            <p><?php echo e($car->details); ?></p>
                        </div>
                        <div class="carBox_specs specHalf">
                            <?php foreach(json_decode($car->specifics) as $specific): ?>
                                <span>
                                <?php $spec = \Modules\Rental\Models\Specific::find($specific); ?>
                                    <?php if($spec->key == 'doors'): ?>
                                        <img alt="doors_count"
                                             src="/<?php echo e(\App\Helpers\Helper::assetsUrl('/img/')); ?>doorsCount.png">
                                        <?php echo e(substr($spec->name, 0, 1)); ?>

                                    <?php elseif($spec-> key == 'person'): ?>
                                        <img alt="people_count"
                                             src="/<?php echo e(\App\Helpers\Helper::assetsUrl('/img/')); ?>personCount.png">
                                        <?php echo e(substr($spec->name, 0, 1)); ?>

                                    <?php elseif($spec->key == 'transmission'): ?>
                                        <?php if($spec->name == 'Automatikgetriebe'): ?>
                                            <img alt="Automatikgetriebe"
                                                 src="/<?php echo e(\App\Helpers\Helper::assetsUrl('/img/')); ?>gear-automatic.png">
                                            A
                                        <?php else: ?>
                                            <img alt="Schaltgetriebe"
                                                 src="/<?php echo e(\App\Helpers\Helper::assetsUrl('/img/')); ?>gear-manual.png">
                                            M
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="carInfoTable">
                            <div class="carInfoTable_header">
                                Tarif
                            </div>
                            <div class="carInfoTable_body">
                                <div class="row">
                                    <div class=" col-xs-8">
                                        <h3><?php echo e(session('reservation.days')); ?><?php if(session('reservation.days') > 1): ?>
                                                Tage <?php else: ?> Tag <?php endif; ?></h3>
                                        <p>
                                            Inkl. <?php echo e($car->km_inclusive*session('reservation.days')); ?> Freikilometer.
                                            (<?php echo e($car->km_inclusive); ?>km/Tag; € <?php echo e($car->extra_km_price); ?>

                                            /Zusatzkilometer)
                                        </p>

                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <div class="carSlide_text">Preis</div>
                                        <div class="carSlide_price">
                                            <span>€</span>
                                            <?php echo e(\App\Helpers\Helper::smartPrice(\App\Helpers\Helper::calculateRentalPrice(session('reservation.days'), $car->daily_price))); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="post" action="<?php echo e(route('rental::check')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="carInfoTable">
                                <div class="carInfoTable_header">
                                    Extras
                                </div>
                                <div class="carInfoTable_body">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <p><input name="extras[]" value="1" type="checkbox"> Automatikwunsch </p>
                                            <p><input name="extras[]" value="2" type="checkbox"> Navigationssystem </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-right totalPrice">
                            <span class="totalPrice_label">Gesamtpreis</span>
                            <span class="totalPrice_currency">€</span>
                            <span class="totalPrice_price"><?php echo e(\App\Helpers\Helper::smartPrice(session('reservation.totalPrice'))); ?></span>
                        </div>
                        <div class="col-xs-12 text-right totalPrice_vat">
                            inkl. 19% MwSt
                        </div>
                        <div class="col-xs-12 text-right totalPrice_action">
                            <a href="<?php echo e(route('rental::check')); ?>">
                                <button class="btn" type="submit">Tarif &amp; Extras Übernehmen</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>