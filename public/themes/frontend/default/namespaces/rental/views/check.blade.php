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
    <form action="{{ route('rental::thanks') }}" method="post">
        {{ csrf_field() }}
        <div class="container check_send">
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
                        <div class="col-xs-12">
                            <div class="summGroup">
                                <span>Abholung</span>
                            <span>{{ \Modules\Rental\Models\Station::find(session('reservation.from_station'))->name }}
                                , {{ \Modules\Rental\Models\Station::find(session('reservation.from_station'))->city }}</span>
                                <span>{{ session('reservation.from_date') }} {{ session('reservation.from_time') }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="summGroup">
                                <span>Rückgabe</span>
                            <span>{{ \Modules\Rental\Models\Station::find(session('reservation.to_station'))->name }}
                                , {{ \Modules\Rental\Models\Station::find(session('reservation.to_station'))->city }}</span>
                                <span>{{ session('reservation.to_date') }} {{ session('reservation.to_time') }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="summGroup">
                                <span>MietDauer</span>
                            <span>{{ session('reservation.days') }} @if(session('reservation.days') > 1)Tage @else
                                    Tag @endif</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="summGroup">
                                <span>Tarife &amp; Extras</span>
                            <span>Frei-KM: {{ session('reservation.freeKM') }}
                                - Preis pro Zusatz-KM: {{ $car->extra_km_price }} €</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="summGroup">
                                <span>Gesamtpreis</span>
                                <span class="summGroup_price">€ {{ \App\Helpers\Helper::smartPrice(session('reservation.totalPrice')) }}</span>
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
                                            <img src="/{{ \App\Helpers\Helper::assetsUrl('/img') }}/userDtls_ico.png"
                                                 alt="">
                                            DATEN DES FAHRERS
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt15">
                                    <div class="col-md-4 pr0">
                                        <select name="salutation" class="selectpicker form-control">
                                            <option>Anrede</option>
                                            <option value="frau">Frau</option>
                                            <option value="herr">Herr</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt15">
                                    <div class="col-md-4 pr0">
                                        <input type="text" class="form-control formStyle formFaded" name="first_name"
                                               placeholder="Vorname" aria-describedby="Vorname">
                                    </div>
                                    <div class="col-md-4 pr0">
                                        <input type="text" class="form-control formStyle formFaded" name="last_name"
                                               placeholder="Nachname" aria-describedby="Nachname">
                                    </div>
                                </div>

                                <div class="row mt10">
                                    <div class="col-md-8 pr0">
                                        <input type="text" class="form-control formStyle formFaded" name="street"
                                               placeholder="Srasse" aria-describedby="Srasse">
                                    </div>
                                </div>

                                <div class="row mt10">
                                    <div class="col-md-2 pr0">
                                        <input type="text" class="form-control formStyle formFaded" name="zipcode"
                                               placeholder="PLZ" aria-describedby="PLZ">
                                    </div>
                                    <div class="col-md-6 pr0">
                                        <input type="text" class="form-control formStyle formFaded" name="city"
                                               placeholder="Ort" aria-describedby="Ort">
                                    </div>
                                </div>

                                <div class="row mt10">
                                    <div class="col-md-4 pr0">
                                        <input type="email" class="form-control formStyle formFaded" name="email"
                                               placeholder="E-Mail" aria-describedby="E-Mail">
                                    </div>
                                    <div class="col-md-4 pr0">
                                        <input type="text" class="form-control formStyle formFaded" name="tel"
                                               placeholder="Telefon" aria-describedby="Telefon">
                                    </div>
                                </div>

                                <div class="row mt10">
                                    <div class="col-md-8 pr0">
                                        <textarea class="form-control formStyle" rows="4" name="notice"
                                                  placeholder="Bemerkung"></textarea>
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
                                                    Ich habe die <a href="#!">Allgemeinen Geschäftsbedingungen</a>
                                                    gelesen und bin
                                                    einverstanden
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
                            <span class="totalPrice_price">{{ \App\Helpers\Helper::smartPrice(session('reservation.totalPrice')) }}</span>
                        </div>
                        <div class="col-xs-12 text-right totalPrice_vat">
                            inkl. 19% MwSt
                        </div>
                        <div class="col-xs-12 text-right totalPrice_action">
                            <button type="submit" class="btn">Kostenpflichtig resevieren</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="notifyUser">
                                Hinweis: Ihre Daten werden bei uns in elektronischer Form gespeichert. Eine Weitergabe
                                an
                                Dritte erfolgt nicht.
                            </div>

                        </div>


                    </div>

                </div>

            </div>
        </div>
    </form>
@endsection