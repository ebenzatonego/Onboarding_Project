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
        left: 40.5%;
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


    .training-path-mid-1 {
        top:77.5%;
        left: 52%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-mid-2 {
        top:77.5%;
        left: 63%;
        border: #C0DCFD 2px solid;
        background-color: #4B90E2;
    }

    .training-path-mid-3 {
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

    }
</style>


<div class="container container-career-path mb-5 pt-3">
    <div class="row" id="select_lavel">
        <div class="col-md-6 col-12 pb-4 px-4">
            <div class="d-flex align-items-center justify-content-center w-100 ">
                <div>

                    <div>
                        <a class="btn-career-path"><i class="fa-solid fa-chevron-left me-3" onclick="window.history.back();"></i> เส้นทางสายอาชีพ</a>
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
                            <li class="nav-item">
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
                            </li>
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

        <div class="col-md-6 col-12 bottom-content-career-path tt">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="training-path-main-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">Start
                                    training-path-main-1
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-main-2</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-main-3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-4" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-main-4</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-5" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-main-5</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-main-6" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">finish
                                    training-path-main-6
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade show " id="training-path-left-1" role="tabpanel" aria-labelledby="pills-home-tab">
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
                </div>

                <div class="tab-pane fade show " id="training-path-left-4" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">

                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-left-4</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade show " id="training-path-left-5" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">

                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-left-5</p>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="tab-pane fade show " id="training-path-red-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-red-1</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-red-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-red-2</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-red-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-red-3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show " id="training-path-top-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-top-1</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-top-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-top-2</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-top-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-top-3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-top-4" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-top-4</p>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade show " id="training-path-mid-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-mid-1</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-mid-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-mid-2</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-mid-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-mid-3</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade show " id="training-path-bottom-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-bottom-1</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-bottom-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-bottom-2</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show " id="training-path-right-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-right-1</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-right-2" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-right-2</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-right-3" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-right-3</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show " id="training-path-right-4" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item">
                            <div class="w-100 content-career-path p-4">
                                <p class="title-training-path">training-path-right-4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>




@endsection