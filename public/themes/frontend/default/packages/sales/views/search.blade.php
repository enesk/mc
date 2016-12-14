@extends('layouts.default')
@section('content')
    @include('partials.headers.sales.subheader')
    @include('partials.headers.sales.search',
    ['companyID' => Request::get('company'),
    'modelID' => Request::get('model'),
    'fuelID' => Request::get('fuel')
    ])
    <div class="container mb40">
        <div class="row">
            <div class="col-xs-12 sResult pL_sale">
                Wir haben
                <span class="isBold">
                    <?php
                    switch ($cars->count()):
                        case 0:
                            echo 'keine Angebote';
                            break;
                        case 1:
                            echo 'ein Angebot';
                            break;
                        default:
                            echo $cars->count() . ' Angebote';
                    endswitch;
                    ?>
                </span>
                gefunden
            </div>
        </div>
        @foreach($cars as $car)
            <div class="row carBox pL_sale">
                <div class="col-md-4 pl0">
                    @if(isset($car->photos()->first()->path))
                    <a href="{{ route('cars::show', $car->id) }}">
                        <img src="/imager{{ $car->photos()->first()->path }}" alt="Luxusklasse"
                             class="img-responsive carDetailImg">
                    </a>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="tableHeader">
                        <a href="{{ route('cars::show', $car->id) }}"><h3 class="m_center">{{ $car->title }}</h3></a>
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
                                <p>€ {{ \App\Helpers\Helper::smartPrice(\App\Helpers\Helper::noneTax($car->price)) }}
                                    Netto</p>
                            </div>
                        @endif
                        <div class="carBox_specs">
                            @if(isset($car->specifics()->where('name', 'door-count ')->get()->first()->value))
                            <span>
                                <img src="/{{ \App\Helpers\Helper::assetsUrl('/img/doorsCount.png') }}"
                                     alt="doors_count">
                                {{ $car->specifics()->where('name', 'door-count ')->get()->first()->value }}
                            </span>
                            @endif
                        </div>
                        <div class="carBox_action">
                            <a href="{{ route('cars::show', $car->id) }}">
                                <button class="btn btn-block" name="Fahrzeug wählen">Fahrzeug wählen</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
