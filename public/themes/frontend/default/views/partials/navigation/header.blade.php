<ul class="list-inline subHdrMenu collapsed-sub-header">
    <li>
        <a href="" data-toggle="dropdown" id="menu_dropdown">MENÜ
            <i class="fa fa-bars menuIco" aria-hidden="true"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right arrow_box menu_dropdown" aria-labelledby="menu_dropdown">
            {{ \App\Helpers\MenuHelper::getMenu('header-home', 'li') }}
        </ul>
    </li>
</ul>