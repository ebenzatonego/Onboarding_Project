@extends('layouts.theme_login')

@section('content')
<style>
    @media screen and (max-width: 500px) {

        .conteiner-detail-training,
        .conteiner-detail-training .row div {
            padding: 0;

        }
    }
    @media only screen and (max-width: 767px) {
       .title-training{
        padding-left: 24px;
       }
       .btn-share-group{
        padding:  24px ;
       }
    }
 

    @media screen and (min-width: 767px) {
        .btn-share-group{
         padding:  24px 0 24px 0;
       }
    }

    .btn-back-all-course {
        height: 34px;
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
        font-size: 14px;
    }

    .btn-back-all-course:hover {
        color: #003781;
    }

    .btn-back-all-course span {
        margin-left: 10px;
        font-weight: bold;
    }

    .btn-back-all-course i {
        width: 34px;
        height: 34px;
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

<div class="container p-0 conteiner-detail-training">
    <div class="row">
        <div class="col-lg-5 col-md-5 p-0" style="position: relative;">

            <img src="{{ $appointment->photo }}" alt="" style="width: 100%;">
            <div class="d-flex justify-content-between">

                <div class="py-3 px-4 w-100 d-flex btn-share-group">
                    @php
                        $count_user_like = '0';

                        if( !empty($appointment->user_like) ){
                            $array = json_decode($appointment->user_like, true);
                            $count_user_like = count($array);
                        }

                    @endphp
                    <button class="btn btn-like  me-1"  onclick="action_btnlike_dislike(this.className)">
                        <div class="icon-btn d-flex">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div id="show_count_user_like" class="d-flex align-items-center ms-1">{{ $count_user_like }}</div>

                    </button>
                </div>

            </div>
            <div class="px-4 title-training">
                <div>
                    <p class="mb-2" style="color: #003781;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">{{ $appointment->title }}</p>
                </div>
                <div class="hastag-training">
                    @php
                        $appointment_type = App\Models\Training_type::where('id' ,$appointment->training_type_id)->first();
                    @endphp
                    <span>#{{ $appointment_type->type_article }}</span>
                </div>
                @if( !empty($appointment->sum_rating) )
                <div class="rating-training mt-2">
                    <span id="sum_rating_span" style="color: #EDB529;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;margin-right: 5px;">{{ $appointment->sum_rating }}</span>
                    <i id="sum_rating_i" data-star="{{ $appointment->sum_rating }}" class="star-rating"></i>
                </div>
                @endif
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
            .btn-join-meet{
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
        <div class="col-lg-7 col-md-7 px-4 mb-5">
            
            <!-- if ถ้ามีเวลาเข้าร่วม -->
            <div class="d-flex align-items-center my-2 mt-3">
                <i class="fa-light fa-calendar-days me-2" style="color: #0E2B81;font-size:18px"></i>
                <span id="text_date_start" style="color: #0E2B81;font-size: 12px;font-style: normal;font-weight: 600;">
                    <!--  -->
                </span>
            </div>
            <!-- endif -->

            <!-- if ถ้ามีลิงค์เข้าร่วมสอบ -->
                <a href="{{ $appointment->link_out }}" target="bank" class="btn w-100 btn-join-meet my-2">
                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23 0H3.19412V3.19419H4.47192V1.27768H21.7222V15.9709H8.05806V17.2486H23V0ZM3.83302 8.30489C3.32468 8.30489 2.83716 8.10297 2.47771 7.74356C2.11826 7.38414 1.91632 6.89667 1.91632 6.38838C1.91632 5.88008 2.11826 5.39261 2.47771 5.0332C2.83716 4.67378 3.32468 4.47186 3.83302 4.47186C4.34136 4.47186 4.82887 4.67378 5.18833 5.0332C5.54778 5.39261 5.74972 5.88008 5.74972 6.38838C5.74972 6.89667 5.54778 7.38414 5.18833 7.74356C4.82887 8.10297 4.34136 8.30489 3.83302 8.30489ZM2.53541 9.58895C1.70548 9.58895 1.04869 9.96203 0.618715 10.5383C0.216846 11.0781 0.0468979 11.7457 0.008564 12.3621C-0.028986 12.9945 0.057169 13.6282 0.262207 14.2276C0.453876 14.7833 0.7778 15.3583 1.27742 15.7525V22.0399C1.27696 22.2807 1.36715 22.5128 1.53005 22.6901C1.69296 22.8674 1.91664 22.9768 2.1566 22.9967C2.39657 23.0166 2.63522 22.9454 2.8251 22.7974C3.01497 22.6493 3.14215 22.4352 3.18134 22.1977L4.00552 17.2486H4.19591L5.12743 22.2162C5.17166 22.4507 5.30177 22.6602 5.49232 22.8038C5.68286 22.9474 5.92013 23.0148 6.15772 22.9927C6.39531 22.9707 6.61613 22.8608 6.77699 22.6846C6.93785 22.5084 7.02719 22.2785 7.02751 22.0399V12.9256C7.15528 13.1202 7.28136 13.3159 7.40574 13.5127L7.45558 13.5913L7.46836 13.6117L7.47155 13.6175C7.55766 13.7557 7.67758 13.8697 7.82 13.9487C7.96242 14.0278 8.12263 14.0692 8.28551 14.0691H11.48C11.7342 14.0691 11.9779 13.9682 12.1577 13.7885C12.3374 13.6087 12.4384 13.365 12.4384 13.1109C12.4384 12.8567 12.3374 12.613 12.1577 12.4333C11.9779 12.2536 11.7342 12.1526 11.48 12.1526H8.81132C8.65607 11.9124 8.45162 11.6007 8.23695 11.2876C8.01334 10.9612 7.76672 10.6156 7.54694 10.3447C7.44024 10.2125 7.32077 10.0745 7.20066 9.96139C7.14188 9.90582 7.0601 9.83363 6.96043 9.76974C6.78454 9.6543 6.5792 9.59177 6.36881 9.58959L2.53541 9.58895Z" fill="white"/>
                    </svg>
                    <!-- if ตารางสอบ -->
                    เข้าร่วม{{ $appointment->type }}
                    <!--  else-->
                    <!-- เข้าร่วมอบรม -->
                    <!-- endif -->
                </a>
            <!-- endif -->

            <!-- if ถ้ามี รายละเอียดการเข้าอบรม -->
            <div class="my-3">
                <p style="color: #003781;font-size: 15px;font-style: normal;font-weight: 600;line-height: normal;">รายละเอียดการเข้าอบรม</p>
                <div class="d-flex ">
                    <i class="fa-light fa-location-dot me-2"></i>
                    <div>
                        <p class="m-0">
                            {!! $appointment->location_detail !!}
                        </p>
                        <a href="{{ $appointment->link_map }}" target="bank" id="link-to-copy" style="color: #0872FF;font-size: 10px;font-style: normal;font-weight: 600;line-height: normal;text-decoration-line: underline;">
                            {{ $appointment->link_map }}
                        </a>
                        <i style="color: #9E9E9E;" class="fa-regular fa-copy mx-2"  onclick="copyLink_map()"></i>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
            <!-- endif -->

            <div class="detail-training">
                <p class="mt-4">
                    {!! $appointment->detail !!}
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-vote-training {
        background-color: #3D467F !important;
        margin: 0 20px;
        border-radius: 10px !important;
        -webkit-border-radius: 10px !important;
        -moz-border-radius: 10px !important;
        -ms-border-radius: 10px !important;
        -o-border-radius: 10px !important;
        padding: 40px 0;
    }

    
   
    #rating_input .rating-group {
    display: inline-flex;
    }

    #rating_input .rating__icon {
    pointer-events: none;
    }

    #rating_input .rating__input {
    position: absolute !important;
    left: -9999px !important;
    }

    #rating_input .rating__input--none {
    display: none
    }

    #rating_input .rating__label {
    cursor: pointer;
    padding: 0 0.1em;
    font-size: 2rem;
    display: flex;
    justify-content: center;
    }

    #rating_input .rating__icon--star {
    color: orange;
    }

    #rating_input .rating__input:checked ~ .rating__label .rating__icon--star {
    color: #ddd;
    }

    #rating_input .rating-group:hover .rating__label .rating__icon--star {
    color: orange;
    }

    #rating_input .rating__input:hover ~ .rating__label .rating__icon--star {
    color: #ddd;
    }
    .rating__text{
        color: #FFF;
        text-align: center;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .btn-vote-training{
    border-radius:  50px;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    -ms-border-radius: 50px;
    -o-border-radius: 50px;
    font-weight: bolder;
}
.btn-vote-training:disabled{
    background-color: #A3A3A3  !important;
    color: #57759C !important;
}
</style>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        create_star_rating();
        create_text_date_start();
    });

    function create_star_rating(){
        document.querySelectorAll('.star-rating').forEach(el => {
            const rating = parseFloat(el.getAttribute('data-star'));
            el.style.setProperty('--rating', (rating / 5) * 100 + '%');
            el.style.setProperty('--rating-width', `${(rating / 5) * 100}%`);
        });
    }

</script>

<script>
    function copyLink_map() {
        let link = document.getElementById('link-to-copy').href;
        let tempTextarea = document.createElement('textarea');
        tempTextarea.value = link;

        document.body.appendChild(tempTextarea);

        tempTextarea.select();

        document.execCommand('copy');

        document.body.removeChild(tempTextarea);

        $('#modalCopySuccess').modal('show');

        setTimeout(() => {
        $('#modalCopySuccess').modal('hide');
            
        }, 2000);
    }

    function create_text_date_start(){

        // Friday 19 April 2024 10:30 น. - Friday 19 April 2024 12:30 น.
        let text_date_start = document.querySelector('#text_date_start');

        let all_day = "{{ $appointment->all_day }}";
        let date_start = "{{ $appointment->date_start }}";
        let time_start = "{{ $appointment->time_start }}";
        let date_end = "{{ $appointment->date_end }}";
        let time_end = "{{ $appointment->time_end }}";

        if (all_day === 'Yes') {
            // Case 1: all_day = Yes
            let formattedDate = formatDate_for_appointment(date_start);
            text_date_start.innerHTML = formattedDate;
        } else if (!all_day && date_start === date_end) {
            // Case 2: all_day = null and date_start equals date_end
            let formattedDate = formatDate_for_appointment(date_start);
            let formattedTime = formatTime_for_appointment(time_start) + ' - ' + formatTime_for_appointment(time_end);
            text_date_start.innerHTML = formattedDate + ' ' + formattedTime;
        } else if (!all_day && date_start !== date_end) {
            // Case 3: all_day = null and date_start not equals date_end
            let formattedStartDate = formatDate_for_appointment(date_start);
            let formattedEndDate = formatDate_for_appointment(date_end);
            let formattedStartTime = formatTime_for_appointment(time_start);
            let formattedEndTime = formatTime_for_appointment(time_end);
            text_date_start.innerHTML = `${formattedStartDate} ${formattedStartTime} - ${formattedEndDate} ${formattedEndTime}`;
        }

    }

    function formatDate_for_appointment(dateString) {
        let date = new Date(dateString);
        let options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        return date.toLocaleDateString('en-US', options);
    }

    function formatTime_for_appointment(timeString) {
        // Assuming timeString is in HH:mm format
        let [hours, minutes] = timeString.split(':');
        let period = hours >= 12 ? 'น.' : 'น.';
        hours = hours % 12 || 12; // Convert hours to 12-hour format
        return `${hours}:${minutes} ${period}`;
    }
</script>
@endsection