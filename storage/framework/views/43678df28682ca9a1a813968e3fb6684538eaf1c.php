Hallo,

Sie haben eine Nachricht:

<hr />

Von: <?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?><br />
E-Mail: <?php echo e($data->email); ?><br />
Telefon: <?php echo e($data->tel); ?>


<hr />

<?php echo e($data->message); ?>