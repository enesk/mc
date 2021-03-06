<?php $__env->startSection('header'); ?>
	<section class="content-header">
	  <h1>
	    <?php echo e(trans('backpack::crud.edit')); ?> <span class="text-lowercase"><?php echo e($crud->entity_name); ?></span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo e(url(config('backpack.base.route_prefix'),'dashboard')); ?>"><?php echo e(trans('backpack::crud.admin')); ?></a></li>
	    <li><a href="<?php echo e(url($crud->route)); ?>" class="text-capitalize"><?php echo e($crud->entity_name_plural); ?></a></li>
	    <li class="active"><?php echo e(trans('backpack::crud.edit')); ?></li>
	  </ol>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<!-- Default box -->
		<?php if($crud->hasAccess('list')): ?>
			<a href="<?php echo e(url($crud->route)); ?>"><i class="fa fa-angle-double-left"></i> <?php echo e(trans('backpack::crud.back_to_all')); ?> <span class="text-lowercase"><?php echo e($crud->entity_name_plural); ?></span></a><br><br>
		<?php endif; ?>

		  <?php echo Form::open(array('url' => $crud->route.'/'.$entry->getKey(), 'method' => 'put')); ?>

		  <div class="box">
		    <div class="box-header with-border">
		      <h3 class="box-title"><?php echo e(trans('backpack::crud.edit')); ?></h3>
		    </div>
		    <div class="box-body row">
		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
		      <?php if(view()->exists('vendor.backpack.crud.form_content')): ?>
		      	<?php echo $__env->make('vendor.backpack.crud.form_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		      <?php else: ?>
		      	<?php echo $__env->make('crud::form_content', ['fields' => $crud->getFields('update', $entry->getKey())], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		      <?php endif; ?>
		    </div><!-- /.box-body -->
		    <div class="box-footer">

			  <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-save"></i> <?php echo e(trans('backpack::crud.save')); ?></span></button>
		      <a href="<?php echo e(url($crud->route)); ?>" class="btn btn-default ladda-button" data-style="zoom-in"><span class="ladda-label"><?php echo e(trans('backpack::crud.cancel')); ?></span></a>
		    </div><!-- /.box-footer-->
		  </div><!-- /.box -->
		  <?php echo Form::close(); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backpack::layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>