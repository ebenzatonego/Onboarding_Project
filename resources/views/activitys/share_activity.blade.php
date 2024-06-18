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

            <img src="{{ $activity->photo }}" alt="" style="width: 100%;">
            <div class="d-flex justify-content-between">

                <div class="py-3 px-4 w-100 d-flex btn-share-group">
                    @php
                        $count_user_like = '0';

                        if( !empty($activity->user_like) ){
                            $array = json_decode($activity->user_like, true);
                            $count_user_like = count($array);
                        }


                    @endphp
                    <button class="btn btn-like me-1" disabled onclick="action_btnlike_dislike(this.className)">
                        <div class="icon-btn d-flex">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div id="show_count_user_like" class="d-flex align-items-center ms-1">{{ $count_user_like }}</div>

                    </button>
                </div>
            </div>
            <div class="px-4 title-training">
                <div>
                    <p class="mb-2" style="color: #003781;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">{{ $activity->title }}</p>
                </div>
                <div class="hastag-training">
                    @php
                        $activity_type = App\Models\Activity_type::where('id' ,$activity->activity_type_id)->first();
                    @endphp
                    <span>#{{ $activity_type->name_type }}</span>
                </div>
                @if( !empty($activity->sum_rating) )
                <div class="rating-training mt-2">
                    <span id="sum_rating_span" style="color: #EDB529;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;margin-right: 5px;">{{ $activity->sum_rating }}</span>
                    <i id="sum_rating_i" data-star="{{ $activity->sum_rating }}" class="star-rating"></i>
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

            <!-- if ถ้ามี รายละเอียดการเข้าอบรม -->
            <div class="my-3">
                <div class="d-flex ">
                    <div>
                        <p class="m-0 mb-2" style="color: #003781;font-size: 15px;font-style: normal;font-weight: 600;line-height: normal;">
                            <i class="fa-light fa-location-dot me-2"></i>
                            {!! $activity->location_detail !!}
                        </p>
                        <a href="{{ $activity->link_map }}" target="bank" id="link-to-copy" style="color: #0872FF;font-size: 10px;font-style: normal;font-weight: 600;line-height: normal;text-decoration-line: underline;">
                            {{ $activity->link_map }}
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
                    {!! $activity->detail !!}
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
    
    function create_text_date_start(){

        // Friday 19 April 2024 10:30 น. - Friday 19 April 2024 12:30 น.
        let text_date_start = document.querySelector('#text_date_start');

        let all_day = "{{ $activity->all_day }}";
        let date_start = "{{ $activity->date_start }}";
        let time_start = "{{ $activity->time_start }}";
        let date_end = "{{ $activity->date_end }}";
        let time_end = "{{ $activity->time_end }}";

        if (all_day === 'Yes') {
            // Case 1: all_day = Yes
            let formattedDate = formatDate_for_activity(date_start);
            text_date_start.innerHTML = formattedDate;
        } else if (!all_day && date_start === date_end) {
            // Case 2: all_day = null and date_start equals date_end
            let formattedDate = formatDate_for_activity(date_start);
            let formattedTime = formatTime_for_activity(time_start) + ' - ' + formatTime_for_activity(time_end);
            text_date_start.innerHTML = formattedDate + ' ' + formattedTime;
        } else if (!all_day && date_start !== date_end) {
            // Case 3: all_day = null and date_start not equals date_end
            let formattedStartDate = formatDate_for_activity(date_start);
            let formattedEndDate = formatDate_for_activity(date_end);
            let formattedStartTime = formatTime_for_activity(time_start);
            let formattedEndTime = formatTime_for_activity(time_end);
            text_date_start.innerHTML = `${formattedStartDate} ${formattedStartTime} - ${formattedEndDate} ${formattedEndTime}`;
        }

    }

    function formatDate_for_activity(dateString) {
        let date = new Date(dateString);
        let options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        return date.toLocaleDateString('en-US', options);
    }

    function formatTime_for_activity(timeString) {
        // Assuming timeString is in HH:mm format
        let [hours, minutes] = timeString.split(':');
        let period = hours >= 12 ? 'น.' : 'น.';
        hours = hours % 12 || 12; // Convert hours to 12-hour format
        return `${hours}:${minutes} ${period}`;
    }
</script>
@endsection