@extends('layouts.theme_login')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        top: calc(55% - 50px);
        right: -50px;
        transform: translate(-50%, -50%);
        background-color: tran;
    
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
        font-weight: bolder;
    }

    .btn-submit-login:disabled{
        color: #57759C;
        background-color: rgb(248, 248, 248,0.61);
        
    }

    .shine {
        font-size: 2em;
        font-weight: 900;
        color: rgba(21, 30, 52, 0.3);
        background: #222 -webkit-gradient(
            linear,
            left top,
            right top,
            from(#222),
            to(#222),
            color-stop(0.5, #fff)
        ) 0 0 no-repeat;
        background-image: -webkit-linear-gradient(
            -40deg,
            transparent 0%,
            transparent 40%,
            #fff 50%,
            transparent 60%,
            transparent 100%
      );
        -webkit-background-clip: text;
        -webkit-background-size: 50px;
        -webkit-animation: zezzz;
        -webkit-animation-duration: 5.5s;
        -webkit-animation-iteration-count: infinite;
    }
    @-webkit-keyframes zezzz {
        0% {
            background-position: -265px;
        }
        100% {
            background-position: 265px;
        }
    }

</style>

<div class="container text-white p-0" style="position: relative;">
    <div class="top-section">
        <div class="text-center">
        <img src="{{ url('/img/logo/logo.png') }}" style="width:99px">
            <p style="font-size: 32px;font-weight: bolder;margin: 0;">Allianz Journey</p>
            <p style="font-size: 10px;font-weight: bold;margin: 0;">ALLIANZ ON-BOARDING WEB</p>

            <div class="d-flex-justify-content-center w-100 p-3">
                <video id="tag_video_intro" src="" controls autoplay loop muted style="width:100%;border-radius: 10px; max-width: 700px;" class="video-preview"></video>
            </div>
        </div>

    </div>
    <div class="shape"></div>
    <div class="second-section">
        <div class="text-center px-5 h-100 d-flex align-items-center">

            <div>

                <p style="font-size: 20px;margin: 5px;">ยินดีต้อนรับ !</p>
                <!-- <p style="font-size: 25px;margin: 15px 0 15px 0;">
                    <b>{{Auth::user()->name}}</b>
                </p> -->
                <div style="font-size: 25px;margin: 15px 0 15px 0;" class="shine">
                    {{Auth::user()->name}}
                </div>
                <p class="m-0">เข้าสู่เว็บ Allianz Journey</p>
                <p>แหล่งรวมความรู้และข่าวสารอัพเดตจาก Allianz</p>
    
               
                <button type="submit" id="btn_dont_show_welcome" class="btn-submit-login" disabled>
                    ถัดไป <span id="text_countdown"></span>
                </button>

                <div class="d-flex align-items-center justify-content-center">
                    <input name="check_dont_show_welcome" id="check_dont_show_welcome" class="form-check-input font-20 m-0 p-o" type="checkbox" value="" aria-label="Checkbox for following text input" onchange="validate_condition()">
                    <label for="check_dont_show_welcome" class="ms-2 h-100 mt-1" style="color: #989898;">ไม่แสดงหน้านี้อีก</label>
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

        var countdownNumber = 10;
        var countdownElement = document.getElementById('text_countdown');
        var buttonElement = document.getElementById('btn_dont_show_welcome');

        // อัปเดตข้อความนับถอยหลังและทำงานนับถอยหลัง
        function updateCountdown() {
            countdownElement.textContent = "("+countdownNumber+")";

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
        if(check_dont_show_welcome){
            skip_video_welcome = "Yes";
        }else{
            skip_video_welcome = "No";
        }

        fetch("{{ url('/') }}/api/skip_video_welcome/" + "{{ Auth::user()->id }}" + "/" + skip_video_welcome)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
            });
    }

    function get_video_intro(){
        fetch("{{ url('/') }}/api/get_video_intro")
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if(result){
                    document.querySelector('#tag_video_intro').src = result ;
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
    window.addEventListener('beforeunload', function (e) {
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















































































<!-- view_profile page -->
<div class="mt-3" style="overflow: auto;">
                                <p style="color: #373737;font-size: 14px;">การฝึกฝนของคุณ</p>
                                <div class="w-100">
                                    <!-- Part Time -->
                                    <div class="d-flex   align-items-center" style="margin-top: 1.4px;">
                                        <p class="mb-0 " style="min-width: 64px;max-width: 64px;margin-right: 10px;">Part Time</p>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa-sharp fa-light fa-badge-check" style="color:#FFBF44"></i>
                                        </div>
                                    </div>



                                    <!-- BlueStar -->
                                    <div class="d-flex  align-items-center" style="margin-top: 10.8px;">
                                        <p class="mb-0 " style="min-width: 64px;max-width: 64px;margin-right: 10px;">BlueStar</p>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="d-none">
                                            <i class="fa-sharp fa-light fa-badge-check" style="color:#FFBF44"></i>
                                        </div>
                                    </div>

                                    <!-- BlueStar X -->
                                    <div class="d-flex  align-items-center" style="margin-top: 10.8px;">
                                        <p class="mb-0 " style="min-width: 64px;max-width: 64px;margin-right: 10px;">BlueStar X</p>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa-sharp fa-light fa-badge-check" style="color:#FFBF44"></i>
                                        </div>
                                    </div>

                                    <!-- Unit Link -->
                                    <div class="d-flex  align-items-center" style="margin-top: 10.8px;">
                                        <p class="mb-0 " style="min-width: 64px;max-width: 64px;margin-right: 10px;">Unit Link</p>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa-sharp fa-light fa-badge-check" style="color:#FFBF44"></i>
                                        </div>
                                    </div>

                                    <!-- Leader -->

                                    <div class="d-flex align-items-center" style="margin-top: 10.8px;">
                                        <p class="mb-0 " style="min-width: 64px;max-width: 64px;margin-right: 10px;">Leader</p>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="progress-traing me-1" data-toggle="tooltip" title="อบรมหลักการขายออนไลน์">
                                            <div class="progress-bar-traing bg-obd" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa-sharp fa-light fa-badge-check" style="color:#FFBF44"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>