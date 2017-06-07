<!-- WYSIWYG editor - CKeditor -->
<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >
    <label><?php echo e($field['label']); ?></label>
    <textarea
        id="ckeditor-<?php echo e($field['name']); ?>"
        name="<?php echo e($field['name']); ?>"
        <?php echo $__env->make('crud::inc.field_attributes', ['default_class' =>  'form-control ckeditor'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        ><?php echo e(old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' ))); ?></textarea>

    <?php /* HINT */ ?>
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
</div>


<?php /* ########################################## */ ?>
<?php /* Extra CSS and JS for this particular field */ ?>
<?php /* If a field type is shown multiple times on a form, the CSS and JS will only be loaded once */ ?>
<?php if($crud->checkIfFieldIsFirstOfItsType($field, $fields)): ?>

    <?php /* FIELD CSS - will be loaded in the after_styles section */ ?>
    <?php $__env->startPush('crud_fields_styles'); ?>
    <?php $__env->stopPush(); ?>

    <?php /* FIELD JS - will be loaded in the after_scripts section */ ?>
    <?php $__env->startPush('crud_fields_scripts'); ?>
        <script src="<?php echo e(asset('vendor/backpack/ckeditor/ckeditor.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/backpack/ckeditor/adapters/jquery.js')); ?>"></script>
        <script>
            jQuery(document).ready(function($) {
                $('textarea.ckeditor' ).ckeditor({
                    "filebrowserBrowseUrl": "<?php echo e(url('admin/elfinder/ckeditor')); ?>",
                    "extraPlugins" : 'oembed,widget'
                });
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>
<?php /* End of Extra CSS and JS */ ?>
<?php /* ########################################## */ ?>