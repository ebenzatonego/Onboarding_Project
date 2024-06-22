@extends('layouts.theme_user')

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
            <!-- <a href="{{ url('/page_activitys') }}" class="btn btn-back-all-course">
                <i class="fa-solid fa-arrow-left"></i>
                <span>กลับหน้ารวมกิจกรรม</span>
            </a> -->

            <a class="btn btn-back-all-course" onclick="window.history.back();">
                <i class="fa-solid fa-arrow-left"></i>
                <span>ย้อนกลับ</span>
            </a>

            <img src="{{ $activity->photo }}" alt="" style="width: 100%;">
            <div class="d-flex justify-content-between">

                <div class="py-3 px-4 w-100 d-flex btn-share-group">
                    @php
                        $check_like = '';
                        $check_disabled_not_like = '';
                        $count_user_like = '0';

                        if( !empty($activity->user_like) ){
                            $array = json_decode($activity->user_like, true);
                            $count_user_like = count($array);
                            if (in_array(Auth::user()->id, $array)) {
                                $check_like = 'active';
                                $check_disabled_not_like = 'disabled';
                            }
                        }

                        $check_dislike = '';
                        $check_disabled_not_dislike = '';

                        if( !empty($activity->user_dislike) ){
                            $array = json_decode($activity->user_dislike, true);

                            if (array_key_exists(Auth::user()->id, $array)) {

                                // ตรวจสอบว่าใน key 1 มี status ที่เป็น 'Active' หรือไม่
                                $has_active_status = false;
                                foreach ($array[1] as $entry) {
                                    if (isset($entry['status']) && $entry['status'] === 'Active') {
                                        $has_active_status = true;
                                        break;
                                    }
                                }

                                if ($has_active_status) {
                                    $check_dislike = 'active';
                                    $check_disabled_not_dislike = 'disabled';
                                }
                            }
                        }


                    @endphp
                    <button class="btn btn-like {{ $check_like }} me-1" {{ $check_disabled_not_dislike }} onclick="action_btnlike_dislike(this.className)">
                        <div class="icon-btn d-flex">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div id="show_count_user_like" class="d-flex align-items-center ms-1">{{ $count_user_like }}</div>

                    </button>
                    <button class="btn btn-dislike {{ $check_dislike }} me-1" {{ $check_disabled_not_like }}  onclick="action_btnlike_dislike(this.className)">
                        <div class="icon-btn">
                            <i class="fa-solid fa-thumbs-down"></i>
                        </div>
                    </button>
                    <button class="btn btn-share me-1"  onclick="click_share_activity();">
                        <i class="fa-solid fa-share m-0"></i>
                    </button>
                </div>

                @php
                    $check_fav = '';

                    if( !empty($activity->user_fav) ){
                        $array = json_decode($activity->user_fav, true);
                        $user_id = Auth::user()->id ;
                        if (array_key_exists($user_id, $array)) {
                            foreach ($array[$user_id] as $round => $details) {
                                if (isset($details['status']) && $details['status'] === 'Active') {
                                    $check_fav = 'active';
                                    break;
                                }
                            }
                        }
                    }
                @endphp

                <div class="{{ $check_fav }} px-2 py-0 d-flex align-items-start btn-bookmark-training cursor-pointer" onclick="action_btnlike_dislike(this.className)">
                    <svg width="33" height="42" viewBox="0 0 33 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="bookmark-bg" d="M31.3077 0H1C0.447715 0 0 0.447716 0 1V40.3889C0 41.1306 0.779123 41.6141 1.44379 41.285L15.71 34.2198C15.9897 34.0813 16.318 34.0813 16.5976 34.2198L30.8639 41.285C31.5286 41.6141 32.3077 41.1306 32.3077 40.3889V1C32.3077 0.447715 31.86 0 31.3077 0Z" fill="#CDCDCD" />
                        <path class="bookmark-icon" d="M12.8462 13.4417L7.21748 14.2246L7.11779 14.2441C6.96687 14.2825 6.82929 14.3587 6.7191 14.4648C6.6089 14.571 6.53004 14.7033 6.49057 14.8482C6.4511 14.9931 6.45243 15.1455 6.49442 15.2898C6.53642 15.4341 6.61757 15.5651 6.7296 15.6695L10.8073 19.4775L9.84567 24.8564L9.8342 24.9495C9.82496 25.0993 9.85737 25.2487 9.92811 25.3825C9.99885 25.5163 10.1054 25.6296 10.2368 25.7109C10.3682 25.7922 10.5198 25.8385 10.676 25.8451C10.8322 25.8518 10.9874 25.8184 11.1258 25.7486L16.1598 23.2093L21.1824 25.7486L21.2707 25.7875C21.4163 25.8425 21.5745 25.8594 21.7292 25.8364C21.8839 25.8134 22.0294 25.7513 22.1508 25.6565C22.2722 25.5618 22.3651 25.4377 22.4201 25.2971C22.475 25.1565 22.49 25.0044 22.4634 24.8564L21.5009 19.4775L25.5804 15.6686L25.6492 15.5967C25.7475 15.4805 25.812 15.3414 25.836 15.1936C25.86 15.0458 25.8428 14.8945 25.786 14.7551C25.7293 14.6157 25.635 14.4933 25.5129 14.4003C25.3907 14.3072 25.2451 14.2469 25.0907 14.2255L19.4621 13.4417L16.9459 8.54942C16.8731 8.40768 16.7604 8.28832 16.6205 8.20485C16.4807 8.12138 16.3193 8.07715 16.1546 8.07715C15.9898 8.07715 15.8284 8.12138 15.6886 8.20485C15.5487 8.28832 15.436 8.40768 15.3632 8.54942L12.8462 13.4417Z" fill="#FBFBFB" />
                    </svg>
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

                @if( !empty($activity->photo_gallery) )

                    @php
                        $urls = $activity->photo_gallery;
                        $urlArray = explode(',', $urls);
                        $check_photo_gallery_1 = 0 ;
                    @endphp

                    <img src="{{ $urlArray[0] }}" class="preview-img" alt="">

                    <div class="row mb-3 row-cols-auto g-2 justify-content-start mt-3">
                        @foreach($urlArray as $item_img)
                            @if( $check_photo_gallery_1 == 0 )
                                <div class="group-img p-1">
                                    <img src="{{ $item_img }}" class="img-news border rounded active" >
                                    <i class="fa-light fa-eye icon-preview"></i>
                                </div>
                                @php $check_photo_gallery_1 = $check_photo_gallery_1 + 1 @endphp
                            @else
                                <div class="group-img p-1">
                                    <img src="{{ $item_img }}" class="img-news border rounded" >
                                    <i class="fa-light fa-eye icon-preview"></i>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <script>
                        const imgNewsElements = document.querySelectorAll('.img-news');

                        imgNewsElements.forEach(imgNews => {
                            imgNews.addEventListener('click', function handleClick() {
                                // Remove the 'active' class from all previously clicked images
                                imgNewsElements.forEach(otherImg => otherImg.classList.remove('active'));

                                // Add the 'active' class to the clicked image
                                this.classList.add('active');

                                // Update the 'src' attribute of the preview image
                                const previewImg = document.querySelector('.preview-img');
                                previewImg.src = this.src;
                            });
                        });
                    </script>

                @endif

                @if( !empty($activity->video))
                <div class="d-flex justify-content-end w-100 mt-4 mb--2" style="color: #989898;">
                    <i class="fa-regular fa-clock me-2"></i>
                    <span id="videoDuration"></span>
                </div>
                <div class="d-flex justify-content-center w-100">
                    <video id="trainingVideo" src="{{ $activity->video }}" controls loop muted style="width:100%;border-radius: 10px; max-width: 700px;margin-top:5px!important;" class="video-preview"></video>
                </div>
                @endif

                <div class="w-100 mt-4">
                    <p class="mb-0" style="color: #989898;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;">ถูกใจกิจกรรมนี้?</p>

                    <div class="d-flex justify-content-end ">
                        <button class="btn btn-like {{ $check_like }}  me-1" {{ $check_disabled_not_dislike }} onclick="action_btnlike_dislike(this.className)">
                            <div class="icon-btn d-flex">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div id="show_count_user_like_2" class="d-flex align-items-center ms-1">{{ $count_user_like }}</div>
    
                        </button>
                        <button class="btn btn-dislike {{ $check_dislike }} me-1" {{ $check_disabled_not_like }} onclick="action_btnlike_dislike(this.className)">
                            <div class="icon-btn">
                                <i class="fa-solid fa-thumbs-down"></i>
                            </div>
                        </button>
                        <button class="btn btn-share me-1" onclick="click_share_activity();">
                            <i class="fa-solid fa-share m-0"></i>
                        </button>

                        <div class="{{ $check_fav }} px-2 py-0 d-flex align-items-start btn-bookmark-training cursor-pointer" onclick="action_btnlike_dislike(this.className)">
                            <svg width="33" height="42" viewBox="0 0 33 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="bookmark-bg" d="M31.3077 0H1C0.447715 0 0 0.447716 0 1V40.3889C0 41.1306 0.779123 41.6141 1.44379 41.285L15.71 34.2198C15.9897 34.0813 16.318 34.0813 16.5976 34.2198L30.8639 41.285C31.5286 41.6141 32.3077 41.1306 32.3077 40.3889V1C32.3077 0.447715 31.86 0 31.3077 0Z" fill="#CDCDCD" />
                                <path class="bookmark-icon" d="M12.8462 13.4417L7.21748 14.2246L7.11779 14.2441C6.96687 14.2825 6.82929 14.3587 6.7191 14.4648C6.6089 14.571 6.53004 14.7033 6.49057 14.8482C6.4511 14.9931 6.45243 15.1455 6.49442 15.2898C6.53642 15.4341 6.61757 15.5651 6.7296 15.6695L10.8073 19.4775L9.84567 24.8564L9.8342 24.9495C9.82496 25.0993 9.85737 25.2487 9.92811 25.3825C9.99885 25.5163 10.1054 25.6296 10.2368 25.7109C10.3682 25.7922 10.5198 25.8385 10.676 25.8451C10.8322 25.8518 10.9874 25.8184 11.1258 25.7486L16.1598 23.2093L21.1824 25.7486L21.2707 25.7875C21.4163 25.8425 21.5745 25.8594 21.7292 25.8364C21.8839 25.8134 22.0294 25.7513 22.1508 25.6565C22.2722 25.5618 22.3651 25.4377 22.4201 25.2971C22.475 25.1565 22.49 25.0044 22.4634 24.8564L21.5009 19.4775L25.5804 15.6686L25.6492 15.5967C25.7475 15.4805 25.812 15.3414 25.836 15.1936C25.86 15.0458 25.8428 14.8945 25.786 14.7551C25.7293 14.6157 25.635 14.4933 25.5129 14.4003C25.3907 14.3072 25.2451 14.2469 25.0907 14.2255L19.4621 13.4417L16.9459 8.54942C16.8731 8.40768 16.7604 8.28832 16.6205 8.20485C16.4807 8.12138 16.3193 8.07715 16.1546 8.07715C15.9898 8.07715 15.8284 8.12138 15.6886 8.20485C15.5487 8.28832 15.436 8.40768 15.3632 8.54942L12.8462 13.4417Z" fill="#FBFBFB" />
                            </svg>
                        </div>

                    </div>
                    <div class="mt-5">
                        <!-- <a href="{{ url('/page_activitys') }}">
                            <i class="fa-solid fa-chevron-left"></i> กลับหน้ารวมกิจกรรม
                        </a> -->
                        <a onclick="window.history.back();">
                            <i class="fa-solid fa-chevron-left"></i> ย้อนกลับ
                        </a>
                    </div>
                </div>
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
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rating">
  Launch demo modal
</button> -->
<div class="modal fade" id="rating" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-vote-training">
            <p class="text-white text-center mb-5 font-20">ให้คะแนนผลิตภัณฑ์นี้</p>
            <div class="w-100 d-flex justify-content-center">
                
                <div id="rating_input">
                    <div class="rating-group">
                        <input disabled  class="rating__input rating__input--none" name="rating" id="rating3-none" value="0" type="radio">
                        
                        <label aria-label="1 star" class="rating__label" for="rating3-1">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text" >1</p>
                            </div>
                        </label>
                        <input class="rating__input" checked name="rating" id="rating3-1" value="1" type="radio">

                        <label aria-label="2 stars" class="rating__label" for="rating3-2">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text" >2</p>
                            </div>
                        </label>
                        <input class="rating__input" checked name="rating" id="rating3-2" value="2" type="radio">
                        
                        <label aria-label="3 stars" class="rating__label" for="rating3-3">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text" >3</p>
                            </div>
                        </label>
                        <input class="rating__input" checked name="rating" id="rating3-3" value="3" type="radio">
                        
                        <label aria-label="4 stars" class="rating__label" for="rating3-4">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text" >4</p>
                            </div>
                        </label>
                        <input class="rating__input" checked name="rating" id="rating3-4" value="4" type="radio">
                        
                        <label aria-label="5 stars" class="rating__label" for="rating3-5">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text" >5</p>
                            </div>
                        </label>
                        <input class="rating__input" checked name="rating" id="rating3-5" value="5" type="radio">
                    </div>
                </div>
               
            </div>
            
            <div class="w-100 px-5 mt-3">
                <button class="btn w-100 bg-white btn-vote-training" data-dismiss="modal" aria-label="Close" onclick="getRating('{{ $activity->id }}')">ให้คะแนน</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="dislike_training" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-vote-training">
            <p class="text-white text-center mb-5 font-20">ให้เหตุผลที่ไม่ชอบผลิตภัณฑ์นี้</p>
            <div class="w-100 d-flex justify-content-center px-4 mb-2">
                <textarea class="form-control" id="reasons_dislike" placeholder="กรอกเหตุผลที่ไม่ชอบผลิตภัณฑ์นี้" rows="5" style="border-radius: 10px;" oninput="check_reasons_dislike()"></textarea>
            </div>
            
            <div class="w-100 px-4 mt-4">
                <button class="btn w-100 bg-white btn-vote-training" id="btn_submit_reasons_dislike" disabled onclick="submit_reasons_dislike();">ส่งเหตุผล</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCopySuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content mx-5" style="border-radius: 10px;border: 1px solid #D6D6D6;background: #FFF;box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.50);">
      <div class="modal-body text-center pt-4">
        <svg svg xmlns="http://www.w3.org/2000/svg" width="93" height="92" viewBox="0 0 93 92" fill="none">
            <path d="M46.5 89.5692C52.3449 89.5767 58.1337 88.4475 63.5337 86.2466C68.9337 84.0457 73.8384 80.8164 77.9659 76.7444C82.1043 72.6832 85.3863 67.8572 87.6231 62.5439C89.8599 57.2306 91.0075 51.5348 91 45.7837C91.0074 40.0326 89.8598 34.3368 87.6229 29.0235C85.3861 23.7102 82.1042 18.8842 77.9659 14.8229C73.8384 10.7509 68.9337 7.52163 63.5337 5.32072C58.1337 3.11981 52.3449 1.99063 46.5 1.99808C40.6551 1.99075 34.8663 3.11998 29.4664 5.32089C24.0664 7.52179 19.1617 10.751 15.0341 14.8229C10.8957 18.8842 7.61387 23.7102 5.37705 29.0235C3.14024 34.3368 1.99259 40.0326 2.00004 45.7837C1.99246 51.5348 3.14006 57.2306 5.37688 62.5439C7.6137 67.8572 10.8956 72.6832 15.0341 76.7444C19.1617 80.8163 24.0664 84.0455 29.4664 86.2464C34.8663 88.4473 40.6551 89.5766 46.5 89.5692Z" stroke="#0E2B81" stroke-width="4" stroke-linejoin="round"/>
            <path d="M28.6992 45.7836L42.0492 58.9193L68.7492 32.6479" stroke="#0E2B81" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <p style="color: #0E2B81;font-size: 16px;font-style: normal;font-weight: 600;line-height: normal;margin-top: 20px;">คัดลอกสำเร็จ !</p>
      </div>
    </div>
  </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        if(document.getElementById('trainingVideo')){
            var video = document.getElementById('trainingVideo');
            video.addEventListener('loadedmetadata', function() {
                var duration = video.duration;
                var hours = Math.floor(duration / 3600);
                var minutes = Math.floor((duration % 3600) / 60);
                var seconds = Math.floor(duration % 60);

                var formattedDuration = "";
                if (hours > 0) {
                    formattedDuration += hours + " ชั่วโมง ";
                }
                if (minutes > 0) {
                    formattedDuration += minutes + " นาที ";
                }
                if (seconds > 0 || (hours === 0 && minutes === 0)) { // เพื่อให้แสดงวินาทีเสมอถ้าไม่มีชั่วโมงและนาที
                    formattedDuration += seconds + " วินาที";
                }

                document.getElementById('videoDuration').innerText = formattedDuration;
            });
        }

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        create_star_rating();
        update_user_view();
        change_active_menu_theme_user('News');
        create_text_date_start();
    });

    function create_star_rating(){
        document.querySelectorAll('.star-rating').forEach(el => {
            const rating = parseFloat(el.getAttribute('data-star'));
            el.style.setProperty('--rating', (rating / 5) * 100 + '%');
            el.style.setProperty('--rating-width', `${(rating / 5) * 100}%`);
        });
    }

    function update_user_view(){
        let activity_id = "{{ $activity->id }}";

        fetch("{{ url('/') }}/api/update_user_view_activity/" + "{{ Auth::user()->id }}" + "/" + activity_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
            });
    }

    var old_count_user_like = "{{ $count_user_like }}";
    var check_user_like = "{{ $check_like }}" ;

    function action_btnlike_dislike(className) {

        if (className.includes('btn-like')) {
            // console.log('btn-like');
            document.querySelectorAll('.btn-like').forEach(function(element) {element.classList.toggle('active');});

            let new_count ;

            if (!className.includes('active')) {
                $('#rating').modal('show');

                if(check_user_like == 'active'){
                    new_count = parseInt(old_count_user_like) ;
                }else{
                    new_count = parseInt(old_count_user_like) + 1 ;
                }

                document.querySelectorAll('.btn-dislike').forEach(
                    function(element) {
                        element.setAttribute('disabled' , '');
                    }
                );
            }
            else{
                if(check_user_like == 'active'){
                    new_count = parseInt(old_count_user_like) - 1 ;
                }else{
                    new_count = parseInt(old_count_user_like) ;
                }
                // console.log('ยกเลิกไลก์');
                user_cancel_like();
                document.querySelectorAll('.btn-dislike').forEach(
                    function(element) {
                        element.removeAttribute('disabled');
                    }
                );

            }
            document.querySelector('#show_count_user_like').innerHTML = new_count ;
            document.querySelector('#show_count_user_like_2').innerHTML = new_count ;
            
        }
        else if (className.includes('btn-dislike')){
            // console.log('btn-dislike');
            document.querySelectorAll('.btn-dislike').forEach(function(element) {element.classList.toggle('active');});

            if (!className.includes('active')) {
                $('#dislike_training').modal('show');
                document.querySelectorAll('.btn-like').forEach(
                    function(element) {
                        element.setAttribute('disabled' , '');
                    }
                );
            }
            else{
                console.log('ยกเลิกไม่ถูกใจ');
                user_cancel_dislike();
                document.querySelectorAll('.btn-like').forEach(
                    function(element) {
                        element.removeAttribute('disabled');
                    }
                );
            }

        }else{
            document.querySelectorAll('.btn-bookmark-training').forEach(function(element) {element.classList.toggle('active');});
            document.querySelectorAll('.btn-bookmark').forEach(function(element) {element.classList.toggle('active');});

            let activity_id = "{{ $activity->id }}";

            if (!className.includes('active')) {
                // console.log('FAV');
                user_click_fav_btn('Yes' , activity_id);
            }
            else{
                // console.log('ยกเลิก FAV');
                user_click_fav_btn('No' , activity_id);
            }
        }
    }


    function check_reasons_dislike() {
        let textarea = document.getElementById('reasons_dislike');

        if (textarea && textarea.value.trim()) {
            document.getElementById("btn_submit_reasons_dislike").disabled = false;
            
        } else {
            document.getElementById("btn_submit_reasons_dislike").disabled = true;

        }
    }
    function getRating(activity_id) {
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        let selectedRating = 0;
        for (const input of ratingInputs) {
            if (input.checked) {
                selectedRating = input.value;
                break;
            }
        }

        // console.log("activity_id >> " + activity_id);
        // console.log(selectedRating);

        fetch("{{ url('/') }}/api/give_rating_activity/" + "{{ Auth::user()->id }}" + "/" + activity_id + "/" + selectedRating)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                let sum_rating_span = document.querySelector('#sum_rating_span');
                let sum_rating_i = document.querySelector('#sum_rating_i');
                    sum_rating_span.innerHTML = result ;
                    sum_rating_i.setAttribute('data-star' , result);

                create_star_rating();
            });

    }

    function user_cancel_like(){

        let activity_id = "{{ $activity->id }}";
        // console.log(activity_id);
        fetch("{{ url('/') }}/api/user_cancel_like_activity/" + "{{ Auth::user()->id }}" + "/" + activity_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                let sum_rating_span = document.querySelector('#sum_rating_span');
                let sum_rating_i = document.querySelector('#sum_rating_i');
                    sum_rating_span.innerHTML = result ;
                    sum_rating_i.setAttribute('data-star' , result);

                create_star_rating();
            });
    }

    function user_cancel_dislike(){
        let activity_id = "{{ $activity->id }}";
        // console.log(activity_id);
        fetch("{{ url('/') }}/api/user_cancel_dislike_activity/" + "{{ Auth::user()->id }}" + "/" + activity_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
            });
    }

    function submit_reasons_dislike(){

        let reasons_dislike = document.querySelector('#reasons_dislike').value
        let activity_id = "{{ $activity->id }}";
        // console.log(activity_id);
        fetch("{{ url('/') }}/api/submit_reasons_dislike_activity/" + "{{ Auth::user()->id }}" + "/" + activity_id + "/" + reasons_dislike)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
            });

        $('#dislike_training').modal('hide');
        
    }

    function user_click_fav_btn(type , activity_id){

        fetch("{{ url('/') }}/api/user_click_fav_btn_activity/" + "{{ Auth::user()->id }}" + "/" + activity_id + "/" + type)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
            });
    }
</script>

<script>
    
    function click_share_activity(){
        let activity_id = "{{ $activity->id }}";

        let tag_a_share_line = document.querySelector('#tag_a_share_line');
        let tag_a_share_facebook = document.querySelector('#tag_a_share_facebook');
        let tag_a_share_twitter = document.querySelector('#tag_a_share_twitter');
        let tag_a_share_whatsapp = document.querySelector('#tag_a_share_whatsapp');
        let input_for_copy = document.querySelector('#input_for_copy_Share_social_media');
        let btn_for_copy_Share = document.querySelector('#btn_for_copy_Share');

        let url = "{{ url('/') }}/" + "share_activity/" + activity_id ;

        tag_a_share_line.setAttribute('href' , 'https://social-plugins.line.me/lineit/share?url=' + url);
        tag_a_share_facebook.setAttribute('href' , 'https://www.facebook.com/sharer/sharer.php?u=' + url);
        tag_a_share_twitter.setAttribute('href' , 'https://twitter.com/intent/tweet?url=' + url);
        tag_a_share_whatsapp.setAttribute('href' , 'https://api.whatsapp.com/send?text=' + url);
        input_for_copy.value = url ;

        tag_a_share_line.setAttribute('onclick' , "save_log_share('activitys' , 'line' , '"+activity_id+"')");
        tag_a_share_facebook.setAttribute('onclick' , "save_log_share('activitys' , 'facebook' , '"+activity_id+"')");
        tag_a_share_twitter.setAttribute('onclick' , "save_log_share('activitys' , 'twitte' , '"+activity_id+"')");
        tag_a_share_whatsapp.setAttribute('onclick' , "save_log_share('activitys' , 'whatsapp' , '"+activity_id+"')");
        input_for_copy.setAttribute('onclick' , "save_log_share('activitys' , 'copy' , '"+activity_id+"')");
        btn_for_copy_Share.setAttribute('onclick' , "copy_Share_social_media();save_log_share('activitys' , 'copy' , '"+activity_id+"')");
        

        document.querySelector('#btn_modal_Share_social_media').click();
    }

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

<!-- นับเวลาวิดีโอ -->
<script>
    if(document.getElementById('trainingVideo')){

        const video = document.getElementById('trainingVideo');
        let countTime = 0;
        let interval;

        // ฟังก์ชั่นเพื่อเริ่มนับเวลา
        function startCountTime() {
            interval = setInterval(() => {
                countTime += 1;
                // console.log('Elapsed time:', countTime);
            }, 1000); // เพิ่มค่าทีละ 1 วินาที
        }

        // ฟังก์ชั่นเพื่อหยุดนับเวลา
        function stopCountTime() {
            clearInterval(interval);
        }

        // จับเหตุการณ์เมื่อวิดีโอเริ่มเล่น
        video.addEventListener('play', () => {
            startCountTime();
        });

        // จับเหตุการณ์เมื่อวิดีโอหยุด
        video.addEventListener('pause', () => {
            stopCountTime();
        });

        // จับเหตุการณ์เมื่อวิดีโอสิ้นสุดการเล่น
        video.addEventListener('ended', () => {
            stopCountTime();
        });

        // ก่อนปิดหน้าหรือเปลี่ยนหน้า
        window.addEventListener('beforeunload', function(e) {
            // console.log(countTime);
            let activity_id = "{{ $activity->id }}";

            if(countTime > 0){
                fetch("{{ url('/') }}/api/update_countTime_activityVideo/" + "{{ Auth::user()->id }}" + "/" + countTime + "/" + activity_id)
                    .then(response => response.text())
                    .then(result => {
                        // console.log(result);
                    });
            }
        });
    }
</script>
@endsection