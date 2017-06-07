<!-- select2 -->
<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >
    <label><?php echo e($field['label']); ?></label>
    <?php $entity_model = $crud->getModel();?>
    <div class="row">
        <?php foreach($field['model']::all() as $connected_entity_entry): ?>
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"
                               name="<?php echo e($field['name']); ?>[]"
                               value="<?php echo e($connected_entity_entry->id); ?>"
                        <?php
                                if (isset($entry) && json_decode($entry->specifics)):
                                    $results = array_filter(json_decode($entry->specifics), function ($specific) use ($connected_entity_entry) {
                                        return $specific == $connected_entity_entry->id;
                                    });
                                    if (!empty($results)): echo 'checked="checked"'; endif;
                                endif;
                        ?>
                        > <?php echo e($connected_entity_entry->{$field['attribute']}); ?>

                    </label>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>