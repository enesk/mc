<!-- browse server input -->

<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >

    <label><?php echo e($field['label']); ?></label>
	<input
		type="text"
		id="<?php echo e($field['name']); ?>-filemanager"

		name="<?php echo e($field['name']); ?>"
        value="<?php echo e(old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' ))); ?>"
        <?php echo $__env->make('crud::inc.field_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php if(!isset($field['readonly']) || $field['readonly']): ?> readonly <?php endif; ?>
	>

	<div class="btn-group" role="group" aria-label="..." style="margin-top: 3px;">
	  <button type="button" data-inputid="<?php echo e($field['name']); ?>-filemanager" class="btn btn-default popup_selector">
		<i class="fa fa-cloud-upload"></i> <?php echo e(trans('backpack::crud.browse_uploads')); ?></button>
		<button type="button" data-inputid="<?php echo e($field['name']); ?>-filemanager" class="btn btn-default clear_elfinder_picker">
		<i class="fa fa-eraser"></i> <?php echo e(trans('backpack::crud.clear')); ?></button>
	</div>

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
		<!-- include browse server css -->
		<link href="<?php echo e(asset('vendor/backpack/colorbox/example2/colorbox.css')); ?>" rel="stylesheet" type="text/css" />
	<?php $__env->stopPush(); ?>

	<?php $__env->startPush('crud_fields_scripts'); ?>
		<!-- include browse server js -->
		<script src="<?php echo e(asset('vendor/backpack/colorbox/jquery.colorbox-min.js')); ?>"></script>
	<?php $__env->stopPush(); ?>

<?php endif; ?>

<?php /* FIELD JS - will be loaded in the after_scripts section */ ?>
<?php $__env->startPush('crud_fields_scripts'); ?>
	<script>
		$(document).on('click','.popup_selector[data-inputid=<?php echo e($field['name']); ?>-filemanager]',function (event) {
		    event.preventDefault();

		    // trigger the reveal modal with elfinder inside
		    var triggerUrl = "<?php echo e(url(config('elfinder.route.prefix').'/popup/'.$field['name']."-filemanager")); ?>";
		    $.colorbox({
		        href: triggerUrl,
		        fastIframe: true,
		        iframe: true,
		        width: '70%',
		        height: '50%'
		    });
		});

		// function to update the file selected by elfinder
		function processSelectedFile(filePath, requestingField) {
		    $('#' + requestingField).val(filePath);
		}

		$(document).on('click','.clear_elfinder_picker[data-inputid=<?php echo e($field['name']); ?>-filemanager]',function (event) {
		    event.preventDefault();
		    var updateID = $(this).attr('data-inputid'); // Btn id clicked
		    $("#"+updateID).val("");
		});
	</script>
<?php $__env->stopPush(); ?>

<?php /* End of Extra CSS and JS */ ?>
<?php /* ########################################## */ ?>