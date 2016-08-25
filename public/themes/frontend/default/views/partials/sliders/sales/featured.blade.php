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
                    <img src="/imager{{ $car->photos()->first()->path }}">
                    <h2 class="carSlide_name">
                        @if(strlen($car->title) > 30)
                            {{ substr($car->title, 0, 30) }}...
                        @else
                            {{ $car->title }}
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
                        <button type="button" class="btn btn-negative" aria-label="Jetzt Prüfen">
                            Details Ansehen
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>