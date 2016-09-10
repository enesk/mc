@extends('layouts.default')
@section('content')
    @include('rental::sliders.home')
    <form method="get" action="{{ route('rental::search') }}">
        <div class="container searchBoxWrapper">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="searchBox">
                        <div>
                            <h2>PKW-Vermietung</h2>
                            <h3>Mietstation Abholung</h3>
                        </div>
                        @include('rental::home.stations', ['type' => 'from'])
                        <div class="dateSelection mt10">
                            <div class="dateWrapper">
                                <span class="input-group-addon">Von</span>
                                <input type="text" class="form-control formStyle thinner datepick" placeholder="" aria-describedby="from_date" name="from_date" id="dpd1">
                                <input type="text" class="form-control formStyle thinner timepick" placeholder="" aria-describedby="from_time" name="from_time" data-toggle="dropdown" id="from_time_dropdown">
                                <div class="dropdown-menu arrow_box from_time_dropdown" aria-labelledby="from_time_dropdown">
                                    <h3>Abholzeiten</h3>

                                    <div class="timeTable" id="select_from_time">
                                        <div>
                                            <span>08:00</span>
                                            <span>08:30</span>
                                        </div>
                                        <div>
                                            <span>09:00</span>
                                            <span>09:30</span>
                                        </div>
                                        <div>
                                            <span>10:00</span>
                                            <span>10:30</span>
                                        </div>
                                        <div>
                                            <span class="selectedTime">11:00</span>
                                            <span>11:30</span>
                                        </div>
                                        <div>
                                            <span>12:00</span>
                                            <span>12:30</span>
                                        </div>
                                        <div>
                                            <span>13:00</span>
                                            <span>13:30</span>
                                        </div>
                                        <div>
                                            <span>14:00</span>
                                            <span>14:30</span>
                                        </div>
                                        <div>
                                            <span>15:00</span>
                                            <span>15:30</span>
                                        </div>
                                        <div>
                                            <span>16:00</span>
                                            <span>16:30</span>
                                        </div>
                                        <div>
                                            <span>17:00</span>
                                            <span>17:30</span>
                                        </div>
                                        <div>
                                            <span>18:00</span>
                                            <span>18:30</span>
                                        </div>
                                        <div>
                                            <span>19:00</span>
                                            <span>19:30</span>
                                        </div>
                                        <div>
                                            <span>20:00</span>
                                            <span>20:30</span>
                                        </div>
                                        <div>
                                            <span>21:00</span>
                                            <span>21:30</span>
                                        </div>
                                        <div>
                                            <span>22:00</span>
                                            <span>22:30</span>
                                        </div>
                                        <div>
                                            <span>23:00</span>
                                            <span>23:30</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="dateWrapper mt10">
                                <span class="input-group-addon">Bis</span>
                                <input type="text" class="form-control formStyle thinner datepick" placeholder="" aria-describedby="to_date" name="to_date" id="dpd2">
                                <input type="text" class="form-control formStyle thinner timepick" placeholder="" aria-describedby="to_time" name="to_time" data-toggle="dropdown" id="to_time_dropdown">

                                <div class="dropdown-menu arrow_box from_time_dropdown to_time_dd" aria-labelledby="to_time_dropdown">

                                    <h3>Abholzeiten</h3>

                                    <div class="timeTable" id="select_to_time">
                                        <div>
                                            <span>08:00</span>
                                            <span>08:30</span>
                                        </div>
                                        <div>
                                            <span>09:00</span>
                                            <span>09:30</span>
                                        </div>
                                        <div>
                                            <span>10:00</span>
                                            <span>10:30</span>
                                        </div>
                                        <div>
                                            <span class="selectedTime">11:00</span>
                                            <span>11:30</span>
                                        </div>
                                        <div>
                                            <span>12:00</span>
                                            <span>12:30</span>
                                        </div>
                                        <div>
                                            <span>13:00</span>
                                            <span>13:30</span>
                                        </div>
                                        <div>
                                            <span>14:00</span>
                                            <span>14:30</span>
                                        </div>
                                        <div>
                                            <span>15:00</span>
                                            <span>15:30</span>
                                        </div>
                                        <div>
                                            <span>16:00</span>
                                            <span>16:30</span>
                                        </div>
                                        <div>
                                            <span>17:00</span>
                                            <span>17:30</span>
                                        </div>
                                        <div>
                                            <span>18:00</span>
                                            <span>18:30</span>
                                        </div>
                                        <div>
                                            <span>19:00</span>
                                            <span>19:30</span>
                                        </div>
                                        <div>
                                            <span>20:00</span>
                                            <span>20:30</span>
                                        </div>
                                        <div>
                                            <span>21:00</span>
                                            <span>21:30</span>
                                        </div>
                                        <div>
                                            <span>22:00</span>
                                            <span>22:30</span>
                                        </div>
                                        <div>
                                            <span>23:00</span>
                                            <span>23:30</span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="searchBox_check noSelect destinationActivate">
                            <div class="checkbox checkbox-success">
                                <input id="checkbox1" class="styled" type="checkbox">
                                <label for="checkbox1">
                                    Andere Rückgabestation wählen
                                </label>
                            </div>
                        </div>
                        @include('rental::home.stations', ['type' => 'destination'])
                    </div>
                    <div class="searchBox_action">
                        <button type="submit" class="btn btn-block">Preis ermitteln
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection