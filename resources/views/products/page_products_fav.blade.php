@extends('layouts.theme_user')
<style>
    .btn-product {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        border: 1px solid #B8C6D8;
        color: #B8C6D8;
        padding: 2px 10px;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        transition: all .15s ease-in-out;
        margin-right: 5px;
    }

    .btn-product:hover {
        color: #FFFFFF;
        background-color: #003781;
    }
    .btn-product.disabled{
        pointer-events: none;
        opacity: 0.5;
    }
    .btn-product.disabled:hover {
        color: #B8C6D8 !important;
        background-color: #fff;

    }
    .btn-product:hover {
        color: #FFFFFF;
        background-color: #003781;
    }
    .btn-product.active {
        color: #FFFFFF;
        background-color: #003781;
    } .product-item {
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
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        margin-bottom: 5px;
                    }

                    .product-item .detail-product {
                        font-size: 10;
                        color: #000;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
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
                    } @media (max-width: 402px) {
        .btn-product {
            font-size: 10px !important;
        }
    }  @media (max-width: 367px) {
        .btn-product {
            font-size: 9px !important;
        }
    }
</style>
@section('content')
<div class="container mb-5">
    <div class="main-body">
        <div class="row">
            <div class="mt-2 d-flex flex-wrap w-100 d-flex justify-content-center">
                <!-- <a href="" class="d-flex align-items-center" style="color: #003781; font-size: 18px; font-weight: bolder;">
                    <i class="fa-regular fa-chevron-left me-3"></i> <span class="mt-1">กลับหน้ารวมหลักสูตร/อมรม/สอบ</span>
                </a> -->
                <a class="btn-product disabled" href="" type="button">
                    สุขภาพทางการเงิน
                    <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="9" height="11" viewBox="0 0 9 11" fill="none">
                        <path d="M8.14576 0H0.854237C0.381356 0 0 0.331325 0 0.742169V10.2578C0 10.6687 0.381356 11 0.854237 11H8.14576C8.61864 11 9 10.6687 9 10.2578V0.742169C9 0.331325 8.61864 0 8.14576 0ZM8.54237 10.2578C8.54237 10.4434 8.35932 10.6024 8.14576 10.6024H0.854237C0.640678 10.6024 0.457627 10.4434 0.457627 10.2578V0.742169C0.457627 0.556626 0.640678 0.39759 0.854237 0.39759H8.14576C8.35932 0.39759 8.54237 0.556626 8.54237 0.742169V10.2578ZM7.24576 1.06024H1.75424C1.46441 1.06024 1.22034 1.27229 1.22034 1.5241V3.11446C1.22034 3.36627 1.46441 3.57831 1.75424 3.57831H7.24576C7.53559 3.57831 7.77966 3.36627 7.77966 3.11446V1.5241C7.77966 1.27229 7.53559 1.06024 7.24576 1.06024ZM7.32203 3.11446C7.32203 3.15422 7.29153 3.18072 7.24576 3.18072H1.75424C1.70847 3.18072 1.67797 3.15422 1.67797 3.11446V1.5241C1.67797 1.48434 1.70847 1.45783 1.75424 1.45783H7.24576C7.29153 1.45783 7.32203 1.48434 7.32203 1.5241V3.11446ZM2.36441 4.24096H1.75424C1.46441 4.24096 1.22034 4.45301 1.22034 4.70482V5.23494C1.22034 5.48675 1.46441 5.6988 1.75424 5.6988H2.36441C2.65424 5.6988 2.8983 5.48675 2.8983 5.23494V4.70482C2.8983 4.45301 2.65424 4.24096 2.36441 4.24096ZM2.44068 5.23494C2.44068 5.2747 2.41017 5.3012 2.36441 5.3012H1.75424C1.70847 5.3012 1.67797 5.2747 1.67797 5.23494V4.70482C1.67797 4.66506 1.70847 4.63855 1.75424 4.63855H2.36441C2.41017 4.63855 2.44068 4.66506 2.44068 4.70482V5.23494ZM4.80508 4.24096H4.19492C3.90508 4.24096 3.66102 4.45301 3.66102 4.70482V5.23494C3.66102 5.48675 3.90508 5.6988 4.19492 5.6988H4.80508C5.09491 5.6988 5.33898 5.48675 5.33898 5.23494V4.70482C5.33898 4.45301 5.09491 4.24096 4.80508 4.24096ZM4.88136 5.23494C4.88136 5.2747 4.85085 5.3012 4.80508 5.3012H4.19492C4.14915 5.3012 4.11864 5.2747 4.11864 5.23494V4.70482C4.11864 4.66506 4.14915 4.63855 4.19492 4.63855H4.80508C4.85085 4.63855 4.88136 4.66506 4.88136 4.70482V5.23494ZM7.24576 4.24096H6.63559C6.34576 4.24096 6.10169 4.45301 6.10169 4.70482V5.23494C6.10169 5.48675 6.34576 5.6988 6.63559 5.6988H7.24576C7.53559 5.6988 7.77966 5.48675 7.77966 5.23494V4.70482C7.77966 4.45301 7.53559 4.24096 7.24576 4.24096ZM7.32203 5.23494C7.32203 5.2747 7.29153 5.3012 7.24576 5.3012H6.63559C6.58983 5.3012 6.55932 5.2747 6.55932 5.23494V4.70482C6.55932 4.66506 6.58983 4.63855 6.63559 4.63855H7.24576C7.29153 4.63855 7.32203 4.66506 7.32203 4.70482V5.23494ZM2.36441 6.36145H1.75424C1.46441 6.36145 1.22034 6.57349 1.22034 6.8253V7.35542C1.22034 7.60723 1.46441 7.81928 1.75424 7.81928H2.36441C2.65424 7.81928 2.8983 7.60723 2.8983 7.35542V6.8253C2.8983 6.57349 2.65424 6.36145 2.36441 6.36145ZM2.44068 7.35542C2.44068 7.39518 2.41017 7.42169 2.36441 7.42169H1.75424C1.70847 7.42169 1.67797 7.39518 1.67797 7.35542V6.8253C1.67797 6.78554 1.70847 6.75904 1.75424 6.75904H2.36441C2.41017 6.75904 2.44068 6.78554 2.44068 6.8253V7.35542ZM4.80508 6.36145H4.19492C3.90508 6.36145 3.66102 6.57349 3.66102 6.8253V7.35542C3.66102 7.60723 3.90508 7.81928 4.19492 7.81928H4.80508C5.09491 7.81928 5.33898 7.60723 5.33898 7.35542V6.8253C5.33898 6.57349 5.09491 6.36145 4.80508 6.36145ZM4.88136 7.35542C4.88136 7.39518 4.85085 7.42169 4.80508 7.42169H4.19492C4.14915 7.42169 4.11864 7.39518 4.11864 7.35542V6.8253C4.11864 6.78554 4.14915 6.75904 4.19492 6.75904H4.80508C4.85085 6.75904 4.88136 6.78554 4.88136 6.8253V7.35542ZM7.24576 6.36145H6.63559C6.34576 6.36145 6.10169 6.57349 6.10169 6.8253V9.4759C6.10169 9.72771 6.34576 9.93976 6.63559 9.93976H7.24576C7.53559 9.93976 7.77966 9.72771 7.77966 9.4759V6.8253C7.77966 6.57349 7.53559 6.36145 7.24576 6.36145ZM7.32203 9.4759C7.32203 9.51566 7.29153 9.54217 7.24576 9.54217H6.63559C6.58983 9.54217 6.55932 9.51566 6.55932 9.4759V6.8253C6.55932 6.78554 6.58983 6.75904 6.63559 6.75904H7.24576C7.29153 6.75904 7.32203 6.78554 7.32203 6.8253V9.4759ZM2.36441 8.48193H1.75424C1.46441 8.48193 1.22034 8.69398 1.22034 8.94578V9.4759C1.22034 9.72771 1.46441 9.93976 1.75424 9.93976H2.36441C2.65424 9.93976 2.8983 9.72771 2.8983 9.4759V8.94578C2.8983 8.69398 2.65424 8.48193 2.36441 8.48193ZM2.44068 9.4759C2.44068 9.51566 2.41017 9.54217 2.36441 9.54217H1.75424C1.70847 9.54217 1.67797 9.51566 1.67797 9.4759V8.94578C1.67797 8.90602 1.70847 8.87952 1.75424 8.87952H2.36441C2.41017 8.87952 2.44068 8.90602 2.44068 8.94578V9.4759ZM4.80508 8.48193H4.19492C3.90508 8.48193 3.66102 8.69398 3.66102 8.94578V9.4759C3.66102 9.72771 3.90508 9.93976 4.19492 9.93976H4.80508C5.09491 9.93976 5.33898 9.72771 5.33898 9.4759V8.94578C5.33898 8.69398 5.09491 8.48193 4.80508 8.48193ZM4.88136 9.4759C4.88136 9.51566 4.85085 9.54217 4.80508 9.54217H4.19492C4.14915 9.54217 4.11864 9.51566 4.11864 9.4759V8.94578C4.11864 8.90602 4.14915 8.87952 4.19492 8.87952H4.80508C4.85085 8.87952 4.88136 8.90602 4.88136 8.94578V9.4759Z" fill="#B8C6D8" />
                    </svg>
                </a>
                <a class="btn-product " href="{{ url('/page_products') }}">ผลิตภัณฑ์</a>
                <a class="btn-product active" href="{{ url('/page_products_fav') }}">ผลิตภัณฑ์โปรด</a>
            </div>
            <div id="content_list_item_product" class="container-product mt-3">
                <!-- content_list_item_product -->
            </div>
            <style>
                .btn-go-to-top {
                    background-color: #E6E6E6;
                    width: 70px;
                    height: 70px;
                    flex-shrink: 0;
                    border: none !important;
                    border-radius: 50%;
                }

                .text-go-to-top {
                    color: #616161;

                    text-align: center;
                    font-size: 10px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                }
            </style>
            <div id="btn_goto_top" class="d-flex w-100 justify-content-center d-none">
                <button class="btn-go-to-top" onclick="document.body.scrollTop=0;document.documentElement.scrollTop=0;event.preventDefault()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24" fill="none">
                        <path d="M7 22.5391C7 23.0913 7.44772 23.5391 8 23.5391C8.55228 23.5391 9 23.0913 9 22.5391L7 22.5391ZM8.70711 0.293493C8.31658 -0.0970306 7.68342 -0.0970307 7.29289 0.293493L0.928933 6.65746C0.538408 7.04798 0.538408 7.68114 0.928933 8.07167C1.31946 8.46219 1.95262 8.46219 2.34315 8.07167L8 2.41481L13.6569 8.07167C14.0474 8.46219 14.6805 8.46219 15.0711 8.07167C15.4616 7.68115 15.4616 7.04798 15.0711 6.65746L8.70711 0.293493ZM9 22.5391L9 1.0006L7 1.0006L7 22.5391L9 22.5391Z" fill="#616161" />
                    </svg>
                    <p class="m-0 text-go-to-top">กลับด้านบน</p>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        change_active_menu_theme_user('Product');
        get_data_product_fav();
    });

    function get_data_product_fav(){

        fetch("{{ url('/') }}/api/get_data_product_fav/" + "{{ Auth::user()->id }}")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if(result){

                    if(result.length >= 12){
                        document.querySelector('#btn_goto_top').classList.remove('d-none');
                    }
                    else {
                        document.querySelector('#btn_goto_top').classList.add('d-none');
                    }

                    let content_list_item_product = document.querySelector('#content_list_item_product');

                    for (let i = 0; i < result.length; i++) {

                        // Check bookmark
                        let check_fav = ``;
                        let user_id = "{{ Auth::user()->id }}";
                        let user_fav_text  = result[i].user_fav ;
                            // console.log(user_fav_text );

                        if(user_fav_text){
                            let user_fav;
                            try {
                                user_fav = JSON.parse(user_fav_text);
                            } catch (error) {
                                console.error("Error parsing user_fav:", error);
                            }

                            if (user_fav && user_fav.hasOwnProperty(user_id)) {
                                let rounds = user_fav[user_id];

                                for (let round in rounds) {
                                    if (rounds.hasOwnProperty(round)) {
                                        if (rounds[round]['status'] === 'Active') {
                                            check_fav = 'bookmark';
                                            break;
                                        }
                                    }
                                }
                            }
                        }

                        let textWithoutHtml = ``;
                        if(result[i].detail){
                            textWithoutHtml = result[i].detail.replace(/(<([^>]+)>)/gi, "");
                        }

                        let html = `
                            <a href="{{ url('/product_show') }}/`+result[i].id+`" class="product-item `+check_fav+` " style="background-color: `+result[i].color_code+`45;">
                                <div class="position-relative">
                                    <img src="`+result[i].photo+`">
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

                        content_list_item_product.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                    }
                }

            });
    }
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
@endsection