<div class="container-fluid infoBar">

    <div class="container">
        <div class="row">
            <div class="col-md-4 infoBar_box">
                <div class="infoBar_box_left">
                    <img alt="..." src="/{{ \App\Helpers\Helper::assetsUrl('/img') }}/infoBar_boxIco.png">
                </div>

                <div class="infoBar_box_right">
                    <h4 class="media-heading">Abholung</h4>
                    <p>{{ \Modules\Rental\Models\Station::find(session('reservation.from_station'))->name }}, {{ \Modules\Rental\Models\Station::find(session('reservation.from_station'))->city }}</p>
                    <p>{{ session('reservation.from_date') }} {{ session('reservation.from_time') }}</p>
                </div>
            </div>
            <div class="col-md-4 infoBar_box">
                <div class="infoBar_box_left">
                    <img alt="..." src="/{{ \App\Helpers\Helper::assetsUrl('/img') }}/infoBar_boxIco.png">
                </div>
                <div class="infoBar_box_right">
                    <h4 class="media-heading">Rückgabe</h4>
                    <p>{{ \Modules\Rental\Models\Station::find(session('reservation.to_station'))->name }}, {{ \Modules\Rental\Models\Station::find(session('reservation.to_station'))->city }}</p>
                    <p>{{ session('reservation.to_date') }} {{ session('reservation.to_time') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-5 col-xs-6 infoBar_box rental">
                        <div class="infoBar_box_left">
                            <img alt="..." src="/{{ \App\Helpers\Helper::assetsUrl('/img') }}/infoBar_boxIco.png">
                        </div>
                        <div class="infoBar_box_right">
                            <h4 class="media-heading">MietDauer</h4>
                            <p>
                                <i aria-hidden="true" class="fa fa-calendar-check-o"></i>
                                <span class="isBold">{{ session('reservation.days') }}</span>
                                @if(session('reservation.days') > 1)Tage @else Tag @endif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>