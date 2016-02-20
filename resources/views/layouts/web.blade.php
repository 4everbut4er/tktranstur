<!DOCTYPE html>
<!--[if lt IE 9]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if !IE] -->
<html lang='ru'>
<!-- <![endif] -->
<head>
    <title>Транстур | Транспортная компания - заказа автобусов, аренда спецтехники</title>
    <meta content='keywords' name='keywords'>
    <meta content='description' name='description'>
    <meta content='itsmybusiness.ru' name='author'>
    <meta content='all' name='robots'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta content='width=device-width, initial-scale=1.0' name='viewport'>
    <!--[if IE]> <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <![endif]-->
    <link href='/static/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <!-- Не знаю надо ли TODO делать в последнюю очередь -->
    <link href='/static/images/meta_icons/apple-touch-icon.png' rel='apple-touch-icon-precomposed'>
    <!-- / required stylesheets -->
    <link href="/static/stylesheets/bootstrap/bootstrap.min.css" media="all" id="bootstrap" rel="stylesheet" type="text/css" />
    <!-- Можно выбрать основной цвет -->
    <link href="/static/stylesheets/jednotka_blue.css" media="all" id="colors" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script src="/static/javascripts/ie/html5shiv.js" type="text/javascript"></script>
    <script src="/static/javascripts/ie/respond.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body class='homepage black-and-white'>
<div id='wrapper'>
    @include('elements.header')

    @yield('content')

    @include('elements.footer')
</div>
<!-- / required javascripts -->
<script src="/static/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
<script src="/static/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
<script src="/static/javascripts/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/modernizr/modernizr.custom.min.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/hover_dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/retina/retina.min.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/knob/jquery.knob.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/isotope/jquery.isotope.min.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/isotope/jquery.isotope.sloppy-masonry.min.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/flexslider/jquery.flexslider.min.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/countdown/countdown.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/nivo_lightbox/nivo-lightbox.min.js" type="text/javascript"></script>
<script src="/static/javascripts/plugins/cycle/jquery.cycle.all.min.js" type="text/javascript"></script>
<script src="/static/javascripts/jednotka.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

</body>
</html>