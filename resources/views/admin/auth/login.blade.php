@extends('admin.auth.layouts.app')

@section('content')
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" name="email" class="form-control" placeholder="Email Adresi" required="" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Şifre" required="" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">
                            {{ __('Login Here') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a style="margin-top:-0px!important" class="btn btn-default reset_pass" href="{{ route('password.request') }}">
                                {{ __('Şifremi Unuttum') }}
                            </a>
                        @endif
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> HALAL HOTEL CHECK</h1>
                            <p>
                                © {{ date('Y') }} Tüm Hakları Saklıdır.
                                <a target="_blank" href="https://nexusyazilim.com/">Nexus Yazılım</a>
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection