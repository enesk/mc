<?php if(isset($field['attributes'])): ?>
    <?php foreach($field['attributes'] as $attribute => $value): ?>
    	<?php if(is_string($attribute)): ?>
        <?php echo e($attribute); ?>="<?php echo e($value); ?>"
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if(!isset($field['attributes']['class'])): ?>
    	<?php if(isset($default_class)): ?>
    		class="<?php echo e($default_class); ?>""
    	<?php else: ?>
    		class="form-control"
    	<?php endif; ?>
    <?php endif; ?>
<?php else: ?>
	<?php if(isset($default_class)): ?>
		class="<?php echo e($default_class); ?>""
	<?php else: ?>
		class="form-control"
	<?php endif; ?>
<?php endif; ?>