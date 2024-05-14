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

    .header-my-goal {
        font-size: 16px;
        font-weight: bolder;
    }


    .dropdown_my_goal {
        min-width: 15em;
        position: relative;
        top: 0;
    }

    .select_my_goal {
        background: #FFF;
        color: #000;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px #A1A1A1 solid;
        border-radius: 0.5em;
        padding: 1em;
        cursor: pointer;
        transition: 0.3s;
    }

    /* .select-clicked {
    border: 2px #26489a solid;
    box-shadow: 0 0 0.8em #26489a;
} */
    .select_my_goal:hover {
        color: #003781;
    }

    .caret_may_goal {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 6px solid #616161;
        transition: 0.3s;
    }

    .caret_may_goal-rotate {
        transform: rotate(180deg);
    }

    .menu_my_goal {
        list-style: none;
        padding: 0.2em 0.5em;
        background: #fff;
        border: 1px #fff solid;
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
        border-radius: 0.5em;
        color: #9fa5b5;
        position: absolute;
        top: 4em;
        left: 50%;
        width: 100%;
        transform: translateX(-50%);
        opacity: 0;
        display: none;
        transition: 0.2s;
        z-index: 1;
    }

    .menu_my_goal li {
        padding: 0.7em 0.5em;
        margin: 0.3em 0;
        border-radius: 0.5em;
        cursor: pointer;
    }

    .menu_my_goal li:hover {
        background: #E6E6E6;
        color: #003781;
    }

    .my_goal_active {
        background: #E6E6E6;
        color: #003781;

    }

    .menu_my_goal_open {
        display: block;
        opacity: 1;
    }

    .label_select_my_goal {
        position: absolute;
        top: -15px;
        background-color: #fff;
        padding: 5px 7px;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        font-size: 12px;
        font-weight: bolder;
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
</style>
@section('content')
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4 p-0 p-lg-3">
                <div class="card-profile">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div style="position: relative;">
                                <img src="{{ url('/img/logo/logo.png') }}" alt="profile user" class="rounded-circle p-1 img-profile-user" width="85" height="85">

                                <button class="btn-edit-img btn p-0" data-toggle="modal" data-target="#editProfile">
                                    <img src="{{ url('/img/icon/edit-img.png') }}" width="29" height="29">
                                </button>

                            </div>
                            <div class="ms-2">
                                <P style="font-size: 16px; font-weight: bold;margin-bottom: 10px;">
                                    {{ Auth::user()->name }}
                                    <br>
                                    {{ Auth::user()->lastname }}
                                </P>
                                <P style="font-size: 12px; font-weight: bold;color: #383838;margin: 0;">
                                    รหัสตัวแทน : {{ Auth::user()->agent_code }}
                                </P>
                                <P style="font-size: 12px; font-weight: bold;color: #383838;margin: 0;">
                                    รหัสตัวแทน : {{ Auth::user()->agency_name }}
                                </P>

                                <!-- @if(Auth::user()->role == "Super-admin" || Auth::user()->role == "Admin")
                                <a href="{{ url('/welcome_admin') }}" style="width:70%;" class="btn btn-sm btn-danger mt-2">
                                    For Admin
                                </a>
                                @endif   -->


                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8">
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
                                <a href="" style="color: #999999;font-size: 10px;"><u>ออกจากระบบ</u></a>
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
                            <div>
                                <p style="color: #373737;font-size: 14px;">PC (ยอดสะสมรายปี)</p>
                                <div class="dropdown_my_goal">
                                    <div class="select_my_goal">
                                        <label class="label_select_my_goal">เลือกความฝันของคุณ</label>
                                        <span class="selected_my_goal">10,000,000</span>
                                        <div class="caret_may_goal"></div>
                                    </div>
                                    <ul class="menu_my_goal">
                                        <li class="">
                                            <i class="fa-solid fa-money-bill"></i>
                                            <span class="ms-2">50,000</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-solid fa-tag fa-flip-horizontal"></i>

                                            <span class="ms-2">100,000</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-regular fa-plane-departure"></i>

                                            <span class="ms-2">500,000</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-regular fa-motorcycle"></i>

                                            <span class="ms-2">1,000,000</span>
                                        </li>
                                        <li class="">
                                            <i class="fa-regular fa-car"></i>
                                            <span class="ms-2">5,000,000</span>
                                        </li>
                                        <li class="my_goal_active">
                                            <i class="fa-regular fa-house-tree"></i>

                                            <span class="ms-2">10,000,000</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                <button class="btn-more-job">
                                    ดูเส้นทางอาชีพเพิ่มเติม
                                </button>
                            </div>

                        </div>


                    </div>


                </div>
                <div class="contact-leader mb-5">
                    <p style="color: #003781;font-size: 16px;font-weight: bolder;">Contact Leader</p>
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="{{ url('/img/logo/logo.png') }}" alt="" class="img-leader">
                        </div>
                        <div>
                            <p class="mb-0 ms-3" style="color: #003781; font-size: 14px;font-weight: bolder;">อภิชญา เบ้าสิงห์สวย</p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">ชื่อเล่น: <span class="text-color-obd">เบลล์</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">รหัสตัวเเทน : <span class="text-color-obd">548956</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">ชื่อหน่วยงาน/AO : <span class="text-color-obd">AZ รักคุณเท่าฟ้า</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">โทร : <a href="tel:088-567-8901" class="text-color-obd">088-567-8901</a></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">อีเมล : <a href="mailto:Apitchaya@gmail.com"><u>Apitchaya@gmail.com</u></a></p>
                        </div>
                    </div>
                    <br>
                    <p style="color: #003781;font-size: 16px;font-weight: bolder;">ผู้ดูเเลพื้นที่</p>
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="{{ url('/img/logo/logo.png') }}" alt="" class="img-leader">
                        </div>
                        <div>
                            <p class="mb-0 ms-3" style="color: #003781; font-size: 14px;font-weight: bolder;">ชวนันท์ อินทร์คำน้อย</p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">ชื่อเล่น: <span class="text-color-obd">มินนี่</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">พื้นที่ดูเเล : <span class="text-color-obd">นนทบุรี</span></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">โทร : <a href="tel:088-567-8901" class="text-color-obd">088-567-8901</a></p>
                            <p class="mb-0 ms-3" style="font-size: 12px;">อีเมล : <a href="mailto:Chawanan@gmail.com"><u>Chawanan@gmail.com</u></a></p>
                        </div>
                    </div>
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
  min-width: 272px;
  min-height: 272px;
  max-width: 272px;
  max-height: 272px;
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
-webkit-border-radius:50%;
-moz-border-radius:50%;
-ms-border-radius:50%;
-o-border-radius:50%;
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
.picture_profile_image i{
    font-size: 55px;
}
.btn-submit-profile{
    border-radius:  50px;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    -ms-border-radius: 50px;
    -o-border-radius: 50px;
    font-weight: bolder;
}
.btn-submit-profile:disabled{
    background-color: #A3A3A3  !important;
    color: #57759C !important;
}
</style>
<!-- Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-profile">
            <p class="text-white text-center mb-5">เลือกรูปของคุณ</p>
            <div class="modal-body d-flex justify-content-center">
                <label class="picture" for="picture_profile_input" tabIndex="0">
                    <span class="picture_profile_image"></span>
                </label>

                <input type="file" name="picture_profile_input" id="picture_profile_input">
            </div>

            <div class="w-100 px-5 mt-5">
                <button class="btn w-100 bg-white btn-submit-profile" disabled id="btn_submit_change_profile">ตกลง</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="happybirthday" tabindex="-1" role="dialog" aria-labelledby="happybirthdayTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-profile">
            <p class="text-white text-center mb-5 font-20">สุขสันต์วันเกิด!</p>
            <div class="w-100 d-flex justify-content-center">
                <img src="{{ url('/img/icon/Birthday.png') }}" alt="" width="274">
               
            </div>
            <div class="text-center mt-4 px-3">
                <p class="text-white m-0" style="font-size: 23px;">{{Auth::user()->name}}</p>
                <p class="text-white m-0" style="font-size: 23px;">{{Auth::user()->lastname}}</p>
                <p class="text-white mb-0 mt-3">เราขอให้คุณสุขภาพแข็งแรง มีความสุขในชีวิต <br>และประสบความสำเร็จตามเป้าหมายที่วางไว้</p>
            </div>
            
            <div class="w-100 px-5 mt-5">
                <button class="btn w-100 bg-white btn-submit-profile" data-dismiss="modal" aria-label="Close">ขอให้สำเร็จ เพี้ยง!!!!</button>

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
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>
<script>
    const dropdown_my_goal = document.querySelector(".dropdown_my_goal");
    const select_my_goal = dropdown_my_goal.querySelector(".select_my_goal");
    const caret_may_goal = dropdown_my_goal.querySelector(".caret_may_goal");
    const menu_my_goal = dropdown_my_goal.querySelector(".menu_my_goal");
    const options = dropdown_my_goal.querySelectorAll(".menu_my_goal li");
    const selected_my_goal = dropdown_my_goal.querySelector(".selected_my_goal");
    select_my_goal.addEventListener("click", () => {
        select_my_goal.classList.toggle("select-clicked");
        caret_may_goal.classList.toggle("caret_may_goal-rotate");
        menu_my_goal.classList.toggle("menu_my_goal_open")
    })
    options.forEach(option => {
        option.addEventListener("click", () => {
            selected_my_goal.innerText = option.innerText;
            select_my_goal.classList.remove("select-clicked");
            caret_may_goal.classList.remove("caret_may_goal-rotate");
            menu_my_goal.classList.remove("menu_my_goal_open");
            options.forEach(option => {
                option.classList.remove("my_goal_active")
            })
            option.classList.add("my_goal_active")
        })
    })

    const inputFile = document.querySelector("#picture_profile_input");
    const pictureImage = document.querySelector(".picture_profile_image");
    const pictureImageTxt = `<i class="fa-solid fa-plus text-white"></i>`;
    pictureImage.innerHTML = pictureImageTxt;

    inputFile.addEventListener("change", function (e) {
        const inputTarget = e.target;
        const file = inputTarget.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function (e) {
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

    document.addEventListener('DOMContentLoaded', function () {
        check_birthday()
    }) 

    function check_birthday(params) {
        let date_now = `{{ (\Carbon\Carbon::now()->format('d/m')) }}`
        let birth_day = `{{ (\Carbon\Carbon::parse(Auth::user()->birthday))->format('m/d') }}`

        if (date_now == birth_day) {
            console.log('วันเกิด');  
            $('#happybirthday').modal('show');
        }
    }


</script>




@endsection