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
                            @foreach($companies as $company)
                                <option @if($company->id == $companyID) selected="selected"
                                        @endif value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 carFilterBox">
                <div class="row p15">
                    <div class="col-md-6 ps_r">
                        <select class="selectpicker form-control saleSelect" data-live-search="true" title="Modelle">
                            @foreach($models as $model)
                                <option @if($modelID AND $model->id == $modelID) selected="selected"
                                        @endif value="{{ $model->id }}">{{ $model->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 ps_l">
                        <select name="fuel" class="selectpicker form-control saleSelect" data-live-search="true"
                                title="Kraftstoff">
                            @foreach($fuels as $fuel)
                                <option @if($fuelID AND $fuel->key == $fuelID) selected="selected"
                                        @endif value="{{ $fuel->key }}">{{ $fuel->value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 carFilterBox">
                <div class="row p15">
                    <div class="col-md-4 col-xs-6 ps_r">
                        <select name="year" class="selectpicker form-control saleSelect" data-live-search="true"
                                title="Baujahr">
                            @for($i = $year; $i >= 1960; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
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