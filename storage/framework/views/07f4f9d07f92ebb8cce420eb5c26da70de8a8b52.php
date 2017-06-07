<div class="container-fluid selectCarFilter">
    <div class="container">
        <div class="row">
            <div class="col-md-4 carFilterBox">
                <div class="row p15">
                    <div class="col-md-6 ps_r">
                        <div class="cartType">
                            Suche
                        </div>
                    </div>
                    <div class="col-md-6 ps_l">
                        <select name="company" class="selectpicker form-control selectCompany" data-live-search="true"
                                title="Marke">
                            <?php foreach($companies as $company): ?>
                                <option <?php if($company->id == $companyID): ?> selected="selected"
                                        <?php endif; ?> value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 carFilterBox">
                <div class="row p15">
                    <div class="col-md-6 ps_r">
                        <select class="selectpicker form-control saleSelect" data-live-search="true" title="Modelle">
                            <?php foreach($models as $model): ?>
                                <option <?php if($modelID AND $model->id == $modelID): ?> selected="selected"
                                        <?php endif; ?> value="<?php echo e($model->id); ?>"><?php echo e($model->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 ps_l">
                        <select name="fuel" class="selectpicker form-control saleSelect" data-live-search="true"
                                title="Kraftstoff">
                            <?php foreach($fuels as $fuel): ?>
                                <option <?php if($fuelID AND $fuel->key == $fuelID): ?> selected="selected"
                                        <?php endif; ?> value="<?php echo e($fuel->key); ?>"><?php echo e($fuel->value); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 carFilterBox">
                <div class="row p15">
                    <div class="col-md-4 col-xs-6 ps_r">
                        <select name="year" class="selectpicker form-control saleSelect" data-live-search="true"
                                title="Baujahr">
                            <?php for($i = $year; $i >= 1960; $i--): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>


                    </div>
                    <div class="col-md-4 col-xs-6 ps_l">
                        <select class="selectpicker form-control saleSelect" data-size="5">
                            <option>30.000 €</option>
                            <option>35.000 €</option>
                            <option>40.000 €</option>
                            <option>45.000 €</option>
                            <option>50.000 €</option>
                            <option>55.000 €</option>
                        </select></div>
                    <div class="col-md-4 col-xs-12">
                        <div class="resetSelection">
                            <a href="#">
                                <i class="fa fa-undo" aria-hidden="true"></i>
                                Suche Zurücksetzen


                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>