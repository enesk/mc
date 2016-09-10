@extends('layouts.default')
@section('content')
    @include('rental::headers.darksubheader')
    @include('rental::headers.infobar')
    @include('rental::headers.changeData')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 sResult">
                Ihre Daten
            </div>
        </div>
    </div>
    <div class="container check_send">
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
                    <div class="col-xs-12">
                        <div class="summGroup">
                            <span>Abholung</span>
                            <span>Millennium Cars GmbH, Baden-Baden</span>
                            <span>26.07.2016, 11:00</span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="summGroup">
                            <span>Rückgabe</span>
                            <span>Millennium Cars GmbH, Baden-Baden</span>
                            <span>26.07.2016, 11:00</span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="summGroup">
                            <span>MietDauer</span>
                            <span>5 Tage</span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="summGroup">
                            <span>Tarife &amp; Extras</span>
                            <span>Frei-KM: 1000 - Preis pro Zusatz-KM: 0.99 €</span>
                            <span>Geplante KM: 1500</span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="summGroup">
                            <span>Gesamtpreis</span>
                            <span class="summGroup_price">€ 1490,00</span>
                            <span>inkl. 19% MwSt.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="row mt15">
                    <div class="col-xs-12">
                        <div class="formBox">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="formBox_header blue">
                                        <img src="/{{ \App\Helpers\Helper::assetsUrl('/img') }}/userDtls_ico.png" alt="">
                                        DATEN DES FAHRERS
                                    </div>
                                </div>
                            </div>
                            <div class="row mt15">
                                <div class="col-md-4 pr0">
                                    <select class="selectpicker form-control">
                                        <option>Anrede</option>
                                        <option>Frau</option>
                                        <option>Herr</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt15">
                                <div class="col-md-4 pr0">
                                    <input type="text" class="form-control formStyle formFaded" placeholder="Vorname" aria-describedby="Vorname">
                                </div>
                                <div class="col-md-4 pr0">
                                    <input type="text" class="form-control formStyle formFaded" placeholder="Nachname" aria-describedby="Nachname">
                                </div>
                            </div>

                            <div class="row mt10">
                                <div class="col-md-8 pr0">
                                    <input type="text" class="form-control formStyle formFaded" placeholder="Srasse" aria-describedby="Srasse">
                                </div>
                            </div>

                            <div class="row mt10">
                                <div class="col-md-2 pr0">
                                    <input type="text" class="form-control formStyle formFaded" placeholder="PLZ" aria-describedby="PLZ">
                                </div>
                                <div class="col-md-6 pr0">
                                    <input type="text" class="form-control formStyle formFaded" placeholder="Ort" aria-describedby="Ort">
                                </div>
                            </div>

                            <div class="row mt10">
                                <div class="col-md-4 pr0">
                                    <input type="email" class="form-control formStyle formFaded" placeholder="E-Mail" aria-describedby="E-Mail">
                                </div>
                                <div class="col-md-4 pr0">
                                    <input type="text" class="form-control formStyle formFaded" placeholder="Telefon" aria-describedby="Telefon">
                                </div>
                            </div>

                            <div class="row mt10">
                                <div class="col-md-8 pr0">
                                    <textarea class="form-control formStyle" rows="4" placeholder="Bemerkung"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt15">
                    <div class="col-xs-12">
                        <div class="formBox hasLightBckg">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="formBox_header smallHdr noSelect">
                                        <div class="checkbox checkbox-success ">
                                            <input id="checkbox2" class="styled" type="checkbox">
                                            <label for="checkbox2">
                                                Ich habe die Allgemeinen Geschäftsbedingungen gelesen und bin einverstanden
                                            </label>
                                        </div>

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
                        <button class="btn">Kostenpflichtig  resevieren</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="notifyUser">
                            Hinweis: Ihre Daten werden bei uns in elektronischer Form gespeichert. Eine Weitergabe an Dritte erfolgt nicht.</div>

                    </div>


                </div>

            </div>

        </div>
    </div>
@endsection