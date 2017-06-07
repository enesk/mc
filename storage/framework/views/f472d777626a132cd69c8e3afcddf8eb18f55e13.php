<?php if($crud->buttons->where('stack', $stack)->count()): ?>
    <?php foreach($crud->buttons->where('stack', $stack) as $button): ?>
        <?php if($button->type == 'model_function'): ?>
            <?php echo $entry->{$button->content}(); ?>

        <?php else: ?>
            <?php echo $__env->make($button->content, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>