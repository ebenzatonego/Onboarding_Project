@extends('layouts.theme_user')
<style>
    .card {
        border-radius: 15px !important;
    }

    .list-group-item i {
        font-size: 24px;
        margin-right: 8px;
        width: 27px;
        text-align: center;
    }

    .btn-edit-img {
        position: absolute;
        bottom: 0;
        right: 0;
        padding: 0;
        margin: 0;
    }

    .img-profile-user {
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    }

    .card-profile {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #F0F5FF;
        background-clip: border-box;
        border-radius: .8rem;
        margin-bottom: 1.5rem;
    }

    .alert-license-expire {
        position: absolute;
        background-color: #EA0505;
        color: #fff;
        font-size: 9.81px;
        padding: 5px 8px;
        border-radius: 50px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
        display: flex;
        align-items: center;
        /* width: 50px; */
        bottom: -12px;

    }



    .progress-traing {
        display: flex;
        overflow: hidden;
        line-height: 0;
        font-size: 0.675rem;
        background-color: #B8C6D8 !important;
        border-radius: 0.25rem;
        height: 10px;
        min-width: calc(100% / 8);
        max-width: calc(100% / 8);
    }

    .progress-bar-traing {
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: hidden;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        background-color: #3490dc;
        transition: width 0.6s ease;
    }

    @media (prefers-reduced-motion: reduce) {
        .progress-bar-traing {
            transition: none;
        }
    }

    .bg-obd {
        background-color: #003781 !important;
    }

    .sw {
        position: relative;
    }

    .sw-theme-dots>.nav {
        position: relative;
        margin-bottom: 10px;
    }

    .sw>.nav {
        display: -webkit-box;
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        padding-left: 0;
        margin-top: 0;
        margin-bottom: 0;
    }

    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    /* .sw-theme-dots>.nav>.nav-item::before {
    content: " ";
    position: absolute;
    top: 18px;
    left: 0;
    width: 100%;
    height: 5px;
    background-color: #eee;
    border-radius: 3px;
    z-index: 1;
} */
    .sw-theme-dots>.nav>.nav-item {
        position: relative;
    }

    .sw-theme-dots .nav .nav-item::before {
        content: " ";
        position: absolute;
        top: 23px;
        right: -56%;
        width: 110%;
        height: 2px;
        border-radius: 3px;
        z-index: 1;
    }

    .sw-theme-dots>.nav .nav-link.active::after {
        background-color: #0d6efd !important;
    }

    .sw.sw-justified>.nav .nav-link,
    .sw.sw-justified>.nav>li {
        flex-basis: 0;
        -webkit-box-flex: 1;
        flex-grow: 1;
        text-align: center;
    }

    li {
        display: list-item;
        text-align: -webkit-match-parent;
        unicode-bidi: isolate;
    }



    .sw-theme-dots>.nav .nav-link.inactive {
        color: #999;
        cursor: not-allowed;
    }

    .sw-theme-dots>.nav .nav-link {
        position: relative;
        margin-top: 20px;
    }

    .sw-theme-dots>.nav .nav-link::before {
        content: " ";
        position: absolute;
        display: block;
        top: -5px;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        border: none;
        color: #428bca;
        text-decoration: none;
        z-index: 98;
    }

    .owl-item:nth-child(1) .nav-link.active::before {
        background: #4183B2 !important;
    }


    .owl-item:nth-child(1) .nav-link.active {
        color: #4183B2 !important;
        cursor: pointer;
    }

    .owl-item:nth-child(1) .nav-item::before {
        background-color: #4183B2;

    }

    .owl-item:nth-child(1) .nav-item.active::before {
        background-color: #4183B2;

    }

    .nav-item.level-now::before {
        background: #f5f5f5 !important;
    }

    .owl-item .nav-item:not(.level-now):before {
        background-color: #CED4E0;

    }

    .owl-item .nav-item.active::before {
        background-color: #56B3F7;

    }

    .owl-item .nav-item.active::before {
        background-color: #56B3F7;

    }

    .owl-item .nav-link.active::before {
        background: #56B3F7;
    }

    .owl-item .nav-link.active {
        color: #56B3F7 !important;
        cursor: pointer;
    }


    .nav-link.inactive::before {
        background: #f5f5f5;
    }

    .owl-item,
    .owl-stage-outer {
        padding-top: 5px;
    }

    .owl-item:nth-child(2) {
        margin-top: -1px;
        border: #A1A1A1 solid 1px;
        border-right: none !important;
        border-radius: 10px 0 0 10px;
        -webkit-border-radius: 10px 0 0 10px;
        -moz-border-radius: 10px 0 0 10px;
        -ms-border-radius: 10px 0 0 10px;
        -o-border-radius: 10px 0 0 10px;
    }

    .owl-item:nth-child(3) {
        margin-top: -1px;
        border: #A1A1A1 solid 1px !important;
        border-right: none !important;
        border-left: none !important;

    }

    .owl-item:nth-child(4) {
        margin-top: -1px;
        border: #A1A1A1 solid 1px !important;
        border-right: none !important;
        border-left: none !important;
    }

    .owl-item:nth-child(5) {
        margin-top: -1px;
        border: #A1A1A1 solid 1px !important;
        border-left: none !important;
        border-radius: 0 10px 10px 0;
        -webkit-border-radius: 0 10px 10px 0;
        -moz-border-radius: 0 10px 10px 0;
        -ms-border-radius: 0 10px 10px 0;
        -o-border-radius: 0 10px 10px 0;
    }

    .title-level {
        font-size: 9px;
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots .owl-dot:hover span {
        background: #4B90E2 !important;
    }

    .modal-profile {
        background-color: #3D467F !important;
        margin: 0 20px;
        border-radius: 10px !important;
        -webkit-border-radius: 10px !important;
        -moz-border-radius: 10px !important;
        -ms-border-radius: 10px !important;
        -o-border-radius: 10px !important;
        padding: 40px 0;
    }

    .btn-detail-profile {
        position: absolute;
        top: 0px;
        right: 0;
        font-size: 21px;

    }

    .btn-detail-profile:hover {
        cursor: pointer;
    }
</style>
@section('content')
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4 p-0 p-lg-3">
                <div class="card-profile">
                    <div class="card-body">
                        <div class="d-flex align-items-center position-relative">
                            <div style="position: relative;">
                                @if( empty(Auth::user()->photo) )
                                    <img src="{{ url('/img/icon/profile.png') }}" alt="profile user" class="rounded-circle p-1 img-profile-user" width="85" height="85">
                                @else
                                    <img src="{{ Auth::user()->photo }}" alt="profile user" class="rounded-circle p-1 img-profile-user" width="85" height="85">
                                @endif
                                <button class="btn-edit-img btn p-0" data-toggle="modal" data-target="#editProfile">
                                    <img src="{{ url('/img/icon/edit-img.png') }}" width="29" height="29">
                                </button>

                            </div>
                            <div class="ms-2">
                                <P style="font-size: 16px; font-weight: bold;margin-bottom: 10px;">
                                    {{ Auth::user()->name }}
                                </P>
                                <P style="font-size: 12px; font-weight: bold;color: #383838;margin: 0;">
                                    รหัสตัวแทน : {{ Auth::user()->account }}
                                </P>
                                <P style="font-size: 12px; font-weight: bold;color: #383838;margin: 0;">
                                    ตำแหน่ง : {{ Auth::user()->position }}
                                </P>
                                <P style="font-size: 12px; font-weight: bold;color: #383838;margin: 0;">
                                    ชื่อหน่วยงาน/AO : {{ Auth::user()->organization_name }}
                                </P>

                                <!-- @if(Auth::user()->role == "Super-admin" || Auth::user()->role == "Admin")
                                <a href="{{ url('/welcome_admin') }}" style="width:70%;" class="btn btn-sm btn-danger mt-2">
                                    For Admin
                                </a>
                                @endif   -->
                                <a class=" btn-detail-profile" data-toggle="modal" data-target="#modal_show_all_detail">
                                    <i class="fa-light fa-circle-exclamation"></i>
                                </a>

                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-8">
                                <p class="m-0">
                                    <span style="font-size: 10;font-weight: bolder;color: #373737;">เลขที่ใบอนุญาต : </span>
                                    <span style="font-size: 10;font-weight: bolder;color: #0E2B81;">{{ Auth::user()->license }}</span>
                                </p>
                                <p class="m-0">
                                    <span style="font-size: 10;font-weight: bolder;color: #373737;">วันที่เริ่มต้น : </span>
                                    <span style="font-size: 10;font-weight: bolder;color: #0E2B81;">{{ thaidate("j M Y" , strtotime(Auth::user()->license_start)) }} </span>
                                </p>
                                <p class="m-0">
                                    <span style="font-size: 10;font-weight: bolder;color: #373737;">วันที่หมดอายุ : </span>
                                    <span style="font-size: 10;font-weight: bolder;color: #0E2B81;">{{ thaidate("j M Y" , strtotime(Auth::user()->license_expire)) }} </span>

                                </p>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-end">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: #999999;font-size: 10px;">
                                    <u>ออกจากระบบ</u>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="alert-license-expire">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            <span class="ms-1">หมดอายุภายใน <span id="">90</span> วัน</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 p-0 p-lg-3">
                <div class="card-profile p-3">
                    <div class="card-body ">
                        <div class="header-my-goal d-flex">
                            <i class="fa-solid fa-bullseye-arrow text-color-obd"></i>
                            <p class="text-color-obd ms-2">My Goal</p>
                        </div>
                        <div class="body-my-goal">
                            <!-- MY GOAL QUESTIONAIRE -->

                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn-more-job px-5" data-toggle="modal" data-target="#modal_my_goal">
                                    ดูเส้นทางอาชีพเพิ่มเติม
                                </button>
                            </div>


                            @include ('profile.my_goal_questionaire')


                            <div class="header-my-goal d-flex align-items-center my-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                                    <path d="M13.4561 5.7015C13.4561 6.58312 14.5929 8.69437 15.2425 9.83119C15.4513 10.1792 15.9385 10.1792 16.1473 9.83119C16.7969 8.69437 17.9338 6.60632 17.9338 5.7015C17.9338 4.47187 16.9361 3.45105 15.6833 3.45105C14.4769 3.47425 13.4561 4.47187 13.4561 5.7015ZM15.7065 4.65748C16.2865 4.65748 16.7505 5.12149 16.7505 5.7015C16.7505 6.28151 16.2865 6.74552 15.7065 6.74552C15.1265 6.74552 14.6625 6.28151 14.6625 5.7015C14.6625 5.12149 15.1265 4.65748 15.7065 4.65748Z" fill="#003781" />
                                    <path d="M15.9155 11.1073H11.7626C11.2058 11.1073 10.7418 10.6433 10.7418 10.0865C10.7418 9.52971 11.2058 9.0657 11.7626 9.0657H12.8995C13.1547 9.0657 13.3403 8.8569 13.3403 8.62489C13.3403 8.36969 13.1315 8.18408 12.8995 8.18408H11.7626C10.6954 8.18408 9.83698 9.0425 9.83698 10.1097C9.83698 11.1769 10.6954 12.0354 11.7626 12.0354H15.9155C16.4723 12.0354 16.9363 12.4994 16.9363 13.0562C16.9363 13.613 16.4723 14.077 15.9155 14.077H8.46815C8.21295 14.077 8.02734 14.2858 8.02734 14.5178C8.02734 14.773 8.23615 14.9586 8.46815 14.9586H15.9155C16.9827 14.9586 17.8412 14.1002 17.8412 13.033C17.8412 11.9658 16.9827 11.1073 15.9155 11.1073Z" fill="#003781" />
                                    <path d="M6.33346 8.25366C5.10383 8.25366 4.08301 9.25128 4.08301 10.5041C4.08301 11.3857 5.21983 13.497 5.86945 14.6338C6.07825 14.9818 6.56546 14.9818 6.77427 14.6338C7.42388 13.497 8.56071 11.4089 8.56071 10.5041C8.58391 9.27448 7.56308 8.25366 6.33346 8.25366ZM6.33346 11.5481C5.75344 11.5481 5.28943 11.0841 5.28943 10.5041C5.28943 9.9241 5.75344 9.46009 6.33346 9.46009C6.91347 9.46009 7.37748 9.9241 7.37748 10.5041C7.37748 11.0841 6.91347 11.5481 6.33346 11.5481Z" fill="#003781" />
                                    <path d="M21.4837 1.47903L14.5931 0.0174004C14.5003 -0.00580013 14.3843 -0.00580013 14.2915 0.0174004L7.56337 1.47903L0.835218 0.0638014C0.626414 0.0174004 0.417609 0.0638014 0.255206 0.203004C0.0928021 0.342208 0 0.527812 0 0.759817V17.6266C0 17.9514 0.232005 18.253 0.556812 18.3226L7.42416 19.7842C7.47057 19.7842 7.51697 19.8074 7.56337 19.8074C7.60977 19.8074 7.65617 19.8074 7.70257 19.7842L14.4307 18.3226L21.1589 19.7378C21.3677 19.7842 21.5765 19.7378 21.7389 19.5986C21.9013 19.4594 21.9941 19.2738 21.9941 19.0418V2.17505C22.0405 1.82704 21.8085 1.54863 21.4837 1.47903ZM20.6253 18.1834L14.5931 16.9074C14.5003 16.8842 14.3843 16.8842 14.2915 16.9074L7.56337 18.369L1.41523 17.0698V1.61824L7.44736 2.89426C7.54017 2.91746 7.65617 2.91746 7.74897 2.89426L14.4771 1.43263L20.6485 2.73186L20.6253 18.1834Z" fill="#003781" />
                                </svg>
                                <p class="text-color-obd ms-2 mb-0">Training Journey</p>

                            </div>
                            <div class="d-flex justify-content-center">
                                <img src="{{ url('/img/icon/training_path.png') }}" alt="" style="max-width: 300px; width: 100%;">
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <button class="btn-more-job px-5">
                                    ดูเส้นทางฝึกฝนเพิ่มเติม
                                </button>
                            </div>
                            <p style="font-size: 14px; font-weight: bolder;color: #000;" class="m-0 my-1">ตำแหน่งของคุณ</p>
                            <div class="nav-menu sw sw-theme-dots sw-justified" id="div_menu_view">
                                <ul class="nav d-flex justify-content-center owl-carousel owl-theme" role="group" aria-label="First group">
                                    <li class="nav-item  active">
                                        <a class="nav-link inactive active" href="#step-1">
                                            <span class="title-level">AG</span>
                                            <i class="fa-solid fa-briefcase-blank"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link inactive active" href="#step-2">
                                            <span class="title-level">UM</span>

                                            <i class="fa-solid fa-briefcase-blank"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link inactive active" href="#step-3">
                                            <span class="title-level">SUM</span>

                                            <i class="fa-solid fa-briefcase-blank"></i>
                                        </a>
                                    </li>
                                    <!-- class active ใน nav-item ไม่ต้องใส่ใน level ปัจจุบัน-->
                                    <li class="nav-item ">
                                        <p style="position: absolute;top: 45%;left: 0%;transform: translate(-50%, -50%);color: #56B3F7;font-size: 1em;-webkit-text-stroke: .3px white;font-weight: lighter;">AL</p>
                                        <a class="nav-link inactive active" href="#step-4">
                                            <span class="title-level">DM</span>

                                            <i class="fa-solid fa-briefcase-blank"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link inactive" href="#step-4">
                                            <span class="title-level">SDM</span>

                                            <i class="fa-solid fa-briefcase-blank"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inactive" href="#step-4">
                                            <span class="title-level" style="top:-15px">
                                                <i class="fa-solid fa-crown" style="color: #ffc107;"></i>
                                                <br>
                                                APV
                                            </span>

                                            <i class="fa-solid fa-briefcase-blank"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inactive" href="#step-4">
                                            <span class="title-level" style="top:-15px">
                                                <i class="fa-solid fa-crown" style="color: #ffc107;"></i>
                                                <br>
                                                VP
                                            </span>

                                            <i class="fa-solid fa-briefcase-blank"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inactive" href="#step-4">

                                            <span class="title-level" style="top:-15px">
                                                <i class="fa-solid fa-crown" style="color: #ffc107;"></i>
                                                <br>
                                                SVP
                                            </span>

                                            <i class="fa-solid fa-briefcase-blank"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inactive" href="#step-4">
                                            <span class="title-level" style="top:-15px">
                                                <i class="fa-solid fa-crown" style="color: #ffc107;"></i>
                                                <br>
                                                ESVP
                                            </span>

                                            <i class="fa-solid fa-briefcase-blank"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <style>
                                .btn-more-job {
                                    background-color: #4B90E2;
                                    color: #fff;
                                    border-radius: 50px;
                                    -webkit-border-radius: 50px;
                                    -moz-border-radius: 50px;
                                    -ms-border-radius: 50px;
                                    -o-border-radius: 50px;
                                    border: none;
                                    padding: 6px 20px;
                                    margin-bottom: -10px;
                                }

                                .img-leader {
                                    width: 55px;
                                    height: 55px;
                                    border-radius: 50%;
                                    -webkit-border-radius: 50%;
                                    -moz-border-radius: 50%;
                                    -ms-border-radius: 50%;
                                    -o-border-radius: 50%;
                                    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);
                                    -webkit-box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);
                                    -moz-box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);
                                    border: 1.5px solid #fff;
                                }
                            </style>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn-more-job px-5">
                                    ดูเส้นทางอาชีพเพิ่มเติม
                                </a>
                            </div>

                        </div>


                    </div>


                </div>

                @if(in_array(Auth::user()->role, ['Super-admin', 'Admin', 'Staff']))
                <center>
                    <a href="{{ url('/welcome_admin') }}" class="btn btn-sm btn-info mb-3" style="width:80%;">
                        For <b>{{ Auth::user()->role }}</b>
                    </a>
                </center>
                @endif

                <div class="contact-leader mb-5">
                    @if( !empty($users->account_upper_al) )
                    <p style="color: #003781;font-size: 16px;font-weight: bolder;">Upper Al</p>
                    <div class="d-flex ">
                        <div>
                            <img src="{{ url('/img/icon/profile.png') }}" alt="" class="img-leader">
                        </div>
                        <div>
                            <p class="mb-0 ms-3" style="color: #003781; font-size: 14px;font-weight: bolder;">{{ $upper_al->name }}</p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">ชื่อเล่น: <span class="text-color-obd">{{ $upper_al->nickname }}</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">รหัสตัวเเทน : <span class="text-color-obd">{{ $upper_al->account }}</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">ชื่อหน่วยงาน/AO : <span class="text-color-obd">{{ $upper_al->organization_name }}</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">โทร : <a href="tel:088-567-8901" class="text-color-obd">{{ $upper_al->phone }}</a></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">อีเมล : <a href="mailto:Apitchaya@gmail.com"><u>{{ $upper_al->emial }}</u></a></p>
                        </div>
                    </div>
                    <br>
                    @endif

                    @if( !empty($users->account_group_manager) )
                    <p style="color: #003781;font-size: 16px;font-weight: bolder;">Group Manager</p>
                    <div class="d-flex ">
                        <div>
                            <img src="{{ url('/img/icon/profile.png') }}" alt="" class="img-leader">
                        </div>
                        <div>
                            <p class="mb-0 ms-3" style="color: #003781; font-size: 14px;font-weight: bolder;">{{ $group_manager->name }}</p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">ชื่อเล่น: <span class="text-color-obd">{{ $group_manager->nickname }}</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">รหัสตัวเเทน : <span class="text-color-obd">{{ $group_manager->account }}</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">ชื่อหน่วยงาน/AO : <span class="text-color-obd">{{ $group_manager->organization_name }}</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">โทร : <a href="tel:088-567-8901" class="text-color-obd">{{ $group_manager->phone }}</a></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">อีเมล : <a href="mailto:Apitchaya@gmail.com"><u>{{ $group_manager->email }}</u></a></p>
                        </div>
                    </div>
                    <br>
                    @endif

                    @if( !empty($users->account_area_supervisor) )
                    <p style="color: #003781;font-size: 16px;font-weight: bolder;">ผู้ดูเเลพื้นที่</p>
                    <div class="d-flex ">
                        <div>
                            <img src="{{ url('/img/icon/profile.png') }}" alt="" class="img-leader">
                        </div>
                        <div>
                            <p class="mb-0 ms-3" style="color: #003781; font-size: 14px;font-weight: bolder;">{{ $area_supervisor->name }}</p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">ชื่อเล่น: <span class="text-color-obd">{{ $area_supervisor->nickname }}</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">พื้นที่ดูเเล : <span class="text-color-obd">{{ $area_supervisor->area }}</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">โทร : <a href="tel:088-567-8901" class="text-color-obd">{{ $area_supervisor->phone }}</a></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">อีเมล : <a href="mailto:Chawanan@gmail.com"><u>{{ $area_supervisor->email }}</u></a></p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #picture_profile_input {
        display: none;
    }

    .picture {
        min-width: 200px;
        min-height: 200px;
        max-width: 200px;
        max-height: 200px;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #C4C4C4;
        border: 8px solid #2e345f;
        cursor: pointer;
        transition: color 300ms ease-in-out, background 300ms ease-in-out;
        outline: none;
        overflow: hidden;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
    }

    .picture:hover {
        color: #777;
        background: #ccc;
    }

    .picture:active {

        background: #eee;
    }

    .picture:focus {
        color: #777;
        background: #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .picture__img {
        max-width: 100%;
    }

    .picture_profile_image i {
        font-size: 55px;
    }

    .btn-submit-profile {
        border-radius: 50px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
        font-weight: bolder;
    }

    .btn-submit-profile:disabled {
        background-color: #A3A3A3 !important;
        color: #57759C !important;
    }
</style>
<!-- Modal แก้ไขข้อมูลโปรไฟล์-->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-profile">
            <p class="text-white text-center mb-2">เลือกรูปของคุณ</p>
            <div class="modal-body d-flex justify-content-center">
                <label class="picture" for="picture_profile_input" tabIndex="0">
                    <span class="picture_profile_image"></span>
                </label>

                <input type="file" name="picture_profile_input" id="picture_profile_input">

            </div>
            <div class="px-5">

                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="mb-0 text-white">ชื่อ</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        <input type="text" class="form-control" value="{{Auth::user()->name}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="mb-0 text-white">ชื่อเล่น</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        <input type="text" class="form-control" value="{{Auth::user()->nickname}}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="mb-0 text-white">เบอร์โทร</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        <input type="text" class="form-control" value="{{Auth::user()->phone}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h6 class="mb-0 text-white">อีเมล</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        <input type="text" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                </div>
            </div>
            <div class="w-100 px-5 mt-5">
                <button class="btn w-100 bg-white btn-submit-profile" disabled id="btn_submit_change_profile">
                    ตกลง
                </button>

            </div>
        </div>
    </div>
</div>

<style>
    .btn-close-modal-detail {
        position: absolute;
        bottom: -100px;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 42px;
        height: 42px;
        background-color: #003781;
        color: #fff;
        border-radius: 50%;
        font-size: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .detail-profile {
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 0;
    }
</style>
<!-- Modal ข้อมูลส่วนตัวทั้งหมด-->
<div class="modal fade px-2" id="modal_show_all_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content bg-transparent" style="border: none;max-width: 396px;">
            <div id="card_profile_download" class="modal-body pt-0" style="border-radius: 10px;background: #F0F5FF;">
                <div id="card_profile_detail" class="show">
                    <div class="d-flex mt-2 align-items-end">
                        <div>
                            @if( empty(Auth::user()->photo) )
                                <img src="{{ url('/img/icon/profile.png') }}" alt="profile user" class="rounded-circle p-1 img-profile-user" width="58" height="58">
                            @else
                                <img src="{{ Auth::user()->photo }}" alt="profile user" class="rounded-circle p-1 img-profile-user" width="58" height="58">
                            @endif
                        </div>
                        <div class="w-100 d-block ms-3">
                            <div class="d-flex justify-content-end w-100">

                                <img src="{{ url('/img/logo/logo-alianz.png') }}" alt="logo" width="70" height="23">
                            </div>


                            <p class="mb-0" style="color: #003781;font-size: 15px;font-style: normal;font-weight: 600;line-height: normal;">{{ Auth::user()->name }}</p>
                            <p class="mb-0" style="color: #383838;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">{{ Auth::user()->position }}</p>
                        </div>
                    </div>
                    <div class="bg-white mt-3" style="padding:10px;border-radius: 10px;background: rgba(255, 255, 255, 0.50);box-shadow: 0px 2px 20px 0px rgba(200, 200, 200, 0.50);">
                        <p class="mb-0 detail-profile"><b>รหัสตัวเเทน :</b> {{ Auth::user()->account }}</p>
                        <p class="mb-0 detail-profile"><b>รหัสหน่วยงาน :</b> {{ Auth::user()->organization_code }}</p>
                        <p class="mb-0 detail-profile"><b>ชื่อหน่วยงาน :</b> {{ Auth::user()->organization_name }}</p>
                        <p class="mb-0 detail-profile"><b>รหัสสาขา/สำนักงาน :</b> {{ Auth::user()->branch_code }}</p>
                        <p class="mb-0 detail-profile"><b>ชื่อสาขา/สำนักงาน :</b> {{ Auth::user()->branch_name }}</p>
                        <p class="mb-0 detail-profile"><b>รหัสกลุ่ม :</b> {{ Auth::user()->group_code }}</p>
                    </div>

                    <div class="mt-3 me-1 ms-2 d-flex align-items-end">
                        <div class="w-100">
                            <p class="detail-profile">
                                เลขที่ใบอนุญาต : 
                                <span style="color: #003781;">{{ Auth::user()->license }}</span>
                            </p>
                            <p class="detail-profile">
                                วันออกใบอนุญาต : 
                                <span style="color: #003781;">{{ Auth::user()->license_start }}</span>
                            </p>
                            <p class="detail-profile">
                                วันหมดอายุใบอนุญาต : 
                                <span style="color: #003781;">{{ Auth::user()->license_expire }}</span>
                            </p>
                            <p class="detail-profile">
                                เลขที่ใบอนุญาต IC License : 
                                <span style="color: #003781;">{{ Auth::user()->ic_license }}</span>
                            </p>
                            <p class="detail-profile">
                                วันออกใบอนุญาต IC License : 
                                <span style="color: #003781;">{{ Auth::user()->ic_license_start }}</span>
                            </p>
                            <p class="detail-profile">
                                วันหมดอายุใบอนุญาต IC License : 
                                <span style="color: #003781;">{{ Auth::user()->ic_license_expire }}</span>
                            </p>

                            @if(Auth::user()->clm == "1")
                            <p class="detail-profile">
                                <span style="color: #003781;"> มีสิทธิการขาย CLM </span>
                            </p>
                            @endif

                        </div>
                        <style>
                            .btn-download-prifile {
                                color: #003781;
                                font-size: 28px;
                            }

                            .btn-download-prifile:hover {
                                cursor: pointer;
                            }
                        </style>
                        <a class="btn-download-prifile" onclick="document.querySelector('#card_profile_detail').classList.toggle('d-none');document.querySelector('#card_profile').classList.toggle('d-none');">
                            <i class="fa-solid fa-down-to-bracket"></i>
                        </a>
                    </div>


                    <button type="button" class="btn-close-modal-detail" data-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>&nbsp;
                    </button>
                </div>

                <div id="card_profile" class="d-none">
                    <div>
                        <div class="d-flex mt-2 mb-3">
                            <div class="pt-3">
                                @if( empty(Auth::user()->photo) )
                                    <img src="{{ url('/img/icon/profile.png') }}" alt="profile user" class="rounded-circle p-1 img-profile-user" width="50" height="50">
                                @else
                                    <img src="{{ Auth::user()->photo }}" alt="profile user" class="rounded-circle p-1 img-profile-user" width="50" height="50">
                                @endif
                            </div>
                            <div class="w-100 d-block ms-3">
                                <div class="d-flex justify-content-end w-100 align-item-start">
                                    <img src="{{ url('/img/logo/logo-alianz.png') }}" alt="logo" width="70" height="23">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div style="width: 60%;">
                                <!-- <p class="mb-0" style="color: #003781;font-size: 12px;font-style: normal;font-weight: 600;line-height: normal;">Pathumrat Chatrattanasak</p> -->
                                <p class="mb-0" style="color: #003781;font-size: 15px;font-style: normal;font-weight: 600;line-height: normal;">{{ Auth::user()->name }}</p>
                                <p class="mt-2 mb-3" style="color: #383838;font-size: 11px;font-style: normal;font-weight: 700;line-height: normal;">{{ Auth::user()->position }}</p>

                                <p class="mb-0" style="color: #003781;font-size: 10px;font-style: normal;font-weight: 400;line-height: normal;">{{ Auth::user()->organization_name }}</p>
                                <p style="color: #003781;font-size: 10px;font-style: normal;font-weight: 400;line-height: normal;">เลขที่ใบอนุญาต : {{ Auth::user()->license }}</p>
                            </div>
                            <div style="width: 40%;padding-left: 5px;">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                        <path d="M14.3333 15H9.83333C9.46667 15 9.16667 14.7 9.16667 14.3333V10.5C9.16667 9.58333 8.41667 8.83333 7.5 8.83333C6.58333 8.83333 5.83333 9.58333 5.83333 10.5V14.3333C5.83333 14.7 5.53333 15 5.16667 15H0.666667C0.3 15 0 14.7 0 14.3333V8C0 7.83333 0.0666667 7.66667 0.183333 7.55L7.01667 0.216667C7.13333 0.0833333 7.31667 0 7.5 0C7.68333 0 7.86667 0.0833333 7.98333 0.216667L14.8167 7.55C14.9333 7.66667 15 7.83333 15 8V14.3333C15 14.7 14.7 15 14.3333 15ZM10.5 13.6667H13.6667V8.26667L7.5 1.65L1.33333 8.26667V13.6667H4.5V10.5C4.5 8.85 5.85 7.5 7.5 7.5C9.15 7.5 10.5 8.85 10.5 10.5V13.6667Z" fill="#003781" />
                                    </svg>
                                    <p class="mt-2" style="color: #373737;font-size:8px;font-style: normal;font-weight: 400;line-height: normal;">
                                        {{ Auth::user()->address }}
                                    </p>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none">
                                        <path d="M1.44918 16.468H12.064C13.6826 16.468 15 15.1506 15 13.532V2.93601C15 1.31744 13.6826 0 12.064 0H1.44918C1.12923 0 0.865747 0.263488 0.865747 0.583438V4.12171H0.583438C0.263488 4.12171 0 4.38519 0 4.70514C0 5.02509 0.263488 5.28858 0.583438 5.28858H0.846926V7.64115H0.583438C0.263488 7.64115 0 7.90464 0 8.24341C0 8.58218 0.263488 8.82685 0.583438 8.82685H0.846926V11.1794H0.583438C0.263488 11.1794 0 11.4429 0 11.7629C0 12.0828 0.263488 12.3463 0.583438 12.3463H0.846926V15.8846C0.865747 16.2045 1.12923 16.468 1.44918 16.468ZM13.8143 13.532C13.8143 14.5107 13.0238 15.3011 12.0452 15.3011H2.03262V1.1857H12.0452C13.0238 1.1857 13.8143 1.97616 13.8143 2.95483V13.532Z" fill="#003781" />
                                        <path d="M12.4974 11.0665L12.1586 9.88078C11.8952 8.92093 11.0859 8.22457 10.126 8.07401C10.446 7.64113 10.6342 7.09534 10.6342 6.5119C10.6342 5.02507 9.42966 3.82056 7.94283 3.82056C6.456 3.82056 5.25149 5.02507 5.25149 6.5119C5.25149 7.09534 5.43969 7.62231 5.75964 8.07401C4.79979 8.24339 4.00933 8.93975 3.72702 9.88078L3.38825 11.0665C3.27533 11.4429 3.35061 11.8381 3.59528 12.1581C3.83994 12.478 4.19753 12.6474 4.59277 12.6474H11.2929C11.6881 12.6474 12.0457 12.4592 12.2904 12.1581C12.5162 11.8381 12.5915 11.4429 12.4974 11.0665ZM7.92401 4.98743C8.77094 4.98743 9.44848 5.66497 9.44848 6.5119C9.44848 7.35883 8.77094 8.03637 7.92401 8.03637C7.07708 8.03637 6.39954 7.35883 6.39954 6.5119C6.39954 5.66497 7.0959 4.98743 7.92401 4.98743ZM11.2929 11.4805H4.55513L4.49866 11.4052L4.83743 10.2196C5.00682 9.63612 5.5338 9.22206 6.15487 9.22206H9.71196C10.3142 9.22206 10.86 9.63612 11.0294 10.2196L11.3682 11.4052L11.2929 11.4805Z" fill="#003781" />
                                    </svg>
                                    <p class="mt-2 mb-0" style="color: #373737;font-size: 8px;font-style: normal;font-weight: 400;line-height: normal;">
                                        Mobile: {{ Auth::user()->phone }}
                                    </p>
                                    <p class="" style="color: #373737;font-size: 8px;font-style: normal;font-weight: 400;line-height: normal;">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                            </div>


                        </div>

                        @if( !empty(Auth::user()->elite_agency) )
                        <p class="mb-0 text-end" style="color: #003781;font-size: 12px;font-style: normal;font-weight: 700;line-height: normal;">ALLIANZ ELITE AGENCY</p>
                        @endif
                    </div>
                    <a id="btnDownload" type="button" class="btn-close-modal-detail W-100" style="border-radius: 50px;color: #FFF;text-align: center;font-size: 16px;font-style: normal;font-weight: 500;line-height: normal;">
                        <i class="fa-regular fa-image"></i> <span style="color: #FFF;text-align: center;font-size: 16px;font-style: normal;font-weight: 500;line-height: normal;">ดาวน์โหลดรูปภาพ</span>

                        </a>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="assets/images/avatars/avatar-2.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h4>
                                <p class="text-secondary mb-1">{{Auth::user()->detail}}</p>
                                
                                <button class="btn btn-primary px-5 mt-2">แก้ไข</button>

                                @if(Auth::user()->role == "Super-admin" || Auth::user()->role == "Admin")
                                <a href="{{ url('/welcome_admin') }}" style="width:70%;" class="btn btn-sm btn-danger mt-2">
                                    For Admin
                                </a>
                                @endif
                            </div>
                        </div>
                        <hr class="my-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <b><i class="fa-regular fa-cake-candles"></i> วันเกิด</b> 
                                </h6>
                                <span class="text-secondary">{{Auth::user()->birthday}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <b><i class="fa-regular fa-id-card-clip"></i> รหัสตัวแทน</b> 
                                </h6>
                                <span class="text-secondary">{{Auth::user()->agent_code}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <b><i class="fa-regular fa-building"></i> ชื่อหน่วยงาน</b> 
                                </h6>
                                <span class="text-secondary">{{Auth::user()->agency_name}}</span>
                            </li>
                            <li class="list-group-item ">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            <b><i class="fa-regular fa-file-certificate"></i> เลขที่ใบอนุญาต</b> 
                                        </h6>
                                        <span class="text-secondary">{{Auth::user()->license}}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <h6 class="mb-0 " style="margin-left: 38px;">
                                            วันเริ่ม
                                        </h6>
                                        <span class="text-secondary"> {{ (\Carbon\Carbon::parse(Auth::user()->license_start))->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <h6 class="mb-0 " style="margin-left: 38px;">
                                            วันหมดอายุ
                                        </h6>
                                        <span class="text-secondary"> {{ (\Carbon\Carbon::parse(Auth::user()->license_expire))->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                               
                            </li>

                           

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="John Doe">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="john@example.com">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="(239) 816-9029">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="(320) 380-4539">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="Bay Area, San Francisco, CA">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="button" class="btn btn-primary px-4" value="Save Changes">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>

<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

<script>
    // $(document).ready(function() {
    //     const owl = $('.owl-nav-nemu')
    //     owl.owlCarousel({
    //         loop: false,
    //         dots: true,
    //         items: 6,
    //     });
    // })

    $('.owl-carousel').owlCarousel({
        items: 6,
        loop: false,
        nav: false,

    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("body").tooltip({
            selector: '[data-toggle=tooltip]'
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputFile = document.querySelector("#picture_profile_input");
        const pictureImage = document.querySelector(".picture_profile_image");
        const pictureImageTxt = `<i class="fa-solid fa-plus text-white"></i>`;
        pictureImage.innerHTML = pictureImageTxt;

        inputFile.addEventListener("change", function(e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function(e) {
                    const readerTarget = e.target;

                    const img = document.createElement("img");
                    img.src = readerTarget.result;
                    img.classList.add("picture__img");

                    pictureImage.innerHTML = "";
                    pictureImage.appendChild(img);
                });

                reader.readAsDataURL(file);
                document.querySelector('#btn_submit_change_profile').disabled = false;
            } else {
                pictureImage.innerHTML = pictureImageTxt;
                document.querySelector('#btn_submit_change_profile').disabled = true;
            }
        });
    });

    const printDocument = (domElement) => {
    html2canvas(domElement , {backgroundColor: "rgba(0,0,0,0)"}).then((canvas) => {
      const image = canvas.toDataURL('image/png');
      const a = document.createElement('a');
      a.setAttribute('download', 'certificate.png');
      a.setAttribute('href', image);
      a.click();
    });
  };

  document.getElementById('btnDownload').addEventListener('click', () => {
    const domElement = document.getElementById('card_profile_download');
    printDocument(domElement);
  });
</script>




@endsection