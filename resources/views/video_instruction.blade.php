@extends('layouts.theme_login')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            min-height: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .authentication-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            min-height: 50%;
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
</style>
<style>
    #header-text-login {
        display: none;
    }

    label {
        color: #7D7D7D;
    }

    .header-instruction {
        align-items: center;
        color: #fff;
        font-weight: 100;
    }

    .video-preview {
        border: #fff 1px solid;
        margin-top: 25px;
        max-width: 888px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -khtml-border-radius: 5px;
    }

    .infomation {
        display: flex;
        align-items: center;
        justify-content: center;
        color: #002449;
        margin-top: 10px;



    }

    .infomation .detail {
        font-size: 12px;
        margin-left: 10px;
    }

    .header-infomation {}

    .sub-header-infomation {
        color: #002449;
        font-weight: bold;

        font-size: 16px;
    }

    .detail-register li {
        color: #002449;


    }

    .modal-border {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -khtml-border-radius: 10px;
    }

    .header-info {
        color: #fff;
        margin: 30px 0 10px 0;
        font-size: 14;
        letter-spacing: 0px;
    }

    .btn-copy {
        width: auto;
        font-size: 14px;
        color: #fff;
        margin-bottom: 16px;
    }

    .header-upload-info {
        color: #fff;
        padding-top: 150px;
    }

    .btn-upload {
        background-color: #005CD3;
        color: #fff;
    }

    .section-info {
        display: block;
        background-color: rgb(255, 255, 255, .3);
        border-radius: 10px;
    }

    @media (width <1200px) {
        .detail-info {
            width: 100%;
            padding: 20px 20px;
        }
    }

    @media (width >=1200px) {
        #header-text-login {
            width: 40% !important;
        }

        .section-info {
            margin-top: 40px;
            display: flex !important;
        }

        .detail-info {
            width: 50%;
            padding: 20px 20px;
        }
    }

    .detail-info ol li {
        font-size: 13px;
        font-weight: lighter;
    }

    .modal-success {
        margin: 10px 60px;
    }

    .label-upload-slip {
        border-radius: 50px;
        color: #949494;
    }

    .after-upload {
        margin-top: 15px;
        color: #A0A0A0;
        font-size: 10px;
        align-items: center;
    }

    .container-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 0;
        margin: 0;
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
        background-color: tran;
        z-index: -1;
        height: 100px;
        width: 100px;
        border-radius: 50px 0 50px 0;
        box-shadow: 0 50px 0 0 #5d6dd6;
    }

    .top-section {
        height: 55vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #2a3c68;
    }

    .second-section {
        height: 45vh;
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

    .btn-submit-login {
        width: 100%;
        max-width: 377px;
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
        font-weight: bolder;
    }

    .btn-submit-login:disabled {
        color: #57759C;
        background-color: rgb(248, 248, 248, 0.61);

    }

    .shine {
        font-weight: 900;
        color: rgb(255, 238, 85, .3);
        background: #FFEE55 -webkit-gradient(linear, left top, right top, from(#FFEE55), to(#FFEE55), color-stop(0.5, #fff)) 0 0 no-repeat;
        background-image: -webkit-linear-gradient(-40deg, transparent 0%, transparent 40%, #fff 50%, transparent 60%, transparent 100%);
        -webkit-background-clip: text;
        -webkit-background-size: 50px;
        -webkit-animation: zezzz;
        -webkit-animation-duration: 5.5s;
        -webkit-animation-iteration-count: infinite;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 10px 0 !important;
    }

    @-webkit-keyframes zezzz {
        0% {
            background-position: -265px;
        }

        100% {
            background-position: 265px;
        }
    }

    @media screen and (min-width: 660px) {

        /*adjust*/
        .username {
            font-size: 25px;
            line-height: 1;
            text-align: center;
            padding: 0;
            margin: 15px 0;

        }
    }

    @media screen and (max-width: 660px) {

        /*adjust*/
        .username {
            font-size: min(15em, 6vw);
            line-height: 1;
            text-align: center;
            padding: 0;
            margin: 15px 0;

        }
    }

    @media screen and (max-height: 835px) {
        .logo {
            scale: 0.8;
        }

        .video-preview {
            margin-top: 0 !important;
            width: 90% !important;
        }
    }
</style>
<div class="col-12 p-0 d-flex justify-content-center">
    <div class="wrapper" style="position: relative;">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-0">
        </div>

        <div class="authentication-top ">
            <div class="text-center">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="83" viewBox="0 0 90 83" fill="none">
                        <path d="M88.8385 69.9348L84.1851 61.2992H79.6212H75.0126H36.3538C34.922 61.2992 33.6245 60.5385 32.9086 59.3305C32.1926 58.1224 32.1479 56.6011 32.8191 55.3482L40.336 41.4776H26.3312H21.7226H17.1587L1.81151 69.9348C0.334965 72.6642 0.424453 75.841 1.99049 78.4809C3.69076 81.2997 6.73335 83 10.1339 83H80.5161C83.9166 83 86.9592 81.2997 88.6595 78.4809C90.2255 75.841 90.2703 72.6642 88.8385 69.9348Z" fill="#243286" />
                        <path d="M53.6252 4.83235C52.0144 1.8345 48.8376 0 45.3028 0C41.768 0 38.5912 1.8345 36.9804 4.83235L21.499 33.4685H26.0629H30.6268H47.0478C48.4796 33.4685 49.7772 34.2291 50.4931 35.4372C51.209 36.6453 51.2537 38.1666 50.5826 39.4194L43.0656 53.29H70.5831H75.147H79.7109L53.6252 4.83235Z" fill="#243286" />
                    </svg>
                    <p class="AllianzNeo" style="color:#0E2B81;font-size: 32px;font-weight: bolder;margin: 10px 0 0 0;">AGENCY JOURNEY</p>
                    <p class="AllianzNeo" style="color:#0E2B81;font-size: 10px;font-weight: bold;margin: 0;">ALLIANZ ON-BOARDING WEB</p>
                </div>

                <div class="d-flex-justify-content-center w-100 px-3">
                    <video id="tag_video_intro" src="" controls autoplay loop muted playsinline style="width:100%;border-radius: 10px; max-width: 628px;" class="video-preview"></video>
                </div>
            </div>
        </div>
        <div class="authentication-bottom">
            <div class="shape"></div>
            <div class="text-center px-5 w-100 h-100 d-flex align-items-center justify-content-center">

                <div style="  white-space: nowrap !important;overflow: hidden !important;text-overflow: ellipsis !important;width: 100% !important;">

                    <p style="font-size: 20px;margin: 5px;color: #fff;">ยินดีต้อนรับ !</p>
                    <!-- <p style="font-size: 25px;margin: 15px 0 15px 0;">
        <b>{{Auth::user()->name}}</b>
    </p> -->

                    <div class="shine username">
                        {{Auth::user()->name}}
                    </div>
                    <p class="m-0 text-white">เข้าสู่เว็บ Agency Journey</p>
                    <p class="text-white">แหล่งรวมความรู้และข่าวสารอัพเดตจาก Allianz</p>


                    <button type="submit" id="btn_dont_show_welcome" class="btn-submit-login" disabled>
                        ถัดไป <span id="text_countdown"></span>
                    </button>

                    <div class="d-flex align-items-center justify-content-center d-none">
                        <input name="check_dont_show_welcome" id="check_dont_show_welcome" class="form-check-input font-20 m-0 p-o" type="checkbox" value="" aria-label="Checkbox for following text input" onchange="validate_condition()">
                        <label for="check_dont_show_welcome" class="ms-2 h-100 mt-1" style="color: #989898;">ไม่แสดงหน้านี้อีก</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var button_skip_Clicked = false;

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        get_video_intro();

        var countdownNumber = 5;
        var countdownElement = document.getElementById('text_countdown');
        var buttonElement = document.getElementById('btn_dont_show_welcome');

        // อัปเดตข้อความนับถอยหลังและทำงานนับถอยหลัง
        function updateCountdown() {
            countdownElement.textContent = "(" + countdownNumber + ")";

            // ตรวจสอบว่าการนับถอยหลังสิ้นสุดแล้วหรือไม่
            if (countdownNumber === 0) {
                // เปิดการใช้งานปุ่มเมื่อการนับถอยหลังสิ้นสุด
                buttonElement.disabled = false;
                countdownElement.textContent = "";
                document.querySelector('#btn_dont_show_welcome').disabled = false;
            } else {
                // ลดค่าการนับถอยหลังและตั้งเวลาถัดไป
                countdownNumber--;
                document.querySelector('#btn_dont_show_welcome').disabled = true;
                setTimeout(updateCountdown, 1000);
            }
        }

        // เริ่มการนับถอยหลัง
        updateCountdown();

        buttonElement.addEventListener('click', function() {
            // console.log(countTime);
            button_skip_Clicked = true;
            fetch("{{ url('/') }}/api/update_countTime_video_intro/" + "{{ Auth::user()->id }}" + "/" + countTime)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                });
            window.location.href = "{{ url('/home') }}";
        });

    });



    function validate_condition() {
        let check_dont_show_welcome = document.getElementById('check_dont_show_welcome').checked;
        // console.log(check_dont_show_welcome);

        let skip_video_welcome;
        if (check_dont_show_welcome) {
            skip_video_welcome = "Yes";
        } else {
            skip_video_welcome = "No";
        }

        fetch("{{ url('/') }}/api/skip_video_welcome/" + "{{ Auth::user()->id }}" + "/" + skip_video_welcome)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
            });
    }

    function get_video_intro() {
        fetch("{{ url('/') }}/api/get_video_intro")
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result) {
                    document.querySelector('#tag_video_intro').src = result;
                }
            });
    }


    // นับเวลาวิดีโอ
    const video = document.getElementById('tag_video_intro');
    let countTime = 0;
    let interval;

    // ฟังก์ชั่นเพื่อเริ่มนับเวลา
    function startCountTime() {
        interval = setInterval(() => {
            countTime += 1;
            // console.log('Elapsed time:', countTime);
        }, 1000); // เพิ่มค่าทีละ 1 วินาที
    }

    // ฟังก์ชั่นเพื่อหยุดนับเวลา
    function stopCountTime() {
        clearInterval(interval);
    }

    // จับเหตุการณ์เมื่อวิดีโอเริ่มเล่น
    video.addEventListener('play', () => {
        startCountTime();
    });

    // จับเหตุการณ์เมื่อวิดีโอหยุด
    video.addEventListener('pause', () => {
        stopCountTime();
    });

    // จับเหตุการณ์เมื่อวิดีโอสิ้นสุดการเล่น
    video.addEventListener('ended', () => {
        stopCountTime();
    });


    // ก่อนปิดหน้าหรือเปลี่ยนหน้า
    window.addEventListener('beforeunload', function(e) {
        // console.log(countTime);
        if (!button_skip_Clicked) {
            fetch("{{ url('/') }}/api/update_countTime_video_intro/" + "{{ Auth::user()->id }}" + "/" + countTime)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                });
        }
    });
</script>
@endsection