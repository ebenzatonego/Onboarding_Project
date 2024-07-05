@extends('layouts.theme_user')

@section('content')
<style>
    /* body{
        height: 100dvh;
        overflow: hidden;
    } */
    body {
        overflow: auto;
    }

    .row-content {
        margin: 0 !important;
    }

    .content-section {
        margin: 0 !important;
        padding-top: 60px !important;
    }

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

        .social-media img {
            width: 38px;
            height: 38px;
        }

        .social-media {
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

        .social-media img {
            width: 45px;
            height: 45px;
        }

        .social-media {
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

    .btn-create-tools-no-show {
        color: #fff;
        text-align: center;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 150%;
        /* 24px */
        letter-spacing: -0.304px;
        border-radius: 14px;
        background: #494949;
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
/*        text-decoration-line: underline;*/
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
        max-height: 45dvh;
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

        .tools.active.show {
            height: calc(100dvh - 200px);
        }

        .tools.active.show .container_tools {
            max-height: calc(100dvh - 200px);
        }
    }

    @media only screen and (min-width: 770px) and (max-width: 991px) {
        .profile-company {
            height: 255px;

        }

        .tools.active.show {
            height: calc(100dvh - 220px);
        }

        .tools.active.show .container_tools {
            max-height: calc(100dvh - 220px);
        }
    }


    @media screen and (min-width: 991px) {
        .profile-company {
            height: 255px;

        }

        .tools.active.show {
            height: calc(100dvh - 230px);
        }

        .tools.active.show .container_tools {
            max-height: calc(100dvh - 230px);
        }

        .tools.active.show {
            align-items: start !important;
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
        padding: 0 20px 0px 20px !important;
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

    .alert-tools-menu {
        position: absolute;
        top: -4px;
        right: 0px;
        width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 12px;
        font-weight: 500;
        color: #fff;
        background: #f62718;
    }
</style>

<script>

    document.addEventListener("DOMContentLoaded", function() {

        // Get the URL parameters
        const params = new URLSearchParams(window.location.search);

        // Get the value of the 'menu' parameter
        const menuValue = params.get('menu');

        if (menuValue == 'Tutorials') {
            document.querySelector('#pills-tutorials-tab').click();
        }
    });
    

</script>


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
            <li class="nav-item " style="position: relative;">
                <a class="nav-link menu-tools" id="pills-coc-tab" data-toggle="pill" href="#pills-coc" role="tab" aria-controls="pills-coc" aria-selected="false">
                    <span id="span_alert_tools_menu" class="alert-tools-menu d-none"></span>
                    COC
                </a>
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
                            <a class="mt-auto btn-see-more cursor-pointer" href="{{ url('page_products')}}" target="_self">
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
                            <a class="mt-auto btn-see-more cursor-pointer" href="{{ url('page_products')}}" target="_self">
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
                    justify-content: space-evenly;
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

                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31005.79472570617!2d100.53414200000002!3d13.735132!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e298d1e5ec259f%3A0x980da925961105c4!2sSri%20Maha%20Mariamman%20Temple%20(Wat%20Khaek)!5e0!3m2!1sen!2sth!4v1719162663032!5m2!1sen!2sth" class="map-company" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3875.6085172636667!2d100.54542873020459!3d13.742135495263945!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29edabfcfe5bf%3A0xa35784457a6c75a1!2sAllianz%20Ayudhya!5e0!3m2!1sen!2sth!4v1719849458484!5m2!1sen!2sth" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <img src="{{url('img/icon/FB.png')}}" class="me-3" alt="">
                        <span>Facebook</span>
                    </a>
                    <a class="social-media" href="https://www.instagram.com/AZAYfan/">
                        <img src="{{url('img/icon/IG.png')}}" class="me-3" alt="">
                        <span>Instagram</span>

                    </a>
                    <a class="social-media" href="https://www.youtube.com/@AZAYfan">
                        <img src="{{url('img/icon/YT.png')}}" class="me-3" alt="">
                        <span>Youtube</span>

                    </a>
                </div>
                <div class="d-block">
                    <a class="social-media" href="https://www.twitter.com/AZAYfan/">
                        <img src="{{url('img/icon/X.png')}}" class="me-3" alt="">
                        <span>X</span>
                    </a>
                    <a class="social-media" href="https://page.line.me/343nljzv?openQrModal=true">
                        <img src="{{url('img/icon/Line.png')}}" class="me-3" alt="">
                        <span>Line</span>
                    </a>
                    <a class="social-media" href="https://www.tiktok.com/@allianz_ayudhya">
                        <img src="{{url('img/icon/TikTok.png')}}" class="me-3" alt="">
                        <span>TikTok</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tools apps -->
        <div class="tab-pane fade show active" id="pills-tools" role="tabpanel" aria-labelledby="pills-tools-tab">
            <p class="title-tools">เครื่องมือบริษัท</p>
            <p></p>
            <div class="container-tap d-flex justify-content-center mb-4">
                <div class="tabs">
                    <input type="radio" id="radio-1" name="tabs_type_app" value="app" onchange="change_view_app_type();">
                    <label class="tab" for="radio-1">
                        แอปพลิเคชั่น
                    </label>
                    <input type="radio" id="radio-2" name="tabs_type_app" checked="" value="all" onchange="change_view_app_type();">
                    <label class="tab" for="radio-2">
                        ทั้งหมด
                    </label>
                    <input type="radio" id="radio-3" name="tabs_type_app" value="web" onchange="change_view_app_type();">
                    <label class="tab" for="radio-3">
                        เว็บไซต์
                    </label>
                    <span class="glider"></span>
                </div>
            </div>

            <script>
                function change_view_app_type() {
                    let tabs_type_app = document.querySelectorAll('[name="tabs_type_app"]');
                    let tabs_type_app_value = "";
                    tabs_type_app.forEach(tabs_type_app => {
                        if (tabs_type_app.checked) {
                            tabs_type_app_value = tabs_type_app.value;
                        }
                    })

                    // document.querySelector('#div_tools_type_app').classList.add('d-none');
                    // document.querySelector('#div_tools_type_web').classList.add('d-none');

                    let div_tools_app = document.querySelectorAll('.div_tools_app');
                    div_tools_app.forEach(div_tools_app => {
                        div_tools_app.classList.add('d-none')
                    })

                    if (tabs_type_app_value == "all") {
                        // document.querySelector('#div_tools_type_app').classList.remove('d-none');
                        // document.querySelector('#div_tools_type_web').classList.remove('d-none');
                        let item_all = document.querySelectorAll('.div_tools_app');
                            item_all.forEach(item_all => {
                                item_all.classList.remove('d-none')
                            })
                    } else if (tabs_type_app_value == "app") {
                        // document.querySelector('#div_tools_type_app').classList.remove('d-none');
                        let app = document.querySelectorAll('[type_app="app"]');
                        app.forEach(app => {
                            app.classList.remove('d-none')
                        })
                    } else if (tabs_type_app_value == "web") {
                        // document.querySelector('#div_tools_type_web').classList.remove('d-none');
                        let app = document.querySelectorAll('[type_app="web"]');
                        app.forEach(app => {
                            app.classList.remove('d-none')
                        })
                    }
                }
            </script>


            <div class=" m-auto" style="max-width: 500px;padding:0 20px 20px 20px;">

                <div class="tools-item">
                    <img src="{{url('img/icon/icon-tools1.png')}}" alt="">
                    <div class="ms-3 w-100" style="flex-direction: column; justify-content: space-between;display: flex;">
                        <span class="title-tools text-start" style="font-size: 16px;">
                            Financial Health Check
                        </span>
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- <a href="https://financial-health-check.azayagencyjourney.com/?user_params={{ Auth::user()->account }}" class="btn-create-tools">
                                กดเพื่อสร้าง
                            </a> -->
                            <button class="btn-create-tools-no-show" disabled>
                                coming soon
                            </button>
                            <i class="fa-light fa-circle-exclamation cursor-pointer" onclick="open_modal_detail_app('FHC')"></i>
                        </div>
                    </div>
                </div>

                <div id="div_tools_type_app" class="">
                    <!-- Tools APPs -->
                </div>

                <div id="div_tools_type_web" class="">
                    <!-- Tools WEB -->
                </div>

            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                get_data_tools_apps();
            });

            var arr_tools_apps;

            function get_data_tools_apps() {
                fetch("{{ url('/') }}/api/get_data_tools_apps")
                    .then(response => response.json())
                    .then(result => {
                        // console.log(result);

                        if (result) {

                            arr_tools_apps = result;

                            for (let i = 0; i < result.length; i++) {

                                let html;

                                if (result[i].type == "แอปพลิเคชั่น") {

                                    let div_tools_type_app = document.querySelector('#div_tools_type_app');
                                    html = `
                                        <div type_app="app" class="div_tools_app tools-item">
                                            <img src="` + result[i].photo_icon + `" alt="">
                                            <div class="ms-3 w-100" style="flex-direction: column; justify-content: space-between;display: flex;">
                                                <span class="title-tools text-start" style="font-size: 16px;">
                                                    ` + result[i].name + `
                                                </span>
                                                <div>
                                                    <span class="company-name">
                                                        Allianz Ayudhya Assurance Pcl.
                                                    </span>

                                                    <div class="d-flex justify-content-between align-items-center mt-1">
                                                        <div>
                                                            <a href="` + result[i].link_ios + `" target="bank">
                                                                <img src="{{url('img/icon/download-ios.png')}}" class="img-download" alt="">
                                                            </a>
                                                            <a href="` + result[i].link_android + `" target="bank">
                                                                <img src="{{url('img/icon/download-android.png')}}" class="img-download" alt="">
                                                            </a>
                                                        </div>
                                                        <i class="fa-light fa-circle-exclamation" onclick="open_modal_detail_app(` + i + `)"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;

                                    div_tools_type_app.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                                } else if (result[i].type == "เว็บไซต์") {

                                    let div_tools_type_web = document.querySelector('#div_tools_type_web');
                                    html = `
                                        <div type_app="web" class="div_tools_app tools-item">
                                            <img src="` + result[i].photo_icon + `" alt="">
                                            <div class="ms-3 w-100" style="flex-direction: column; justify-content: space-between;display: flex;">
                                                <span class="title-tools text-start" style="font-size: 16px;">
                                                    ` + result[i].name + `
                                                </span>
                                                <span class="company-name">
                                                    Allianz Ayudhya Assurance Pcl.
                                                </span>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="` + result[i].link_web + `" class="btn-create-tools" target="bank">
                                                        เข้าสู่เว็บไซต์
                                                    </a>
                                                    <i class="fa-light fa-circle-exclamation cursor-pointer" onclick="open_modal_detail_app(` + i + `)"></i>
                                                </div>
                                            </div>
                                        </div>
                                    `;

                                    // div_tools_type_web.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                                    div_tools_type_app.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                                }
                            }
                        }

                    });
            }

            function open_modal_detail_app(type) {
                // console.log(type);

                let img_modal = document.querySelector('#img_modal_tools_apps');
                img_modal.src = '';
                let name_modal = document.querySelector('#name_modal_tools_apps');
                name_modal.innerHTML = '';
                let detail_modal = document.querySelector('#detail_modal_tools_apps');
                // detail_modal.innerHTML = '';

                if (type == 'FHC') {
                    img_modal.src = `{{url('img/icon/icon-tools1.png')}}`;
                    name_modal.innerHTML = 'Financial Health Check';
                    detail_modal.innerHTML = 'การตรวจสอบสุขภาพทางการเงิน เป็นกระบวนการที่สำคัญ ในการประเมินและทำความเข้าใจสถานะทางการเงินของคุณ สามารถช่วยให้คุณเห็นภาพรวมของการจัดการเงินส่วนบุคคล';
                } else {
                    img_modal.src = arr_tools_apps[type].photo_icon;
                    name_modal.innerHTML = arr_tools_apps[type].name;
                    detail_modal.innerHTML = arr_tools_apps[type].detail;
                }

                document.querySelector('#btn_open_modal_detail_app').click();
            }
        </script>

        <!-- contact -->
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
                    <!-- Ayudhaya Allianz C.P. Life<br>
                ข้อพึงปฏิบัติตามจรรยาบรรณของผู้ขายประกันชีวิต <br>
                Sales Person Code of Conduct <br> -->
                    <center>

                        <b>ข้อพึงปฏิบัติตามจรรยาบรรณเพื่อจริยธรรมทางธุรกิจและการปฏิบัติตามกฎระเบียบของผู้ขายประกันชีวิต</b> <br>
                    </center>
                    <b>ความนำ</b> <br>
                    <b>Preamble</b> <br> <br>
                    บริษัท อยุธยา อลิอันซ์ ซี.พี. ประกันชีวิต จำกัด (มหาชน) บริษัทหนึ่งในกลุ่มอลิอันซ์ ดำรงอยู่ด้วยความไว้วางใจที่ผู้ถือหุ้น ลูกค้า พนักงานและประชาชนทั่วไปมีต่อการดำเนินงานและ ความซื่อสัตย์สุจริตของบริษัทฯ ความไว้วางใจดังกล่าวนี้ เกิดขึ้นจากการปฏิบัติตนและความสามารถของพนักงาน ผู้จัดการและหุ้นส่วนธุรกิจที่กระทำการแทนหรือในนาม บริษัทฯ
                    <br>
                    Ayudhya Allianz C.P. Life Pcl ("AACP") , which is part of the Allianz Group, is based upon the trust that its shareholders, clients, employees and the general public at large have in its performance and integrity. This trust also depends on the personal conduct and capability of the employees, managers and business partners acting for or on behalf of AACP.
                    <br><br>
                    ผู้ขายประกันชีวิตเป็นหน่วยงานแรกที่ติดต่อกับลูกค้า ความสำเร็จและความยั่งยืนของการขายเป็นหัวใจที่จะนำไปสู่การเติบโตที่ยั่งยืนและมีกำไรของบริษัทฯ
                    <br>
                    Sales Person is the first interface with the Client. The success and sustainability of sales activities is key to the sustainable and profitable growth of AACP
                    <br>
                    <br>
                    การใช้บังคับ Application ข้อพึงปฏิบัติตามจรรยาบรรณนี้ สะท้อนถึงหลักการที่ สนับสนุนส่งเสริมการเติบโตของการขายที่ประสบความสำเร็จตัวแทนประกันชีวิต พนักงาน หรือหุ้นส่วนธุรกิจของบริษัทฯ ที่จะต้องถือปฏิบัติเพื่อป้องกันมิให้เกิดความกังขาในความ ซื่อสัตย์สุจริตของผู้ขายประกันชีวิต หรือของบริษัทฯ

                    <br>
                    This Code of Conduct reflects the principles that support the successful and sustainable growth of sales of AACP. They represent minimum standards for all Sales Persons acting as employees or business partners of AACP, with a view to preventing situations that could การตีความ Interpretation

                    <br>
                    <br>
                    <br>
                    <b>ในข้อพึงปฏิบัติตามจรรยาบรรณนี้ คำหรือข้อความต่อไปนี้ ให้ มีความหมายดังนี้</b>
                    <br>
                    <b>In this Code of Conduct the following terms have the meanings stated below:</b>
                    <br>
                    <br>
                    “ลูกค้า” ให้หมายความรวมถึง ผู้มุ่งหวัง ลูกค้า ผู้ถือกรมธรรม์ ผู้รับประโยชน์ นักลงทุน และ/หรือผู้เรียกร้องสินไหม แล้วแต่กรณี

                    <br>
                    "Client (s) " includes prospects, customers, policyholders, beneficiaries, investors and/or claimants as applicable.

                    <br>
                    <br>
                    “ผู้ขายประกันชีวิต” ให้หมายความรวมถึง พนักงานฝ่ายขาย ตัวแทน ผู้บริหารตัวแทน ผู้บริหารฝ่ายขาย นายหน้า ผู้ได้รับ สิทธิ คนกลาง หรือผู้แทนในการขายประกันภัยอื่นๆ ที่ปฏิบัติ หน้าที่ในนามบริษัทฯ

                    <br>
                    "Sales Person (s) " includes sales employees, agency leaders, insurance agents, insurance brokers, intermediaries or other insurance sales representatives acting on behalf of AACP. “
                    <br>
                    <br>
                    กรมธรรม์ประกันภัย” ให้หมายความรวมถึง กรมธรรม์ ประกันภัยใดๆ ที่ออกโดยบริษัทฯ
                    <br>
                    "Insurance Policy (ies) ", "Insurance Product (s) " include any insurance policy issued by AACP. “
                    <br>
                    <br>
                    ใบเสนอขอเอาประกันภัย” ให้หมายความรวมถึง ใบคำขอเอา ประกันภัย และเอกสารอื่นใดที่เป็นส่วนหนึ่งของกรมธรรม์ประกันภัย

                    <br>
                    "Proposal form” includes Insurance application forms, and any other documents which are part of insurance policies.
                    <br>
                    <br>
                    “ผู้รับมอบฉันทะ” ไม่รวมถึง พนักงานของนิติบุคคลที่จัดตั้ง โดยผู้ขายประกันชีวิต

                    <br>
                    "Proxy (ies) " excludes an employee of a legal entity that is a Sales Person.
                    <br>
                    <br>
                    “ขาย” หรือ แนะนำผู้มุ่งหวังให้กับผู้ขายประกันชีวิต
                    <br>
                    "Sell" or "Solicit or procure" does not include the basic act of referral by anyone else of a potential Client to a Sales Person.

                    <br>
                    <br>
                    <br>
                    <b>หลักการ Principles ผู้ขายประกันชีวิตทุกระดับชั้นต้องปฏิบัติตามหลักการและ ประพฤติปฏิบัติดังนี้</b>
                    <br>
                    <b>Sales Persons at all levels have to comply with the following principles and supporting behaviors:</b>
                    <br>
                    <br>
                    (1) ใบอนุญาต ผู้ขายประกันชีวิตต้องมีใบอนุญาตถูกต้องตามกฎหมายและจด ทะเบียนและ/หรือได้รับอนุมัติจากบริษัทฯ ให้ขายผลิตภัณฑ์ ประกันภัยตลอดเวลาที่ทำการขาย

                    <br>
                    (1) License The Sales Person must at all relevant times be properly licensed under the law and registered and/or approved under the relevant AACP to sell Insurance Products.

                    (1.1) ผู้ขายประกันชีวิตต้องไม่ชักชวนหรือจัดหาธุรกิจ ประกันภัยให้แก่บริษัทฯ โดยไม่มีใบอนุญาตที่มีผลบังคับตาม กฎหมายและไม่ได้จดทะเบียนกับบริษัทฯ
                    <br>(1.1) The Sales Person must not solicit or procure insurance business for AACP without first holding a license valid under the law and being registered with AACP.
                    <br>
                    <br>
                    (1.2) ผู้ขายประกันชีวิตต้องไม่เป็นตัวแทนของบริษัทอื่นใดโดยไม่ได้รับอนุมัติเป็นลายลักษณ์อักษรจากบริษัทฯ ก่อน
                    <br>(1.2) The Sales Person must not seek to represent any other company without the prior written approval from AACP.
                    <br>
                    <br>
                    (1.3) ผู้ขายประกันชีวิตต้องไม่มีใบอนุญาต หรือจดทะเบียน เป็นตัวแทนกับบริษัทประกันภัยอื่น เว้นแต่ได้รับความยินยอม เป็นลายลักษณ์อักษรจากบริษัทฯ หากได้มีใบอนุญาตและจด ทะเบียนเป็นตัวแทนกับบริษัทฯ แล้ว และใบอนุญาตอื่นใดที่ ผู้ขายประกันชีวิตมีต้องไม่เป็นการอนุญาตให้ขายผลิตภัณฑ์ ประกันภัยที่เป็นการแข่งขันกับผลิตภัณฑ์ประกันภัยที่บริษัทฯ อนุญาตให้ผู้ขายประกันชีวิตสามารถขายได้
                    <br>(1.3) The Sales Person must not hold licenses or be registered as an agent with other insurance providers, unless obtaining a written consent from AACP if he/she is already licensed and registered with AACP and (ii) any other license must not be to sell insurance products in competition to the Insurance Products provided by AACP the Sales Person is licensed with.
                    <br>
                    <br>
                    (1.4) ผู้ขายประกันชีวิตต้องแจ้งให้บริษัทฯ ทราบทันทีที่ ได้รับการตักเตือนด้วยวาจาหรือเป็นลายลักษณ์อักษร การเพิกถอนใบอนุญาต หรือการขาดคุณสมบัติการเป็นตัวแทนประกัน ชีวิตตามพระราชบัญญัติประกันชีวิตหรือกฎระเบียบที่เกี่ยวข้อง ใดๆ หรือตามนโยบายของบริษัทฯ
                    <br>(1.4) The Sales Person must immediately notify AACP of any verbal or written warning, blacklisting or disqualification he/she has attracted under the life insurance act or relevant regulations, or AACP' policies.
                    <br>
                    <br>
                    (1.5) ผู้ขายประกันชีวิตต้องรายงานให้บริษัทฯ ทราบหาก พบว่ามีผู้ขายประกันชีวิตอื่นใดขาดคุณสมบัติการเป็นตัวแทน ประกันชีวิตตามพระราชบัญญัติประกันชีวิต หรือระเบียบของ บริษัทฯ หรือละเมิดข้อพึงปฏิบัติตามจรรยาบรรณนี้ ผู้ขาย ประกันชีวิตที่ได้แจ้งให้บริษัทฯ ทราบโดยสุจริตจะไม่ถูก เปิดเผยชื่อ แม้ต่อมาพบว่าเรื่องนั้นไม่มีมูลก็ตาม
                    <br>(1.5) The Sales Person must report to AACP if he/she knows of any other Sales Person attracting any disqualification under the life insurance act or AACP's Policy or breaching this code. No Sales Person who communicates a bona fide concern shall be exposed to retaliation by AACP even if the concern eventually proves to be unfounded.
                    <br>
                    <br>
                    (1.6) ผู้ขายประกันชีวิตต้องไม่ใช้หรือมอบฉันทะให้ผู้อื่น ไปชักชวนหรือจัดหาธุรกิจประกันภัยให้กับบริษัทฯ
                    <br>(1.6) The Sales Person must not use or authorize proxies to solicit or procure insurance business for AACP.
                    <br>
                    <br>
                    (1.7) ผู้ขายประกันชีวิตต้องไม่เป็นผู้รับมอบฉันทะให้กับ ผู้ขายประกันชีวิตรายอื่น (1.7) The Sales Person must not act as a proxy for another Agent.
                    <br>
                    <br>
                    (2) การแสดงตนและการเปิดเผยตน - ผู้ขายประกันชีวิต ที่ได้รับอนุญาตและ/หรือจดทะเบียนเป็นตัวแทนกับบริษัทฯ ต้องแสดงตนก่อนที่จะเปิดการขาย
                    <br>(2.) Identification and personal disclosure- The Sales Person, who is licensed and/or registered with AACP, must identify himself/herself before starting the process of selling.
                    <br>
                    <br>
                    (2.1) ผู้ขายประกันชีวิตต้องเปิดเผยการได้รับมอบอำนาจ ของตนจากบริษัทฯ ให้ลูกค้าทราบ
                    <br>(2.1) The Sales Person must disclose his/her AACP authorization to the Client.
                    <br>
                    <br>
                    (2.2) ผู้ขายประกันชีวิตต้องแสดงใบอนุญาตของตนให้กับ ลูกค้า ก่อนเปิดการขาย ตามที่กฎหมายกำหนด <br>(2.2) As required by law, the Sales Person must disclose his/her license to the Client before starting the process of selling.
                    <br>
                    <br>
                    (3) ความซื่อสัตย์สุจริต ผู้ขายประกันชีวิตต้องปฏิบัติตนด้วยความซื่อสัตย์สุจริตอยู่เสมอ <br>(3.)
                    Honesty The Sales Person must act with integrity at all times.
                    <br>
                    <br>(3.1) ผู้ขายประกันชีวิตต้องมีความจริงใจและปฏิบัติตน ด้วยความซื่อสัตย์สุจริตอย่างยิ่งต่อลูกค้า บริษัทฯ และเพื่อนร่วม อาชีพ
                    <br>(3.1) The Sales Person must be truthful to, and act honestly towards, the Client, AACP and any business associates in the greatest degree possible (i.e. act in utmost good faith) .
                    <br>
                    <br>(3.2) ผู้ขายประกันชีวิตต้องไม่แสวงประโยชน์ที่ไม่ เหมาะสมจากความแตกต่างทางเพศ การขาดประสบการณ์ การขาดการศึกษา ความอ่อนเยาว์ ความไม่สันทัด ความไม่เท่าทัน ทางธุรกิจ การเจ็บป่วย หรือเกณฑ์ที่เกี่ยวข้องอื่นๆ ของลูกค้า
                    <br>(3.2) The Sales Person must not take improper advantage of a Client's gender, inexperience, lack of education, youth, lack of sophistication, unbusinesslike habits or ill health or other relevant criteria.
                    <br>
                    <br>(3.3) ผู้ขายประกันชีวิตต้องไม่ทำให้ลูกค้าหรือบริษัทฯ เข้าใจผิดหรือหลงผิดด้วยการแสดงข้อมูลอันเป็นเท็จหรือปกปิด ข้อความจริงอันเป็นสาระสำคัญ
                    <br>(3.3) The Sales Person must not mislead clients or AACP through false statements or by withholding material information. การขัดแย้งทางผลประโยชน์ Conflict of Interest
                    <br>
                    <br>(3.4) ผู้ขายประกันชีวิตต้องไม่มีส่วนในความขัดแย้งทาง ผลประโยชน์กับธุรกิจตัวแทนของตน ผู้ขายประกันชีวิตต้อง แจ้งให้บริษัทฯ ทราบทันทีที่มีการกระทำที่อาจก่อให้เกิดความ ขัดแย้งทางผลประโยชน์ รวมถึงการกระทำใดๆ ที่อาจก่อให้เกิด ความเสียหายต่อบริษัทฯ
                    <br>(3.4) The Sales Person must not enter into a conflict of interest situation with his/her agency business. The Sales Person must inform AACP immediately in case of an act that may constitute a conflict of interest including an act that may cause any damage to AACP.
                    <br>
                    <br>(3.5) ผู้ขายประกันชีวิตต้องไม่มีอคติกับลูกค้าหรือ บริษัทฯ จนทำให้ลูกค้าหรือบริษัทฯ เสียประโยชน์ <br>(3.5) The Sales Person must not knowingly prejudice the interests of a Client or AACP for personal gain.
                    <br>
                    <br>(3.6) ผู้ขายประกันชีวิตต้องไม่ใช้ตำแหน่งหน้าที่ของตนใน ฐานะตัวแทน หรือข้อมูลที่ได้รับเนื่องจากตำแหน่งหน้าที่ของ ตนเพื่อประโยชน์ส่วนตนโดยมิชอบ
                    <br>(3.6) The Sales Person must not improperly use his/her position as an agent or the knowledge obtained because of this position for his/her personal benefit การกระทำผิดทางอาญา Criminal Acts
                    <br>
                    <br>(3.7) ผู้ขายประกันชีวิตต้องไม่กระทำการใดๆ อันเป็นการ ลักขโมย หรือทุจริต
                    <br>(3.7) The Sales Person must not commit any conduct in the nature of theft or fraud.
                    <br>
                    <br>(3.8) ผู้ขายประกันชีวิตต้องไม่กระทำการโดยตรงหรือโดย อ้อมอันเป็นการปลอมแปลงเอกสาร หรือใช้ข้อมูลอันเป็นเท็จ ในการโฆษณา เชิญชวนหรือกระทำการใดๆ อันเป็นเหตุให้เกิด ความเข้าใจผิดเกี่ยวกับเงื่อนไขของกรมธรรม์ประกันภัย ผลประโยชน์หรือความเสี่ยงใดๆ ในการขายผลิตภัณฑ์ ประกันภัย
                    <br>(3.8) The Sales Person must not, whether directly or indirectly, forge a document, use false information in advertising, induce or whatsoever means to cause any misunderstanding about Insurance Policy conditions, benefits, or any risk in selling Insurance Products.
                    <br>
                    <br>(3.9) ผู้ขายประกันชีวิตต้องไม่ทำการก้าวก่ายหรือ เปลี่ยนแปลงโดยวิธีการใดๆ ในแบบฟอร์มหรือเอกสารที่เป็น ของบริษัทฯ หรือของลูกค้าที่มอบให้แก่ตน
                    <br>(3.9) The Sales Person must not change or interfere in any way with any forms or documents provided by AACP or the Client to him/her.
                    <br>
                    <br>(3.10) ผู้ขายประกันชีวิตต้องไม่ทำการก้าวก่ายหรือ เปลี่ยนแปลงโดยวิธีการใดๆ กับข้อมูลรายละเอียดที่ลูกค้ากรอก ลงในใบเสนอขอเอาประกันภัยหรือในแบบฟอร์มอื่นใด
                    <br>(3.10) The Sales Person must not change or interfere in any way with the details filled in the proposal form or any other form by the Client.
                    <br>
                    <br>(3.11) ผู้ขายประกันชีวิตต้องไม่เข้าร่วมในการกระทำใด ๆ ที่ ผิดกฎหมายกับบุคคลภายนอก ลูกค้าของตน หรือพนักงานใดๆ ของบริษัทฯ หรือของผู้ขายประกันชีวิตอื่น
                    <br>(3.11) The Sales Person must not indulge in any kind of illegal activity through third parties, his/her clients or any employees of AACP or other Sales Persons.
                    <br>
                    <br>(3.12) ผู้ขายประกันชีวิตต้องให้ความช่วยเหลือแก่บริษัทฯ ในการปฏิบัติตามหลักการ “รู้จักตัวตนของลูกค้า” เพื่อป้องกัน การฟอกเงินและหลีกเลี่ยงการถูกใช้เป็นเครื่องมือในการฟอกเงิน
                    <br>(3.12) The Sales Person must assist AACP to comply with the "know your customer" principles to prevent money laundering and to avoid being used as a tool of money laundering.
                    <br>
                    <br>(3.13) ผู้ขายประกันชีวิตต้องไม่ให้หรือทำให้มีการใช้ บริษัทฯ เป็นเครื่องมือในการสนับสนุนทางการเงินแก่ ขบวนการก่อการร้ายหรือองค์กรผิดกฎหมายใดๆ
                    <br>(3.13) The Sales Person must not provide or enable the use of AACP to provide financial support to a terrorist movement or any organized crime. ของรางวัลและส่วนลด Reward and Rebates
                    <br>
                    <br>(3.14) ผู้ขายประกันชีวิตต้องไม่เรียกร้องหรือยอมรับของ รางวัล ผลประโยชน์ หรือของกำนัลจากลูกค้า เพื่อเป็นการตอบ แทนการให้บริการใดๆ ตามกรมธรรม์ประกันภัย รวมถึงการ บริการรับชำระค่าเบี้ยประกันภัยหรือการบริการอื่นๆ
                    <br>(3.14) The Sales Person must not demand or accept a reward, benefit or gift from the Client in return for any service under the Insurance Policy including premium payment services or any other service.
                    <br>
                    <br>(3.15) ผู้ขายประกันชีวิตต้องไม่เสนอของรางวัล นอกเหนือไปจากของกำนัลเพื่อส่งเสริมการขายตามธรรมเนียม ปฏิบัติทางธุรกิจปกติ และไม่เสนอส่วนลดจากค่าบำเหน็จ ให้กับลูกค้าเพื่อเป็นสิ่งจูงใจในการซื้อกรมธรรม์ประกันภัย
                    <br>(3.15) The Sales Person must not offer a reward, other than promotional items in the ordinary course of business, or commission rebate to the Client as a motivation for purchasing an Insurance Policy.
                    <br>
                    <br>(3.16) ผู้ขายประกันชีวิตต้องไม่เสนอให้ส่วนแบ่งค่าบำเหน็จ หรือผลประโยชน์ใดๆ กับลูกค้า เพื่อชักจูงลูกค้าให้ซื้อกรมธรรม์ประกันภัย
                    <br>(3.16) The Sales Person must not offer to share his/her commission/ incentive with the Client to induce the Client to purchase an Insurance Product.
                    <br>
                    <br>(3.17) ผู้ขายประกันชีวิตต้องไม่แนะนำหรือชักชวนเพื่อน ร่วมอาชีพให้เสนอส่วนลดจากค่าบำเหน็จ <br>(3.17) The Sales Person must not recommend or persuade a business associate to offer a commission rebate.
                    <br>
                    <br>(3.18) ผู้ขายประกันชีวิตต้องไม่เรียกร้องหรือรับส่วนแบ่ง ของเงินผลประโยชน์จากผู้รับประโยชน์ตามกรมธรรม์ประกันภัย
                    <br>(3.18) The Sales Person must not demand or receive a share of the proceeds from the beneficiary under an Insurance Product.

                    <br>
                    <br>(3.19) ผู้ขายประกันชีวิตต้องไม่กระทำการโดยทุจริตเกี่ยวกับเงินหรือทรัพย์สิน
                    <br>(3.19) The Sales Person must not deal dishonestly with money or property.

                    <br>
                    <br>(3.20) ผู้ขายประกันชีวิตต้องไม่เสนออัตราค่าเบี้ยประกันภัย ผลประโยชน์ ข้อกำหนดและเงื่อนไขใดๆ เกี่ยวกับกรมธรรม์ ประกันภัยต่อลูกค้าแตกต่างไปจากที่บริษัทฯ เสนอ
                    <br>(3.20) The Sales Person must not offer different rates, advantages, terms and conditions in respect of an Insurance Product to the Client other than those offered by AACP.

                    <br>
                    <br>(3.21) ผู้ขายประกันชีวิตต้องไม่สนับสนุน ชักชวน แนะนำ จูงใจ หรือเสนอผลประโยชน์ใด ๆ แก่เพื่อนร่วมอาชีพ ผู้ขาย ประกันชีวิตคนอื่น หรือพนักงานของบริษัทฯ เพื่อให้ไปร่วม งานกับบริษัทประกันชีวิตอื่นใด
                    <br>(3.21) The Sales Person must not facilitate, persuade, guide, motivate or offer any benefit to a business associate, Sales Person or AACP's employee to join any other insurance provider

                    <br>
                    <br>(4) การให้เกียรติ ผู้ขายประกันชีวิตต้องให้เกียรติกับลูกค้า บริษัทฯ และเพื่อน ร่วมอาชีพเสมอ
                    <br>(4.) Respect The Sales Person must always deal with Clients, AACP and business associates in a respectful manner.

                    <br>
                    <br>(4.1) ผู้ขายประกันชีวิตต้องไม่แสดงกิริยามารยาทที่ไม่ สุภาพต่อลูกค้าหรือเพื่อนร่วมอาชีพ <br>(4.1) The Sales Person must not behave in a discourteous manner towards the Client or business associates.

                    <br>
                    <br>(4.2) ผู้ขายประกันชีวิตต้องหลีกเลี่ยงการวิพากษ์วิจารณ์ ความสามารถ ความประพฤติ คำแนะนำ หรือข้อกล่าวหาของ ผู้ขายประกันชีวิตอื่น โดยขาดการไตร่ตรอง ขาดข้อเท็จจริง หรือโดยไม่จำเป็น แต่ต้องพร้อม หากได้รับการร้องขอ ที่จะให้ คำแนะนำที่เหมาะสมแก่ลูกค้าตามขั้นตอนการดำเนินการ ร้องเรียนและร่วมมือกับบริษัทฯ และเจ้าหน้าที่ทางราชการ ใน การสอบสวนข้อร้องเรียนและการบังคับใช้กฎหมาย
                    <br>(4.2) The Sales Person must avoid ill-considered, uninformed or unnecessary criticism of the competence, conduct, advice or charges of other Sales Persons, but be prepared, when requested, to properly advise a Client in the complaint procedure and to cooperate with AACP and other regulatory authorities in the investigation of complaints and enforcement of the law.

                    <br>
                    <br>(4.3) ผู้ขายประกันชีวิตต้องไม่ให้ร้ายแก่สถาบันการ ประกันภัย เพราะอาจจะเป็นความผิดทางอาญาตามกฎหมายได้
                    <br>(4.3) The Sales Person must not defame the institution of insurance, as it may be a criminal offence under the law.


                    <br>
                    <br>(4.4) ผู้ขายประกันชีวิตต้องไม่ขู่ว่าจะดำเนินการหรือ ดำเนินการทางกฎหมายใดๆ กับผู้อื่นหรือเพื่อนร่วมอาชีพโดย ปราศจากเหตุผลสมควร หรือเพื่อป้องกันการร้องเรียนเกี่ยวกับ การละเมิดข้อพึงปฏิบัติตามจรรยาบรรณนี้ หรือพระราชบัญญัติ ประกันชีวิตและกฎระเบียบอื่นๆ ซึ่งอาจนำมาสู่ หรือขัดขวาง การร้องเรียน หรือการชักชวนผู้ใดให้ถอนหรือยกเลิกการ ร้องเรียน
                    <br>(4.4) The Sales Person must not threaten to launch or actually launch any legal action against any person or association without proper cause or in order to prevent a complaint of a breach of this code of conduct or the life insurance act and regulations from being brought against the Sales Person or to obstruct a complaint or to induce any person to withdraw or dismiss a complaint.

                    <br>
                    <br>(4.5) ผู้ขายประกันชีวิตต้องไม่ข่มขู่หรือพยายามข่มขู่บุคคล อื่นหรือเพื่อนร่วมอาชีพโดยมีวัตถุประสงค์เพื่อบังคับบุคคลหรือ เพื่อนร่วมอาชีพนั้นๆ ให้หยุดกระทำการใดๆ ที่บุคคลหรือเพื่อน ร่วมอาชีพนั้นมีสิทธิตามกฎหมายที่จะกระทำได้
                    <br>(4.5) The Sales Person must not intimidate or attempt to intimidate any person or association for the purpose of forcing such a person or association to stop doing anything that the person or association has a lawful right to do.

                    <br>
                    <br>(4.6) ผู้ขายประกันชีวิตต้องไม่เข้าไปก้าวก่ายการเสนอขาย ของผู้ขายประกันชีวิตรายอื่น
                    <br>(4.6) The Sales Person must not improperly interfere with any proposal introduced by another Sales Person.

                    <br>
                    <br>(5) การบริการลูกค้า ผู้ขายประกันชีวิตต้องให้บริการแก่ลูกค้าและบริษัทฯ อย่างมือ อาชีพ ขยันขันแข็ง มีประสิทธิภาพ สม่ำเสมอและต่อเนื่อง ใน การให้บริการดังกล่าว
                    <br>(5.) Client Service The Sales Person must provide a professional, diligent, efficient, consistent and continuous service to the Client and AACP. In doing so:

                    <br>
                    <br>(5.1) ผู้ขายประกันชีวิตต้องทราบและปฏิบัติหน้าที่และ ภาระผูกพันของตนให้เป็นไปตามกฎหมาย พระราชบัญญัติ ประกันชีวิต กฎระเบียบและนโยบายของบริษัทฯ เสมอ
                    <br>(5.1) The Sales Person must be aware of and at all times comply with his/her duties and obligations under the legislation, the Life Insurance Act, regulations and AACP's policies.
                    <br>
                    <br>(5.1.1) ผู้ขายประกันชีวิตต้องทราบการเปลี่ยนแปลงที่ เกิดขึ้นภายในและภายนอกของบริษัทฯ กฎหมายหรือระเบียบ เกี่ยวกับการประกันชีวิต และการเปลี่ยนแปลงในธุรกิจประกัน ชีวิต
                    <br>(5.1.1) The Sales Person must keep himself or herself informed on any internal and external changes in AACP, local insurance act or regulations and in the insurance business or industry.
                    <br>
                    <br>(5.1.2) ผู้ขายประกันชีวิตต้องปฏิบัติตามกฎ ระเบียบ คำสั่ง และประกาศของนายทะเบียนประกันภัย/เจ้าหน้าที่ที่มีอำนาจใน การกำกับดูแลการประกันชีวิต/เจ้าหน้าที่ที่มีอำนาจกำกับดูแล ตัวแทน และกฎหมายที่เกี่ยวข้องอื่นใดที่ยังมีผลบังคับ
                    <br>(5.1.2) The Sales Person must always comply with the rules, regulations, orders and notifications of the Insurance Commissioner/Insurance Supervising authority/Agency supervising authority and any other related laws in effect.
                    <br>
                    <br>
                    (5.1.3) ผู้ขายประกันชีวิตต้องปฏิบัติตามข้อพึงปฏิบัติตาม จรรยาบรรณนี้ รวมถึงนโยบาย กฎ ระเบียบของบริษัทฯ ซึ่งมี การแก้ไขหรือเปลี่ยนแปลงเป็นครั้งคราว
                    <br>(5.1.3) The Sales Person must always comply with this Code of Conduct, as well as the policies, rules and regulations of AACP as amended or replaced from time to time.
                    <br>
                    <br>(5.1.4) ผู้ขายประกันชีวิตต้องไม่กระทำการใดๆ ที่ขัดต่อ กฎหมาย ขนบธรรมเนียม หรือข้อพึงปฏิบัติตามจรรยาบรรณนี้
                    <br>(5.1.4) The Sales Person must not commit any act that is against the law, social custom or this Code of Conduct.
                    <br>
                    <br>(5.2) ผู้ขายประกันชีวิตต้องรักษาข้อมูลของลูกค้าและข้อมูล ทางการค้าของบริษัทฯ ไว้เป็นความลับ <br>(5.2) The Sales Person must keep Client information and AACP trade information confidential. ความเป็นส่วนตัว Privacy
                    <br>
                    <br>(5.2.1) ผู้ขายประกันชีวิตต้องอธิบายให้ลูกค้าทราบถึงสิทธิ ของลูกค้า และหน้าที่ของผู้ขายประกันชีวิตที่จะปกป้อง ผลประโยชน์และความเป็นส่วนตัวของลูกค้า
                    <br>(5.2.1) The Sales Person must explain to the Client his/her right and the Sales Person's duty to protect the interest and privacy of the Client.
                    <br>
                    <br>(5.2.2) ผู้ขายประกันชีวิตต้องไม่ขายข้อมูลของบริษัทฯ หรือ ของลูกค้าให้กับบุคคลภายนอก <br>(5.2.2) The Sales Person must not sell information of AACP or the Client to any third party. การรักษาความลับ Confidentiality
                    <br>
                    <br>(5.2.3) ผู้ขายประกันชีวิตต้องเก็บรักษาข้อมูลทั้งหมดที่ ได้รับมาจากการปฏิบัติหน้าที่เกี่ยวกับธุรกิจและการงานของ บริษัทฯ และของลูกค้า ไว้เป็นความลับโดยเคร่งครัด ผู้ขาย ประกันชีวิตต้องไม่เปิดเผยข้อมูลใด ๆ ดังกล่าว เว้นแต่ได้รับ ความยินยอมจากบริษัทฯ หรือลูกค้าตามแต่กรณีให้เปิดเผยได้ หรือเว้นแต่ตามที่กฎหมาย ข้อพึงปฏิบัติตามจรรยาบรรณนี้ หรือ นโยบายของบริษัทฯ กำหนดให้เปิดเผยได้ ในการเจรจากับหรือ ในนามของลูกค้า
                    <br>(5.2.3) The Sales Person must hold in strict confidence all information acquired in the course of the professional relationship concerning the business and affairs of AACP and of the Client. The Sales Person must not disclose any such information unless authorized by AACP or Client respectively to do so, or unless required by law, this Code of Conduct or AACP's policy as applicable to do so in conducting negotiations with/on behalf of the Client.
                    <br>
                    <br>(5.3) ผู้ขายประกันชีวิตต้องมีความรู้เกี่ยวกับผลิตภัณฑ์ ประกันภัยของบริษัทฯ และหลักการการประกันภัยที่เกี่ยวข้อง เพื่อที่จะสามารถให้คำแนะนำกับลูกค้าได้โดยคำนึงถึงความ ต้องการของลูกค้า ความเสี่ยงเฉพาะที่จะเกิดขึ้น และความใส่ใจ ในหลักการการประกันภัยที่เกี่ยวข้อง ตามประสบการณ์และ ความเชี่ยวชาญของผู้ขายประกันชีวิตนั้น
                    <br>(5.3) The Sales Person must have sufficient knowledge of AACP's Insurance Products and relevant insurance principles to give competent guidance to the Client based on the Client's needs, the specific risks entailed and adequate consideration of the relevant insurance principles in the context of the Sales Person's own experience and expertise. ความสามารถ Competency ผู้ขายประกันชีวิตต้อง The Sales Person must:
                    <br>
                    <br>(5.3.1) รู้และเข้าใจผลิตภัณฑ์ประกันภัยของบริษัทฯ
                    <br>(5.3.1) Know and understand AACP's Insurance Products.
                    <br>
                    <br>(5.3.2) เข้ารับการอบรมตามหลักสูตรที่สมาคมประกันชีวิต และบริษัทฯ จัดเป็นประจำ เพื่อพัฒนาทักษะและความรู้ให้ เพียงพอสำหรับผู้ขายประกันชีวิตที่จะให้คำแนะนำและบริการที่ ดีแก่ลูกค้าได้
                    <br>(5.3.2) Attend training courses provided by the Industry and AACP regularly to improve his/her skills and knowledge to a level that is adequate for the Sales Person to give sound advice and service to the Client.
                    <br>
                    <br>(5.3.3) ให้คำแนะนำเฉพาะในเรื่องที่ผู้ขายประกันชีวิตได้รับ มอบหมายและมีความสามารถที่จะจัดการได้
                    <br>(5.3.3) Give advice only on those matters in which the Sales Person is authorized and competent to deal with.
                    <br>
                    <br>(5.3.4) ขอคำแนะนำหรือแนะนำให้พบผู้เชี่ยวชาญอื่นหาก ผู้ขายประกันชีวิตไม่มีประสบการณ์หรือความเชี่ยวชาญในเรื่อง ดังกล่าวหากเห็นว่าเหมาะสม
                    <br>(5.3.4) Seek or recommend other specialists advice if the Sales Person has no experience or expertise in this and if it seems appropriate.
                    ความรู้เบื้องต้น Needs-based ผู้ขายประกันชีวิตต้อง The Sales Person must:
                    <br>
                    <br>(5.3.5) สอบถาม ศึกษาและทำความเข้าใจถึงความจำเป็นและ ความต้องการของลูกค้า รวมทั้งประเมินระดับความสามารถใน การชำระเบี้ยประกันภัยของลูกค้า ตามข้อมูลที่ลูกค้าเปิดเผยให้ ทราบ
                    <br>(5.3.5) Proactively enquire and get to know and understand the Client's needs and wants and assess the Client's affordability levels based on the information the Client discloses to him/her.
                    <br>
                    <br>(5.3.6) คำนึงถึงความจำเป็น ความต้องการ และระดับ ความสามารถในการชำระเบี้ยประกันภัยของลูกค้า เมื่อแนะนำ แบบประกันภัยแบบใดแบบหนึ่ง
                    <br>(5.3.6) Take into account the needs, wants and affordability levels of the Client when recommending a specific Insurance Product or plan.
                    <br>
                    <br>(5.3.7) ให้ข้อมูลทั้งหมดที่เกี่ยวกับผลิตภัณฑ์ประกันภัย เพื่อให้แน่ใจว่าได้ให้คำแนะนำที่ถูกต้อง ตามความจำเป็น ความต้องการ และระดับความสามารถในการชำระเบี้ยประกันภัย ของลูกค้า
                    <br>(5.3.7) Provide all the relevant information of the Insurance Product making sure he/she gives correct advice on the basis of the Client's needs, wants and affordability levels to the client.
                    <br>
                    <br>(5.3.8) แน่ใจได้ว่าจากข้อมูลที่ลูกค้าเปิดเผยนั้น ผลิตภัณฑ์ ประกันภัยที่ผู้ขายประกันชีวิตเสนอนั้นเหมาะสมกับความ จำเป็นและความต้องการของลูกค้า และไม่เกินความสามารถ ในทางการเงินของลูกค้า
                    <br>(5.3.8) Make sure based on the relevant disclosures he is able to obtain from the client that the Insurance Product proposed is suitable to the needs and wants of the Client and not beyond the financial ability of the Client. การขายผิดแบบ Misrepresentation
                    ผู้ขายประกันชีวิตต้อง The Sales Person must:
                    <br>
                    <br>(5.3.9) อธิบายข้อกำหนดที่จำเป็นต่างๆ ของผลิตภัณฑ์ ประกันภัยที่ผู้ขายประกันชีวิตกำลังแนะนำให้กับลูกค้า เพื่อให้ แน่ใจว่าลูกค้าเข้าใจว่ามีข้อผูกพันกับตนตามกรมธรรม์อย่างไร บ้าง
                    <br>(5.3.9) Explain all the essential provisions of the Insurance Product that the Sales Person is recommending so as to ensure as far as possible that the Client understands what he/she is committing him/herself to.
                    <br>
                    <br>(5.3.10) ให้ลูกค้าทราบข้อจำกัดใด ๆ รวมถึงข้อยกเว้นต่าง ๆ ที่ใช้กับกรมธรรม์ประกันภัย
                    <br>(5.3.10) Draw attention to any restrictions including exclusions applying to the Insurance Policy.
                    <br>
                    <br>(5.3.11) ให้ลูกค้าทราบถึงความสำคัญในระยะยาวของ ผลิตภัณฑ์ประกันชีวิต และผลที่จะเกิดขึ้นหากมีการยกเลิกก่อน กำหนดหรือเวนคืน
                    <br>(5.3.11) Draw attention to the long-term nature if it is a life Insurance Product and to the consequent effects of early discontinuance or surrender.
                    <br>
                    <br>(5.3.12) แจ้งให้ลูกค้าทราบชัดเจนในกรณีการขายผลิตภัณฑ์ ประกันภัยที่อิงหน่วยลงทุน (Unit Linked Insurance Product)
                    ว่าลูกค้าต้องรับความเสี่ยงในการลงทุนทั้งหมด <br>(5.3.12) Clearly communicate in the case of Unit Linked Insurance Products (ULIPs) to the Client that the risk of investment is carried entirely by the Client.
                    <br>
                    <br>(5.3.13) ผู้ขายประกันชีวิตต้องแน่ใจว่าตนเข้าใจถูกต้องและ สามารถชี้ให้เห็นชัดเจนถึงความแตกต่างของผลิตภัณฑ์แต่ละ แบบเมื่อเปรียบเทียบกับกรมธรรม์ต่างแบบหรือการลงทุนที่ต่างประเภท
                    <br>(5.3.13) Make sure the Sales Person correctly understands and makes clear the different characteristics of each product when making comparisons with other types of policies or forms of investment.
                    <br>
                    <br>(5.3.14) จัดเฉพาะเอกสารหรือสิ่งพิมพ์เกี่ยวกับผลิตภัณฑ์ ประกันภัยที่ได้รับอนุมัติจากบริษัทฯ แล้วเท่านั้นให้แก่ลูกค้า
                    <br>(5.3.14) Provide the Client only with documents or illustrations that are authorized by AACP in connection with the Insurance Product.
                    <br>
                    <br>(5.3.15) แจ้งให้ลูกค้าทราบถึงค่าเบี้ยประกันภัยโดยประมาณ ที่บริษัทฯ จะเรียกเก็บสำหรับผลิตภัณฑ์ประกันภัยที่เสนอขาย
                    <br>(5.3.15) Indicate to the Client the estimated premium to be charged by AACP for the Insurance Product offered for sale.
                    <br>
                    <br>(5.3.16) เปิดเผยให้ลูกค้าทราบถึงค่าธรรมเนียม หรือค่าใช้จ่าย ทั้งหมด ที่เกี่ยวข้องกับผลิตภัณฑ์ประกันภัย และไม่ปิดบังข้อมูล อันเป็นสาระสำคัญใดๆ กับลูกค้า หากลูกค้าเรียกร้องให้ผู้ขาย ประกันชีวิตเปิดเผย
                    <br>(5.3.16) Disclose all the charges or fees associated with the Insurance Product to the Client and not hide any material information from the Client if the customers requires the Sales Person to do so.
                    <br>
                    <br>(5.3.17) เปิดเผยให้ลูกค้าทราบอัตราค่าบำเหน็จสำหรับ ผลิตภัณฑ์ประกันภัยที่เสนอขาย หากบริษัทฯ มีนโยบายให้ เปิดเผย หรือเจ้าหน้าที่ที่มีอำนาจตามกฎหมายกำหนดให้ธุรกิจ ประกันภัยต้องเปิดเผยข้อมูลดังกล่าว
                    <br>(5.3.17) Disclose to the Client the scales of commission in respect of the Insurance Product offered for sale if AACP policy requires the Sales Person to do so or if the local Authority requires the industry to do so.
                    การสละกรมธรรม์เพื่อเปิดกรมธรรม์ใหม่ Twisting
                    <br>
                    <br>(5.3.18) ผู้ขายประกันชีวิตต้องไม่พยายามชักชวนให้ลูกค้า ยกเลิก หรือ เวนคืน หรือสละกรมธรรม์ใด ๆ ที่มีอยู่ เว้นแต่ ผู้ขายประกันชีวิตสามารถชี้ได้ว่ากรมธรรม์ดังกล่าวไม่ตรงตาม ความจำเป็นของลูกค้าอย่างชัดแจ้ง
                    <br>(5.3.18) The Sales Person must not attempt to persuade a Client to cancel or surrender or abandon any existing policy (ies) unless the Sales Person is able to determine that they are clearly unsuited to the Client's needs.
                    <br>
                    <br>(5.3.19) ผู้ขายประกันชีวิตต้องไม่แนะนำลูกค้าให้สละ กรมธรรม์ประกันภัยหนึ่งที่มีผลบังคับอยู่เพื่อผลประโยชน์ สุดท้ายของลูกค้า แล้วเปิดกรมธรรม์ประกันภัยใหม่เพื่อ ผลประโยชน์สุดท้ายของบุคคลอื่นใด
                    <br>(5.3.19) The Sales Person must not advise the Client to replace a valid Insurance Policy for the final benefit of the Client, with another Insurance Policy for the final benefit of anyone else.
                    <br>
                    <br>(5.3.20) ในกรณีที่มีการสละกรมธรรม์หนึ่งเพื่อเปิดกรมธรรม์ ใหม่ ผู้ขายประกันชีวิตต้องให้ลูกค้าลงลายมือชื่อในเอกสาร หรือแบบฟอร์ม ตามที่กฎหมาย และ/หรือนโยบายบริษัทฯ กำหนด ชี้แจงถึงสิทธิของลูกค้าจนมั่นใจว่าลูกค้าเข้าใจถึงผลที่ จะเกิดขึ้นทั้งหมดจากการสละกรมธรรม์ดังกล่าว โดยมีพยานรู้เห็น
                    <br>(5.3.20) In the event of an Insurance Policy replacement, the Sales Person must obtain the Client's signature to the written document or specific form, as prescribed by law and/or AACP's policy, explaining the rights of the Client and confirming the Client's understanding of the full implications of the replacement, duly witnessed. การเปิดเผยข้อมูล Disclosure
                    <br>
                    <br>(5.3.21) ผู้ขายประกันชีวิตต้องอธิบายให้ลูกค้าทราบถึงความสำคัญของการเปิดเผยข้อมูลอันเป็นสาระสำคัญในการซื้อผลิตภัณฑ์ประกันภัย
                    <br>(5.3.21) The Sales Person must explain to the Client the importance of disclosure of material information in the purchase of an Insurance Product.
                    <br>
                    <br>(5.3.22) ผู้ขายประกันชีวิตต้องไม่ชักจูงลูกค้าเกินสมควรและต้องแจ้งให้ลูกค้าทราบว่าลูกค้าต้องรับผิดชอบในคำตอบหรือ ข้อเท็จจริงทั้งหมดที่ลูกค้าให้กับบริษัทฯ
                    <br>(5.3.22) The Sales Person must not improperly influence the Client and must make it clear to the Client that all the answers or statements are the Client's own responsibility.
                    <br>
                    <br>(5.3.23) ผู้ขายประกันชีวิตต้องแจ้งให้ลูกค้าทราบถึงผลของ การปกปิดหรือการให้ข้อมูลที่ไม่ถูกต้องกับบริษัทฯ ผู้ขายประกันชีวิตต้องให้ลูกค้าใส่ใจในข้อความที่เกี่ยวข้องในใบคำขอเอาประกันภัยและอธิบายด้วยตัวเองให้ลูกค้าเข้าใจ
                    <br>(5.3.23) The Sales Person must ensure that the consequences of non-disclosure and inaccuracies are pointed out to the Client. The Sales Person must draw the Client's attention to the relevant statement in the proposal form and personally explain it to the Client.
                    <br>
                    <br>(5.3.24) ผู้ขายประกันชีวิตต้องให้ลูกค้ากรอกใบคำขอเอาประกันภัยด้วยตนเอง หากลูกค้าไม่สามารถกระทำได้ด้วยตนเอง ผู้ขายประกันชีวิตต้องอธิบายและอ่านคำถามที่ระบุไว้ในใบคำขอเอาประกันภัยให้ลูกค้าทราบ เพื่อที่ลูกค้าสามารถตอบคำถามได้
                    <br>(5.3.24) The Sales Person must ask the Client to fill in the proposal form him/herself. If the Client is unable to do so, the Sales Person must explain the proposal form to the Client and read out the questions to the Client so that the Client can dictate the answers.
                    <br>
                    <br>(5.3.25) ผู้ขายประกันชีวิตต้องไม่แนะนำให้ลูกค้าละเว้นการให้ข้อมูลอันเป็นสาระสำคัญในการทำประกันภัยหรือให้ข้อมูลที่ไม่ถูกต้องในใบคำขอเอาประกันภัยหรือเอกสารอื่นๆ ที่ยื่นให้กับบริษัทฯ เพื่อขอให้พิจารณารับประกันภัยหรือขอรับค่าสินไหมใดๆ
                    <br>(5.3.25) The Sales Person must not induce the Client to omit any material information or to submit wrong information in the proposal form or other documents submitted to AACP for acceptance of the proposal or any claim. การบริการหลังการขาย After Sales
                    <br>
                    <br>(5.3.26) ผู้ขายประกันชีวิตต้องแนะนำลูกค้าอย่างถูกต้องเมื่อลูกค้าต้องการจะเรียกร้องสินไหม แต่งตั้งหรือกำหนดผู้แทน หรือเปลี่ยนแปลงที่อยู่ หรือใช้สิทธิใดๆ และต้องให้ความช่วยเหลือแก่ลูกค้าตามแต่กรณี
                    <br>(5.3.26) The Sales Person must advise the Client correctly on when he/she should file a claim, effect a nomination or assignment or a change of address or exercise options as the case may be, and offer necessary assistance in this regard.
                    <br>
                    <br>(5.3.27) ผู้ขายประกันชีวิตต้องให้ความช่วยเหลือที่จำเป็นแก่ ลูกค้าตามข้อกำหนดในการยื่นเรื่องเพื่อเรียกร้องสินไหมกับบริษัท ฯ
                    <br>(5.3.27) The Sales Person must render the necessary assistance to the Client in complying with the requirements for settlement of the Client's claim by AACP.
                    <br>
                    <br>(5.3.28) ผู้ขายประกันชีวิตต้องไม่ขัดขวางลูกค้าในการเรียกร้องสินไหมอันชอบธรรมตามกฎหมายกับบริษัทฯ
                    <br>(5.3.28) The Sales Person must not discourage a Client from making a legitimate insurance claim.
                    <br>
                    <br>(5.3.29) ผู้ขายประกันชีวิตต้องเก็บรักษาข้อมูล แฟ้ม หรือ เอกสารของลูกค้าตามที่กฎหมายและนโยบายบริษัทฯ กำหนด และส่งมอบเอกสารดังกล่าวนั้นให้แก่บริษัทฯ หากการเป็น ตัวแทนของผู้ขายประกันชีวิตกับบริษัทฯ สิ้นสุดลง หรือเมื่อตน ลาออกจากบริษัทฯ ไม่ว่าด้วยสาเหตุใดก็ตาม
                    <br>(5.3.29) The Sales Person must keep and maintain records, files or documents of the Client in accordance with the local laws and AACP's policy applicable and hand them over to AACP if his/her agency is terminated or the Sales Person resigns for whatever reason.
                    
                    <br>
                    <br>(5.4) ผู้ขายประกันชีวิตต้องมอบข้อมูลและเอกสารทั้งหมด และหรือค่าเบี้ยประกันภัยให้แก่ลูกค้า และบริษัทฯ เร็วที่สุดเท่าที่ จะทำได้ ภายในระยะเวลาที่บริษัทฯ กำหนด
                    <br>(5.4) The Sales Person must submit information and all documents and/or premiums respectively to the Client and to AACP as soon as possible within the time period required. ขั้นตอนทางธุรกิจ Business Process ผู้ขายประกันชีวิตต้อง The Sales Person must:
                    <br>
                    <br>(5.4.1) ส่งมอบค่าเบี้ยประกันภัยหรือเอกสารที่เกี่ยวข้องกับเบี้ย ประกันภัยทั้งหมดที่ได้เรียกเก็บหรือได้รับจากลูกค้าให้กับ บริษัทฯ ภายในระยะเวลาที่บริษัทฯ กำหนด
                    <br>(5.4.1) Submit all the premiums or premium-related documents collected or received from the Client to AACP in full within the time required.
                    <br>
                    <br>(5.4.2) แจ้งลูกค้าทันทีที่บริษัทฯ ได้พิจารณารับหรือปฏิเสธรับประกันภัย
                    <br>(5.4.2) Inform the Client promptly of the acceptance or rejection of the proposal by AACP.
                    <br>
                    <br>(5.4.3) ส่งมอบกรมธรรม์ประกันภัยและเอกสารใด ๆ เกี่ยวกับกรมธรรม์ประกันภัยที่ออกโดยบริษัทฯ ให้กับลูกค้าโดยไม่ ชักช้า
                    <br>(5.4.3) Deliver the Insurance Policy and any Insurance Policy-related documents issued by AACP to the Client through the Sales Person without delay.
                    <br>
                    <br>(5.4.4) ติดตามกับลูกค้าเพื่อให้แน่ใจว่าลูกค้าได้รับกรมธรรม์ ประกันภัยและได้ส่งใบรับกรมธรรม์ประกันภัยที่ลูกค้าได้ลง ลายมือชื่อแล้วคืนให้กับบริษัทฯ
                    <br>(5.4.4) Actively follow up with the Client to ensure that the Client has received his/her Insurance Policy and where required by law or AACP's Policy has returned a signed written acknowledgement to AACP.
                    <br>
                    <br>(5.4.5) ชี้แจงรายละเอียดของสัญญาประกันภัยให้ลูกค้าฟังจน เป็นที่พอใจ เมื่อได้รับการร้องขอ เพื่อช่วยเหลือทำให้ลูกค้า เข้าใจข้อผูกพันต่างๆ ตามกรมธรรม์ประกันภัยอย่างถูกต้อง และให้ลูกค้าลงลายมือชื่อในใบรับที่จำเป็น
                    <br>(5.4.5) If required by the Client at any time, explain the details of the Insurance Policy contract terms to the satisfaction of the Client to facilitate a correct understanding by the Client of the obligations to each other and enable the Client to sign the necessary acknowledgement.
                    ดำเนินการกับเงินที่รับในนามของลูกค้าอย่างเหมาะสมและเรียก เก็บเงินในนามของบริษัทฯ หากได้รับมอบอำนาจให้ดำเนินการดังกล่าวจากบริษัทฯ
                    Handle moneys received on behalf of the Client properly and only collect moneys on behalf of AACP if authorized by AACP to do so.
                    <br>
                    <br>(5.4.6) ออกหลักฐานการรับเงินที่ได้รับจากลูกค้า หรือจากบริษัทฯ
                    <br>(5.4.6) Promptly acknowledge receipt of moneys from a Client or from AACP in writing.
                    <br>
                    <br>(5.4.7) จัดทำบัญชีของการรับเงินทั้งหมดที่เกี่ยวกับกรมธรรม์ ประกันภัยอย่างเหมาะสม
                    <br>(5.4.7) Maintain a proper account of all moneys received by him/her in connection with an Insurance Policy.
                    <br>
                    <br>(5.4.8) เก็บรักษาเงินค่าเบี้ยประกันภัยโดยแยกจากเงินอื่นที่ตน ได้รับ หรือแยกจากเงินอื่นที่ผู้ขายประกันชีวิตมี หรือแยกจาก บัญชีเงินส่วนตัวของผู้ขายประกันชีวิต
                    <br>(5.4.8) Keep premium moneys separate from any other payments received by him/her, or from other moneys held by the Sales Person, or from the Sales Person's personal funds.
                    <br>
                    <br>(5.4.9) ผู้ขายประกันชีวิตต้องไม่เก็บค่าเบี้ยประกันภัยหรือเงิน อื่นในนามของบริษัทฯ เว้นแต่ได้รับมอบอำนาจเป็นลายลักษณ์ อักษรจากบริษัทฯ ให้กระทำการได้ หากผู้ขายประกันชีวิต ได้รับมอบอำนาจดังกล่าว ผู้ขายประกันชีวิตต้องปฏิบัติตาม นโยบายของบริษัทฯ หรือตามข้อพึงปฏิบัติตามจรรยาบรรณนี้ โดยเคร่งครัด
                    <br>(5.4.9) The Sales Person must not collect premium or any other moneys on behalf of AACP unless authorized in writing by AACP to do so. If the Sales Person is so authorized then the Sales Person must strictly comply with AACP's Policy and this Code of Conduct in doing so.
                   <br><br>
                    การฝ่าฝืน Consequences of Non-Compliance
                    การฝ่าฝืนข้อพึงปฏิบัติตามจรรยาบรรณนี้ของผู้ขายประกันชีวิต อาจทำให้ผู้ขายประกันชีวิตและบริษัทฯ เสื่อมเสียชื่อเสียง และ ได้รับโทษตามกฎหมาย ซึ่งรวมถึงการถูกตักเตือน ปรับ ระงับ หรือเพิกถอนใบอนุญาต การฝ่าฝืนข้อพึงปฏิบัติตาม จรรยาบรรณนี้อาจทำให้ผู้ขายประกันชีวิตถูกบอกเลิกสัญญากับ บริษัทฯ หรือถูกบันทึกพฤติกรรมและรายงานการกระทำ ความผิดทางอาญาต่อเจ้าหน้าที่ของรัฐ
                    <br>Failure by any Sales Person to comply with the Sales Person Code of Conduct can expose that Sales Person and AACP to damage to his/her/its reputation, as well as legal and regulatory penalties including warnings, fines, suspension or withdrawal of licenses. Failure to comply can also expose the Sales Person to a termination of his/her contract with AACP, blacklisting and a criminal report filed with the authorities against the Sales Person.

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
        <style>
            .tools.active.show {
                padding-bottom: 0 !important;
                /* height: calc(100dvh - 200px); */
                display: flex;
                align-items: center;
            }

            .tools.active.show .container_tools {
                /* max-height: calc(100dvh - 200px); */
                overflow: auto;
            }

            .tools.active.show .container_tools::-webkit-scrollbar {
                display: none;
            }

            /* .owl-item.active{
                height: calc(100dvh - 210px) !important;
                max-height: calc(100dvh - 210px) !important;
                display: flex;
                align-items: center;
                overflow: auto;
                padding-bottom:0 !important;
                z-index: 9999;
            } */
            .menu-tutorials {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                transform: scale(0.8);
                position: relative;
                top:-50px;
            }

            .menu-tutorials .item {
                height: 145px;
                background-color: #243286;
                border-radius: 14.616px;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                max-width: 300px;
                min-width: 150px;
                min-height: 150px;
            }

            .menu-tutorials div:nth-child(odd) {
                display: flex;
                justify-content: end;
            }

            .menu-tutorials .item p {
                color: #FFF;
                text-align: center;
                font-size: 20px;
                font-style: normal;
                font-weight: 500;
                line-height: normal;
                margin-top: 15px;
            }
        </style>
        <div class="tab-pane fade tools pb-0" id="pills-tutorials" role="tabpanel " aria-labelledby="pills-tutorials-tab">
            <!-- <p class="title-tools">วิธีใช้เว็บไซต์ Allianz Journey</p> -->
            <div class="container_tools" id="main_tutorials">
                <div class="owl-carousel owl-theme mt-4" role="group" aria-label="First group">

                    <div class="item text-center" data-hash="one">
                        <p class="title-tools" style="font-size: 25px;">รู้จักกับ AGENCY JOURNEY</p>
                        <center class="mt-3">
                            <img src="{{url('img/logo/Logo Main.png')}}" style="width: 100%;width: 220.228px" alt="">
                        </center>
                        <p class="title-tools mt-3 mb-2" style="font-size: 20px;">AGENCY JOURNEY</p>
                        <p style="font-size: 12px;">ALLIANZ ON BOARDING</p>

                        <p class="title-tools mt-3 mb-2">
                            แหล่งรวมข้อมูลต่าง
                            สำหรับนักขายของ Allianz
                        </p>
                    </div>

                    <div class="item text-center" data-hash="two">
                        <p class="title-tools" style="font-size: 25px;">รู้จักกับ AGENCY JOURNEY</p>
                        <div class=" menu-tutorials px-2 mb-5">
                            <div class="col-6 col-md-6 p-2">
                                <button class="item w-100" onclick="tutorials_go_to('start_tutorials') ">
                                    <div class="d-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" viewBox="0 0 58 58" fill="none">
                                            <path d="M51.3305 0H38.5704C37.6945 0 36.8272 0.172525 36.0179 0.507726C35.2087 0.842927 34.4734 1.33424 33.854 1.95361C33.2346 2.57298 32.7433 3.30828 32.4081 4.11753C32.0729 4.92677 31.9004 5.79412 31.9004 6.67004V19.4301C31.9004 20.306 32.0729 21.1734 32.4081 21.9826C32.7433 22.7919 33.2346 23.5272 33.854 24.1465C34.4734 24.7659 35.2087 25.2572 36.0179 25.5924C36.8272 25.9276 37.6945 26.1002 38.5704 26.1002H51.3305C52.2064 26.1002 53.0738 25.9276 53.883 25.5924C54.6923 25.2572 55.4276 24.7659 56.0469 24.1465C56.6663 23.5272 57.1576 22.7919 57.4928 21.9826C57.828 21.1734 58.0005 20.306 58.0005 19.4301V6.67004C58.0005 4.90104 57.2978 3.20448 56.0469 1.95361C54.7961 0.702734 53.0995 0 51.3305 0ZM52.2005 19.4301C52.2046 19.5455 52.1848 19.6604 52.1425 19.7678C52.1003 19.8752 52.0363 19.9727 51.9547 20.0543C51.8731 20.1359 51.7756 20.1999 51.6682 20.2422C51.5608 20.2844 51.4459 20.3042 51.3305 20.3001H38.5704C38.4551 20.3042 38.3401 20.2844 38.2328 20.2422C38.1254 20.1999 38.0278 20.1359 37.9462 20.0543C37.8646 19.9727 37.8007 19.8752 37.7584 19.7678C37.7161 19.6604 37.6964 19.5455 37.7004 19.4301V6.67004C37.6964 6.5547 37.7161 6.43976 37.7584 6.33237C37.8007 6.22498 37.8646 6.12745 37.9462 6.04584C38.0278 5.96423 38.1254 5.90029 38.2328 5.85801C38.3401 5.81572 38.4551 5.79598 38.5704 5.80004H51.3305C51.4459 5.79598 51.5608 5.81572 51.6682 5.85801C51.7756 5.90029 51.8731 5.96423 51.9547 6.04584C52.0363 6.12745 52.1003 6.22498 52.1425 6.33237C52.1848 6.43976 52.2046 6.5547 52.2005 6.67004V19.4301Z" fill="white" />
                                            <path d="M19.4301 31.8994H6.67004C5.79412 31.8994 4.92677 32.0719 4.11753 32.4071C3.30828 32.7423 2.57298 33.2337 1.95361 33.853C1.33424 34.4724 0.842927 35.2077 0.507726 36.0169C0.172525 36.8262 0 37.6935 0 38.5695V51.3295C0 53.0985 0.702734 54.7951 1.95361 56.046C3.20448 57.2968 4.90104 57.9996 6.67004 57.9996H19.4301C20.306 57.9996 21.1734 57.827 21.9826 57.4918C22.7919 57.1566 23.5272 56.6653 24.1465 56.046C24.7659 55.4266 25.2572 54.6913 25.5924 53.882C25.9276 53.0728 26.1002 52.2055 26.1002 51.3295V38.5695C26.1002 37.6935 25.9276 36.8262 25.5924 36.0169C25.2572 35.2077 24.7659 34.4724 24.1465 33.853C23.5272 33.2337 22.7919 32.7423 21.9826 32.4071C21.1734 32.0719 20.306 31.8994 19.4301 31.8994ZM20.3001 51.3295C20.3042 51.4449 20.2844 51.5598 20.2422 51.6672C20.1999 51.7746 20.1359 51.8721 20.0543 51.9537C19.9727 52.0353 19.8752 52.0993 19.7678 52.1416C19.6604 52.1839 19.5455 52.2036 19.4301 52.1995H6.67004C6.5547 52.2036 6.43976 52.1839 6.33237 52.1416C6.22498 52.0993 6.12745 52.0353 6.04584 51.9537C5.96423 51.8721 5.90029 51.7746 5.85801 51.6672C5.81572 51.5598 5.79598 51.4449 5.80004 51.3295V38.5695C5.79598 38.4541 5.81572 38.3392 5.85801 38.2318C5.90029 38.1244 5.96423 38.0269 6.04584 37.9453C6.12745 37.8636 6.22498 37.7997 6.33237 37.7574C6.43976 37.7151 6.5547 37.6954 6.67004 37.6994H19.4301C19.5455 37.6954 19.6604 37.7151 19.7678 37.7574C19.8752 37.7997 19.9727 37.8636 20.0543 37.9453C20.1359 38.0269 20.1999 38.1244 20.2422 38.2318C20.2844 38.3392 20.3042 38.4541 20.3001 38.5695V51.3295Z" fill="white" />
                                            <path d="M19.4301 0H6.67004C4.90104 0 3.20448 0.702734 1.95361 1.95361C0.702734 3.20448 0 4.90104 0 6.67004V19.4301C0 20.306 0.172525 21.1734 0.507726 21.9826C0.842927 22.7919 1.33424 23.5272 1.95361 24.1465C3.20448 25.3974 4.90104 26.1002 6.67004 26.1002H19.4301C20.306 26.1002 21.1734 25.9276 21.9826 25.5924C22.7919 25.2572 23.5272 24.7659 24.1465 24.1465C24.7659 23.5272 25.2572 22.7919 25.5924 21.9826C25.9276 21.1734 26.1002 20.306 26.1002 19.4301V6.67004C26.1002 5.79412 25.9276 4.92677 25.5924 4.11753C25.2572 3.30828 24.7659 2.57298 24.1465 1.95361C23.5272 1.33424 22.7919 0.842927 21.9826 0.507726C21.1734 0.172525 20.306 0 19.4301 0ZM20.3001 19.4301C20.3042 19.5455 20.2844 19.6604 20.2422 19.7678C20.1999 19.8752 20.1359 19.9727 20.0543 20.0543C19.9727 20.1359 19.8752 20.1999 19.7678 20.2422C19.6604 20.2844 19.5455 20.3042 19.4301 20.3001H6.67004C6.5547 20.3042 6.43976 20.2844 6.33237 20.2422C6.22498 20.1999 6.12745 20.1359 6.04584 20.0543C5.96423 19.9727 5.90029 19.8752 5.85801 19.7678C5.81572 19.6604 5.79598 19.5455 5.80004 19.4301V6.67004C5.79598 6.5547 5.81572 6.43976 5.85801 6.33237C5.90029 6.22498 5.96423 6.12745 6.04584 6.04584C6.12745 5.96423 6.22498 5.90029 6.33237 5.85801C6.43976 5.81572 6.5547 5.79598 6.67004 5.80004H19.4301C19.5455 5.79598 19.6604 5.81572 19.7678 5.85801C19.8752 5.90029 19.9727 5.96423 20.0543 6.04584C20.1359 6.12745 20.1999 6.22498 20.2422 6.33237C20.2844 6.43976 20.3042 6.5547 20.3001 6.67004V19.4301Z" fill="white" />
                                            <path d="M44.9505 31.8994C42.3694 31.8994 39.8463 32.6648 37.7002 34.0987C35.5542 35.5327 33.8815 37.5709 32.8938 39.9554C31.906 42.34 31.6476 44.964 32.1512 47.4954C32.6547 50.0269 33.8976 52.3522 35.7227 54.1773C37.5478 56.0024 39.8731 57.2453 42.4045 57.7488C44.936 58.2524 47.5599 57.9939 49.9445 57.0062C52.3291 56.0185 54.3673 54.3458 55.8012 52.1997C57.2352 50.0537 58.0006 47.5306 58.0006 44.9495C57.9929 41.4908 56.6155 38.1759 54.1698 35.7302C51.7241 33.2844 48.4092 31.9071 44.9505 31.8994ZM44.9505 52.1995C43.5166 52.1995 42.1148 51.7743 40.9226 50.9777C39.7303 50.181 38.801 49.0487 38.2523 47.724C37.7036 46.3992 37.56 44.9415 37.8397 43.5351C38.1195 42.1287 38.81 40.8369 39.8239 39.8229C40.8379 38.809 42.1297 38.1185 43.5361 37.8388C44.9424 37.559 46.4002 37.7026 47.725 38.2513C49.0497 38.8001 50.182 39.7293 50.9787 40.9216C51.7753 42.1138 52.2005 43.5156 52.2005 44.9495C52.2005 46.8723 51.4367 48.7164 50.077 50.0761C48.7174 51.4357 46.8733 52.1995 44.9505 52.1995Z" fill="white" />
                                        </svg>
                                        <p class="mb-0">เริ่มต้น</p>
                                    </div>
                                </button>
                            </div>
                            <div class="col-6 col-md-6 p-2">
                                <div class="item">
                                    <button class="item w-100" onclick="tutorials_go_to('home_tutorials') ">
                                        <div class="d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="61" viewBox="0 0 64 61" fill="none">
                                                <path d="M60.8152 18.3512L36.8184 1.53339C33.8855 -0.511131 30.086 -0.511131 27.1531 1.53339L3.15635 18.3512C1.15662 19.7362 0.0234375 21.9786 0.0234375 24.5508V53.1741C0.0234375 57.461 3.55629 60.9565 7.95569 60.9565H55.9492C60.3486 60.9565 63.8814 57.461 63.8814 53.1741V24.5508C63.8814 21.9786 62.7483 19.7362 60.8152 18.3512ZM37.685 38.7965V54.2953H26.1532V38.7965H37.685ZM41.0845 32.1353H22.8203C20.9539 32.1353 19.4208 33.6522 19.4208 35.4989V54.2953H7.88904C7.22246 54.2953 6.6892 53.7677 6.6892 53.1741V24.5508C6.6892 24.0232 6.88917 23.8912 6.95583 23.8253L30.9526 7.00744C31.5525 6.61172 32.2191 6.61172 32.8857 7.00744L56.8824 23.8253C56.9491 23.8912 57.149 24.0232 57.149 24.5508V53.1741C57.149 53.7677 56.6158 54.2953 55.9492 54.2953H44.4174V35.4329C44.4174 33.5862 42.951 32.1353 41.0845 32.1353Z" fill="white" />
                                            </svg>
                                            <p class="mb-0">Home</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 p-2">
                                <div class="item">
                                    <button class="item w-100" onclick="tutorials_go_to('training_tutorials') ">
                                        <div class="d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="84" height="57" viewBox="0 0 84 57" fill="none">
                                                <path d="M81.4826 15.0442L43.0529 0.179811C42.3232 -0.0599369 41.3503 -0.0599369 40.6206 0.179811L2.19093 15.0442C0.488344 15.5237 -0.484561 17.4416 0.245118 19.1199C0.488344 19.8391 0.974796 20.5584 1.70447 20.7981L15.0819 27.2713V44.2934C15.3251 47.4101 17.0277 50.2871 19.9464 51.7256C24.8109 55.082 33.0806 57 42.08 57C51.0794 57 59.349 55.082 64.2136 51.7256C67.1323 50.2871 68.8349 47.4101 69.0781 44.2934V27.2713L71.0239 26.3123V45.2524C70.7807 46.9306 72.24 48.6088 73.9426 48.8486C75.6452 49.0883 77.3478 47.6498 77.591 45.9716C77.591 45.7319 77.591 45.4921 77.591 45.4921V23.1956L82.2123 21.0379C83.9149 20.3186 84.4013 18.4006 83.6717 16.7224C83.1852 15.7634 82.4555 15.2839 81.4826 15.0442ZM21.4058 30.6278L40.1342 39.9779C41.1071 40.4574 42.08 40.4574 43.0529 39.9779L61.7813 30.6278V44.2934C61.7813 46.2114 54.971 50.5268 41.5935 50.5268C28.2161 50.5268 21.4058 46.2114 21.4058 44.2934V30.6278ZM72.24 18.4006L41.8368 33.265L11.4335 18.4006L41.8368 6.653L72.24 18.4006Z" fill="white" />
                                            </svg>
                                            <p class="mb-0">Training</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 p-2">
                                <div class="item">
                                    <button class="item w-100" onclick="tutorials_go_to('product_tutorials') ">
                                        <div class="d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="63" viewBox="0 0 52 63" fill="none">
                                                <path d="M41.5485 5.1219H38.6514V3.36031C38.6514 1.59872 37.2382 0.189453 35.4717 0.189453H16.3226C14.6268 0.189453 13.2136 1.66919 13.2136 3.36031V5.1219H10.3165C4.59295 5.1219 0 9.70202 0 15.3391V52.4029C0 58.04 4.59295 62.6201 10.2458 62.6201H41.5485C47.2014 62.6201 51.7943 58.04 51.7943 52.4029V15.3391C51.7943 9.70202 47.2014 5.1219 41.5485 5.1219ZM6.35947 15.3391C6.35947 13.2252 8.12598 11.4636 10.2458 11.4636H13.1429V13.5071C13.1429 15.2686 14.5561 16.6779 16.3226 16.6779H35.4717C37.2382 16.6779 38.6514 15.2686 38.6514 13.5071V11.4636H41.5485C43.6683 11.4636 45.4348 13.2252 45.4348 15.3391L45.3642 52.4029C45.3642 54.5168 43.5977 56.2784 41.4778 56.2784H10.2458C8.12598 56.2784 6.35947 54.5168 6.35947 52.4029V15.3391ZM19.5024 10.3362V6.53117H32.292V10.3362H19.5024Z" fill="white" />
                                                <path d="M15.4989 33.834H33.5944C35.2638 33.834 36.5992 32.4965 36.5992 30.8247C36.5992 29.1529 35.2638 27.8154 33.5944 27.8154H15.4989C13.8296 27.8154 12.4941 29.1529 12.4941 30.8247C12.4941 32.4965 13.8296 33.834 15.4989 33.834Z" fill="white" />
                                                <path d="M15.4989 47.4072H33.5944C35.2638 47.4072 36.5992 46.0698 36.5992 44.398C36.5992 42.7261 35.2638 41.3887 33.5944 41.3887H15.4989C13.8296 41.3887 12.4941 42.7261 12.4941 44.398C12.4941 46.0698 13.8296 47.4072 15.4989 47.4072Z" fill="white" />
                                            </svg>
                                            <p class="mb-0">Product</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 p-2">
                                <div class="item">
                                    <button class="item w-100" onclick="tutorials_go_to('news_tutorials') ">
                                        <div class="d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="73" height="61" viewBox="0 0 73 61" fill="none">
                                                <path d="M64.7402 0H22.8542C18.381 0 14.7211 3.66 14.7211 8.13333V12.1187H8.13318C3.65993 12.1187 0 15.7787 0 20.252V50.4267C0 56.2827 4.71725 61 10.5731 61H60.4296C67.2614 61 72.8733 55.388 72.8733 48.556V8.13333C72.8733 3.66 69.2134 0 64.7402 0ZM21.1463 50.4267V8.13333C21.1463 7.23867 21.8783 6.50667 22.7729 6.50667H64.7402C65.6348 6.50667 66.3668 7.23867 66.3668 8.13333L66.4481 48.556C66.4481 51.8093 63.7642 54.4933 60.5109 54.4933H20.333C20.9023 53.192 21.1463 51.8093 21.1463 50.4267ZM14.7211 18.6253V50.4267C14.7211 52.704 12.8504 54.4933 10.6545 54.4933C8.45851 54.4933 6.58788 52.6227 6.58788 50.4267V20.252C6.58788 19.3573 7.31987 18.6253 8.21452 18.6253H14.7211Z" fill="white" />
                                                <path d="M29.9291 39.9334H57.6632C59.4525 39.9334 60.9165 38.4694 60.9165 36.6801C60.9165 34.8908 59.4525 33.4268 57.6632 33.4268H29.9291C28.1398 33.4268 26.6758 34.8908 26.6758 36.6801C26.6758 38.4694 28.1398 39.9334 29.9291 39.9334Z" fill="white" />
                                                <path d="M57.6632 43.1885H29.9291C28.1398 43.1885 26.6758 44.6525 26.6758 46.4418C26.6758 48.2311 28.1398 49.6951 29.9291 49.6951H57.6632C59.4525 49.6951 60.9165 48.2311 60.9165 46.4418C60.9165 44.6525 59.4525 43.1885 57.6632 43.1885Z" fill="white" />
                                            </svg>
                                            <p class="mb-0">News</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 p-2">
                                <div class="item">
                                    <button class="item w-100" onclick="tutorials_go_to('tools_tutorials') ">
                                        <div class="d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="67" height="67" viewBox="0 0 67 67" fill="none">
                                                <path d="M66.0704 44.1946L64.9679 43.0921C61.9414 40.0654 60.3092 35.8929 60.5038 31.6556C60.5902 29.7531 60.5038 27.8182 60.2227 25.9158C58.2987 12.3931 47.0357 1.57275 33.4487 0.167511C31.9895 0.0161779 30.5411 -0.0378687 29.1359 0.0269883C26.0013 0.145893 23.3423 2.03756 22.1965 4.96693C21.0508 7.8855 21.7426 11.204 23.9476 13.42L33.4487 22.9215L33.3623 23.462C32.5732 28.5209 28.4982 32.596 23.4396 33.3851L22.8991 33.4716L13.4088 23.9809C11.1605 21.7325 7.9286 21.0623 4.96693 22.2297C2.01606 23.3863 0.124477 26.0671 0.0163864 29.2343C-0.0268497 30.5422 0.0163871 31.8934 0.135287 33.2338C1.44318 46.9943 12.3279 58.3659 26.0121 60.2576C27.8713 60.517 29.7629 60.6035 31.6328 60.517C31.8382 60.517 32.0544 60.5062 32.2597 60.5062C36.3023 60.5062 40.2044 62.1168 43.0688 64.9813L44.1713 66.0839C45.3927 67.3054 47.5329 67.3054 48.7543 66.0839C49.3705 65.4678 49.7055 64.657 49.7055 63.7923C49.7055 62.9275 49.3705 62.1168 48.7543 61.5007L47.6518 60.3981C43.3498 56.0959 37.394 53.7719 31.3302 54.0421C29.8818 54.107 28.3901 54.0421 26.8985 53.8367C16.1543 52.345 7.61514 43.4272 6.58828 32.6177C6.491 31.5583 6.45857 30.499 6.491 29.4613C6.51262 28.7154 7.03145 28.3911 7.34492 28.2722C7.64757 28.1533 8.24206 28.0236 8.80413 28.5533L19.3213 39.0709C19.9374 39.6871 20.7481 40.0222 21.6128 40.0222C31.7409 40.0222 39.9882 31.7745 39.9882 21.646C39.9882 20.7921 39.6423 19.9597 39.037 19.3544L28.5306 8.84755C28.1307 8.44759 28.0118 7.90712 28.228 7.35583C28.4333 6.84779 28.8333 6.54512 29.3629 6.53431C30.4871 6.49107 31.6328 6.53431 32.7786 6.64241C43.4471 7.74498 52.2781 16.2412 53.7914 26.8454C54.0075 28.3587 54.0832 29.8828 54.0075 31.3746C53.7373 37.4279 56.0504 43.3731 60.3632 47.6969L61.4658 48.7995C62.7304 50.0642 64.795 50.0642 66.0488 48.7995C66.6649 48.1833 67 47.3726 67 46.5079C67 45.6431 66.6649 44.8216 66.0488 44.2163L66.0704 44.1946Z" fill="white" />
                                            </svg>
                                            <p class="mb-0">Tools</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <!-- <div class="col-6 col-md-3 p-2">
                                <div class="item">
                                    <button class="item w-100" onclick="console.log('asdtutorials_go_to(go_to) ')">
                                        <div>

                                            <p class="mb-0">Home</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 p-2">
                                <div class="item">
                                    <button class="item w-100" onclick="console.log('asd')">
                                        <div>

                                            <p class="mb-0">Home</p>
                                        </div>
                                    </button>
                                </div>
                            </div> -->
                        </div>
                        <!-- <a class="button secondary url mt-3" href="#two">กลับหน้าหลัก</a> -->
                    </div>

                </div>
            </div>
            <style>
                .button.url {
                    color: rgba(14, 43, 129, 0.36) !important;
                    text-align: center !important;
                    font-size: 15px !important;
                    font-style: normal !important;
                    font-weight: 400 !important;
                }

                .detail-tools-page {
                    color: #003781;
                    text-align: center;
                    font-family: Kanit;
                    font-size: 20px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;
                }
            </style>
            <div class="container_tools d-none" id="start_tutorials">
                <div class="owl-carousel owl-theme mt-4" role="group" aria-label="First group">
                    <div class="item text-center">
                        <p class="title-tools" style="font-size: 25px;">รู้จักเมนูต่างๆภายในเว็บไซต์</p>
                        <center>
                            <img src="{{url('img/icon/phone-tools1.png')}}" style="width: 199px;" alt="">
                        </center>
                        <p class="my-2" style="color: #000;font-size: 16px;font-weight: 400;">
                            Navigation Bar
                        </p>
                        <div class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center align-items-center mx-2" style="width: 60px; height: 60px;background-color: #003781;border-radius: 10px;  ">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="21" viewBox="0 0 31 21" fill="none">
                                        <path d="M30.069 5.54259L15.8866 0.0662461C15.6173 -0.022082 15.2583 -0.022082 14.989 0.0662461L0.806603 5.54259C0.178269 5.71924 -0.180779 6.42587 0.0885069 7.04416C0.178269 7.30915 0.357793 7.57413 0.627079 7.66246L5.56399 10.0473V16.3186C5.65375 17.4669 6.28208 18.5268 7.35923 19.0568C9.15447 20.2934 12.2064 21 15.5276 21C18.8488 21 21.9007 20.2934 23.6959 19.0568C24.7731 18.5268 25.4014 17.4669 25.4911 16.3186V10.0473L26.2092 9.69401V16.6719C26.1195 17.2902 26.6581 17.9085 27.2864 17.9968C27.9147 18.0852 28.5431 17.5552 28.6328 16.9369C28.6328 16.8486 28.6328 16.7603 28.6328 16.7603V8.54574L30.3383 7.75079C30.9666 7.48581 31.1462 6.77918 30.8769 6.16088C30.6973 5.80757 30.4281 5.63091 30.069 5.54259ZM7.8978 11.2839L14.8095 14.7287C15.1685 14.9054 15.5276 14.9054 15.8866 14.7287L22.7983 11.2839V16.3186C22.7983 17.0252 20.285 18.6151 15.348 18.6151C10.4111 18.6151 7.8978 17.0252 7.8978 16.3186V11.2839ZM26.6581 6.77918L15.4378 12.2555L4.21756 6.77918L15.4378 2.4511L26.6581 6.77918Z" fill="white" />
                                    </svg>
                                    <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">Training</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mx-2" style="width: 60px; height: 60px;background-color: #003781;border-radius: 10px;  ">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21" viewBox="0 0 18 21" fill="none">
                                        <path d="M13.9181 1.66207H12.9477V1.06952C12.9477 0.47697 12.4744 0.00292969 11.8827 0.00292969H5.469C4.901 0.00292969 4.42766 0.500672 4.42766 1.06952V1.66207H3.45732C1.5403 1.66207 0.00195312 3.2027 0.00195312 5.09887V17.5661C0.00195312 19.4623 1.5403 21.0029 3.43365 21.0029H13.9181C15.8114 21.0029 17.3498 19.4623 17.3498 17.5661V5.09887C17.3498 3.2027 15.8114 1.66207 13.9181 1.66207ZM2.13197 5.09887C2.13197 4.38781 2.72364 3.79525 3.43365 3.79525H4.40399V4.48261C4.40399 5.07516 4.87733 5.5492 5.469 5.5492H11.8827C12.4744 5.5492 12.9477 5.07516 12.9477 4.48261V3.79525H13.9181C14.6281 3.79525 15.2198 4.38781 15.2198 5.09887L15.1961 17.5661C15.1961 18.2772 14.6044 18.8697 13.8944 18.8697H3.43365C2.72364 18.8697 2.13197 18.2772 2.13197 17.5661V5.09887ZM6.53401 3.41602V2.13611H10.8177V3.41602H6.53401Z" fill="white" />
                                        <path d="M5.46931 10.8109H11.883C12.4747 10.8109 12.948 10.3369 12.948 9.74433C12.948 9.15178 12.4747 8.67773 11.883 8.67773H5.46931C4.87763 8.67773 4.4043 9.15178 4.4043 9.74433C4.4043 10.3369 4.87763 10.8109 5.46931 10.8109Z" fill="white" />
                                        <path d="M5.46931 15.6215H11.883C12.4747 15.6215 12.948 15.1474 12.948 14.5549C12.948 13.9623 12.4747 13.4883 11.883 13.4883H5.46931C4.87763 13.4883 4.4043 13.9623 4.4043 14.5549C4.4043 15.1474 4.87763 15.6215 5.46931 15.6215Z" fill="white" />
                                    </svg>
                                    <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">Product</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mx-2" style="width: 60px; height: 60px;background-color: #003781;border-radius: 10px;  ">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21" fill="none">
                                        <path d="M20.9436 6.32118L12.6764 0.52729C11.666 -0.177065 10.357 -0.177065 9.34656 0.52729L1.07933 6.32118C0.390397 6.79832 0 7.57084 0 8.45696V18.3179C0 19.7948 1.21712 20.999 2.73278 20.999H19.2672C20.7829 20.999 22 19.7948 22 18.3179V8.45696C22 7.57084 21.6096 6.79832 20.9436 6.32118ZM12.9749 13.3647V18.7042H9.00209V13.3647H12.9749ZM14.1461 11.0699H7.85386C7.21086 11.0699 6.68267 11.5925 6.68267 12.2287V18.7042H2.70981C2.48017 18.7042 2.29645 18.5224 2.29645 18.3179V8.45696C2.29645 8.27519 2.36534 8.22975 2.38831 8.20703L10.6555 2.41314C10.8622 2.27682 11.0919 2.27682 11.3215 2.41314L19.5887 8.20703C19.6117 8.22975 19.6806 8.27519 19.6806 8.45696V18.3179C19.6806 18.5224 19.4969 18.7042 19.2672 18.7042H15.2944V12.2059C15.2944 11.5698 14.7891 11.0699 14.1461 11.0699Z" fill="white" />
                                    </svg>
                                    <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">Home</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mx-2" style="width: 60px; height: 60px;background-color: #003781;border-radius: 10px;  ">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="23" viewBox="0 0 28 23" fill="none">
                                        <path d="M24.4068 -0.000976562H8.61343C6.92676 -0.000976562 5.54676 1.37902 5.54676 3.06569V4.56836H3.06276C1.37609 4.56836 -0.00390625 5.94836 -0.00390625 7.63502V19.0124C-0.00390625 21.2204 1.77476 22.999 3.98276 22.999H22.7814C25.3574 22.999 27.4734 20.883 27.4734 18.307V3.06569C27.4734 1.37902 26.0934 -0.000976562 24.4068 -0.000976562ZM7.96943 19.0124V3.06569C7.96943 2.72836 8.24543 2.45236 8.58276 2.45236H24.4068C24.7441 2.45236 25.0201 2.72836 25.0201 3.06569L25.0508 18.307C25.0508 19.5337 24.0388 20.5457 22.8121 20.5457H7.66276C7.87743 20.055 7.96943 19.5337 7.96943 19.0124ZM5.54676 7.02169V19.0124C5.54676 19.871 4.84143 20.5457 4.01343 20.5457C3.18543 20.5457 2.48009 19.8404 2.48009 19.0124V7.63502C2.48009 7.29769 2.75609 7.02169 3.09343 7.02169H5.54676Z" fill="white" />
                                        <path d="M11.2794 15.0568H21.7367C22.4114 15.0568 22.9634 14.5048 22.9634 13.8302C22.9634 13.1555 22.4114 12.6035 21.7367 12.6035H11.2794C10.6047 12.6035 10.0527 13.1555 10.0527 13.8302C10.0527 14.5048 10.6047 15.0568 11.2794 15.0568Z" fill="white" />
                                        <path d="M21.7367 16.2842H11.2794C10.6047 16.2842 10.0527 16.8362 10.0527 17.5108C10.0527 18.1855 10.6047 18.7375 11.2794 18.7375H21.7367C22.4114 18.7375 22.9634 18.1855 22.9634 17.5108C22.9634 16.8362 22.4114 16.2842 21.7367 16.2842Z" fill="white" />
                                    </svg>
                                    <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">News</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mx-2" style="width: 60px; height: 60px;background-color: #003781;border-radius: 10px;  ">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M23.6651 15.8309L23.2701 15.436C22.186 14.3518 21.6013 12.8572 21.671 11.3393C21.702 10.6578 21.671 9.96474 21.5704 9.28326C20.8812 4.43931 16.8467 0.563372 11.9797 0.0600039C11.457 0.00579507 10.9381 -0.0135649 10.4348 0.00966746C9.31195 0.0522601 8.35946 0.729871 7.94904 1.7792C7.53862 2.82466 7.78642 4.01338 8.57629 4.80715L11.9797 8.21069L11.9487 8.4043C11.6661 10.2164 10.2064 11.6762 8.39431 11.9588L8.20072 11.9898L4.80119 8.59016C3.99584 7.78477 2.83814 7.5447 1.77724 7.96288C0.720217 8.37719 0.0426356 9.33746 0.00391664 10.472C-0.0115709 10.9405 0.00391688 11.4245 0.0465077 11.9046C0.515007 16.8338 4.414 20.9072 9.31582 21.5848C9.98179 21.6777 10.6594 21.7087 11.3292 21.6777C11.4028 21.6777 11.4802 21.6739 11.5538 21.6739C13.0019 21.6739 14.3996 22.2508 15.4257 23.2769L15.8206 23.6718C16.2581 24.1094 17.0248 24.1094 17.4623 23.6718C17.683 23.4511 17.803 23.1607 17.803 22.851C17.803 22.5412 17.683 22.2508 17.4623 22.0301L17.0674 21.6351C15.5263 20.0941 13.3929 19.2616 11.2208 19.3584C10.702 19.3816 10.1676 19.3584 9.63332 19.2848C5.78465 18.7504 2.72586 15.556 2.35803 11.6839C2.32318 11.3045 2.31157 10.925 2.32318 10.5533C2.33092 10.2861 2.51678 10.17 2.62906 10.1274C2.73747 10.0848 2.95043 10.0383 3.15177 10.228L6.91912 13.9956C7.13982 14.2163 7.43021 14.3363 7.73996 14.3363C11.3679 14.3363 14.3222 11.3819 14.3222 7.75379C14.3222 7.4479 14.1983 7.14975 13.9815 6.93291L10.218 3.16927C10.0747 3.026 10.0321 2.8324 10.1096 2.63492C10.1831 2.45294 10.3264 2.34452 10.5161 2.34065C10.9188 2.32516 11.3292 2.34065 11.7396 2.37937C15.5612 2.77432 18.7245 5.81776 19.2666 9.61625C19.344 10.1583 19.3711 10.7043 19.344 11.2386C19.2472 13.407 20.0758 15.5366 21.6207 17.0855L22.0156 17.4804C22.4686 17.9334 23.2082 17.9334 23.6573 17.4804C23.878 17.2597 23.998 16.9693 23.998 16.6595C23.998 16.3498 23.878 16.0555 23.6573 15.8387L23.6651 15.8309Z" fill="white" />
                                    </svg>
                                    <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">Tools</p>
                                </div>
                            </div>
                        </div>
                        <p class="mb-5" style="color: #003781;text-align: center;font-size: 20px;margin-top: 30px;font-weight: 700;">ในเว็บไซต์นี้ จะมีส่วนประกอบหลักทั้งหมด 8 ส่วนย่อย ได้แก่ </p>
                        <!-- <a class="button secondary url mt-3" href="#one">กลับหน้าหลัก</a> -->
                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>

                    </div>
                    <div class="item text-center">
                        <p class="title-tools" style="font-size: 25px;">รู้จักเมนูต่างๆภายในเว็บไซต์</p>
                        <div class="d-flex justify-content-center">
                            <p class="mb-0 me-3" style="color: #FFF;text-align: center;font-size: 25px;font-style: normal;font-weight: 400;line-height: normal;border-radius: 25px;background-color: #88AEE1;padding: 5px 12px;">ด้านบน</p>

                            <span class="d-flex align-items-center " style="border-radius: 25px;background-color: #243286;padding: 5px 20px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="148" height="24" viewBox="0 0 148 24" fill="none">
                                    <path d="M43.9727 22.6012L43.9464 22.6142L43.9217 22.6302C43.8219 22.6949 43.6813 22.6949 43.5815 22.6302L43.31 23.0488L43.5815 22.6302C43.4303 22.5321 43.3672 22.4191 43.3672 22.2752V3.34391C43.3672 3.14801 43.5391 2.9834 43.7516 2.9834H57.9023C58.1148 2.9834 58.2867 3.14801 58.2867 3.34391V22.2752C58.2867 22.4191 58.2236 22.5321 58.0724 22.6302L58.0701 22.6317C58.0569 22.6329 58.0398 22.6339 58.0179 22.6346C57.9842 22.6357 57.948 22.6357 57.9023 22.6357C57.8181 22.6357 57.7444 22.6317 57.6797 22.6005C57.6794 22.6003 57.6791 22.6002 57.6788 22.6001L51.048 19.3313L50.8269 19.2223L50.6059 19.3313L43.9727 22.6012ZM56.7991 21.348L57.5179 21.6977V20.8984V4.20443V3.70443H57.0179H44.636H44.136V4.20443V20.8984V21.6977L44.8548 21.348L50.6919 18.5083L50.7629 18.4738C50.7648 18.4737 50.7668 18.4736 50.7689 18.4735C50.7869 18.4727 50.8044 18.4727 50.8269 18.4727C50.8495 18.4727 50.867 18.4727 50.885 18.4735C50.8871 18.4736 50.8891 18.4737 50.891 18.4738L50.962 18.5083L56.7991 21.348Z" fill="#003781" stroke="white" />
                                    <path d="M48.5712 14.8787L48.5788 14.8661L48.5712 14.8787ZM48.5712 14.8787L48.5701 14.8805M48.5712 14.8787L48.5921 14.88L48.615 14.8814L48.6151 14.8814L48.5701 14.8805M48.5712 14.8787L48.5572 14.8778L48.5543 14.8776L48.5567 14.878L48.5701 14.8805M48.5712 14.8787L48.5701 14.8805M48.5701 14.8805L48.5919 14.8845L48.6189 14.8894L48.6191 14.8894L48.9104 14.9425L48.9756 14.9506L48.5701 14.8805ZM49.5707 10.961L49.9539 10.9087L50.1335 10.566L50.8276 9.24142L51.5214 10.5659L51.7009 10.9086L52.0842 10.961L53.5399 11.16L52.5162 12.0984L52.2109 12.3783L52.2852 12.7858L52.5367 14.1657L51.1633 13.484L50.8302 13.3187L50.497 13.4837L49.1184 14.1664L49.3698 12.7856L49.444 12.3783L49.1388 12.0985L48.1151 11.1598L49.5707 10.961ZM50.4881 8.59324L50.4883 8.59359L50.4881 8.59324Z" stroke="white" stroke-width="1.5" />
                                    <path d="M98.03 4.93548V5.43548H98.53H100.501C101.272 5.43548 101.99 5.71588 102.474 6.21816C102.985 6.74715 103.287 7.43221 103.287 8.16129V19.7742C103.287 20.5228 103.005 21.223 102.494 21.6984C101.955 22.1998 101.253 22.5 100.501 22.5H84.0728C83.3022 22.5 82.5845 22.2196 82.0998 21.7173C81.5893 21.1883 81.2871 20.5033 81.2871 19.7742V8.16129C81.2871 6.67187 82.5331 5.43548 84.0728 5.43548H86.0443H86.5443V4.93548V3.96774C86.5443 3.70413 86.7388 3.5 87.03 3.5C87.3211 3.5 87.5157 3.70413 87.5157 3.96774V4.93548V5.43548H88.0157H96.5585H97.0585V4.93548V3.96774C97.0585 3.70413 97.2531 3.5 97.5443 3.5C97.8354 3.5 98.03 3.70413 98.03 3.96774V4.93548ZM101.816 10.2742H102.316V9.77419V8.16129C102.316 7.70397 102.13 7.25924 101.783 6.9128C101.445 6.5415 100.978 6.37097 100.501 6.37097H84.0728C83.0825 6.37097 82.2585 7.16684 82.2585 8.16129V9.77419V10.2742H82.7585H101.816ZM82.7585 11.2097H82.2585V11.7097V19.7742C82.2585 20.7686 83.0825 21.5645 84.0728 21.5645H100.501C101.027 21.5645 101.434 21.3255 101.747 21.0567C102.134 20.7241 102.316 20.2557 102.316 19.7742V11.7097V11.2097H101.816H82.7585Z" fill="#003781" stroke="white" />
                                    <path d="M9.36779 20.0508C4.75398 20.0508 1 16.2968 1 11.6793C1 7.06184 4.75398 3.31152 9.36779 3.31152C13.9816 3.31152 17.7356 7.0655 17.7356 11.6793C17.7356 16.2931 13.9816 20.0471 9.36779 20.0471V20.0508ZM9.36779 4.40918C5.36135 4.40918 2.09765 7.67287 2.09765 11.6793C2.09765 15.6858 5.36135 18.9494 9.36779 18.9494C13.3742 18.9494 16.6379 15.6894 16.6379 11.6793C16.6379 7.66921 13.3779 4.40918 9.36779 4.40918Z" fill="white" stroke="white" />
                                    <path d="M20.3557 23.179C20.2264 23.179 20.0937 23.128 19.995 23.0293L14.9045 17.938C14.7037 17.7372 14.7037 17.4139 14.9045 17.2165C15.1052 17.0157 15.4285 17.0157 15.6259 17.2165L20.7164 22.3078C20.9172 22.5086 20.9172 22.8319 20.7164 23.0293C20.6177 23.128 20.485 23.179 20.3557 23.179Z" fill="white" stroke="white" />
                                    <path d="M143.069 18.2122V18.7122H143.569H144.463C144.647 18.7122 144.762 18.7715 144.829 18.8389C144.897 18.9064 144.956 19.0212 144.956 19.2056C144.956 19.39 144.897 19.5048 144.829 19.5722C144.762 19.6397 144.647 19.6989 144.463 19.6989H138.602H138.102V20.1989C138.102 21.6115 137.034 22.6791 135.622 22.6791C134.209 22.6791 133.141 21.6115 133.141 20.1989V19.6989H132.641H126.78C126.596 19.6989 126.481 19.6397 126.414 19.5722C126.346 19.5048 126.287 19.39 126.287 19.2056C126.287 19.0212 126.346 18.9064 126.414 18.8389C126.481 18.7715 126.596 18.7122 126.78 18.7122H127.675H128.175V18.2122V11.2585C128.175 7.16382 131.527 3.81152 135.622 3.81152C139.716 3.81152 143.069 7.16382 143.069 11.2585V18.2122ZM134.628 19.6989H134.128V20.1989C134.128 20.6106 134.268 20.9925 134.548 21.2727C134.828 21.5529 135.21 21.6923 135.622 21.6923C136.361 21.6923 137.115 21.103 137.115 20.1989V19.6989H136.615H134.628ZM129.161 18.2122V18.7122H129.661H137.608H141.582H142.082V18.2122V11.2585C142.082 7.70426 139.176 4.79828 135.622 4.79828C132.067 4.79828 129.161 7.70426 129.161 11.2585V18.2122Z" fill="#003781" stroke="white" />
                                    <circle cx="141.533" cy="5.7947" r="5.2947" fill="#EA0505" stroke="#EA0505" />
                                </svg>
                            </span>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <div style="color: #003781;font-size: 20px;font-style: normal;font-weight: 400;line-height: normal;">
                                <p class="mb-0 text-start"> ด้านบนขวา มีคำสั่งสำคัญ 4 คำสั่ง ได้แก่</p>

                                <div class="d-flex justify-content-start mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 22 22" fill="none">
                                        <path d="M9.36779 18.0508C4.75398 18.0508 1 14.2968 1 9.67931C1 5.06184 4.75398 1.31152 9.36779 1.31152C13.9816 1.31152 17.7356 5.0655 17.7356 9.67931C17.7356 14.2931 13.9816 18.0471 9.36779 18.0471V18.0508ZM9.36779 2.40918C5.36135 2.40918 2.09765 5.67287 2.09765 9.67931C2.09765 13.6858 5.36135 16.9494 9.36779 16.9494C13.3742 16.9494 16.6379 13.6894 16.6379 9.67931C16.6379 5.66921 13.3779 2.40918 9.36779 2.40918Z" fill="#003781" stroke="#003781" />
                                        <path d="M20.3557 21.179C20.2264 21.179 20.0937 21.128 19.995 21.0293L14.9045 15.938C14.7037 15.7372 14.7037 15.4139 14.9045 15.2165C15.1052 15.0157 15.4285 15.0157 15.6259 15.2165L20.7164 20.3078C20.9172 20.5086 20.9172 20.8319 20.7164 21.0293C20.6177 21.128 20.485 21.179 20.3557 21.179Z" fill="#003781" stroke="#003781" />
                                    </svg>
                                    <p class="mb-0 text-start ms-3">
                                        การแจ้งเตือน (Notification)
                                    </p>
                                </div>
                                <div class="d-flex justify-content-start mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 17 22" fill="none">
                                        <path d="M15.9023 0.483398H1.7516C1.3094 0.483398 0.867188 0.827604 0.867188 1.34391V20.2752C0.867188 20.6194 1.04407 20.8776 1.3094 21.0497C1.57472 21.2218 1.92849 21.2218 2.19381 21.0497L8.82694 17.7797L15.4601 21.0497C15.637 21.1357 15.8138 21.1357 15.9023 21.1357C16.0792 21.1357 16.256 21.1357 16.3445 21.0497C16.6098 20.8776 16.7867 20.6194 16.7867 20.2752V1.34391C16.7867 0.827604 16.3445 0.483398 15.9023 0.483398ZM15.0179 18.8984L9.18071 16.0587C9.09227 15.9727 8.91539 15.9727 8.82694 15.9727C8.7385 15.9727 8.56162 15.9727 8.47318 16.0587L2.63602 18.8984V2.20443H15.0179V18.8984Z" fill="#003781" />
                                        <path d="M7.46917 8.21793L5.15791 8.53357L5.11697 8.54142C5.055 8.55692 4.99851 8.58763 4.95326 8.63042C4.90801 8.6732 4.87563 8.72654 4.85942 8.78497C4.84321 8.8434 4.84376 8.90484 4.861 8.96301C4.87825 9.02118 4.91157 9.07399 4.95757 9.11606L6.63197 10.6513L6.2371 12.8199L6.23239 12.8574C6.2286 12.9178 6.24191 12.978 6.27095 13.0319C6.3 13.0859 6.34375 13.1316 6.39771 13.1643C6.45167 13.1971 6.5139 13.2158 6.57805 13.2185C6.64219 13.2211 6.70593 13.2077 6.76275 13.1795L8.82984 12.1558L10.8922 13.1795L10.9285 13.1952C10.9883 13.2174 11.0532 13.2242 11.1167 13.2149C11.1803 13.2056 11.24 13.1806 11.2898 13.1424C11.3397 13.1042 11.3779 13.0542 11.4004 12.9975C11.423 12.9408 11.4291 12.8795 11.4182 12.8199L11.023 10.6513L12.6981 9.11572L12.7264 9.08672C12.7667 9.03989 12.7932 8.98382 12.8031 8.92422C12.813 8.86462 12.8059 8.80362 12.7826 8.74744C12.7593 8.69125 12.7206 8.64189 12.6704 8.60438C12.6203 8.56687 12.5604 8.54256 12.4971 8.53391L10.1858 8.21793L9.15262 6.24558C9.12273 6.18843 9.07645 6.14031 9.01902 6.10666C8.96159 6.07301 8.8953 6.05518 8.82767 6.05518C8.76004 6.05518 8.69375 6.07301 8.63632 6.10666C8.5789 6.14031 8.53261 6.18843 8.50272 6.24558L7.46917 8.21793Z" fill="#003781" />
                                    </svg>
                                    <p class="mb-0 text-start ms-3">
                                        ปฎิทิน (Calendar)
                                    </p>
                                </div>
                                <div class="d-flex justify-content-start mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5014 1.93548H18.53V0.967742C18.53 0.419355 18.1028 0 17.5443 0C16.9857 0 16.5585 0.419355 16.5585 0.967742V1.93548H8.01568V0.967742C8.01568 0.419355 7.58854 0 7.02997 0C6.4714 0 6.04425 0.419355 6.04425 0.967742V1.93548H4.07282C2.26568 1.93548 0.787109 3.3871 0.787109 5.16129V16.7742C0.787109 17.6452 1.14854 18.4516 1.73997 19.0645C2.3314 19.6774 3.18568 20 4.07282 20H20.5014C21.3885 20 22.21 19.6452 22.8343 19.0645C23.4585 18.4839 23.7871 17.6452 23.7871 16.7742V5.16129C23.7871 4.29032 23.4257 3.48387 22.8343 2.87097C22.2428 2.25806 21.3885 1.93548 20.5014 1.93548ZM2.75854 5.16129C2.75854 4.45161 3.34997 3.87097 4.07282 3.87097H20.5014C20.8628 3.87097 21.1914 4 21.4214 4.25806C21.6843 4.51613 21.8157 4.83871 21.8157 5.16129V6.77419H2.75854V5.16129ZM20.5014 18.0645H4.07282C3.34997 18.0645 2.75854 17.4839 2.75854 16.7742V8.70968H21.8157V16.7742C21.8157 17.129 21.6843 17.4516 21.4214 17.6774C21.1585 17.9032 20.8628 18.0645 20.5014 18.0645Z" fill="#003781" />
                                    </svg>
                                    <p class="mb-0 text-start ms-3">
                                        ชื่นชอบ (Favorite)
                                    </p>
                                </div>
                                <div class="d-flex justify-content-start mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 23 24" fill="none">
                                        <path d="M19.4626 18.2122H18.5686V11.2585C18.5686 6.88768 14.9924 3.31152 10.6215 3.31152C6.25068 3.31152 2.67453 6.88768 2.67453 11.2585V18.2122H1.78049C1.18446 18.2122 0.787109 18.6095 0.787109 19.2056C0.787109 19.8016 1.18446 20.1989 1.78049 20.1989H7.64141C7.64141 21.8877 8.9328 23.1791 10.6215 23.1791C12.3103 23.1791 13.6017 21.8877 13.6017 20.1989H19.4626C20.0586 20.1989 20.456 19.8016 20.456 19.2056C20.456 18.6095 20.0586 18.2122 19.4626 18.2122ZM10.6215 21.1923C10.0255 21.1923 9.62817 20.795 9.62817 20.1989H11.6149C11.6149 20.795 11.1182 21.1923 10.6215 21.1923ZM12.6083 18.2122H4.66128V11.2585C4.66128 7.9804 7.3434 5.29828 10.6215 5.29828C13.8997 5.29828 16.5818 7.9804 16.5818 11.2585V18.2122H12.6083Z" fill="#003781" />
                                        <circle cx="16.533" cy="5.7947" r="5.7947" fill="#EA0505" />
                                    </svg>
                                    <p class="mb-0 text-start ms-3">
                                        ช่องค้นหา (Search)
                                    </p>
                                </div>

                                <div class="d-flex justify-content-center align-items-center mt-5">
                                    <p class="mb-0 me-1" style="color: #FFF;text-align: center;font-size: 22px;font-style: normal;font-weight: 400;line-height: normal;border-radius: 25px;background-color: #88AEE1;padding: 5px 12px;">ด้านล่าง</p>

                                    <div class="d-flex justify-content-center">
                                        <div class="d-flex justify-content-center align-items-center mx-1" style="width: 35px; height: 35px;background-color: #003781;border-radius: 10px;  ">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 31 21" fill="none">
                                                    <path d="M30.069 5.54259L15.8866 0.0662461C15.6173 -0.022082 15.2583 -0.022082 14.989 0.0662461L0.806603 5.54259C0.178269 5.71924 -0.180779 6.42587 0.0885069 7.04416C0.178269 7.30915 0.357793 7.57413 0.627079 7.66246L5.56399 10.0473V16.3186C5.65375 17.4669 6.28208 18.5268 7.35923 19.0568C9.15447 20.2934 12.2064 21 15.5276 21C18.8488 21 21.9007 20.2934 23.6959 19.0568C24.7731 18.5268 25.4014 17.4669 25.4911 16.3186V10.0473L26.2092 9.69401V16.6719C26.1195 17.2902 26.6581 17.9085 27.2864 17.9968C27.9147 18.0852 28.5431 17.5552 28.6328 16.9369C28.6328 16.8486 28.6328 16.7603 28.6328 16.7603V8.54574L30.3383 7.75079C30.9666 7.48581 31.1462 6.77918 30.8769 6.16088C30.6973 5.80757 30.4281 5.63091 30.069 5.54259ZM7.8978 11.2839L14.8095 14.7287C15.1685 14.9054 15.5276 14.9054 15.8866 14.7287L22.7983 11.2839V16.3186C22.7983 17.0252 20.285 18.6151 15.348 18.6151C10.4111 18.6151 7.8978 17.0252 7.8978 16.3186V11.2839ZM26.6581 6.77918L15.4378 12.2555L4.21756 6.77918L15.4378 2.4511L26.6581 6.77918Z" fill="white" />
                                                </svg>
                                                <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">Training</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center mx-1" style="width: 35px; height: 35px;background-color: #003781;border-radius: 10px;  ">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 18 21" fill="none">
                                                    <path d="M13.9181 1.66207H12.9477V1.06952C12.9477 0.47697 12.4744 0.00292969 11.8827 0.00292969H5.469C4.901 0.00292969 4.42766 0.500672 4.42766 1.06952V1.66207H3.45732C1.5403 1.66207 0.00195312 3.2027 0.00195312 5.09887V17.5661C0.00195312 19.4623 1.5403 21.0029 3.43365 21.0029H13.9181C15.8114 21.0029 17.3498 19.4623 17.3498 17.5661V5.09887C17.3498 3.2027 15.8114 1.66207 13.9181 1.66207ZM2.13197 5.09887C2.13197 4.38781 2.72364 3.79525 3.43365 3.79525H4.40399V4.48261C4.40399 5.07516 4.87733 5.5492 5.469 5.5492H11.8827C12.4744 5.5492 12.9477 5.07516 12.9477 4.48261V3.79525H13.9181C14.6281 3.79525 15.2198 4.38781 15.2198 5.09887L15.1961 17.5661C15.1961 18.2772 14.6044 18.8697 13.8944 18.8697H3.43365C2.72364 18.8697 2.13197 18.2772 2.13197 17.5661V5.09887ZM6.53401 3.41602V2.13611H10.8177V3.41602H6.53401Z" fill="white" />
                                                    <path d="M5.46931 10.8109H11.883C12.4747 10.8109 12.948 10.3369 12.948 9.74433C12.948 9.15178 12.4747 8.67773 11.883 8.67773H5.46931C4.87763 8.67773 4.4043 9.15178 4.4043 9.74433C4.4043 10.3369 4.87763 10.8109 5.46931 10.8109Z" fill="white" />
                                                    <path d="M5.46931 15.6215H11.883C12.4747 15.6215 12.948 15.1474 12.948 14.5549C12.948 13.9623 12.4747 13.4883 11.883 13.4883H5.46931C4.87763 13.4883 4.4043 13.9623 4.4043 14.5549C4.4043 15.1474 4.87763 15.6215 5.46931 15.6215Z" fill="white" />
                                                </svg>
                                                <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">Product</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center mx-1" style="width: 35px; height: 35px;background-color: #003781;border-radius: 10px;  ">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 22 21" fill="none">
                                                    <path d="M20.9436 6.32118L12.6764 0.52729C11.666 -0.177065 10.357 -0.177065 9.34656 0.52729L1.07933 6.32118C0.390397 6.79832 0 7.57084 0 8.45696V18.3179C0 19.7948 1.21712 20.999 2.73278 20.999H19.2672C20.7829 20.999 22 19.7948 22 18.3179V8.45696C22 7.57084 21.6096 6.79832 20.9436 6.32118ZM12.9749 13.3647V18.7042H9.00209V13.3647H12.9749ZM14.1461 11.0699H7.85386C7.21086 11.0699 6.68267 11.5925 6.68267 12.2287V18.7042H2.70981C2.48017 18.7042 2.29645 18.5224 2.29645 18.3179V8.45696C2.29645 8.27519 2.36534 8.22975 2.38831 8.20703L10.6555 2.41314C10.8622 2.27682 11.0919 2.27682 11.3215 2.41314L19.5887 8.20703C19.6117 8.22975 19.6806 8.27519 19.6806 8.45696V18.3179C19.6806 18.5224 19.4969 18.7042 19.2672 18.7042H15.2944V12.2059C15.2944 11.5698 14.7891 11.0699 14.1461 11.0699Z" fill="white" />
                                                </svg>
                                                <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">Home</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center mx-1" style="width: 35px; height: 35px;background-color: #003781;border-radius: 10px;  ">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 28 23" fill="none">
                                                    <path d="M24.4068 -0.000976562H8.61343C6.92676 -0.000976562 5.54676 1.37902 5.54676 3.06569V4.56836H3.06276C1.37609 4.56836 -0.00390625 5.94836 -0.00390625 7.63502V19.0124C-0.00390625 21.2204 1.77476 22.999 3.98276 22.999H22.7814C25.3574 22.999 27.4734 20.883 27.4734 18.307V3.06569C27.4734 1.37902 26.0934 -0.000976562 24.4068 -0.000976562ZM7.96943 19.0124V3.06569C7.96943 2.72836 8.24543 2.45236 8.58276 2.45236H24.4068C24.7441 2.45236 25.0201 2.72836 25.0201 3.06569L25.0508 18.307C25.0508 19.5337 24.0388 20.5457 22.8121 20.5457H7.66276C7.87743 20.055 7.96943 19.5337 7.96943 19.0124ZM5.54676 7.02169V19.0124C5.54676 19.871 4.84143 20.5457 4.01343 20.5457C3.18543 20.5457 2.48009 19.8404 2.48009 19.0124V7.63502C2.48009 7.29769 2.75609 7.02169 3.09343 7.02169H5.54676Z" fill="white" />
                                                    <path d="M11.2794 15.0568H21.7367C22.4114 15.0568 22.9634 14.5048 22.9634 13.8302C22.9634 13.1555 22.4114 12.6035 21.7367 12.6035H11.2794C10.6047 12.6035 10.0527 13.1555 10.0527 13.8302C10.0527 14.5048 10.6047 15.0568 11.2794 15.0568Z" fill="white" />
                                                    <path d="M21.7367 16.2842H11.2794C10.6047 16.2842 10.0527 16.8362 10.0527 17.5108C10.0527 18.1855 10.6047 18.7375 11.2794 18.7375H21.7367C22.4114 18.7375 22.9634 18.1855 22.9634 17.5108C22.9634 16.8362 22.4114 16.2842 21.7367 16.2842Z" fill="white" />
                                                </svg>
                                                <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">News</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center mx-1" style="width: 35px; height: 35px;background-color: #003781;border-radius: 10px;  ">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                                    <path d="M23.6651 15.8309L23.2701 15.436C22.186 14.3518 21.6013 12.8572 21.671 11.3393C21.702 10.6578 21.671 9.96474 21.5704 9.28326C20.8812 4.43931 16.8467 0.563372 11.9797 0.0600039C11.457 0.00579507 10.9381 -0.0135649 10.4348 0.00966746C9.31195 0.0522601 8.35946 0.729871 7.94904 1.7792C7.53862 2.82466 7.78642 4.01338 8.57629 4.80715L11.9797 8.21069L11.9487 8.4043C11.6661 10.2164 10.2064 11.6762 8.39431 11.9588L8.20072 11.9898L4.80119 8.59016C3.99584 7.78477 2.83814 7.5447 1.77724 7.96288C0.720217 8.37719 0.0426356 9.33746 0.00391664 10.472C-0.0115709 10.9405 0.00391688 11.4245 0.0465077 11.9046C0.515007 16.8338 4.414 20.9072 9.31582 21.5848C9.98179 21.6777 10.6594 21.7087 11.3292 21.6777C11.4028 21.6777 11.4802 21.6739 11.5538 21.6739C13.0019 21.6739 14.3996 22.2508 15.4257 23.2769L15.8206 23.6718C16.2581 24.1094 17.0248 24.1094 17.4623 23.6718C17.683 23.4511 17.803 23.1607 17.803 22.851C17.803 22.5412 17.683 22.2508 17.4623 22.0301L17.0674 21.6351C15.5263 20.0941 13.3929 19.2616 11.2208 19.3584C10.702 19.3816 10.1676 19.3584 9.63332 19.2848C5.78465 18.7504 2.72586 15.556 2.35803 11.6839C2.32318 11.3045 2.31157 10.925 2.32318 10.5533C2.33092 10.2861 2.51678 10.17 2.62906 10.1274C2.73747 10.0848 2.95043 10.0383 3.15177 10.228L6.91912 13.9956C7.13982 14.2163 7.43021 14.3363 7.73996 14.3363C11.3679 14.3363 14.3222 11.3819 14.3222 7.75379C14.3222 7.4479 14.1983 7.14975 13.9815 6.93291L10.218 3.16927C10.0747 3.026 10.0321 2.8324 10.1096 2.63492C10.1831 2.45294 10.3264 2.34452 10.5161 2.34065C10.9188 2.32516 11.3292 2.34065 11.7396 2.37937C15.5612 2.77432 18.7245 5.81776 19.2666 9.61625C19.344 10.1583 19.3711 10.7043 19.344 11.2386C19.2472 13.407 20.0758 15.5366 21.6207 17.0855L22.0156 17.4804C22.4686 17.9334 23.2082 17.9334 23.6573 17.4804C23.878 17.2597 23.998 16.9693 23.998 16.6595C23.998 16.3498 23.878 16.0555 23.6573 15.8387L23.6651 15.8309Z" fill="white" />
                                                </svg>
                                                <p class="mb-0 mt-1" style="color: #FFF;font-size: 8px;">Tools</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0 text-start mt-3">ด้านล่าง จะมีปุ่มหน้าสำคัญทั้ง 5 หน้า ได้แก่</p>

                                <ul>
                                    <li class="text-start">หน้าหลัก (Home)</li>
                                    <li class="text-start">หน้าการเรียนการอบรม (Training)</li>
                                    <li class="text-start">หน้ารวมผลิตภัณฑ ์ (Product)</li>
                                    <li class="text-start">หน้าข่าวสาร (News)</li>
                                    <li class="text-start">หน้าเครื่องมือและข้อมูลบริษัท (Tools)</li>
                                </ul>
                                <!-- <a class="button secondary url mt-3" href="#one">กลับหน้าหลัก</a> -->

                                <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>



            <!-- ///////////////////////////////////// -->
            <!--//////////////// HOME /////////////////-->
            <!-- ///////////////////////////////////// -->

            <div class="container_tools d-none w-100" id="home_tutorials">
                <div class="text-center w-100" id="main_page_home_tutorials">
                    <div>
                        <p class="title-tools" style="font-size: 25px;">รู้จักเมนูต่างๆภายในเว็บไซต์</p>
                        <p class="title-tools mt-4" style="font-size: 25px;">1.หน้า Home</p>
                        <img src="{{url('img/icon/tools-icon-home.png')}}" alt="" style="width: 100%;max-width: 266.13px;">

                        <p class="detail-tools-page mb-0 mt-4"><b>แหล่งรวมข้อมูล Profile</b></p>
                        <p class="detail-tools-page">และรายละเอียดต่างๆ</p>
                    </div>
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" fill="none">
                            <path d="M3 3L13 13L23 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="detail-tools-page mt-3">ตัวอย่างหน้าเว็บไซต์</p>
                    </div>

                    <div>
                        <img src="{{url('img/icon/phone-tools1.png')}}" alt="" style="width: 100%;max-width: 343px;">
                    </div>

                    <div class="mt-5 d-block">
                        <div class="mb-3" onclick="document.querySelector('#main_page_home_tutorials').classList.toggle('d-none');document.querySelector('#sub_page_home_tutorials').classList.toggle('d-none');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none">
                                <path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <a class="button secondary url mt-4" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme mt-4 d-none" role="group" aria-label="First group" id="sub_page_home_tutorials">
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">First Set-up ในหน้า Home</p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">1. เมนู Edit Profile</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-edit-profile.png')}}" alt="" style="width: 100%;max-width: 197px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">สามารถเปลี่ยนรูป Profile ได้ง่ายๆ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกที่ภาพโปรไฟล์ เลือกภาพที่คุณต้องการ</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">First Set-up ในหน้า Home</p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">2. เมนู Icon</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="197" height="197" viewBox="0 0 197 197" fill="none">
                                <path d="M98.5 197C153.003 197 197 153.003 197 98.5C197 43.9967 153.003 0 98.5 0C43.9967 0 0 43.9967 0 98.5C0 152.784 44.2156 197 98.5 197ZM98.5 10.9444C146.874 10.9444 186.056 50.1256 186.056 98.5C186.056 146.874 146.874 186.056 98.5 186.056C50.1256 186.056 10.9444 146.874 10.9444 98.5C10.9444 50.1256 50.1256 10.9444 98.5 10.9444Z" fill="#0E2B81" />
                                <path d="M98.5153 157.603C103.331 157.603 107.271 153.663 107.271 148.847V83.1804C107.271 78.3648 103.331 74.4248 98.5153 74.4248C93.6998 74.4248 89.7598 78.3648 89.7598 83.1804V148.847C89.7598 153.663 93.6998 157.603 98.5153 157.603Z" fill="#0E2B81" />
                                <path d="M98.5153 56.9222C103.351 56.9222 107.271 53.0022 107.271 48.1667C107.271 43.3311 103.351 39.4111 98.5153 39.4111C93.6798 39.4111 89.7598 43.3311 89.7598 48.1667C89.7598 53.0022 93.6798 56.9222 98.5153 56.9222Z" fill="#0E2B81" />
                            </svg>
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">สามารถดูนามบัตรได้ที่นี่</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูนามบัตรคุณและสามารถโหลดไว้</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">First Set-up ในหน้า Home</p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">3. เมนู Profile</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <<svg xmlns="http://www.w3.org/2000/svg" width="197" height="197" viewBox="0 0 197 197" fill="none">
                                <circle cx="98.5" cy="98.5" r="98.5" fill="#7FA3D4" />
                                <path d="M49.25 82.083L98.5 131.333L147.75 82.083" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">สามารถดู Profile </p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดู Profile ส่วนตัวของคุณได้</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>

                    </div>
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">First Set-up ในหน้า Home</p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">4. เมนู Favorites</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="154" height="201" viewBox="0 0 154 201" fill="none">
                                <path d="M145.444 0H8.55556C4.27778 0 0 3.32973 0 8.32432V191.459C0 194.789 1.71111 197.286 4.27778 198.951C6.84444 200.616 10.2667 200.616 12.8333 198.951L77 167.319L141.167 198.951C142.878 199.784 144.589 199.784 145.444 199.784C147.156 199.784 148.867 199.784 149.722 198.951C152.289 197.286 154 194.789 154 191.459V8.32432C154 3.32973 149.722 0 145.444 0ZM136.889 178.141L80.4222 150.67C79.5667 149.838 77.8556 149.838 77 149.838C76.1444 149.838 74.4333 149.838 73.5778 150.67L17.1111 178.141V16.6486H136.889V178.141Z" fill="#003781" />
                                <path d="M63.8655 74.826L41.5071 77.8795L41.1111 77.9554C40.5117 78.1053 39.9652 78.4024 39.5274 78.8163C39.0897 79.2302 38.7765 79.7462 38.6197 80.3114C38.4629 80.8767 38.4682 81.471 38.635 82.0337C38.8018 82.5964 39.1242 83.1073 39.5692 83.5143L55.7667 98.3656L51.9469 119.344L51.9013 119.707C51.8646 120.291 51.9934 120.873 52.2744 121.395C52.5554 121.917 52.9785 122.359 53.5005 122.676C54.0225 122.993 54.6246 123.174 55.2451 123.199C55.8656 123.225 56.4822 123.095 57.0318 122.823L77.0282 112.92L96.979 122.823L97.3295 122.975C97.9079 123.189 98.5366 123.255 99.1509 123.165C99.7653 123.076 100.343 122.833 100.825 122.464C101.308 122.094 101.677 121.61 101.895 121.062C102.113 120.514 102.173 119.921 102.067 119.344L98.2441 98.3656L114.449 83.511L114.722 83.2304C115.112 82.7774 115.369 82.235 115.464 81.6584C115.559 81.0819 115.491 80.4918 115.266 79.9483C115.04 79.4048 114.666 78.9273 114.181 78.5645C113.695 78.2016 113.117 77.9664 112.504 77.8828L90.1453 74.826L80.1507 55.7462C79.8615 55.1934 79.4137 54.7278 78.8582 54.4023C78.3026 54.0768 77.6614 53.9043 77.0072 53.9043C76.3529 53.9043 75.7117 54.0768 75.1562 54.4023C74.6006 54.7278 74.1529 55.1934 73.8637 55.7462L63.8655 74.826Z" fill="#003781" />
                            </svg>
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวบรวมข้อมูลที่คุณบันทึก </p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">เก็บทุกสิ่งที่คุณบันทึกไว้ที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>

                    </div>
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">First Set-up ในหน้า Home</p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">5. เมนู My Calendar </p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="184" height="161" viewBox="0 0 184 161" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M157.714 15.5806H141.943V7.79032C141.943 3.37581 138.526 0 134.057 0C129.589 0 126.171 3.37581 126.171 7.79032V15.5806H57.8286V7.79032C57.8286 3.37581 54.4114 0 49.9429 0C45.4743 0 42.0571 3.37581 42.0571 7.79032V15.5806H26.2857C11.8286 15.5806 0 27.2661 0 41.5484V135.032C0 142.044 2.89143 148.535 7.62286 153.469C12.3543 158.403 19.1886 161 26.2857 161H157.714C164.811 161 171.383 158.144 176.377 153.469C181.371 148.795 184 142.044 184 135.032V41.5484C184 34.5371 181.109 28.0452 176.377 23.1113C171.646 18.1774 164.811 15.5806 157.714 15.5806ZM15.7714 41.5484C15.7714 35.8355 20.5029 31.1613 26.2857 31.1613H157.714C160.606 31.1613 163.234 32.2 165.074 34.2774C167.177 36.3548 168.229 38.9516 168.229 41.5484V54.5323H15.7714V41.5484ZM157.714 145.419H26.2857C20.5029 145.419 15.7714 140.745 15.7714 135.032V70.1129H168.229V135.032C168.229 137.889 167.177 140.485 165.074 142.303C162.971 144.121 160.606 145.419 157.714 145.419Z" fill="#003781" />
                            </svg>
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">เตือนความจำและเพิ่มกิจกรรม </p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">ดูตารางอบรม, สอบ, กิจกรรม, และเพิ่มปฏิทินของตนเอง ดู Activity จากบริษัทได้ที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>

                    </div>
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">First Set-up ในหน้า Home</p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">6. เมนู Notification </p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="156" height="168" viewBox="0 0 156 168" fill="none">
                                <path d="M134.591 131.252H128.148V81.1381C128.148 49.638 102.375 23.8652 70.8752 23.8652C39.3751 23.8652 13.6023 49.638 13.6023 81.1381V131.252H7.15911C2.86364 131.252 0 134.116 0 138.411C0 142.707 2.86364 145.57 7.15911 145.57H49.3979C49.3979 157.741 58.7047 167.047 70.8752 167.047C83.0457 167.047 92.3525 157.741 92.3525 145.57H134.591C138.887 145.57 141.75 142.707 141.75 138.411C141.75 134.116 138.887 131.252 134.591 131.252ZM70.8752 152.729C66.5797 152.729 63.7161 149.866 63.7161 145.57H78.0343C78.0343 149.866 74.4548 152.729 70.8752 152.729ZM85.1934 131.252H27.9205V81.1381C27.9205 57.5131 47.2501 38.1835 70.8752 38.1835C94.5003 38.1835 113.83 57.5131 113.83 81.1381V131.252H85.1934Z" fill="#003781" />
                                <circle cx="113.465" cy="41.7615" r="41.7615" fill="#EA0505" />
                            </svg>
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">แจ้งเตือนทุกเหตุการณ์สำคัญ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คุณสามารถรับการแจ้งเตือนกิจกรรม, ข่าวสาร, และการอัปเดตล่าสุดที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>

                    </div>
                </div>
            </div>
            <!-- ///////////////////////////////////// -->
            <!--////////////// END HOME //////////////-->
            <!-- ///////////////////////////////////// -->


            <!-- ///////////////////////////////////// -->
            <!--//////////////// Training /////////////////-->
            <!-- ///////////////////////////////////// -->

            <div class="container_tools d-none w-100" id="training_tutorials">
                <div class="text-center w-100" id="main_page_training_tutorials">
                    <div>
                        <p class="title-tools" style="font-size: 25px;">รู้จักเมนูต่างๆภายในเว็บไซต์</p>
                        <p class="title-tools mt-4" style="font-size: 25px;">2. หน้า Training</p>
                        <img src="{{url('img/icon/tools-icon-training.png')}}" alt="" style="width: 100%;max-width: 266.13px;">

                        <p class="detail-tools-page mb-0 mt-4"><b>หลักสูตรการฝึกสอน และตารางต่างๆ</b></p>
                        <p class="detail-tools-page">รวบรวมหลักสูตรฝึกสอน ตารางอบรม และตารางสอบ ไว้ในที่เดียว</p>
                    </div>
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" fill="none">
                            <path d="M3 3L13 13L23 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="detail-tools-page mt-3">ตัวอย่างหน้าเว็บไซต์</p>
                    </div>

                    <div>
                        <img src="{{url('img/icon/phone-tools-training.png')}}" alt="" style="width: 100%;max-width: 343px;">
                    </div>

                    <div class="mt-5 d-block">
                        <div class="mb-3" onclick="document.querySelector('#main_page_training_tutorials').classList.toggle('d-none');document.querySelector('#sub_page_training_tutorials').classList.toggle('d-none');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none">
                                <path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <a class="button secondary url mt-4" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme mt-4 d-none" role="group" aria-label="First group" id="sub_page_training_tutorials">
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">1. เมนูตารางอบรม</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training1.png')}}" alt="" style="width: 100%;max-width:  342px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">สามารถดูตารางอบรม</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">แจ้งวัน,เวลา และสถานที่อบรมที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">2. เมนูตารางสอบ</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training2.png')}}" alt="" style="width: 100%;max-width:  342px;">

                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">สามารถดูตารางสอบ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">แจ้งวัน,เวลา และสถานที่สอบที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">3. เมนูหลักสูตรการอบรมและสอบ</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training3.png')}}" alt="" style="width: 100%;max-width:  342px;">

                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวมหลักสูตรตามหมวดหมู่น่าสนใจ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูและเข้าร่วมการอบรมหรือสอบ</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">4. เมนู Search</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" viewBox="0 0 160 160" fill="none">
                                <path d="M67.5481 134.125C30.855 134.125 1 104.27 1 67.5481C1 30.8259 30.855 1 67.5481 1C104.241 1 134.096 30.855 134.096 67.5481C134.096 104.241 104.241 134.096 67.5481 134.096V134.125ZM67.5481 9.72952C35.6853 9.72952 9.72952 35.6853 9.72952 67.5481C9.72952 99.4108 35.6853 125.367 67.5481 125.367C99.4108 125.367 125.367 99.4399 125.367 67.5481C125.367 35.6562 99.4399 9.72952 67.5481 9.72952Z" fill="#003781" stroke="#003781" />
                                <path d="M154.933 159C153.905 159 152.85 158.594 152.065 157.809L111.58 117.318C109.984 115.722 109.984 113.15 111.58 111.58C113.177 109.984 115.748 109.984 117.317 111.58L157.802 152.071C159.399 153.668 159.399 156.239 157.802 157.809C157.017 158.594 155.962 159 154.933 159Z" fill="#003781" stroke="#003781" />
                            </svg>
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">ค้นหาการอบรมและสอบ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">กดเพื่อค้นหาหลักสูตรที่คุณสนใจ</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">5. เมนู Like</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training4.png')}}" alt="" style="width: 100%;max-width:  180px;">

                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">ชอบหลักสูตรอบรมหรือสอบ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">กด Like และให้คะแนนบทความ</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">6. เมนูให้คะแนน</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training5.png')}}" alt="" style="width: 100%;max-width:  225px;">

                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">ชอบหลักสูตรอบรมหรือสอบ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">กด Like และให้คะแนนบทความ</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">7. เมนู Dislike</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="181" height="82" viewBox="0 0 181 82" fill="none">
                                <rect width="180.4" height="82" rx="15" fill="#EA0505" />
                                <ellipse cx="90.3421" cy="40.9999" rx="27.6116" ry="28.0526" fill="white" />
                                <path d="M90.6747 22.96C94.6972 22.96 98.9156 23.344 102.602 24.1138L104.878 24.5889C105.411 24.7006 105.791 25.1757 105.78 25.7184L105.571 36.3859L105.498 42.4782L105.352 42.8641L100.879 47.3303C100.586 47.6223 100.302 47.9237 100.026 48.2317C97.0843 51.5149 96.0386 53.0659 94.1913 60.913C93.8785 62.2397 92.2686 62.7673 91.2257 61.8848C90.9205 61.6266 90.653 61.3168 90.4354 60.9637C88.1396 57.2402 90.0039 47.8035 90.0039 47.8035L87.4218 47.9462C84.4807 48.0889 82.7596 48.0889 79.26 47.8016C79.0555 47.7847 78.0146 47.6909 77.5746 47.6261L77.5398 47.6204L76.4235 47.4167C74.2634 46.9764 72.9436 45.7784 72.9813 43.8302C73.001 42.835 73.5418 41.8605 74.465 41.1563C74.6006 41.053 74.741 40.9573 74.8861 40.8699C74.3613 40.2137 74.0533 39.3752 74.0703 38.4683C74.09 37.4768 74.6044 36.507 75.4833 35.8075C75.6237 35.6958 75.7697 35.5925 75.9214 35.4986C75.4108 34.8273 75.1423 33.9889 75.1593 33.1064C75.179 32.114 75.6039 31.1854 76.3556 30.4907C76.5224 30.3367 76.7014 30.1996 76.8907 30.0785C76.528 29.4607 76.3368 28.6683 76.3556 27.7473C76.4009 25.4348 78.1662 24.7645 79.7234 24.1739L79.7705 24.1561L79.8195 24.1429C82.7285 23.3552 86.6003 22.9609 90.6737 22.9609L90.6747 22.96Z" fill="#EA0505" />
                            </svg>

                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">หากไม่ชอบหลักสูตรอบรมหรือสอบ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">กด Dislike และเขียนเหตุผลที่คุณไม่ชอบ</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">8. เมนูเขียนเหตุผล</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training6.png')}}" alt="" style="width: 100%;max-width:  225px;">

                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">ชอบหลักสูตรอบรมหรือสอบ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">กด Dislike และเขียนเหตุผลที่คุณไม่ชอบ</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">9. เมนู Share</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training7.png')}}" alt="" style="width: 100%;max-width:  225px;">

                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">แชร์หลักสูตร</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">กดเพื่อแชร์กับคนที่คุณรู้จักที่สนใจ
                                หลักสูตรของเรา</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้หน้า Training </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">10. เมนู Favorites</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="154" height="201" viewBox="0 0 154 201" fill="none">
                                <path d="M153 0H1C0.447715 0 0 0.447712 0 0.999997V198.589C0 199.331 0.779125 199.814 1.4438 199.485L76.5562 162.286C76.8359 162.148 77.1641 162.148 77.4438 162.286L152.556 199.485C153.221 199.814 154 199.331 154 198.589V1C154 0.447715 153.552 0 153 0Z" fill="#EDB529" />
                                <path d="M61.2284 64.072L34.3984 67.804L33.9232 67.8968C33.2038 68.08 32.548 68.4431 32.0228 68.949C31.4975 69.4549 31.1216 70.0855 30.9335 70.7763C30.7453 71.4672 30.7516 72.1936 30.9518 72.8814C31.152 73.5691 31.5388 74.1936 32.0729 74.691L51.5099 92.8425L46.9261 118.482L46.8714 118.926C46.8274 119.64 46.9819 120.352 47.3191 120.99C47.6563 121.627 48.1641 122.168 48.7905 122.555C49.4169 122.943 50.1393 123.164 50.8839 123.195C51.6285 123.227 52.3685 123.068 53.028 122.735L77.0237 110.631L100.965 122.735L101.385 122.92C102.079 123.183 102.834 123.263 103.571 123.153C104.308 123.044 105.002 122.748 105.58 122.296C106.159 121.844 106.602 121.253 106.864 120.583C107.126 119.913 107.197 119.188 107.071 118.482L102.483 92.8425L121.928 74.6869L122.256 74.344C122.725 73.7903 123.032 73.1274 123.147 72.4227C123.261 71.718 123.179 70.9968 122.908 70.3325C122.638 69.6683 122.189 69.0847 121.606 68.6412C121.024 68.1977 120.33 67.9102 119.594 67.808L92.7642 64.072L80.7706 40.7521C80.4236 40.0765 79.8863 39.5075 79.2197 39.1097C78.553 38.7118 77.7836 38.501 76.9984 38.501C76.2133 38.501 75.4439 38.7118 74.7772 39.1097C74.1106 39.5075 73.5733 40.0765 73.2263 40.7521L61.2284 64.072Z" fill="#FBFBFB" />
                            </svg>
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">กด Favorites หลักสูตรอบรมหรือสอบ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">เก็บทุกสิ่งที่คุณบันทึกไว้จะไปอยู่ใน Favorites</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                </div>
            </div>

            <!-- ///////////////////////////////////// -->
            <!--//////////////// End Training /////////////////-->
            <!-- ///////////////////////////////////// -->


            <!-- ///////////////////////////////////// -->
            <!--//////////////// product /////////////////-->
            <!-- ///////////////////////////////////// -->

            <div class="container_tools d-none w-100" id="product_tutorials">
                <div class="text-center w-100" id="main_page_product_tutorials">
                    <div>
                        <p class="title-tools" style="font-size: 25px;">รู้จักเมนูต่างๆภายในเว็บไซต์</p>
                        <p class="title-tools mt-4" style="font-size: 25px;">3. หน้า Product</p>
                        <img src="{{url('img/icon/tools-icon-product.png')}}" alt="" style="width: 100%;max-width: 266.13px;">

                        <p class="detail-tools-page mb-0 mt-4"><b>แหล่งรวมผลิตภัณฑ์ของบริษัท</b></p>
                        <p class="detail-tools-page">ค้นหารายละเอียดผลิตภัณฑ์ที่สนใจ</p>
                    </div>
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" fill="none">
                            <path d="M3 3L13 13L23 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="detail-tools-page mt-3">ตัวอย่างหน้าเว็บไซต์</p>
                    </div>

                    <div>
                        <img src="{{url('img/icon/phone-tools-product.png')}}" alt="" style="width: 100%;max-width: 343px;">
                    </div>

                    <div class="mt-5 d-block">
                        <div class="mb-3" onclick="document.querySelector('#main_page_product_tutorials').classList.toggle('d-none');document.querySelector('#sub_page_product_tutorials').classList.toggle('d-none');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none">
                                <path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <a class="button secondary url mt-4" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme mt-4 d-none" role="group" aria-label="First group" id="sub_page_product_tutorials">
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้งานหน้า Product </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">1. เมนูสุขภาพทางการเงิน</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training1.png')}}" alt="" style="width: 100%;max-width:  308px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">แหล่งรวมการวิเคราะห์เงินของคุณ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อไปยังหน้า Financial Health Check </p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้งานหน้า Product </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">2. เมนูผลิตภัณฑ์</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training2.png')}}" alt="" style="width: 100%;max-width:  308px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวบรวมผลิตภัณฑ์</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูผลิตภัณฑ์ต่างๆได้ที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้งานหน้า Product </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">3. เมนูผลิตภัณฑ์โปรด</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-training3.png')}}" alt="" style="width: 100%;max-width:  308px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวบรวมผลิตภัณฑ์ที่คุณชอบ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูผลิตภัณฑ์ที่คุณกด Favorites ได้ที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้งานหน้า Product </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">4. เมนูผลิตภัณฑ์ทั้งหมด</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-product4.png')}}" alt="" style="width: 100%;max-width:  348px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวบรวมผลิตภัณฑ์ตามหมวดหมู่</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูผลิตภัณฑ์ทั้งหมดที่เรามี</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                </div>
            </div>

            <!-- ///////////////////////////////////// -->
            <!--//////////////// End product /////////////////-->
            <!-- ///////////////////////////////////// -->




            <!-- ///////////////////////////////////// -->
            <!--//////////////// news /////////////////-->
            <!-- ///////////////////////////////////// -->
            <div class="container_tools d-none w-100" id="news_tutorials">
                <div class="text-center w-100" id="main_page_news_tutorials">
                    <div>
                        <p class="title-tools" style="font-size: 25px;">รู้จักเมนูต่างๆภายในเว็บไซต์</p>
                        <p class="title-tools mt-4" style="font-size: 25px;">4. หน้า News</p>
                        <img src="{{url('img/icon/tools-icon-news.png')}}" alt="" style="width: 100%;max-width: 266.13px;">

                        <p class="detail-tools-page mb-0 mt-4"><b>แหล่งรวมข้อมูลข่าวสารของบริษัท</b></p>
                        <p class="detail-tools-page">ทั้งข่าวสาร การแข่งขัน ตารางกิจกรรม</p>
                    </div>
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" fill="none">
                            <path d="M3 3L13 13L23 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="detail-tools-page mt-3">ตัวอย่างหน้าเว็บไซต์</p>
                    </div>

                    <div>
                        <img src="{{url('img/icon/phone-tools-news.png')}}" alt="" style="width: 100%;max-width: 343px;">
                    </div>

                    <div class="mt-5 d-block">
                        <div class="mb-3" onclick="document.querySelector('#main_page_news_tutorials').classList.toggle('d-none');document.querySelector('#sub_page_news_tutorials').classList.toggle('d-none');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none">
                                <path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <a class="button secondary url mt-4" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme mt-4 d-none" role="group" aria-label="First group" id="sub_page_news_tutorials">
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้งานหน้า News </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">1. เมนูข่าวสาร/การแข่งขัน</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-news1.png')}}" alt="" style="width: 100%;max-width:  308px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวบรวมข่าวสารและการแข่งขัน</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูข่าวสารและการแข่งขันที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้งานหน้า News </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">2. เมนูตารางกิจกรรม</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-news2.png')}}" alt="" style="width: 100%;max-width:  308px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวมตารางกิจกรรม</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูตารางกิจกรรมที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                </div>
            </div>
            <!-- ///////////////////////////////////// -->
            <!--//////////////// end news /////////////////-->
            <!-- ///////////////////////////////////// -->

            <!-- ///////////////////////////////////// -->
            <!--//////////////// tools /////////////////-->
            <!-- ///////////////////////////////////// -->
            <div class="container_tools d-none w-100" id="tools_tutorials">
                <div class="text-center w-100" id="main_page_tools_tutorials">
                    <div>
                        <p class="title-tools" style="font-size: 25px;">รู้จักเมนูต่างๆภายในเว็บไซต์</p>
                        <p class="title-tools mt-4" style="font-size: 25px;">5. หน้า Tools</p>
                        <img src="{{url('img/icon/tools-icon-tools.png')}}" alt="" style="width: 100%;max-width: 266.13px;">

                        <p class="detail-tools-page mb-0 mt-4"><b>เครื่องมือช่วยในการทำงาน</b></p>
                        <p class="detail-tools-page">ข้อมูลบริษัท แอปพลิเคชั่น เว็บไซต์ และอื่นๆ</p>
                    </div>
                    <div class="mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" fill="none">
                            <path d="M3 3L13 13L23 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="detail-tools-page mt-3">ตัวอย่างหน้าเว็บไซต์</p>
                    </div>

                    <div>
                        <img src="{{url('img/icon/phone-tools-tools.png')}}" alt="" style="width: 100%;max-width: 343px;">
                    </div>

                    <div class="mt-5 d-block">
                        <div class="mb-3" onclick="document.querySelector('#main_page_tools_tutorials').classList.toggle('d-none');document.querySelector('#sub_page_tools_tutorials').classList.toggle('d-none');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none">
                                <path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <a class="button secondary url mt-4" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme mt-4 d-none" role="group" aria-label="First group" id="sub_page_tools_tutorials">
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้งานหน้า Tools </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">1. เมนูแอปพลิเคชั่น</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-tools1.png')}}" alt="" style="width: 100%;max-width:  308px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวมแอปพลิเคชั่น</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูแอปพลิเคชั่นของบริษัท</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>

                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้งานหน้า Tools </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">2. เมนูทั้งหมด</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-tools2.png')}}" alt="" style="width: 100%;max-width:  308px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวมรายการทั้งหมดของเครื่องมือ</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูการใช้เครื่องมือแบบง่ายๆที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                    <div class="item text-center">
                        <div>
                            <p class="title-tools" style="font-size: 25px;">เคล็ดลับการใช้งานหน้า Tools </p>
                            <p class="title-tools" style="font-size: 25px;font-weight: 600;margin-top: 39px;">3. เมนูเว็บไซต์</p>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img src="{{url('img/icon/tools-icon-tools3.png')}}" alt="" style="width: 100%;max-width:  308px;">
                        </div>

                        <div style="margin-top: 39px;">
                            <p class="title-tools mb-0" style="font-size: 20px;">รวมเว็บไซต์</p>
                            <p class="title-tools" style="font-size: 20px;font-weight: 400;">คลิกเพื่อดูเว็บไซต์ของบริษัทที่นี่</p>
                        </div>

                        <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>
                    </div>
                </div>
            </div>
            <!-- ///////////////////////////////////// -->
            <!--//////////////// end tools /////////////////-->
            <!-- ///////////////////////////////////// -->

            <div class="container_tools d-none" id="other_tutorials">
                <a class="button secondary url mt-3" href="#two" onclick="tutorials_go_to('main_tutorials')">กลับหน้าหลัก</a>

                other_tutorials
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

            update_coc_of_user();
        }
        //  else {
        //     input.classList.remove('input-hidden');
        //     svg.classList.add('d-none');
        //     svg.classList.remove('svg-visible');
        // }
    });

    function check_user_coc_for_tools(){
        let check_coc = "{{ Auth::user()->check_coc }}" ;

        if(check_coc == 'Yes'){
            document.querySelector('#submit_coc').click();
        }
    }

    function update_coc_of_user(){
        fetch("{{ url('/') }}/api/update_coc_of_user/" + "{{ Auth::user()->id }}")
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if( result == "success" ){
                    document.querySelector('#span_alert_tools').classList.add('d-none');
                    if(document.querySelector('#span_alert_tools_menu')){
                        document.querySelector('#span_alert_tools_menu').classList.add('d-none');
                    }
                }
            });
    }
</script>

<button id="btn_open_modal_detail_app" data-toggle="modal" data-target="#modal_detail_app" class="d-none">
    modal_detail_app
</button>
<!-- Modal -->
<div class="modal fade" id="modal_detail_app" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body p-4" style="border-radius: 10px;background: #F0F5FF;box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
                <div class="d-flex justify-content-center">
                    <img id="img_modal_tools_apps" src="{{url('img/icon/icon-tools2.png')}}" width="48" height="48" alt="">
                </div>
                <p id="name_modal_tools_apps" class="title-tools mt-2" style="font-size: 14px;">
                    Allianz Ayudhya - My Allianz
                </p>
                <p id="detail_modal_tools_apps" class="text-detail-app">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime nemo dolorem aut illo amet dicta sunt! Dolorum expedita voluptas culpa magni libero architecto vel aliquid, suscipit nobis doloremque delectus! Aliquid!
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
        startPosition: 'URLHash',
        URLhashListener: true,
        autoHeight: true
    })
    document.querySelectorAll('.owl-prev').forEach(element => {
        element.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none" transform="rotate(180)">
  <path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>`;
    });

    document.querySelectorAll('.owl-next').forEach(element => {
        element.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" viewBox="0 0 16 26" fill="none">
  <path d="M3 23L13 13L3 3" stroke="#243286" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>`;
    });
</script>

<script>
    function tutorials_go_to(go_to) {

        document.querySelector('#main_tutorials').classList.add('d-none');
        document.querySelector('#start_tutorials').classList.add('d-none');
        document.querySelector('#home_tutorials').classList.add('d-none');
        document.querySelector('#training_tutorials').classList.add('d-none');
        document.querySelector('#product_tutorials').classList.add('d-none');
        document.querySelector('#news_tutorials').classList.add('d-none');
        document.querySelector('#tools_tutorials').classList.add('d-none');
        document.querySelector('#other_tutorials').classList.add('d-none');

        document.querySelector(`#${go_to}`).classList.remove('d-none');
        document.querySelector(`#main_page_${go_to}`).classList.remove('d-none');
        document.querySelector(`#sub_page_${go_to}`).classList.add('d-none');
    }
    document.addEventListener("DOMContentLoaded", function() {
        change_active_menu_theme_user('Tools');
        check_user_coc_for_tools();
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

                        let phone = `-`;
                        if (result[i].phone) {
                            phone = result[i].phone ;
                        }

                        let mail = `-`;
                        if (result[i].mail) {
                            mail = result[i].mail ;
                        }

                        let html = `
                            <div class="col-md-6 p-2 contact-item">
                                <div class="">
                                    <p class="contact-title">` + result[i].type + `</p>
                                    <a class="d-block contact-phone" href="tel:` + phone + `">
                                        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 13.5C0 6.04416 6.04252 0 13.5 0C20.9558 0 27 6.04252 27 13.5C27 20.9558 20.9575 27 13.5 27C6.04416 27 0 20.9575 0 13.5ZM16.6438 15.1803L15.5279 16.2962C15.3598 16.4643 15.0058 16.5109 14.8026 16.3925C14.7404 16.3603 14.6882 16.3327 14.6095 16.2878C14.472 16.2093 14.3153 16.1122 14.1429 15.996C13.6447 15.6599 13.127 15.24 12.6187 14.7317C12.1103 14.2233 11.6908 13.7062 11.3554 13.2091C11.2394 13.0371 10.9557 12.544 10.9557 12.544C10.8366 12.3455 10.8834 11.9931 11.0542 11.8224L12.17 10.7066C12.7662 10.1104 12.83 9.11558 12.3127 8.45053L10.2146 6.12924C9.66012 5.41637 8.78292 5.1462 8.14296 5.78616L6.46729 7.46182C4.53739 9.39173 6.87584 14.2574 10.0307 17.4122C13.1854 20.5669 17.9589 22.8127 19.8885 20.883L21.5642 19.2074C22.2037 18.5678 22.0423 17.7425 21.3285 17.1873L18.8998 15.0376C18.2357 14.5211 17.2401 14.584 16.6438 15.1803Z" fill="#243286" />
                                        </svg>
                                        ` + phone + `
                                    </a>
                                    <a class="d-block mt-2 contact-mail" href="mailto:` + mail + `">
                                        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                            <path d="M13.5 27C20.9587 27 27 20.9587 27 13.5C27 6.04125 20.9587 0 13.5 0C6.04125 0 0 6.04125 0 13.5C0 20.9587 6.04125 27 13.5 27ZM5.29875 8.60625L11.4413 13.5L5.29875 18.3938V8.60625ZM21.7013 18.3938L15.5588 13.5L21.6675 8.60625V18.3938H21.7013ZM5.3325 19.5413L12.15 14.0738L13.5 15.1538L14.85 14.0738L21.6675 19.5413H5.3325ZM21.6675 7.45875L13.5 14.0063L5.3325 7.45875H21.6675Z" fill="#243286" />
                                        </svg>
                                        ` + mail + `
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