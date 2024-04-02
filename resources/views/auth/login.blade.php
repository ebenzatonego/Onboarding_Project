@extends('layouts.theme_login')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
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
</div> -->
<style>
    .header-login h6 {
        color: #fff;
        text-align: center;
        margin-top: 10px;
    }

    .detail-login p {
        text-indent: 15px;
    }

    .form-login {
        margin-top: 40px;
    }

    .label-form {
        font-size: 16px;
        color: #fff;
    }

    #header-text-login {
        margin-top: 22%;
        width: 80% !important;
    }

    .forgot-password {
        text-align: center;
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 10px;

        >a {
            color: #fff;
            font-size: 11px;
        }
    }


    .btn-login {
        background-color: #005cd3;
        color: #fff;
        padding: 10px 35px;
    }

    .input-login,
    .input-login:focus {
        background-color: #2a3c68;
        color: #30DAE5;
        border: none;
        padding: 9px;

    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        color: #30DAE5;
        transition: background-color 5000s ease-in-out 0s;
        -webkit-text-fill-color: #30DAE5;
    }

    .header-terms {
        color: #00377F;
        font-weight: bold;
    }

    .detail-terms {
        color: #00377F;
        text-indent: 15px;
        font-size: 11px;
    }

    .checkbox-accept {
        accent-color: #00377F;
        width: 20px;
        height: 20px;
    }

    .text-checkbox-accept {
        color: #00377F;
        font-size: 11px;
    }

    .modal-border {
        border-radius: 10px;
    }

    #header-text-login {
        display: none;
    }

    @media only screen and (max-width: 767px) {
        #header-img-login {
            width: 60% !important;

        }

        #div_first {
            margin-top: 25% !important;

        }

        .form-group {
            margin-top: 10px;
        }

        .btn-login {
            float: right;
        }
    }

    @media only screen and (min-width: 767px) and (max-width: 991px) {
        #header-img-login {
            width: 80% !important;


        }

        .form-group {
            margin-top: 10px;
        }

        .btn-login {
            float: right;
        }
    }

    @media only screen and (min-width: 991px) and (max-width: 1200px) {
        #header-img-login {
            width: 60% !important;



        }

        .form-group {
            margin-top: 10px;
        }

        .btn-login {
            float: right;
        }
    }

    @media only screen and (min-width: 1200px) {
        #header-img-login {
            width: 30% !important;

        }

        .form-group {
            margin-top: 10px;
        }

        .btn-login {
            float: right;
        }
    }

    .btn-outline-terms {
        outline: #005CD3 1px solid;
        border-radius: 5px;
        color: #005CD3;
        padding: 5px 30px;
    }

    .btn-terms {
        border-radius: 5px;
        color: #fff;
        padding: 5px 30px;
        background-color: #005CD3;
    }

    .detail-login p {
        color: #fff;
    }

    #header-img-login_second {
        width: 60% !important;
        margin-top: 5px;
        align-items: center;

    }

    .container-login {
        display: flex;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 0;
        margin: 0;
        width: 100%;
    }

    #div_second {
        width: 90vw;
    }
</style>
<div class="container-login text-white">
    <div id="div_first" class="container text-center mt-5 w-100 p-0" style="width: 100vw;">
        <div class="w-100">
            <div class="col w-100">
                <img src="{{ url('/img/logo/logo-login.png') }}" id="header-img-login">
            </div>
            <div class="d-flex justify-content-center">
                <a style="margin-top: 100px;" class="btn btn-login" onclick="document.querySelector('#div_second').classList.remove('d-none'),document.querySelector('#div_first').classList.add('d-none')">
                    Login
                </a>
            </div>
        </div>

    </div>

        <div class="container-fluid d-none" id="div_second">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="assets/images/logo-img.png" width="180" alt="">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Sign in</h3>
                                    <div class="form-body">
                                        <form id="form_login" class="row g-3" method="POST" action="{{ route('login') }}">
                                        @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label text-dark text-start">Username</label>
                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label text-dark text-start">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-login" name="password" required autocomplete="current-password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Forgot Password ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>เข้าสู่ระบบ</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            <!-- <div class="d-flex justify-content-center">
            <img src="{{ url('/img/logo/logo-login.png') }}" style="width: 20%" id="header-img-login_second">
        </div>
        <div class="header-login">
            <h6>
                <b>Hi there, welcome!</b>
            </h6>
        </div>
        <div class="detail-login">
            <p class="mb-1">กรุณากรอกหมายเลขรหัสเอเจนท์ (Agent Code) ที่ช่องแรกและ ใช้วันเดือนปีเกิด (ค.ศ. 4 ตัว) ของคุณ เพื่อเป็นรหัสผ่าน เช่น เกิดวันที่ 1 เดือนกันยายน ปี ค.ศ. 1984 รหัสผ่านของคุณจึงเป็น 01091984</p>
            <p>Enter your Agent Code in the first field and use your date of birth (4-digit year) as your password in the second field. E.g. You were born on
                Sep 1st, 1984, your password is 01091984.</p>
        </div>

        <div class="form-login">
            <form id="form_login" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <label for="account" class="col-md-4 col-form-label text-md-right label-form">{{ __('Username') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('account')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right label-form mt-2">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-login" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="w-100 forgot-password d-none">
                    <a href="" class=" w-100"><u>Forgot Password</u></a>
                </div>

                <div class="form-group mb-0 d-flex justify-content-center w-100 mt-3 ">
                    <div class="col-md-8">
                        <a id="btn_for_login" class="btn btn-login d-none">
                            {{ __('Login') }}
                        </a>

                        <button type="submit" class="btn btn-login">
                            Login
                        </button>
                    </div>
                </div>
            </form>

        </div> -->
        </div>
    </div>

    <!-- JS code -->
    @endsection