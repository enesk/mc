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
                        <img class="img-responsive carDetailImg" alt="Luxusklasse" src="/{{ $car->photo }}">
                    </div>
                    <div class="col-xs-12">
                        <div class="tableHeader">
                            <h3 class="isHighlighted">{{ $car->name }}</h3>
                            <p>{{ $car->details }}</p>
                        </div>
                        <div class="carBox_specs specHalf">
                            @foreach(json_decode($car->specifics) as $specific)
                                <span>
                                <?php $spec = \Modules\Rental\Models\Specific::find($specific); ?>
                                    @if($spec->key == 'doors')
                                        <img alt="doors_count"
                                             src="/{{ \App\Helpers\Helper::assetsUrl('/img/') }}doorsCount.png">
                                        {{ substr($spec->name, 0, 1) }}
                                    @elseif($spec-> key == 'person')
                                        <img alt="people_count"
                                             src="/{{ \App\Helpers\Helper::assetsUrl('/img/') }}personCount.png">
                                        {{ substr($spec->name, 0, 1) }}
                                    @elseif($spec->key == 'transmission')
                                        @if($spec->name == 'Automatikgetriebe')
                                            <img alt="Automatikgetriebe"
                                                 src="/{{ \App\Helpers\Helper::assetsUrl('/img/') }}gear-automatic.png">
                                            A
                                        @else
                                            <img alt="Schaltgetriebe"
                                                 src="/{{ \App\Helpers\Helper::assetsUrl('/img/') }}gear-manual.png">
                                            M
                                        @endif
                                    @endif
                                </span>
                            @endforeach
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
                                        <h3>{{ session('reservation.days') }}@if(session('reservation.days') > 1)
                                                Tage @else Tag @endif</h3>
                                        <p>
                                            Inkl. {{ $car->km_inclusive*session('reservation.days') }} Freikilometer.
                                            ({{ $car->km_inclusive }}km/Tag; € {{$car->extra_km_price }}
                                            /Zusatzkilometer)
                                        </p>

                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <div class="carSlide_text">Preis</div>
                                        <div class="carSlide_price">
                                            <span>€</span>
                                            {{ \App\Helpers\Helper::smartPrice(\App\Helpers\Helper::calculateRentalPrice(session('reservation.days'), $car->daily_price)) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('rental::check') }}">
                    {{ csrf_field() }}
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
                            <span class="totalPrice_price">{{ \App\Helpers\Helper::smartPrice(session('reservation.totalPrice')) }}</span>
                        </div>
                        <div class="col-xs-12 text-right totalPrice_vat">
                            inkl. 19% MwSt
                        </div>
                        <div class="col-xs-12 text-right totalPrice_action">
                            <a href="{{ route('rental::check') }}">
                                <button class="btn" type="submit">Tarif &amp; Extras Übernehmen</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection