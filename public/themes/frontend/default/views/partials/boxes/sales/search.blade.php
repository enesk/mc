<?php
$companies = \Modules\Car\Models\Company::orderBy('name', 'asc')->get();
$fuels = \Modules\Car\Models\Specifics\Specific::where('name', 'fuel')->groupby('key')->get();
$year = date('Y');
?>
<form action="{{ route('cars::search') }}" method="GET">
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
                    @if(session('error'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info" role="alert">
                                    {{ session('error') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 pr5">
                            <select name="company" class="selectpicker form-control selectCompany"
                                    data-live-search="true"
                                    title="Marke">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
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
                                @foreach($fuels as $fuel)
                                    <option value="{{ $fuel->key }}">{{ $fuel->value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 pl5">
                            <select name="year" class="selectpicker form-control saleSelect" data-live-search="true"
                                    title="Baujahr">
                                @for($i = $year; $i >= 1960; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
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
@section('afterScripts')
    <script type="text/javascript">
        $('.selectCompany').on('change', function () {
            var companyID = this.value;
            $('select.selectModel').empty();
            $('.selectModel').selectpicker('refresh');
            $.post("{{ route('api::models') }}", {companyID: companyID})
                    .done(function (data) {
                        $.each(data, function (i, value) {
                            $('select.selectModel').append($('<option>').text(value.name).attr('value', value.id));
                        });
                        $('.selectModel').selectpicker('refresh');
                    });
        })


    </script>
@endsection