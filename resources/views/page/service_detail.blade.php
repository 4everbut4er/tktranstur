@extends('layouts.web')

@section('content')
    <div id='main' role='main'>

        <div id='main-content-header'>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <h1 class='title'>
                            {{ $service['name'] }}
                        </h1>
                        <ol class='breadcrumb'>
                            <li>
                                <a href='{{ url('/') }}'>
                                    <i class='fa fa-home'></i>
                                </a>
                            </li>
                            <li class='active'>{{ $service['name'] }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div id='main-content'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-push-9 col-sm-push-8 col-sm-4 col-md-3'>
                        <nav class='sidebar'>
                            <button class='btn btn-block btn-contrast sidebar-toggle' data-target='.sidebar-collapse' data-toggle='collapse' type='button'>
                                <span class='sr-only'>Toggle navigation</span>
                                <span class='icon-bar'></span>
                                <span class='icon-bar'></span>
                                <span class='icon-bar'></span>
                            </button>
                            <div class='sidebar-collapse collapse'>
                                <div class='box'>
                                    <h3 class='title'>Услуги</h3>
                                    <div class='list-group'>
                                        @foreach($service_menu as $el)
                                            @if($el['id'] == $service['parent_id'])
                                                @foreach($el['items'] as $sub_el)
                                                    <a class="list-group-item {{ isset($sub_el['model_id']) && $service['id'] == $sub_el['model_id'] ? 'active' : '' }}" href="{{ route('services.detail', isset($sub_el['model_id']) ? $sub_el['model_id'] : 0) }}"><i class='fa fa-angle-right fa fa-fixed-width'></i>
                                                        {{ $sub_el['text'] }}
                                                    </a>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class='box social-box'>
                                    <h3 class='title'>Последние новости</h3>
                                    <div class='icon-boxes icon-boxes-nowrap'>
                                        @foreach($last_news as $news)
                                            <div class='icon-box'>
                                                <div class='icon icon-wrap'>
                                                    <i class='fa fa-newspaper-o text-contrast'></i>
                                                </div>
                                                <div class='content'>
                                                    <p>
                                                        {{ $news['title'] }}
                                                        <br>
                                                        <a class='time' href='#'>
                                                            <i>{{ $news['created_at'] }}</i>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class='col-md-pull-3 col-sm-pull-4 col-sm-8 col-md-9'>
                        <div class="row text-box text-box-title-above text-box-big-image">
                            <div class="col-sm-12">
                                <h2 class="title"><a href="{{ route('services.detail', $service['id']) }}">{{ $service['name'] }}</a></h2>
                                <div class="row">
                                    <div class="col-sm-12">
                                        {!! $service['text'] !!}
                                    </div>
                                </div>
                                <hr class="hr-half">
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
