@extends('layouts.web')

@section('content')
    <div id='main' role='main'>
        <div id='main-content-header'>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <h1 class='title'>
                            Автобусы
                        </h1>
                        <ol class='breadcrumb'>
                            <li>
                                <a href='{{ url('/') }}'>
                                    <i class='fa fa-home'></i>
                                </a>
                            </li>
                            <li>
                                <a href='{{ route('catalog.truck') }}'>
                                    Техника
                                </a>
                            </li>
                            <li class='active'>{{ $tech['maker'] }} {{ $tech['name'] }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div id='main-content'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-push-9 col-sm-push-8 col-sm-4 col-md-3'>
                        <nav class='sidebar sidebar-fixed'>
                            <button class='btn btn-block btn-contrast sidebar-toggle' data-target='.sidebar-collapse' data-toggle='collapse' type='button'>
                                <span class='sr-only'>Toggle navigation</span>
                                <span class='icon-bar'></span>
                                <span class='icon-bar'></span>
                                <span class='icon-bar'></span>
                            </button>
                            <div class='sidebar-collapse collapse'>
                                <div class='box'>
                                    <h3 class='title'>Информация</h3>
                                    <ul class='list-unstyled list-padded'>
                                        <li>
                                            <i class='fa fa-user text-contrast fa fa-fixed-width'></i>
                                            Транстур
                                        </li>
                                        <li>
                                            <i class='fa fa-calendar text-contrast fa fa-fixed-width'></i>
                                            {{ $tech['year'] }} года
                                        </li>
                                    </ul>
                                </div>
                                <div class='box'>
                                    <h3 class='title'>Телефон</h3>
                                    <ul class='list-unstyled list-padded'>
                                        <li>
                                            <i class='fa fa-phone text-contrast fa fa-fixed-width'></i>
                                            +7 (3412) 67-66-67
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class='col-md-pull-3 col-sm-pull-4 col-sm-8 col-md-9'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h2 class='no-mg-t'>{{ $tech['maker'] }} {{ $tech['name'] }}</h2>
                                <p class='lead lead-sm text-justify'>{!! $tech['description'] !!}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class='col-sm-12'>
                                <div class='page-header page-header-with-icon'>
                                    <i class='fa fa-th'></i>
                                    <h2>
                                        Фотография
                                    </h2>
                                </div>
                                @if(!empty($tech['photos']))
                                <div class='row text-center portfolio-boxes'>
                                    @foreach($tech['photos'] as $photo)
                                    <div class='col-sm-3 col-xs-6 no-mb-t-xs portfolio-box'>
                                        <a data-lightbox data-lightbox-gallery='lightbox-test' href='/s/origin/photo/{{ $photo['file'] }}'>
                                            <div class='image-link'>
                                                <i class='fa fa-search-plus'></i>
                                                <img class="img-responsive img-rounded center-block" alt="Toyota Hiace" width="262" height="262" src="/s/s/photo/{{ $photo['file'] }}" />
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='page-header page-header-with-icon'>
                                    <i class='fa fa-rub'></i>
                                    <h2>
                                        Характеристики
                                    </h2>
                                </div>
                                @if(!empty($options))
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='table-responsive'>
                                            <table class='table table-striped'>
                                                <tbody>
                                                @foreach($options as $option => $data)
                                                <tr>
                                                    <td>
                                                        {{ $data['name'] }}
                                                    </td>
                                                    @if(!empty($data['is_boolean']))
                                                        <td>
                                                            @if($tech['t'][$option])
                                                                <div class="icon-wrap contrast-bg icon-circle">
                                                                    <i class="fa fa-check text-white"></i>
                                                                </div>
                                                            @else
                                                                <div class="icon-wrap danger-bg icon-circle">
                                                                    <i class="fa fa-close text-white"></i>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td>
                                                            {{ $data['prefix'] }} {{ $tech['t'][$option] }} {{ $data['suffix'] }}
                                                        </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='page-header page-header-with-icon'>
                                    <i class='fa fa-rub'></i>
                                    <h2>
                                        Тарифы
                                    </h2>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='table-responsive'>
                                            <table class='table table-striped'>
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <i class='fa fa-clock-o text-contrast'></i>
                                                        Время
                                                    </th>
                                                    <th>
                                                        <i class='fa fa-money text-contrast'></i>
                                                        Цена
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class='  '>
                                                    <td>
                                                        заказ до 6 часов
                                                    </td>
                                                    <td>
                                                        {{ number_format($tech['price_hourly']) }} руб/час
                                                    </td>
                                                </tr>
                                                <tr class='  '>
                                                    <td>
                                                        смена
                                                    </td>
                                                    <td>
                                                        {{ number_format($tech['price_shift']) }} рублей
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
