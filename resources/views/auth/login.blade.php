@extends('layouts.theme_login')

@section('content')
<style>
    body {
        height: 100dvh !important;
    }

    @media (max-width: 992px) {
        .authentication-top {
            position: absolute;
            background: rgb(123, 0, 0, 0) !important;
            top: 0;
            left: 0;
            right: 0;
            min-height: 35%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .authentication-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            min-height: 65%;
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
            align-items: center;
            justify-content: center;
        }

        .section-authentication-signin {
            height: 100dvh;
        }
    }


    @media (max-height: 800px) {
        .authentication-top div {
            scale: .7 !important;
        }

        @media (max-height: 630px) {
            .authentication-top div {
                scale: .5 !important;
            }

            .authentication-bottom form p:first-child {
                font-size: 20px !important;
            }

            .authentication-bottom form p:not(:first-child) {
                font-size: 14px !important;
            }
        }

        
        @media (max-height: 571px) {
            .authentication-top div {
                scale: .5 !important;
            }

            .authentication-bottom form p:first-child {
                font-size: 18px !important;
            }

            .authentication-bottom form p:not(:first-child) {
                font-size: 12px !important;
            }
            .input-login-new{
                height: 35px !important;
            }.authentication-bottom {
    min-height: 70% !important;
}
        }
    }

    .authentication-top {
        min-height: 25% !important
    }

    .authentication-bottom {
        min-height: 75%
    }

    .btn-submit-login {
        margin-top: 5px !important;
    }
    }

    @media (min-width: 992px) {

        /* .shape {
    display: none;
} */


        .section-authentication-signin {
            height: 0;
        }

        .wrapper {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
            height: 100dvh;
            justify-content: center;

        }

        .authentication-top {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .authentication-bottom {
            position: relative;
            border-radius: 20px;
            -webkit-border-radius: 50px 0 0 0;
            -moz-border-radius: 50px 0 0 0;
            -ms-border-radius: 50px 0 0 0;
            -o-border-radius: 50px 0 0 0;
            padding: 40px 20px;
            width: 100%;
            background: rgb(98, 115, 221);
            background: -moz-linear-gradient(183deg, rgba(98, 115, 221, 1) 0%, rgba(36, 50, 134, 1) 100%);
            background: -webkit-linear-gradient(183deg, rgba(98, 115, 221, 1) 0%, rgba(36, 50, 134, 1) 100%);
            background: linear-gradient(183deg, rgba(98, 115, 221, 1) 0%, rgba(36, 50, 134, 1) 100%);
        }
    }

    /* 
    .section-authentication-signin {


        height: 100%;


        margin-top: 6rem;


        margin-bottom: 2rem;


    }


    .authentication-reset-password {


        height: auto;


        padding: 2.0rem 1rem;


    }


    .authentication-lock-screen {


        height: auto;


        padding: 2.0rem 1rem;


    }


    .compose-mail-popup {
        width: auto;
        position: fixed;
        bottom: -30px;
        right: 0;
        left: 0;
    } */
</style>

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

    .input-login-new:-webkit-autofill,
    .input-login-new:-webkit-autofill:hover,
    .input-login-new:-webkit-autofill:focus,
    .input-login-new:-webkit-autofill:active {
        color: #30DAE5;
        -webkit-text-fill-color: #fff;
        background-color: #243286 !important;
        box-shadow: 0 0 0 1000px #243286 inset !important;
        -webkit-box-shadow: 0 0 0 1000px #243286 inset !important;
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
        top: -50px;
        right: -50px;
        transform: translate(-50%, -50%);
        height: 100px;
        width: 100px;
        border-radius: 50px 0 50px 0;
        box-shadow: 0 50px 0 0 #5d6ed7;
        z-index: -1;
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
    .input-login-new:hover,
    .input-login-new:valid {
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

    .btn-submit-login {
        width: 100%;
        border-radius: 50px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
        color: #0E2B81;
        padding: .7rem 0;
        border: none;
        margin-top: 40px;
        margin-bottom: 30px;
        font-size: 16px;
        background-color: #fff;
    }

    .btn-submit-login:disabled {
        color: #8C9DB2;
        background-color: #fff;

    }

    .btn-forgot-password {
        font-size: 16px;
        color: #999999;
    }

    #form_login {}
</style>

@if(session('alert'))
<script>
    alert("{{ session('alert') }}");
</script>
@endif

<div class="col-12 p-0 d-flex justify-content-center">
    <div class="wrapper" style="position: relative;">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-0">
        </div>
        <div class="authentication-top col-lg-6">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="130" height="121" viewBox="0 0 130 121" fill="none">
                    <path d="M128.444 101.75L121.673 89.1863H115.033H108.328H52.0818C49.9987 89.1863 48.1108 88.0796 47.0692 86.3219C46.0276 84.5642 45.9625 82.3508 46.939 80.528L57.8757 60.3472H37.4996H30.7943H24.1542L1.82506 101.75C-0.323223 105.722 -0.193024 110.344 2.08546 114.184C4.55924 118.286 8.986 120.759 13.9336 120.759H116.335C121.283 120.759 125.709 118.286 128.183 114.184C130.462 110.344 130.527 105.722 128.444 101.75Z" fill="#243286" />
                    <path d="M77.2092 7.03074C74.8656 2.66908 70.2435 0 65.1007 0C59.9578 0 55.3358 2.66908 52.9922 7.03074L30.4678 48.6944H37.1079H43.7481H67.6396C69.7227 48.6944 71.6106 49.8011 72.6522 51.5588C73.6938 53.3165 73.7589 55.5298 72.7824 57.3526L61.8457 77.5335H101.882H108.522H115.162L77.2092 7.03074Z" fill="#243286" />
                </svg>
                <p class="AllianzNeo" style="color:#0E2B81;font-size: 32px;font-weight: bolder;margin: 10px 0 0 0;">AGENCY JOURNEY</p>
                <p class="AllianzNeo" style="color:#0E2B81;font-size: 10px;font-weight: bold;margin: 0;">ALLIANZ ON-BOARDING WEB</p>
            </div>
        </div>
        <div class="authentication-bottom col-lg-6">
            <div class="shape"></div>
            <form id="form_login" class="text-center px-5 h-100 d-flex align-items-center justify-content-center" method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <div style="max-width: 740px;">

                    <p style="text-shadow: #000 1px 0 10px;font-size: 28px;margin: 5px;color: #fff !important;">ยินดีต้อนรับ !</p>
                    <p style="text-shadow: #000 1px 0 10px;text-align: justify !important;font-size: 16px;margin: 0;color: #fff !important;text-indent: 20px;text-align: left;">กรุณากรอกรหัสตัวแทน (Agent Code) ที่ช่องแรกและ ใช้วันเดือนปีเกิด (ค.ศ. 4 ตัว) ของคุณ เพื่อเป็นรหัสผ่าน เช่น เกิดวันที่ 1 เดือนกันยายน ปี ค.ศ. 1984 รหัสผ่านของคุณจึงเป็น <span style="color: inherit;">01091984</span></p>
                    <p style="text-shadow: #000 1px 0 10px;text-align: justify !important;font-size: 16px;margin: 0 0 30px 0;color: #fff !important;text-indent: 20px;text-align: left;">Enter your Agent in the first field and user your date of birth (4-digit year) as your password in the second field. E.g. You were born on Sep 1st, 1984, your password is <span style="color: inherit;">01091984</span>.</p>
                    <!-- <p style="font-size: 14px;margin: 0 0 30px 0;color: #fff;">กรุณากรอกชื่อ/อีเมลของคุณ หากคุณมีบัญชีเเล้ว หากไม่เคยลงทะเบียนกรุณาลงทะเบียนก่อนเข้าร่วม !</p> -->


                    <div class="group-input-login">
                        <input id="account" type="text" class="input-login-new" name="account" placeholder="กรุณากรอกรหัสตัวแทน" required oninput="check_login()" autocomplete="account">
                        <i class="fa-thin fa-circle-user icon-login-new"></i>
                    </div>


                    <div class="group-input-login">
                        <input id="password" type="password" class="input-login-new" name="password" required placeholder="กรุณากรอกรหัสผ่านของคุณ" oninput="check_login()" autocomplete="password">
                        <i class="fa-thin fa-lock icon-login-new"></i>
                    </div>

                    <button id="submit_button" type="submit" class="btn-submit-login" disabled>
                        เข้าสู่ระบบ
                    </button>
                    <!-- <a class="btn-forgot-password" href="authentication-forgot-password.html">ลืมรหัสผ่าน</a> -->
                </div>
            </form>

            <!-- Button trigger modal -->
            <button id="btn_modal_pdpa" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#Modal_PDPA">
                test
            </button>

            <!-- Modal -->
            <div class="modal fade" id="Modal_PDPA" tabindex="-1" role="dialog" aria-labelledby="Modal_PDPATitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 10px;margin: 0 20px;">
                        <div class="modal-body" style="background-color: #3D467F;border-radius: 10px; color:#fff;font-size: 14px;padding:  50px 30px;">
                            <p>Agency Journey จะทำการเก็บรวบรวมเพื่อ ใช้ หรือ เปิดเผยรหัสข้อมูลส่วนตัวของตัวแทน ต่อบริษัท Box Exhibit เพื่อการใช้งานเว็บไซต์ Agency Journey</p>
                            <br>
                            <p>To give consent to Agency Journey to Collect, Use, and/or Disclosure of Personal Data process my Personal Data, I (“Data Subject”), have marked in the consent box and given my full name as an electronic signature.</p>
                            <div class="d-flex align-items-center">
                                <input name="check_box_submit_condition" id="check_box_submit_condition" class="form-check-input font-18 m-0 p-o" type="checkbox" value="" aria-label="Checkbox for following text input" onchange="validate_condition()">
                                <label for="check_box_submit_condition" class="ms-2">ฉันยอมรับ และยินยอมในเงื่อนไขดังกล่าว</label>
                            </div>
                            <button type="button" class="btn-submit-login mb-0" id="btn_submit_condition" style="font-weight: bolder;" disabled onclick="update_pdpa();">
                                ถัดไป
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        check_login();

        var form = document.getElementById('form_login');
        var submitButton = document.getElementById('submit_button');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // ป้องกันฟอร์มจากการส่งข้อมูลโดยอัตโนมัติ

            // Check PDPA
            let account = document.querySelector('#account').value;
            fetch("{{ url('/') }}/api/check_pdpa/" + account)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                    if (result == "Yes") {
                        form.submit();
                    } else if (result == "No") {
                        document.querySelector('#btn_modal_pdpa').click();
                    } else if (result == "Account none") {
                        alert("ไม่พบ Account ของคุณ");
                    }
                });
        });
    })

    function update_pdpa() {
        let form = document.getElementById('form_login');
        let account = document.querySelector('#account').value;
        fetch("{{ url('/') }}/api/update_pdpa/" + account)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result == "ok") {
                    form.submit();
                }
            });
    }

    function check_login() {
        let check_account = document.getElementById("account");
        let check_password = document.getElementById("password");
        // console.log(check_account.value);
        if (check_account.value && check_password.value) {
            document.querySelector('.btn-submit-login').disabled = false;
        } else {
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