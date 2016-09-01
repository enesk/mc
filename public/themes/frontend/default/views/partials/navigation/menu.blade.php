<ul class="list-inline subHdrMenu">
    @foreach($items as $item)
        <?php
        $page = \Modules\Page\Models\Page::find($item->page_id);
        $url = \App\Helpers\MenuHelper::getUrl($item, $page);
        $selected = \App\Helpers\MenuHelper::isSelected($page);
        ?>
        <li class="{{ $selected }} hidden-xs">
            <a href="{{ $url }}">{{ $item->name }}</a>
        </li>
    @endforeach
    <li class="visible-xs">
        <a href="" data-toggle="dropdown" id="menu_dropdown">MENÜ
            <i class="fa fa-bars menuIco" aria-hidden="true"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right arrow_box menu_dropdown" aria-labelledby="menu_dropdown">
            @foreach($items as $item)
                <?php
                $page = \Modules\Page\Models\Page::find($item->page_id);
                $url = \App\Helpers\MenuHelper::getUrl($item, $page);
                ?>
                <li>
                    <a href="{{ $url }}">{{ $item->name }}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </li>
            @endforeach
        </ul>
    </li>

</ul>