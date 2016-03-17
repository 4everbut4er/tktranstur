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
                        <p class='lead text-center'>Заказ автобусов осуществляется по телефону <b>+7 (3412) 67-66-67</b></p>
                        <p class='lead text-center'>Аренда спецтехники осуществляется по телефону <b>+7 (3412) 55-20-10</b></p>
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
                            @if(!empty($buses))
                                @foreach($buses as $bus)
                                    <div class='col-sm-3 col-xs-6 no-mb-t-xs portfolio-box'>
                                        <a href='{{ route('catalog.bus.detail', $bus['id']) }}'>
                                            @if(!empty($bus['photos'][0]['file']))
                                                <div class='image-link'>
                                                    <i class='fa fa-search'></i>
                                                    <img class="img-responsive img-rounded center-block" alt="{{ $bus['maker'] }} {{ $bus['name'] }}" width="262" height="262" src="/s/s/photo/{{ $bus['photos'][0]['file'] }}" />
                                                </div>
                                            @else
                                                <div class='image-link'>
                                                    <i class='fa fa-search'></i>
                                                    <img class="img-responsive img-rounded center-block" alt="no photo" width="262" height="262" src="http://placehold.it/262x262" />
                                                </div>
                                            @endif
                                            <h3 class='title'>{{ $bus['maker'] }} {{ $bus['name'] }}</h3>
                                            <p class='category'>{{ (int)$bus['t']['capacity'] }} посадочных мест</p>
                                            <p class='category'><b>{{ number_format($bus['price_hourly'], 2) }} руб/час</b></p>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
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
                            @if(!empty($techs))
                                @foreach($techs as $tech)
                                    <div class='col-sm-3 portfolio-box portfolio-filter-{{ str_replace('App\\', '', $tech['tech_type']) }} portfolio-item'>
                                        <a href='{{ route('catalog.truck.detail', $tech['id']) }}'>
                                            @if(!empty($tech['photos'][0]['file']))
                                                <div class='image-link'>
                                                    <i class='fa fa-search'></i>
                                                    <img class="img-responsive img-rounded center-block" alt="{{ $tech['name'] }}" width="262" height="262" src="/s/s/photo/{{ $tech['photos'][0]['file'] }}" />
                                                </div>
                                            @else
                                                <div class='image-link'>
                                                    <i class='fa fa-search'></i>
                                                    <img class="img-responsive img-rounded center-block" alt="no photo" width="262" height="262" src="http://placehold.it/262x262" />
                                                </div>
                                            @endif
                                            <h3 class='title'>{{ $tech['name'] }} {{ $tech['maker'] }}</h3>
                                            <p class='category'>{{ $types[str_replace('App\\', '', $tech['tech_type'])] }}</p>
                                            <p class='category'><b>{{ number_format($tech['price_hourly'], 2) }} руб/час</b></p>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                @if(!$reviews->isEmpty())
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='page-header page-header-with-icon'>
                            <i class='fa fa-quote-right'></i>
                            <h2>Отзывы</h2>
                        </div>
                        <div class='row quotes'>
                            <div class='carousel carousel-default slide carousel-auto' id='carousel-testimonials'>
                                <div class='carousel-inner'>
                                    @foreach($reviews as $i => $review)
                                        <div class='item {{ $i > 0 ? '' : 'active' }} quote'>
                                            <div class='col-sm-12 text-center'>
                                                <p class='lead'>{{ $review->text }}</p>
                                                <div class='author-wrapper'>
                                                    <p class='author'>
                                                        <strong>{{ $review->name }}</strong>, {{ $review->company }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <ol class='carousel-indicators'>
                                    @foreach($reviews as $i => $review)
                                        <li {{ $i > 0 ? '' : 'class=active' }} data-slide-to='{{ $i }}' data-target='#carousel-testimonials'></li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
                                    <img alt="" width="222" height="33" src="/static/images/_logo_sber.jpg" />
                                    <img alt="" width="82" height="33" src="/static/images/_logo_spec_stroy_rus.jpg" />
                                    <img alt="" width="205" height="33" src="/static/images/logo_kalash.jpg" />
                                    <img alt="" width="79" height="33" src="/static/images/_logo_vtb.jpg" />
                                    <img alt="" width="83" height="33" src="/static/images/_logo_izhgtu.jpg" />

                                    <img alt="" width="222" height="33" src="/static/images/_logo_sber.jpg" />
                                    <img alt="" width="82" height="33" src="/static/images/_logo_spec_stroy_rus.jpg" />
                                    <img alt="" width="205" height="33" src="/static/images/logo_kalash.jpg" />
                                    <img alt="" width="79" height="33" src="/static/images/_logo_vtb.jpg" />
                                    <img alt="" width="83" height="33" src="/static/images/_logo_izhgtu.jpg" />

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
