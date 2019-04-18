@extends('layouts.app')

@section('content')
        <h2>Вход</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Почта</label>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   name="email" value="{{ old('email') }}" style="max-width: 300px" required autofocus>

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

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" style="display: none" checked>

                        <button type="submit" class="btn btn-primary">
                            Войти
                        </button>

                        <a href="/register" class="btn">Регистрация</a>
                    </form>
@endsection
