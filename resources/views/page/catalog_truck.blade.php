@extends('layouts.web')

@section('content')
    <div id='main' role='main'>

        <div id='main-content-header'>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <h1 class='title'>
                            Техника
                        </h1>
                        <ol class='breadcrumb'>
                            <li>
                                <a href='{{ url('/') }}'>
                                    <i class='fa fa-home'></i>
                                </a>
                            </li>
                            <li class='active'>Техника</li>
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
                            @foreach($types as $name => $title)
                                <li><a data-filter=".portfolio-filter-{{ $name }}" href="#">{{ $title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if(!empty($techs))
                <div class='row portfolio-boxes' id='portfolio-container'>
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
                                <p class='category'>{{ $tech['year'] }} года выпуска</p>
                            </a>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class='fade' id='scroll-to-top'>
            <i class='fa fa-chevron-up'></i>
        </div>
    </div>
@endsection
