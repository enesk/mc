@extends('layouts.default')
@section('content')
    @include('partials.headers.sales.subheader')
    @include('partials.headers.sales.backHeader')
    <div class="container mb40">
        <div class="row">
            <div class="col-xs-12 ">
                <h1 class="carDtl_Title">
                    {{ $car->title }}
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
                                        <div><img src="/imager{{$photo->path}}" alt=""></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-10 col-xs-12 ps_l">
                                <div class="carDetl_slider-for">
                                    @foreach($car->photos as $photo)
                                        <div><img src="/imager{{$photo->path}}" alt=""></div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 carDetl_innerTitle">
                        <h2>Weitere technische Daten</h2>
                    </div>
                </div>
                <div class="row carDetl_specs">
                    <div class="col-sm-6 ">
                        <p>Anzahl der Türen</p>
                        <p>Schadstoffklasse</p>
                        <p>Umweltplakette</p>
                        <p>Farbe</p>
                        <p>Herstellerfarbbezeichnung</p>
                        <p>Kraftstoffverbr. komb.</p>
                        <p>Kraftstoffverbr. innerorts</p>
                        <p>Kraftstoffverbr. außerorts</p>
                        <p>CO²-Emissionen komb.</p>
                        <p>Zugr.-lgd. Treibstoffart</p>
                    </div>
                    <div class="col-sm-6 ">
                        <p>4/5</p>
                        <p>Euro5</p>
                        <p>4 (Grün)</p>
                        <p>Schwarz (Metallic)</p>
                        <p>saphirschwarz met.</p>
                        <p>
                            <button
                                    type="button"
                                    class="btn ico-btn"
                                    data-toggle="tooltip"
                                    data-placement="right"
                                    title="Bei den angegebenen Daten handelt es sich um Circa-Angaben des Angebot-Erstellers. Die Werte können Erfahrungen zu diesem Modell darstellen oder aus anderen Quellen stammen.">
                                ca. 4,4 l/100 km<i class="fa fa-info-circle" aria-hidden="true"></i>
                            </button>
                        </p>
                        <p>ca. 7,6 l/100 km</p>
                        <p>ca. 5,6 l/100 km</p>
                        <p>ca. 118 g/km</p>
                        <p>
                            <button
                                    type="button"
                                    class="btn ico-btn"
                                    data-toggle="tooltip"
                                    data-placement="right"
                                    title="Bei den angegebenen Daten handelt es sich um Circa-Angaben des Angebot-Erstellers. Die Werte können Erfahrungen zu diesem Modell darstellen oder aus anderen Quellen stammen.">
                                Diesel<i class="fa fa-info-circle" aria-hidden="true"></i>
                            </button>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 carDetl_innerTitle">
                        <h2>Ausstattung</h2>
                    </div>
                </div>

                <div class="row carDtl_equipment pt20">
                    <div class="col-sm-6">
                        <p>Innenausstattung</p>
                    </div>
                    <div class="col-sm-6">
                        <p>Klimatisierung (Klimaanlage)</p>
                        <p>Navigationssystem</p>
                        <p>Sitzheizung</p>
                        <p>Zentralverriegelung</p>
                    </div>
                </div>
                <div class="row carDtl_equipment">
                    <div class="col-sm-6">
                        <p>Außenausstattung</p>
                    </div>
                    <div class="col-sm-6">
                        <p>Leichtmetallfelgen</p>
                    </div>
                </div>
                <div class="row carDtl_equipment">
                    <div class="col-sm-6">
                        <p>Sicherheit & Umwelt</p>
                    </div>
                    <div class="col-sm-6">
                        <p>Xenonscheinwerfer</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 carDetl_innerTitle">
                        <h2>Fahrzeugbeschreibung</h2>
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
                            <span>
                                <img src="/{{ \App\Helpers\Helper::assetsUrl('/img/doorsCount.png') }}"
                                     alt="doors_count">
                                5</span>

                            <span>
                                <img src="/{{ \App\Helpers\Helper::assetsUrl('/img/personCount.png') }}"
                                     alt="people_count">
                                4</span>

                    </div>
                    <div class="carDetl_actions">
                        <div class="row">
                            <div class="col-xs-12 text-right m_center">
                                <p>Fahrzeugnummer (für Anfragen): M114210</p>
                            </div>
                            <div class="col-xs-12 text-right m_center">
                                <button class="btn btn-positive" name="Fahrzeug wählen">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>Finanzierung Prüfen
                                </button>
                            </div>

                            <div class="col-xs-12 text-right m_center">
                                <button class="btn btn-blue" name="Fahrzeug wählen">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>Farhzeug Resevieren
                                </button>
                            </div>

                            <div class="col-xs-12 text-right m_center">
                                <button class="btn btn-gray" name="Fahrzeug wählen">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>E-Mail
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

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection