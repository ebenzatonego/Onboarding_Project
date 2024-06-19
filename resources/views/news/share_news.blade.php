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

    /*  photo_gallery  */
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

<div class="container p-0 conteiner-detail-training">
    <div class="row">
        <div class="col-lg-5 col-md-5 p-0" style="position: relative;">
            <!-- <a href="{{ url('/training') }}" class="btn btn-back-all-course">
                <i class="fa-solid fa-arrow-left"></i>
                <span>กลับหน้ารวมหลักสูตร</span>
            </a> -->
            @if( $news->select_content_show == 'photo' )
                <img src="{{ $news->photo_cover }}" alt="" style="width: 100%;">
            @else
                <video src="{{ $news->video }}" controls loop muted style="width:100%;border-radius: 10px; max-width: 700px;margin-top:5px!important;" class=""></video>
            @endif
            <div class="d-flex justify-content-between">

                <div class="py-3 px-4 w-100 d-flex btn-share-group">
                    @php
                        $count_user_like = '0';

                        if( !empty($news->user_like) ){
                            $array = json_decode($news->user_like, true);
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
                    <p class="mb-2" style="color: #003781;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">{{ $news->title }}</p>
                </div>
                <div class="hastag-training">
                    @php
                        $news_type = App\Models\News_type::where('id' ,$news->news_type_id)->first();
                    @endphp
                    <span>#{{ $news_type->name_type }}</span>
                </div>
                @if( !empty($news->sum_rating) )
                <div class="rating-training mt-2">
                    <span id="sum_rating_span" style="color: #EDB529;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;margin-right: 5px;">{{ $news->sum_rating }}</span>
                    <i id="sum_rating_i" data-star="{{ $news->sum_rating }}" class="star-rating"></i>
                </div>
                @endif

                @php
                    $date = new DateTime($news->updated_at);
                    $formatted_updated_at = $date->format('d/m/Y  |  g.i A');
                @endphp
                <p class="mt-3 mb-3">Update : {{ $formatted_updated_at }}</p>
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
    
            <div class="detail-training">
                <p class="mt-2">
                    {!! $news->detail !!}
                </p>

                @if( !empty($news->photo_gallery) )

                    @php
                        $urls = $news->photo_gallery;
                        $urlArray = explode(',', $urls);
                    @endphp

                    <img src="{{ $urlArray[0] }}" class="preview-img" alt="">

                    <div class="row mb-3 row-cols-auto g-2 justify-content-start mt-3">
                        @foreach($urlArray as $item_img)
                        <div class="group-img ">
                            <img src="{{ $item_img }}" class="img-news border rounded active" alt="">
                            <i class="fa-light fa-eye icon-preview"></i>
                        </div>
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

                @if( !empty($news->video))
                <div class="d-flex justify-content-end w-100 mt-4 mb--2" style="color: #989898;">
                    <i class="fa-regular fa-clock me-2"></i>
                    <span id="videoDuration"></span>
                </div>
                <div class="d-flex justify-content-center w-100">
                    <video id="trainingVideo" src="{{ $news->video }}" controls loop muted style="width:100%;border-radius: 10px; max-width: 700px;margin-top:5px!important;" class="video-preview"></video>
                </div>
                @endif

                <div class="w-100 mt-4">
                    <p class="mb-0" style="color: #989898;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;">ถูกใจหลักสูตรนี้?</p>

                    <div class="d-flex justify-content-end ">
                        <button class="btn btn-like me-1" disabled onclick="action_btnlike_dislike(this.className)">
                            <div class="icon-btn d-flex">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div id="show_count_user_like_2" class="d-flex align-items-center ms-1">{{ $count_user_like }}</div>
                        </button>

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
    });

    function create_star_rating(){
        document.querySelectorAll('.star-rating').forEach(el => {
            const rating = parseFloat(el.getAttribute('data-star'));
            el.style.setProperty('--rating', (rating / 5) * 100 + '%');
            el.style.setProperty('--rating-width', `${(rating / 5) * 100}%`);
        });
    }

</script>

@endsection