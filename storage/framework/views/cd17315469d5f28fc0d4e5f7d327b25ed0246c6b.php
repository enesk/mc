<form id="email-form">
    <?php echo e(csrf_field()); ?>

    <div class="modal fade" id="email-modal" tabindex="-1" role="dialog" aria-labelledby="email-modal-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Kontaktaufnahme</h4>
                </div>
                <div class="modal-body">
                    <div class="alert-part" style="display: none">
                        <div class="alert alert-success">
                            Vielen Dank! Wir werden uns umgehend bei Ihnen melden.
                        </div>
                    </div>
                    <div class="formular-part">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Vorname</label>
                                    <input name="first_name" class="form-control" id="exampleInputEmail3" placeholder="Vorname">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Nachname</label>
                                    <input name="last_name" class="form-control" id="exampleInputEmail3" placeholder="Nachname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">E-Mail</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="E-Mail-Adresse">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail3">Telefon</label>
                                    <input type="text" name="tel" class="form-control" id="exampleInputEmail3" placeholder="Telefon">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                        <textarea class="form-control" rows="10" name="message">
Sehr geehrte Damen und Herren,

ich interessiere mich für folgendes Fahrzeug. Bitte nehmen Sie Kontakt zu mir auf.

<?php echo e($car->company->name); ?> - <?php echo e($car->title); ?>

<?php echo e(Request::url()); ?>


Vielen Dank!
                        </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="email-form-buttons">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>
                        <button type="submit" class="btn btn-primary">Senden</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $__env->startSection('afterScripts'); ?>
    <script type="text/javascript">
        $('#email-form').on('submit', function (e) {
            e.preventDefault();
            $.post("<?php echo e(route('email::interested')); ?>", $(this).serialize()).done(function(data) {
                $('.formular-part').slideUp();
                $('.email-form-buttons').slideUp();
                $('.alert-part').show();
            });
        });
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    </script>
<?php $__env->stopSection(); ?>