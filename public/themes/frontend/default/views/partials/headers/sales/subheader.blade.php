<div class="container-fluid darkSubHedader">
    <div class="container">
        <div class="row m0">
            <div class="col-md-12 p0">
                <ul class="list-inline stepsList noSelect">
                    <li>
                        <span class="isCircle">1</span>
                        <span class="hidden-lg-down">Suche</span>

                    </li>
                    <li @if(\Request::route()->getName() == 'cars::search') class="currentStep" @endif>
                        <span class="isCircle">2</span>
                        <span>Angebote</span>

                    </li>
                    <li @if(\Request::route()->getName() == 'cars::show') class="currentStep" @endif>
                        <span class="isCircle">3</span>
                        <span class="hidden-lg-down">Details</span>

                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>