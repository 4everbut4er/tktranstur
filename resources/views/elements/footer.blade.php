<footer id='footer'>
    <div id='footer-main'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 col-sm-6 info-box'>
                    <h2 class='title'>Контакты</h2>
                    <ul class='list-unstyled'>
                        <li>УР, Ижевск</li>
                        <li>ул. Маяковского 11</li>
                        <li>почтовый индекс: 426000</li>
                    </ul>
                    <p class='no-mg-b'><a href="{{ route('contact') }}#map-canvas">Смотреть на карте</a></p>
                    <br>
                    <ul class='list-unstyled'>
                        <li><i class='fa fa-bus'></i> Заказ автобусов</li>
                        <li><a title="Заказ автобусов" href="tel:+073412676667">+7 (3412) 67-66-67</a></li>
                        <li><a title="Заказ автобусов" href="tel:+073412615316">+7 (3412) 61-53-16</a></li>
                        <li><i class='fa fa-truck'></i> Заказ спецтехники</li>
                        <li><a title="Заказ спецтехники" href="tel:+073412614777">+7 (3412) 61-47-77</a></li>
                        <li><a title="Заказ спецтехники" href="tel:+079128589911">+7 (912) 858-99-11</a></li>
                    </ul>
                </div>
                <div class='col-md-3 col-sm-6 info-box social-box'>
                    <h2 class='title'>Последние новости</h2>
                    <div class='icon-boxes'>
                        @foreach($last_news as $news)
                            <div class='icon-box'>
                                <div class='icon icon-wrap'>
                                    <i class='fa fa-newspaper-o text-contrast'></i>
                                </div>
                                <div class='content'>
                                    <p>
                                        {{ $news['title'] }}
                                        <br>
                                        <a class='time' href='{{ route('news.detail', $news['id']) }}'>
                                            <i>{{ $news['created_at'] }}</i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class='col-md-3 col-sm-6 button-cloud-box'>
                    <h2 class='title'>Режим работы</h2>
                    <ul class='list-unstyled list-padded'>
                        <li>
                            <i class='fa fa-clock-o text-contrast'></i>
                            Пн - Пт
                            &mdash;
                            <strong>08:30 - 17:00</strong>
                        </li>
                        <li>
                            <i class='fa fa-clock-o text-contrast'></i>
                            Суббота
                            &mdash;
                            <strong>Выходной</strong>
                        </li>
                        <li>
                            <i class='fa fa-clock-o text-contrast'></i>
                            Воскресенье
                            &mdash;
                            <strong>Выходной</strong>
                        </li>
                    </ul>
                </div>
                <div class='col-md-3 col-sm-6 info-box'>
                    <h2 class='title'>Полезные ссылки</h2>
                    <ul class='list-unstyled list-padded'>
                        <li>
                            <i class='fa fa-angle-right fa fa-fixed-width text-contrast'></i>
                            <a href="#">Каталог автобусов</a>
                        </li>
                        <li>
                            <i class='fa fa-angle-right fa fa-fixed-width text-contrast'></i>
                            <a href="#">Каталог спецтехники</a>
                        </li>
                        <li>
                            <i class='fa fa-angle-right fa fa-fixed-width text-contrast'></i>
                            <a href="#">Автобусы для свадьбы</a>
                        </li>
                        <li>
                            <i class='fa fa-angle-right fa fa-fixed-width text-contrast'></i>
                            <a href="#">Автобус для трансферов</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id='footer-copyright'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12 clearfix'>
                    <p class='copyright'>
                        Copyright
                        &copy;
                        2016 Convi
                    </p>
                    <div class='links'>
                        <a class='btn btn-circle btn-medium-light btn-sm' href='#'>
                            <i class='fa fa-vk text-dark'></i>
                        </a>
                        <a class='btn btn-circle btn-medium-light btn-sm' href='#'>
                            <i class='fa fa-facebook text-dark'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>