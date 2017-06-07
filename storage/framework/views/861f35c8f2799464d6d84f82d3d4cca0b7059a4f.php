<td>
    <?php echo e(\Modules\Rental\Models\Station::find($entry->{$column['name']})->name); ?> -
    <?php echo e(\Modules\Rental\Models\Station::find($entry->{$column['name']})->city); ?>

</td>