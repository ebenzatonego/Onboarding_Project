@extends('layouts.theme_user')

@section('content')
<style>
    /* body{
        height: 100dvh;
        overflow: hidden;
    } */
    .container-content {
        padding-top: 25px;
        padding-left: 0 !important;
        padding-right: 0 !important;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    @media only screen and (max-width: 767px) {
        .menu-tools {
            font-size: 14px;
            margin: 3px;
        }

        .img-download {
            width: 100%;
            height: 21px !important;
            object-fit: contain;
        }

        .section-third {
            padding: 49px 24px;
        }

        .section-four {
            padding: 0 25px;
        }

        .img-our-business {

            width: 109px;
            height: 68px;
            flex-shrink: 0;
        }

        .container-btn-our-business {
            justify-content: end;
        }

        .our-business {
            padding-left: 26px;
            padding-right: 24px;
        }

        .detail-our-business {
            text-align: left;
            text-indent: 40px;
        }

        .contact {
            width: 100%;
            margin-top: 30px;
        }

        .btn-contact {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .map-company {
            width: 100%;
            max-width: 393px;
            height: 216px;
            flex-shrink: 0;
        }
        .social-media img{
            width: 38px;
            height: 38px;
        }
        .social-media{
            margin-left: 22px;
            margin-right: 22px;
        }
    }


    @media screen and (min-width: 767px) {
        .menu-tools {
            font-size: 18px;
            margin: 10px;
        }

        #pills-tools {
            padding: 0 50px !important;
        }

        .img-download {
            width: 100%;
            height: 35px !important;
            object-fit: contain;
        }

        .section-third {
            padding: 62px 75px;
        }

        .img-our-business {
            width: 109px;
            height: 68px;
            flex-shrink: 0;
        }

        .item-our-business {
            margin-bottom: 2rem;
        }

        .container-btn-our-business {
            justify-content: center;
        }

        .detail-our-business {
            text-align: center;
        }

        .contact {
            display: flex;
            justify-content: center;
            margin: 30px 0 44px 0;
        }

        .map-company {
            width: 100%;
            max-width: 590px;
            height: 322px;
            flex-shrink: 0;
        }
        .social-media img{
            width:45px;
            height:45px;
        }
        .social-media{
            margin-left: 40px;
            margin-right: 40px;
        }
    }

    .menu-tools {
        color: #B8C6D8;
        border-radius: 15px !important;
        border: 1px solid #B8C6D8;
        background: #FFF;
        padding: 0 15px;
        text-align: center;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        width: fit-content;
    }

    .menu-tools.active {
        background: rgba(36, 50, 134, 1) !important;
        color: #fff;
        font-weight: bolder;

    }

    .title-tools {
        color: #003781;
        text-align: center;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 150%;
        /* 30px */
        letter-spacing: -0.38px;
    }

    .tabs {
        display: flex;
        position: relative;
        background-color: rgba(242, 242, 250, 1);
        box-shadow: 0 0 1px 0 rgba(24, 94, 224, 0.15), 0 6px 12px 0 rgba(24, 94, 224, 0.15);
        /* padding:  0 15px; */
        border-radius: 99px;
        width: 80%;
        max-width: 500px;
    }

    .tabs * {
        z-index: 2;
    }

    .container-tap input[type="radio"] {
        display: none;
    }

    .tab {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 38px;
        width: 40%;
        font-size: .8rem;
        color: #989898;
        font-weight: 500;
        border-radius: 99px;
        cursor: pointer;
        transition: color 0.15s ease-in;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
    }

    .container-tap input[type="radio"]:checked+label {
        color: rgba(36, 50, 134, 1);
    }


    .container-tap input[id="radio-1"]:checked~.glider {
        transform: translateX(0);
    }

    .container-tap input[id="radio-2"]:checked~.glider {
        transform: translateX(100%);
    }

    .container-tap input[id="radio-3"]:checked~.glider {
        transform: translateX(200%);
    }

    .glider {
        position: absolute;
        display: flex;
        height: 38px;
        width: 33%;

        background: #FFF;
        box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.25);
        z-index: 1;
        border-radius: 99px;
        transition: 0.25s ease-out;
    }

    .w-80 {
        width: 80%;
    }

    .tools-item {
        display: flex;
        margin-bottom: 30px;
    }

    .tools-item img {
        width: 80px;
        height: 80px;
    }

    .btn-create-tools {
        color: #FFF;
        text-align: center;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 150%;
        /* 24px */
        letter-spacing: -0.304px;
        border-radius: 14px;
        background: #0E2B81;
        padding: 0 10px;
        width: 80%;
    }

    .tools-item i {
        font-size: 21px;
    }

    .company-name {
        font-size: 12px;
        color: #3ea385;
    }

    .btn-close-modal {
        background-color: #003781;
        color: #fff;
        width: 42px;
        height: 42px;
        position: absolute;
        bottom: -90px;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        font-size: 32px;
        line-height: 0;
        border: none !important;
    }

    .text-detail-app {
        color: #373737;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .container-contact {
        max-width: 500px;

    }

    .contact-item div {
        padding: 15px;
    }

    .contact-item:nth-child(odd) div {
        border-radius: 10px;
        border: 1px solid #88AEE1;
        background: #EBF1FD !important;
        box-shadow: 0px -2px 40px 0px rgba(200, 200, 200, 0.50);
    }

    .contact-item:nth-child(even) div {
        border-radius: 10px;
        border: 1px solid #B2C0DC;
        background: #DEE9FF !important;
        box-shadow: 0px -2px 40px 0px rgba(200, 200, 200, 0.50);
    }

    .contact-title {
        color: #003781;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-bottom: 5px;
    }

    .contact-phone {
        color: #262D33;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .contact-mail {
        color: #243286;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-decoration-line: underline;
    }

    .title-coc {
        color: #1E1E1E;
        text-align: center;
        font-size: 15px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .detail-coc {
        color: #003781;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-top: 20px;
        max-height: 55dvh;
        overflow: auto;
    }

    .btn-submit-coc {
        margin-bottom: 50px;
        width: 100%;
        max-width: 463px;
        border-radius: 50px;
        background: #989898;
        border: none !important;
        padding: 10px 0;
        color: #FFF;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        margin-top: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: all .15s ease-in-out;
    }

    .btn-submit-coc.active {
        background: #69A51B !important;
    }

    .btn-submit-coc input {
        height: 17px;
        width: 17px;
        margin: 7px;
        border-radius: 5px !important;
        background: #FFF;
    }

    .input-hidden {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .svg-visible {
        display: inline-block;
        opacity: 0;
        animation: fadeIn 0.5s forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .detail-tools {
        margin-top: 15px;
        color: #003781;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-align: left;
        margin-bottom: 0;
    }

    .owl-nav {
        margin-top: 0;
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        display: flex;
        justify-content: space-between;
        pointer-events: none;
    }

    .owl-nav button span {
        font-size: 30px;

    }

    .owl-stage-outer {
        position: relative;
    }

    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots .owl-dot:hover span {
        background: #003781;
    }

    .owl-prev.disabled,
    .owl-next.disabled {
        opacity: 0 !important;
    }

    .owl-prev,
    .owl-next {
        pointer-events: all;
    }

    .owl-dots {
        margin-top: 20px;
    }

    .owl-prev:focus,
    .owl-next:focus,
    .owl-prev:hover,
    .owl-next:hover {
        border: none !important;
        outline: 0 !important;
        background-color: none !important;
        box-shadow: none !important;
    }

    .profile-company {
        width: 100%;
        flex-shrink: 0;
        object-fit: cover;
    }

    @media only screen and (max-width: 990px) {
        .profile-company {
            height: 165px;

        }

        .content-section {
            padding: 0;
        }
    }

    @media screen and (min-width: 991px) {
        .profile-company {
            height: 255px;

        }
    }

    .title-text-company {
        color: #223D7C;
        text-align: center;
        font-size: 16px;
        font-style: normal;
        font-weight: bolder;
        line-height: normal;
    }

    #pills-conpany {
        width: 100% !important;
        overflow: hidden;
    }

    .coc {
        padding: 0 20px 40px 20px !important;
    }

    #pills-tutorials,
    #pills-tools {
        padding: 0 20px 80px 20px !important;
    }

    /* .tab-content{
        overflow: auto !important;
        height: calc(100dvh - 134px);
    } */
    @media only screen and (max-width: 402px) {
        .menu-tools {
            font-size: 10px;
            margin: 3px;
        }
    }
</style>


<div class="container p-0 conteiner-detail-news">
    <div class="w-100">

        <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link menu-tools " id="pills-conpany-tab" data-toggle="pill" href="#pills-conpany" role="tab" aria-controls="pills-conpany" aria-selected="true">ข้อมูลบริษัท</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link menu-tools active" id="pills-tools-tab" data-toggle="pill" href="#pills-tools" role="tab" aria-controls="pills-tools" aria-selected="false">Tools</a>
            </li>
            <li class="nav-item " onclick="show_tools_contact();">
                <a class="nav-link menu-tools" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">ติดต่อ</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link menu-tools" id="pills-coc-tab" data-toggle="pill" href="#pills-coc" role="tab" aria-controls="pills-coc" aria-selected="false">COC</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link menu-tools" id="pills-tutorials-tab" data-toggle="pill" href="#pills-tutorials" role="tab" aria-controls="pills-tutorials" aria-selected="false">Tutorials</a>
            </li>
        </ul>
    </div>
    <div class="tab-content mb-5" id="pills-tabContent">
        <div class="tab-pane fade " id="pills-conpany" role="tabpanel" aria-labelledby="pills-home-tab">
            <img src="{{url('img/icon/profile-company.png')}}" alt="" class="profile-company">
            <div class="text-center">
                <img src="{{url('img/logo/logo-alianz2.png')}}" alt="" width="109" height="36" class="mt-4">
                <p class="mt-3 title-text-company">อลิอันซ์ อยุธยา เคียงข้างทุกจังหวะชีวิต</p>
                <p class="px-3 mb-4 text-start" style="color: #373737;font-size: 15px;font-style: normal;font-weight: 700;line-height: normal;text-indent: 40px;">อลิอันซ์ อยุธยา แบรนด์ประกันชั้นนำของประเทศไทย เป็นส่วนหนึ่งของกลุ่มอลิอันซ์ซี่งเป็นกลุ่มบริการทางการเงินชั้นนำระดับโลก กลุ่มอลิอันซ์
                    ก่อตั้งขึ้น ตั้งแต่ปี พ.ศ. 2433 ณ เมืองมิวนิค ประเทศเยอรมนี ปัจจุบัน ดำเนินธุรกิจในกว่า 70 ประเทศทั่วโลก</p>
                <center class="px-3 w-100 ">
                    <hr style="max-width: 590px;">
                </center>

                <p class="px-3 mt-4 text-start mb-0" style="color: #373737;font-size: 15px;font-style: normal;font-weight: 400;line-height: normal;text-indent: 40px;">
                    กลุ่มอลิอันซ์ เริ่มดำเนินธุรกิจในเอเชียมาตั้งแต่ ปี พ.ศ. 2453 ปัจจุบัน เอเชีย เป็นผู้สร้างความเติบโตทางธุรกิจให้กับกลุ่มอลิอันซ์เป็นอย่างมาก โดยเรามีฐานลูกค้ากว่า 21 ล้านคน ใน 16 ประเทศ รวมถึงประเทศไทยด้วย
                </p>
                <p class="px-3 mt-0 text-start mb-0" style="color: #373737;font-size: 15px;font-style: normal;font-weight: 400;line-height: normal;text-indent: 40px;">
                    หนึ่งในผู้ถือหุ้นหลักของอลิอันซ์ อยุธยา คือกลุ่มอลิอันซ์ซึ่งเป็นกลุ่มบริการทางการเงินชั้นนำระดับโลก ดังนั้น อลิอันซ์ อยุธยา จึงเป็นบริษัทประกันที่มีความมั่นคง แข็งแกร่ง และวางใจได้
                </p>
            </div>
            <style>
                .section-second {
                    background-color: #F0F5FF;
                    margin-top: 20px;
                    padding: 30px 20px;
                    display: flex;
                    justify-content: center;
                }

                .title-section-second {
                    color: #223D7C;
                    text-align: center;
                    font-size: 32px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                }

                .detail-section-second {
                    color: #373737;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                    text-indent: 40px;
                }

                .tilte-detail-section-second {
                    color: #223D7C;
                    font-size: 20px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;
                }

                .text-indent-5 {
                    text-indent: 5px !important;
                }

                .text-indent-0 {
                    text-indent: 0 !important;
                }

                .icon-section-second {
                    min-height: 25px;
                    min-width: 25px;
                }
            </style>
            <div class="section-second">
                <div>
                    <p class="title-section-second">
                        มั่นคง
                    </p>
                    <p class="detail-section-second">กลุ่มอลิอันซ์ ก่อตั้งมาตั้งแต่ พ.ศ. 2433 ในประเทศเยอรมนี ปัจจุบัน มีธุรกิจในกว่า 70 ประเทศทั่วโลก ณ สิ้นปี พ.ศ. 2562 กลุ่มอลิอันซ์ มีพนักงานมากกว่า 147,000 คน ให้บริการลูกค้ากว่า 100 ล้านรายทั่วโลก</p>
                    <center class="w-100 ">
                        <hr style="max-width: 590px;color: #223D7C;margin: 40px 0;">
                    </center>
                    <p class="title-section-second">
                        แข็งแกร่ง
                    </p>
                    <div class="d-flex justify-content-center">
                        <div>
                            <div class="mb-3 d-flex align-items-center">
                                <svg class="me-3 icon-section-second" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M12.5 0C5.59896 0 0 5.59896 0 12.5C0 19.401 5.59896 25 12.5 25C19.401 25 25 19.401 25 12.5C25 5.59896 19.401 0 12.5 0ZM18.9323 9.47917L11.5885 16.849C11.3542 17.0833 11.0156 17.2396 10.6771 17.2396C10.3385 17.2396 10 17.1094 9.76562 16.849L6.06771 13.151C5.54687 12.6302 5.54687 11.8229 6.06771 11.3021C6.58854 10.7812 7.39583 10.7812 7.91667 11.3021L10.6771 14.0625L17.1094 7.63021C17.6302 7.10937 18.4375 7.10937 18.9583 7.63021C19.4531 8.15104 19.4531 8.95833 18.9323 9.47917Z" fill="#223D7C" />
                                </svg>
                                <div>
                                    <span class="tilte-detail-section-second">Top 3</span>
                                    <span class="detail-section-second text-indent-5"> บริษัทประกันที่มีสินทรัพย์มากที่สุดในโลก</span>
                                </div>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <svg class="me-3 icon-section-second" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M12.5 0C5.59896 0 0 5.59896 0 12.5C0 19.401 5.59896 25 12.5 25C19.401 25 25 19.401 25 12.5C25 5.59896 19.401 0 12.5 0ZM18.9323 9.47917L11.5885 16.849C11.3542 17.0833 11.0156 17.2396 10.6771 17.2396C10.3385 17.2396 10 17.1094 9.76562 16.849L6.06771 13.151C5.54687 12.6302 5.54687 11.8229 6.06771 11.3021C6.58854 10.7812 7.39583 10.7812 7.91667 11.3021L10.6771 14.0625L17.1094 7.63021C17.6302 7.10937 18.4375 7.10937 18.9583 7.63021C19.4531 8.15104 19.4531 8.95833 18.9323 9.47917Z" fill="#223D7C" />
                                </svg>
                                <div>
                                    <span class="tilte-detail-section-second">Top 3 </span>
                                    <span class="detail-section-second text-indent-5"> ของบริษัทประกันชีวิตและสุขภาพที่ใหญ่ที่สุดในโลก</span>
                                </div>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <svg class="me-3 icon-section-second" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M12.5 0C5.59896 0 0 5.59896 0 12.5C0 19.401 5.59896 25 12.5 25C19.401 25 25 19.401 25 12.5C25 5.59896 19.401 0 12.5 0ZM18.9323 9.47917L11.5885 16.849C11.3542 17.0833 11.0156 17.2396 10.6771 17.2396C10.3385 17.2396 10 17.1094 9.76562 16.849L6.06771 13.151C5.54687 12.6302 5.54687 11.8229 6.06771 11.3021C6.58854 10.7812 7.39583 10.7812 7.91667 11.3021L10.6771 14.0625L17.1094 7.63021C17.6302 7.10937 18.4375 7.10937 18.9583 7.63021C19.4531 8.15104 19.4531 8.95833 18.9323 9.47917Z" fill="#223D7C" />
                                </svg>
                                <div>
                                    <span class="tilte-detail-section-second">Top 3 </span>
                                    <span class="detail-section-second text-indent-5"> ของบริษัทประกันวินาศภัยที่ใหญ่ที่สุดในโลก</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <svg class="me-3 mt-1 icon-section-second" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M12.5 0C5.59896 0 0 5.59896 0 12.5C0 19.401 5.59896 25 12.5 25C19.401 25 25 19.401 25 12.5C25 5.59896 19.401 0 12.5 0ZM18.9323 9.47917L11.5885 16.849C11.3542 17.0833 11.0156 17.2396 10.6771 17.2396C10.3385 17.2396 10 17.1094 9.76562 16.849L6.06771 13.151C5.54687 12.6302 5.54687 11.8229 6.06771 11.3021C6.58854 10.7812 7.39583 10.7812 7.91667 11.3021L10.6771 14.0625L17.1094 7.63021C17.6302 7.10937 18.4375 7.10937 18.9583 7.63021C19.4531 8.15104 19.4531 8.95833 18.9323 9.47917Z" fill="#223D7C" />
                                </svg>
                                <div>
                                    <span class="tilte-detail-section-second">ผู้นำระดับโลก </span>
                                    <span class="detail-section-second text-indent-5"> ด้านประกันการเดินทางและบริการความช่วยเหลือตลอด 24 ชั่วโมง</span>
                                </div>
                            </div>

                            <center class="w-100 ">
                                <hr style="max-width: 590px;color: #223D7C;margin: 40px 0;">
                            </center>
                            <p class="title-section-second">
                                น่าเชื่อถือ
                            </p>

                            <div class="mb-3 d-flex align-items-center">

                                <div style="margin-left: 41px;">
                                    <span class="detail-section-second text-indent-0">อันดับความน่าเชื่อถือระดับสูง จากสถาบันชั้นนำระดับโลก</span>
                                </div>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <svg class="me-3 icon-section-second" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M18.9016 1.83962L20.465 4.53504L23.1873 6.09838C23.3221 6.17924 23.376 6.31402 23.376 6.44879V9.57547L24.9394 12.2709C25.0202 12.4057 25.0202 12.5674 24.9394 12.6752L23.376 15.3706V18.4973C23.376 18.659 23.2682 18.7938 23.1334 18.8747L20.465 20.4111L18.8747 23.1604C18.7938 23.2951 18.659 23.3491 18.5243 23.376H15.3976L12.7022 24.9394C12.5674 25.0202 12.4057 25.0202 12.2978 24.9394L9.60243 23.376H6.44879C6.28706 23.376 6.15229 23.2682 6.07143 23.1334L4.53504 20.465L1.83962 18.8747C1.70485 18.7938 1.62399 18.659 1.62399 18.5243V15.3976L0.0606469 12.7022C-0.0202156 12.5674 -0.0202156 12.4057 0.0606469 12.2978L1.62399 9.60243V6.44879C1.62399 6.28706 1.70485 6.15229 1.83962 6.07143L4.53504 4.50809L6.09838 1.81267C6.17924 1.70485 6.31402 1.62399 6.44879 1.62399H9.57547L12.2709 0.0606469C12.4057 -0.0202156 12.5674 -0.0202156 12.6752 0.0606469L15.3706 1.62399H18.4973C18.686 1.62399 18.8208 1.70485 18.9016 1.83962ZM7.39218 15.2089L10.0067 17.2844C10.1685 17.4191 10.438 17.3922 10.5728 17.2305L17.6617 8.28167C17.7965 8.11995 17.7695 7.8504 17.6078 7.71563C17.4461 7.58086 17.1765 7.60782 17.0418 7.76954L10.1954 16.3949L7.87736 14.562C7.71563 14.4272 7.44609 14.4542 7.31132 14.6159C7.17655 14.8046 7.2035 15.0741 7.39218 15.2089Z" fill="#223D7C" />
                                </svg>
                                <div>
                                    <span class="tilte-detail-section-second">AA จาก Standard & Poor’s</span>
                                </div>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <svg class="me-3 icon-section-second" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M18.9016 1.83962L20.465 4.53504L23.1873 6.09838C23.3221 6.17924 23.376 6.31402 23.376 6.44879V9.57547L24.9394 12.2709C25.0202 12.4057 25.0202 12.5674 24.9394 12.6752L23.376 15.3706V18.4973C23.376 18.659 23.2682 18.7938 23.1334 18.8747L20.465 20.4111L18.8747 23.1604C18.7938 23.2951 18.659 23.3491 18.5243 23.376H15.3976L12.7022 24.9394C12.5674 25.0202 12.4057 25.0202 12.2978 24.9394L9.60243 23.376H6.44879C6.28706 23.376 6.15229 23.2682 6.07143 23.1334L4.53504 20.465L1.83962 18.8747C1.70485 18.7938 1.62399 18.659 1.62399 18.5243V15.3976L0.0606469 12.7022C-0.0202156 12.5674 -0.0202156 12.4057 0.0606469 12.2978L1.62399 9.60243V6.44879C1.62399 6.28706 1.70485 6.15229 1.83962 6.07143L4.53504 4.50809L6.09838 1.81267C6.17924 1.70485 6.31402 1.62399 6.44879 1.62399H9.57547L12.2709 0.0606469C12.4057 -0.0202156 12.5674 -0.0202156 12.6752 0.0606469L15.3706 1.62399H18.4973C18.686 1.62399 18.8208 1.70485 18.9016 1.83962ZM7.39218 15.2089L10.0067 17.2844C10.1685 17.4191 10.438 17.3922 10.5728 17.2305L17.6617 8.28167C17.7965 8.11995 17.7695 7.8504 17.6078 7.71563C17.4461 7.58086 17.1765 7.60782 17.0418 7.76954L10.1954 16.3949L7.87736 14.562C7.71563 14.4272 7.44609 14.4542 7.31132 14.6159C7.17655 14.8046 7.2035 15.0741 7.39218 15.2089Z" fill="#223D7C" />
                                </svg>
                                <div>
                                    <span class="tilte-detail-section-second">Aa3 จาก Moody’s (Aa3)</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <svg class="me-3 icon-section-second" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                    <path d="M18.9016 1.83962L20.465 4.53504L23.1873 6.09838C23.3221 6.17924 23.376 6.31402 23.376 6.44879V9.57547L24.9394 12.2709C25.0202 12.4057 25.0202 12.5674 24.9394 12.6752L23.376 15.3706V18.4973C23.376 18.659 23.2682 18.7938 23.1334 18.8747L20.465 20.4111L18.8747 23.1604C18.7938 23.2951 18.659 23.3491 18.5243 23.376H15.3976L12.7022 24.9394C12.5674 25.0202 12.4057 25.0202 12.2978 24.9394L9.60243 23.376H6.44879C6.28706 23.376 6.15229 23.2682 6.07143 23.1334L4.53504 20.465L1.83962 18.8747C1.70485 18.7938 1.62399 18.659 1.62399 18.5243V15.3976L0.0606469 12.7022C-0.0202156 12.5674 -0.0202156 12.4057 0.0606469 12.2978L1.62399 9.60243V6.44879C1.62399 6.28706 1.70485 6.15229 1.83962 6.07143L4.53504 4.50809L6.09838 1.81267C6.17924 1.70485 6.31402 1.62399 6.44879 1.62399H9.57547L12.2709 0.0606469C12.4057 -0.0202156 12.5674 -0.0202156 12.6752 0.0606469L15.3706 1.62399H18.4973C18.686 1.62399 18.8208 1.70485 18.9016 1.83962ZM7.39218 15.2089L10.0067 17.2844C10.1685 17.4191 10.438 17.3922 10.5728 17.2305L17.6617 8.28167C17.7965 8.11995 17.7695 7.8504 17.6078 7.71563C17.4461 7.58086 17.1765 7.60782 17.0418 7.76954L10.1954 16.3949L7.87736 14.562C7.71563 14.4272 7.44609 14.4542 7.31132 14.6159C7.17655 14.8046 7.2035 15.0741 7.39218 15.2089Z" fill="#223D7C" />
                                </svg>
                                <div>
                                    <span class="tilte-detail-section-second">A+ จาก A.M. Best</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <style>
                .section-third {
                    background: url('img/icon/profile-company2.png')no-repeat;
                    background-size: cover;
                    background-position: left;
                }

                .header-third-section {
                    border-radius: 20px;
                    border: 1px solid #223D7C;
                    background: #FFF;
                    max-width: 248px;
                    margin: auto;
                    padding: 5px 0;
                }

                .text-header-third-section {
                    color: #223D7C;
                    text-align: center;
                    font-size: 20px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                }

                .detail-third-section {
                    color: #223D7C;
                    font-size: 15px;
                    font-style: normal;
                    font-weight: normal;
                    line-height: normal;
                    text-indent: 40px;
                }
            </style>
            <div class="section-third">
                <div class="header-third-section">
                    <p class="mb-0 text-header-third-section">รู้จัก อลิอันซ์ อยุธยา</p>
                </div>
                <p class="detail-third-section mt-5"><b>กลุ่มอลิอันซ์ เข้ามาดำเนินธุรกิจในประเทศไทย เมื่อปี พ.ศ. 2494 ปัจจุบัน อลิอันซ์ อยุธยา</b> ประกอบด้วย 2 ธุรกิจหลัก คือ <b>บมจ.อลิอันซ์ อยุธยา ประกันชีวิต</b> ให้ความคุ้มครองชีวิตและ สุขภาพ และ <b>บมจ.อลิอันซ์ อยุธยาประกันภัย</b> ให้ความคุ้มครอง วินาศภัย</p>
                <p class="detail-third-section">เราพร้อมให้บริการลูกค้า ด้วยพนักงานกว่า 1,400 คน พร้อมด้วยสาขาและเซอร์วิสเซ็นเตอร์ 27 แห่ง และสำนักงาน
                    ตัวแทนกว่า 200 แห่งทั่วประเทศ (ข้อมูล ณ เดือนกรกฎาคม 2563) <b>เรามุ่งเน้นนโยบายการยึดลูกค้าเป็นศูนย์กลางอย่างแท้จริง
                        (True Customer Centricity)</b> เพื่อพัฒนาผลิตภัณฑ์และบริการ เพื่อตอบสนองความต้องการของลูกค้าเป็นหลั</p>
                <p class="detail-third-section"> อลิอันซ์ อยุธยามีจุดยืนในการเป็น <b>ประกันที่กล้าบอกเงื่อนไข</b>โดยทำให้เรื่องประกันให้เป็นเรื่องที่เข้าใจง่าย ไม่ซับซ้อน ตรงไปตรงมา</p>
            </div>
            <style>
                .section-four {
                    margin: 47px 0 30px 0;
                    flex-direction: row;
                }

                .title-section-four {
                    color: #223D7C;
                    text-align: center;
                    font-size: 20px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;
                }

                .detail-section-four {
                    color: #383838;
                    text-align: center;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                }

                .container-btn-our-business {
                    display: flex;
                }
            </style>
            <div class="section-four row">
                <div class="text-center col-12 col-md-4 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7761 52.7761V63.8806C12.7761 70.9254 18.6269 76.6567 25.5522 76.6567C32.597 76.6567 38.3284 70.9254 38.3284 63.8806V60.8955C38.9254 61.0149 39.5224 61.0149 40.1194 61.0149C40.7164 61.0149 41.194 61.0149 41.791 60.8955V63.8806C41.791 72.8358 34.6269 80 25.6716 80C16.7164 80 9.43284 72.8358 9.43284 63.8806V52.7761C9.43284 52.1791 8.59701 51.8209 8.23881 52.4179L6.44776 54.0896C5.73134 54.9254 4.65672 54.806 4.0597 54.0896C3.46269 53.3731 3.22388 52.2985 4.0597 51.7015L9.91045 45.7313C10.6269 45.0149 11.8209 45.0149 12.4179 45.7313L18.2687 51.7015C19.1045 52.4179 18.9851 53.4925 18.2687 54.0896C17.5522 54.6866 16.4776 54.9254 15.8806 54.0896L14.0896 52.4179C13.7313 51.8209 12.7761 52.1791 12.7761 52.7761ZM27.3433 12.7761H16.2388C9.31343 12.7761 3.46269 18.6269 3.46269 25.5522C3.46269 32.4776 9.31343 38.3284 16.2388 38.3284H19.2239C19.2239 38.9254 19.2239 39.5224 19.2239 40.1194C19.2239 40.597 19.2239 41.194 19.2239 41.791H16.2388C7.28358 41.6716 0 34.5075 0 25.5522C0 16.7164 7.28358 9.43284 16.1194 9.43284H27.2239C27.9403 9.43284 28.1791 8.59701 27.7015 8.1194L25.9104 6.44776C25.194 5.73134 25.194 4.65672 25.9104 4.0597C26.7463 3.22388 27.7015 3.22388 28.4179 3.9403L34.2687 9.91045C34.9851 10.6269 34.9851 11.8209 34.2687 12.2985L28.4179 18.2687C27.5821 18.9851 26.6269 18.9851 25.9104 18.2687C25.194 17.5522 25.194 16.4776 25.9104 15.8806L27.7015 14.0896C28.1791 13.7313 27.9403 12.7761 27.3433 12.7761ZM67.2239 27.3433V16.2388C67.2239 9.31343 61.4925 3.46269 54.4478 3.46269C47.5224 3.46269 41.6716 9.31343 41.6716 16.2388V19.2239C41.194 19.2239 40.597 19.2239 40 19.2239C39.403 19.2239 38.806 19.2239 38.209 19.2239V16.2388C38.3284 7.16418 45.6119 0 54.4478 0C63.403 0 70.5672 7.28358 70.5672 16.1194V27.2239C70.5672 27.9403 71.403 28.1791 71.8806 27.5821L73.5522 25.9104C74.3881 25.194 75.3433 25.194 76.0597 25.9104C76.7761 26.6269 76.7761 27.7015 76.0597 28.2985L70.0896 34.2687C69.3731 34.9851 68.2985 34.9851 67.7015 34.2687L61.7313 28.2985C61.0149 27.5821 61.0149 26.5075 61.8507 25.9104C62.5672 25.194 63.5224 25.194 64.2388 25.9104L65.9104 27.7015C66.3881 28.1791 67.2239 27.9403 67.2239 27.3433ZM60.8955 38.3284H63.8806C72.8358 38.3284 80 45.6119 80 54.4478C80 63.2836 72.8358 70.5672 63.8806 70.5672H52.7761C52.1791 70.5672 51.8209 71.403 52.4179 71.8806L54.0896 73.5522C54.9254 74.3881 54.806 75.3433 54.0896 76.0597C53.3731 76.7761 52.2985 76.7761 51.7015 76.0597L45.7313 70.0896C45.0149 69.3731 45.0149 68.2985 45.7313 67.7015L51.7015 61.7313C52.4179 61.0149 53.4925 61.0149 54.0896 61.7313C54.806 62.5672 54.9254 63.5224 54.0896 64.2388L52.4179 65.9104C51.8209 66.3881 52.1791 67.2239 52.7761 67.2239H63.8806C70.9254 67.2239 76.6567 61.3731 76.6567 54.4478C76.6567 47.5224 70.9254 41.6716 63.8806 41.6716H60.8955C61.0149 41.0746 61.0149 40.597 61.0149 40C61.0149 39.5224 61.0149 38.9254 60.8955 38.3284ZM40.1194 21.0149C29.6119 21.0149 21.0149 29.4925 21.0149 40.1194C21.0149 50.6269 29.4925 59.1045 40.1194 59.1045C50.6269 59.1045 59.1045 50.6269 59.1045 40.1194C58.9851 29.4925 50.5075 21.0149 40.1194 21.0149ZM40.1194 31.7612C37.8507 31.7612 35.8209 33.6716 35.8209 35.9403C35.8209 38.209 37.8507 40.2388 40.1194 40.2388C42.3881 40.2388 44.2985 38.209 44.2985 35.9403C44.2985 33.6716 42.3881 31.7612 40.1194 31.7612ZM40.1194 24.3582C48.7164 24.3582 55.6418 31.2836 55.6418 40C55.6418 48.597 48.7164 55.5224 40.1194 55.5224C31.5224 55.5224 24.4776 48.597 24.4776 40C24.3582 31.403 31.5224 24.3582 40.1194 24.3582ZM40.1194 26.3881C32.597 26.3881 26.3881 32.597 26.3881 40.1194C26.3881 42.9851 27.4627 45.8507 29.0149 48.1194C30.209 44.6567 32.9552 42.0299 36.2985 40.9552C34.7463 39.7612 33.9104 38.0896 33.9104 35.9403C33.9104 32.597 36.5373 29.7313 40.1194 29.7313C43.4627 29.7313 46.3284 32.4776 46.3284 35.9403C46.3284 38.0896 45.3731 39.7612 43.9403 40.9552C47.2836 42.1493 50.0299 44.6567 51.2239 48.1194C52.8955 45.8507 53.7313 42.9851 53.7313 40.1194C53.6119 32.4776 47.6418 26.3881 40.1194 26.3881ZM30.5672 49.791C35.8209 54.9254 44.2985 54.9254 49.6716 49.791C48.597 45.3731 44.6567 42.2687 40.1194 42.2687C35.5821 42.2687 31.6418 45.3731 30.5672 49.791Z" fill="#223D7C" />
                    </svg>
                    <p class="title-section-four">ลูกค้าเป็นศูนย์กลางอย่างแท้จริง<br>
                        (True Customer Centricity)

                    </p>
                    <p class="detail-section-four">เรามุ่งมั่นพัฒนาผลิตภัณฑ์ บริการ และขั้นตอนการทำงาน โดยใส่ใจความต้องการของลูกค้า</p>
                </div>
                <div class="text-center col-12 col-md-4 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="84" height="80" viewBox="0 0 84 80" fill="none">
                        <path d="M80.9165 40.1332C80.9165 60.6665 64.1423 77.3332 43.6107 77.3332H40.5243C19.8585 77.3332 3.08426 60.6665 3.08426 40.1332V38.6665H0.400391V40.2665C0.400391 62.1332 18.3823 79.9998 40.3901 79.9998H43.4765C65.6185 79.9998 83.6004 62.1332 83.6004 40.1332H80.9165Z" fill="#223D7C" />
                        <path d="M50.052 46.6665V49.3332H51.3939C52.1991 49.3332 52.7359 48.7998 52.7359 47.9998C52.7359 47.1998 52.1991 46.6665 51.3939 46.6665H50.052Z" fill="#223D7C" />
                        <path d="M32.6071 49.3332H33.949V46.6665H32.6071C31.8019 46.6665 31.2651 47.1998 31.2651 47.9998C31.2651 48.7998 31.8019 49.3332 32.6071 49.3332Z" fill="#223D7C" />
                        <path d="M28.8489 43.7334C27.2386 43.4667 25.7625 42.8001 24.5548 41.7334C22.9444 42.9334 21.1999 43.7334 19.187 43.8667V47.8667C19.187 50.8001 21.6025 53.2001 24.5548 53.2001C26.5677 53.2001 28.4464 52.0001 29.3857 50.2667C28.8489 49.7334 28.5806 48.9334 28.5806 48.0001C28.5806 47.0667 28.9831 46.1334 29.5199 45.4667C29.2515 44.9334 28.9831 44.2667 28.8489 43.7334Z" fill="#223D7C" />
                        <path d="M34.7542 34.4L33.949 35.2C32.2045 36.9333 31.2651 39.2 31.2651 41.6C31.2651 42.4 31.3993 43.3333 31.8019 44C32.0703 44 32.3387 43.8667 32.6071 43.8667H33.949H35.5593C37.7064 43.8667 39.5851 43.0667 41.0613 41.6L42.0006 40.6667L42.94 41.6C44.4161 43.0667 46.429 43.8667 48.4419 43.8667H50.0522H51.3942C51.6626 43.8667 51.9309 43.8667 52.1993 44C52.6019 43.2 52.7361 42.4 52.7361 41.6V41.3333C52.7361 39.8667 51.5284 38.6667 50.0522 38.6667H49.2471L47.6368 36C46.1606 33.6 43.4768 32 40.5245 32C38.3774 32 36.3645 32.8 34.7542 34.4Z" fill="#223D7C" />
                        <path d="M21.8716 55.4663V56.933C22.4084 57.9996 23.3477 58.533 24.5555 58.533C25.7632 58.533 26.7026 57.8663 27.2393 56.933V55.4663C26.4342 55.733 25.4948 55.9996 24.5555 55.9996C23.6161 55.9996 22.6767 55.8663 21.8716 55.4663Z" fill="#223D7C" />
                        <path d="M47.3678 50.667V46.667C45.3549 46.4004 43.6104 45.7337 42.0001 44.5337C40.3897 45.7337 38.6452 46.5337 36.6323 46.667V50.667C36.6323 53.6004 39.0478 56.0004 42.0001 56.0004C44.9523 56.0004 47.3678 53.6004 47.3678 50.667Z" fill="#223D7C" />
                        <path d="M39.3169 58.1338V59.3338L42.0008 62.0005L44.6846 59.3338V58.1338C43.8795 58.4005 42.9401 58.5338 42.0008 58.5338C41.0614 58.5338 40.1221 58.5338 39.3169 58.1338Z" fill="#223D7C" />
                        <path d="M30.1914 33.3335C28.7153 30.9335 26.0314 29.3335 23.0792 29.3335C20.9321 29.3335 18.785 30.1335 17.3089 31.7335L16.5037 32.5335C14.7592 34.2668 13.8198 36.5335 13.8198 38.9335C13.8198 39.7335 13.954 40.6668 14.3566 41.3335C14.625 41.3335 14.8934 41.2002 15.1618 41.2002H16.5037H18.114C20.2611 41.2002 22.1398 40.4002 23.616 38.9335L24.5553 38.0002L25.4947 38.9335C26.2998 39.7335 27.5076 40.4002 28.5811 40.8002C28.7153 38.5335 29.5205 36.2668 30.9966 34.4002L30.1914 33.3335Z" fill="#223D7C" />
                        <path d="M67.4973 44V46.6667H68.8393C69.6444 46.6667 70.1812 46.1333 70.1812 45.3333C70.1812 44.5333 69.6444 44 68.8393 44H67.4973Z" fill="#223D7C" />
                        <path d="M64.8129 47.9995V43.9995C62.8 43.7329 61.0555 43.0662 59.4451 41.8662C58.2374 42.7995 56.7613 43.4662 55.1509 43.8662C55.0168 44.5329 54.7484 45.0662 54.48 45.5995C55.0168 46.2662 55.4193 47.1995 55.4193 48.1329C55.4193 49.0662 55.151 49.8662 54.6142 50.5329C55.5535 52.3995 57.298 53.4662 59.4451 53.4662C62.3974 53.3329 64.8129 50.9329 64.8129 47.9995Z" fill="#223D7C" />
                        <path d="M70.1807 38.6668C70.1807 37.2002 68.973 36.0002 67.4968 36.0002H66.6917L65.0814 33.3335C63.6052 30.9335 60.9214 29.3335 57.9691 29.3335C55.822 29.3335 53.6749 30.1335 52.1988 31.7335L51.3936 32.5335C50.8568 33.0668 50.3201 33.7335 49.9175 34.5335C49.9175 34.5335 49.9175 34.5335 49.9175 34.6668L50.8568 36.1335C53.2723 36.5335 55.151 38.5335 55.4194 40.9335C56.6272 40.5335 57.7007 39.8668 58.5059 39.0668L59.4452 38.1335L60.3846 39.0668C61.8607 40.5335 63.8736 41.3335 65.8865 41.3335H67.4968H68.8388C69.1072 41.3335 69.3755 41.3335 69.6439 41.4668C70.0465 40.6668 70.1807 39.8668 70.1807 39.0668V38.6668Z" fill="#223D7C" />
                        <path d="M56.7612 55.4663V56.933C57.298 57.9996 58.2374 58.533 59.4451 58.533C60.6528 58.533 61.5922 57.8663 62.129 56.933V55.4663C61.3238 55.733 60.3845 55.8663 59.4451 55.8663C58.5057 55.9996 57.5664 55.8663 56.7612 55.4663Z" fill="#223D7C" />
                        <path d="M15.1618 46.6667H16.5037V44H15.1618C14.3566 44 13.8198 44.5333 13.8198 45.3333C13.8198 46.1333 14.3566 46.6667 15.1618 46.6667Z" fill="#223D7C" />
                        <path d="M42.0006 74.6666C61.9954 74.6666 78.2328 58.5333 78.2328 38.6666V37.1999L80.1115 38.5333L81.5877 36.2666L75.4148 32.2666V38.6666C75.4148 46.5333 72.5967 53.7333 68.0341 59.4666L64.0083 58.7999C63.069 60.3999 61.3244 61.3333 59.4457 61.3333C57.567 61.3333 55.8225 60.3999 54.749 58.7999L50.8573 59.4666L53.1386 59.8666C54.078 59.9999 54.8832 60.2666 55.6883 60.6666C58.1038 61.8666 59.7141 63.9999 60.3851 66.5333C59.0432 67.3333 57.7012 68.1333 56.2251 68.7999C56.7619 68.5333 57.4328 68.2666 57.9696 67.9999C57.7012 65.8666 56.3593 64.1333 54.4806 63.0666C53.9438 62.7999 53.2728 62.5333 52.6019 62.5333L46.429 61.4666L42.0006 65.8666L37.5722 61.4666L31.2651 62.3999C30.5941 62.5333 30.0573 62.6666 29.3864 62.9333C27.5077 63.8666 26.1657 65.7333 25.8973 67.8666C26.4341 68.1333 26.9709 68.3999 27.6419 68.6666C25.3606 67.5999 23.3477 66.3999 21.469 64.7999C22.1399 65.3333 22.8109 65.8666 23.6161 66.2666C24.287 63.7333 25.8973 61.5999 28.3128 60.3999C29.118 59.9999 30.0573 59.7333 30.8625 59.5999L33.1438 59.1999L29.2522 58.5333C28.1786 60.3999 26.4341 61.3333 24.5554 61.3333C22.6767 61.3333 20.9322 60.3999 19.8586 58.7999L15.8328 59.4666C11.2702 53.7333 8.45218 46.5333 8.45218 38.6666H5.76831C5.76831 58.5333 22.0057 74.6666 42.0006 74.6666ZM66.4238 61.4666C66.9606 60.7999 67.6315 60.1333 68.1683 59.4666C67.6315 60.1333 67.0948 60.7999 66.4238 61.4666ZM55.9567 68.9333C55.5541 69.1999 55.0173 69.3333 54.6148 69.4666C55.0173 69.3333 55.4199 69.1999 55.9567 68.9333ZM54.078 69.7333C53.6754 69.8666 53.1386 69.9999 52.7361 70.2666C53.1386 70.1333 53.6754 69.8666 54.078 69.7333ZM50.4548 70.9333C49.7838 71.0666 49.247 71.1999 48.5761 71.3333C49.1128 71.1999 49.7838 71.0666 50.4548 70.9333ZM48.0393 71.4666C47.6367 71.5999 47.0999 71.5999 46.6973 71.7333C47.0999 71.5999 47.5025 71.4666 48.0393 71.4666ZM44.0135 71.8666C43.3425 71.8666 42.6715 71.8666 42.0006 71.8666C42.6715 71.8666 43.3425 71.9999 44.0135 71.8666ZM45.8922 71.7333C45.4896 71.7333 44.9528 71.8666 44.5503 71.8666C45.087 71.8666 45.4896 71.8666 45.8922 71.7333ZM39.4509 71.8666C39.0483 71.8666 38.5115 71.7333 38.109 71.7333C38.5115 71.8666 38.9141 71.8666 39.4509 71.8666ZM37.438 71.5999C37.0354 71.5999 36.4986 71.4666 36.0961 71.3333C36.4986 71.4666 36.9012 71.5999 37.438 71.5999ZM35.4251 71.3333C34.7541 71.1999 34.2173 71.0666 33.5464 70.9333C34.2173 71.0666 34.8883 71.1999 35.4251 71.3333ZM33.5464 70.9333C32.8754 70.7999 32.3386 70.5333 31.6677 70.3999C32.3386 70.5333 33.0096 70.7999 33.5464 70.9333ZM31.2651 70.2666C30.8625 70.1333 30.3257 69.9999 29.9232 69.7333C30.3257 69.8666 30.8625 70.1333 31.2651 70.2666ZM29.3864 69.5999C28.9838 69.4666 28.447 69.1999 28.0444 69.0666C28.5812 69.1999 28.9838 69.3333 29.3864 69.5999ZM21.3348 64.9333C19.9928 63.8666 18.6509 62.6666 17.5773 61.4666C18.7851 62.6666 19.9928 63.8666 21.3348 64.9333ZM17.5773 61.4666C17.0406 60.7999 16.3696 60.1333 15.8328 59.4666C16.3696 60.1333 16.9064 60.7999 17.5773 61.4666Z" fill="#223D7C" />
                        <path d="M8.45218 33.3335H5.76831V36.0002H8.45218V33.3335Z" fill="#223D7C" />
                        <path d="M17.8455 23.2C19.3216 20.8 21.7371 19.2 24.5552 18.8C25.0919 8.53333 30.9964 2.93333 35.8274 0C22.2739 0.133333 10.4648 8 4.96289 20C6.30483 19.2 8.04934 18.6667 9.79386 18.6667C13.1487 18.6667 16.2352 20.5333 17.8455 23.2Z" fill="#223D7C" />
                        <path d="M27.2395 18.8C30.0576 19.2 32.4731 20.9333 33.9492 23.2C35.5595 20.5333 38.646 18.6667 42.0008 18.6667C45.3556 18.6667 48.4421 20.5333 50.0524 23.2C51.5285 20.8 53.944 19.2 56.7621 18.8C56.0911 4.8 44.1479 0.666667 42.0008 0C39.8537 0.666667 27.9105 4.8 27.2395 18.8Z" fill="#223D7C" />
                        <path d="M59.4454 18.8C62.2634 19.2 64.8131 20.9333 66.155 23.2C67.7654 20.5333 70.8518 18.6667 74.2067 18.6667C75.9512 18.6667 77.5615 19.2 79.0376 20C73.5357 8 61.7266 0.133333 48.1731 0C53.0041 2.93333 58.9086 8.53333 59.4454 18.8Z" fill="#223D7C" />
                        <path d="M42.0001 21.3335C41.5976 21.3335 41.0608 21.3335 40.6582 21.4668V29.3335C41.5976 29.3335 42.5369 29.4668 43.3421 29.7335V21.4668C42.9395 21.3335 42.4027 21.3335 42.0001 21.3335Z" fill="#223D7C" />
                    </svg>
                    <p class="title-section-four">ครอบคลุม</p>
                    <p class="detail-section-four">อลิอันซ์ อยุธยา ประกันภัย ให้คุณกล้าใช้ชีวิตได้อย่างหมดกังวล ด้วยแบบประกันที่หลากหลาย ครอบคลุมทุกความต้องการ ทั้งประกันรถยนต์ ประกันสินทรัพย์ ประกันการเดินทาง ฯลฯ</p>
                </div>
                <div class="text-center col-12 col-md-4 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="89" height="80" viewBox="0 0 89 80" fill="none">
                        <path d="M76.4792 31.7143V4.7619C76.4792 2.19048 74.3696 0.0952381 71.7805 0H19.6153C17.0262 0 14.9166 2.09524 14.9166 4.66667V5.80952L3.88903 7.52381C1.39585 7.90476 -0.330208 10.2857 0.0533598 12.7619L9.83433 76.0952C10.2179 78.2857 12.1357 80 14.3412 80C14.533 80 14.8207 80 15.0125 79.9048L39.8485 76.0952H71.6846C74.2737 76.0952 76.3833 74 76.3833 71.4286V59.1429C84.0546 58.4762 89.6164 51.8095 88.9451 44.1905C88.4657 37.619 83.1916 32.2857 76.4792 31.7143ZM74.0819 71.4286C74.0819 72.6667 73.0271 73.7143 71.7805 73.7143H19.6153C18.3687 73.7143 17.3139 72.6667 17.3139 71.4286V4.7619C17.3139 3.52381 18.3687 2.47619 19.6153 2.47619H71.7805C73.0271 2.47619 74.0819 3.52381 74.0819 4.7619V31.7143C70.5339 32 67.1777 33.7143 64.8763 36.381H25.6565C24.9852 36.381 24.4099 36.9524 24.5058 37.619C24.5058 38.2857 25.0811 38.7619 25.6565 38.7619H63.1502C62.3831 40.0952 61.9036 41.619 61.6159 43.1429H25.6565C24.9852 43.1429 24.4099 43.7143 24.5058 44.381C24.5058 45.0476 25.0811 45.5238 25.6565 45.5238H61.4242C61.4242 47.0476 61.7118 48.4762 62.1913 49.9048H25.6565C24.9852 49.9048 24.4099 50.4762 24.5058 51.1429C24.5058 51.8095 25.0811 52.2857 25.6565 52.2857H63.342C65.6434 56.0952 69.575 58.5714 74.0819 58.9524V71.4286ZM82.1368 42.381L74.1778 50.2857C73.6983 50.7619 72.9312 50.7619 72.4517 50.2857L68.3284 46.1905C67.8489 45.7143 67.8489 44.9524 68.3284 44.4762C68.8078 44 69.575 44 70.0544 44.4762L73.3147 47.7143L80.4107 40.6667C80.8902 40.1905 81.6573 40.1905 82.1368 40.6667C82.6163 41.1429 82.6163 41.9048 82.1368 42.381ZM24.4099 30.7619C24.4099 30.0952 24.9852 29.5238 25.6565 29.5238H65.7393C66.4105 29.5238 66.9859 30 66.9859 30.6667C66.9859 31.3333 66.5064 31.9048 65.8352 31.9048C65.8352 31.9048 65.8352 31.9048 65.7393 31.9048H25.6565C24.9852 32 24.4099 31.4286 24.4099 30.7619ZM25.6565 56.8571H65.7393C66.4105 56.8571 66.9859 57.3333 66.9859 58C66.9859 58.6667 66.5064 59.2381 65.8352 59.2381C65.8352 59.2381 65.8352 59.2381 65.7393 59.2381H25.6565C24.9852 59.2381 24.4099 58.6667 24.5058 58C24.5058 57.4286 24.9852 56.9524 25.6565 56.8571ZM24.4099 17.0476C24.4099 16.381 24.9852 15.8095 25.6565 15.8095H38.4101C39.0813 15.8095 39.6567 16.381 39.5608 17.0476C39.5608 17.7143 38.9855 18.1905 38.4101 18.1905H25.6565C24.9852 18.2857 24.4099 17.7143 24.4099 17.0476ZM24.4099 23.1429C24.4099 22.4762 24.9852 21.9048 25.6565 21.9048H46.8486C47.5198 21.9048 48.0952 22.381 48.0952 23.0476C48.0952 23.7143 47.6157 24.2857 46.9445 24.2857C46.9445 24.2857 46.9445 24.2857 46.8486 24.2857H25.6565C24.9852 24.2857 24.4099 23.8095 24.4099 23.1429Z" fill="#223D7C" />
                    </svg>
                    <p class="title-section-four">จริงใจ</p>
                    <p class="detail-section-four">อลิอันซ์ อยุธยา เป็นประกันที่กล้าบอกเงื่อนไข ทำให้เรื่องประกันให้เป็นเรื่องที่เข้าใจง่าย ตรงไปตรงมา ไม่ซับซ้อน</p>
                </div>
            </div>


            <style>
                .our-business {
                    padding-top: 50px;
                    padding-bottom: 50px;
                    background-color: #F8F4F3;
                }

                .btn-see-more {
                    color: #383838;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                }

                .btn-see-more:hover {
                    color: #383838;
                }

                .detail-our-business {
                    color: #383838;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                }
            </style>
            <div class="our-business">
                <div class="header-third-section">
                    <p class="mb-0 text-header-third-section">ธุรกิจของเรา</p>
                </div>
                <div class="row d-flex justify-content-evenly ">
                    <div class="col-12 col-md-4 text-center my-5">
                        <div class="item-our-business">
                            <img src="{{url('img/icon/our-business1.png')}}" alt="" class="img-our-business">
                            <p class="title-section-four mt-2">ธุรกิจประกันชีวิต</p>
                            <p class="detail-our-business">อลิอันซ์ อยุธยา ประกันชีวิต มอบแบบประกันชีวิต ประกันสุขภาพ ประกันเพื่อการออม เพื่อช่วยให้คุณวางแผนชีวิตอย่างราบรื่น ไม่ว่าเงื่อนไขชีวิตจะเป็นอย่างไร</p>
                        </div>
                        <div class="container-btn-our-business">
                            <a class="mt-auto btn-see-more cursor-pointer" href="https://www.azay.co.th/th_TH/life-insurance.html" target="_self">
                                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="36" height="8" viewBox="0 0 36 8" fill="none">
                                    <path d="M35.3536 4.35355C35.5488 4.15829 35.5488 3.84171 35.3536 3.64645L32.1716 0.464466C31.9763 0.269204 31.6597 0.269204 31.4645 0.464466C31.2692 0.659728 31.2692 0.976311 31.4645 1.17157L34.2929 4L31.4645 6.82843C31.2692 7.02369 31.2692 7.34027 31.4645 7.53553C31.6597 7.7308 31.9763 7.7308 32.1716 7.53553L35.3536 4.35355ZM0 4.5H35V3.5H0L0 4.5Z" fill="#383838" />
                                </svg>
                                ดูเพิ่มเติม
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-center my-5">
                        <div class="item-our-business">
                            <img src="{{url('img/icon/our-business2.png')}}" alt="" class="img-our-business">
                            <p class="title-section-four mt-2">ธุรกิจประกันวินาศภัย</p>
                            <p class="detail-our-business">อลิอันซ์ อยุธยา ประกันภัย ให้คุณกล้าใช้ชีวิตได้อย่างหมดกังวล ด้วยแบบประกันที่หลากหลาย ครอบคลุมทุกความต้องการ ทั้งประกันรถยนต์ ประกันสินทรัพย์ ประกันการเดินทาง ฯลฯ</p>
                        </div>
                        <div class="container-btn-our-business">
                            <a class="mt-auto btn-see-more cursor-pointer" href="/th_TH/general-insurance.html" target="_self">
                                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="36" height="8" viewBox="0 0 36 8" fill="none">
                                    <path d="M35.3536 4.35355C35.5488 4.15829 35.5488 3.84171 35.3536 3.64645L32.1716 0.464466C31.9763 0.269204 31.6597 0.269204 31.4645 0.464466C31.2692 0.659728 31.2692 0.976311 31.4645 1.17157L34.2929 4L31.4645 6.82843C31.2692 7.02369 31.2692 7.34027 31.4645 7.53553C31.6597 7.7308 31.9763 7.7308 32.1716 7.53553L35.3536 4.35355ZM0 4.5H35V3.5H0L0 4.5Z" fill="#383838" />
                                </svg>
                                ดูเพิ่มเติม
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <style>
                .section-reward {
                    padding: 47px 20px 30px 20px;
                    flex-direction: row;
                }

                .title-section-reward {
                    color: #223D7C;
                    text-align: center;
                    font-size: 20px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;
                }

                .detail-section-reward {
                    color: #383838;
                    text-align: center;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                }
            </style>
            <div class="section-reward mt-0 row" style="background-color: #F0F5FF;;">
                <p class="px-5 text-center" style="color: #223D7C;font-size: 18px;font-style: normal;font-weight: 400;line-height: normal;">ความสำเร็จของ อลิอันซ์ อยุธยา</p>
                <p class="px-5 text-center mb-4" style="color: #223D7C;font-size: 25px;font-style: normal;font-weight: 700;line-height: normal;">จากรางวัลหลากหลายสาขา ทั้งจากเวทีระดับนานาชาติ และจากหน่วยงานในประเทศไทย</p>
                <div class="text-center col-12 col-md-4 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="63" height="70" viewBox="0 0 63 70" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3979 0H51.6217C52.3864 0 52.9217 0.622222 52.9217 1.32222C52.9217 2.25556 52.9217 3.26667 52.8452 4.27778C58.657 4.04444 64.1629 4.43333 62.7864 15.1667C62.0217 21.0778 58.8864 26.4444 54.9099 30.0222C51.6217 32.9778 47.7981 34.5333 44.5099 34.0667C42.2922 37.1 39.5392 39.4333 36.1745 40.5222V46.9778C38.7745 47.8333 40.8393 49.5444 41.2981 52.1111C43.0569 52.6556 44.3569 54.3667 44.3569 56.2333V61.6778C46.3452 61.9889 47.7981 63.7778 47.7981 65.8V68.6778C47.7981 69.4556 47.1863 70 46.4981 70H16.6744C15.9097 70 15.3744 69.3778 15.3744 68.6778C15.3744 66.3444 15.0685 64.4 16.598 62.8444C17.1333 62.2222 18.0509 61.8333 18.8156 61.6778V56.2333C18.8156 55.0667 19.2744 53.9778 20.0392 53.2C20.498 52.7333 21.1097 52.3444 21.798 52.1111C22.2568 49.6222 24.3215 47.9111 26.9215 46.9778V40.6C23.4803 39.5111 20.6509 37.1778 18.3568 34.0667C15.0685 34.5333 11.3215 32.9778 7.95674 30.0222C4.13319 26.4444 0.997878 21 0.233168 15.1667C-1.21978 4.43333 4.3626 4.04444 10.1744 4.27778C10.0979 3.26667 10.0979 2.25556 10.0979 1.32222C10.0979 0.622222 10.7097 0 11.3979 0ZM32.8098 8.86667C32.4274 7.62222 30.6686 7.62222 30.2863 8.86667L28.6039 14.0778H23.3274C21.9509 14 21.4156 15.7889 22.4862 16.4889L26.8451 19.6778L25.1627 24.8889C24.7804 26.1333 26.1568 27.1444 27.2274 26.3667L31.5863 23.1778L35.8686 26.3667C37.0157 27.2222 38.3922 26.1333 38.0098 24.8889L36.3275 19.6778L40.6863 16.4889C41.6804 15.7111 41.2216 14.0778 39.9216 14.0778H34.5686L32.8098 8.86667ZM32.198 15.7889L31.5098 13.6111L30.8216 15.7889C30.4392 17.0333 28.9098 16.7222 27.3039 16.7222L29.1392 18.0444C30.2098 18.8222 29.4451 20.1444 28.9098 21.7C31.8157 19.5222 31.2039 19.5222 34.1098 21.7C32.9627 18.2 32.8098 18.8222 35.7157 16.7222C34.1098 16.7222 32.5804 17.0333 32.198 15.7889ZM52.7687 7C52.157 14.9333 50.3217 24.5 46.2687 31.5C52.7687 30.9556 59.1923 22.4 60.1864 14.7778C61.3335 6.37778 57.2805 6.76667 52.7687 7ZM16.7509 31.4222C12.6979 24.4222 10.8626 14.8556 10.2509 6.92222C5.73908 6.76667 1.76259 6.37778 2.83318 14.7778C3.52142 19.9889 6.27438 24.8111 9.79204 28C12.0862 30.0222 14.6097 31.2667 16.7509 31.4222ZM33.5745 41.1444H29.6745V46.3556H33.5745V41.1444ZM38.5451 51.8778C36.6334 47.9111 26.6921 47.9111 24.7804 51.8778H38.5451ZM18.0509 67.2778H45.1981C45.1981 65.2556 45.4275 64.2444 43.0569 64.2444H19.5039C19.1215 64.2444 18.7391 64.4 18.4333 64.7111C17.898 65.3333 18.0509 66.2667 18.0509 67.2778ZM21.4921 61.6H41.7569V56.1556C41.7569 55.2222 41.0687 54.5222 40.151 54.5222H23.098C22.6392 54.5222 22.2568 54.6778 21.9509 54.9889L21.4921 56.1556V61.6ZM50.3217 2.72222H12.7744C13.0038 13.6889 16.5215 38.5778 31.5863 38.5778C46.6511 38.5778 50.0923 13.6111 50.3217 2.72222Z" fill="#FFBF44" />
                    </svg>
                    <p class="title-section-reward mb-0">Prime Minister Award 2019<br>
                    </p>
                    <p class="detail-section-reward" style="color: #223D7C;">Best Technology for Life Insurance Company</p>
                </div>
                <div class="text-center col-12 col-md-4 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="63" height="70" viewBox="0 0 63 70" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3979 0H51.6217C52.3864 0 52.9217 0.622222 52.9217 1.32222C52.9217 2.25556 52.9217 3.26667 52.8452 4.27778C58.657 4.04444 64.1629 4.43333 62.7864 15.1667C62.0217 21.0778 58.8864 26.4444 54.9099 30.0222C51.6217 32.9778 47.7981 34.5333 44.5099 34.0667C42.2922 37.1 39.5392 39.4333 36.1745 40.5222V46.9778C38.7745 47.8333 40.8393 49.5444 41.2981 52.1111C43.0569 52.6556 44.3569 54.3667 44.3569 56.2333V61.6778C46.3452 61.9889 47.7981 63.7778 47.7981 65.8V68.6778C47.7981 69.4556 47.1863 70 46.4981 70H16.6744C15.9097 70 15.3744 69.3778 15.3744 68.6778C15.3744 66.3444 15.0685 64.4 16.598 62.8444C17.1333 62.2222 18.0509 61.8333 18.8156 61.6778V56.2333C18.8156 55.0667 19.2744 53.9778 20.0392 53.2C20.498 52.7333 21.1097 52.3444 21.798 52.1111C22.2568 49.6222 24.3215 47.9111 26.9215 46.9778V40.6C23.4803 39.5111 20.6509 37.1778 18.3568 34.0667C15.0685 34.5333 11.3215 32.9778 7.95674 30.0222C4.13319 26.4444 0.997878 21 0.233168 15.1667C-1.21978 4.43333 4.3626 4.04444 10.1744 4.27778C10.0979 3.26667 10.0979 2.25556 10.0979 1.32222C10.0979 0.622222 10.7097 0 11.3979 0ZM32.8098 8.86667C32.4274 7.62222 30.6686 7.62222 30.2863 8.86667L28.6039 14.0778H23.3274C21.9509 14 21.4156 15.7889 22.4862 16.4889L26.8451 19.6778L25.1627 24.8889C24.7804 26.1333 26.1568 27.1444 27.2274 26.3667L31.5863 23.1778L35.8686 26.3667C37.0157 27.2222 38.3922 26.1333 38.0098 24.8889L36.3275 19.6778L40.6863 16.4889C41.6804 15.7111 41.2216 14.0778 39.9216 14.0778H34.5686L32.8098 8.86667ZM32.198 15.7889L31.5098 13.6111L30.8216 15.7889C30.4392 17.0333 28.9098 16.7222 27.3039 16.7222L29.1392 18.0444C30.2098 18.8222 29.4451 20.1444 28.9098 21.7C31.8157 19.5222 31.2039 19.5222 34.1098 21.7C32.9627 18.2 32.8098 18.8222 35.7157 16.7222C34.1098 16.7222 32.5804 17.0333 32.198 15.7889ZM52.7687 7C52.157 14.9333 50.3217 24.5 46.2687 31.5C52.7687 30.9556 59.1923 22.4 60.1864 14.7778C61.3335 6.37778 57.2805 6.76667 52.7687 7ZM16.7509 31.4222C12.6979 24.4222 10.8626 14.8556 10.2509 6.92222C5.73908 6.76667 1.76259 6.37778 2.83318 14.7778C3.52142 19.9889 6.27438 24.8111 9.79204 28C12.0862 30.0222 14.6097 31.2667 16.7509 31.4222ZM33.5745 41.1444H29.6745V46.3556H33.5745V41.1444ZM38.5451 51.8778C36.6334 47.9111 26.6921 47.9111 24.7804 51.8778H38.5451ZM18.0509 67.2778H45.1981C45.1981 65.2556 45.4275 64.2444 43.0569 64.2444H19.5039C19.1215 64.2444 18.7391 64.4 18.4333 64.7111C17.898 65.3333 18.0509 66.2667 18.0509 67.2778ZM21.4921 61.6H41.7569V56.1556C41.7569 55.2222 41.0687 54.5222 40.151 54.5222H23.098C22.6392 54.5222 22.2568 54.6778 21.9509 54.9889L21.4921 56.1556V61.6ZM50.3217 2.72222H12.7744C13.0038 13.6889 16.5215 38.5778 31.5863 38.5778C46.6511 38.5778 50.0923 13.6111 50.3217 2.72222Z" fill="#FFBF44" />
                    </svg>
                    <p class="title-section-reward mb-0">“Dare to Award” 2019</p>
                    <p class="detail-section-reward" style="color: #223D7C;">from Allianz Asia Pacific.</p>
                </div>
                <div class="text-center col-12 col-md-4 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="63" height="70" viewBox="0 0 63 70" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3979 0H51.6217C52.3864 0 52.9217 0.622222 52.9217 1.32222C52.9217 2.25556 52.9217 3.26667 52.8452 4.27778C58.657 4.04444 64.1629 4.43333 62.7864 15.1667C62.0217 21.0778 58.8864 26.4444 54.9099 30.0222C51.6217 32.9778 47.7981 34.5333 44.5099 34.0667C42.2922 37.1 39.5392 39.4333 36.1745 40.5222V46.9778C38.7745 47.8333 40.8393 49.5444 41.2981 52.1111C43.0569 52.6556 44.3569 54.3667 44.3569 56.2333V61.6778C46.3452 61.9889 47.7981 63.7778 47.7981 65.8V68.6778C47.7981 69.4556 47.1863 70 46.4981 70H16.6744C15.9097 70 15.3744 69.3778 15.3744 68.6778C15.3744 66.3444 15.0685 64.4 16.598 62.8444C17.1333 62.2222 18.0509 61.8333 18.8156 61.6778V56.2333C18.8156 55.0667 19.2744 53.9778 20.0392 53.2C20.498 52.7333 21.1097 52.3444 21.798 52.1111C22.2568 49.6222 24.3215 47.9111 26.9215 46.9778V40.6C23.4803 39.5111 20.6509 37.1778 18.3568 34.0667C15.0685 34.5333 11.3215 32.9778 7.95674 30.0222C4.13319 26.4444 0.997878 21 0.233168 15.1667C-1.21978 4.43333 4.3626 4.04444 10.1744 4.27778C10.0979 3.26667 10.0979 2.25556 10.0979 1.32222C10.0979 0.622222 10.7097 0 11.3979 0ZM32.8098 8.86667C32.4274 7.62222 30.6686 7.62222 30.2863 8.86667L28.6039 14.0778H23.3274C21.9509 14 21.4156 15.7889 22.4862 16.4889L26.8451 19.6778L25.1627 24.8889C24.7804 26.1333 26.1568 27.1444 27.2274 26.3667L31.5863 23.1778L35.8686 26.3667C37.0157 27.2222 38.3922 26.1333 38.0098 24.8889L36.3275 19.6778L40.6863 16.4889C41.6804 15.7111 41.2216 14.0778 39.9216 14.0778H34.5686L32.8098 8.86667ZM32.198 15.7889L31.5098 13.6111L30.8216 15.7889C30.4392 17.0333 28.9098 16.7222 27.3039 16.7222L29.1392 18.0444C30.2098 18.8222 29.4451 20.1444 28.9098 21.7C31.8157 19.5222 31.2039 19.5222 34.1098 21.7C32.9627 18.2 32.8098 18.8222 35.7157 16.7222C34.1098 16.7222 32.5804 17.0333 32.198 15.7889ZM52.7687 7C52.157 14.9333 50.3217 24.5 46.2687 31.5C52.7687 30.9556 59.1923 22.4 60.1864 14.7778C61.3335 6.37778 57.2805 6.76667 52.7687 7ZM16.7509 31.4222C12.6979 24.4222 10.8626 14.8556 10.2509 6.92222C5.73908 6.76667 1.76259 6.37778 2.83318 14.7778C3.52142 19.9889 6.27438 24.8111 9.79204 28C12.0862 30.0222 14.6097 31.2667 16.7509 31.4222ZM33.5745 41.1444H29.6745V46.3556H33.5745V41.1444ZM38.5451 51.8778C36.6334 47.9111 26.6921 47.9111 24.7804 51.8778H38.5451ZM18.0509 67.2778H45.1981C45.1981 65.2556 45.4275 64.2444 43.0569 64.2444H19.5039C19.1215 64.2444 18.7391 64.4 18.4333 64.7111C17.898 65.3333 18.0509 66.2667 18.0509 67.2778ZM21.4921 61.6H41.7569V56.1556C41.7569 55.2222 41.0687 54.5222 40.151 54.5222H23.098C22.6392 54.5222 22.2568 54.6778 21.9509 54.9889L21.4921 56.1556V61.6ZM50.3217 2.72222H12.7744C13.0038 13.6889 16.5215 38.5778 31.5863 38.5778C46.6511 38.5778 50.0923 13.6111 50.3217 2.72222Z" fill="#FFBF44" />
                    </svg>
                    <p class="title-section-reward mb-0">The Global CSR Awards - Best Community Programme - 2019</p>
                    <p class="detail-section-reward" style="color: #223D7C;">by Pinnacle Group.</p>
                </div>
            </div>
            <style>
                .section-contact {
                    padding: 50px 25px 30px 35px;
                    display: flex;
                    justify-content: center;
                }

                .header-contact {
                    border-radius: 20px;
                    border: 1px solid #223D7C;
                    background: #223D7C;
                    max-width: 283px;
                    color: #FFF;
                    text-align: center;
                    font-size: 20px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                    padding: 5px 60px;
                    margin: auto;
                }

                .service-center {
                    color: #383838;
                    text-align: center;
                    font-size: 22px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;
                }

                .btn-contact {
                    color: #383838;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;
                }

                .btn-contact:hover {
                    color: #383838;

                }
            </style>
            <div class="section-contact">
                <div>
                    <div class="header-contact">
                        ติดต่อเรา
                    </div>

                    <div class="my-4">
                        <p class="service-center mt-4">ศูนย์บริการลูกค้า อลิอันซ์ อยุธยา ประกันชีวิต ตลอด 24 ชั่วโมง</p>
                        <div class="contact">
                            <a href="tel:1373" class="text-center btn-contact mx-4">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 25C0 11.1929 11.1898 0 25 0C38.8071 0 50 11.1898 50 25C50 38.8071 38.8102 50 25 50C11.1929 50 0 38.8102 0 25ZM30.8218 28.1117L28.7554 30.1781C28.4441 30.4894 27.7886 30.5757 27.4121 30.3565C27.297 30.2968 27.2004 30.2458 27.0547 30.1626C26.8 30.0173 26.5097 29.8375 26.1906 29.6222C25.268 28.9999 24.3093 28.2222 23.3679 27.2808C22.4265 26.3394 21.6495 25.3819 21.0285 24.4612C20.8136 24.1428 20.2883 23.2297 20.2883 23.2297C20.0678 22.862 20.1545 22.2095 20.4707 21.8934L22.5371 19.827C23.641 18.723 23.7592 16.8807 22.8013 15.6491L18.9159 11.3504C17.8891 10.0303 16.2647 9.53 15.0796 10.7151L11.9765 13.8182C8.40257 17.3921 12.733 26.4025 18.5754 32.2449C24.4173 38.0868 33.2572 42.2457 36.8306 38.6723L39.9337 35.5692C41.118 34.3849 40.8191 32.8564 39.4972 31.8283L34.9996 27.8474C33.7698 26.8909 31.926 27.0074 30.8218 28.1117Z" fill="#243286" />
                                    </svg>
                                    <p class="mb-0 mt-2">1373</p>
                                </div>
                            </a>
                            <a href="mailto:customercare@allianz.co.th" target="_blank" class="text-center btn-contact mx-4">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                        <path d="M25 50C38.8125 50 50 38.8125 50 25C50 11.1875 38.8125 0 25 0C11.1875 0 0 11.1875 0 25C0 38.8125 11.1875 50 25 50ZM9.8125 15.9375L21.1875 25L9.8125 34.0625V15.9375ZM40.1875 34.0625L28.8125 25L40.125 15.9375V34.0625H40.1875ZM9.875 36.1875L22.5 26.0625L25 28.0625L27.5 26.0625L40.125 36.1875H9.875ZM40.125 13.8125L25 25.9375L9.875 13.8125H40.125Z" fill="#243286" />
                                    </svg>
                                    <p class="mb-0 mt-2"><u>CUSTOMERCARE@ALLIANZ.CO.TH</u></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <center class="px-3 w-100 ">
                        <hr style="max-width: 590px;">
                    </center>
                    <div class="my-4">
                        <p class="service-center mt-4">ศูนย์บริการลูกค้า อลิอันซ์ อยุธยา ประกันชีวิต ตลอด 24 ชั่วโมง</p>
                        <div class="contact">
                            <a href="tel:1292" class="text-center btn-contact mx-4">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 25C0 11.1929 11.1898 0 25 0C38.8071 0 50 11.1898 50 25C50 38.8071 38.8102 50 25 50C11.1929 50 0 38.8102 0 25ZM30.8218 28.1117L28.7554 30.1781C28.4441 30.4894 27.7886 30.5757 27.4121 30.3565C27.297 30.2968 27.2004 30.2458 27.0547 30.1626C26.8 30.0173 26.5097 29.8375 26.1906 29.6222C25.268 28.9999 24.3093 28.2222 23.3679 27.2808C22.4265 26.3394 21.6495 25.3819 21.0285 24.4612C20.8136 24.1428 20.2883 23.2297 20.2883 23.2297C20.0678 22.862 20.1545 22.2095 20.4707 21.8934L22.5371 19.827C23.641 18.723 23.7592 16.8807 22.8013 15.6491L18.9159 11.3504C17.8891 10.0303 16.2647 9.53 15.0796 10.7151L11.9765 13.8182C8.40257 17.3921 12.733 26.4025 18.5754 32.2449C24.4173 38.0868 33.2572 42.2457 36.8306 38.6723L39.9337 35.5692C41.118 34.3849 40.8191 32.8564 39.4972 31.8283L34.9996 27.8474C33.7698 26.8909 31.926 27.0074 30.8218 28.1117Z" fill="#243286" />
                                    </svg>
                                    <p class="mb-0 mt-2">1292</p>
                                </div>
                            </a>
                            <a href="mailto:contact_aagi@allianz.co.th" target="_blank" class="text-center btn-contact mx-4">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                        <path d="M25 50C38.8125 50 50 38.8125 50 25C50 11.1875 38.8125 0 25 0C11.1875 0 0 11.1875 0 25C0 38.8125 11.1875 50 25 50ZM9.8125 15.9375L21.1875 25L9.8125 34.0625V15.9375ZM40.1875 34.0625L28.8125 25L40.125 15.9375V34.0625H40.1875ZM9.875 36.1875L22.5 26.0625L25 28.0625L27.5 26.0625L40.125 36.1875H9.875ZM40.125 13.8125L25 25.9375L9.875 13.8125H40.125Z" fill="#243286" />
                                    </svg>
                                    <p class="mb-0 mt-2"><u>CONTACT_AAGI@ALLIANZ.CO.TH</u></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <center class="px-3 w-100 ">
                        <hr style="max-width: 590px;">
                    </center>

                    <div class="my-4">
                        <p class="service-center mt-4">สำนักงานใหญ่ อลิอันซ์ อยุธยา</p>
                        <p style="color: #383838;font-size: 16px;text-align: center;font-style: normal;font-weight: 400;line-height: normal;">ชั้น 1 อาคารเพลินจิตทาวเวอร์ 898 ถนนเพลินจิต กรุงเทพฯ ​10330</p>
                        <div class="contact">
                            <a href="tel:023057000" target="_self" class="text-center btn-contact mx-4">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 25C0 11.1929 11.1898 0 25 0C38.8071 0 50 11.1898 50 25C50 38.8071 38.8102 50 25 50C11.1929 50 0 38.8102 0 25ZM30.8218 28.1117L28.7554 30.1781C28.4441 30.4894 27.7886 30.5757 27.4121 30.3565C27.297 30.2968 27.2004 30.2458 27.0547 30.1626C26.8 30.0173 26.5097 29.8375 26.1906 29.6222C25.268 28.9999 24.3093 28.2222 23.3679 27.2808C22.4265 26.3394 21.6495 25.3819 21.0285 24.4612C20.8136 24.1428 20.2883 23.2297 20.2883 23.2297C20.0678 22.862 20.1545 22.2095 20.4707 21.8934L22.5371 19.827C23.641 18.723 23.7592 16.8807 22.8013 15.6491L18.9159 11.3504C17.8891 10.0303 16.2647 9.53 15.0796 10.7151L11.9765 13.8182C8.40257 17.3921 12.733 26.4025 18.5754 32.2449C24.4173 38.0868 33.2572 42.2457 36.8306 38.6723L39.9337 35.5692C41.118 34.3849 40.8191 32.8564 39.4972 31.8283L34.9996 27.8474C33.7698 26.8909 31.926 27.0074 30.8218 28.1117Z" fill="#243286" />
                                    </svg>
                                    <p class="mb-0 mt-2"><u>02 305 7000</u></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-5">

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31005.79472570617!2d100.53414200000002!3d13.735132!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e298d1e5ec259f%3A0x980da925961105c4!2sSri%20Maha%20Mariamman%20Temple%20(Wat%20Khaek)!5e0!3m2!1sen!2sth!4v1719162663032!5m2!1sen!2sth" class="map-company" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <center class="px-3 w-100 ">
                <hr style="max-width: 590px;">
            </center>
            <style>
                .social-media {
                    color: #243286;
                    font-size: 18px;
                    font-style: normal;
                    font-weight: 700;
                    line-height: normal;
                    display: flex;
                    align-items: center;
                    margin-bottom: 14px;
                }
            </style>
            <div class="d-flex justify-content-center">
                <div class="d-block">
                    <a class="social-media" href="https://www.facebook.com/AZAYfan/">
                        <img src="{{url('img/icon/FB.png')}}" class="me-3"  alt="">
                        <span>Facebook</span>
                    </a>
                    <a class="social-media" href="https://www.instagram.com/AZAYfan/">
                        <img src="{{url('img/icon/IG.png')}}" class="me-3"  alt="">
                        <span>Instagram</span>

                    </a>
                    <a class="social-media" href="https://www.youtube.com/@AZAYfan">
                        <img src="{{url('img/icon/YT.png')}}" class="me-3"  alt="">
                        <span>Youtube</span>

                    </a>
                </div>
                <div class="d-block">
                    <a class="social-media" href="https://www.twitter.com/AZAYfan/">
                        <img src="{{url('img/icon/X.png')}}" class="me-3"  alt="">
                        <span>X</span>
                    </a>
                    <a class="social-media" href="https://page.line.me/343nljzv?openQrModal=true">
                        <img src="{{url('img/icon/Line.png')}}"  class="me-3" alt="">
                        <span>Line</span>
                    </a>
                    <a class="social-media" href="https://www.tiktok.com/@allianz_ayudhya">
                        <img src="{{url('img/icon/TikTok.png')}}"  class="me-3" alt="">
                        <span>TikTok</span>
                    </a>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="tab-pane fade show active" id="pills-tools" role="tabpanel" aria-labelledby="pills-tools-tab">
            <p class="title-tools">เครื่องมือบริษัท</p>
            <p></p>
            <div class="container-tap d-flex justify-content-center mb-4">
                <div class="tabs">
                    <input type="radio" id="radio-1" name="tabs" checked="">
                    <label class="tab" for="radio-1">แอปพลิเคชั่น</label>
                    <input type="radio" id="radio-2" name="tabs">
                    <label class="tab" for="radio-2">ทั้งหมด</label>
                    <input type="radio" id="radio-3" name="tabs">
                    <label class="tab" for="radio-3">เว็บไซต์</label>
                    <span class="glider"></span>
                </div>
            </div>


            <div class=" m-auto" style="max-width: 500px;padding:0 20px ;">

                <div class="tools-item">
                    <img src="{{url('img/icon/icon-tools1.png')}}" alt="">
                    <div class="ms-3 w-100" style="flex-direction: column; justify-content: space-between;display: flex;">
                        <span class="title-tools text-start" style="font-size: 16px;">Financial Health Check </span>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn-create-tools">กดเพื่อสร้าง</button>
                            <i class="fa-light fa-circle-exclamation cursor-pointer" data-toggle="modal" data-target="#modal_detail_app"></i>
                        </div>
                    </div>
                </div>

                <div class="tools-item">
                    <img src="{{url('img/icon/icon-tools2.png')}}" alt="">
                    <div class="ms-3 w-100" style="flex-direction: column; justify-content: space-between;display: flex;">
                        <span class="title-tools text-start" style="font-size: 16px;">Allianz Ayudhya - My Allianz</span>
                        <div>
                            <span class="company-name">Allianz Ayudhya Assurance Pcl.</span>

                            <div class="d-flex justify-content-between align-items-center mt-1">
                                <div>
                                    <a href="">
                                        <img src="{{url('img/icon/ios-download.png')}}" class="img-download" alt="">
                                    </a>
                                    <a href="">
                                        <img src="{{url('img/icon/android-download.png')}}" class="img-download" alt="">
                                    </a>
                                </div>
                                <i class="fa-light fa-circle-exclamation"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class=" d-flex justify-content-center">
                <div id="content_item_contact" class="w-100 row" style="max-width: 800px;">
                    <!-- item Contact -->
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-coc" role="tabpanel" aria-labelledby="pills-coc-tab">
            <div class="coc">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <img src="{{url('/img/logo/logo-alianz2.png')}}" height="36" alt="">
                        <p class="title-coc mt-2">อลิอันซ์ อยุธยา เคียงข้างทุกจังหวะชีวิต</p>
                    </div>
                </div>
                <p class="detail-coc">
                    ข้อตกลงและเงื่อนไขในการใช้งาน(แอปพลิเคชันซอฟต์แวร์)<br>
                    1. ข้อตกลงและเงื่อนไขในการใช้งาน <br>
                    จากการดาวน์โหลด เรียกดู เข้าถึง หรือใช้แอปพลิเคชันซอฟต์แวร์นี้ (“แอปพลิเคชันซอฟต์แวร์“) ผู้ใช้บริการตกลงที่จะผูกพันตามข้อตกลงและเงื่อนไขในการใช้งานนี้ (“ข้อตกลงและเงื่อนไขฯ“).
                    บริษัทขอสงวนสิทธิ์ในการแก้ไขข้อตกลงและเงื่อนไขฯ ได้ตลอดเวลา หากผู้ใช้บริการไม่เห็นด้วยกับข้อตกลงและเงื่อนไขฯ ข้อใดข้อหนึ่ง ผู้ใช้บริการจะต้องหยุดการเข้าถึงแอปพลิเคชันซอฟต์แวร์และหยุดใช้บริการของแอปพลิเคชันซอฟต์แวร์ทันที การที่ผู้ใช้บริการยังคงใช้แอปพลิเคชันซอฟต์แวร์ต่อไปจะถือเป็นการยอมรับข้อตกลงและเงื่อนไขฯ ดังกล่าว และตามที่จะมีการแก้ไขเปลี่ยนแปลงเป็นครั้งคราว<br>
                    2. คำนิยาม<br>
                    ในข้อตกลงและเงื่อนไขฯ ให้คำซึ่งมีความหมายเฉพาะต่อไปนี้มีความหมายดังต่อไปนี้ เว้นแต่เนื้อหาของประโยคจะกำหนดให้เป็นอย่างอื่น
                    “บัญชี” หมายถึง บัญชีที่ผู้ใช้สร้างขึ้นในแอปพลิเคชันซอฟต์แวร์ซึ่งถือเป็นส่วนหนึ่งในการลงทะเบียน
                    “ลงทะเบียน” หมายถึง การสร้างบัญชีในแอปพลิเคชันซอฟต์แวร์ และ “การลงทะเบียน” หมายถึง การดำเนินการสร้างบัญชีดังกล่าว
                    “บริการต่าง ๆ” หมายถึง บริการทั้งปวงที่บริษัท เกษมทรัพย์สิริ จำกัด พนักงาน บริษัทในเครือ หรือผู้รับจ้างของบริษัท เกษมทรัพย์สิริ จำกัด ให้บริการผ่านทางแอปพลิเคชันซอฟต์แวร์แก่บรรดาผู้ใช้ และ “บริการ” หมายถึง บริการอย่างใดอย่างหนึ่ง
                    “บรรดาผู้ใช้” หมายถึง บรรดาผู้ใช้แอปพลิเคชันซอฟต์แวร์ รวมถึงผู้ใช้บริการ และผู้ใช้หมายถึงผู้ใช้รายใดรายหนึ่ง<br>
                    3. ประเด็นทั่วไปเกี่ยวกับแอปพลิเคชันซอฟต์แวร์และบริการ<br>
                    3.1 การบังคับใช้ข้อตกลงและเงื่อนไขฯ : การใช้บริการต่าง ๆ และ/หรือแอปพลิเคชันซอฟต์แวร์จะอยู่ภายใต้บังคับของข้อตกลงและเงื่อนไขฯ ฉบับนี้
                </p>
                <div class="w-100 d-flex justify-content-center">

                    <label for="submit_coc" class="btn-submit-coc">
                        <input type="checkbox" name="submit_coc" id="submit_coc" class="me-2">
                        <svg class="me-2 d-none" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7778 0.746667L20.8 3.76889C20.8711 3.84 20.9422 3.87556 21.0133 3.91111C21.2267 4.01778 24.9956 3.94667 25.5289 3.94667C26.9156 3.94667 28.0533 5.08444 28.0533 6.47111C28.0533 7.04 28.0178 10.7733 28.0889 10.9867C28.1244 11.0578 28.16 11.1289 28.2311 11.2L31.2533 14.2222C32.2489 15.2178 32.2489 16.7822 31.2533 17.7778C30.8622 18.1689 28.16 20.7644 28.0889 21.0133C27.9822 21.2267 28.0533 24.9956 28.0533 25.5289C28.0533 26.9156 26.9156 28.0533 25.5289 28.0533C24.7467 28.0533 21.5111 27.9822 21.0133 28.0889C20.9422 28.1244 20.8711 28.16 20.8 28.2311L17.7778 31.2533C16.7822 32.2489 15.2178 32.2489 14.2222 31.2533C13.8667 30.8978 11.1644 28.1244 10.9867 28.0889C10.4889 27.9822 7.21778 28.0533 6.47111 28.0533C5.08444 28.0533 3.94667 26.9156 3.94667 25.5289C3.94667 24.7467 4.01778 21.5111 3.91111 21.0133C3.87556 20.8711 1.06667 18.1333 0.746667 17.7778C-0.248889 16.7822 -0.248889 15.2178 0.746667 14.2222L3.76889 11.2L3.94667 10.7378V6.47111C3.94667 5.08444 5.08444 3.94667 6.47111 3.94667C7.04 3.94667 10.7733 3.98222 10.9867 3.91111C11.2356 3.80444 13.8311 1.13778 14.2222 0.746667C15.2178 -0.248889 16.7822 -0.248889 17.7778 0.746667ZM10.4533 16.5333L13.7956 19.8756C14.1511 20.2311 14.7556 20.2311 15.1111 19.8756L21.5467 13.44C22.4356 12.5511 21.0844 11.2356 20.2311 12.1244L14.4356 17.8844L11.7689 15.2178C10.88 14.3289 9.56444 15.68 10.4533 16.5333ZM19.4844 5.08444L16.4622 2.06222C16.2133 1.81333 15.8222 1.81333 15.5733 2.06222L12.5511 5.08444C12.0889 5.54667 11.4489 5.83111 10.7733 5.83111H6.47111C6.11556 5.83111 5.83111 6.11556 5.83111 6.47111V10.7733C5.83111 11.1289 5.76 11.4489 5.65333 11.7333C5.51111 12.0178 5.33333 12.3022 5.12 12.5511L2.09778 15.5733C1.84889 15.8222 1.84889 16.2133 2.09778 16.4622L5.12 19.4844C5.36889 19.7333 5.54667 19.9822 5.65333 20.3022C5.79556 20.6222 5.83111 20.9422 5.83111 21.2622V25.5644C5.83111 25.92 6.11556 26.2044 6.47111 26.2044H10.7733C11.1289 26.2044 11.4489 26.2756 11.7333 26.3822C12.0533 26.5244 12.3022 26.7022 12.5511 26.9156L15.5733 29.9378C15.8222 30.1867 16.2133 30.1867 16.4622 29.9378L19.4844 26.9156C19.7333 26.6667 19.9822 26.4889 20.3022 26.3822C20.6222 26.24 20.9422 26.2044 21.2622 26.2044H25.5644C25.92 26.2044 26.2044 25.92 26.2044 25.5644V21.2622C26.2044 20.5867 26.4533 19.9467 26.9511 19.4844L29.9733 16.4622C30.2222 16.2133 30.2222 15.8222 29.9733 15.5733L26.9511 12.5511C26.9511 12.5156 26.2044 11.9467 26.2044 10.7733V6.47111C26.2044 6.11556 25.92 5.83111 25.5644 5.83111H21.2622C20.0889 5.83111 19.4844 5.08444 19.4844 5.08444Z" fill="white" />
                        </svg>
                        ฉันได้อ่านข้อความจนครบและรับทราบ
                    </label>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-tutorials" role="tabpanel" aria-labelledby="pills-tutorials-tab">
            <p class="title-tools">วิธีใช้เว็บไซต์ Allianz Journey</p>
            <div class="owl-carousel owl-theme mt-4" role="group" aria-label="First group">
                <div class="item text-center">
                    <p class="title-tools">รู้จักเว็บนี้ง่ายๆ ใน 3 นาที !</p>
                    <center>
                        <img src="{{url('img/icon/img-tools.png')}}" style="width: 100%;max-width: 437px;" alt="">
                    </center>
                    <p class="mt-2 detail-tools">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>

                <div class="item text-center">
                    <p class="title-tools">รู้จักเว็บนี้ง่ายๆ ใน 3 นาที !</p>
                    <center>
                        <img src="{{url('img/icon/img-tools.png')}}" style="width: 100%;max-width: 437px;" alt="">
                    </center>
                    <p class="mt-2 detail-tools">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="item text-center">
                    <p class="title-tools">รู้จักเว็บนี้ง่ายๆ ใน 3 นาที !</p>
                    <center>
                        <img src="{{url('img/icon/img-tools.png')}}" style="width: 100%;max-width: 437px;" alt="">
                    </center>
                    <p class="mt-2 detail-tools">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('submit_coc').addEventListener('change', function() {
        let input = this;
        let svg = input.nextElementSibling;

        if (input.checked) {
            document.querySelector('.btn-submit-coc').classList.add('active');
            input.classList.add('d-none');
            svg.classList.remove('d-none');
            svg.classList.add('svg-visible');
        }
        //  else {
        //     input.classList.remove('input-hidden');
        //     svg.classList.add('d-none');
        //     svg.classList.remove('svg-visible');
        // }
    });
</script>

<!-- Modal -->
<div class="modal fade" id="modal_detail_app" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body p-4" style="border-radius: 10px;background: #F0F5FF;box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
                <div class="d-flex justify-content-center">
                    <img src="{{url('img/icon/icon-tools2.png')}}" width="48" height="48" alt="">
                </div>
                <p class="title-tools mt-2" style="font-size: 14px;">Allianz Ayudhya - My Allianz</p>
                <p class="text-detail-app">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime nemo dolorem aut illo amet dicta sunt! Dolorum expedita voluptas culpa magni libero architecto vel aliquid, suscipit nobis doloremque delectus! Aliquid!
                </p>
                <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>

<script>
    $('.owl-carousel').owlCarousel({
        items: 1,
        loop: false,
        nav: true,
        autoHeight: true
    })
    document.querySelector('.owl-prev').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none" transform="rotate(180)">
<path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;
    document.querySelector('.owl-next').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none">
<path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        change_active_menu_theme_user('Tools');
    });

    function show_tools_contact() {
        // console.log('show_tools_contact');

        let content_item_contact = document.querySelector('#content_item_contact');
        content_item_contact.innerHTML = '';

        fetch("{{ url('/') }}/api/get_data_show_tools_contact")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if (result) {
                    for (let i = 0; i < result.length; i++) {

                        let html = `
                            <div class="col-md-6 p-2 contact-item">
                                <div class="">
                                    <p class="contact-title">` + result[i].type + `</p>
                                    <a class="d-block contact-phone" href="tel:02346798">
                                        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 13.5C0 6.04416 6.04252 0 13.5 0C20.9558 0 27 6.04252 27 13.5C27 20.9558 20.9575 27 13.5 27C6.04416 27 0 20.9575 0 13.5ZM16.6438 15.1803L15.5279 16.2962C15.3598 16.4643 15.0058 16.5109 14.8026 16.3925C14.7404 16.3603 14.6882 16.3327 14.6095 16.2878C14.472 16.2093 14.3153 16.1122 14.1429 15.996C13.6447 15.6599 13.127 15.24 12.6187 14.7317C12.1103 14.2233 11.6908 13.7062 11.3554 13.2091C11.2394 13.0371 10.9557 12.544 10.9557 12.544C10.8366 12.3455 10.8834 11.9931 11.0542 11.8224L12.17 10.7066C12.7662 10.1104 12.83 9.11558 12.3127 8.45053L10.2146 6.12924C9.66012 5.41637 8.78292 5.1462 8.14296 5.78616L6.46729 7.46182C4.53739 9.39173 6.87584 14.2574 10.0307 17.4122C13.1854 20.5669 17.9589 22.8127 19.8885 20.883L21.5642 19.2074C22.2037 18.5678 22.0423 17.7425 21.3285 17.1873L18.8998 15.0376C18.2357 14.5211 17.2401 14.584 16.6438 15.1803Z" fill="#243286" />
                                        </svg>
                                        ` + result[i].phone + `
                                    </a>
                                    <a class="d-block mt-2 contact-mail" href="mailto:natthanicha.thia@gmail.com">
                                        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                            <path d="M13.5 27C20.9587 27 27 20.9587 27 13.5C27 6.04125 20.9587 0 13.5 0C6.04125 0 0 6.04125 0 13.5C0 20.9587 6.04125 27 13.5 27ZM5.29875 8.60625L11.4413 13.5L5.29875 18.3938V8.60625ZM21.7013 18.3938L15.5588 13.5L21.6675 8.60625V18.3938H21.7013ZM5.3325 19.5413L12.15 14.0738L13.5 15.1538L14.85 14.0738L21.6675 19.5413H5.3325ZM21.6675 7.45875L13.5 14.0063L5.3325 7.45875H21.6675Z" fill="#243286" />
                                        </svg>
                                        <u>` + result[i].mail + `</u>
                                    </a>
                                </div>
                            </div>
                        `;

                        content_item_contact.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                    }
                }

            });
    }
</script>
@endsection