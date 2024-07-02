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
        margin-bottom: 5px;

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

    @media (max-width: 375px) {

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
    .detail-on-img {
        position: absolute;
        bottom: -8%;
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
</style>

<div class="tab-content container mt-2" id="pills-tabContent">
    <div class="d-flex justify-content-center m-0 p-0">
        <div class="col-md-6 col-12">
            <ul class="nav nav-pills w-100 d-flex justify-content-center w-100" id="pills-tab" role="tablist">
                <li class="nav-item px-1">
                    <a class="nav-link btn-filter-news" id="pills-news-tab" href="{{ url('/page_news') }}">ข่าวสาร/การแข่งขัน</a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link active btn-filter-news" id="pills-event-tab" data-toggle="pill" href="#pills-event" role="tab" aria-controls="pills-event" aria-selected="false">ตารางกิจกรรม</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- event -->
    <div class="tab-pane fade show active" id="pills-event" role="tabpanel" aria-labelledby="pills-event-tab">
        <div class="">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12 my-3">
                        <div id="div_content_highlight_number" class="owl-carousel carousel-fav-course owl-theme">
                            <!--  -->
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">

                        @php
                        $data_activity_type = App\Models\Activity_type::orderByRaw("CASE
                        WHEN number_menu IS NOT NULL THEN 1
                        ELSE 2
                        END,
                        number_menu ASC,
                        id DESC")
                        ->get();
                        @endphp

                        <div class="owl-carousel carousel-menu-course owl-theme">
                            <div class="item" onclick="get_data_activitys('all');">
                                <div id="item_type_event_all" class="item_type_event menu-course text-center active">
                                    <p class="mb-0">ทั้งหมด</p>
                                </div>
                            </div>
                            @foreach($data_activity_type as $item_type)
                            <div class="item" onclick="get_data_activitys('{{ $item_type->id }}');">
                                <div id="item_type_event_{{ $item_type->id }}" class="item_type_event menu-course text-center">
                                    <p class="mb-0">{{ $item_type->name_type }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="content_list_item_event" class="container-course mt-3">
                            <!--  -->
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
        get_data_activitys('all');
    });

    function get_data_activitys(activity_type_id) {

        let item_type_event = document.querySelectorAll('.item_type_event');
        item_type_event.forEach(item_type_event => {
            item_type_event.classList.remove('active');
        })

        document.querySelector('#item_type_event_' + activity_type_id).classList.add('active');

        let div_content_highlight_number = document.querySelector('#div_content_highlight_number');
        div_content_highlight_number.innerHTML = "";
        let content_list_item_event = document.querySelector('#content_list_item_event');
        content_list_item_event.innerHTML = "";

        fetch("{{ url('/') }}/api/get_data_activitys/" + activity_type_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                if (result) {

                    let promises = result.map((item, i) => {
                        return new Promise((resolve, reject) => {
                            // เช็คการแสดงผล show_all_member
                            if (item.show_all_member == 'Yes') {
                                create_html_for_activitys(activity_type_id, item);
                                resolve();
                            } else {
                                if (item.show_individual) {
                                    let account_user = "{{ Auth::user()->account }}";
                                    let text_show_individual = item.show_individual;

                                    let individualArray = text_show_individual.split(',');

                                    // ตรวจสอบว่ามี account_user อยู่ใน array หรือไม่
                                    let isUserInArray = individualArray.includes(account_user);

                                    // แสดงผล
                                    if (isUserInArray) {
                                        create_html_for_activitys(activity_type_id, item);
                                        resolve();
                                    } else {
                                        resolve();
                                    }
                                } else if (item.show_rank) {
                                    if (item.show_rank == "{{ Auth::user()->current_rank }}") {
                                        create_html_for_activitys(activity_type_id, item);
                                    }
                                    resolve();
                                } else {
                                    resolve();
                                }
                            }
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

    function create_html_for_activitys(activity_type_id, result) {

        // console.log(activity_type_id);

        let text_day = '';
        let day = '';
        let year_month = '';

        let time_start = ``;
        let html_time_start = ``;
        let html_item_time_start = ``;

        if (result.time_start) {
            let time_start_sp = result.time_start.split(':');
            time_start = time_start_sp[0] + ':' + time_start_sp[1];
            html_time_start = `
                <p class="m-0" style="font-size: 12px;">เริ่ม ` + time_start + ` น.</p>
            `;
            html_item_time_start = `
                <p>เริ่มเวลา ` + time_start + ` น.</p>
            `;
        }

        if (result.date_start) {
            let date = new Date(result.date_start);

            // หาและตั้งค่าวัน
            let days = ["วันอาทิตย์", "วันจันทร์", "วันอังคาร", "วันพุธ", "วันพฤหัสบดี", "วันศุกร์", "วันเสาร์"];
            text_day = days[date.getDay()];

            // ตั้งค่าวันที่
            day = date.getDate();

            // หาและตั้งค่าเดือนและปีในรูปแบบ พ.ศ.
            let months = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
            let month = months[date.getMonth()];
            let year = date.getFullYear() + 543; // แปลงจาก ค.ศ. เป็น พ.ศ.
            year_month = `${month} ${year}`;
        }

        let div_content_highlight_number = document.querySelector('#div_content_highlight_number');
        // div_content_highlight_number.innerHTML = "";

        if (activity_type_id == 'all') {
            // highlight_number ALL
            if (result.highlight_number) {

                let html_highlight_number = `
                    <div class="item">
                        <a href="{{ url('/activitys_show') }}/` + result.id + `" class="text-white">
                        <div class="position-relative">
                            <div class="container-img">
                                <img src="` + result.photo + `">
                            </div>
                            <div class="position-absolute detail-on-img w-100">
                                <div>
                                    <div class="d-flex align-items-center " style="margin-bottom: 10px;">
                                        <h1 class="m-0 text-white me-3" style="font-weight: bolder;">` + day + `</h1>
                                        <div>
                                            <p class="m-0">` + text_day + `</p>
                                            <p class="m-0">` + year_month + `</p>
                                        </div>
                                    </div>
                                    <p class="" style="margin-bottom: 10px;">` + result.title + `</p>
                                    ` + html_time_start + `
                                    <p class="m-0" style="font-size: 12px;">สถานที่ ` + result.location_detail + `</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                `;

                div_content_highlight_number.insertAdjacentHTML('beforeend', html_highlight_number); // แทรกล่างสุด

            }
        } else {
            // highlight_of_type
            if (result.highlight_of_type) {
                // console.log(result.highlight_of_type);
                let html_highlight_number = `
                    <div class="item">
                        <a href="{{ url('/activitys_show') }}/` + result.id + `" class="text-white">
                        <div class="position-relative">
                            <div class="container-img">
                                <img src="` + result.photo + `">
                            </div>
                            <div class="position-absolute detail-on-img w-100">
                                <div>
                                    <div class="d-flex align-items-center " style="margin-bottom: 10px;">
                                        <h1 class="m-0 text-white me-3" style="font-weight: bolder;">` + day + `</h1>
                                        <div>
                                            <p class="m-0">` + text_day + `</p>
                                            <p class="m-0">` + year_month + `</p>
                                        </div>
                                    </div>
                                    <p class="" style="margin-bottom: 10px;">` + result.title + `</p>
                                    ` + html_time_start + `
                                    <p class="m-0" style="font-size: 12px;">สถานที่ ` + result.location_detail + `</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                `;

                div_content_highlight_number.insertAdjacentHTML('beforeend', html_highlight_number); // แทรกล่างสุด

            }
        }

        let content_list_item_event = document.querySelector('#content_list_item_event');

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
                            check_fav = 'bookmark-event';
                            break;
                        }
                    }
                }
            }
        }

        let html = `
            <a href="{{ url('/activitys_show') }}/` + result.id + `" class="course-item ` + check_fav + ` text-white">
                <div style="position: relative;">
                    <img src="` + result.photo + `">

                    <div class="fav-event">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22" fill="none">
                            <path d="M15.1313 21.6111L7.74129 16.2135L0.344727 21.6111V0H15.1313V21.6111Z" fill="#E54141" />
                        </svg>
                    </div>
                </div>

                <div class="ms-3">
                    <p class="title-course" style="font-size: 16px;"><b>` + result.title + `</b></p>
                    <p class="detail-course" style="font-size: 16px;">` + text_day + ` ` + day + ` ` + year_month + `</p>
                    <div class="event-detail pt-2">
                        ` + html_item_time_start + `
                        <p>สถานที่ ` + result.location_detail + `</p>
                    </div>
                </div>
            </a>
        `;

        content_list_item_event.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

    }
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>
<script>
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