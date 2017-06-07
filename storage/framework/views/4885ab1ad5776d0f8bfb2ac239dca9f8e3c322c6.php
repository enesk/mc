<div class="formBox">
    <div class="row">
        <div class="col-xs-12">
            <div class="formBox_header gray">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>Kontakt
            </div>
        </div>
    </div>
    <div class="formular-part">
        <form id="email-form">
            <?php echo e(csrf_field()); ?>

            <form id="email-form">
                <div class="row mt15">
                    <div class="col-md-4 pr0">
                        <select name="gender" class="selectpicker form-control">
                            <option>Anrede</option>
                            <option value="mrs">Frau</option>
                            <option value="mr">Herr</option>
                        </select>
                    </div>
                </div>
                <div class="row mt15">
                    <div class="col-md-4 pr0">
                        <input type="text" class="form-control formStyle formFaded" name="first_name"
                               placeholder="Vorname"
                               aria-describedby="Vorname">
                    </div>
                    <div class="col-md-4 pr0">
                        <input type="text" class="form-control formStyle formFaded" name="last_name"
                               placeholder="Nachname"
                               aria-describedby="Nachname">
                    </div>
                </div>

                <div class="row mt10">
                    <div class="col-md-8 pr0">
                        <input type="text" class="form-control formStyle formFaded" name="street" placeholder="Srasse"
                               aria-describedby="Strasse">
                    </div>
                </div>

                <div class="row mt10">
                    <div class="col-md-2 pr0">
                        <input type="text" class="form-control formStyle formFaded" name="zipcode" placeholder="PLZ"
                               aria-describedby="PLZ">
                    </div>
                    <div class="col-md-6 pr0">
                        <input type="text" class="form-control formStyle formFaded" name="city" placeholder="Ort"
                               aria-describedby="Ort">
                    </div>
                </div>

                <div class="row mt10">
                    <div class="col-md-4 pr0">
                        <input type="email" class="form-control formStyle formFaded" name="email" placeholder="E-Mail"
                               aria-describedby="E-Mail">
                    </div>
                    <div class="col-md-4 pr0">
                        <input type="text" class="form-control formStyle formFaded" name="tel" placeholder="Telefon"
                               aria-describedby="Telefon">
                    </div>
                </div>

                <div class="row mt10">
                    <div class="col-md-8 pr0">
                <textarea name="message" class="form-control formStyle" rows="4"
                          placeholder="Ihre Nachricht"></textarea>
                    </div>

                </div>
                <div class="row mt10">
                    <div class="col-md-8 pr0 sendForm_action">
                        <button type="submit" class="btn">Senden</button>
                    </div>
                </div>
            </form>
    </div>
    <div class="alert-part">
        <div class="alert-part" style="display: none">
            <div class="alert alert-success">
                Vielen Dank! Wir werden uns umgehend bei Ihnen melden.
            </div>
        </div>
    </div>
</div>

<?php $__env->startSection('afterScripts'); ?>
    <script type="text/javascript">
        $('#email-form').on('submit', function (e) {
            e.preventDefault();
            $.post("<?php echo e(route('email::contact')); ?>", $(this).serialize()).done(function (data) {
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