@extends('layouts.default')
@section('content')
    @include('rental::headers.darksubheader')
    @include('rental::headers.infobar')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 sResult">
                Wir haben
                <span class="isBold">
                    <?php
                    switch ($classes->count()):
                        case 0:
                            echo 'leider keine passende Angebote';
                            break;
                        case 1:
                            echo 'ein Angebot';
                            break;
                        default:
                            echo $classes->count() . ' Angebote';
                    endswitch;
                    ?>
                </span>
                für Sie gefunden!
            </div>
        </div>
        @include('rental::search.categories')
    </div>
    <div id="ourHolder" class="container">
        @foreach($classes as $car)
            <div class="row carBox item {{ $car->category->slug }}">
                <div class="col-md-4 pt15">
                    <img class="img-responsive carDetailImg" alt="{{ $car->category->name }}"
                         src=/{{ $car->photo }}>
                </div>
                <div class="col-md-6">
                    <div class="tableHeader">
                        <h3 class="m_center">{{ $car->name }}</h3>
                        <p class="m_center">{{ $car->details }}</p>
                        <div class="carBox_priceExt m_center">
                            <p>
                                Gesamt {{ \App\Helpers\Helper::smartPrice(\App\Helpers\Helper::calculateRentalPrice($days, $car->daily_price)) }}
                                €</p>
                            <p>inkl. 19% MwSt.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 text-right">
                    <div class="carBox_priceInfo pt20">
                        <div class="carSlide_text m_center">Ab</div>
                        <div class="carSlide_price m_center">
                            <span>€</span>
                            {{ \App\Helpers\Helper::smartPrice($car->daily_price) }}
                        </div>
                        <div class="carSlide_text m_center">pro Tag</div>
                        <div class="carBox_action">
                            <a href="{{ route('rental::extras', $car->id) }}">
                                <button class="btn btn-block">Fahrzeug wählen</button>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection