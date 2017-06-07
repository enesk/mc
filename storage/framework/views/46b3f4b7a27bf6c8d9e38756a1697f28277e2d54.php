<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('rental::sliders.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <form method="get" action="<?php echo e(route('rental::search')); ?>">
        <input type="hidden" name="days" id="total_days"/>
        <div class="container searchBoxWrapper">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="searchBox" <?php if(session('error')): ?><?php echo e('style=height:360px'); ?><?php endif; ?>>
                        <div>
                            <h2>PKW-Vermietung</h2>
                            <h3>Mietstation Abholung</h3>
                        </div>
                        <?php if(session('error')): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info" role="alert">
                                        <?php echo e(session('error')); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php echo $__env->make('rental::home.stations', ['type' => 'from'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="dateSelection mt10">
                            <div class="dateWrapper">
                                <span class="input-group-addon">Von</span>
                                <input type="text" class="form-control formStyle thinner datepick" placeholder=""
                                       aria-describedby="from_date" name="from_date" id="from_date"
                                       value="<?php echo e(\App\Helpers\Helper::addDaysToCurrentDay(\App\Helpers\Helper::getCurrentDate(), 1)); ?>">
                                <input type="text" class="form-control formStyle thinner timepick" placeholder=""
                                       aria-describedby="from_time" name="from_time" data-toggle="dropdown"
                                       id="from_time_dropdown" value="09:00">
                                <div class="dropdown-menu arrow_box from_time_dropdown"
                                     aria-labelledby="from_time_dropdown">
                                    <h3>Abholzeiten</h3>
                                    <div class="timeTable" id="select_from_time">
                                        <?php echo $__env->make('rental::home.timeTable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="dateWrapper mt10">
                                <span class="input-group-addon">Bis</span>
                                <input type="text" class="form-control formStyle thinner datepick" placeholder=""
                                       aria-describedby="to_date" name="to_date" id="to_date"
                                       value="<?php echo e(\App\Helpers\Helper::addDaysToCurrentDay(\App\Helpers\Helper::getCurrentDate(), 2)); ?>">
                                <input type="text" class="form-control formStyle thinner timepick" placeholder=""
                                       aria-describedby="to_time" name="to_time" data-toggle="dropdown"
                                       id="to_time_dropdown" value="09:00">

                                <div class="dropdown-menu arrow_box from_time_dropdown to_time_dd"
                                     aria-labelledby="to_time_dropdown">

                                    <h3>Abholzeiten</h3>
                                    <div class="timeTable" id="select_to_time">
                                        <?php echo $__env->make('rental::home.timeTable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="searchBox_check noSelect destinationActivate">
                            <div class="checkbox checkbox-success">
                                <input id="checkbox1" class="styled" type="checkbox">
                                <label for="checkbox1">
                                    Andere Rückgabestation wählen
                                </label>
                            </div>
                        </div>
                        <?php echo $__env->make('rental::home.stations', ['type' => 'destination'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="searchBox_action">
                        <button type="submit" class="btn btn-block">Preis ermitteln
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('afterScripts'); ?>
    <script type="text/javascript">
        reservation.from();
        reservation.to();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>