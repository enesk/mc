<?php $__env->startSection('after_styles'); ?>
	<!-- DATA TABLES -->
    <link href="<?php echo e(asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize"><?php echo e($crud->entity_name_plural); ?></span>
	    <small><?php echo e(trans('backpack::crud.all')); ?> <span class="text-lowercase"><?php echo e($crud->entity_name_plural); ?></span> <?php echo e(trans('backpack::crud.in_the_database')); ?>.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php echo e(url(config('backpack.base.route_prefix'), 'dashboard')); ?>"><?php echo e(trans('backpack::crud.admin')); ?></a></li>
	    <li><a href="<?php echo e(url($crud->route)); ?>" class="text-capitalize"><?php echo e($crud->entity_name_plural); ?></a></li>
	    <li class="active"><?php echo e(trans('backpack::crud.list')); ?></li>
	  </ol>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Default box -->
  <div class="box">
    <div class="box-header <?php echo e($crud->hasAccess('create')?'with-border':''); ?>">

      <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'top'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
    <div class="box-body">

		<table id="crudTable" class="table table-bordered table-striped display">
        <thead>
          <tr>
            <?php if($crud->details_row): ?>
              <th></th> <!-- expand/minimize button column -->
            <?php endif; ?>

            <?php /* Table columns */ ?>
            <?php foreach($crud->columns as $column): ?>
              <th><?php echo e($column['label']); ?></th>
            <?php endforeach; ?>

            <?php if( $crud->buttons->where('stack', 'line') ): ?>
              <th><?php echo e(trans('backpack::crud.actions')); ?></th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>

          <?php if(!$crud->ajaxTable()): ?>
            <?php foreach($entries as $k => $entry): ?>
            <tr data-entry-id="<?php echo e($entry->getKey()); ?>">

              <?php if($crud->details_row): ?>
                <?php echo $__env->make('crud::columns.details_row_button', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php endif; ?>

              <?php /* load the view from the application if it exists, otherwise load the one in the package */ ?>
              <?php foreach($crud->columns as $column): ?>
                <?php if(!isset($column['type'])): ?>
                  <?php echo $__env->make('crud::columns.text', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php else: ?>
                  <?php if(view()->exists('vendor.backpack.crud.columns.'.$column['type'])): ?>
                    <?php echo $__env->make('vendor.backpack.crud.columns.'.$column['type'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <?php else: ?>
                    <?php if(view()->exists('crud::columns.'.$column['type'])): ?>
                      <?php echo $__env->make('crud::columns.'.$column['type'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php else: ?>
                      <?php echo $__env->make('crud::columns.text', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endif; ?>

              <?php endforeach; ?>

              <?php if($crud->buttons->where('stack', 'line')->count()): ?>
                <td>
                  <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'line'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </td>
              <?php endif; ?>

            </tr>
            <?php endforeach; ?>
          <?php endif; ?>

        </tbody>
        <tfoot>
          <tr>
            <?php if($crud->details_row): ?>
              <th></th> <!-- expand/minimize button column -->
            <?php endif; ?>

            <?php /* Table columns */ ?>
            <?php foreach($crud->columns as $column): ?>
              <th><?php echo e($column['label']); ?></th>
            <?php endforeach; ?>

            <?php if( $crud->buttons->where('stack', 'line') ): ?>
              <th><?php echo e(trans('backpack::crud.actions')); ?></th>
            <?php endif; ?>
          </tr>
        </tfoot>
      </table>

    </div><!-- /.box-body -->

    <?php echo $__env->make('crud::inc.button_stack', ['stack' => 'bottom'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </div><!-- /.box -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_scripts'); ?>
	<!-- DATA TABES SCRIPT -->
    <script src="<?php echo e(asset('vendor/adminlte/plugins/datatables/jquery.dataTables.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.js')); ?>" type="text/javascript"></script>

	<script type="text/javascript">
	  jQuery(document).ready(function($) {
	  	var table = $("#crudTable").DataTable({
        "pageLength": <?php echo e($crud->getDefaultPageLength()); ?>,
        "language": {
              "emptyTable":     "<?php echo e(trans('backpack::crud.emptyTable')); ?>",
              "info":           "<?php echo e(trans('backpack::crud.info')); ?>",
              "infoEmpty":      "<?php echo e(trans('backpack::crud.infoEmpty')); ?>",
              "infoFiltered":   "<?php echo e(trans('backpack::crud.infoFiltered')); ?>",
              "infoPostFix":    "<?php echo e(trans('backpack::crud.infoPostFix')); ?>",
              "thousands":      "<?php echo e(trans('backpack::crud.thousands')); ?>",
              "lengthMenu":     "<?php echo e(trans('backpack::crud.lengthMenu')); ?>",
              "loadingRecords": "<?php echo e(trans('backpack::crud.loadingRecords')); ?>",
              "processing":     "<?php echo e(trans('backpack::crud.processing')); ?>",
              "search":         "<?php echo e(trans('backpack::crud.search')); ?>",
              "zeroRecords":    "<?php echo e(trans('backpack::crud.zeroRecords')); ?>",
              "paginate": {
                  "first":      "<?php echo e(trans('backpack::crud.paginate.first')); ?>",
                  "last":       "<?php echo e(trans('backpack::crud.paginate.last')); ?>",
                  "next":       "<?php echo e(trans('backpack::crud.paginate.next')); ?>",
                  "previous":   "<?php echo e(trans('backpack::crud.paginate.previous')); ?>"
              },
              "aria": {
                  "sortAscending":  "<?php echo e(trans('backpack::crud.aria.sortAscending')); ?>",
                  "sortDescending": "<?php echo e(trans('backpack::crud.aria.sortDescending')); ?>"
              }
          },

          <?php if($crud->ajaxTable()): ?>
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "<?php echo e(url($crud->route.'/search')); ?>",
              "type": "POST"
          },
          <?php endif; ?>
      });

      $.ajaxPrefilter(function(options, originalOptions, xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');

          if (token) {
                return xhr.setRequestHeader('X-XSRF-TOKEN', token);
          }
      });

      // make the delete button work in the first result page
      register_delete_button_action();

      // make the delete button work on subsequent result pages
      $('#crudTable').on( 'draw.dt',   function () {
         register_delete_button_action();

         <?php if($crud->details_row): ?>
          register_details_row_button_action();
         <?php endif; ?>
      } ).dataTable();

      function register_delete_button_action() {
        $("[data-button-type=delete]").unbind('click');
        // CRUD Delete
        // ask for confirmation before deleting an item
        $("[data-button-type=delete]").click(function(e) {
          e.preventDefault();
          var delete_button = $(this);
          var delete_url = $(this).attr('href');

          if (confirm("<?php echo e(trans('backpack::crud.delete_confirm')); ?>") == true) {
              $.ajax({
                  url: delete_url,
                  type: 'DELETE',
                  success: function(result) {
                      // Show an alert with the result
                      new PNotify({
                          title: "<?php echo e(trans('backpack::crud.delete_confirmation_title')); ?>",
                          text: "<?php echo e(trans('backpack::crud.delete_confirmation_message')); ?>",
                          type: "success"
                      });
                      // delete the row from the table
                      delete_button.parentsUntil('tr').parent().remove();
                  },
                  error: function(result) {
                      // Show an alert with the result
                      new PNotify({
                          title: "<?php echo e(trans('backpack::crud.delete_confirmation_not_title')); ?>",
                          text: "<?php echo e(trans('backpack::crud.delete_confirmation_not_message')); ?>",
                          type: "warning"
                      });
                  }
              });
          } else {
              new PNotify({
                  title: "<?php echo e(trans('backpack::crud.delete_confirmation_not_deleted_title')); ?>",
                  text: "<?php echo e(trans('backpack::crud.delete_confirmation_not_deleted_message')); ?>",
                  type: "info"
              });
          }
        });
      }


      <?php if($crud->details_row): ?>
      function register_details_row_button_action() {
        // Add event listener for opening and closing details
        $('#crudTable tbody').on('click', 'td .details-row-button', function () {
            var tr = $(this).closest('tr');
            var btn = $(this);
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                $(this).children('i').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
                $('div.table_row_slider', row.child()).slideUp( function () {
                    row.child.hide();
                    tr.removeClass('shown');
                } );
            }
            else {
                // Open this row
                $(this).children('i').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
                // Get the details with ajax
                $.ajax({
                  url: '<?php echo e(Request::url()); ?>/'+btn.data('entry-id')+'/details',
                  type: 'GET',
                  // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                  // data: {param1: 'value1'},
                })
                .done(function(data) {
                  // console.log("-- success getting table extra details row with AJAX");
                  row.child("<div class='table_row_slider'>" + data + "</div>", 'no-padding').show();
                  tr.addClass('shown');
                  $('div.table_row_slider', row.child()).slideDown();
                  register_delete_button_action();
                })
                .fail(function(data) {
                  // console.log("-- error getting table extra details row with AJAX");
                  row.child("<div class='table_row_slider'><?php echo e(trans('backpack::crud.details_row_loading_error')); ?></div>").show();
                  tr.addClass('shown');
                  $('div.table_row_slider', row.child()).slideDown();
                })
                .always(function(data) {
                  // console.log("-- complete getting table extra details row with AJAX");
                });
            }
        } );
      }

      register_details_row_button_action();
      <?php endif; ?>


	  });
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backpack::layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>