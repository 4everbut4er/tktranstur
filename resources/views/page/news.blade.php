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
                            <li class='active'>Новости</li>
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
                        @if(!empty($news['data']))
                            @foreach($news['data'] as $new)
                            <div class='text-boxes'>
                                <div class='row text-box text-box-title-above'>
                                    <div class='col-sm-12'>
                                        <h2 class='title'><a href="{{ route('news.detail', $new['id']) }}">{{ $new['title'] }}</a></h2>
                                        <div class='toolbar'>
                                            <a class='btn btn-link'>
                                                <i class='fa fa-calendar'></i>
                                                <span>{{ $new['created_at'] }}</span>
                                            </a>
                                            <a class='btn btn-link'>
                                                <i class='fa fa-user'></i>
                                                <span>{{ $new['author'] }}</span>
                                            </a>
                                        </div>
                                        <div class='row'>
                                            <div class='col-sm-3'>
                                                <a href='{{ route('news.detail', $new['id']) }}'>
                                                    <img class="img-responsive center-block img-rounded-half" alt="{{ $new['title'] }}" width="189" src="{{ $new['file_path'] }}" />
                                                </a>
                                            </div>
                                            <div class='col-sm-9'>
                                                {!! $new['description'] !!}
                                                <a class='btn btn-contrast btn-bordered btn-xs' href='{{ route('news.detail', $new['id']) }}'>Читать дальше</a>
                                            </div>
                                        </div>
                                        <hr class='hr-half'>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        <div class='text-center'>
                            <ul class='pagination'>
                                <li class="{{ $news['next_page_url'] ? '' : 'disabled' }}">
                                    <a href='{{ $news['next_page_url'] ? url($news['next_page_url']) : '#' }}'>
                                        <i class='fa fa-angle-left'></i>
                                    </a>
                                </li>
                                <li class='active'>
                                    <a href='#'>{{ $news['current_page'] }}</a>
                                </li>
                                <li class='{{ $news['prev_page_url'] ? '' : 'disabled' }}'>
                                    <a href='{{ $news['prev_page_url'] ? url($news['prev_page_url']) : '#' }}'>
                                        <i class='fa fa-angle-right'></i>
                                    </a>
                                </li>
                            </ul>
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
