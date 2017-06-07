<?php if($crud->hasAccess('update')): ?>
	<a href="<?php echo e(url($crud->route.'/'.$entry->getKey().'/edit')); ?>" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> <?php echo e(trans('backpack::crud.edit')); ?></a>
<?php endif; ?>