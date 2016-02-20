@extends('layouts.web')

@section('content')
    <div id='main' role='main'>
        <!-- / carousel image -->
        <div class='hero-carousel carousel-image carousel-image-pagination carousel-image-arrows flexslider' id='carousel-example-2'>
            <ul class='slides'>
                <li class='item'>
                    <div class='container'>
                        <div class='row pos-rel'>
                            <div class='col-sm-12 col-md-8 animate'>
                                <h1 class='big fadeInDownBig animated'>Заказ автобуса</h1>
                                <p class='normal fadeInUpBig animated'>ТК "Транстур" обладает большим парком туристических автобусов и микроавтобусов.</p>
                                <a class='btn btn-bordered btn-white btn-lg fadeInRightBig animated' href='#'>
                                    Читать далее
                                </a>
                            </div>
                            <div class='col-sm-4 animate pos-sta hidden-xs hidden-sm'>
                                <img class="img-responsive fadeInUpBig animated" style="position:absolute;bottom:35px;right:15px;" alt="Автобус" width="410" height="370" src="/static/images/buss-main2.png" />
                            </div>
                        </div>
                    </div>
                </li>
                <li class='item'>
                    <div class='container'>
                        <div class='row pos-rel'>
                            <div class='col-sm-12 col-md-8 animate'>
                                <h2 class='big fadeInLeftBig animated'>Заказ спецтехники</h2>
                                <p class='normal fadeInRightBig animated'>Аренда строительной и дорожной спецтехники на любой срок.</p>
                                <a class='btn btn-bordered btn-white btn-lg fadeInUpBig animated' href='#'>
                                    Читать далее
                                </a>
                            </div>
                            <div class='col-sm-4 animate pos-sta hidden-xs hidden-sm'>
                                <img class="img-responsive fadeInUpBig animated" style="position:absolute;bottom:35px;right:15px;" alt="Экскаватор" width="410" height="370" src="/static/images/exc-main.png" />
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div id='main-content'>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <p class='lead text-center'>Заказ автобусов и аренда спецтехники осуществляется по телефону <b>+7 (3412) 67-66-67</b>.</p>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='page-header page-header-with-icon'>
                            <i class='fa fa-bus'></i>
                            <h2>
                                Автобусный парк
                                <small>Наиболее популярные автобусы в парке.</small>
                            </h2>
                        </div>
                        <div class='row portfolio-boxes'>
                            <div class='col-sm-3 col-xs-6 no-mb-t-xs portfolio-box'>
                                <a href='#'>
                                    <div class='image-link'>
                                        <i class='fa fa-link'></i>
                                        <img class="img-responsive img-rounded center-block" alt="Toyota Hiace" width="262" height="262" src="/static/images/toyota_hiace_norm.jpg" />
                                    </div>
                                    <h3 class='title'>Toyota Hiace</h3>
                                    <p class='category'>15 посадочных мест</p>
                                </a>
                            </div>
                            <div class='col-sm-3 col-xs-6 no-mb-t-xs portfolio-box'>
                                <a href='#'>
                                    <div class='image-link'>
                                        <i class='fa fa-link'></i>
                                        <img class="img-responsive img-rounded center-block" alt="Mercedes" width="262" height="262" src="/static/images/mercedes_norm.jpg" />
                                    </div>
                                    <h3 class='title'>Mercedes</h3>
                                    <p class='category'>48 посадочных мест</p>
                                </a>
                            </div>
                            <div class='col-sm-3 col-xs-6 portfolio-box'>
                                <a href='#'>
                                    <div class='image-link'>
                                        <i class='fa fa-link'></i>
                                        <img class="img-responsive img-rounded center-block" alt="Toyota Hiace" width="262" height="262" src="/static/images/toyota_hiace_norm.jpg" />
                                    </div>
                                    <h3 class='title'>Toyota Hiace</h3>
                                    <p class='category'>15 посадочных мест</p>
                                </a>
                            </div>
                            <div class='col-sm-3 col-xs-6 portfolio-box'>
                                <a href='#'>
                                    <div class='image-link'>
                                        <i class='fa fa-link'></i>
                                        <img class="img-responsive img-rounded center-block" alt="Mercedes" width="262" height="262" src="/static/images/mercedes_norm.jpg" />
                                    </div>
                                    <h3 class='title'>Mercedes</h3>
                                    <p class='category'>48 посадочных мест</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='page-header page-header-with-icon'>
                            <i class='fa fa-truck'></i>
                            <h2>
                                Парк спецтехники
                                <small>Наиболее популярная спецтехника в парке.</small>
                            </h2>
                        </div>
                        <div class='row portfolio-boxes'>
                            <div class='col-sm-3 col-xs-6 no-mb-t-xs portfolio-box'>
                                <a href='#'>
                                    <div class='image-link'>
                                        <i class='fa fa-link'></i>
                                        <img class="img-responsive img-rounded center-block" alt="Etiam vestibulum" width="262" height="262" src="/static/images/betonomeshalka_norm.jpg" />
                                    </div>
                                    <h3 class='title'>Автобетоносмеситель</h3>
                                    <p class='category'>1 000 руб/час</p>
                                </a>
                            </div>
                            <div class='col-sm-3 col-xs-6 no-mb-t-xs portfolio-box'>
                                <a href='#'>
                                    <div class='image-link'>
                                        <i class='fa fa-link'></i>
                                        <img class="img-responsive img-rounded center-block" alt="Malesuada" width="262" height="262" src="/static/images/manip_norm.jpg" />
                                    </div>
                                    <h3 class='title'>Манипулятор 3 тонны</h3>
                                    <p class='category'>1 200 руб/час</p>
                                </a>
                            </div>
                            <div class='col-sm-3 col-xs-6 no-mb-t-xs portfolio-box'>
                                <a href='#'>
                                    <div class='image-link'>
                                        <i class='fa fa-link'></i>
                                        <img class="img-responsive img-rounded center-block" alt="Etiam vestibulum" width="262" height="262" src="/static/images/betonomeshalka_norm.jpg" />
                                    </div>
                                    <h3 class='title'>Автобетоносмеситель</h3>
                                    <p class='category'>1 000 руб/час</p>
                                </a>
                            </div>
                            <div class='col-sm-3 col-xs-6 no-mb-t-xs portfolio-box'>
                                <a href='#'>
                                    <div class='image-link'>
                                        <i class='fa fa-link'></i>
                                        <img class="img-responsive img-rounded center-block" alt="Malesuada" width="262" height="262" src="/static/images/manip_norm.jpg" />
                                    </div>
                                    <h3 class='title'>Манипулятор 3 тонны</h3>
                                    <p class='category'>1 200 руб/час</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='page-header page-header-with-icon'>
                            <i class='fa fa-quote-right'></i>
                            <h2>Отзывы</h2>
                        </div>
                        <div class='row quotes'>
                            <div class='carousel carousel-default slide carousel-auto' id='carousel-testimonials'>
                                <div class='carousel-inner'>
                                    <div class='item active quote'>
                                        <div class='col-sm-12 text-center'>
                                            <p class='lead'>
                                                Хотим выразить благодарность водителю Владимиру, номер автобуса 702! Хорошее вождение, своевременное прибытие в обе стороны! Будем рады видеть его и в других поездках!</p>
                                            <div class='author-wrapper'>
                                                <p class='author'>
                                                    <strong>Анна Владимировна</strong>,
                                                    Лицей № 65
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='item quote'>
                                        <div class='col-sm-12 text-center'>
                                            <p class='lead'>
                                                Выражаем огромную благодарность компании "Транстур" и лично нашим водителям Владимиру и Андрею за прекрасную работу. Заказывали автобусы впервые и ничуть не пожалели, что выбрали именно вашу компанию.</p>
                                            <div class='author-wrapper'>
                                                <p class='author'>
                                                    <strong>Надежда Адаменко</strong>,
                                                    Концерн "Калашников"
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ol class='carousel-indicators'>
                                    <li class='active' data-slide-to='0' data-target='#carousel-testimonials'></li>
                                    <li data-slide-to='1' data-target='#carousel-testimonials'></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='page-header page-header-with-icon'>
                            <i class='fa fa-certificate'></i>
                            <h2>
                                Наши клиенты
                                <small>Компания «Транстур» дорожит КАЖДЫМ КЛИЕНТОМ! Мы уважаем Ваш бизнес и рады, что «Транстур» имеет честь помогать вести Вашу компанию в мире перевозок!</small>
                            </h2>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='client-slideshow cycle-slideshow' data-cycle-carousel-fluid='true' data-cycle-fx='carousel' data-cycle-timeout='2000'>
                                    <img alt="" width="73" height="33" src="/static/images/logo_bars.jpg" />
                                    <img alt="" width="94" height="33" src="/static/images/logo_block.jpg" />
                                    <img alt="" width="205" height="33" src="/static/images/logo_kalash.jpg" />
                                    <img alt="" width="62" height="33" src="/static/images/logo_kupol.jpg" />
                                    <img alt="" width="73" height="33" src="/static/images/logo_bars.jpg" />
                                    <img alt="" width="94" height="33" src="/static/images/logo_block.jpg" />
                                    <img alt="" width="205" height="33" src="/static/images/logo_kalash.jpg" />
                                    <img alt="" width="62" height="33" src="/static/images/logo_kupol.jpg" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='fade' id='scroll-to-top'>
            <i class='fa fa-chevron-up'></i>
        </div>
    </div>
@endsection
