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
                            <li class='active'>Автобусы</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div id='main-content'>
            <div class='container'>
                <div class='row' id='portfolio-filter'>
                    <div class='col-sm-12'>
                        <ul class='nav nav-pills' data-filter-group="place">
                            <li class='active'><a data-filter="" href="#">Все</a></li>
                            @foreach($capacity as $name => $title)
                                <li><a data-filter=".portfolio-filter-{{ $name }}" href="#">{{ $title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class='col-sm-12'>
                        <ul class='nav nav-pills' data-filter-group="year">
                            <li class='active'><a data-filter="" href="#">Все</a></li>
                            @foreach($year as $name => $title)
                                <li><a data-filter=".portfolio-filter-year-{{ $name }}" href="#">{{ $title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class='row portfolio-boxes' id='portfolio-container'>
                    @foreach($buses as $bus)
                        <div class='col-sm-3 portfolio-box portfolio-filter-{{ $bus['tag_capacity'] }} portfolio-item portfolio-filter-year-{{ $bus['tag_year'] }}'>
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
                                <p class='category'>{{ $bus['year'] }} года выпуска</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class='fade' id='scroll-to-top'>
            <i class='fa fa-chevron-up'></i>
        </div>
    </div>
@endsection
