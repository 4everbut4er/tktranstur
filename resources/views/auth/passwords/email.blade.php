@extends('layouts.admin_auth')

@section('content')
    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">Забыли пароль</h2>

                    <p>
                        Введите свой email и мы вышлем вам новый пароль для авторизации.
                    </p>

                    <div class="row">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="POST" action="{{ url('/password/email') }}">
                                    {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" class="form-control" placeholder="Email" required="" value="{{ old('email') }}" name="email">
                                    @if ($errors->has('email'))
                                        <span class="help-block m-b-none">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary block full-width m-b">Выслать новый пароль</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright
            </div>
            <div class="col-md-6 text-right">
                <small>© 2016</small>
            </div>
        </div>
    </div>
@endsection
