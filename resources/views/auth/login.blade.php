@extends('layouts.admin_auth')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">CA+</h1>

        </div>
        <h3>Welcome to CA+</h3>
        <p>Для продолжения необходимо авторизоваться.</p>
        <form class="m-t" role="form" action="{{ url('/login') }}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" placeholder="E-mail" required="" value="{{ old('email') }}" name="email">
                @if ($errors->has('email'))
                    <span class="help-block m-b-none">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" required="" name="password">
                @if ($errors->has('password'))
                    <span class="help-block m-b-none">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <input type="hidden" name="remember" value="true">
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="{{ url('/password/reset') }}"><small>Забыли пароль?</small></a>
        </form>
        <p class="m-t"> <small>Copyright &copy; 2016</small> </p>
    </div>
</div>
@endsection
