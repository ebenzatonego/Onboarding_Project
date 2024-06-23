@extends('layouts.theme_user')

@section('content')
<style>
    .career_path_ag,
    .career_path_um,
    .career_path_sum,
    .career_path_dm,
    .career_path_sdm,
    .career_path_avp,
    .career_path_vp,
    .career_path_evp,
    .career_path_sevp {
        position: absolute;
        transform: translate(-50%, -50%);
        /* border: #000 1px solid; */
        width: 11.5%;
        height: 16.5%;
        border-radius: 50% !important;
        background-color: #003781 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFF !important;
        z-index: 999;
    }

    .nav-link.active {
        background-color: #a8d29f !important;
    }

    .career_path_ag {
        top: 82.3%;
        left: 5.7%;
    }

    .career_path_um {
        top: 89%;
        left: 25.8%;
    }

    .career_path_sum {
        top: 63.2%;
        left: 26.2%;
    }

    .career_path_dm {
        top: 77%;
        left: 48.5%;
    }

    .career_path_sdm {
        top: 46%;
        left: 48.8%;
    }

    .career_path_avp {
        top: 71.2%;
        left: 70.8%;
    }

    .career_path_vp {
        top: 46%;
        left: 83.4%;
    }

    .career_path_evp {
        top: 21.2%;
        left: 68%;
    }

    .career_path_sevp {
        top: 15.5%;
        left: 90.5%;
        background-color: #FFC107 !important;
        color: #003781 !important;

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

.bottom-content-career-path{
    padding: 0 0 74px 0;

}
     
        .bottom-content-career-path {
            border-top: 1px solid #000;
        }

        .content-section {
            padding: 0 !important;
            width: 100%;
        }
    }

    @media only screen and (min-width: 768px) {
        .bottom-content-career-path {
            padding-top: 54.5px;
        }

    }

    .content-career-path {
        border-radius: 0 0 0 25px;
        background-color: #000;
        position: relative;
        overflow: hidden;
    }

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

    /* .content-career-path div:first-child{
        padding-top: 50px;
    } */
    .bottom-content-career-path>.content-career-path:nth-child(1) {
        display: none;
    }

    .bottom-content-career-path>.content-career-path {
        /* border: 1px solid red; */
        /* z-index: 5; */
        position: relative;
    }

    .bottom-content-career-path>.content-career-path~.content-career-path img {
        height: 180px;
        margin-top: -30px;
        width: 100%;
        object-fit: cover;
        border-radius: 0 0 0 25px;
        border: none !important;
    }

    .bottom-content-career-path>.content-career-path~.content-career-path {
        /* z-index: 4; */
        position: relative;
        /* border: 1px solid red; */


    }

    .parent:first-child>p:nth-child(1) {
        background: #ff0000;
    }

    .career-item {
        cursor: pointer;
    }

    .content-career>.career-item:first-child img {
        max-height: 130px;
        min-height: 130px;


    }

    .content-career>.career-item:not(:first-child) img {
        max-height: 160px;
        min-height: 160px;
        position: relative;
    }

    .content-career>.career-item:not(:first-child) {
        margin-top: -30px;
        position: relative;
    }

    .content-career>.career-item:not(:first-child) .detail-career-path {
        top: 55% !important;
    }

    .content-career>.career-item:nth-child(1) {
        position: relative;

        z-index: 9;
    }

    .content-career>.career-item:nth-child(2) {
        z-index: 8;
    }

    .content-career>.career-item:nth-child(3) {
        z-index: 7;
    }

    .content-career>.career-item:nth-child(4) {
        z-index: 6;
    }

    .content-career>.career-item:nth-child(5) {
        z-index: 5;
    }

    .content-career>.career-item:nth-child(6) {
        z-index: 4;
    }

    .content-career>.career-item:nth-child(7) {
        z-index: 3;
    }

    .content-career>.career-item:nth-child(8) {
        z-index: 2;
    }

    .content-career>.career-item:nth-child(9) {
        z-index: 1;
    }

    .content-career>.career-item:nth-child(10) {
        z-index: 0;
    }

    .nav-pills {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100% !important;
        height: 100% !important;
    }

    .crown-avp {
        width: 31.087px;
        height: 34.541px;
        flex-shrink: 0;
        position: absolute;
        top: -5%;
        left: 72%;
        transform: translate(-50%, -50%) rotate(-28.15deg);

    }

    .crown-vp1,
    .crown-vp2 {
        flex-shrink: 0;
        position: absolute;
        width: 23.627px;
        height: 26.253px;
        transform: translate(-50%, -50%) rotate(-4.715deg);
    }

    .crown-vp1 {
        top: -12%;
        left: 48%;
    }

    .crown-vp2 {
        top: 10%;
        left: 90%;
    }

    .crown-evp1,
    .crown-evp2,
    .crown-evp3 {
        flex-shrink: 0;
        position: absolute;
        transform: translate(-50%, -50%) rotate(-33.07deg);
        width: 23.627px;
        height: 26.253px;
    }

    .crown-evp1 {
        top: 5%;
        left: 15%;
    }

    .crown-evp2 {
        top: -18%;
        left: 48%;
    }

    .crown-evp3 {
        top: 10%;
        left: 89%;
    }

    .crown-sevp {
        flex-shrink: 0;
        position: absolute;
        transform: translate(-50%, -50%) rotate(-4.715deg);
        width: 36px;
        height: 40px;
        flex-shrink: 0;
        top: 1%;
        left: 89%;
        z-index: 11;
    }

    .confetti-sevp {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -9999;
        width: 61px;
        height: 58px;
        flex-shrink: 0;

    }

    .text-sevp {
        position: relative;
        border-radius: 50% !important;
        background-color: #FFC107;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFF !important;
        z-index: 10;
        margin-top: 15px;

    }

    .career_path_sevp.active .text-sevp {
        background-color: #a8d29f !important;
    }
</style>


<div class="container container-career-path mb-5 pt-3">
    <div class="row" id="select_lavel">
        <div class="col-md-6 col-12 pb-4 px-4">
            <div class="d-flex align-items-center justify-content-center w-100 ">
                <div>

                    <div>
                        <a class="btn-career-path"><i class="fa-solid fa-chevron-left me-3"></i> เส้นทางสายอาชีพ</a>
                        <p class="mt-2 title-career-path" style="margin-left: 32px;">กดเพื่อเลือกเส้นทางที่สนใจ</p>
                    </div>
                    <div class="position-relative">
                        <img src="{{url('/img/icon/career_paths2.png')}}" alt="" style="width: 100%;">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class=" nav-item">
                                <a class="nav-link active career_path_ag" data-toggle="pill" href="#pills_career_path_ag" role="tab" aria-selected="true">AG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_um" data-toggle="pill" href="#pills_career_path_um" role="tab" aria-selected="false">UM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_sum" data-toggle="pill" href="#pills_career_path_sum" role="tab" aria-selected="false">SUM</a>
                            </li>
                            <li class=" nav-item">
                                <a class="nav-link career_path_dm" data-toggle="pill" href="#pills_career_path_dm" role="tab" aria-selected="true">DM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_sdm" data-toggle="pill" href="#pills_career_path_sdm" role="tab" aria-selected="false">SDM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_avp" data-toggle="pill" href="#pills_career_path_avp" role="tab" aria-selected="false">
                                    AVP
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-avp">
                                </a>
                            </li>
                            <li class=" nav-item">
                                <a class="nav-link career_path_vp" data-toggle="pill" href="#pills_career_path_vp" role="tab" aria-selected="true">
                                    VP
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-vp1">
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-vp2">
                                </a>


                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_evp" data-toggle="pill" href="#pills_career_path_evp" role="tab" aria-selected="false">
                                    EVP
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-evp1">
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-evp2">
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-evp3">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link career_path_sevp p-0" data-toggle="pill" href="#pills_career_path_sevp" role="tab" aria-selected="false">
                                    <p class="w-100 h-100 text-sevp ">
                                        SEVP
                                    </p>
                                    <img src="{{ url('img/icon/Crown.png') }}" alt="" class="crown-sevp">
                                    <img src="{{ url('img/icon/confetti.png') }}" alt="" class="confetti-sevp">

                                </a>
                            </li>
                        </ul>

                        <!-- <a href="" class="career_path_ag">
                            AG
                        </a>
                        <a href="" class="career_path_um">
                            UM
                        </a>
                        <a href="" class="career_path_sum">
                            SUM
                        </a>
                        <a href="" class="career_path_dm">
                            DM
                        </a>
                        <a href="" class="career_path_sdm">
                            SDM
                        </a>
                        <a href="" class="career_path_avp">
                            AVP
                        </a>
                        <a href="" class="career_path_vp">
                            VP
                        </a>
                        <a href="" class="career_path_evp">
                            EVP
                        </a>
                        <a href="" class="career_path_sevp">
                            SEVP
                        </a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12 bottom-content-career-path tt">

            <p class="mt-2 title-career-path px-3 title-right">ทางเลือกของเส้นทางสู่ตำแหน่ง</p>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills_career_path_ag" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="content-career">

                        <div class="career-item" onclick="select_career_path('ag1' ,'select')">
                            <div class="w-100 content-career-path">
                                <img src="{{url('img/icon/square_empty.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                                <div class="p-4 detail-career-path">
                                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                                </div>
                            </div>
                        </div>

                        <div class="career-item" onclick="select_career_path('ag2' ,'select')">
                            <div class="w-100 content-career-path">
                                <img src="{{url('img/icon/preview-img2.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                                <div class="p-4 detail-career-path">
                                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                                </div>
                            </div>
                        </div>

                        <div class="career-item" onclick="select_career_path('ag3' ,'select')">
                            <div class="w-100 content-career-path">
                                <img src="{{url('img/icon/content-career-path.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                                <div class="p-4 detail-career-path">
                                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills_career_path_um" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="content-career">
                        <div class="career-item">
                            <div class="w-100 content-career-path">
                                <img src="{{url('img/icon/square_empty.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                                <div class="p-4 detail-career-path">
                                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                                </div>
                            </div>
                        </div>

                        <div class="career-item">
                            <div class="w-100 content-career-path">
                                <img src="{{url('img/icon/preview-img2.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                                <div class="p-4 detail-career-path">
                                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                                </div>
                            </div>
                        </div>

                        <div class="career-item">
                            <div class="w-100 content-career-path">
                                <img src="{{url('img/icon/content-career-path.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                                <div class="p-4 detail-career-path">
                                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills_career_path_sum" role="tabpanel" aria-labelledby="pills-contact-tab">pills_career_path_sum</div>
                <div class="tab-pane fade" id="pills_career_path_dm" role="tabpanel" aria-labelledby="pills-home-tab">pills_career_path_dm</div>
                <div class="tab-pane fade" id="pills_career_path_sdm" role="tabpanel" aria-labelledby="pills-profile-tab">pills_career_path_sdm</div>
                <div class="tab-pane fade" id="pills_career_path_avp" role="tabpanel" aria-labelledby="pills-contact-tab">pills_career_path_avp</div>
                <div class="tab-pane fade" id="pills_career_path_vp" role="tabpanel" aria-labelledby="pills-home-tab">pills_career_path_vp</div>
                <div class="tab-pane fade" id="pills_career_path_evp" role="tabpanel" aria-labelledby="pills-profile-tab">pills_career_path_evp</div>
                <div class="tab-pane fade" id="pills_career_path_sevp" role="tabpanel" aria-labelledby="pills-contact-tab">pills_career_path_sevp</div>
            </div>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>


            <!-- <div class="w-100 content-career-path">
                <img src="{{url('img/icon/content-career-path.png')}}" style="width: 100%;object-fit: cover;height: 150px;" alt="">
                <div class="p-4 detail-career-path">
                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                </div>
            </div>
            <div class="w-100 content-career-path">
                <img src="{{url('img/icon/square_empty.png')}}" alt="">
                <div class="p-4 detail-career-path">
                    <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                    <p class="m-0 name-career-path"><i>UM basic</i> </p>
                </div>
            </div> -->

        </div>
    </div>
    <div class="d-flex justify-content-center d-none" id="select_content">
        <div class="col-12 bottom-content-career-path tt" style="max-width: 900px;">
            <div class="career-item" style="cursor: auto;">
                <div class="w-100 content-career-path">
                    <img src="{{url('img/icon/preview-img2.png')}}" style="width: 100%;object-fit: cover;height: 134px;" alt="">

                    <div class="p-4 detail-career-path">
                        <div class="d-flex">
                            <a class="mx-3" style="cursor: pointer;" onclick="back_btn()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 14 26" fill="none">
                                    <path d="M13 1L1 13L13 25" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>

                            <div>
                                <p class=" name-career-path mb-2">Story 1 : แนะนำพื้นฐาน UM</p>
                                <p class="m-0 name-career-path"><i>UM basic</i> </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <style>
                .category-career-item {
                    border-radius: 10px;
                    background: #EBF1FD;
                    display: flex;
                    align-items: center;
                    padding: 15px;
                    margin-bottom: 15px !important;
                    position: relative;
                    max-width: 477px;
                    margin: auto;

                }

                .title_cat {
                    color: #003781;
                    font-size: 16px;
                    font-style: italic;
                    font-weight: 400;
                    line-height: 150%;
                    /* 24px */
                    letter-spacing: -0.304px;
                }

                .type_cat {
                    color: #848BA1;
                    font-size: 10px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                }

                .cat_recommend {
                    position: absolute;
                    top: 0%;
                    right: -2%;
                    transform: translate(-50%, -50%);
                    border-radius: 10px;
                    background: #99B7DF;
                    color: #FFF;
                    font-size: 12px;
                    font-style: normal;
                    font-weight: 500;
                    line-height: normal;
                    padding: 2px 10px;
                }

                .detail_career {
                    color: #373737;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                    margin: 20px 0 40px 0;
                }

                .btn-download-career-path {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: #FFF;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                    border-radius: 25px;
                    background: #003781;
                    width: 100%;
                    border: none !important;
                    padding: 5px 0;
                }
            </style>
            <div class="w-100" id="show_content">
                <div class="d-flex justify-content-center py-5 px-3">
                    <div class=" w-100 d-none" style="max-width: 900px;" id="category_career">
                        <a href="#" class="category-career-item w-100" onclick="select_career_path(1 , 'category')">
                            <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="36" height="40" viewBox="0 0 36 40" fill="none">
                                <path d="M32 0H6C3.588 0 0 1.598 0 6V34C0 38.402 3.588 40 6 40H36V36H6.024C5.1 35.976 4 35.612 4 34C4 33.798 4.018 33.618 4.048 33.454C4.272 32.302 5.216 32.02 6.024 32H36V4C36 2.93913 35.5786 1.92172 34.8284 1.17157C34.0783 0.421427 33.0609 0 32 0ZM32 18L28 16L24 18V4H32V18Z" fill="#003781" />
                            </svg>
                            <div>
                                <p class="title_cat m-0">Basic ของ นักขาย Agent Level</p>
                                <p class="type_cat m-0">PDF : 10 mins</p>
                            </div>
                            <div class="cat_recommend">
                                <p class="m-0">แนะนำ</p>
                            </div>
                        </a>
                        <a href="#" class="category-career-item w-100" onclick="select_career_path(2 , 'category')">
                            <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="32" height="46" viewBox="0 0 32 46" fill="none">
                                <path d="M8 30.8572V28.5715H10.2857V30.8572H8Z" fill="#003781" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4286 0C10.5193 0 9.64719 0.361224 9.00421 1.00421C8.36122 1.64719 8 2.51926 8 3.42857H3.42857C2.51926 3.42857 1.64719 3.7898 1.0042 4.43278C0.361223 5.07576 0 5.94783 0 6.85714V42.2857C0 43.195 0.361223 44.0671 1.0042 44.7101C1.64719 45.3531 2.51926 45.7143 3.42857 45.7143H28.5714C29.4807 45.7143 30.3528 45.3531 30.9958 44.7101C31.6388 44.0671 32 43.195 32 42.2857V6.85714C32 5.94783 31.6388 5.07576 30.9958 4.43278C30.3528 3.7898 29.4807 3.42857 28.5714 3.42857H24C24 2.51926 23.6388 1.64719 22.9958 1.00421C22.3528 0.361224 21.4807 0 20.5714 0H11.4286ZM10.2857 3.42857C10.2857 3.12547 10.4061 2.83478 10.6204 2.62045C10.8348 2.40612 11.1255 2.28571 11.4286 2.28571H20.5714C20.8745 2.28571 21.1652 2.40612 21.3796 2.62045C21.5939 2.83478 21.7143 3.12547 21.7143 3.42857V5.71429C21.7143 6.01739 21.5939 6.30808 21.3796 6.52241C21.1652 6.73674 20.8745 6.85714 20.5714 6.85714H11.4286C11.1255 6.85714 10.8348 6.73674 10.6204 6.52241C10.4061 6.30808 10.2857 6.01739 10.2857 5.71429V3.42857ZM6.85714 18.2857C6.55404 18.2857 6.26335 18.4061 6.04902 18.6204C5.83469 18.8348 5.71429 19.1255 5.71429 19.4286C5.71429 19.7317 5.83469 20.0224 6.04902 20.2367C6.26335 20.451 6.55404 20.5714 6.85714 20.5714H14.8571C15.1602 20.5714 15.4509 20.451 15.6653 20.2367C15.8796 20.0224 16 19.7317 16 19.4286C16 19.1255 15.8796 18.8348 15.6653 18.6204C15.4509 18.4061 15.1602 18.2857 14.8571 18.2857H6.85714ZM5.71429 13.7143C5.71429 13.4112 5.83469 13.1205 6.04902 12.9062C6.26335 12.6918 6.55404 12.5714 6.85714 12.5714H24.5714C24.8745 12.5714 25.1652 12.6918 25.3796 12.9062C25.5939 13.1205 25.7143 13.4112 25.7143 13.7143C25.7143 14.0174 25.5939 14.3081 25.3796 14.5224C25.1652 14.7367 24.8745 14.8571 24.5714 14.8571H6.85714C6.55404 14.8571 6.26335 14.7367 6.04902 14.5224C5.83469 14.3081 5.71429 14.0174 5.71429 13.7143ZM5.71429 27.4286C5.71429 27.1255 5.83469 26.8348 6.04902 26.6204C6.26335 26.4061 6.55404 26.2857 6.85714 26.2857H11.4286C11.7317 26.2857 12.0224 26.4061 12.2367 26.6204C12.451 26.8348 12.5714 27.1255 12.5714 27.4286V32C12.5714 32.3031 12.451 32.5938 12.2367 32.8081C12.0224 33.0225 11.7317 33.1429 11.4286 33.1429H6.85714C6.55404 33.1429 6.26335 33.0225 6.04902 32.8081C5.83469 32.5938 5.71429 32.3031 5.71429 32V27.4286ZM20.5714 32C21.4807 32 22.3528 31.6388 22.9958 30.9958C23.6388 30.3528 24 29.4807 24 28.5714C24 27.6621 23.6388 26.79 22.9958 26.1471C22.3528 25.5041 21.4807 25.1429 20.5714 25.1429C19.6621 25.1429 18.79 25.5041 18.1471 26.1471C17.5041 26.79 17.1429 27.6621 17.1429 28.5714C17.1429 29.4807 17.5041 30.3528 18.1471 30.9958C18.79 31.6388 19.6621 32 20.5714 32ZM13.7143 37.1429C13.7143 34.7246 18.2823 33.5063 20.5714 33.5063C22.8606 33.5063 27.4286 34.7246 27.4286 37.1429V40H13.7143V37.1429Z" fill="#003781" />
                            </svg>
                            <div>
                                <p class="title_cat m-0">ข้อควรระวังที่น้องใหม่ควรรู้</p>
                                <p class="type_cat m-0">Read : 5 mins</p>
                            </div>
                        </a>

                        <a href="#" class="category-career-item w-100" onclick="select_career_path(3 , 'category')">
                            <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="42" height="39" viewBox="0 0 42 39" fill="none">
                                <path d="M7 0C5.14348 0 3.36301 0.741888 2.05025 2.06246C0.737498 3.38303 0 5.1741 0 7.04167V26.5417C0 28.4092 0.737498 30.2003 2.05025 31.5209C3.36301 32.8414 5.14348 33.5833 7 33.5833H29.6154C31.4719 33.5833 33.2524 32.8414 34.5651 31.5209C35.8779 30.2003 36.6154 28.4092 36.6154 26.5417V7.04167C36.6154 5.1741 35.8779 3.38303 34.5651 2.06246C33.2524 0.741888 31.4719 0 29.6154 0H7ZM12.9231 22.2083V10.2938C12.9232 10.0022 13.0013 9.71592 13.1493 9.4651C13.2972 9.21428 13.5096 9.00814 13.764 8.86831C14.0184 8.72848 14.3056 8.66011 14.5953 8.67038C14.8851 8.68065 15.1667 8.76917 15.4108 8.92667L25.3572 15.3378C25.5093 15.4358 25.6344 15.5708 25.7211 15.7302C25.8078 15.8896 25.8532 16.0683 25.8532 16.25C25.8532 16.4317 25.8078 16.6104 25.7211 16.7698C25.6344 16.9292 25.5093 17.0642 25.3572 17.1622L15.4108 23.5733C15.1667 23.7308 14.8851 23.8194 14.5953 23.8296C14.3056 23.8399 14.0184 23.7715 13.764 23.6317C13.5096 23.4919 13.2972 23.2857 13.1493 23.0349C13.0013 22.7841 12.9232 22.4978 12.9231 22.2062M12.3846 39C11.2087 39.0005 10.0517 38.703 9.02025 38.135C7.98881 37.567 7.11624 36.7468 6.48308 35.75H30.6923C32.8344 35.75 34.8888 34.894 36.4036 33.3702C37.9183 31.8465 38.7692 29.7799 38.7692 27.625V6.52167C39.7601 7.1586 40.5755 8.03637 41.1401 9.07394C41.7048 10.1115 42.0005 11.2755 42 12.4583V27.625C42 33.9083 36.9385 39 30.6923 39H12.3846Z" fill="#003781" />
                            </svg>
                            <div>
                                <p class="title_cat m-0">เรื่องเล่าจากคนสำเร็จรวดเร็ว</p>
                                <p class="type_cat m-0">Video : 5 mins</p>
                            </div>
                            <div class="cat_recommend">
                                <p class="m-0">แนะนำ</p>
                            </div>
                        </a>

                        <a href="#" class="category-career-item w-100" onclick="select_career_path(4 , 'category')">
                            <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="42" height="39" viewBox="0 0 42 39" fill="none">
                                <path d="M7 0C5.14348 0 3.36301 0.741888 2.05025 2.06246C0.737498 3.38303 0 5.1741 0 7.04167V26.5417C0 28.4092 0.737498 30.2003 2.05025 31.5209C3.36301 32.8414 5.14348 33.5833 7 33.5833H29.6154C31.4719 33.5833 33.2524 32.8414 34.5651 31.5209C35.8779 30.2003 36.6154 28.4092 36.6154 26.5417V7.04167C36.6154 5.1741 35.8779 3.38303 34.5651 2.06246C33.2524 0.741888 31.4719 0 29.6154 0H7ZM12.9231 22.2083V10.2938C12.9232 10.0022 13.0013 9.71592 13.1493 9.4651C13.2972 9.21428 13.5096 9.00814 13.764 8.86831C14.0184 8.72848 14.3056 8.66011 14.5953 8.67038C14.8851 8.68065 15.1667 8.76917 15.4108 8.92667L25.3572 15.3378C25.5093 15.4358 25.6344 15.5708 25.7211 15.7302C25.8078 15.8896 25.8532 16.0683 25.8532 16.25C25.8532 16.4317 25.8078 16.6104 25.7211 16.7698C25.6344 16.9292 25.5093 17.0642 25.3572 17.1622L15.4108 23.5733C15.1667 23.7308 14.8851 23.8194 14.5953 23.8296C14.3056 23.8399 14.0184 23.7715 13.764 23.6317C13.5096 23.4919 13.2972 23.2857 13.1493 23.0349C13.0013 22.7841 12.9232 22.4978 12.9231 22.2062M12.3846 39C11.2087 39.0005 10.0517 38.703 9.02025 38.135C7.98881 37.567 7.11624 36.7468 6.48308 35.75H30.6923C32.8344 35.75 34.8888 34.894 36.4036 33.3702C37.9183 31.8465 38.7692 29.7799 38.7692 27.625V6.52167C39.7601 7.1586 40.5755 8.03637 41.1401 9.07394C41.7048 10.1115 42.0005 11.2755 42 12.4583V27.625C42 33.9083 36.9385 39 30.6923 39H12.3846Z" fill="#003781" />
                            </svg>
                            <div>
                                <p class="title_cat m-0">ทำยังไงถึงจะได้เลื่อนขั้น?</p>
                                <p class="type_cat m-0">PDF : 10 mins</p>
                            </div>
                        </a>

                        <a href="#" class="category-career-item w-100" onclick="select_career_path(5 , 'category')">
                            <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
                                <path d="M29.8347 9.2688H12.224C10.6019 9.2688 9.26953 10.6012 9.26953 12.2232V29.7761C9.26953 31.1664 10.1964 32.2671 11.4709 32.6147L25.0265 19.1169C26.6486 17.4949 29.3134 17.4949 30.9933 19.1169L32.7892 20.9128V12.2232C32.7313 10.6012 31.4568 9.2688 29.8347 9.2688ZM16.6846 21.4341C14.1357 21.4341 12.1081 19.4066 12.1081 16.8577C12.1081 14.3087 14.1357 12.2812 16.6846 12.2812C19.2335 12.2812 21.2611 14.3087 21.2611 16.8577C21.2611 19.4066 19.2335 21.4341 16.6846 21.4341Z" fill="#003781" />
                                <path d="M16.6838 18.8852C17.8036 18.8852 18.7114 17.9774 18.7114 16.8576C18.7114 15.7378 17.8036 14.8301 16.6838 14.8301C15.564 14.8301 14.6562 15.7378 14.6562 16.8576C14.6562 17.9774 15.564 18.8852 16.6838 18.8852Z" fill="#003781" />
                                <path d="M26.8217 20.9127L15.0039 32.7304H29.834C31.4561 32.7304 32.7885 31.398 32.7885 29.776V24.4464L29.1968 20.8547C28.5596 20.2754 27.4589 20.2754 26.8217 20.9127Z" fill="#003781" />
                                <path d="M33.1361 0H8.86332C3.99718 0 0 3.99718 0 8.86332V33.1361C0 38.0601 3.99718 41.9994 8.86332 41.9994H33.1361C38.0601 41.9994 41.9994 38.0022 41.9994 33.1361V8.86332C42.0573 3.99718 38.0601 0 33.1361 0ZM35.2795 29.834C35.2795 32.8464 32.8464 35.3374 29.7761 35.3374H12.2233C9.2109 35.3374 6.7199 32.9043 6.7199 29.834V12.2233C6.7199 9.2109 9.15297 6.7199 12.2233 6.7199H29.7761C32.7885 6.7199 35.2795 9.15297 35.2795 12.2233V29.834Z" fill="#003781" />
                            </svg>
                            <div>
                                <p class="title_cat m-0">ทำยังไงถึงจะได้เลื่อนขั้น?</p>
                                <p class="type_cat m-0">Gallery : 3 pictures</p>
                            </div>
                        </a>

                    </div>

                    <div class=" w-100 d-none" style="max-width: 1000px;" id="content_career">
                        <div class="d-flex align-items-center">
                            <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="36" height="40" viewBox="0 0 36 40" fill="none">
                                <path d="M32 0H6C3.588 0 0 1.598 0 6V34C0 38.402 3.588 40 6 40H36V36H6.024C5.1 35.976 4 35.612 4 34C4 33.798 4.018 33.618 4.048 33.454C4.272 32.302 5.216 32.02 6.024 32H36V4C36 2.93913 35.5786 1.92172 34.8284 1.17157C34.0783 0.421427 33.0609 0 32 0ZM32 18L28 16L24 18V4H32V18Z" fill="#003781" />
                            </svg>
                            <div>
                                <p class="title_cat m-0">PDF: Basic ของ นักขาย Agent Level</p>
                                <p class="type_cat m-0">PDF : 10 mins</p>
                            </div>
                        </div>

                        <div class="detail_career">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>

                        <button class="btn-download-career-path">
                            <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="23" height="27" viewBox="0 0 23 27" fill="none">
                                <path d="M6.70089 10.082C6.59278 10.082 6.44864 10.082 6.23242 10.1157V12.4086C6.4126 12.4086 6.52071 12.4086 6.66485 12.4086C7.09729 12.4086 7.38557 12.2737 7.56575 12.004C7.7099 11.8017 7.78197 11.5319 7.78197 11.1947C7.78197 10.4192 7.42161 10.082 6.70089 10.082Z" fill="white" />
                                <path d="M3.38594 10.082C3.27784 10.082 3.13369 10.082 3.09766 10.082V11.0262C3.13369 11.0262 3.27784 11.0599 3.34991 11.0599C4.07063 11.0599 4.1427 10.7901 4.1427 10.5541C4.1427 10.4192 4.1427 10.082 3.38594 10.082Z" fill="white" />
                                <path d="M13.4765 9.20462C13.4765 8.49653 12.8639 7.95703 12.1431 7.95703H1.69271C0.935951 7.95703 0.359375 8.53025 0.359375 9.20462V13.3183C0.359375 14.0264 0.971987 14.5659 1.69271 14.5659H12.1431C12.8999 14.5659 13.4765 13.9927 13.4765 13.3183V9.20462ZM4.50351 11.4638C4.17919 11.6998 3.78279 11.8009 3.27829 11.8009C3.20622 11.8009 3.09811 11.8009 3.09811 11.8009V13.2171H2.23325V9.44065L2.41343 9.40693C2.77379 9.33949 3.13415 9.30577 3.42243 9.30577C3.92694 9.30577 4.32333 9.40693 4.57558 9.60924C4.86387 9.84527 5.04405 10.115 5.04405 10.4859C5.00802 10.9243 4.86387 11.2277 4.50351 11.4638ZM8.21522 12.509C7.85486 12.9137 7.31432 13.1497 6.5936 13.1497C6.37738 13.1497 6.05306 13.116 5.58459 13.0823L5.47648 13.0485V9.44065L5.58459 9.40693C6.16117 9.33949 6.52153 9.30577 6.73774 9.30577C7.42243 9.30577 7.92693 9.50808 8.25125 9.87899C8.53954 10.1825 8.64765 10.6208 8.64765 11.1266C8.64765 11.7335 8.50351 12.1718 8.21522 12.509ZM11.6026 10.115H9.87287V10.8231H11.4585V11.6324H9.87287V13.2171H8.97197V9.40693H11.6026V10.115Z" fill="white" />
                                <path d="M14.198 0V0.0337186H4.5764C3.81964 0.0337186 3.20703 0.573215 3.20703 1.24759V7.31693H4.32415V1.88824C4.32415 1.41618 4.72054 1.04528 5.22505 1.04528H14.198V6.94602C14.198 7.62039 14.8106 8.22733 15.5313 8.22733H21.8376V22.6926C21.8376 23.1646 21.4412 23.5356 20.9367 23.5356H16.9007C16.8647 23.5693 16.8647 23.603 16.8286 23.6367L16.0719 24.5471H21.5854C22.3421 24.5471 22.9187 23.9739 22.9187 23.2658V8.19361L14.198 0Z" fill="white" />
                                <path d="M9.26108 23.5693H5.22505C4.72054 23.5693 4.32415 23.1984 4.32415 22.7263V15.1396H3.20703V23.2995C3.20703 24.0076 3.81964 24.5808 4.5764 24.5808H10.0899L9.33315 23.6704C9.33315 23.6367 9.29711 23.603 9.26108 23.5693Z" fill="white" />
                                <path d="M15.9999 22.7938H14.5585V18.1406C14.5585 17.8371 14.3062 17.5674 13.9819 17.5674H12.1801C11.8558 17.5674 11.5675 17.8371 11.5675 18.1406V22.7938H10.1261C9.83777 22.7938 9.65759 23.0972 9.83777 23.2995L12.7567 26.8737C12.9008 27.0423 13.1891 27.0423 13.3333 26.8737L16.2522 23.2995C16.4684 23.0972 16.2882 22.7938 15.9999 22.7938Z" fill="white" />
                            </svg>
                            <span>ดาวน์โหลด PDF</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var type_career
    function select_career_path(career ,type) {
        console.log(career);
        console.log(type);

        let select_lavel = document.querySelector('#select_lavel');
        let select_content = document.querySelector('#select_content');
        let show_content = document.querySelector('#show_content');
        let category_career = document.querySelector('#category_career');
        let content_career = document.querySelector('#content_career');
        type_career = type;
        switch (type) {
            case 'select':
                select_lavel.classList.add('d-none');
                select_content.classList.remove('d-none');
                category_career.classList.remove('d-none');
                content_career.classList.add('d-none');

            break;
            case 'category':
                select_lavel.classList.add('d-none');
                select_content.classList.remove('d-none');
                category_career.classList.add('d-none');
                content_career.classList.remove('d-none');
            break;
            default:
                
            break;
        }
    
    }

    function back_btn() {
        console.log(type_career);

        switch (type_career) {
            case 'select':
                select_lavel.classList.remove('d-none');
                select_content.classList.add('d-none');
                category_career.classList.add('d-none');
                content_career.classList.remove('d-none');


            break;
            case 'category':
                select_lavel.classList.add('d-none');
                select_content.classList.remove('d-none');
                category_career.classList.remove('d-none');
                content_career.classList.add('d-none');
                type_career = 'select';

            break;
            default:
                
            break;
        }
    }
</script>

<!-- <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Career_paths</div>
                    <div class="card-body">
                        <a href="{{ url('/career_paths/create') }}" class="btn btn-success btn-sm" title="Add New Career_path">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/career_paths') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name Rank</th><th>Number Story</th><th>Title Story</th><th>Description Story</th><th>Photo Story</th><th>User View</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($career_paths as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name_rank }}</td><td>{{ $item->number_story }}</td><td>{{ $item->title_story }}</td><td>{{ $item->description_story }}</td><td>{{ $item->photo_story }}</td><td>{{ $item->user_view }}</td>
                                        <td>
                                            <a href="{{ url('/career_paths/' . $item->id) }}" title="View Career_path"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/career_paths/' . $item->id . '/edit') }}" title="Edit Career_path"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/career_paths' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Career_path" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $career_paths->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection