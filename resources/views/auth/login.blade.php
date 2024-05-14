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
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
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
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        padding: 0;
        margin: 0;
        width: 100%;
    }

    #div_second {
        width: 90vw;
    }

    .shape {
        height: 0;
    }

    .shape:before {
        content: "";
        position: absolute;
        top: calc(50% - 50px);
        right: -50px;
        transform: translate(-50%, -50%);
        background-color: tran;
    
        height: 100px;
        width: 100px;
        border-radius: 50px 0 50px 0;
        box-shadow: 0 50px 0 0 #5d6ed7;
    }

    .top-section {
        height: 50vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #2a3c68;
    }

    .second-section {
        height: 50vh;
        width: 100%;
        background: rgb(98, 115, 221);
        background: -moz-linear-gradient(183deg, rgba(98, 115, 221, 1) 0%, rgba(36, 50, 134, 1) 100%);
        background: -webkit-linear-gradient(183deg, rgba(98, 115, 221, 1) 0%, rgba(36, 50, 134, 1) 100%);
        background: linear-gradient(183deg, rgba(98, 115, 221, 1) 0%, rgba(36, 50, 134, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#6273dd", endColorstr="#243286", GradientType=1);
        border-radius: 50px 0 0 0;
        -webkit-border-radius: 50px 0 0 0;
        -moz-border-radius: 50px 0 0 0;
        -ms-border-radius: 50px 0 0 0;
        -o-border-radius: 50px 0 0 0;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .group-input-login {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        line-height: 28px;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        position: relative;
        margin-bottom: 15px;
    }

    .input-login-new {
        width: 100%;
        height: 50px;
        line-height: 28px;
        padding: 0 1rem 0;
        padding-left: 3.5rem;
        border: 2px solid transparent;
        border-radius: 50px;
        outline: none;
        background-color: #F2F3FF;
        color: #0d0c22;
        -webkit-transition: .3s ease;
        transition: .3s ease;
        color: #fff;
        border: #999999 1px solid;
    }

    
    

    .input-login-new::-webkit-input-placeholder {
        color: #fff;
        font-weight: bold;
    }

    .input-login-new::-moz-placeholder {
        color: #fff;
        font-weight: bold;
    }

    .input-login-new:-ms-input-placeholder {
        color: #fff;
        font-weight: bold;
    }

    .input-login-new::-ms-input-placeholder {
        color: #fff;
        font-weight: bold;
    }

    .input-login-new::placeholder {
        color: #fff;
        font-weight: bold;
    }

    .input-login-new:focus,
    .input-login-new:hover ,.input-login-new:valid{
        outline: none;
        border-color: #fff;
        background-color: #243286;
    }
    .icon-login-new {
        position: absolute;
        left: 1rem;
        color: #999999;
        font-size: 25px;
    }

    .input-login-new:focus+.icon-login-new,
    .input-login-new:hover+.icon-login-new,
    .input-login-new:valid+.icon-login-new {
        color: #fff;
    }

    .input-login-new:hover::-webkit-input-placeholder,
    .input-login-new:focus::-webkit-input-placeholder {
        color: #fff !important;
    }

    .input-login-new:hover::-moz-placeholder,
    .input-login-new:focus::-moz-placeholder {
        color: #fff !important;
    }

    .input-login-new:hover:-ms-input-placeholder,
    .input-login-new:focus:-ms-input-placeholder {
        color: #fff !important;
    }

    .input-login-new:hover::-ms-input-placeholder,
    .input-login-new:focus::-ms-input-placeholder {
        color: #fff !important;
    }

    .input-login-new:hover::placeholder,
    .input-login-new:focus::placeholder {
        color: #fff !important;
    }
    input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0px 1000px white inset !important;
    background-color: #0d0c22 !important;
}
    .btn-submit-login{
        width: 100%;
        border-radius:  50px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
        color: #0E2B81;
        padding:  .7rem 0;
        border: none;
        margin-top: 40px;
        margin-bottom: 30px;
        font-size: 16px;
    }

    .btn-submit-login:disabled{
        color: #8C9DB2;
        background-color: #fff;
        
    }
    .btn-forgot-password{
        font-size: 16px;
        color: #999999;
    }

</style>


<div class="container text-white p-0" style="position: relative;">
    <div class="top-section">
        <div class="text-center">
            <p style="font-size: 32px;font-weight: bolder;margin: 0;">Allianz Journey</p>
            <p style="font-size: 10px;font-weight: bold;margin: 0;">ALLIANZ ON-BOARDING WEB</p>
        </div>

    </div>
    <div class="shape"></div>
    <div class="second-section">
        <form id="form_login" class="text-center px-5 h-100 d-flex align-items-center" method="POST" action="{{ route('login') }}"autocomplete="off">
            @csrf
            <div>

                <p style="font-size: 28px;margin: 5px;">ยินดีต้อนรับ !</p>
                <p style="font-size: 14px;margin: 0 0 30px 0;">กรุณากรอกชื่อ/อีเมลของคุณ หากคุณมีบัญชีเเล้ว หากไม่เคยลงทะเบียนกรุณาลงทะเบียนก่อนเข้าร่วม !</p>
    
    
                <div class="group-input-login">
                    <input id="username" type="text" class="input-login-new" name="username"   value="{{ old('username') }}" autofocus placeholder="กรุณากรอกชื่อ/อีเมลของคุณ" required oninput="check_login()">
                    <i class="fa-thin fa-circle-user icon-login-new"></i>
                </div>
                
                
                <div class="group-input-login">
                    <input id="password" type="password" class="input-login-new" name="password" required autocomplete="current-password" placeholder="กรุณากรอกรหัสผ่านของคุณ"  oninput="check_login()">
                    <i class="fa-thin fa-lock icon-login-new"></i>
                </div>
    
                <button type="submit"  class="btn-submit-login" disabled>
                    เข้าสู่ระบบ
                </button>
                <a class="btn-forgot-password" href="authentication-forgot-password.html">ลืมรหัสผ่าน</a>
            </div>
        </form>
    </div>
</div>
<!-- <div class="container-login text-white d-none">
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
        </div>
    </div>
</div> -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
test
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content"style="border-radius: 10px;margin: 0 20px;">
        <div class="modal-body" style="background-color: #3D467F;border-radius: 10px; color:#fff;font-size: 14px;padding:  50px 30px;">
            <p>Allianz Journey จะทำการเก็บรวบรวมเพื่อ ใช้ หรือ เปิดเผยรหัสข้อมูลส่วนตัวของตัวแทน ต่อบริษัท Box Exhibit เพื่อการใช้งานเว็บไซต์ Allianz Journey</p>
            <br>
            <p>To give consent to Allianz Journey to Collect, Use, and/or Disclosure of Personal Data process my Personal Data, I (“Data Subject”), have marked in the consent box and given my full name as an electronic signature.</p>
            <div class="d-flex align-items-center">
                <input name="check_box_submit_condition" id="check_box_submit_condition" class="form-check-input font-18 m-0 p-o" type="checkbox" value="" aria-label="Checkbox for following text input" onchange="validate_condition()">
                <label for="check_box_submit_condition" class="ms-2">ฉันยอมรับ และยินยอมในเงื่อนไขดังกล่าว</label>
            </div> 
            <button type="button"  class="btn-submit-login mb-0" id="btn_submit_condition" style="font-weight: bolder;" disabled>
                เข้าสู่ระบบ
            </button>
        </div>
    </div>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        check_login()
    }) 
    
    function  check_login() {
        let check_username = document.getElementById("username");
        let check_password = document.getElementById("password");
        console.log(check_username.value);
        if (check_username.value && check_password.value) {
            document.querySelector('.btn-submit-login').disabled = false;
        }else{
            document.querySelector('.btn-submit-login').disabled = true;
            
        }
    }

    function validate_condition() {
        if (document.getElementById('check_box_submit_condition').checked) {
            document.querySelector('#btn_submit_condition').disabled = false;
        } else {
            document.querySelector('#btn_submit_condition').disabled = true;
        }
    }
</script>
<!-- JS code -->
@endsection