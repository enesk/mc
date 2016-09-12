@if($type == 'from')
    <div class="rentalStation">
        <input type="text" class="form-control formStyle thinner " placeholder="Abholungstation wählen..."
               aria-describedby="Abholungstation wählen" data-toggle="dropdown" id="station_dropdown">
        <input type="hidden" name="from_station" id="from_station"/>
        <div class="dropdown-menu arrow_box station_dropdown" aria-labelledby="station_dropdown"
             id="station_dropdown_open">
            <div class="row">
                <div class="col-md-5 pr0 col-xs-12">
                    <div class="stnDdown_left f_stnDdown_left">
                        <h4>Mietstationen</h4>
                        <ul class="list-unstyled">
                            @foreach(\Modules\Rental\Models\Station::all() as $station)
                                <li>
                                    <a href="#" data-station-id="{{ $station->id }}">
                                        <span>{{ $station->name }}, {{ $station->city }}</span>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 has_l_border hidden-xs">
                    @foreach(\Modules\Rental\Models\Station::all() as $station)
                        <div class="{{ 'from_stationList' }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="stnDdown_right_top">
                                        <p>
                                            {{ $station->name }},<br/>{{ $station->city }}
                                        </p>
                                        <p>
                                            {{ $station->street }} {{ $station->houseno }}<br/>
                                            {{ $station->zipcode }} {{ $station->city }}
                                        </p>
                                    </div>
                                    <div class="stnDdown_right_contact">
                                        <div>
                                            <span>Telefon:</span>
                                            <span>{{ $station->tel }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 has_l_border">
                                    <div class="stnDdown_right_top">
                                        <p>
                                            Öffnungszeiten
                                        </p>
                                        <ul class="list-unstyled list_hours">
                                            @foreach(json_decode($station->openings)->openings as $key => $opening)
                                                <li>
                                                    <span>{{ ucfirst($key) }}.</span>
                                                    <span>{{ $opening }}</span>
                                                    <span> - </span>
                                                    <span>{{ json_decode($station->openings)->closings->$key }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@else
    <div class="rentalStation" id="destination">
        <input type="text" class="form-control formStyle thinner" placeholder="Rückgabestation wählen..."
               aria-describedby="Rückgabestation wählen" data-toggle="dropdown" id="station_dropdown_destination">
        <input type="hidden" name="to_station" id="to_station" />
        <div class="dropdown-menu arrow_box station_dropdown arrival_dropdown" aria-labelledby="station_dropdown"
             id="arrival_dropdown">
            <div class="row">
                <div class="col-md-5 pr0 col-xs-12">
                    <div class="stnDdown_left">
                        <h4>Mietstationen</h4>
                        <ul class="list-unstyled">
                            @foreach(\Modules\Rental\Models\Station::all() as $station)
                                <li>
                                    <a data-station-id="{{ $station->id }}" href="#" data-station-id="{{ $station->id }}">
                                        <span>{{ $station->name }}, {{ $station->city }}</span>
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

                <div class="col-md-7 has_l_border hidden-xs">
                    @foreach(\Modules\Rental\Models\Station::all() as $station)
                        <div class="to_stationList">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="stnDdown_right_top">
                                        <p>
                                            {{ $station->name }},<br/>{{ $station->city }}
                                        </p>
                                        <p>
                                            {{ $station->street }} {{ $station->houseno }}<br/>
                                            {{ $station->zipcode }} {{ $station->city }}
                                        </p>
                                    </div>
                                    <div class="stnDdown_right_contact">
                                        <div>
                                            <span>Telefon:</span>
                                            <span>{{ $station->tel }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 has_l_border">
                                    <div class="stnDdown_right_top">
                                        <p>
                                            Öffnungszeiten
                                        </p>
                                        <ul class="list-unstyled list_hours">
                                            @foreach(json_decode($station->openings)->openings as $key => $opening)
                                                <li>
                                                    <span>{{ ucfirst($key) }}.</span>
                                                    <span>{{ $opening }}</span>
                                                    <span> - </span>
                                                    <span>{{ json_decode($station->openings)->closings->$key }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif