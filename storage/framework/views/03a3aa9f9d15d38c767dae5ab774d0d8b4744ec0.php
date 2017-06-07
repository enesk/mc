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
                    <?php if(Request::is('rental/search') or Request::is('*/rental/search')): ?><?php echo e('class=currentStep'); ?><?php endif; ?>
                    >
                        <span class="isCircle">2</span>
                        <span>Fahrzeugwahl</span>

                    </li>
                    <li
                    <?php if(Request::is('rental/*/*/extras') or Request::is('*/rental/*/*/extras')): ?><?php echo e('class=currentStep'); ?><?php endif; ?>
                    <?php if(Request::is('rental/search')): ?><?php echo e('class=futureStep'); ?><?php endif; ?>
                    >
                        <span class="isCircle">3</span>
                        <span class="hidden-lg-down">Preis &amp; extras</span>

                    </li>
                    <li
                    <?php if(Request::is('rental/check') or Request::is('*/rental/check')): ?><?php echo e('class=currentStep'); ?><?php endif; ?>
                    <?php if(Request::is('rental/*/*/extras') or Request::is('rental/search')): ?><?php echo e('class=futureStep'); ?><?php endif; ?>
                    >
                        <span class="isCircle">4</span>
                        <span class="hidden-lg-down">Prüfen &amp; Senden</span>

                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>