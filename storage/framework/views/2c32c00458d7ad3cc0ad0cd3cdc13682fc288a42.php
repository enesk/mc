<nav class="navbar" role="navigation">
    <div class="container">
        <div class="navbar-collapse">
            <ul class="nav navbar-nav navbar-right headerMenu">
                <li class="hidden-xs">
                    <a href="/impressum">Impressum</a>
                </li>
                <li class="hidden-xs">
                    <a href="/datenschutz">Datenschutz</a>
                </li>
                <li>
                    <a href="/kontakt">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        Kontakt</a>

                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- header -->
<div class="container">
    <div class="row vAlignCentered mb20">
        <div class="col-md-3 col-xs-5">
            <a href="/" title="Millenium Cars">
                <?php if(Request::is('xrastatt/*') or Request::is('rastatt')): ?>
                    <img src="/uploads/logos/logo-rastatt.png" alt="Millenium Cars" class="img-responsive">
                <?php elseif(Request::is('xkarlsruhe/*') or Request::is('karlsruhe')): ?>
                    <img src="/uploads/logos/logo-karlsruhe.png" alt="Millenium Cars" class="img-responsive">
                <?php else: ?>
                    <img src="/uploads/logos/group.png" alt="Millenium Cars" class="img-responsive pull-left">
                <?php endif; ?>
            </a>
        </div>
        <div class="col-md-9 col-xs-7 vMiddle flex-end">
            <?php if(Request::is('*/sales/*') or Request::is('*/sales') or Request::is('*/rental/*') or Request::is('*/rental/') or Request::is('rental/*') or Request::is('rental') or Request::is('sales')): ?>
                <?php echo e(\App\Helpers\MenuHelper::getMenu('header-main')); ?>

                <?php echo $__env->make('partials.navigation.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <?php echo e(\App\Helpers\MenuHelper::getMenu('header-home')); ?>

            <?php endif; ?>

        </div>
    </div>
</div>