<ul class="list-unstyled rightMenu">
    <?php foreach($items as $item): ?>
        <?php
        $page = \Modules\Page\Models\Page::find($item->page_id);
        $url = \App\Helpers\MenuHelper::getUrl($item, $page);
        $selected = \App\Helpers\MenuHelper::isSelected($page);
        ?>
        <li <?php if($selected): ?>class="currentPage" <?php endif; ?>>
            <a href="<?php echo e($url); ?>"><?php echo e($item->name); ?><i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </li>
    <?php endforeach; ?>
</ul>