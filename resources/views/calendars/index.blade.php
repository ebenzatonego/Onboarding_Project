@extends('layouts.theme_user')
@section('content')
<style>
    .content-section,
    .container-content {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    .row-content {
        display: block !important;
    }

    .calender-container {
        display: flex !important;
        flex-direction: column !important;
        padding: 80px 0 0 0 !important;
    }

    @media only screen and (max-width: 767px) {
        .calender-content {
            display: flex !important;
            flex-direction: column !important;
            height: 100% !important;
            margin-top: 15px;

        }

        .container-calender {
            margin-top: 0 !important;
            padding: 20px 0 !important
        }

        .calender-container {
            height: calc(100dvh - 105px) !important;
        }

        .header-calendar,
        .div-calender {
            padding: 0 20px;
        }
    }

    @media only screen and (min-width: 767px) {
        .calender-content {
            display: flex !important;
            flex-direction: row !important;
            height: 100% !important;
            margin-top: 15px;
        }

        .container-calender {
            padding: 10px !important
        }

        .calender-container {
            height: calc(100dvh - 150px) !important;

        }

    }

    .div-calender {
        width: 100%;
        height: fit-content;
        padding: 10px;
        /* ใช้ auto ในกรณีที่ fit-content ไม่ทำงาน */
    }

    .container-calender {
        flex-grow: 1;
        width: 100%;
        overflow: auto;
        padding: 10px 0;

    }


    .appointment::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
        transition: all .15s ease-in-out;
    }

    .appointment::-webkit-scrollbar {
        width: 6px;
        background-color: #F5F5F5;
        transition: all .15s ease-in-out;
    }

    .appointment::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #bebebe;
        transition: all .15s ease-in-out;
    }

    .appointment::-webkit-scrollbar-thumb:hover {
        background: #989898 padding-box;
        width: 12px;
        transition: all .15s ease-in-out;
    }
</style>
<style>
    .calendar-status {
        text-align: center;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        position: relative;
        margin: 0 12px;
    }

    .calendar-status::before {
        content: '';
        width: 10px;
        height: 10px;
        position: absolute;
        border-radius: 50%;
        top: 49%;
        left: -8px;
        transform: translate(-50%, -50%);
    }

    .calendar-status.red {
        color: #E54141;
    }

    .calendar-status.red::before {
        background-color: #E54141;
    }

    .calendar-status.blue {
        color: #78CBE5;
    }

    .calendar-status.blue::before {
        background-color: #78CBE5;
    }

    .calendar-status.yellow {
        color: #FFBF44;
    }

    .calendar-status.yellow::before {
        background-color: #FFBF44;
    }

    .calendar-status.purple {
        color: #BD91FF;
    }

    .calendar-status.purple::before {
        background-color: #BD91FF;
    }

    .calendar-status.green {
        color: #8FC14E;
    }

    .calendar-status.green::before {
        background-color: #8FC14E;
    }

    .btn-add-schedule {
        border: none !important;
        color: #003781;
        text-align: center;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        border-radius: 10px;
        background: rgba(207, 213, 230, 0.50);
    }

    /* 
    #calendar {
        max-width: 800px;
        margin: 40px auto;

    } */

    .fc-event {
        border: 1px solid #eee !important;
    }

    .fc-content {
        padding: 3px !important;
    }

    .fc-content .fc-title {
        display: block !important;
        overflow: hidden;
        text-align: center;
        font-size: 12px;
        font-weight: 500;
        text-align: center;
    }

    .fc-customButton-button {
        font-size: 13px !important;
        position: absolute;
        top: 60px;
        left: 50%;
        transform: translateY(-50%);
    }



    .form-group {
        margin-bottom: 1rem;
    }

    .form-group>label {
        margin-bottom: 10px;
    }

    #delete-modal .modal-footer>.btn {

        border-radius: 3px !important;
        padding: 0px 8px !important;
        font-size: 15px;

    }




    .fc-scroller {
        overflow-y: hidden !important;
    }

    .context-menu {
        position: absolute;
        z-index: 1000;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
        padding: 5px;
    }

    /* .context-menu.show {
    display: block;
  } */

    .context-menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;

    }

    .context-menu ul>li {
        display: block;
        ;
        padding: 5px 15px;
        list-style-type: none;
        color: #333;
        display: block;
        cursor: pointer;
        margin: 0 auto;
        transition: 0.10s;
        font-size: 13px;


    }

    .context-menu ul>li:hover {
        color: #fff;
        background-color: #007bff;
        border-radius: 2px;

    }

    .fa,
    .fas {
        font-size: 13px;
        margin-right: 4px;
    }

    .fc-next-button {
        order: 2;
    }

    .fc-prev-button {
        order: 2;
    }

    .fc-customButton-button,
    .fc-header-toolbar,
    .fc-license-message {
        display: none !important;
    }

    @media only screen and (max-width: 767px) {
        .header-fc-pc {
            display: none !important;
        }

        .container-calender {
            margin-top: 20px !important;

        }

        .container-calender .card-calender {
            border-radius: 30px 30px 0 0 !important;
        }

        .container-test {
            /* height: calc(100vh - 160px) !important; */
            /* overflow: hidden; */
            height: 100%;
        }

        .content-section {
            padding: 0 !important;
        }

        .appointment {
            padding: 0 20px !important;
            overflow: auto;
            transition: all .15s ease-in-out;
        }


    }

    @media only screen and (min-width: 767px) {
        .header-fc-mobile {
            display: none !important;
        }

        .btn-show-all-calender {
            display: none;
        }

        .appointment {
            padding: 0 20px !important;
            overflow: auto;
            min-height: fit-content;
            transition: all .15s ease-in-out;
        }
    }

    .container-calender .card-calender {
        border-radius: 10px;
        background: #FFF;
        box-shadow: 0px -1px 13px 0px #B8C6D8;

    }

    .header-fc-pc {
        display: flex;
        justify-content: space-between;
    }

    .header-fc-mobile {
        display: flex;
        justify-content: space-between;
    }

    .btn-next-prev {
        color: #6E7781;
        background-color: transparent !important;
        border: none !important;
    }

    .btn-next-prev:active,
    .btn-next-prev:focus {
        border: none !important;

    }
</style>
<style>
    .btn-show-all-calender {
        background-color: transparent !important;
        border: none !important;
        position: absolute;
        top: 0%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .name_day_reminder {
        color: #0E2B81;
        font-size: 14px;
        font-style: normal;
        font-weight: bolder;
        line-height: normal;
        margin-right: 10px !important;
    }

    .date_reminder {
        color: #003781;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .content_calender {
        padding: 0 20px;
    }
</style>

<style>
    .name-date-appointment {
        font-size: 14px;
        margin-right: 10px;
        margin-bottom: 0;
    }

    .day-appointment {
        font-size: 12px;
        margin-bottom: 0;
    }

    .time-start {
        font-size: 12px;
        color: #646363;
        margin: 0;
    }

    .time-end {
        font-size: 12px;
        color: #989898;
        margin: 0;
    }

    .content-appointment {
        position: relative;
        margin-left: 20px;
        padding: 10px;
        color: #000;
        display: flex;
        align-items: center;
        width: calc(100% - 80px);
        border-radius: 0 10px 10px 0;
        -webkit-border-radius: 0 10px 10px 0;
        -moz-border-radius: 0 10px 10px 0;
        -ms-border-radius: 0 10px 10px 0;
        -o-border-radius: 0 10px 10px 0;
    }

    .content-appointment::after {
        content: "";
        height: 100%;
        width: 10px;
        position: absolute;
        top: 50%;
        left: 0px;
        transform: translate(-50%, -50%);
        border-radius: 50px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
    }

    .content-appointment.red::after {
        background-color: #E54141;
    }

    .content-appointment.red {
        background-color: #f7c6c6;
    }


    .content-appointment.blue::after {
        background-color: #78CBE5;
    }

    .content-appointment.blue {
        background-color: #D7F5FF;
    }


    .content-appointment.yellow::after {
        background-color: #FFBF44;
    }

    .content-appointment.yellow {
        background-color: #FFF2BB;
    }

    .content-appointment.purple::after {
        background-color: #BD91FF;
    }

    .content-appointment.purple {
        background-color: #EFE4FF;
    }

    .content-appointment.green::after {
        background-color: #8FC14E;
    }

    .content-appointment.green {
        background-color: #dfedcc;
    }

    .title-appointment {
        font-size: 12px;
        margin-bottom: 3px;
        font-weight: bolder;
    }

    .detail-appointment {
        font-size: 11px;
        margin-bottom: 0;
    }
</style>

<div class="calender-container container">
    <div class="header-calendar ">
        <div class="w-100 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 25 22" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.4286 2.12903H19.2857V1.06452C19.2857 0.46129 18.8214 0 18.2143 0C17.6071 0 17.1429 0.46129 17.1429 1.06452V2.12903H7.85714V1.06452C7.85714 0.46129 7.39286 0 6.78571 0C6.17857 0 5.71429 0.46129 5.71429 1.06452V2.12903H3.57143C1.60714 2.12903 0 3.72581 0 5.67742V18.4516C0 19.4097 0.392857 20.2968 1.03571 20.971C1.67857 21.6452 2.60714 22 3.57143 22H21.4286C22.3929 22 23.2857 21.6097 23.9643 20.971C24.6429 20.3323 25 19.4097 25 18.4516V5.67742C25 4.71935 24.6071 3.83226 23.9643 3.15806C23.3214 2.48387 22.3929 2.12903 21.4286 2.12903ZM2.14286 5.67742C2.14286 4.89677 2.78571 4.25806 3.57143 4.25806H21.4286C21.8214 4.25806 22.1786 4.4 22.4286 4.68387C22.7143 4.96774 22.8571 5.32258 22.8571 5.67742V7.45161H2.14286V5.67742ZM21.4286 19.871H3.57143C2.78571 19.871 2.14286 19.2323 2.14286 18.4516V9.58064H22.8571V18.4516C22.8571 18.8419 22.7143 19.1968 22.4286 19.4452C22.1429 19.6935 21.8214 19.871 21.4286 19.871Z" fill="#003781" />
                </svg>
                <span class="ms-3">My Calendar / Reminder</span>
            </div>
            <button class="btn-add-schedule" data-bs-toggle="modal" data-bs-target="#modal_add_carlendar">
                + เพิ่มข้อมูล
            </button>
        </div>
        <div class="d-flex justify-content-center flex-wrap mt-2">
            <span class="calendar-status red">นัดลูกค้า </span>
            <span class="calendar-status blue">อบรม</span>
            <span class="calendar-status yellow">สอบ</span>
            <span class="calendar-status purple">กิจกรรมบริษัท</span>
            <span class="calendar-status green">ส่วนตัว</span>
        </div>
    </div>
    <div class="calender-content">
        <div class="div-calender" id="my_calendar">
            <div class="header-fc-pc mb-2 ">
                <button class="btn-next-prev" id="prev-pc" onclick="updateTitle()"><i class="fa-solid fa-chevron-left"></i></button>
                <div>
                    <span id="title-fc"></span>
                </div>
                <button class="btn-next-prev" id="next-pc" onclick="updateTitle()"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <div class="header-fc-mobile mb-2">
                <div>
                    <button class="btn-next-prev" id="prev-mobile" onclick="updateTitle('mobile')"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="btn-next-prev" id="next-mobile" onclick="updateTitle('mobile')"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
                <span id="title-fc-month"></span>
                <span id="title-fc-year"></span>
            </div>
            <div id='calendar'></div>
        </div>
        <div class="position-relative my-3 d-none" id="icon_show_my_calender">
            <hr>

            <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index: 9999999;" onclick="document.querySelector('#my_calendar').classList.toggle('d-none');document.querySelector('#icon_show_my_calender').classList.toggle('d-none');document.querySelector('.appointment').classList.toggle('show')">

                <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39" fill="none">
                    <circle cx="19.5" cy="19.5" r="19.5" fill="#003781" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28.4286 10.129H26.2857V9.06452C26.2857 8.46129 25.8214 8 25.2143 8C24.6071 8 24.1429 8.46129 24.1429 9.06452V10.129H14.8571V9.06452C14.8571 8.46129 14.3929 8 13.7857 8C13.1786 8 12.7143 8.46129 12.7143 9.06452V10.129H10.5714C8.60714 10.129 7 11.7258 7 13.6774V26.4516C7 27.4097 7.39286 28.2968 8.03571 28.971C8.67857 29.6452 9.60714 30 10.5714 30H28.4286C29.3929 30 30.2857 29.6097 30.9643 28.971C31.6429 28.3323 32 27.4097 32 26.4516V13.6774C32 12.7194 31.6071 11.8323 30.9643 11.1581C30.3214 10.4839 29.3929 10.129 28.4286 10.129ZM9.14286 13.6774C9.14286 12.8968 9.78571 12.2581 10.5714 12.2581H28.4286C28.8214 12.2581 29.1786 12.4 29.4286 12.6839C29.7143 12.9677 29.8571 13.3226 29.8571 13.6774V15.4516H9.14286V13.6774ZM28.4286 27.871H10.5714C9.78571 27.871 9.14286 27.2323 9.14286 26.4516V17.5806H29.8571V26.4516C29.8571 26.8419 29.7143 27.1968 29.4286 27.4452C29.1429 27.6935 28.8214 27.871 28.4286 27.871Z" fill="white" />
                </svg>
            </div>
        </div>
        <div class="container-calender">
            <div class="card-calender h-100">
                <div class="card p-3 h-100 position-relative card-calender">
                    <a class="btn-show-all-calender" onclick="document.querySelector('#my_calendar').classList.toggle('d-none');document.querySelector('#icon_show_my_calender').classList.toggle('d-none');document.querySelector('.appointment').classList.toggle('show')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39" fill="none">
                            <circle cx="19.5" cy="19.5" r="19.5" fill="#D9D9D9" />
                            <path d="M14.1345 23.1111L19.5 14.4358L24.8655 23.1111L14.1345 23.1111ZM6 19.9953C6 21.9304 6.354 23.7504 7.062 25.4553C7.771 27.1592 8.733 28.6416 9.948 29.9027C11.163 31.1637 12.591 32.1619 14.232 32.8971C15.873 33.6324 17.6275 34 19.4955 34C21.3635 34 23.1185 33.6329 24.7605 32.8987C26.4025 32.1644 27.832 31.1668 29.049 29.9058C30.266 28.6447 31.2285 27.1639 31.9365 25.4631C32.6445 23.7624 32.999 21.9429 33 20.0047C33.001 18.0664 32.647 16.2464 31.938 14.5447C31.229 12.8429 30.267 11.3605 29.052 10.0973C27.837 8.83423 26.409 7.83608 24.768 7.10289C23.127 6.36971 21.3725 6.00208 19.5045 6.00001C17.6365 5.99793 15.8815 6.36504 14.2395 7.10134C12.5975 7.83764 11.168 8.83527 9.951 10.0942C8.734 11.3532 7.7715 12.8341 7.0635 14.5369C6.3555 16.2397 6.001 18.0592 6 19.9953Z" fill="white" />
                        </svg>
                    </a>
                    <p class="mt-4 text-center" style="color: #003781;font-size: 15px;font-style: normal;font-weight: 600;line-height: normal;">My Calendar / Reminder</p>



                    <div class="appointment">
                        <div class="d-flex w-100 align-items-center">
                            <div class="name-date-appointment">Wednesday</div>
                            <div class="day-appointment">25 April 2024</div>
                        </div>
                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment red">
                                <div>
                                    <p class="title-appointment">อบรมการพัฒนาความคิดด้านการขาย</p>
                                    <p class="detail-appointment">#นัดลูกค้า </p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment blue ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment blue ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment yellow ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment purple ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment green ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment red">
                                <div>
                                    <p class="title-appointment">อบรมการพัฒนาความคิดด้านการขาย</p>
                                    <p class="detail-appointment">#นัดลูกค้า </p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment blue ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment blue ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment yellow ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment purple ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment green ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment red">
                                <div>
                                    <p class="title-appointment">อบรมการพัฒนาความคิดด้านการขาย</p>
                                    <p class="detail-appointment">#นัดลูกค้า </p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment blue ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment blue ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment yellow ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment purple ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment green ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment red">
                                <div>
                                    <p class="title-appointment">อบรมการพัฒนาความคิดด้านการขาย</p>
                                    <p class="detail-appointment">#นัดลูกค้า </p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment blue ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment blue ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment yellow ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment purple ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex w-100 align-items-center mt-2">
                            <div>
                                <p class="time-start">16:00 pm</p>
                                <p class="time-end">16:45 pm</p>
                            </div>
                            <div class="content-appointment green ">
                                <div>
                                    <p class="title-appointment">อบรมพนักงานใหม่</p>
                                    <p class="detail-appointment">หลักสูตร Star Blue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header w-100 position-raletive">
                <h5 class="modal-title" id="delete-modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="delete-modal-body">
                Are you sure you want to delete the event?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary rounded-sm" data-dismiss="modal" id="cancel-button">Cancel</button>
                <button type="button" class="btn btn-danger rounded-lg" id="delete-button">Delete</button>
            </div>
        </div>
    </div>
</div>


<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.13/index.global.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js'></script>


<div class="modal fade edit-form" id="modal_add_carlendar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 8.214px;position: relative;">
            <button type="button" class="btn-close" style="position: absolute;  top: 30px;  right: 10px;  transform: translate(-50%, -50%);" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-header border-bottom-0 mt-3">
                <h5 class="modal-title text-center w-100 " id="modal-title" style="color:#6E7781">เพิ่มข้อมูล</h5>
            </div>
            <form id="form_calendar">
                <div class="modal-body px-5 pb-0">
                    <div class="alert alert-danger " role="alert" id="danger-alert" style="display: none;">
                        วันสิ้นสุดกิจกรรมควรมากกว่าวันที่เริ่มกิจกรรม
                    </div>
                    <div class="row mb-3">
                        <label for="title" class="col-3 col-form-label">ชื่อโน้ต</label>
                        <div class="col-9">
                            <input style="border-radius: 50px;" type="text" class="form-control" id="title" placeholder="กรอกชื่อโน้ต" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="title" class="col-3 col-form-label">แฮชแท็ก</label>
                        <div class="col-9">
                            <input style="border-radius: 50px;" type="text" class="form-control" list="data_list_type" id="type_memo" placeholder="กรอกแฮชแท็ก" required>
                            <datalist id="data_list_type">
                                @foreach($tag_calendars as $item)
                                <option value="{{$item->type}}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="date_start" class="col-3 col-form-label">วันที่เริ่ม</label>
                        <div class="col-9">
                            <input type="date" style="border-radius: 50px;" class="form-control" id="date_start" placeholder="เลือกวันที่เริ่ม" required>
                        </div>
                    </div>
                    <div id="not_all_day" class="d-none">
                        <div class="row mb-3">
                            <label for="time_start" class="col-3 col-form-label">เวลาที่เริ่ม</label>
                            <div class="col-9">
                                <input type="time" style="border-radius: 50px;" class="form-control" id="time_start" placeholder="เลือกวันที่เริ่ม">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date_end" class="col-3 col-form-label">วันที่จบ</label>
                            <div class="col-9">
                                <input type="date" style="border-radius: 50px;" class="form-control" id="date_end" placeholder="เลือกวันที่จบ">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="time_end" class="col-3 col-form-label">เวลาที่จบ</label>
                            <div class="col-9">
                                <input type="time" style="border-radius: 50px;" class="form-control" id="time_end" placeholder="เลือกวันที่เริ่ม">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="end-date" class="col-3 col-form-label pe-0">เลือกทั้งวัน</label>
                        <div class="col-9">
                            <input class="form-check-input" style="border-radius: 50%;width: 24px;height: 24px;" type="checkbox" id="all_day" name="all_day" checked onchange="check_all_day()">

                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="start-date">Start date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="start-date" placeholder="start-date" required>
                    </div>
                    <div class="form-group">
                        <label for="end-date">End date - <small class="text-muted">Optional</small></label>
                        <input type="date" class="form-control" id="end-date" placeholder="end-date">
                    </div> -->

                    <div class="row mb-3">
                        <label for="end-date" class="col-3 col-form-label">หมวดหมู่</label>
                        <div class="col-9">
                            <select class="form-select mb-3" id="type" style="border-radius: 50px;" aria-label="Default select example" required>
                                <option value="ส่วนตัว" style="color: #8FC14E;" selected="">ส่วนตัว</option>
                                <option value="นัดลูกค้า" style="color: #E54141;">นัดลูกค้า</option>
                            </select>

                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="event-color">Color</label>
                        <input type="color" class="form-control" id="event-color" value="#3788d8">
                    </div> -->
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center ">
                    <button type="submit" class="btn btn-success" id="submit-button" style="border-radius: 50px;background-color: #003781 !important;border: none !important;">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const myModal = new bootstrap.Modal(document.getElementById('form'));
        const close = document.querySelector('.btn-close');




        var data_arr_events = [];
        get_data_for_calendar();


    });

    function get_data_for_calendar() {

        // fetch("{{ url('/') }}/api/get_data_for_calendar")
        //     .then(response => response.json())
        //     .then(result => {
        //         console.log(result);

        //         for (let i = 0; i < result.length; i++) {
        //             // สร้างข้อมูลใหม่ที่ต้องการเพิ่ม

        //             let newEvent ;
        //             if(result[i].link_lms){
        //                 newEvent = {
        //                     title: result[i].name_article,
        //                     url: result[i].link_lms,
        //                     start: result[i].start_date
        //                 };
        //             }
        //             else{
        //                 newEvent = {
        //                     title: result[i].name_article,
        //                     start: result[i].start_date
        //                 };
        //             }

        //             // เพิ่มข้อมูลใหม่เข้าไปในอาร์เรย์ data_arr_events
        //             data_arr_events.push(newEvent);
        //         }

        //     });

        data_arr_events = [{
                title: 'Go To Home',
                url: "{{ url('/home') }}",
                start: '2024-06-01'
            },
            {
                title: 'Long Event',
                start: '2024-06-07',
                end: '2024-06-10',
                backgroundColor: '#00BF2D'
            },
            {
                title: 'Meeting',
                start: '2024-06-12T10:30:00',
                end: '2024-06-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2024-06-12T12:00:00'
            },
            {
                title: 'Dinner',
                start: '2024-06-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2024-06-13T07:00:00',
                backgroundColor: 'red'
            }
        ];

        setTimeout(() => {
            create_calendar(data_arr_events);
        }, 500);
    }

    function create_calendar(data_arr_events) {

        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
        const day = String(currentDate.getDate()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day}`;
        // console.log(formattedDate);

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            // เปิดลิงก์ในแท็บใหม่
            eventClick: function(info) {
                console.log(info.event.startStr);
            },
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            initialView: 'dayGridMonth',
            initialDate: formattedDate,
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            nowIndicator: true,
            dayMaxEvents: true, // allow "more" link when too many events
            editable: false,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: data_arr_events,

        });
        calendar.render();

        updateTitle();

    }
</script>
<script>
    document.getElementById('prev-pc').addEventListener('click', function() {
        // calendar.prev(); // call method
        document.querySelector('.fc-prev-button').click();

    });

    document.getElementById('next-pc').addEventListener('click', function() {
        document.querySelector('.fc-next-button').click();
    });

    document.getElementById('prev-mobile').addEventListener('click', function() {
        // calendar.prev(); // call method
        document.querySelector('.fc-prev-button').click();

    });

    document.getElementById('next-mobile').addEventListener('click', function() {
        document.querySelector('.fc-next-button').click();
    });

    function updateTitle(type) {
        setTimeout(() => {

            // ดึง text จาก element ที่มี class fc-left และ tag h2
            let titleText = document.querySelector('.fc-toolbar-title').innerHTML;

            // แยกเดือนและปีออกจากกัน
            let [month, year] = titleText.split(' ');


            // สร้างข้อความใหม่เพื่อแสดงเดือนและปีที่แยกกัน
            let newText = `${month} ${year}`;
            // ใส่ข้อความที่ดึงมาใน element ที่มี id title-fc
            document.getElementById('title-fc').innerHTML = newText;
            document.getElementById('title-fc-month').innerHTML = `${month}`;
            document.getElementById('title-fc-year').innerHTML = `${year}`;

        }, 100);
    }

    let form_calendar = document.querySelector('#form_calendar'); // Use '#' to select by ID
    if (form_calendar) {
        form_calendar.addEventListener('submit', function(event) {
            event.preventDefault(); // prevent default form submission

            // retrieve the form input values
            var dangerAlert = document.getElementById('danger-alert');

            // let title = document.querySelector('#title').value;
            // let type_memo = document.querySelector('#type_memo').value;
            // let time_start = document.querySelector('#time_start').value;
            // let time_end = document.querySelector('#time_end').value;
            // let type = document.querySelector('#type').value;

            let startDate = document.querySelector('#date_start').value;
            let endDate = document.querySelector('#date_end').value;
            let all_day = null;
            let checkbox_all_day = document.getElementById('all_day');
            if (checkbox_all_day.checked) {
                all_day = 'Yes'
            }

            let endDateFormatted = moment(endDate, 'YYYY-MM-DD').add(1, 'day').format('YYYY-MM-DD');

            if (endDateFormatted <= startDate) { // add if statement to check end date
                dangerAlert.style.display = 'block';
                return;
            }

            // API UPLOAD IMG //
            let formData = new FormData();
            let data_calendar = {
                "title": document.querySelector('#title').value,
                "type_memo": document.querySelector('#type_memo').value,
                "date_start": document.querySelector('#date_start').value,
                "time_start": document.querySelector('#time_start').value,
                "date_end": document.querySelector('#date_end').value,
                "time_end": document.querySelector('#time_end').value,
                "type": document.querySelector('#type').value,
                "all_day": all_day,
            }

            formData.append('title', data_calendar.title);
            formData.append('type_memo', data_calendar.type_memo);
            formData.append('date_start', data_calendar.date_start);
            formData.append('time_start', data_calendar.time_start);
            formData.append('date_end', data_calendar.date_end);
            formData.append('time_end', data_calendar.time_end);
            formData.append('type', data_calendar.type);
            formData.append('all_day', data_calendar.all_day);

            // console.log(formData);
            fetch("{{ url('/') }}/api/add_calendar", {
                method: 'POST',
                body: formData
            }).then(function(response) {
                return response.json();
            }).then(function(data) {

                form_calendar.reset();
                $('#modal_add_carlendar').modal('hide');
                console.log(data);
            }).catch(function(error) {
                // console.error(error);
            });

            // const newEvent = {
            //     title: title,
            //     start: startDate,
            //     end: endDateFormatted,
            //     allDay: false,
            // };

            // // add the new event to the myEvents array
            // myEvents.push(newEvent);

            // // render the new event on the calendar
            // calendar.addEvent(newEvent);

            // // save events to local storage
            // localStorage.setItem('events', JSON.stringify(myEvents));


        });
    } else {
        console.error('Form not found');
    }

    function check_all_day() {

        let checkbox_all_day = document.getElementById('all_day');
        if (checkbox_all_day.checked) {
            document.querySelector('#not_all_day').classList.add('d-none');
            document.querySelector('#time_start').required = false;
            document.querySelector('#date_end').required = false;
            document.querySelector('#time_end').required = false;
        } else {
            document.querySelector('#not_all_day').classList.remove('d-none');
            document.querySelector('#time_start').required = true;
            document.querySelector('#date_end').required = true;
            document.querySelector('#time_end').required = true;
        }


    }
</script>
@endsection