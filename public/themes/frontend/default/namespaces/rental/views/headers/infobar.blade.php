<div class="container-fluid infoBar">

    <div class="container">
        <div class="row">
            <div class="col-md-4 infoBar_box">
                <div class="infoBar_box_left">
                    <img alt="..." src="/{{ \App\Helpers\Helper::assetsUrl('/img') }}/infoBar_boxIco.png">
                </div>

                <div class="infoBar_box_right">
                    <h4 class="media-heading">Abholung</h4>
                    <p>Millennium Cars GmbH, Baden-Baden</p>
                    <p>26.07.2016, 11:00</p>
                </div>
            </div>
            <div class="col-md-4 infoBar_box">
                <div class="infoBar_box_left">
                    <img alt="..." src="/{{ \App\Helpers\Helper::assetsUrl('/img') }}/infoBar_boxIco.png">
                </div>
                <div class="infoBar_box_right">
                    <h4 class="media-heading">Rückgabe</h4>
                    <p>Millennium Cars GmbH, Baden-Baden</p>
                    <p>26.07.2016, 11:00</p>
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
                                <span class="isBold">5</span>
                                Tage</p>
                        </div>
                    </div>
                    <div class="col-md-7 col-xs-6 infoBar_box change">
                        <a id="changeDataTrigger" href="#">Ändern
                            <i aria-hidden="true" class="fa fa-angle-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>