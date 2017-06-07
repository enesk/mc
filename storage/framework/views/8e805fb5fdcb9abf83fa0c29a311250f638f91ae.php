<!-- text input -->
<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >
    <label><?php echo $field['label']; ?></label>
    <input
        type="text"
        name="<?php echo e($field['name']); ?>"
        value="<?php echo e(old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' ))); ?>"
        <?php echo $__env->make('crud::inc.field_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    >

    <?php /* HINT */ ?>
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
</div>


<?php /* FIELD EXTRA CSS  */ ?>
<?php /* push things in the after_styles section */ ?>

    <?php /* <?php $__env->startPush('crud_fields_styles'); ?>
        <!-- no styles -->
    <?php $__env->stopPush(); ?> */ ?>


<?php /* FIELD EXTRA JS */ ?>
<?php /* push things in the after_scripts section */ ?>

    <?php /* <?php $__env->startPush('crud_fields_scripts'); ?>
        <!-- no scripts -->
    <?php $__env->stopPush(); ?> */ ?>


<?php /* Note: you can use <?php if($crud->checkIfFieldIsFirstOfItsType($field, $fields)): ?> to only load some CSS/JS once, even though there are multiple instances of it */ ?>