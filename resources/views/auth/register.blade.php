@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2>Регистрация</h2>
        <div class="form-group">
            <label for="name">Имя</label>

                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ old('name') }}" style="max-width: 300px" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
        </div>

        <div class="form-group">
            <label for="email">Почта</label>

                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" value="{{ old('email') }}" style="max-width: 300px" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>

                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password" style="max-width: 300px" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group">
            <label for="password-confirm">Повторите пароль</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   style="max-width: 300px" required>
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Регистрация
                </button>
        </div>
    </form>
@endsection
