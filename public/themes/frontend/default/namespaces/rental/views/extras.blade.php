@extends('layouts.default')
@section('content')
    @include('rental::headers.darksubheader')
    @include('rental::headers.infobar')
    @include('rental::headers.changeData')
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
                        <img class="img-responsive carDetailImg" alt="Luxusklasse" src="{{ \App\Helpers\Helper::uploadsURL('/sales') }}/slides/car_3.jpg">
                    </div>
                    <div class="col-xs-12">
                        <div class="tableHeader">
                            <h3 class="isHighlighted">Luxusklasse</h3>
                            <p>Gruppe 12 z.B. Panamera, S-Klasse, Jaguar XJ</p>
                        </div>
                        <div class="carBox_specs specHalf">
                            <span>
                                <img alt="doors_count" src="/{{ \App\Helpers\Helper::assetsUrl('/img/') }}doorsCount.png">
                                5</span>
                            <span>
                                <img alt="people_count" src="/{{ \App\Helpers\Helper::assetsUrl('/img/') }}personCount.png">
                                4</span>
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
                                        <h3>5 Tage</h3>
                                        <p>Tagestarif inkl. 200km bei Abholung bezahlen
                                        </p>

                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <div class="carSlide_text">Preis</div>
                                        <div class="carSlide_price">
                                            <span>€</span>
                                            39</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="carInfoTable">
                            <div class="carInfoTable_header">
                                Extras
                            </div>
                            <div class="carInfoTable_body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-xs-12">

                                                <p>Frei-KM: 1000 - Preis pro Zusatz-KM: 0.99 €</p>
                                            </div>
                                            <div class="col-xs-12 plannedTrip">
                                                <span class="isBold">Geplante KM</span>
                                                <span><input type="text" aria-describedby="km_input" placeholder="" class="form-control formStyle formFaded"></span>
                                                <span>
                                                    <button aria-label="Aktualisieren" class="btn btn-negative" type="button">
                                                        Aktualisieren
                                                    </button>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4 text-right m_extLastLine">
                                        <div class="carSlide_text">Zusätzlich</div>
                                        <div class="carSlide_price">
                                            <span>€</span>
                                            495,00</div>
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
                        <span class="totalPrice_price">1490,00</span>
                    </div>
                    <div class="col-xs-12 text-right totalPrice_vat">
                        inkl. 19% MwSt
                    </div>
                    <div class="col-xs-12 text-right totalPrice_action">
                        <a href="{{ route('rental::check') }}"><button class="btn">Tarif &amp; Extras Übernehmen</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection