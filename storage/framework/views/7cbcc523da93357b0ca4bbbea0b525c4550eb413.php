<!-- field_type_name -->
<div class="form-group col-md-12">
    <h3>Öffnungszeiten</h3>
    <?php if(isset($entry) && $entry->openings): ?>
        <?php foreach($field['openings'] as $key => $opening): ?>
            <h4><?php echo e($opening['name']); ?></h4>
            <div class="row">
                <div class="col-md-6">
                    <label>Geöffnet</label>
                    <input name="openings[opening][<?php echo e($key); ?>]" value="<?php echo e(json_decode($entry->openings)->openings->$key); ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Geschlossen</label>
                    <input name="openings[closing][<?php echo e($key); ?>]" value="<?php echo e(json_decode($entry->openings)->closings->$key); ?>" class="form-control">
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <?php foreach($field['openings'] as $key => $opening): ?>

            <h4><?php echo e($opening['name']); ?></h4>
            <div class="row">
                <div class="col-md-6">
                    <label>Geöffnet</label>
                    <input name="openings[opening][<?php echo e($key); ?>]" value="" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Geschlossen</label>
                    <input name="openings[closing][<?php echo e($key); ?>]" value="" class="form-control">
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
</div>


<?php if($crud->checkIfFieldIsFirstOfItsType($field, $fields)): ?>
    <?php /* FIELD EXTRA CSS  */ ?>
    <?php /* push things in the after_styles section */ ?>

    <?php $__env->startPush('crud_fields_styles'); ?>
    <!-- no styles -->
    <?php $__env->stopPush(); ?>


    <?php /* FIELD EXTRA JS */ ?>
    <?php /* push things in the after_scripts section */ ?>

    <?php $__env->startPush('crud_fields_scripts'); ?>
    <!-- no scripts -->
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php /* Note: most of the times you'll want to use <?php if($crud->checkIfFieldIsFirstOfItsType($field, $fields)): ?> to only load CSS/JS once, even though there are multiple instances of it. */ ?>