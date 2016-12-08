<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pt35 pb25">
                <img src="/{{ \App\Helpers\Helper::assetsUrl() }}/img/milleniumcars_bottom.png" alt="milleniumcars">
            </div>
        </div>
    </div>
    <div class="container-fluid footer_lighter">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pt15 pb25">
                    <div class="footer_address">
                        <h3>Millennium Group</h3>
                        @foreach(\Modules\Rental\Models\Station::all() as $station)
                            <span class="isBold mt25">{{ $station->city }}</span>
                            <span>{{ $station->street }} {{ $station->houseno }}</span>
                            <span>{{ $station->zipcode }} {{ $station->city }}</span>
                            <span>Tel.: {{ $station->tel }}</span>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-4 hasBorders pt15 pb25">
                    <div class="footer_siteMap">
                        <h3>Menü</h3>
                        {{ \App\Helpers\MenuHelper::getMenu('footer') }}
                    </div>
                </div>
                <div class="col-md-4 pt15 pb25">
                    <div class="footer_social">
                        <h3>Folgen Sie uns!</h3>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter-square" aria-hidden="true"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                    Instagram
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-xing-square" aria-hidden="true"></i>
                                    Xing
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container footer_bottom_desc">
        <div class="row mt20">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <h1 class="titleNegative">Millennium Cars</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p>Unternehmenserfahrung seit über 30 Jahren und über 50 000 Verkauften PKWs. Autoverkauf in zwei

                    Filialen. Über 500 PKWS auf Lager. Baden-Baden und Rastatt. Finanzierung ab 0,9% möglich.

                    Im Angebot Neuwagen und Jahreswagen. Fahrzeuge aller Klassen. Autovermietung in 2 Standorten.

                    Kleinwagen, Mittelklassewagen sowie Luxusfahrzeuge.</p>
            </div>
        </div>

    </div>
    <div class="container-fluid footer_lighter">
        <div class="container">
            <div class="row hidden-xs">
                <div class="col-md-6">
                    <ul class="list-inline footer_nav">
                        <li>
                            <a href="#">Kontakt</a>
                        </li>
                        <li>
                            <a href="#">AGB</a>
                        </li>
                        <li>
                            <a href="#">Datenschutz</a>
                        </li>
                        <li>
                            <a href="#">Impressum</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 text-right">

                    <ul class="list-inline footer_nav">
                        <li>
                            Copyright 2016
                        </li>
                        <li class="isHighlighted">

                            Millennium Cars GmbH

                        </li>

                    </ul>

                </div>
            </div>
            <div class="row visible-xs">

                <div class="col-xs-12 bottomMobile">
                    <ul class="list-inline footer_nav">
                        <li>
                            <a href="#">Kontakt</a>
                        </li>
                        <li>
                            <a href="#">AGB</a>
                        </li>
                        <li>
                            <a href="#">Datenschutz</a>
                        </li>
                        <li>
                            <a href="#">Impressum</a>
                        </li>
                    </ul>
                </div>

                <div class="col-xs-12 pb10">
                    <ul class="list-inline footer_nav">
                        <li>
                            Copyright 2016
                        </li>
                        <li class="isHighlighted">

                            Millennium Cars GmbH

                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </div>

</footer>
