<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pt35 pb25">
                <img src="/<?php echo e(\App\Helpers\Helper::assetsUrl()); ?>/img/milleniumcars_bottom.png" alt="milleniumcars">
            </div>
        </div>
    </div>
    <div class="container-fluid footer_lighter">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pt15 pb25">
                    <div class="footer_address">
                        <h3>Millennium Group</h3>
                        <?php foreach(\Modules\Rental\Models\Station::all() as $station): ?>
                            <span class="isBold mt25    "><?php echo e($station->city); ?></span>
                            <span><?php echo e($station->street); ?> <?php echo e($station->houseno); ?></span>
                            <span><?php echo e($station->zipcode); ?> <?php echo e($station->city); ?></span>
                            <span>Tel.: <?php echo e($station->tel); ?></span>
                        <?php endforeach; ?>
                    </div>

                </div>
                <div class="col-md-4 hasBorders pt15 pb25">
                    <div class="footer_siteMap">
                        <h3>Menü</h3>
                        <?php echo e(\App\Helpers\MenuHelper::getMenu('footer')); ?>

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
                <h1 class="titleNegative">SEO TITLE</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                    massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                    quam felis, ultricies nec, pellentesque eu,
                    pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                    vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum
                    felis eu pede mollis pretium. Integer tincidunt.
                    Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula,
                    porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                    feugiat a, tellus. Phasellus viverra nulla ut metus
                    varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur
                    ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                    rhoncus, sem quam semper libero, sit amet adipiscing sem
                    neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio
                    et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam
                    sit amet orci eget eros faucibus tincidunt. Duis
                    leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>
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
