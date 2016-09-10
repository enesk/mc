@extends('layouts.default')
@section('content')
    @include('rental::headers.darksubheader')
    @include('rental::headers.infobar')
    @include('rental::headers.changeData')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 sResult">
                Wir haben
                <span class="isBold">20 Angebote</span>
                gefunden
            </div>
        </div>
        @include('rental::search.categories')
    </div>
    <div id="ourHolder" class="container">

        <div class="row carBox item kasten">
            <div class="col-md-4 pt15">
                <img class="img-responsive carDetailImg" alt="Luxusklasse" src="{{ \App\Helpers\Helper::uploadsURL('/sales') }}/slides/car_2.jpg">
            </div>
            <div class="col-md-6">
                <div class="tableHeader">
                    <h3 class="m_center">Luxusklasse</h3>
                    <p class="m_center">Gruppe 12 z.B. Panamera, S-Klasse, Jaguar XJ</p>

                    <div class="carBox_priceExt m_center">
                        <p>Gesamt 1194,00 €</p>
                        <p>inkl. 19% MwSt.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-right">
                <div class="carBox_priceInfo pt20">
                    <div class="carSlide_text m_center">Ab</div>
                    <div class="carSlide_price m_center">
                        <span>€</span>
                        199</div>
                    <div class="carSlide_text m_center">pro Tag</div>
                    <div class="carBox_action">
                        <a href="{{ route('rental::extras') }}"><button class="btn btn-block">Fahrzeug wählen</button></a>
                    </div>

                </div>

            </div>
        </div>

        <div class="row carBox item sportwagen">
            <div class="col-md-4 pt15">
                <img class="img-responsive carDetailImg" alt="Luxusklasse" src="{{ \App\Helpers\Helper::uploadsURL('/sales') }}/slides/car_3.jpg">
            </div>
            <div class="col-md-6">
                <div class="tableHeader">
                    <h3 class="m_center">Kompakt Sport</h3>
                    <p class="m_center">Gruppe 12 z.B. Panamera, S-Klasse, Jaguar XJ</p>
                    <div class="carBox_priceExt m_center">
                        <p>Gesamt 1194,00 €</p>
                        <p>inkl. 19% MwSt.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-2 text-right">
                <div class="carBox_priceInfo pt20">
                    <div class="carSlide_text m_center">Ab</div>
                    <div class="carSlide_price m_center">
                        <span>€</span>
                        39</div>
                    <div class="carSlide_text m_center">pro Tag</div>
                    <div class="carBox_action">
                        <a href="{{ route('rental::extras') }}"><button class="btn btn-block">Fahrzeug wählen</button></a>

                    </div>

                </div>

            </div>
        </div>

        <div class="row carBox item limousine">
            <div class="col-md-4 pt15">
                <img class="img-responsive carDetailImg" alt="Luxusklasse" src="{{ \App\Helpers\Helper::uploadsURL('/sales') }}/slides/car_1.jpg">
            </div>
            <div class="col-md-6">
                <div class="tableHeader">
                    <h3 class="m_center">Kompakt Sport</h3>
                    <p class="m_center">Gruppe 12 z.B. Panamera, S-Klasse, Jaguar XJ</p>
                    <div class="carBox_priceExt m_center">
                        <p>Gesamt 1194,00 €</p>
                        <p>inkl. 19% MwSt.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-2 text-right">
                <div class="carBox_priceInfo pt20">
                    <div class="carSlide_text m_center">Ab</div>
                    <div class="carSlide_price m_center">
                        <span>€</span>
                        39</div>
                    <div class="carSlide_text m_center">pro Tag</div>
                    <div class="carBox_action">
                        <a href="{{ route('rental::extras') }}"><button class="btn btn-block">Fahrzeug wählen</button></a>

                    </div>

                </div>

            </div>
        </div>

        <div class="row carBox item coupe">
            <div class="col-md-4 pt15">
                <img class="img-responsive carDetailImg" alt="Luxusklasse" src="{{ \App\Helpers\Helper::uploadsURL('/sales') }}/slides/car_2.jpg">
            </div>
            <div class="col-md-6">
                <div class="tableHeader">
                    <h3 class="m_center">Kompakt Sport</h3>
                    <p class="m_center">Gruppe 12 z.B. Panamera, S-Klasse, Jaguar XJ</p>
                    <div class="carBox_priceExt m_center">
                        <p>Gesamt 1194,00 €</p>
                        <p>inkl. 19% MwSt.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-2 text-right">
                <div class="carBox_priceInfo pt20">
                    <div class="carSlide_text m_center">Ab</div>
                    <div class="carSlide_price m_center">
                        <span>€</span>
                        39</div>
                    <div class="carSlide_text m_center">pro Tag</div>
                    <div class="carBox_action">
                        <a href="{{ route('rental::extras') }}"><button class="btn btn-block">Fahrzeug wählen</button></a>

                    </div>

                </div>

            </div>
        </div>

        <div class="row carBox item van">
            <div class="col-md-4 pt15">
                <img class="img-responsive carDetailImg" alt="Luxusklasse" src="{{ \App\Helpers\Helper::uploadsURL('/sales') }}/slides/car_3.jpg">
            </div>
            <div class="col-md-6">
                <div class="tableHeader">
                    <h3 class="m_center">Kompakt Sport</h3>
                    <p class="m_center">Gruppe 12 z.B. Panamera, S-Klasse, Jaguar XJ</p>
                    <div class="carBox_priceExt m_center">
                        <p>Gesamt 1194,00 €</p>
                        <p>inkl. 19% MwSt.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-right">
                <div class="carBox_priceInfo pt20">
                    <div class="carSlide_text m_center">Ab</div>
                    <div class="carSlide_price m_center">
                        <span>€</span>
                        39</div>
                    <div class="carSlide_text m_center">pro Tag</div>

                    <div class="carBox_action">
                        <a href="{{ route('rental::extras') }}"><button class="btn btn-block">Fahrzeug wählen</button></a>

                    </div>

                </div>

            </div>
        </div>

        <div class="row carBox item gelandewagen">
            <div class="col-md-4 pt15">
                <img class="img-responsive carDetailImg" alt="Luxusklasse" src="{{ \App\Helpers\Helper::uploadsURL('/sales') }}/slides/car_1.jpg">
            </div>
            <div class="col-md-6">
                <div class="tableHeader">
                    <h3 class="m_center">Kompakt Sport</h3>
                    <p class="m_center">Gruppe 12 z.B. Panamera, S-Klasse, Jaguar XJ</p>
                    <div class="carBox_priceExt m_center">
                        <p>Gesamt 1194,00 €</p>
                        <p>inkl. 19% MwSt.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-right">
                <div class="carBox_priceInfo pt20">
                    <div class="carSlide_text m_center">Ab</div>
                    <div class="carSlide_price m_center">
                        <span>€</span>
                        39</div>
                    <div class="carSlide_text m_center">pro Tag</div>
                    <div class="carBox_action">
                        <a href="{{ route('rental::extras') }}"><button class="btn btn-block">Fahrzeug wählen</button></a>
                    </div>

                </div>

            </div>
        </div>


    </div>
@endsection