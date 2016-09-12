<div class="container-fluid darkSubHedader">
    <div class="container">
        <div class="row m0">
            <div class="col-md-12 p0">
                <ul class="list-inline stepsList noSelect">
                    <li>
                        <span class="isCircle">1</span>
                        <span class="hidden-lg-down">Mietdaten</span>

                    </li>
                    <li
                    @if(Request::is('rental/search') or Request::is('*/rental/search')){{ 'class=currentStep' }}@endif
                    >
                        <span class="isCircle">2</span>
                        <span>Fahrzeugwahl</span>

                    </li>
                    <li
                    @if(Request::is('rental/*/*/extras') or Request::is('*/rental/*/*/extras')){{ 'class=currentStep' }}@endif
                    @if(Request::is('rental/search')){{ 'class=futureStep' }}@endif
                    >
                        <span class="isCircle">3</span>
                        <span class="hidden-lg-down">Preis &amp; extras</span>

                    </li>
                    <li
                    @if(Request::is('rental/check') or Request::is('*/rental/check')){{ 'class=currentStep' }}@endif
                    @if(Request::is('rental/*/*/extras') or Request::is('rental/search')){{ 'class=futureStep' }}@endif
                    >
                        <span class="isCircle">4</span>
                        <span class="hidden-lg-down">Prüfen &amp; Senden</span>

                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>