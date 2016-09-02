<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <meta name="description" content="description">
    <meta name="keywords" content="keywords">
    <meta name="author" content="flexwork team // fxw.io - productivity matters!">

    <link rel="shortcut icon" href="image/favicon.png">

    <title>Verkauf</title>

    {{ Asset::queue('bootstrap', 'css/bootstrap.min.css') }}
    {{ Asset::queue('slick', 'css/slick.css') }}
    {{ Asset::queue('datepicker', 'css/datepicker.css') }}
    {{ Asset::queue('bootstrap-select', 'css/bootstrap-select.css') }}
    {{ Asset::queue('rangeSlider', 'css/ion.rangeSlider.css') }}
    {{ Asset::queue('rangeSlider-skin', 'css/ion.rangeSlider.skinNice.css') }}
    {{ Asset::queue('helpers', 'css/helpers.css') }}
    {{ Asset::queue('bootstrapValidator', 'css/bootstrapValidator.min.css') }}
    {{ Asset::queue('fa', 'css/font-awesome.min.css') }}
    {{ Asset::queue('app', 'scss/app.scss') }}
    {{ Asset::queue('responsive', 'css/responsive.css') }}

    @foreach (Asset::getCompiledStyles() as $style)
        <link href="{{ $style }}" rel="stylesheet">
    @endforeach

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,700" rel="stylesheet" type="text/css">

</head>
<body>
@include('partials.headers.header')
@yield('content')
@include('partials.footers.footer')
<!-- main -->
<!-- footer -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
{{ Asset::queue('js-bs', 'js/bootstrap/bootstrap.min.js') }}
{{ Asset::queue('js-bs-validator', 'js/bootstrap-validator/bootstrapValidator.min.js') }}
{{ Asset::queue('js-bs-datepicker', 'js/datetimepicker/bootstrap-datepicker.js') }}
{{ Asset::queue('js-bs-select', 'js/bootstrap-select/bootstrap-select.min.js') }}
{{ Asset::queue('js-slick', 'js/slick/slick.min.js') }}
{{ Asset::queue('js-rangeSlider', 'js/ionRangeSlider/ion.rangeSlider.min.js') }}
{{ Asset::queue('js-functions', 'js/functions.js') }}

@yield('beforeScripts')
@foreach (Asset::getCompiledScripts() as $script)
    <script src="{{ $script }}"></script>
@endforeach
@yield('afterScripts')
</body>
</html>
