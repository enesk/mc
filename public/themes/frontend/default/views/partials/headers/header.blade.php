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
                @if(Request::is('xrastatt/*') or Request::is('rastatt'))
                    <img src="/uploads/logos/logo-rastatt.png" alt="Millenium Cars" class="img-responsive">
                @elseif(Request::is('xkarlsruhe/*') or Request::is('karlsruhe'))
                    <img src="/uploads/logos/logo-karlsruhe.png" alt="Millenium Cars" class="img-responsive">
                @else
                    <img src="/uploads/logos/group.png" alt="Millenium Cars" class="img-responsive pull-left">
                @endif
            </a>
        </div>
        <div class="col-md-9 col-xs-7 vMiddle flex-end">
            @if(Request::is('*/sales/*') or Request::is('*/sales') or Request::is('*/rental/*') or Request::is('*/rental/') or Request::is('rental/*') or Request::is('rental') or Request::is('sales'))
                {{ \App\Helpers\MenuHelper::getMenu('header-main') }}
                @include('partials.navigation.header')
            @else
                {{ \App\Helpers\MenuHelper::getMenu('header-home') }}
            @endif

        </div>
    </div>
</div>