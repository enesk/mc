<?php if($type == 'from'): ?>
    <div class="rentalStation">
        <input type="text" class="form-control formStyle thinner " placeholder="Abholungstation wählen..."
               aria-describedby="Abholungstation wählen" data-toggle="dropdown" id="station_dropdown">
        <input type="hidden" name="from_station" id="from_station"/>
        <div class="dropdown-menu arrow_box station_dropdown" aria-labelledby="station_dropdown"
             id="station_dropdown_open">
            <div class="row">
                <div class="col-md-5 pr0 col-xs-12">
                    <div class="stnDdown_left f_stnDdown_left">
                        <h4>Mietstationen</h4>
                        <ul class="list-unstyled">
                            <?php foreach(\Modules\Rental\Models\Station::all() as $station): ?>
                                <li>
                                    <a href="#" data-station-id="<?php echo e($station->id); ?>">
                                        <span><?php echo e($station->name); ?>, <?php echo e($station->city); ?></span>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 has_l_border hidden-xs">
                    <?php foreach(\Modules\Rental\Models\Station::all() as $station): ?>
                        <div class="<?php echo e('from_stationList'); ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="stnDdown_right_top">
                                        <p>
                                            <?php echo e($station->name); ?>,<br/><?php echo e($station->city); ?>

                                        </p>
                                        <p>
                                            <?php echo e($station->street); ?> <?php echo e($station->houseno); ?><br/>
                                            <?php echo e($station->zipcode); ?> <?php echo e($station->city); ?>

                                        </p>
                                    </div>
                                    <div class="stnDdown_right_contact">
                                        <div>
                                            <span>Telefon:</span>
                                            <span><?php echo e($station->tel); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 has_l_border">
                                    <div class="stnDdown_right_top">
                                        <p>
                                            Öffnungszeiten
                                        </p>
                                        <ul class="list-unstyled list_hours">
                                            <?php foreach(json_decode($station->openings)->openings as $key => $opening): ?>
                                                <li>
                                                    <span><?php echo e(ucfirst($key)); ?>.</span>
                                                    <span><?php echo e($opening); ?></span>
                                                    <span> - </span>
                                                    <span><?php echo e(json_decode($station->openings)->closings->$key); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="rentalStation" id="destination">
        <input type="text" class="form-control formStyle thinner" placeholder="Rückgabestation wählen..."
               aria-describedby="Rückgabestation wählen" data-toggle="dropdown" id="station_dropdown_destination">
        <input type="hidden" name="to_station" id="to_station" />
        <div class="dropdown-menu arrow_box station_dropdown arrival_dropdown" aria-labelledby="station_dropdown"
             id="arrival_dropdown">
            <div class="row">
                <div class="col-md-5 pr0 col-xs-12">
                    <div class="stnDdown_left">
                        <h4>Mietstationen</h4>
                        <ul class="list-unstyled">
                            <?php foreach(\Modules\Rental\Models\Station::all() as $station): ?>
                                <li>
                                    <a data-station-id="<?php echo e($station->id); ?>" href="#" data-station-id="<?php echo e($station->id); ?>">
                                        <span><?php echo e($station->name); ?>, <?php echo e($station->city); ?></span>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>

                <div class="col-md-7 has_l_border hidden-xs">
                    <?php foreach(\Modules\Rental\Models\Station::all() as $station): ?>
                        <div class="to_stationList">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="stnDdown_right_top">
                                        <p>
                                            <?php echo e($station->name); ?>,<br/><?php echo e($station->city); ?>

                                        </p>
                                        <p>
                                            <?php echo e($station->street); ?> <?php echo e($station->houseno); ?><br/>
                                            <?php echo e($station->zipcode); ?> <?php echo e($station->city); ?>

                                        </p>
                                    </div>
                                    <div class="stnDdown_right_contact">
                                        <div>
                                            <span>Telefon:</span>
                                            <span><?php echo e($station->tel); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 has_l_border">
                                    <div class="stnDdown_right_top">
                                        <p>
                                            Öffnungszeiten
                                        </p>
                                        <ul class="list-unstyled list_hours">
                                            <?php foreach(json_decode($station->openings)->openings as $key => $opening): ?>
                                                <li>
                                                    <span><?php echo e(ucfirst($key)); ?>.</span>
                                                    <span><?php echo e($opening); ?></span>
                                                    <span> - </span>
                                                    <span><?php echo e(json_decode($station->openings)->closings->$key); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>