<?php
$companies = \Modules\Car\Models\Company::all();
$fuels = \Modules\Car\Models\Specifics\Specific::where('name', 'fuel')->groupby('key')->get();
$year = date('Y');
?>
<form action="<?php echo e(route('cars::search')); ?>" method="GET">
    <div class="container searchBoxWrapper">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="searchBox saleBox">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2>PKW-Verkauf</h2>
                            <h3>Suchoptionen</h3>
                        </div>
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
                    <div class="row">
                        <div class="col-md-6 pr5">
                            <select name="company" class="selectpicker form-control selectCompany"
                                    data-live-search="true"
                                    title="Marke">
                                <?php foreach($companies as $company): ?>
                                    <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 pl5">
                            <select name="model" class="selectpicker form-control selectModel" data-live-search="true"
                                    title="Model">
                            </select>
                        </div>
                    </div>

                    <div class="row mt15">
                        <div class="col-md-6 pr5">
                            <select name="fuel" class="selectpicker form-control saleSelect" data-live-search="true"
                                    title="Kraftstoff">
                                <?php foreach($fuels as $fuel): ?>
                                    <option value="<?php echo e($fuel->key); ?>"><?php echo e($fuel->value); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6 pl5">
                            <select name="year" class="selectpicker form-control saleSelect" data-live-search="true"
                                    title="Baujahr">
                                <?php for($i = $year; $i >= 1960; $i--): ?>
                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="priceRange">
                                <input type="text" id="priceRange" name="priceRange" value=""/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="searchBox_action saleBox">
                    <button type="submit" class="btn btn-block">Suche starten
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->startSection('afterScripts'); ?>
    <script type="text/javascript">
        $('.selectCompany').on('change', function () {
            var companyID = this.value;
            $('select.selectModel').empty();
            $('.selectModel').selectpicker('refresh');
            $.post("<?php echo e(route('api::models')); ?>", {companyID: companyID})
                    .done(function (data) {
                        $.each(data, function (i, value) {
                            $('select.selectModel').append($('<option>').text(value.name).attr('value', value.id));
                        });
                        $('.selectModel').selectpicker('refresh');
                    });
        })


    </script>
<?php $__env->stopSection(); ?>