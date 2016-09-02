<ul class="list-unstyled rightMenu">
    @foreach($items as $item)
        <?php
        $page = \Modules\Page\Models\Page::find($item->page_id);
        $url = \App\Helpers\MenuHelper::getUrl($item, $page);
        $selected = \App\Helpers\MenuHelper::isSelected($page);
        ?>
        <li @if($selected)class="currentPage" @endif>
            <a href="{{ $url }}">{{ $item->name }}<i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </li>
    @endforeach
</ul>