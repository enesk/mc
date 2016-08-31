@extends('layouts.default')
@section('content')
    <div class="container-fluid ">
        <div class="row">
            @foreach(\Modules\Rental\Models\Station::all() as $station)
            <a href="{{ URL::to('sales') }}" class="col-lg-3 col-sm-3 col-xs-6 start-locations" style="background-image: url({{ $station->photo }});">
                <span class="start-location-name">{{ $station->city }} <i class="fa fa-arrow-right"></i></span>
            </a>
            @endforeach
            <a href="http://www.millenniumtrucks.de/" target="_blank" class="col-lg-3 col-sm-3 col-xs-6 start-locations" style="background-image: url({{ \App\Helpers\Helper::uploadsURL('/stations/start-standort-4.png') }});">
                <span class="start-location-name">Millenniumtrucks <i class="fa fa-arrow-right"></i></span>
            </a>
        </div>
    </div>
@endsection