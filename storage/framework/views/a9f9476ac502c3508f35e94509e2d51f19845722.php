<?php if(isset($field['wrapperAttributes'])): ?>
    <?php foreach($field['wrapperAttributes'] as $attribute => $value): ?>
    	<?php if(is_string($attribute)): ?>
        <?php echo e($attribute); ?>="<?php echo e($value); ?>"
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if(!isset($field['wrapperAttributes']['class'])): ?>
		class="form-group col-md-12"
    <?php endif; ?>
<?php else: ?>
	class="form-group col-md-12"
<?php endif; ?>