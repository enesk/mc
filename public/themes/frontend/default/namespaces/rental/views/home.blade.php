@extends('layouts.default')
@section('content')
    @include('rental::sliders.home')
    <form method="get" action="{{ route('rental::search') }}">
        <input type="hidden" name="days" id="total_days"/>
        <div class="container searchBoxWrapper">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="searchBox" @if(session('error')){{ 'style=height:360px' }}@endif>
                        <div>
                            <h2>PKW-Vermietung</h2>
                            <h3>Mietstation Abholung</h3>
                        </div>
                        @if(session('error'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info" role="alert">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @include('rental::home.stations', ['type' => 'from'])
                        <div class="dateSelection mt10">
                            <div class="dateWrapper">
                                <span class="input-group-addon">Von</span>
                                <input type="text" class="form-control formStyle thinner datepick" placeholder=""
                                       aria-describedby="from_date" name="from_date" id="from_date"
                                       value="{{ \App\Helpers\Helper::addDaysToCurrentDay(\App\Helpers\Helper::getCurrentDate(), 1) }}">
                                <input type="text" class="form-control formStyle thinner timepick" placeholder=""
                                       aria-describedby="from_time" name="from_time" data-toggle="dropdown"
                                       id="from_time_dropdown" value="09:00">
                                <div class="dropdown-menu arrow_box from_time_dropdown"
                                     aria-labelledby="from_time_dropdown">
                                    <h3>Abholzeiten</h3>
                                    <div class="timeTable" id="select_from_time">
                                        @include('rental::home.timeTable')
                                    </div>
                                </div>
                            </div>
                            <div class="dateWrapper mt10">
                                <span class="input-group-addon">Bis</span>
                                <input type="text" class="form-control formStyle thinner datepick" placeholder=""
                                       aria-describedby="to_date" name="to_date" id="to_date"
                                       value="{{ \App\Helpers\Helper::addDaysToCurrentDay(\App\Helpers\Helper::getCurrentDate(), 2) }}">
                                <input type="text" class="form-control formStyle thinner timepick" placeholder=""
                                       aria-describedby="to_time" name="to_time" data-toggle="dropdown"
                                       id="to_time_dropdown" value="09:00">

                                <div class="dropdown-menu arrow_box from_time_dropdown to_time_dd"
                                     aria-labelledby="to_time_dropdown">

                                    <h3>Abholzeiten</h3>
                                    <div class="timeTable" id="select_to_time">
                                        @include('rental::home.timeTable')
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
@section('afterScripts')
    <script type="text/javascript">
        reservation.from();
        reservation.to();
    </script>
@stop