@extends('layouts.theme_user')
@section('content')
<style>
    .carousel-fav-course .item {
        height: 311px;
        min-width: 311px;
        color: #fff;

    }

    .container-img::after {
        /* box-shadow: inset 3px 3px 10px 0 #000000; */
        content: '';
        display: block;
        height: 100%;
        position: absolute;
        top: 0;
        width: 100%;
        -webkit-box-shadow: inset 0px -116px 64px -31px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: inset 0px -116px 64px -31px rgba(0, 0, 0, 0.75);
        box-shadow: inset 0px -116px 64px -31px rgba(0, 0, 0, 0.75);
        border-radius: 15px !important;
        -webkit-border-radius: 15px !important;
        -moz-border-radius: 15px !important;
        -ms-border-radius: 15px !important;
        -o-border-radius: 15px !important;
    }

    .carousel-fav-course .item img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 10px;
    }

    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots .owl-dot:hover span {
        background: #003781;
    }

    .btn-filter-news {
        background-color: #fff !important;
        color: #B8C6D8 !important;
        border: 1px solid #B8C6D8 !important;
        border-radius: 50px !important;
        -webkit-border-radius: 50px !important;
        -moz-border-radius: 50px !important;
        -ms-border-radius: 50px !important;
        -o-border-radius: 50px !important;
        font-size: 14px !important;
        font-weight: bold !important;
        width: 100% !important;
        text-align: center;
        margin-right: 10px !important;
    }

    .btn-filter-news.active {
        background-color: #243286 !important;
        color: #fff !important;
        border: 1px solid #243286 !important;
    }

    .nav-item {
        width: 50% !important;
    }

    .carousel-menu-course .item {
        width: 63px;
        display: flex;
        justify-content: center;
    }


    .menu-course p {
        color: #B0C0D5;
        font-weight: bolder;
    }

    .menu-course.active p {
        color: #003781;
    }

    .course-item {
        position: relative;
        padding: 10px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        display: flex;
        background-color: #fff;
        border: 0px solid rgba(0, 0, 0, 0);
        box-shadow: 0 0 2rem 0 rgb(136 152 170 / 15%);
        border-radius: 0.25rem;
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    .course-item img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
    }

    .course-item .title-course {
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

    .course-item .detail-course {
        font-size: 10;
        color: #000;
        -webkit-line-clamp: 2;
        /* autoprefixer: ignore next */
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
        word-break: break-word;
    }

    .category-course {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .category-course span {
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

    .container-course .course-item.bookmark-new .fav-course,
    .container-course .course-item.bookmark-event .fav-event {
        display: block !important;
    }

    .fav-course {
        display: none;
        position: absolute;
        top: 0px;
        right: 0px;
    }

    .fav-event {
        display: none;
        position: absolute;
        top: 0px;
        right: 10px;
    }

    .event-detail p {
        color: rgba(0, 0, 0, 0.67);
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin: 0;
    }

    .carousel-menu-course {
        display: flex !important;
        /* To override display:block I added !important */
        flex-direction: row;
        justify-content: center;
        /* To center the carousel */
    }

    @media (max-width: 770px) {
        .course-item {
            width: 100% !important;
        }
    }

    @media (min-width: 770px) {

        .container-course {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .course-item {
            width: 49% !important;
        }
    }

    .detail-on-img {
        position: absolute;
        bottom: -10%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 0 10px 0 25px;

    }

    .detail-on-img p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100%;
    }

    @media (max-width:347px) {
        .btn-filter-news {
            font-size: 10px !important;
        }

    }

    @media (max-width:379px) {
        .btn-filter-news {
            font-size: 12px !important;
        }
    }@media (max-width: 375px) {

.carousel-fav-course .item {
    height: 300px !important;
    min-width: 300px !important;
    color: #fff;

}


}
@media (max-width: 378px) {

    .btn-filter-news {
        font-size: 10px !important;
    }

}
</style>

<div class="tab-content container mt-2" id="pills-tabContent">
    <div class="d-flex justify-content-center m-0 p-0">
        <div class="col-md-6 col-12">
            <ul class="nav nav-pills w-100 d-flex justify-content-center w-100" id="pills-tab" role="tablist">
                <li class="nav-item px-1">
                    <a class="nav-link active btn-filter-news" id="pills-news-tab" data-toggle="pill" href="#pills-news" role="tab" aria-controls="pills-news" aria-selected="true">ข่าวสาร/การแข่งขัน</a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link btn-filter-news" id="pills-event-tab" href="{{ url('/page_activitys') }}">ตารางกิจกรรม</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- news -->
    <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
        <div class="">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <div id="div_content_highlight_number" class="owl-carousel carousel-fav-course owl-theme">
                            <!-- photo highlight -->
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">

                        @php
                        $data_news_type = App\Models\News_type::orderByRaw("CASE
                        WHEN number_menu IS NOT NULL THEN 1
                        ELSE 2
                        END,
                        number_menu ASC,
                        id DESC")
                        ->get();
                        @endphp

                        <div class="owl-carousel carousel-menu-course owl-theme">
                            <div class="item " onclick="get_data_news('all');">
                                <div id="item_type_news_all" class="item_type_news menu-course text-center active">
                                    <p class="mb-0">ทั้งหมด</p>
                                </div>
                            </div>
                            @foreach($data_news_type as $item_type)
                            <div class="item" onclick="get_data_news('{{ $item_type->id }}');">
                                <div id="item_type_news_{{ $item_type->id }}" class="item_type_news menu-course text-center">
                                    <p class="mb-0">{{ $item_type->name_type }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div id="content_list_item_news" class="container-course mt-3">
                            <!-- data list_item_news -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        change_active_menu_theme_user('News');
        get_data_news('all');
    });

    function get_data_news(news_type_id) {

        let item_type_news = document.querySelectorAll('.item_type_news');
        item_type_news.forEach(item_type_news => {
            item_type_news.classList.remove('active');
        })

        document.querySelector('#item_type_news_' + news_type_id).classList.add('active');

        let div_content_highlight_number = document.querySelector('#div_content_highlight_number');
        div_content_highlight_number.innerHTML = "";
        let content_list_item_news = document.querySelector('#content_list_item_news');
        content_list_item_news.innerHTML = "";

        fetch("{{ url('/') }}/api/get_data_news/" + news_type_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if (result) {

                    let promises = result.map((item, i) => {
                        return new Promise((resolve, reject) => {
                            create_html_for_news(news_type_id, item);
                            resolve();
                        });
                    });

                    Promise.all(promises).then(() => {
                        // Destroy existing carousel instance if exists
                        $('.carousel-fav-course').trigger('destroy.owl.carousel');

                        // Initialize new carousel instance
                        $('.carousel-fav-course').owlCarousel({
                            loop: false,
                        margin: 10,
                        nav: false,
                        responsive: {
                            0: {
                                items: 1,
                                 autoWidth: false,

                            },
                            400: {
                                items: 1,
                                autoWidth: true,
                                
                            },
                            1000: {
                                items: 1,
                                autoWidth: true,
                                
                            }
                        }
                            // stagePadding:20,
                            // loop: false,
                            // autoWidth: true,
                            // margin: 10,
                            // nav: false,
                            // responsive: {
                            //     0: {
                            //         items: 1
                            //     },
                            //     600: {
                            //         items: 3
                            //     },
                            //     1000: {
                            //         items: 1
                            //     }
                            // }
                        });
                    });

                }
            });
    }

    function create_html_for_news(news_type_id, result) {

        // console.log(news_type_id);

        let div_content_highlight_number = document.querySelector('#div_content_highlight_number');
        // div_content_highlight_number.innerHTML = "";

        if (news_type_id == 'all') {
            // highlight_number ALL
            if (result.highlight_number) {

                let html_highlight_number = `
                    <a href="{{ url('/news_show') }}/` + result.id + `">
                        <div class="item">
                            <img src="` + result.photo_cover + `">
                        </div>
                    </a>
                `;

                div_content_highlight_number.insertAdjacentHTML('beforeend', html_highlight_number); // แทรกล่างสุด

            }
        } else {
            // highlight_of_type
            if (result.highlight_of_type) {
                // console.log(result.highlight_of_type);
                let html_highlight_number = `
                    <a href="{{ url('/news_show') }}/` + result.id + `">
                        <div class="item">
                            <img src="` + result.photo_cover + `">
                        </div>
                    </a>
                `;

                div_content_highlight_number.insertAdjacentHTML('beforeend', html_highlight_number); // แทรกล่างสุด

            }
        }

        let content_list_item_news = document.querySelector('#content_list_item_news');

        // Check bookmark
        let check_fav = ``;
        let user_id = "{{ Auth::user()->id }}";
        let user_fav_text = result.user_fav;
        // console.log(user_fav_text );

        if (user_fav_text) {
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
                            check_fav = 'bookmark-new';
                            break;
                        }
                    }
                }
            }
        }

        let textWithoutHtml = ``;
        if (result.detail) {
            textWithoutHtml = result.detail.replace(/(<([^>]+)>)/gi, "");
        }

        let html = `
            <a href="{{ url('/news_show') }}/` + result.id + `" class="course-item ` + check_fav + `">
                <img src="` + result.photo_cover + `">
                <div class="ms-3">
                    <p class="title-course">
                        ` + result.title + `
                    </p>
                    <p class="detail-course">
                        ` + textWithoutHtml + `
                    </p>
                    <div class="category-course">
                        <span>#` + result.name_type + `</span>
                    </div>
                </div>
                <div class="fav-course">
                    <svg width="17" height="22" viewBox="0 0 17 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.0002 0H1.07715C0.524864 0 0.0771484 0.447716 0.0771484 1V20.3889C0.0771484 21.1306 0.856276 21.6141 1.52095 21.285L8.09489 18.0293C8.37455 17.8908 8.70283 17.8908 8.98248 18.0293L15.5564 21.285C16.2211 21.6141 17.0002 21.1306 17.0002 20.3888V1C17.0002 0.447715 16.5525 0 16.0002 0Z" fill="#FFB600" />
                        <path d="M6.80604 7.04096L3.85769 7.45107L3.80547 7.46126C3.72641 7.4814 3.65435 7.5213 3.59663 7.57689C3.53891 7.63248 3.4976 7.70178 3.47692 7.7777C3.45625 7.85362 3.45694 7.93344 3.47894 8.00902C3.50094 8.0846 3.54345 8.15322 3.60213 8.20788L5.73807 10.2026L5.23436 13.0201L5.22835 13.0689C5.22351 13.1473 5.24049 13.2256 5.27754 13.2957C5.3146 13.3657 5.3704 13.4251 5.43923 13.4677C5.50807 13.5103 5.58746 13.5345 5.66928 13.538C5.75111 13.5415 5.83242 13.524 5.9049 13.4874L8.54178 12.1573L11.1727 13.4874L11.2189 13.5078C11.2951 13.5366 11.378 13.5455 11.4591 13.5334C11.5401 13.5214 11.6163 13.4888 11.6799 13.4392C11.7435 13.3896 11.7922 13.3246 11.8209 13.2509C11.8497 13.1773 11.8576 13.0976 11.8437 13.0201L11.3395 10.2026L13.4763 8.20744L13.5124 8.16975C13.5639 8.10891 13.5976 8.03606 13.6102 7.95862C13.6228 7.88118 13.6138 7.80193 13.5841 7.72893C13.5543 7.65593 13.505 7.5918 13.441 7.54307C13.377 7.49433 13.3007 7.46274 13.2199 7.45151L10.2715 7.04096L8.95354 4.47834C8.9154 4.40409 8.85636 4.34157 8.7831 4.29785C8.70984 4.25413 8.62529 4.23096 8.53901 4.23096C8.45273 4.23096 8.36818 4.25413 8.29492 4.29785C8.22166 4.34157 8.16262 4.40409 8.12448 4.47834L6.80604 7.04096Z" fill="#8C6400" />
                    </svg>
                </div>
            </a>
        `;

        content_list_item_news.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

    }
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>
<script>
    $('.carousel-fav-course').owlCarousel({
        // stagePadding:20,
        loop: false,
        autoWidth: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 1
            }
        }
    })

    $('.carousel-menu-course').owlCarousel({
        // stagePadding:20,
        loop: false,
        autoWidth: true,
        margin: 20,
        nav: false,
        dots: false,

        responsive: {
            0: {
                margin: 20,
                items: 6
            },
            600: {
                margin: 20,
                items: 3
            },
            1000: {
                margin: 40,
                items: 1
            }
        }
    })


    $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
        e.target // newly activated tab
        e.relatedTarget // previous active tab
        $(".owl-carousel").trigger('refresh.owl.carousel');
    });
</script>
@endsection