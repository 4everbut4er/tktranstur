@extends('layouts.web')

@section('content')
    <div id='main' role='main'>
        <div id='main-content-header'>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <h1 class='title'>
                            Новости
                        </h1>
                        <ol class='breadcrumb'>
                            <li>
                                <a href='{{ url('/') }}'>
                                    <i class='fa fa-home'></i>
                                </a>
                            </li>
                            <li>
                                <a href='{{ route('news') }}'>
                                    Новости
                                </a>
                            </li>
                            <li class='active'>{{ $news['title'] }}</li>
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
                                <div class='box social-box'>
                                    <h3 class='title'>Последние новости</h3>
                                    <div class='icon-boxes icon-boxes-nowrap'>
                                        @foreach($last_news as $l_news)
                                            <div class='icon-box'>
                                                <div class='icon icon-wrap'>
                                                    <i class='fa fa-newspaper-o text-contrast'></i>
                                                </div>
                                                <div class='content'>
                                                    <p>
                                                        {{ $l_news['title'] }}
                                                        <br>
                                                        <a class='time' href='#'>
                                                            <i>{{ $l_news['created_at'] }}</i>
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
                        <div class='text-boxes'>
                            <div class='row text-box text-box-title-above text-box-big-image'>
                                <div class='col-sm-12'>
                                    <h2 class='title'><a href="{{ route('news.detail', $news['id']) }}">{{ $news['title'] }}</a></h2>
                                    <div class='toolbar'>
                                        <a class='btn btn-link'>
                                            <i class='fa fa-calendar'></i>
                                            <span>{{ $news['created_at'] }}</span>
                                        </a>
                                        <a class='btn btn-link'>
                                            <i class='fa fa-user'></i>
                                            <span>{{ $news['author'] }}</span>
                                        </a>
                                    </div>
                                    <div class='row'>
                                        <div class='col-sm-12'>
                                            <a href='{{ route('news.detail', $news['id']) }}'>
                                                <img class="img-responsive center-block img-rounded-half" alt="{{ $news['title'] }}" width="600" src="{{ $news['file_path'] }}" />
                                            </a>
                                        </div>
                                        <div class='col-sm-12'>
                                            {!! $news['description'] !!}
                                        </div>
                                    </div>
                                    <hr class='hr-half'>
                                </div>
                            </div>
                            <div class='row text-box'>
                                <div class='col-sm-12'>
                                    {!! $news['text'] !!}
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
