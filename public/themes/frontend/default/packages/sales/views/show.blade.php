@extends('layouts.default')
@section('content')
    @include('partials.headers.sales.subheader')
    @include('partials.headers.sales.backHeader')
    <div class="container mb40">
        <div class="row">
            <div class="col-xs-12 ">
                <h1 class="carDtl_Title">
                    {{ $car->company->name.' '.$car->title }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 carDetl_left">
                <div class="row">
                    <div class="col-xs-12 carDetl_slider">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs">
                                <div class="carDetl_slider-nav">
                                    @foreach($car->photos as $photo)
                                        <div><img src="{{$photo->path}}" alt=""></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-10 col-xs-12 ps_l">
                                <div class="carDetl_slider-for">
                                    @foreach($car->photos as $photo)
                                        <div><img src="{{$photo->path}}" alt=""></div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 carDetl_innerTitle">
                        <h2>Ausstattung</h2>
                    </div>
                </div>

                <div class="row carDtl_equipment pt20">
                    <div class="col-sm-6">
                        <p>Ausstatung</p>
                    </div>
                    <div class="col-sm-6">
                        @foreach($car->features as $specific)
                            <p>{{ $specific->name }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 carDetl_dscrpt">
                        <p>
                            {{ $car->description }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 carDetl_note">
                        <p>* Weitere Informationen zum offiziellen Kraftstoffverbrauch und zu den offiziellen
                            spezifischen CO2-Emissionen und gegebenenfalls zum Stromverbrauch neuer Pkw können dem
                            'Leitfaden über den offiziellen Kraftstoffverbrauch, die offiziellen
                            spezifischen CO2-Emissionen und den offiziellen Stromverbrauch neuer Pkw' entnommen werden,
                            der an allen Verkaufsstellen und bei der 'Deutschen Automobil Treuhand GmbH' unentgeltlich
                            erhältlich ist unter www.dat.de.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-4 text-right">
                <div class="carDetl_right">
                    <div class="carSlide_price m_center">
                        <span>€</span>
                        {{ \App\Helpers\Helper::smartPrice($car->price) }}
                    </div>
                    @if($car->vatable)
                        <div class="carSlide_text m_center">
                            <p>inkl. 19% MwSt.</p>
                            <p>€ {{ \App\Helpers\Helper::smartPrice(\App\Helpers\Helper::noneTax($car->price)) }}
                                Netto</p>
                        </div>
                    @endif
                    <div class="carBox_specs m_center">
                        @if(isset($car->specifics()->where('name', 'door-count ')->get()->first()->value))
                            <span>
                                <img src="/{{ \App\Helpers\Helper::assetsUrl('/img/doorsCount.png') }}"
                                     alt="doors_count">
                                {{ $car->specifics()->where('name', 'door-count ')->get()->first()->value }}
                            </span>
                    @endif
                    <!--
                        <span>
                                <img src="/{{ \App\Helpers\Helper::assetsUrl('/img/personCount.png') }}"
                                     alt="people_count">
                            </span>
                       !-->
                    </div>
                    <div class="carDetl_actions">
                        <div class="row">
                            <div class="col-xs-12 text-right m_center">
                                <p></p>
                            </div>
                            <div class="col-xs-12 text-right m_center">
                                <iframe id="price-calculator" width="300" height="250"
                                        src="http://cdn.bdrops.net/scb/300x250/index.html?partnerCode=06175826&requestid=smallkalkulator&cost={{ str_replace('.', '', \App\Helpers\Helper::smartPrice($car->price)) }}"
                                        border="0" frameborder="0"></iframe>
                                <a id="calculate" href="#!">
                                    <button class="btn btn-positive" name="Fahrzeug wählen">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>Finanzierung Prüfen
                                    </button>
                                </a>
                            </div>
                            <div class="col-xs-12 text-right m_center">
                                <button class="btn btn-gray" data-toggle="modal" data-target="#email-modal">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>E-Mail
                                </button>
                            </div>
                            <!--
                            <div class="col-xs-12 text-right m_center">
                                <button class="btn btn-blue" name="Fahrzeug wählen">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>Farhzeug Resevieren
                                </button>
                            </div>


                            <div class="col-xs-12 text-right m_center">
                                <button class="btn btn-gray" name="Fahrzeug wählen">
                                    <i class="fa fa-print" aria-hidden="true"></i>Drucken
                                </button>
                            </div>

                            <div class="col-xs-12 text-right m_center">

                                <button class="btn btn-gray" name="Fahrzeug wählen">
                                    <i class="fa fa-share" aria-hidden="true"></i>Empfehlen
                                </button>
                            </div>
!-->
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('partials.modals.email')
@endsection