<nav class="navbar" role="navigation">
    <div class="container">
        <div class="navbar-collapse">
            <ul class="nav navbar-nav navbar-right headerMenu">
                <li class="hidden-xs">
                    <a href="#">Impressum</a>
                </li>
                <li class="hidden-xs">
                    <a href="#">Datenschutz</a>
                </li>
                <li class="hidden-xs">
                    <a href="#">AGB</a>
                </li>
                <li class="hidden-xs">
                    <a href="#">Anfahrt</a>
                </li>
                <li class="hidden-xs">
                    <a href="#">Kontakt</a>
                </li>
                <li>
                    <a href="#" data-toggle="dropdown" id="login_dropdown">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        Login</a>
                    <div class="dropdown-menu arrow_box loginBox onNav" aria-labelledby="login_dropdown">
                        <h3>Login</h3>
                        <div class="email_input mt10">
                            <input type="email" class="form-control formStyle formFaded" placeholder="E-mail Adresse" aria-describedby="email_input">
                        </div>
                        <div class="pswrd_input mt5">
                            <input type="password" class="form-control formStyle formFaded" placeholder="Passwort" aria-describedby="pswrd_input">
                        </div>
                        <div class="loginBox_action mt5">
                            <button type="button" name="einloggeb" class="btn btn-border btn-blue btn-block">Einlogen</button>
                        </div>
                        <div class="loginBox_forgot mt10">
                            <a href="#">» Passwort vergessen</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- header -->
<div class="container">
    <div class="row vAlignCentered mb20">
        <div class="col-md-4 col-xs-6">
            <a href="/home" title="Millenium Cars">
                <img src="/{{ \App\Helpers\Helper::assetsUrl() }}/img/milleniumcars.png" alt="Millenium Cars" class="img-responsive">
            </a>
        </div>
        <div class="col-md-8 col-xs-6 vMiddle flex-end">
            <ul class="list-inline subHdrMenu">
                <li class="hidden-xs">
                    <a href="">PKW-Vermietung</a>
                </li>
                <li class="selected hidden-xs">
                    <a href="">PKW-verkauf</a>
                </li>
                <li>
                    <a href="" data-toggle="dropdown" id="menu_dropdown">MENÜ
                        <i class="fa fa-bars menuIco" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right arrow_box menu_dropdown" aria-labelledby="menu_dropdown">
                        <li class="visible-xs">
                            <a href="#">PKV-Vermietung<i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="visible-xs">
                            <a href="#">PKW-Verkauf<i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">Über Uns<i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">Karriere<i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">Kontakt<i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">Millennium Trucks Gmbh<i class="fa fa-external-link" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>