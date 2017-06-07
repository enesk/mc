<ul class="list-unstyled">
    <?php foreach($items as $item): ?>
        <?php
        $page = \Modules\Page\Models\Page::find($item->page_id);
        $url = \App\Helpers\MenuHelper::getUrl($item, $page);
        $selected = \App\Helpers\MenuHelper::isSelected($page);
        ?>
        <li class="<?php if($selected): ?>selected <?php endif; ?> hidden-xs">
            <a href="<?php echo e($url); ?>"><?php echo e($item->name); ?></a>
        </li>
    <?php endforeach; ?>
</ul>