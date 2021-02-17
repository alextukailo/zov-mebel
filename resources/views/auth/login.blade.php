@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="
                    height: 96vh;
                    
                ">
        <div class="col-md-7 card__login" >
            <div class="card">
                <div class="card-header header-login">{{'ВХОД В АДМИН ПАНЕЛЬ' }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form__item" style="max-width: 400px; width: 100%; margin: 0 auto; margin-bottom: 20px;">
                            <!-- <div class="form__heading">{{ __('Email') }}</div> -->
                            <div class="form__input login email"><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Введите email" value="{{ old('email') }}" required autocomplete="email" autofocus></div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form__item" style="max-width: 400px; width: 100%; margin: 0 auto; margin-bottom: 20px;">
                            <!-- <div class="form__heading">{{ __('Пароль') }}</div> -->
                            <div class="form__input login password"><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Введите пароль" required autocomplete="current-password"></div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="card__controls">
                            <div class="form-group card__control">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Запомнить') }}
                                        </label>
                                    </div>
                            </div>
    
                            <div class="form-group card__control">
                                <button type="submit" class="button button__indigo" style="max-width: 240px; width: 100%;">
                                        {{ __('Войти') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
