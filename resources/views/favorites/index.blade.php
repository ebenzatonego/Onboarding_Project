@extends('layouts.theme_user')

@section('content')
<style>
    /* body{
        height: 100dvh;
        overflow: hidden;
    } */
    .row-content{margin: 0 !important;}
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
        .social-media img{
            width: 38px;
            height: 38px;
        }
        .social-media{
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
        .social-media img{
            width:45px;
            height:45px;
        }
        .social-media{
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

    .container-tap input[id="radio-4"]:checked~.glider {
        transform: translateX(300%);
    }

    .container-tap input[id="radio-5"]:checked~.glider {
        transform: translateX(400%);
    }

    .glider {
        position: absolute;
        display: flex;
        height: 38px;
        width: 20%;

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
        text-decoration-line: underline;
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
    }

    @media screen and (min-width: 991px) {
        .profile-company {
            height: 255px;

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
        padding: 0 20px 80px 20px !important;
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
</style>

<style>
    .container-course {
        display: flex;
        flex-wrap: wrap;
    }
    .course-item{
        position: relative;
        padding: 10px;
        border-radius:10px;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        -ms-border-radius:10px;
        -o-border-radius:10px;
        display: flex;
        background-color: #fff;
        border: 0px solid rgba(0, 0, 0, 0);
        box-shadow: 0 0 2rem 0 rgb(136 152 170 / 15%);
        border-radius: 0.25rem;
        margin-bottom:1.5rem;
        

    }
    @media (max-width: 575px) {
       .container-content ,.content-section ,.bottom-content ,.top-content{
        padding-right: 0;
       }
       .bottom-course{
        padding-left: calc(var(--bs-gutter-x, .75rem)) ;
        padding-right: calc(var(--bs-gutter-x, .75rem)) ;
       
    }}
    @media (max-width: 770px) {
        .course-item{
            width: 100% !important;
        }
    }
    @media (min-width: 770px) {
        .container-course{
        display: flex;
        justify-content: space-between;
    }
        .course-item{
            width: 49% !important;
        }
    }
    .course-item img{
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius:10px;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        -ms-border-radius:10px;
        -o-border-radius:10px;
    }
    .course-item .title-course{
        font-size: 12;
        color: #0E2B81;
       -webkit-line-clamp: 2;
        /* autoprefixer: ignore next */
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
        word-break: break-word;
        margin-bottom: 5px;
    }.course-item .detail-course{
        font-size: 10;
        color: #000;
      -webkit-line-clamp: 2;
        /* autoprefixer: ignore next */
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
        word-break: break-word;
        margin-bottom: 5px;

    }
    .category-course{
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
    .category-course span{
        color: #0E2B81;
        border: #0E2B81 1px solid;
        border-radius:50px;
        -webkit-border-radius:50px;
        -moz-border-radius:50px;
        -ms-border-radius:50px;
        -o-border-radius:50px;
        font-size: 9px;
        padding: 2px 10px ;
    }
    .container-course .course-item.bookmark .fav-course{
        display: block !important;
    }
    .fav-course{
        display: none;
        position: absolute;
        top: 0px;
        right: 0px;
    }
</style>

<style>
    .carousel-menu-course .item {
        width: 68px;
        display: flex;
        justify-content: center;
    }

    .icon-menu-course {
        width: 63px;
        height: 63px;
        background-color: #B0C0D5;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all .15s ease-in-out;
    }

    .icon-menu-course img{
        width: 35px!important;
        height: 35px!important;
        object-fit: contain!important;
    }
    .menu-course p{
        color: #B0C0D5;
    }
    .menu-course.active p{
        color: #003781;
    }
    .menu-course.active .icon-menu-course {
        background-color: #003781;
    }.carousel-menu-course {
        display: flex !important; /* To override display:block I added !important */
        flex-direction: row;
        justify-content: center; /* To center the carousel */
    }
</style>

<style>
    .product-item {
        position: relative;
        padding: 10px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        display: flex;
        /* background-color: #fff; */
        border: 0px solid rgba(0, 0, 0, 0);
        box-shadow: 0 0 2rem 0 rgb(136 152 170 / 15%);
        border-radius: 0.25rem;
        margin-bottom: 1.5rem;


    }

    .product-item.yellow {
        background-color: rgba(255, 191, 68, 0.3);
    }

    .product-item.pink {
        background-color: rgba(253, 160, 152, 0.3);

    }

    .product-item.green {
        background-color: rgba(168, 210, 159, 0.3);

    }

    .product-item.blue {
        background-color: rgba(174, 195, 255, 0.3);

    }

    @media (max-width: 770px) {
        .product-item {
            width: 100% !important;
        }
    }

    @media (min-width: 770px) {
        .container-product {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;


        }

        .product-item {
            width: 49% !important;

        }
    }

    .product-item img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
    }

    .product-item .title-product {
        font-size: 12;
        color: #0E2B81;
       -webkit-line-clamp: 2;
        /* autoprefixer: ignore next */
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
        word-break: break-word;
        margin-bottom: 5px;
    }

    .product-item .detail-product {
        font-size: 10;
        color: #000;
       -webkit-line-clamp: 2;
        /* autoprefixer: ignore next */
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
        word-break: break-word;
        margin-bottom: 5px;

    }

    .category-product {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .category-product span {
        color: #0E2B81;
        border: #0E2B81 1px solid;
        border-radius: 50px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
        font-size: 9px;
        padding: 2px 10px;
    }

    .container-product .product-item.bookmark .fav-product {
        display: block !important;
    }

    .fav-product {
        display: none;
        position: absolute;
        top: 0px;
        right: 8px;
    }
</style>


<div class="container p-0 conteiner-detail-news">
    
    <p class="title-tools">รายการที่บันทึกทั้งหมด</p>
    <div class="container-tap d-flex justify-content-center mb-4">
        <div class="tabs">
            <input type="radio" id="radio-1" name="tabs_type_fav" value="ทั้งหมด" checked="" onchange="change_view_fav_type();">
            <label class="tab" for="radio-1">
                ทั้งหมด
            </label>
            <input type="radio" id="radio-2" name="tabs_type_fav" value="ข่าว" onchange="change_view_fav_type();">
            <label class="tab" for="radio-2">
                ข่าวสาร
            </label>
            <input type="radio" id="radio-3" name="tabs_type_fav" value="หลักสูตร" onchange="change_view_fav_type();">
            <label class="tab" for="radio-3">
                หลักสูตร
            </label>
            <input type="radio" id="radio-4" name="tabs_type_fav" value="ผลิตภัณฑ์" onchange="change_view_fav_type();">
            <label class="tab" for="radio-4">
                ผลิตภัณฑ์
            </label>
            <input type="radio" id="radio-5" name="tabs_type_fav" value="กิจกรรม" onchange="change_view_fav_type();">
            <label class="tab" for="radio-5">
                กิจกรรม
            </label>
            <span class="glider"></span>
        </div>
    </div>

    <div id="div_for_fav_training" class="d-none">
        <div class="owl-carousel carousel-menu-course owl-theme owl-loaded owl-drag mb-3">
            <div class="item mx-2" onclick="change_view_item_training('1');">
                <div id="view_item_1" class="menu-course text-center active">
                    <div class="icon-menu-course ">
                        <img src="{{ url('/img/icon/for_page_fav/หลักสูตร.png') }}">
                    </div>
                    <p class="mb-0 mt-2">หลักสูตร</p>
                </div>
            </div>
            <div class="item mx-2" onclick="change_view_item_training('2');">
                <div id="view_item_2" class="menu-course text-center">
                    <div class="icon-menu-course ">
                        <img src="{{ url('/img/icon/for_page_fav/อบรม.png') }}">
                    </div>
                    <p class="mb-0 mt-2">อบรม</p>
                </div>
            </div>
            <div class="item mx-2" onclick="change_view_item_training('3');">
                <div id="view_item_3" class="menu-course text-center">
                    <div class="icon-menu-course ">
                        <img src="{{ url('/img/icon/for_page_fav/สอบ.png') }}">
                    </div>
                    <p class="mb-0 mt-2">สอบ</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function change_view_item_training(type){
            document.querySelector('#view_item_1').classList.remove('active');
            document.querySelector('#view_item_2').classList.remove('active');
            document.querySelector('#view_item_3').classList.remove('active');

            document.querySelector('#view_item_'+type).classList.add('active');

            let item_of_content = document.querySelectorAll('.item_of_content');
                item_of_content.forEach(item_of_content => {
                    item_of_content.classList.add('d-none');
                }) 

            if(type == '1'){
                let item_1 = document.querySelectorAll('[check_sub_type="หลักสูตร"]');
                    item_1.forEach(item_1 => {
                        item_1.classList.remove('d-none');
                    }) 
            }
            else if(type == '2'){
                let item_2 = document.querySelectorAll('[check_sub_type="อบรม"]');
                    item_2.forEach(item_2 => {
                        item_2.classList.remove('d-none');
                    })
            }
            else if(type == '3'){
                let item_3 = document.querySelectorAll('[check_sub_type="สอบ"]');
                    item_3.forEach(item_3 => {
                        item_3.classList.remove('d-none');
                    })
            }
        }
    </script>

    <div class="bottom-course">

        <div id="div_content" class="container-course container-product">
            <!-- div_content -->
        </div>

    </div>

    <script>
        function change_view_fav_type(){
            let tabs_type_fav = document.querySelectorAll('[name="tabs_type_fav"]');
            let tabs_type_fav_value = "" ;
                tabs_type_fav.forEach(tabs_type_fav => {
                    if(tabs_type_fav.checked){
                        tabs_type_fav_value = tabs_type_fav.value;
                    }
                }) 

            let item_of_content = document.querySelectorAll('.item_of_content');
                item_of_content.forEach(item_of_content => {
                    item_of_content.classList.add('d-none');
                }) 

            document.querySelector('#div_for_fav_training').classList.add('d-none');

            if(tabs_type_fav_value == "ทั้งหมด"){
                let item_all = document.querySelectorAll('.item_of_content');
                item_all.forEach(item_all => {
                    item_all.classList.remove('d-none');
                }) 
            }
            else if(tabs_type_fav_value == "ข่าว"){
                let item_news = document.querySelectorAll('[check_type="ข่าว"]');
                item_news.forEach(item_news => {
                    item_news.classList.remove('d-none');
                }) 
            }
            else if(tabs_type_fav_value == "หลักสูตร"){
                document.querySelector('#div_for_fav_training').classList.remove('d-none');
                let item_training = document.querySelectorAll('[check_type="หลักสูตร"]');
                item_training.forEach(item_training => {
                    item_training.classList.remove('d-none');
                })
                change_view_item_training('1');
            }
            else if(tabs_type_fav_value == "ผลิตภัณฑ์"){
                let item_product = document.querySelectorAll('[check_type="ผลิตภัณฑ์"]');
                item_product.forEach(item_product => {
                    item_product.classList.remove('d-none');
                }) 
            }
            else if(tabs_type_fav_value == "กิจกรรม"){
                let item_activity = document.querySelectorAll('[check_type="กิจกรรม"]');
                item_activity.forEach(item_activity => {
                    item_activity.classList.remove('d-none');
                }) 
            }
        }
    </script>

</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    get_data_fav_of_user();
});


function get_data_fav_of_user(){

    fetch("{{ url('/') }}/api/get_data_fav_of_user" + "/" + "{{ Auth::user()->id }}")
        .then(response => response.json())
        .then(result => {
            // console.log(result);

            if(result){

                let div_content = document.querySelector('#div_content');
                    div_content.innerHTML = '' ;

                for (let i = 0; i < result.length; i++) {

                    let textWithoutHtml = ``;
                    if(result[i].detail){
                        textWithoutHtml = result[i].detail.replace(/(<([^>]+)>)/gi, "");
                    }

                    let html = ``;
                    if(result[i].type == "หลักสูตร" || result[i].type == "อบรม/สอบ"){

                        let url = ``;
                        let check_type = ``;
                        let check_sub_type = ``;
                        if(result[i].type == "หลักสูตร"){
                            url = `href="{{ url('/training_show') }}/`+result[i].item_id+`"`;
                            check_type = `check_type="หลักสูตร"`;
                            check_sub_type = `check_sub_type="หลักสูตร"`;
                        }
                        else if(result[i].type == "อบรม/สอบ"){
                            url = `href="{{ url('/show_appointment_train') }}/`+result[i].item_id+`"`;
                            check_type = `check_type="หลักสูตร"`;
                            check_sub_type = `check_sub_type="`+result[i].type_appointments+`"`;
                        }


                        html = `
                            <a `+url+` class="item_of_content course-item bookmark" `+check_type+` `+check_sub_type+`>
                                <img src="`+result[i].photo+`">
                                <div class="ms-3">
                                    <p class="title-course">
                                        `+result[i].title+`
                                    </p>
                                    <p class="detail-course">
                                        `+textWithoutHtml+`
                                    </p>
                                    <div class="category-course">
                                        <span id="span_type_of_training">
                                            #`+result[i].type_article+`
                                        </span>
                                    </div>
                                </div>
                                <div class="fav-course">
                                    <svg width="17" height="22" viewBox="0 0 17 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.0002 0H1.07715C0.524864 0 0.0771484 0.447716 0.0771484 1V20.3889C0.0771484 21.1306 0.856276 21.6141 1.52095 21.285L8.09489 18.0293C8.37455 17.8908 8.70283 17.8908 8.98248 18.0293L15.5564 21.285C16.2211 21.6141 17.0002 21.1306 17.0002 20.3888V1C17.0002 0.447715 16.5525 0 16.0002 0Z" fill="#FFB600"/>
                                        <path d="M6.80604 7.04096L3.85769 7.45107L3.80547 7.46126C3.72641 7.4814 3.65435 7.5213 3.59663 7.57689C3.53891 7.63248 3.4976 7.70178 3.47692 7.7777C3.45625 7.85362 3.45694 7.93344 3.47894 8.00902C3.50094 8.0846 3.54345 8.15322 3.60213 8.20788L5.73807 10.2026L5.23436 13.0201L5.22835 13.0689C5.22351 13.1473 5.24049 13.2256 5.27754 13.2957C5.3146 13.3657 5.3704 13.4251 5.43923 13.4677C5.50807 13.5103 5.58746 13.5345 5.66928 13.538C5.75111 13.5415 5.83242 13.524 5.9049 13.4874L8.54178 12.1573L11.1727 13.4874L11.2189 13.5078C11.2951 13.5366 11.378 13.5455 11.4591 13.5334C11.5401 13.5214 11.6163 13.4888 11.6799 13.4392C11.7435 13.3896 11.7922 13.3246 11.8209 13.2509C11.8497 13.1773 11.8576 13.0976 11.8437 13.0201L11.3395 10.2026L13.4763 8.20744L13.5124 8.16975C13.5639 8.10891 13.5976 8.03606 13.6102 7.95862C13.6228 7.88118 13.6138 7.80193 13.5841 7.72893C13.5543 7.65593 13.505 7.5918 13.441 7.54307C13.377 7.49433 13.3007 7.46274 13.2199 7.45151L10.2715 7.04096L8.95354 4.47834C8.9154 4.40409 8.85636 4.34157 8.7831 4.29785C8.70984 4.25413 8.62529 4.23096 8.53901 4.23096C8.45273 4.23096 8.36818 4.25413 8.29492 4.29785C8.22166 4.34157 8.16262 4.40409 8.12448 4.47834L6.80604 7.04096Z" fill="#8C6400"/>
                                    </svg>
                                </div>
                            </a>
                        `;
                        div_content.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                    }
                    else if(result[i].type == "ข่าว" || result[i].type == "ผลิตภัณฑ์" || result[i].type == "กิจกรรม"){

                        let url = ``;
                        let show_photo = ``;
                        let check_type = ``;
                        if(result[i].type == "ข่าว"){
                            url = `href="{{ url('/news_show') }}/`+result[i].item_id+`"`;
                            show_photo = result[i].photo_cover ;
                            check_type = `check_type="ข่าว"`;
                        }
                        else if(result[i].type == "ผลิตภัณฑ์"){
                            url = `href="{{ url('/product_show') }}/`+result[i].item_id+`"`;
                            show_photo = result[i].photo ;
                            check_type = `check_type="ผลิตภัณฑ์"`;
                        }
                        else if(result[i].type == "กิจกรรม"){
                            url = `href="{{ url('/activitys_show') }}/`+result[i].item_id+`"`;
                            show_photo = result[i].photo ;
                            check_type = `check_type="กิจกรรม"`;
                        }


                        html = `
                            <a `+url+` class="item_of_content product-item bookmark " `+check_type+`>
                                <div class="position-relative">
                                    <img src="`+show_photo+`">
                                    <div class="fav-product">
                                        <svg width="17" height="22" viewBox="0 0 17 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0002 0H1.07715C0.524864 0 0.0771484 0.447716 0.0771484 1V20.3889C0.0771484 21.1306 0.856276 21.6141 1.52095 21.285L8.09489 18.0293C8.37455 17.8908 8.70283 17.8908 8.98248 18.0293L15.5564 21.285C16.2211 21.6141 17.0002 21.1306 17.0002 20.3888V1C17.0002 0.447715 16.5525 0 16.0002 0Z" fill="#FFB600" />
                                            <path d="M6.80604 7.04096L3.85769 7.45107L3.80547 7.46126C3.72641 7.4814 3.65435 7.5213 3.59663 7.57689C3.53891 7.63248 3.4976 7.70178 3.47692 7.7777C3.45625 7.85362 3.45694 7.93344 3.47894 8.00902C3.50094 8.0846 3.54345 8.15322 3.60213 8.20788L5.73807 10.2026L5.23436 13.0201L5.22835 13.0689C5.22351 13.1473 5.24049 13.2256 5.27754 13.2957C5.3146 13.3657 5.3704 13.4251 5.43923 13.4677C5.50807 13.5103 5.58746 13.5345 5.66928 13.538C5.75111 13.5415 5.83242 13.524 5.9049 13.4874L8.54178 12.1573L11.1727 13.4874L11.2189 13.5078C11.2951 13.5366 11.378 13.5455 11.4591 13.5334C11.5401 13.5214 11.6163 13.4888 11.6799 13.4392C11.7435 13.3896 11.7922 13.3246 11.8209 13.2509C11.8497 13.1773 11.8576 13.0976 11.8437 13.0201L11.3395 10.2026L13.4763 8.20744L13.5124 8.16975C13.5639 8.10891 13.5976 8.03606 13.6102 7.95862C13.6228 7.88118 13.6138 7.80193 13.5841 7.72893C13.5543 7.65593 13.505 7.5918 13.441 7.54307C13.377 7.49433 13.3007 7.46274 13.2199 7.45151L10.2715 7.04096L8.95354 4.47834C8.9154 4.40409 8.85636 4.34157 8.7831 4.29785C8.70984 4.25413 8.62529 4.23096 8.53901 4.23096C8.45273 4.23096 8.36818 4.25413 8.29492 4.29785C8.22166 4.34157 8.16262 4.40409 8.12448 4.47834L6.80604 7.04096Z" fill="#8C6400" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <p class="title-product">
                                        `+result[i].title+`
                                    </p>
                                    <p class="detail-product">
                                        `+textWithoutHtml+`
                                    </p>
                                    <div class="category-product">
                                        <span>#`+result[i].name_type+`</span>
                                    </div>
                                </div>
                            </a>
                        `;
                        div_content.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                    }

                }

            }

        });
}
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
@endsection