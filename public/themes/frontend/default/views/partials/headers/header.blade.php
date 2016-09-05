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
                    <a href="#">
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
        <div class="col-md-4 col-xs-6">
            <a href="/" title="Millenium Cars">
                <img src="/uploads/logos/group.png" alt="Millenium Cars"
                     class="img-responsive">
            </a>
        </div>
        <div class="col-md-8 col-xs-6 vMiddle flex-end">
            @if(Request::is('sales/*') or Request::is('sales'))
                @include('partials.navigation.header')
            @else
                {{ \App\Helpers\MenuHelper::getMenu('header-main') }}
            @endif

        </div>
    </div>
</div>