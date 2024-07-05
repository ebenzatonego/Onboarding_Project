@extends('layouts.theme_user')

@section('content')
<style>
    .training_path_item {
        position: absolute;
        transform: translate(-50%, -50%);
        /* border: #000 1px solid; */
        width: 8%;
        height: 6%;
        border-radius: 50% !important;
        background-color: #003781;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFF !important;
        z-index: 999;
        padding: 5px;
    }

    .training_path_item img {
        width: 100%;
    }

    .training-path-left-1 img,
    .training-path-left-2 img,
    .training-path-left-3 img,
    .training-path-left-4 img,
    .training-path-left-5 img {
        max-width: 25px;
    }

    .nav-link.active {
        background-color: #a8d29f !important;
    }

    .training-path-main-1 {
        top: 7%;
        left: 23.8%;
        width: 19% !important;
        height: 14% !important;
        border: none !important;
        background-color: #7FA3D4;
        font-size: 2vw;
        padding: 10px !important;

    }

    .training-path-main-2 {
        top: 48%;
        left: 23.8%;
        width: 16% !important;
        height: 12% !important;
        background-color: #194B93;
        font-size: 2vw;
        padding: 12px !important;
        border: #fff 3px solid;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .training-path-main-3 {
        top: 48%;
        left: 89%;
        width: 16% !important;
        height: 12% !important;
        background-color: #417EA3;
        font-size: 2vw;
        padding: 15px !important;
        border: #fff 3px solid;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .training-path-main-4 {
        top: 70.5%;
        left: 11%;
        width: 16% !important;
        height: 12% !important;
        background-color: #818FE6;
        font-size: 2vw;
        padding: 15px !important;
        border: none !important;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .training-path-main-5 {
        top: 85.5%;
        left: 89%;
        width: 16% !important;
        height: 12% !important;
        background-color: #5464C4;
        font-size: 2vw;
        padding: 15px !important;
        border: none !important;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .training-path-main-6 {
        top: 93%;
        left: 23.8%;
        width: 19% !important;
        height: 14% !important;
        border: none !important;
        background-color: #7FA3D4;
        font-size: 2vw;
        padding: 10px !important;

    }

    .training-path-left-1 {
        top: 25.8%;
        left: 7%;
        border: #B8C6D8 2px solid;

    }

    .training-path-left-2 {
        top: 33.2%;
        left: 7%;
        border: #B8C6D8 2px solid;

    }

    .training-path-left-3 {
        top: 41.2%;
        left: 7%;
        border: #B8C6D8 2px solid;

    }

    .training-path-left-4 {
        top: 48.8%;
        left: 7%;
        border: #B8C6D8 2px solid;

    }

    .training-path-left-5 {
        top: 56.5%;
        left: 7%;
        border: #B8C6D8 2px solid;

    }

    .mark img {
        position: absolute;
        top: -10 !important;
        right: -10 !important;
        width:70%;
    }
    .training-path-rad-1 {
        top: 22%;
        left: 23.2%;
        border: #F9BCBC 2px solid;
        background-color: #E20C0C;
    }
    .training-path-rad-2 {
        top:77.5%;
        left: 28%;
        border: #F9BCBC 2px solid;
        background-color: #E20C0C;
    }
    .training-path-rad-3 {
        top:92.5%;
        left: 63%;
        border: #F9BCBC 2px solid;
        background-color: #E20C0C;
    }

    .training-path-top-1 {
        top:33.2%;
        left: 38%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-top-2 {
        top:33.2%;
        left: 49.2%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-top-3 {
        top:33.2%;
        left: 60.5%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-top-4 {
        top:33.2%;
        left: 72%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }
    .training-path-mid-top {
        top:62.2%;
        left: 72%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-mid-1 {
       
        top:77.5%;
        left: 40.5%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-mid-2 {
      
        top:77.5%;
        left: 52%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-mid-3 {
        top:77.5%;
        left: 63%; 
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }
    .training-path-mid-4 {
       top:77.5%;
        left: 74.5%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }
    .training-path-bottom-1 {
        top:92.5%;
        left: 40.5%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-bottom-2 {
        top:92.5%;
        left: 52%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-right-1 {
        top: 29.9%;
        left: 88.5%;
        border: #ACD4EC 2px solid;
        background-color: #417EA3;
        padding: 8px;
    }
    .training-path-right-2 {
        top: 36.5%;
        left:95.8%;
        border: #ACD4EC 2px solid;
        background-color: #417EA3;
        padding: 8px;
    }

    .training-path-right-3 {
        top: 58%;
        left:95.8%;
        border: #ACD4EC 2px solid;
        background-color: #417EA3;
        padding: 8px;
    }
    .training-path-right-4 {
        top: 65.5%;
        left: 88.5%;
        border: #ACD4EC 2px solid;
        background-color: #417EA3;
        padding: 8px;
    }

    .btn-career-path {
        color: #003781;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 150%;
        /* 30px */
        letter-spacing: -0.38px;
        cursor: pointer;
    }

    .title-career-path {
        color: #003781;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: 150%;
        /* 21px */
        letter-spacing: -0.266px;
    }


    @media only screen and (max-width: 500px) {

        /* .container-career-path,
        .bottom-content-career-path {
            padding: 0;
        } */

        .bottom-content-career-path {
            padding: 0 0 15px 0;

        }

        .bottom-content-career-path {
            border-top: 1px solid #000;
        }

        .content-section {
            padding: 0 !important;
            width: 100%;
            margin-bottom: 0 !important;
        }


        /* //////////////ชิดขอบ ตรงนี้//////////////// */
        .container-career-path {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .container-career-path .row {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
    }

    @media only screen and (min-width: 768px) {
        .bottom-content-career-path {
            padding-top: 54.5px;
        }

    }

    /* .content-career-path {
        border-radius: 0 0 0 25px;
        background-color: #000;
        position: relative;
        overflow: hidden;
    } */

    .detail-career-path {
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        width: 100%;
    }

    .name-career-path {
        color: #FFF;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 150%;
        /* 30px */
        letter-spacing: -0.38px;
    }


    .nav-pills {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100% !important;
        height: 100% !important;
    }

   

    .career_path_sevp.active .text-sevp {
        background-color: #a8d29f !important;
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

    /*  photo_gallery  */
    .group-img {
        flex: 0 0 20%;
        max-width: 20%;
        position: relative;

        cursor: pointer;
    }

    .img-news {
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        filter: grayscale(70%);
    }

    .img-news.active {
        filter: blur(0) grayscale(0) !important;

    }

    .img-news.active+.icon-preview {
        display: none !important;

    }

    .preview-img {
        width: 100%;
    }

    .icon-preview {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff !important;
        font-size: 33px;
        pointer-events: none;
        /* ปิดการใช้งาน hitbox */
    }

    .title-training-path {
        color: #003781;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        line-height: 150%;
        /* 30px */
        letter-spacing: -0.38px;
    }

    .detail-training-path {
        color: #373737;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .btn-detail-training-path {
        border-radius: 25px;
        background-color: #003781;
        width: 100%;
        color: #FFF;
        text-align: center;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        padding: 5px;
        margin-top: 15px;
    }

    .btn-detail-training-path:hover {
        color: #FFF;

    }p{
        color: #003781;
    }
</style>


<div class="container container-career-path mb-5 pt-3">
    <div class="row" id="select_lavel">
        <div class="col-md-6 col-12 pb-4 px-4">
            <div class="d-flex align-items-center justify-content-center w-100 ">
                <div>

                    <div>
                        <a class="btn-career-path" onclick="window.history.back();"><i class="fa-solid fa-chevron-left me-3" ></i> เส้นทางสายอาชีพ</a>
                        <p class="mt-2 title-career-path" style="margin-left: 32px;">กดเพื่อเลือกเส้นทางที่สนใจ</p>
                    </div>
                    <div class="position-relative">
                        <img src="{{url('/img/icon/Training path.png')}}" alt="" style="width: 100%;">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">

                            <!-- main วงใหญ่่ทั้งหมด -->
                            <li class="nav-item">
                                <a class="nav-link training-path-main-1 training_path_item active" data-toggle="pill" href="#training-path-main-1" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/START.png')}}" alt="">
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link training-path-main-2 training_path_item " data-toggle="pill" href="#training-path-main-2" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/user_computer.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-main-3 training_path_item " data-toggle="pill" href="#training-path-main-3" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/user_money.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-main-4 training_path_item " data-toggle="pill" href="#training-path-main-4" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/user_um.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-main-5 training_path_item " data-toggle="pill" href="#training-path-main-5" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/user_new_avp.png')}}" alt="">
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link training-path-main-6 training_path_item " data-toggle="pill" href="#training-path-main-6" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/FINISH.png')}}" alt="">
                                </a>
                            </li>

                            
                            <!-- ด้านซ้าย ทั้งหมด -->
                            <!-- <li class="nav-item">
                                <a class="nav-link training-path-left-1 training_path_item" href="" data-toggle="pill" href="#training-path-left-1" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/user_computer.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  training-path-left-2 training_path_item " data-toggle="pill" href="#training-path-left-2" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/user_computer.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-left-3 training_path_item " data-toggle="pill" href="#training-path-left-3" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/user_computer.png')}}" alt="">
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link  training-path-left-4 training_path_item " data-toggle="pill" href="#training-path-left-4" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/user_computer.png')}}" alt="">
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link training-path-left-5 training_path_item " data-toggle="pill" href="#training-path-left-5" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/user_computer.png')}}" alt="">
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link training-path-rad-1 training_path_item mark" data-toggle="pill" href="#training-path-red-1" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/star.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-rad-2 training_path_item mark" data-toggle="pill" href="#training-path-red-2" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/star.png')}}" alt="">

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-rad-3 training_path_item mark" data-toggle="pill" href="#training-path-red-3" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/star.png')}}" alt="">

                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link training-path-top-1 training_path_item mark" data-toggle="pill" href="#training-path-top-1" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/like.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-top-2 training_path_item mark" data-toggle="pill" href="#training-path-top-2" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/like.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-top-3 training_path_item mark" data-toggle="pill" href="#training-path-top-3" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/like.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-top-4 training_path_item" data-toggle="pill" href="#training-path-top-4" role="tab" aria-selected="false">
                             
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link training-path-mid-top training_path_item" data-toggle="pill" href="#training-path-mid-top" role="tab" aria-selected="false">
                             
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link training-path-mid-1 training_path_item mark" data-toggle="pill" href="#training-path-mid-1" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/like.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-mid-2 training_path_item mark" data-toggle="pill" href="#training-path-mid-2" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/like.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-mid-3 training_path_item mark" data-toggle="pill" href="#training-path-mid-3" role="tab" aria-selected="false">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-mid-4 training_path_item mark" data-toggle="pill" href="#training-path-mid-4" role="tab" aria-selected="false">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-bottom-1 training_path_item mark" data-toggle="pill" href="#training-path-bottom-1" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/like.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-bottom-2 training_path_item mark" data-toggle="pill" href="#training-path-bottom-2" role="tab" aria-selected="false">
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link training-path-right-1 training_path_item" data-toggle="pill" href="#training-path-right-1" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/light_money.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  training-path-right-2 training_path_item " data-toggle="pill" href="#training-path-right-2" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/light_money.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link training-path-right-3 training_path_item " data-toggle="pill" href="#training-path-right-3" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/light_money.png')}}" alt="">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  training-path-right-4 training_path_item " data-toggle="pill" href="#training-path-right-4" role="tab" aria-selected="false">
                                    <img src="{{url('img/icon/light_money.png')}}" alt="">
                                </a>
                            </li>

                            
                        </ul>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12 bottom-content-career-path tt" id="div_show_content_data">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="training-path-main-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">ยินดีต้อนรับ</p>
                                <div class="d-flex justify-content-center w-100 px-3 pt-0">
                                    <video id="tag_video_intro" src="" controls="" autoplay="" loop="" muted="" playsinline="" style="margin-top: 0 !important;width:100%;border-radius: 10px; max-width: 628px;" class="video-preview"></video>
                                </div>
                                <p class="mt-4" style="font-size: 16px;">ยินดีต้อนรับทุกท่านเข้าสู่ บริษัท อลิอันซ์อยุธยา ซึ่งเป็นบริษัทชั้นนำ ในด้านธุรกิจประกันชีวิตและประกันสุขภาพครับ </p>
                                <p>คุณ วิรงค์ พัฒนกำจร</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">FULLTIME DEVELOPMENT PROGRAM</p>
                                <p>เส้นทางลัดที่จะนำพาให้คุณไปสู่เป้าหมายความสำเร็จ ในฐานะตัวแทนประกันชีวิต ได้อย่างรวดเร็วด้วย การเข้าโครงการต่างๆ อาทิ Blue Star Program และ Blue Star X Program ฯลฯ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">FINANCIAL ADVISOR</p>
                                <p>ที่ปรึกษาวางแผนด้านการเงิน Financial Advisor อลิอันซ์ อยุธยา ประกันชีวิต
                                    เรียนรู้ การบริหารเงิน วางแผนเกษียณอายุ วางแผนทุนการศึกษาบุตร คุ้มครองค่าความสามารถ การปกป้องความเสี่ยง การวางแผนภาษี และวางแผนสวัสดิการ ให้คำแนะนำวางแผนการเงินผ่านกองทุนรวม โดยใช้ประกันชีวิตควบการลงทุน Unit-Liniked
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-4" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">NEW UM</p>
                                <p>ก้าวเเรกของการขึ้นเป็นระดับตำแหน่ง  “ผู้บริหารตัวแทน”  ซึ่งในระดับนี้ จะมีตำแหน่ง ทั้ง 4 ตำแหน่งย่อย ได้แก่</p>
                                <ul>
                                    <li>ผู้จัดการหน่วย (Unit Manager - UM)</li>
                                    <li>ผู้จัดการหน่วยอาวุโส(Senior Unit Manager - SUM)</li>
                                    <li>ผู้จัดการภาค(District Manager - DM)</li>
                                    <li>ผู้จัดการภาคอาวุโส(Senior District Manager - SDM)</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-5" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">NEW AVP</p>
                                <p>ตำแหน่งผู้ช่วยผู้จัดการฝ่ายขาย (Assistant Vice President Sales - AVP Sales)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-6" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">GM</p>
                                <p>ระดับผู้บริหารฝ่ายขาย หลังจากดำรง ตำแหน่งผู้ช่วยผู้จัดการฝ่ายขาย (Assistant Vice President Sales - AVP Sales)
                                แบ่งออกเป็น 3 ตำแหน่ง</p>
                                <ul>
                                    <li>ผู้จัดการฝ่ายขาย (Vice President Sales - VP Sales)</li>
                                    <li>ผู้จัดการบริหารฝ่ายขาย (Executive Vice President Sales - EVP Sales)</li>
                                    <li>ผู้จัดการบริหารอาวุโสฝ่ายขาย (Senior Executive Vice President Sales - SEVP Sales)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show " id="training-path-mid-top" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Pre AL (หลักสูตรเตรียมผู้บริหารตัวแทน Pre AL)</p>
                                <p class="detail-training-path">สร้างความเข้าใจถึงความแตกต่างระหว่างบทบาทหน้าที่ตัวแทนกับผู้บริหารตัวแทน ความสำคัญในการเลื่อนตำแหน่ง รวมถึงโครงสร้างการเติบโตในเส้นทางผู้บริหารตัวแทน</p>
                                <p class="m-0">หัวข้อการอบรม : </p>
                                <ul>
                                    <li>ทำไมต้องเลื่อนตำแหน่ง</li>
                                    <li>ความแตกต่างระหว่างบทบาทหน้าที่ตัวแทนกับผู้บริหารตัวแทน</li>
                                    <li>ผลประโยชน์โครงสร้างการเติบโตในเส้นทางผู้บริหารตัวแทน</li>
                                    <li>ข้อพึงปฏิบัติตามจรรยาบรรณของผู้ขายประกันชีวิต (COC) AML, Anti-Fraud, Anti-Corruption</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="tab-pane fade show " id="training-path-left-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-left-1</p>
                                <p class="detail-training-path">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                                </p>
                                <a class="btn-detail-training-path btn">
                                    ดูรายละเอียดหลักสูตร
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-left-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">

                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-left-2</p>
                                <p class="detail-training-path">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                                </p>
                                <a class="btn-detail-training-path btn">
                                    ดูรายละเอียดหลักสูตร
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade show " id="training-path-left-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">

                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-left-3</p>
                            </div>
                        </div>

                    </div>
                </div> -->

                <div class="tab-pane fade show " id="training-path-left-4" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">

                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Blue Star Program</p>
                                <p>เป็นโครงการที่จะนำคุณไปสู่การเป็น ตัวแทนประกันชีวิตมืออาชีพ ที่สามารถบริหารจัดการเวลาและรายได้ ให้เป็นไปได้ตามที่ต้องการ รวมถึงการเตรียมความพร้อมใน การเป็นที่ปรึกษาทางการเงิน</p>
                                <a href="{{url('training_show/28')}}" class="btn-detail-training-path btn">
                                    ดูรายละเอียดหลักสูตร
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade show " id="training-path-left-5" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">

                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Blue Star X Program</p>
                                <p>การเป็นที่ปรึกษาทางการเงินอย่างมืออาชีพ โดยมุ่งเน้นให้ ผู้เข้าร่วมมีความพร้อมในการเลื่อนระดับสู่การเป็นผู้บริหาร ของ Allianz Ayudhya</p>
                                <a href="{{url('training_show/7')}}" class="btn-detail-training-path btn">
                                    ดูรายละเอียดหลักสูตร
                                </a>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="tab-pane fade show " id="training-path-red-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">อบรมความรู้เพื่อขอรับใบอนุญาตเป็นตัวแทนประกันชีวิต</p>
                                <p>อบรมเข้ม 1 วันเต็มหลักสูตร ทั้งกฎหมายตัวแทนประกันชีวิต  ภาพรวมธุรกิจประกันชีวิต แนวทางปฏิบัติในการขาย จรรยาบรรณและศีลธรรมของตัวแทนประกันชีวิต พร้อมสอบในการขอรับใบอนุญาตเป็นตัวแทนประกันชีวิต รับประกาศนียบัตรรับรองผลการอบรม 1 ปี จากคปภ.</p>
                                <p class="mb-0"> <b>หัวข้อการอบรม :</b></p>
                                <ul>
                                    <li>กฎหมายที่เกี่ยวข้องกับตัวแทนประกันชีวิต</li>
                                    <li>แนวทางปฏิบัติในการขาย การรู้จักลูกค้า และการให้คำแนะนำด้านการประกันชีวิต</li>
                                    <li>จรรยาบรรณและศีลธรรมของตัวแทนประกันชีวิต</li>
                                    <li>ข้อพึงปฏิบัติตามจรรยาบรรณของผู้ขายประกันชีวิต</li>
                                    <li>แบบทดสอบ</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-red-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">AL Orientation (หลักสูตรปฐมนิเทศผู้บริหารตัวแทนใหม่)</p>
                                <p>สร้างความเข้าใจบทบาทและความรับผิดชอบในฐานะผู้บริหารตัวแทนรวมถึงการกำหนดเป้าหมายในการทำงานที่ชัดเจน และรับรู้ข้อมูลข่าวสารเชิงลึกในขั้นตอนการบริการและสนับสนุนจากฝ่ายต่าง ๆ โดยผู้บริหารตัวแทนแต่งตั้งใหม่จะต้องเข้าอบรมภายใน 3 เดือนหัวข้อการอบรม :</p>
                                <ul>
                                    <li>บทบาทหน้าที่ผู้บริหารตัวแทน</li>
                                    <li>จุดแข็งของผลิตภัณฑ์</li>
                                    <li>การสนับสนุนจากบริษัท</li>
                                    <li>ผลประโยชน์ฝ่ายขาย</li>
                                    <li>การบริหารอัตราความยั่งยืนกรมธรรม์</li>
                                    <li>การพิจารณารับประกัน</li>
                                    <li>งานบริการผู้ถือกรมธรรม์</li>
                                    <li>งานสินไหมประกันชีวิต</li>
                                    <li>การส่งสอบออกโค้ด </li>
                                    <li>ใบรับเงินชั่วคราว</li>
                                    <li>FATCA กฎหมายป้องกันการหลีกเลี่ยงภาษีบุคคลธรรมดา และนิติบุคคลของสหรัฐฯ</li>
                                    <li>E-Services</li>
                                    <li>Train to WIN </li>
                                    <li>การกำหนดเป้าหมายข้อพึงปฏิบัติตามจรรยาบรรณของผู้ขายประกันชีวิต</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-red-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">New GM & AVP Orientation</p>
                                <p>สร้างความเข้าใจบทบาทและความรับผิดชอบในฐานะผู้บริหารฝ่ายขาย และเข้าใจโครงสร้างผลประโยชน์ในเชิงลึก เน้นการบริหารทีม สร้างทีม ขยายทีม ความยั่งยืนในธุรกิจ สถานการณ์ธุรกิจประกันชีวิตในปัจจุบัน และอนาคตหัวข้อการอบรม :</p>
                                <ul>
                                    <li>บทบาทหน้าที่ GM AVP</li>
                                    <li>โครงสร้างผลประโยชน์ เชิงลึก</li>
                                    <li>การบริหารทีม สร้างทีม ขยายทีม</li>
                                    <li>ธุรกิจประกันชีวิตในปัจจุบัน และในอนาคต</li>
                                    <li>การสนับสนุน และเส้นทางการเรียนรู้ จากฝ่ายฝึกอบรมและพัฒนาตัวแทน</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show " id="training-path-top-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                            <p class="title-training-path">Smart Start</p>
                                <p>เริ่มต้นด้วย Smart Start สร้างความ active ต่อเนื่องให้กับตัวแทนใหม่ ช่วยให้เข้าใจผลิตภัณฑ์ที่จะขาย มุมมองของธุรกิจประกันชีวิต เพิ่มทักษะการขายที่ง่ายและได้ผล รวมถึงสร้างความมุ่งมั่นในการพิชิตเป้าหมายหัวข้อการอบรม : </p>
                                <ul>
                                    <li>รู้จักบริษัท อลิอันซ์ อยุธยา/การสนับสนุนจากบริษัท</li>
                                    <li>อาชีพนี้ดีอย่างไร</li>
                                    <li>บทบาทหน้าที่ และ โครงสร้างผลประโยชน์ในอาชีพ	</li>
                                    <li>ทำไมต้องทำประกันชีวิต Insurance concept</li>
                                    <li>แบบประกันหลัก</li>
                                    <li>สัญญาเพิ่มเติม</li>
                                    <li>กระบวนการขายแบบมืออาชีพ</li>
                                    <li>Work shop จัดแบบประกัน และนำเสนอ</li>
                                    <li>Mobile Submission / ใบคำขอเอาประกันชีวิต</li>
                                    <li>ข้อพึงปฏิบัติตามจรรยาบรรณของผู้ขายประกันชีวิต ประกาศเป้าหมาย  และสรุปการอบรม</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-top-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">High Productivity Agent</p>
                                <p>การเรียนผสมผสาน Hybrid Learning Experiences กระตุ้นและส่งเสริมให้ตัวแทนใหม่ผลิตผลงานได้มากขึ้น ยกระดับการทำงานเพื่อความยั่งยืนในอาชีพต่อไปในอนาคตด้วยการฝึกวินัยในการทำงานอย่างเป็นระบบด้วยกิจกรรมการขายอย่างสม่ำเสมอ หัวข้อการอบรม :</p>
                                <ul>
                                    <li>Digital Tools, Sales Process</li>
                                    <li>Product Knowledge</li>
                                    <li>วิชาการพิเศษโดย “โค้ชสง่า”</li>
                                    <li>ประชุมประจำเดือน Professional Patterns of Selling การขายอย่างมืออาชีพ </li>
                                    <li>New Agent Onboarding</li>
                                    <li>Financial Course Online By โค้ชสง่า</li>
                                    <li>หลักสูตร Pre AL Online AML & PDPA</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-top-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Smart Sale Skill </p>
                                <p><b>กระบวนการ การขายผลิตภัณฑ์และบริการทางการเงินยุคใหม่</b></p>
                                <p>หลักสูตร 3 วัน อันทรงพลังนี้ออกแบบสำหรับตัวแทนประกันชีวิตใหม่ที่เข้าสู่ธุรกิจการเงิน สร้างทักษะความเชี่ยวชาญ รวมถึงแนวทางขั้นตอนการขายจากจุดเริ่มต้นในการแสวงหาผู้มุ่งหวังและทำกระบวนการขายครบขั้นตอนไปจนถึงการส่งมอบการบริการด้วยคุณภาพหัวข้อการอบรม : </p>
                                <ul>
                                    <li>วัตถุประสงค์ของประกันชีวิต</li>
                                    <li>พื้นฐานการขาย</li>
                                    <li>การแสวงหาผู้มุ่งหวัง</li>
                                    <li>แนวทางการเข้าพบ</li>
                                    <li>การค้นหาข้อมูลสำคัญ</li>
                                    <li>การแก้ปัญหาทางการเงิน</li>
                                    <li>การนำเสนอทางเลือกเพื่อแก้ปัญหาและทำการขาย</li>
                                    <li>การนำเสนอผลิตภัณฑ์</li>
                                    <li>การบริการด้วยคุณภาพ</li>
                                    <li>การสร้างความสัมพันธ์ระยะยาว</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-top-4" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Bridge to Success</p>
                                <p>โครงการพัฒนาตัวแทนเพื่อเพิ่มศักยภาพการขายอย่างที่ปรึกษาทางการเงิน พัฒนาทักษะและความรู้ทั้ง Fundamental และ Soft Skill ผ่าน Workshop เพื่อสร้างการทำงานอย่างมืออาชีพหัวข้อการอบรม :</p>
                                <ul>
                                    <li>เครื่องมือทางการเงิน (Financial Instruments)</li>
                                    <li>มูลค่าเงินตามเวลา (Time Value of Money)</li>
                                    <li>การวิเคราะห์สถานะทางการเงิน (Financial Statement Analysis)</li>
                                    <li>กระบวนการขาย (Sale Process)</li>
                                    <li>ฝึกทักษะการขายผ่านการปฏิบัติ (Workshop)</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade show " id="training-path-mid-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">First time management</p>
                                <p>มุ่งเน้นการวางรากฐานการทำงานบริหารให้กับผู้บริหารแต่งตั้งใหม่ด้วยเทคนิคสำคัญเกี่ยวกับการสรรหา การชักชวนตัวแทน และการพัฒนาตัวแทนใหม่ของหน่วยงานหัวข้อการอบรม : </p>
                                <ul>
                                    <li>การเล็งเห็นโอกาส ปรับแนวคิดสู่งานบทบาทใหม่ในฐานะผู้บริหาร</li>
                                    <li>การขายโอกาส แนวทางการสรรหาตัวแทนและการชักชวน</li>
                                    <li>การสนับสนุนตัวแทนให้ประสบความสำเร็จในการแสดวงหาผู้มุ่งหวัง</li>
                                    <li>การพัฒนาทักษะการขายให้กับตัวแทนใหม่ในหน่วยงาน</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-mid-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">New AL Weekly Meeting</p>
                                <p>การนัดประชุมประจำสัปดาห์ เพื่อเพิ่มองค์ความรู้เเละอัพเดตข่าวสารใหม่ๆให้แก่“ผู้บริหารตัวแทน</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-mid-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Insurance Business Owner</p>
                                <p>วัตถุประสงค์ เพื่อต้องการการทำงานในฐานะ ผู้ประกอบการธุรกิจปประกันชีวิต</p>
                                <ul>
                                    <li>เรียนรู้และใช้กระบวนการเพื่อดำเนินวิธีปฏิบัติทางธุรกิจของคุณได้อย่างมีประสิทธิภาพและประสิทธิผลยิ่งขึ้น</li>
                                    <li>พัฒนาทักษะในการดำเนินธุรกิจของคุณในฐานะผู้ประกอบการ </li>
                                    <li>เข้าใจมุมมองด้านการเงินของธุรกิจของคุณ/วัดผลและคาดการณ์ความสามารถในการทำกำไร</li>
                                    <li>ระบุวิธีการเพิ่มผลประโยชน์ที่ได้จากสัญญาของคุณให้มากที่สุด</li>
                                    <li>ใช้กรณีศึกษา เพื่อระบุค่าใช้จ่าย "ที่ไม่สามารถควบคุมได้"</li>
                                    <li>สร้างแผนธุรกิจของคุณเอง</li>
                                    <li>แลกเปลี่ยนแนวคิดในการบริหารธุรกิจกับตัวแทนประกันชีวิตรายอื่น ๆ</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-mid-4" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                            <p class="title-training-path">Pre AVP (หลักสูตรเตรียมผู้บริหารฝ่ายขาย)</p>
                                <p>เพื่อสำหรับผู้บริหารตัวแทน ที่วางแผน และมีเป้าหมายชัดเจนในการขึ้นตำแหน่งผู้บริหารฝ่ายขาย เน้นเรื่องบทบาทหน้าที่ ความแตกต่างของตำแหน่ง โครงสร้างการเติบโตในเส้นทางผู้บริหารฝ่ายขาย และการประกาศเป้าหมาย</p>
                                <p>หัวข้อการอบรม : </p>
                                <ul>
                                    <li>ทำไมต้องเลื่อนตำแหน่งเป็นผู้ช่วยผู้อำนวยการฝ่ายขาย</li>
                                    <li>ความแตกต่างระหว่างบทบาทหน้าที่ผู้บริหารตัวแทน กับผู้บริหารฝ่ายาย</li>
                                    <li>ผลประโยชน์โครงสร้างการเติบโตในเส้นทางผู้บริหารฝ่ายขาย</li>
                                    <li>เขียนเป้าหมายในการขึ้นตำแหน่งผู้บริหารฝ่ายขาย และประกาศเป้าหมาย</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show " id="training-path-bottom-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">New AVP Hera</p>
                                <p>เพื่อพัฒนา เสริมสร้าง ความรู้ ทักษะ ในการบริหารทีมงาน การเน้นการทำงานย่างมืออาชีพ และการเติบโต ไปสู่ระดับ GM อย่างเป็นระบบ มีแนวทาง เจาะลึก เรื่อง โครงสร้างให้เข้าใจความแตกต่าง และการนำไปบริหารทีมงาน หัวข้อการอบรม :</p>
                                <ul>
                                    <li>ทิศทางและนโยบายบริษัท</li>
                                    <li>โครงสร้างผลประโยชน์</li>
                                    <li>ระบบการบริหารและจัดการทีมงาน</li>
                                    <li>Success Sharing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-bottom-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">New AVP Weekly Meeting</p>
                                <p>เสริมสร้าง Activity ประจำสัปดาห์ในการเรียนรู้ เน้นแชร์ประสบการณ์ทำงาน และเรียนรู้จาก หลากหลายวิทยากรรับ เชิญทั้งจากฝ่ายขาย และจากภายในบริษัท เพื่อครอบคลุมความรู้ทั้งหมด นำไป สร้างความเป็นมืออาชีพมากขึ้น หัวข้อการอบรม :</p>
                                <ul>
                                    <li>Business Performance management การบริหารผลงาน</li>
                                    <li>Recruitment การชักชวนคนร่วมทีม</li>
                                    <li>Education & learning- การศึกษาฝึกอบรมในกลุ่มงาน</li>
                                    <li>Business expansion model การขยายธุรกิจ</li>
                                    <li>Market leadership การจัดทำการตลาด</li>
                                    <li>Meet the CAO</li>
                                    <li>Human Skill ทักษะสำคัญในการบริหารคน</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show " id="training-path-right-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Openhouse </p>
                                <p> สำหรับทุกท่านที่สนใจสอบ IC License เพื่อเตรียมขายผลิตภัณฑ์ยูนิตลิงค์ >
                                อบรม 2 ชั่วโมงครึ่ง กิจกรรมเปิดบ้าน ต้อนรับทุกท่าน ที่มีใจพร้อมมี (UL license) License เพื่อได้สิทธิ์การนำเสนอขาย Unit Linked พบกับ 2 วิทยากรรับเชิญพิเศษที่จะมาแบ่งปันการเป็นที่ปรึกษาการเงินพร้อมรับสิทธิพิเศษ เมื่อเข้าร่วมกิจกรรมตามเงื่อนไขที่กำหนด
                                หัวข้อการอบรม : </p>
                                <ul>
                                    <li>ช่วงที่ 1     จุดเด่น จุดแข็ง จุดขาย ของผลิตภัณฑ์ยูนิตลิงค์</li>
                                    <li>ช่วงที่ 2 	วิทยากรรับเชิญพิเศษจำนวน 2 ท่าน เรื่อง การสอบ และขายผลิตภัณฑ์ยูนิตลิงค์</li>
                                    <li>ช่วงที่ 3     เส้นทางสู่การเป็นที่ปรึกษาการเงิน (UL License)</li>

                                </ul>
                                <p>หมายเหตุ: เมื่อเข้าร่วมกิจกรรม Open House แล้วขึ้นทะเบียน UL กับบริษัทฯ และมีผลงานอนุมัติผลิตภัณฑ์ ยูนิตลิงค์ PC ขั้นต่ำ 12,000 จำนวน 1 ราย(เฉพาะรายปี) ภายใน 90 วันหลังจากเข้ากิจกรรมเสร็จสิ้น</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-right-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Unit-Linked life policy</p>
                                <p class="mb-1">
                                    <b>หลักสูตรบังคับสำหรับผู้ที่สอบผ่าน IC License</b>
                                </p>
                                <p>อบรมเข้ม 1.5 วัน ผู้เข้ารับการอบรมจะทราบลักษณะของผลิตภัณฑ์ยูนิตลิงค์ ทราบถึงจุดเด่น 
                                    จุดขาย การเปรียบเทียบผลประโยชน์ในแง่มุมต่างๆ การบริการหลังการขาย ขั้นตอนการขายตามหลักการขายที่ถูกต้องเพื่อความยั่งยืนของกรมธรรม์
                                    หัวข้อการอบรม :  แบ่งเนื้อหาออกเป็น 5 ส่วน
                                </p>
                                <ul>
                                    <li>1.ต้องการให้ผู้อบรมมีความรู้ความเข้าใจในรายละเอียดแบบประกัน ยูนิตลิงค์ </li>
                                    <li>2.ต้องการให้ผู้อบรมมีความรู้ความเข้าใจในเรื่องจรรยาบรรณ ในการนำเสนอแบบประกันยูนิตลิงค์ </li>
                                    <li>3.ต้องการให้ผู้อบรมมีความรู้ความเข้าใจในเรื่องและกระบวนการนำเสนอแบบประกันยูนิตลิงค์ให้กับลูกค้า</li>
                                    <li>4.ผู้เข้าอบรมได้รับทราบ Sale Idea การขายด้วยแบบประกันยูนิตลิงค์ โดยจำลองผ่านระบบ AZD ในการนำเสนอแบบประกันยูนิตลิงค์ เบื้องต้น</li>
                                    <li>5.ผู้เข้าอบรมจะต้องทำแบบทดสอบ เกณฑ์ให้ผ่านคือ 70%</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-right-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">UL Product & Sales process</p>
                                <p class="mb-1">
                                    <b>หลักสูตรบังคับสำหรับผู้ที่สอบผ่าน IC License</b>
                                </p>
                                <p>อบรมเข้ม 1.5 วัน ผู้เข้ารับการอบรมจะทราบลักษณะของผลิตภัณฑ์ยูนิตลิงค์ ทราบถึงจุดเด่น 
                                    จุดขาย การเปรียบเทียบผลประโยชน์ในแง่มุมต่างๆ การบริการหลังการขาย ขั้นตอนการขายตามหลักการขายที่ถูกต้องเพื่อความยั่งยืนของกรมธรรม์
                                </p>
                                <p class="mb-0">หัวข้อการอบรม :</p>
                                <p class="mb-0">แบ่งเนื้อหาออกเป็น 5 ส่วน</p>
                                <ul>
                                    <li>1.ต้องการให้ผู้อบรมมีความรู้ความเข้าใจในรายละเอียดแบบประกัน ยูนิตลิงค์ </li>
                                    <li>2.ต้องการให้ผู้อบรมมีความรู้ความเข้าใจในเรื่องจรรยาบรรณ ในการนำเสนอแบบประกันยูนิตลิงค์ </li>
                                    <li>3.ต้องการให้ผู้อบรมมีความรู้ความเข้าใจในเรื่องและกระบวนการนำเสนอแบบประกันยูนิตลิงค์ให้กับลูกค้า</li>
                                    <li>4.ผู้เข้าอบรมได้รับทราบ Sale Idea การขายด้วยแบบประกันยูนิตลิงค์ โดยจำลองผ่านระบบ AZD ในการนำเสนอแบบประกันยูนิตลิงค์ เบื้องต้น</li>
                                    <li>5.ผู้เข้าอบรมจะต้องทำแบบทดสอบ เกณฑ์ให้ผ่านคือ 70%</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-right-4" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Active UL (For UL License)</p>
                                <p>
                                อบรมเข้ม 1 วันเต็ม หลักสูตรพื้นฐานการนำเสนอขาย ผลิตภัณฑ์ยูนิตลิงค์เหมาะสำหรับ New UL License, Agent UL License ที่ต้องการเพิ่มความมั่นใจก่อนนำเสนอขาย ผลิตภัณฑ์ยูนิตลิงค์เนื่องจากหลักสูตรนี้ จะให้ความรู้ เรื่องผลิตภัณฑ์ยูนิตลิงค์โดยภาพรวม, กองทุนรวม และเครื่องมือการนำเสนอขายผลิตภัณฑ์ยูนิตลิงค์ผ่าน UL AZD Simulation
                                </p>
                                <p class="mb-0">หัวข้อการอบรม :</p>
                                <ul>
                                    <li>ช่วงที่ 1      ความรู้เรื่องผลิตภัณฑ์ยูนิตลิงค์โดยภาพรวม</li>
                                    <li>ช่วงที่ 2 	จุดเด่นของแต่ละกองทุนรวมทั้งหมดที่มีภายใต้ผลิตภัณฑ์ยูนิตลิงค์ของบริษัทฯ</li>
                                    <li>ช่วงที่ 3     เครื่องมือการนำเสนอขายแบบประกันยูนิตลิงค์ผ่าน UL AZD Simulation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>



<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        get_video_intro();

        document.querySelectorAll('.training_path_item').forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault(); // ป้องกันการทำงานของลิงก์ปกติ
                var target = document.getElementById('div_show_content_data');
                target.scrollIntoView({ behavior: 'smooth' });
            });
        });
    });

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
</script>
@endsection