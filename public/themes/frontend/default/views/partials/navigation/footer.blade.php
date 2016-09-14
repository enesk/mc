<ul class="list-unstyled">
    @foreach($items as $item)
        <?php
        $page = \Modules\Page\Models\Page::find($item->page_id);
        $url = \App\Helpers\MenuHelper::getUrl($item, $page);
        $selected = \App\Helpers\MenuHelper::isSelected($page);
        ?>
        <li class="@if($selected)selected @endif hidden-xs">
            <a href="{{ $url }}">{{ $item->name }}</a>
        </li>
    @endforeach
</ul>