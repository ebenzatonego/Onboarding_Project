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

            <img src="{{ $product->photo }}" alt="" style="width: 100%;">
            <div class="d-flex justify-content-between">

                <div class="py-3 px-4 w-100 d-flex btn-share-group">
                    @php
                        $count_user_like = '0';

                        if( !empty($product->user_like) ){
                            $array = json_decode($product->user_like, true);
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
                    <p class="mb-2" style="color: #003781;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">{{ $product->title }}</p>
                </div>
                <div class="hastag-training">
                    @php
                        $product_type = App\Models\Product_type::where('id' ,$product->product_type_id)->first();
                    @endphp
                    <span>#{{ $product_type->name_type }}</span>
                </div>
                @if( !empty($product->sum_rating) )
                <div class="rating-training mt-2">
                    <span id="sum_rating_span" style="color: #EDB529;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;margin-right: 5px;">{{ $product->sum_rating }}</span>
                    <i id="sum_rating_i" data-star="{{ $product->sum_rating }}" class="star-rating"></i>
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
            .btn-download-pdf {
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
            .btn-download-pdf:hover {
                color: #fff;

            }
        </style>
        <div class="col-lg-7 col-md-7 px-4 mb-5">
            
            <div class="detail-training">
                <p class="mt-4">
                    {!! $product->detail !!}
                </p>

                @if( !empty($product->pdf_file) )
                <button class="btn w-100 btn-download-pdf my-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="27" viewBox="0 0 23 27" fill="none">
                        <path d="M6.70089 10.082C6.59278 10.082 6.44864 10.082 6.23242 10.1157V12.4086C6.4126 12.4086 6.52071 12.4086 6.66485 12.4086C7.09729 12.4086 7.38557 12.2737 7.56575 12.004C7.7099 11.8017 7.78197 11.5319 7.78197 11.1947C7.78197 10.4192 7.42161 10.082 6.70089 10.082Z" fill="white"/>
                        <path d="M3.38594 10.082C3.27784 10.082 3.13369 10.082 3.09766 10.082V11.0262C3.13369 11.0262 3.27784 11.0599 3.34991 11.0599C4.07063 11.0599 4.1427 10.7901 4.1427 10.5541C4.1427 10.4192 4.1427 10.082 3.38594 10.082Z" fill="white"/>
                        <path d="M13.4765 9.20462C13.4765 8.49653 12.8639 7.95703 12.1431 7.95703H1.69271C0.935951 7.95703 0.359375 8.53025 0.359375 9.20462V13.3183C0.359375 14.0264 0.971987 14.5659 1.69271 14.5659H12.1431C12.8999 14.5659 13.4765 13.9927 13.4765 13.3183V9.20462ZM4.50351 11.4638C4.17919 11.6998 3.78279 11.8009 3.27829 11.8009C3.20622 11.8009 3.09811 11.8009 3.09811 11.8009V13.2171H2.23325V9.44065L2.41343 9.40693C2.77379 9.33949 3.13415 9.30577 3.42243 9.30577C3.92694 9.30577 4.32333 9.40693 4.57558 9.60924C4.86387 9.84527 5.04405 10.115 5.04405 10.4859C5.00802 10.9243 4.86387 11.2277 4.50351 11.4638ZM8.21522 12.509C7.85486 12.9137 7.31432 13.1497 6.5936 13.1497C6.37738 13.1497 6.05306 13.116 5.58459 13.0823L5.47648 13.0485V9.44065L5.58459 9.40693C6.16117 9.33949 6.52153 9.30577 6.73774 9.30577C7.42243 9.30577 7.92693 9.50808 8.25125 9.87899C8.53954 10.1825 8.64765 10.6208 8.64765 11.1266C8.64765 11.7335 8.50351 12.1718 8.21522 12.509ZM11.6026 10.115H9.87287V10.8231H11.4585V11.6324H9.87287V13.2171H8.97197V9.40693H11.6026V10.115Z" fill="white"/>
                        <path d="M14.198 0V0.0337186H4.5764C3.81964 0.0337186 3.20703 0.573215 3.20703 1.24759V7.31693H4.32415V1.88824C4.32415 1.41618 4.72054 1.04528 5.22505 1.04528H14.198V6.94602C14.198 7.62039 14.8106 8.22733 15.5313 8.22733H21.8376V22.6926C21.8376 23.1646 21.4412 23.5356 20.9367 23.5356H16.9007C16.8647 23.5693 16.8647 23.603 16.8286 23.6367L16.0719 24.5471H21.5854C22.3421 24.5471 22.9187 23.9739 22.9187 23.2658V8.19361L14.198 0Z" fill="white"/>
                        <path d="M9.26108 23.5693H5.22505C4.72054 23.5693 4.32415 23.1984 4.32415 22.7263V15.1396H3.20703V23.2995C3.20703 24.0076 3.81964 24.5808 4.5764 24.5808H10.0899L9.33315 23.6704C9.33315 23.6367 9.29711 23.603 9.26108 23.5693Z" fill="white"/>
                        <path d="M15.9999 22.7938H14.5585V18.1406C14.5585 17.8371 14.3062 17.5674 13.9819 17.5674H12.1801C11.8558 17.5674 11.5675 17.8371 11.5675 18.1406V22.7938H10.1261C9.83777 22.7938 9.65759 23.0972 9.83777 23.2995L12.7567 26.8737C12.9008 27.0423 13.1891 27.0423 13.3333 26.8737L16.2522 23.2995C16.4684 23.0972 16.2882 22.7938 15.9999 22.7938Z" fill="white"/>
                    </svg>
                    ดาวน์โหลด PDF
                </button>
                @endif

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