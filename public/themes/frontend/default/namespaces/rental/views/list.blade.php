@extends('layouts.default')
@section('content')
    @include('partials.headers.sales.subheader')
    @include('partials.headers.sales.search')
    <div class="container mb40">
        <div class="row">
            <div class="col-xs-12 sResult pL_sale">
                Wir haben
                <span class="isBold">{{ $cars->count() }} @if($cars->count() > 1) Angebote @else Angebot @endif</span>
                gefunden
            </div>
        </div>
        @foreach($cars as $car)
            <div class="row carBox pL_sale">
                <div class="col-md-4 pl0">
                    <img src="/imager{{ $car->photos()->first()->path }}" alt="Luxusklasse"
                         class="img-responsive carDetailImg">
                </div>
                <div class="col-md-6">
                    <div class="tableHeader">
                        <h3 class="m_center">{{ $car->title }}</h3>
                        <p class="m_center">Limousine Gebrauchtfahrzeug</p>
                    </div>
                    <div class="carDetails">
                        <div>
                            <?php $data = new \Carbon\Carbon($car->first_registration) ?>
                            <p>EZ {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data)->format('m.Y') }}</p>
                            <p>{{ $car->mileage }} km</p>
                            @if($car->power != 0)
                                <p>{{ $car->power }} kW ({{ \App\Helpers\Helper::kwToPS($car->power) }} PS)</p>
                            @endif
                        </div>
                        <div>
                            <p>{{  $car->specifics()->where('name', 'fuel')->get()->first()->value }}</p>
                            <p>{{ $car->specifics()->where('name', 'gearbox')->get()->first()->value }}</p>
                        </div>
                        <div>
                            <p>Kraftstoffverbr. komb.: ca. 4,8 l/100 km - CO 2 -Emissionen komb.: ca. 191 g/km</p></div>
                    </div>
                </div>
                <div class="col-md-2 pr0 text-right">
                    <div class="carBox_priceInfo">
                        <div class="carSlide_price m_center">
                            <span>€</span>
                            {{ \App\Helpers\Helper::smartPrice($car->price) }}
                        </div>
                        @if($car->vatable)
                            <div class="carSlide_text m_center">
                                <p>inkl. 19% MwSt.</p>
                                <?php $noTax = $car->price / 1.19; ?>
                                <p>€ {{ \App\Helpers\Helper::smartPrice($noTax) }} Netto</p>
                            </div>
                        @endif
                        <div class="carBox_specs">
                            <span>
                                <img src="{{ \App\Helpers\Helper::assetsUrl('/img/doorsCount.png') }}"
                                     alt="doors_count">
                                5</span>
                            <span>
                                <img src="{{ \App\Helpers\Helper::assetsUrl('/img/personCount.png') }}"
                                     alt="people_count">
                                4</span>
                        </div>
                        <div class="carBox_action">
                            <button class="btn btn-block" name="Fahrzeug wählen">Fahrzeug wählen</button>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection