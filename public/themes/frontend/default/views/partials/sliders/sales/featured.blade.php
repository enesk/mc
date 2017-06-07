<?php
$cars = \Modules\Car\Models\Car::newCars();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 text-center">
            <h1>Frisch eingetroffen!</h1>
        </div>
    </div>
    <div class="row">
        <div class="carSlider saleSlider">
            @foreach($cars as $car)
                <div>
                    @if(isset($car->photos()->first()->path))
                        <a href="{{ route('cars::show', $car->id) }}"></a>
                    @else
                        <a href="{{ route('cars::show', $car->id) }}"><img src="/imager{{ $car->photos()->first()->path }}"></a>
                    @endif
                    <h2 class="carSlide_name">
                        @if(strlen($car->company->name.' '.$car->title) > 30)
                            {{ substr($car->company->name.' '.$car->title, 0, 30) }}...
                        @else
                            {{ $car->company->name.' '.$car->title }}
                        @endif

                    </h2>
                    <div class="carSlide_price">
                        <span>€</span>
                        {{ \App\Helpers\Helper::smartPrice($car->price) }}
                    </div>
                    @if($car->vatable == 1)
                        <div class="carSlide_text mb40">inkl. 19% MwSt.</div>
                    @endif
                    <div class="carSlide_action">
                        <a href="{{ route('cars::show', $car->id) }}">
                            <button type="button" class="btn btn-negative" aria-label="Jetzt Prüfen">
                                Details Ansehen
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>