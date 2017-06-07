<div class="row">
    <div class="sResultFilter col-xs-12 " id="filterOptions">
        <a class="all active" href="#">
            <button aria-label="Alle Anzeigen" class="btn btn-border btn-gray" type="button">
                Alle Anzeigen
            </button>
        </a>
        <?php foreach($categories as $category): ?>
            <a class="<?php echo e($category->slug); ?>" href="#">
                <button aria-label="<?php echo e($category->name); ?>" class="btn btn-border btn-gray" type="button">
                    <?php echo e($category->name); ?>

                </button>
            </a>
        <?php endforeach; ?>
    </div>
</div>