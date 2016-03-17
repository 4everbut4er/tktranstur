<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CA+ | Convi Admin</title>

    <link href="/admin_static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin_static/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/admin_static/css/animate.css" rel="stylesheet">
    <link href="/admin_static/css/style.css" rel="stylesheet">

    @stack('prejs')
    @stack('precss')

</head>
<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Константин</strong>
                             </span> <span class="text-muted text-xs block">Администратор <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{ url('/logout') }}">Выход</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        CA+
                    </div>
                </li>
                <li {{ Request::is('admin') ? 'class=active' : ''}}>
                    <a href="{{ url('/admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Рабочий стол</span></a>
                </li>
                <li {{ Request::is('admin/services', 'admin/services/*') ? 'class=active' : ''}}>
                    <a href="{{ url('/admin/services') }}"><i class="fa fa-wrench"></i> <span class="nav-label">Услуги</span> </a>
                </li>
                <li {{ Request::is('admin/news', 'admin/news/*') ? 'class=active' : ''}}>
                    <a href="{{ url('/admin/news') }}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Новости</span> </a>
                </li>
                <li {{ Request::is('admin/catalog', 'admin/catalog/*') ? 'class=active' : ''}}>
                    <a href="{{ url('/admin/catalog') }}"><i class="fa fa-bus"></i> <span class="nav-label">Каталог</span> </a>
                </li>
                <li {{ Request::is('admin/review', 'admin/review/*') ? 'class=active' : ''}}>
                    <a href="{{ url('/admin/review') }}"><i class="fa fa-comment-o"></i> <span class="nav-label">Отзывы</span> </a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="{{ url('/logout') }}">
                            <i class="fa fa-sign-out"></i> Выход
                        </a>
                    </li>
                </ul>

            </nav>
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>@yield('title')</h2>
                @yield('breadcrumbs')
            </div>
            <div class="col-lg-2"></div>
        </div>

        @yield('content')

        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> немного тех инфы.
            </div>
            <div>
                <strong>Copyright</strong> Transtur &copy; 2016
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="/admin_static/js/jquery-2.1.1.js"></script>
<script src="/admin_static/js/bootstrap.min.js"></script>
<script src="/admin_static/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/admin_static/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/admin_static/js/inspinia.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $( document ).ajaxStart(function(){
            Pace.restart();
        });
        $( document ).ajaxStop(function(){
            Pace.stop();
        });
    });
</script>
<script src="/admin_static/js/plugins/pace/pace.min.js"></script>

@stack('postjs')
@stack('postcss')


</body>

</html>
