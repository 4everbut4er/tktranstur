@extends('layouts.web')

@section('body_classes', 'contact-page contact-page-wide-map')

@section('content')
    <div id='main' role='main'>

        <div id='main-content-header'>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <h1 class='title'>
                            Контакты
                        </h1>
                        <ol class='breadcrumb'>
                            <li>
                                <a href='{{ url('/') }}'>
                                    <i class='fa fa-home'></i>
                                </a>
                            </li>
                            <li class='active'>Контакты</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div id='main-content'>
            <div id='map-canvas'></div>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='page-header page-header-with-icon'>
                            <i class='fa fa-info-circle'></i>
                            <h2>
                                Информация для связи
                            </h2>
                        </div>
                        <div class='row text-center'>
                            <div class='col-sm-3'>
                                <div class='icon-wrap icon-circle contrast-bg icon-md'>
                                    <i class='fa fa-map-marker text-white'></i>
                                </div>
                                <h3>Адрес</h3>
                                <ul class='list-unstyled'>
                                    <li>УР, Ижевск</li>
                                    <li>ул. Маяковского 11</li>
                                    <li>почтовый индекс: 426000</li>
                                </ul>
                            </div>
                            <div class='col-sm-3'>
                                <div class='icon-wrap icon-circle contrast-bg icon-md'>
                                    <i class='fa fa-phone text-white'></i>
                                </div>
                                <h3>Телефоны</h3>
                                <ul class='list-unstyled'>
                                    <li><i class='fa fa-bus'></i> Заказ автобусов</li>
                                    <li><a title="Заказ автобусов" href="tel:+073412676667">+7 (3412) 67-66-67</a></li>
                                    <li><a title="Заказ автобусов" href="tel:+073412614777">+7 (3412) 61-47-77</a></li>
                                    <li><i class='fa fa-truck'></i> Заказ спецтехники</li>
                                    <li><a title="Заказ спецтехники" href="tel:+073412552010">+7 (3412) 55-20-10</a></li>
                                    <li><a title="Заказ спецтехники" href="tel:+073412614777">+7 (3412) 61-47-77</a></li>
                                    <li><i class='fa fa-plus-square'></i> Ремонт грузовых автомобилей</li>
                                    <li><a title="Ремонт грузовых автомобилей" href="tel:+079128589911">+7 (912) 858-99-11</a></li>
                                    <li><a title="Ремонт грузовых автомобилей" href="tel:+073412614777">+7 (3412) 61-47-77</a></li>
                                </ul>
                            </div>
                            <div class='col-sm-3'>
                                <div class='icon-wrap icon-circle contrast-bg icon-md'>
                                    <i class='fa fa-envelope-o text-white'></i>
                                </div>
                                <h3>E-Mail</h3>
                                <ul class='list-unstyled'>
                                    <li><a href="mailto:transtur18@yandex.ru">transtur18@yandex.ru</a></li>
                                    <li><a href="mailto:79058763552@yandex.ru">79058763552@yandex.ru</a></li>
                                    <li><a href="mailto:elena-b.69@mail.ru">elena-b.69@mail.ru</a></li>
                                </ul>
                            </div>
                            <div class='col-sm-3'>
                                <div class='icon-wrap icon-circle contrast-bg icon-md'>
                                    <i class='fa fa-clock-o text-white'></i>
                                </div>
                                <h3>Режим работы</h3>
                                <ul class='list-unstyled'>
                                    <li>
                                        Пн - Пт
                                        &mdash;
                                        <strong>08:30 - 17:00</strong>
                                    </li>
                                    <li>
                                        Суббота
                                        &mdash;
                                        <strong>Выходной</strong>
                                    </li>
                                    <li>
                                        Воскресенье
                                        &mdash;
                                        <strong>Выходной</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row' id="feedback">
                    <div class='col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2'>
                        <div class='page-header page-header-with-icon'>
                            <i class='fa fa-envelope'></i>
                            <h2>Свяжитесь с нами</h2>
                        </div>
                        <form class='form form-validation form-contact' method='post' action="{{ route('feedback') }}">
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='alert alert-success form-contact-success hidden'>Спасибо! Ваше сообщение отправлено!</div>
                                    <div class='alert alert-danger form-contact-error hidden'>Внимание! Произошла ошибка, сообщение не отправлено.</div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <div class='form-group control-group'>
                                        <input class='form-control' data-rule-required='true' name='name' placeholder='Имя' type='text'>
                                        <!-- / this field is required for simple anti spam function, don't remove it! -->
                                        <input class='form-control' name='human' placeholder='Are you human?' style='display: none;' type='text'>
                                    </div>
                                </div>
                                <div class='col-sm-6'>
                                    <div class='form-group control-group'>
                                        <input class='form-control' data-rule-required='true' name='email' placeholder='Телефон' type='text'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='form-group control-group'>
                                        <textarea class='form-control' data-rule-required='true' name='message' placeholder='Ваше сообщение...'></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <button class='btn btn-contrast btn-block form-contact-submit' data-loading-text="&lt;i class='fa fa-refresh fa-spin'&gt;&lt;/i&gt; Отправить..." type='submit'>
                                        Отправить сообщение
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class='fade' id='scroll-to-top'>
            <i class='fa fa-chevron-up'></i>
        </div>
    </div>
@endsection

@section('content')
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script>
        var initializeMap;

        initializeMap = function() {
            var iw1, latlng, map, marker, options;

            latlng = new google.maps.LatLng(56.828478, 53.200273);
            options = {
                scrollwheel: false,
                zoom: 16,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true
            };

            map = new google.maps.Map(document.getElementById("map-canvas"), options);

            marker = new google.maps.Marker({
                position: latlng,
                map: map
            });

            iw1 = new google.maps.InfoWindow({
                content: "Here we are!"
            });

            return google.maps.event.addListener(marker, "click", function(e) {
                return iw1.open(map, this);
            });
        };

        google.maps.event.addDomListener(window, 'load', initializeMap);
    </script>
@endsection