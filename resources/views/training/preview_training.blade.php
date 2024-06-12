@extends('layouts.theme_admin')

@section('content')

<style>
    .phone-frame {
        min-width: 375px;
        min-height: 783px;
        max-width: 375px;
        max-height: 783px;
        border-radius: 40px;
        border: 8px #000 solid;
        overflow: hidden;
    }

    .frame-top {
        display: flex;
        background-color: #cbcbcb;
        border-radius: 32px 32px 0 0;
    }

    .phone-camera {
        background-color: #000;
        border-radius: 0 0 15px 15px;
        width: 100%;
        height: 30px;
        position: relative;
        display: block;
    }

    .time {
        font-size: 16px;
    }

    .phone-website {
        width: 100%;
        padding: 10px;
        background-color: #cbcbcb;

    }

    .azayagencyjourney {
        display: flex;
        justify-content: center;
        padding: 8px;
        background-color: #9799a0;
        border-radius: 8px;
        position: relative;
    }

    .icon-reload {
        position: absolute;
        top: 55%;
        right: 5px;
        transform: translate(-50%, -50%);
    }

    .content-training {
        width: 100%;
        height: calc(100% - 233px);
        overflow: auto;
    }

    .content-training::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .content-training {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .frame-bottom {
        background-color: #cbcbcb;
        width: 100%;
        display: block;
    }

    .icon-bottom {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
        padding: 10px;
    }

    .icon-bottom .active {
        color: #569de8;

    }

    .tabs-phone {
        margin: 5px 0;
        height: 5px;
        width: 40%;
        background-color: #000;
        border-radius: 20px;
    }

    .navbar-top {
        padding: 5px;
        box-shadow: 0 0.125rem 0.25rem rgb(136 152 170 / 15%);

    }
</style>
<div class="container-fluid">

    <div class="d-flex">
        <div class="phone-frame">
            <div class="frame-top">
                <div class="text-dark px-4 time d-flex align-items-center">{{ date('H:i') }}</div>
                <div class="w-100 phone-camera d-flex align-items-center"> &nbsp;</div>
                <div class="px-2 d-flex align-items-center">
                    <i class="text-dark mx-1 fa-solid fa-signal-bars"></i>
                    <i class="text-dark mx-1 fa-solid fa-wifi"></i>
                    <i class="text-dark mx-1 fa-solid fa-battery-three-quarters"></i>
                </div>
            </div>
            <div class="phone-website">
                <div class="azayagencyjourney">
                    <i class="fa-solid fa-lock me-2 text-dark"></i>
                    <span class="text-dark">https://azayagencyjourney.com</span>

                    <div class="icon-reload">
                        <i class="text-dark fa-solid fa-rotate-right"></i>
                    </div>
                </div>
            </div>
            <div class="navbar-top w-100">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center ">
                        <img src="{{url('/img/logo/Logo Main.png')}}" style="width:29px;height:27px">
                        <div class="ms-2 ">
                            <p class="m-0 " style="font-size: 10px;">AGENCY JOURNEY</p>
                            <p class="m-0" style="font-size: 4px;">ALLIANZ ON BOARDING</p>
                        </div>

                    </div>
                    <div class="d-flex align-items-center">
                        <ul class="d-flex align-items-center p-0 m-0">
                            <div id="li_search_theme_user" class="nav-item mobile-search-icon d-flex align-items-center mx-2">
                                <a class="" href="#">
                                    <i class="fa-solid fa-magnifying-glass text-color-obd"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a class=" dropdown-toggle-nocaret d-flex align-items-center" href="#">
                                    <i class="fa-regular fa-bookmark text-color-obd"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a class=" dropdown-toggle-nocaret position-relative d-flex align-items-center" href="#">
                                    <i class="fa-regular fa-calendar text-color-obd"></i>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a class=" dropdown-toggle-nocaret position-relative d-flex align-items-center" href="#">
                                    <i class="fa-regular fa-bell text-color-obd"></i>
                                </a>
                            </div>
                        </ul>
                    </div>
                </div>
                <div>

                </div>
            </div>

            <div class="content-training">
                <style>
                    @media screen and (max-width: 500px) {

                        .conteiner-detail-training,
                        .conteiner-detail-training .row div {
                            padding: 0;

                        }
                    }

                    @media only screen and (max-width: 767px) {
                        .title-training {
                            padding-left: 24px;
                        }

                        .btn-share-group {
                            padding: 24px;
                        }
                    }


                    @media screen and (min-width: 767px) {
                        .btn-share-group {
                            padding: 24px 0 24px 0;
                        }
                    }

                    .btn-back-all-course {
                        height: 24px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background-color: rgb(255, 255, 255, .80);
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        padding-left: 0;
                        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        color: #003781;
                        position: absolute;
                        top: 10px;
                        left: 10px;
                        font-size: 8px;
                    }

                    .btn-back-all-course:hover {
                        color: #003781;
                    }

                    .btn-back-all-course span {
                        margin-left: 10px;
                        font-weight: bold;
                    }

                    .btn-back-all-course i {
                        width: 24px;
                        height: 24px;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        background-color: rgb(255, 255, 255, .80);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                    }

                    .btn-bookmark-training.active svg .bookmark-bg {
                        fill: #EDB529;
                    }

                    .btn-bookmark-training.active svg .bookmark-icon {
                        fill: #FBFBFB;
                    }

                    .btn-like {
                        background-color: #B8C6D8;
                        width: 70px;
                        color: #fff;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        display: flex;
                        align-items: center;
                        transition: all .15s ease-in-out;
                    }

                    .btn-like .icon-btn i {
                        color: #B8C6D8;
                    }

                    .btn-like.active {
                        background-color: #4B90E2;
                    }

                    .btn-like.active .icon-btn i {
                        color: #4B90E2;
                    }

                    .btn-like:hover,
                    .btn-dislike:hover,
                    .btn-share:hover {
                        color: #fff;

                    }

                    .btn-dislike {
                        background-color: #E6E6E6;
                        width: 70px;
                        color: #fff;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: all .15s ease-in-out;
                    }

                    .btn-dislike .icon-btn i {
                        color: #E6E6E6;
                    }

                    .btn-dislike.active {
                        background-color: #EA0505;
                    }

                    .btn-dislike.active .icon-btn i {
                        color: #EA0505;

                    }

                    .btn-share {
                        background-color: #203881;
                        width: 70px;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: #fff;
                    }

                    .icon-btn {
                        min-width: 22px;
                        min-height: 22px;
                        max-width: 22px;
                        max-height: 22px;
                        background-color: #fff;
                        border-radius: 50%;
                        -webkit-border-radius: 50%;
                        -moz-border-radius: 50%;
                        -ms-border-radius: 50%;
                        -o-border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .icon-btn i {
                        font-size: 14px;
                        margin: 0;
                    }
                </style>
                <div class="container conteiner-detail-training">
                    <div class="row">
                        <div class="col-12 p-0" style="position: relative;">
                            <button class="btn btn-back-all-course">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span>กลับหน้ารวมหลักสูตร</span>
                            </button>

                            <img src="{{ url('/img/icon/ad2.png') }}" alt="" style="width: 100%;">
                            
                            <div class="px-4 d-flex justify-content-between">

                                <div class="w-100 d-flex btn-share-group">
                                    <button class="btn btn-like  me-1" onclick="action_btnlike_dislike(this.className)">
                                        <div class="icon-btn d-flex">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </div>
                                        <div class="d-flex align-items-center ms-1">25</div>

                                    </button>
                                    <button class="btn btn-dislike me-1" onclick="action_btnlike_dislike(this.className)">
                                        <div class="icon-btn">
                                            <i class="fa-solid fa-thumbs-down"></i>
                                        </div>
                                    </button>
                                    <button class="btn btn-share me-1">
                                        <i class="fa-solid fa-share m-0"></i>
                                    </button>
                                </div>
                                <div class=" px-2 py-0 d-flex align-items-start btn-bookmark-training cursor-pointer" onclick="action_btnlike_dislike(this.className)">
                                    <svg width="33" height="42" viewBox="0 0 33 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="bookmark-bg" d="M31.3077 0H1C0.447715 0 0 0.447716 0 1V40.3889C0 41.1306 0.779123 41.6141 1.44379 41.285L15.71 34.2198C15.9897 34.0813 16.318 34.0813 16.5976 34.2198L30.8639 41.285C31.5286 41.6141 32.3077 41.1306 32.3077 40.3889V1C32.3077 0.447715 31.86 0 31.3077 0Z" fill="#CDCDCD" />
                                        <path class="bookmark-icon" d="M12.8462 13.4417L7.21748 14.2246L7.11779 14.2441C6.96687 14.2825 6.82929 14.3587 6.7191 14.4648C6.6089 14.571 6.53004 14.7033 6.49057 14.8482C6.4511 14.9931 6.45243 15.1455 6.49442 15.2898C6.53642 15.4341 6.61757 15.5651 6.7296 15.6695L10.8073 19.4775L9.84567 24.8564L9.8342 24.9495C9.82496 25.0993 9.85737 25.2487 9.92811 25.3825C9.99885 25.5163 10.1054 25.6296 10.2368 25.7109C10.3682 25.7922 10.5198 25.8385 10.676 25.8451C10.8322 25.8518 10.9874 25.8184 11.1258 25.7486L16.1598 23.2093L21.1824 25.7486L21.2707 25.7875C21.4163 25.8425 21.5745 25.8594 21.7292 25.8364C21.8839 25.8134 22.0294 25.7513 22.1508 25.6565C22.2722 25.5618 22.3651 25.4377 22.4201 25.2971C22.475 25.1565 22.49 25.0044 22.4634 24.8564L21.5009 19.4775L25.5804 15.6686L25.6492 15.5967C25.7475 15.4805 25.812 15.3414 25.836 15.1936C25.86 15.0458 25.8428 14.8945 25.786 14.7551C25.7293 14.6157 25.635 14.4933 25.5129 14.4003C25.3907 14.3072 25.2451 14.2469 25.0907 14.2255L19.4621 13.4417L16.9459 8.54942C16.8731 8.40768 16.7604 8.28832 16.6205 8.20485C16.4807 8.12138 16.3193 8.07715 16.1546 8.07715C15.9898 8.07715 15.8284 8.12138 15.6886 8.20485C15.5487 8.28832 15.436 8.40768 15.3632 8.54942L12.8462 13.4417Z" fill="#FBFBFB" />
                                    </svg>
                                </div>
                            </div>
                            <div class="title-training px-4">
                                <div>
                                    <p class="mb-2" style="color: #003781;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">หลักสูตรการพัฒนาทักษะการขายเชิงกลยุทธ์ 505</p>
                                </div>
                                <div class="hastag-training">
                                    <span>#หลักสูตร Unit Links</span>
                                </div>
                                <div class="rating-training mt-2">
                                    <span style="color: #EDB529;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;margin-right: 5px;">4.5</span>
                                    <i data-star="4.5" class="star-rating"></i>
                                </div>
                            </div>
                        </div>
                        <style>
                            .hastag-training {
                                display: flex;
                                flex-wrap: wrap;
                                gap: 5px;
                            }

                            .hastag-training span {
                                border: #0E2B81 1px solid;
                                padding: 0 10px;
                                color: #0E2B81;
                                font-size: 9px;
                                font-style: normal;
                                font-weight: 300;
                                line-height: normal;
                                border-radius: 50px;
                                -webkit-border-radius: 50px;
                                -moz-border-radius: 50px;
                                -ms-border-radius: 50px;
                                -o-border-radius: 50px;
                            }



                            .star-rating {
                                text-align: left;
                                font-style: normal;
                                display: inline-block;
                                position: relative;
                                unicode-bidi: bidi-override;
                            }

                            .star-rating::before {
                                display: block;
                                content: '★★★★★';
                                color: #fff;
                                -webkit-text-stroke-width: .5px;
                                -webkit-text-stroke-color: #EDB529;
                            }

                            .star-rating::after {
                                white-space: nowrap;
                                position: absolute;
                                top: 0;
                                left: 0;
                                content: '★★★★★';
                                color: #EDB529;
                                overflow: hidden;
                                height: 100%;
                            }

                            .star-rating::after {
                                width: var(--rating-width);
                            }

                            .btn-join-meet {
                                color: #fff;
                                background-color: #003781;
                                border-radius: 25px;
                                -webkit-border-radius: 25px;
                                -moz-border-radius: 25px;
                                -ms-border-radius: 25px;
                                -o-border-radius: 25px;
                                font-size: 14px;
                                font-style: normal;
                                font-weight: 600;
                                line-height: normal;
                            }
                        </style>
                        <div class="col-12 px-4 mb-5">


                            <!-- if ถ้ามีเวลาเข้าร่วม -->
                            <div class="d-flex my-2">
                                <i class="fa-light fa-calendar-days me-2" style="color: #0E2B81;font-size:18px"></i> <span style="color: #0E2B81;font-size: 12px;font-style: normal;font-weight: 600;line-height: normal;">Friday 19 April 2024 10:30 - 12:30 น. </span>
                            </div>
                            <!-- endif -->

                            <!-- if ถ้ามีลิงค์เข้าร่วมสอบ -->
                            <button class="btn w-100 btn-join-meet my-2">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23 0H3.19412V3.19419H4.47192V1.27768H21.7222V15.9709H8.05806V17.2486H23V0ZM3.83302 8.30489C3.32468 8.30489 2.83716 8.10297 2.47771 7.74356C2.11826 7.38414 1.91632 6.89667 1.91632 6.38838C1.91632 5.88008 2.11826 5.39261 2.47771 5.0332C2.83716 4.67378 3.32468 4.47186 3.83302 4.47186C4.34136 4.47186 4.82887 4.67378 5.18833 5.0332C5.54778 5.39261 5.74972 5.88008 5.74972 6.38838C5.74972 6.89667 5.54778 7.38414 5.18833 7.74356C4.82887 8.10297 4.34136 8.30489 3.83302 8.30489ZM2.53541 9.58895C1.70548 9.58895 1.04869 9.96203 0.618715 10.5383C0.216846 11.0781 0.0468979 11.7457 0.008564 12.3621C-0.028986 12.9945 0.057169 13.6282 0.262207 14.2276C0.453876 14.7833 0.7778 15.3583 1.27742 15.7525V22.0399C1.27696 22.2807 1.36715 22.5128 1.53005 22.6901C1.69296 22.8674 1.91664 22.9768 2.1566 22.9967C2.39657 23.0166 2.63522 22.9454 2.8251 22.7974C3.01497 22.6493 3.14215 22.4352 3.18134 22.1977L4.00552 17.2486H4.19591L5.12743 22.2162C5.17166 22.4507 5.30177 22.6602 5.49232 22.8038C5.68286 22.9474 5.92013 23.0148 6.15772 22.9927C6.39531 22.9707 6.61613 22.8608 6.77699 22.6846C6.93785 22.5084 7.02719 22.2785 7.02751 22.0399V12.9256C7.15528 13.1202 7.28136 13.3159 7.40574 13.5127L7.45558 13.5913L7.46836 13.6117L7.47155 13.6175C7.55766 13.7557 7.67758 13.8697 7.82 13.9487C7.96242 14.0278 8.12263 14.0692 8.28551 14.0691H11.48C11.7342 14.0691 11.9779 13.9682 12.1577 13.7885C12.3374 13.6087 12.4384 13.365 12.4384 13.1109C12.4384 12.8567 12.3374 12.613 12.1577 12.4333C11.9779 12.2536 11.7342 12.1526 11.48 12.1526H8.81132C8.65607 11.9124 8.45162 11.6007 8.23695 11.2876C8.01334 10.9612 7.76672 10.6156 7.54694 10.3447C7.44024 10.2125 7.32077 10.0745 7.20066 9.96139C7.14188 9.90582 7.0601 9.83363 6.96043 9.76974C6.78454 9.6543 6.5792 9.59177 6.36881 9.58959L2.53541 9.58895Z" fill="white" />
                                </svg>
                                <!-- if ตารางสอบ -->
                                เข้าร่วมสอบ
                                <!--  else-->
                                <!-- เข้าร่วมอบรม -->
                                <!-- endif -->
                            </button>
                            <!-- endif -->

                            <!-- if ถ้ามี รายละเอียดการเข้าอบรม -->
                            <div class="my-3">
                                <p style="color: #003781;font-size: 15px;font-style: normal;font-weight: 600;line-height: normal;">รายละเอียดการเข้าอบรม</p>
                                <div class="d-flex ">
                                    <i class="fa-light fa-location-dot me-2"></i>
                                    <div>
                                        <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum magni reprehenderit, itaqu</p>
                                        <a href="https://www.google.com/maps/dir//test" id="link-to-copy" style="color: #0872FF;font-size: 10px;font-style: normal;font-weight: 600;line-height: normal;text-decoration-line: underline;">https://www.google.com/maps/dir//test</a>
                                        <i style="color: #9E9E9E;" class="fa-regular fa-copy mx-2" onclick="copyLink()"></i>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                            <!-- endif -->
                            <div class="detail-training">
                                <p class="mt-2">
                                    การพัฒนาทักษะการขาย (Selling Skill) ให้กับนักขายมืออาชีพขั้นสูง จะช่วยทำให้พนักงานมีความมั่นใจในการขายสินค้าและบริการของตัวเองเพิ่มมากขึ้น เช่น.....     - การนำเสนอขายด้วยเครื่องมือในรูปแบบต่างๆ     - การเจรจาต่อรองอย่างเหนือชั้น     - การปิดการขายให้ลูกค้าเห็นคุณค่าด้วยตัวเอง การเรียนรู้ในรูปแบบ Blended Learning เชิงปฏิบัติการจริง ด้วยการฝึกฝนทักษะต่างๆ ด้วยตัวเอง ทำให้ผู้เรียน ได้ปรับปรุง แก้ไข แนวทางและเทคนิคการขายของตัวเองได้ทันที     - VDO (Self-Learning)     - Practices in Classroom     - Show & Share ซึ่งกันและกัน
                                    รายละเอียดของหลักสูตรฝึกอบรมหลักการขายเชิงกลยุทธ์ (Strategic Selling) สนุกกับ คำสำคัญ ของงานขาย หัวใจสำคัญของการขายให้โดนใจ ทักษะพื้นฐานของการขาย คุณสมบัติของนักขายมืออาชีพ กิจกรรม: กำหนดแนวทางการขายเชิงกลยุทธ์ด้วย Canvasเทคนิคการนำเสนอด้วยเครื่องมือในรูปแบบต่างๆ (Presentation) การนำเสนอให้สอดคล้องคุณลักษณะของบุคคล (DISC) การนำเสนอด้วย Presentation Tools Kit การนำเสนอในรูปแบบ Pitching & Storytelling Role Playing: การฝึกฝนเทคนิคการนำเสนอให้โดนใจ เทคนิคการเจรจาต่อรองอย่างเหนือชั้น (Negotiation) หลักการเจรจาต่อรองอย่างมีคุณภาพ การกำหนดจุดประสงค์ให้ชัดเจน การประเมินทางเลือกของการเจรจา (BATNA) การบริหารจัดการให้การเจรจามีคุณภาพ (ZOPA) การเตรียมความพร้อมก่อนการเจรจาต่อรอง Role Playing: การฝึกฝนเทคนิคการเจรจาต่อรองอย่างสร้างสรรค์เทคนิคการปิดการขายให้ลูกค้าเห็นคุณค่า (Value Proposition)  
                                </p>
                                <div class="d-flex justify-content-end w-100" style="color: #989898;">
                                    <i class="fa-regular fa-clock me-2"></i>
                                    <span id="">30 นาที</span>
                                </div>

                                <div class="d-flex justify-content-center w-100 mt-3">
                                    <video src="https://www.franchisebuilder2024.com/video/The%20Franchise%20Builder_Final.mp4" controls loop muted style="width:100%;border-radius: 10px; max-width: 700px;" class="video-preview"></video>
                                </div>

                                <div class="w-100 mt-3">
                                    <p class="mb-0" style="color: #989898;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;">ถูกใจหลักสูตรนี้?</p>

                                    <div class="d-flex justify-content-end ">
                                        <button class="btn btn-like  me-1" onclick="action_btnlike_dislike(this.className)">
                                            <div class="icon-btn d-flex">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </div>
                                            <div class="d-flex align-items-center ms-1">25</div>

                                        </button>
                                        <button class="btn btn-dislike me-1" onclick="action_btnlike_dislike(this.className)">
                                            <div class="icon-btn">
                                                <i class="fa-solid fa-thumbs-down"></i>
                                            </div>
                                        </button>
                                        <button class="btn btn-share me-1">
                                            <i class="fa-solid fa-share m-0"></i>
                                        </button>

                                        <div class=" px-2 py-0 d-flex align-items-start btn-bookmark-training cursor-pointer" onclick="action_btnlike_dislike(this.className)">
                                            <svg width="33" height="42" viewBox="0 0 33 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path class="bookmark-bg" d="M31.3077 0H1C0.447715 0 0 0.447716 0 1V40.3889C0 41.1306 0.779123 41.6141 1.44379 41.285L15.71 34.2198C15.9897 34.0813 16.318 34.0813 16.5976 34.2198L30.8639 41.285C31.5286 41.6141 32.3077 41.1306 32.3077 40.3889V1C32.3077 0.447715 31.86 0 31.3077 0Z" fill="#CDCDCD" />
                                                <path class="bookmark-icon" d="M12.8462 13.4417L7.21748 14.2246L7.11779 14.2441C6.96687 14.2825 6.82929 14.3587 6.7191 14.4648C6.6089 14.571 6.53004 14.7033 6.49057 14.8482C6.4511 14.9931 6.45243 15.1455 6.49442 15.2898C6.53642 15.4341 6.61757 15.5651 6.7296 15.6695L10.8073 19.4775L9.84567 24.8564L9.8342 24.9495C9.82496 25.0993 9.85737 25.2487 9.92811 25.3825C9.99885 25.5163 10.1054 25.6296 10.2368 25.7109C10.3682 25.7922 10.5198 25.8385 10.676 25.8451C10.8322 25.8518 10.9874 25.8184 11.1258 25.7486L16.1598 23.2093L21.1824 25.7486L21.2707 25.7875C21.4163 25.8425 21.5745 25.8594 21.7292 25.8364C21.8839 25.8134 22.0294 25.7513 22.1508 25.6565C22.2722 25.5618 22.3651 25.4377 22.4201 25.2971C22.475 25.1565 22.49 25.0044 22.4634 24.8564L21.5009 19.4775L25.5804 15.6686L25.6492 15.5967C25.7475 15.4805 25.812 15.3414 25.836 15.1936C25.86 15.0458 25.8428 14.8945 25.786 14.7551C25.7293 14.6157 25.635 14.4933 25.5129 14.4003C25.3907 14.3072 25.2451 14.2469 25.0907 14.2255L19.4621 13.4417L16.9459 8.54942C16.8731 8.40768 16.7604 8.28832 16.6205 8.20485C16.4807 8.12138 16.3193 8.07715 16.1546 8.07715C15.9898 8.07715 15.8284 8.12138 15.6886 8.20485C15.5487 8.28832 15.436 8.40768 15.3632 8.54942L12.8462 13.4417Z" fill="#FBFBFB" />
                                            </svg>
                                        </div>

                                    </div>
                                    <div class="mt-5">
                                        <a href="">
                                            <i class="fa-solid fa-chevron-left"></i> กลับหน้ารวมหลักสูตร
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

            </div>

            <style>
                .div-navbar-botttom {
                    border-top: 3px solid #616161;

                }

                .div-navbar-botttom .col-navbar a {
                    color: #616161 !important;

                }

                .div-navbar-botttom .col-navbar i {
                    font-size: 15px;
                }

                .div-navbar-botttom .col-navbar p {
                    color: #616161 !important;
                    font-size: 8px;
                    text-overflow: unset;
                    color: #fff;
                    filter: none;
                    font-weight: bolder;
                }

                .navbar-bottom-active {
                    background-color: rgb(0, 55, 129, .20) !important;
                    color: rgb(0, 55, 129) !important;
                    border-radius: 10px;
                    -webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    -ms-border-radius: 10px;
                    -o-border-radius: 10px;
                    max-width: 100px;
                    min-width: 50px;
                }

                .navbar-bottom-active * {
                    color: rgb(0, 55, 129) !important;
                }
            </style>
            <div id="navbar-botttom" class="container" style="z-index: 99998;">
                <div class="row justify-content-center mx-2 div-navbar-botttom">
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center ">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2 navbar-bottom-active" id="menu_theme_user_Training">
                            <a href="http://localhost/Onboarding_Project/public/page_training">
                                <i class="fa-regular fa-graduation-cap fa-flip-horizontal"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    Training
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_Product">
                            <a href="http://localhost/Onboarding_Project/public/product" class="">
                                <i class="fa-regular fa-clipboard-list"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    Product
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_Home">
                            <a href="http://localhost/Onboarding_Project/public/home">
                                <i class="fa-regular fa-house"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    Home
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_News">
                            <a href="http://localhost/Onboarding_Project/public/news">
                                <i class="fa-regular fa-newspaper"></i>
                                <p class="text-truncate mt-1 mb-0">
                                    News
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
                        <div class="mt-1 mx-2 pt-2 pb-1 mb-2" id="menu_theme_user_Career_Path">
                            <a href="http://localhost/Onboarding_Project/public/career_paths">
                                <i class="fa-regular fa-wrench-simple fa-rotate-by" style="--fa-rotate-angle: 320deg;"></i>
                                <p class=" text-truncate mt-1 mb-0">
                                    Career Path
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frame-bottom">
                <div class="w-100 icon-bottom">
                    <i class="fa-solid fa-chevron-left"></i>
                    <i class="fa-solid fa-chevron-right"></i>
                    <i class="active fa-sharp fa-light fa-arrow-up-from-square"></i>
                    <i class="active fa-light fa-book-open"></i>
                    <i class="active fa-sharp fa-light fa-clone"></i>
                </div>
                <div class="w-100 d-flex justify-content-center">
                    <span class="tabs-phone"></span>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection