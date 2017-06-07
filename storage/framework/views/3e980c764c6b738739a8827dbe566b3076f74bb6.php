<ul class="list-inline subHdrMenu">
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
    <?php if($slug == 'header-main'): ?>
    <?php else: ?>
            <li class="visible-xs">
                <a href="" data-toggle="dropdown" id="menu_dropdown">MENÜ
                    <i class="fa fa-bars menuIco" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right arrow_box menu_dropdown" aria-labelledby="menu_dropdown">
                    <?php foreach($items as $item): ?>
                        <?php
                        $page = \Modules\Page\Models\Page::find($item->page_id);
                        $url = \App\Helpers\MenuHelper::getUrl($item, $page);
                        ?>
                        <li>
                            <a href="<?php echo e($url); ?>"><?php echo e($item->name); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
    <?php endif; ?>
</ul>