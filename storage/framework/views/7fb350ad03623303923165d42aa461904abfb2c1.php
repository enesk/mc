<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="author" content="widimedia">
    <link rel="shortcut icon" href="image/favicon.png">
    <title>Millenium Cars GmbH <?php if(isset($page)): ?>-  <?php echo e($page->title); ?> <?php endif; ?></title>
    <?php echo e(Asset::queue('bootstrap', 'css/bootstrap.min.css')); ?>

    <?php echo e(Asset::queue('slick', 'css/slick.css')); ?>

    <?php echo e(Asset::queue('datepicker', 'css/datepicker.css')); ?>

    <?php echo e(Asset::queue('bootstrap-select', 'css/bootstrap-select.css')); ?>

    <?php echo e(Asset::queue('rangeSlider', 'css/ion.rangeSlider.css')); ?>

    <?php echo e(Asset::queue('rangeSlider-skin', 'css/ion.rangeSlider.skinNice.css')); ?>

    <?php echo e(Asset::queue('helpers', 'css/helpers.css')); ?>

    <?php echo e(Asset::queue('bootstrapValidator', 'css/bootstrapValidator.min.css')); ?>

    <?php echo e(Asset::queue('fa', 'css/font-awesome.min.css')); ?>

    <?php echo e(Asset::queue('app', 'scss/app.scss')); ?>

    <?php echo e(Asset::queue('responsive', 'css/responsive.css')); ?>

    <?php foreach(Asset::getCompiledStyles() as $style): ?>
        <link href="<?php echo e($style); ?>" rel="stylesheet">
    <?php endforeach; ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,700" rel="stylesheet" type="text/css">
    <meta name="google-site-verification" content="N-mz1ajAu4WuokNqf86TMLjsUG5KtMwgY9Tc9EDfuH0" />
</head>
<body>
<?php echo $__env->make('partials.headers.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('partials.footers.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- main -->
<!-- footer -->

<?php echo e(Asset::queue('js-jquery', 'js/jquery/min.js')); ?>

<?php echo e(Asset::queue('js-ui', 'js/jquery/ui.js')); ?>

<?php echo e(Asset::queue('js-bs', 'js/bootstrap/bootstrap.min.js')); ?>

<?php echo e(Asset::queue('js-bs-validator', 'js/bootstrap-validator/bootstrapValidator.min.js')); ?>

<?php echo e(Asset::queue('js-calender-moment', 'js/moment/min.js')); ?>

<?php echo e(Asset::queue('js-bs-datepicker', 'js/datetimepicker/bootstrap-datepicker.js')); ?>

<?php echo e(Asset::queue('js-bs-select', 'js/bootstrap-select/bootstrap-select.min.js')); ?>

<?php echo e(Asset::queue('js-slick', 'js/slick/slick.min.js')); ?>

<?php echo e(Asset::queue('js-rangeSlider', 'js/ionRangeSlider/ion.rangeSlider.min.js')); ?>

<?php echo e(Asset::queue('js-calender-german', 'js/datetimepicker/german.js')); ?>

<?php echo e(Asset::queue('js-reservation', 'js/datetimepicker/reservation.js')); ?>

<?php echo e(Asset::queue('js-functions', 'js/functions.js')); ?>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-70087926-4', 'auto');
    ga('send', 'pageview');

</script>
<?php echo $__env->yieldContent('beforeScripts'); ?>
<?php foreach(Asset::getCompiledScripts() as $script): ?>
    <script src="<?php echo e($script); ?>"></script>
<?php endforeach; ?>
<?php echo $__env->yieldContent('afterScripts'); ?>
</body>
</html>
