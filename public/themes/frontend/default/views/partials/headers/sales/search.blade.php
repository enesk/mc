<form action="{{ route('cars::search') }}" method="GET">
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
                            <select name="company" class="selectpicker form-control selectCompany"
                                    data-live-search="true"
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
                            <select class="selectpicker form-control saleSelect" data-live-search="true"
                                    title="Modell" name="model">
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
                        <div class="col-md-4 col-xs-12">
                            <div class="resetSelection">
                                <button type="submit" class="btn btn-primary" style="font-size: 16px; height: 40px">Suche starten</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>