<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Franchise builder 2024</title>

    <!-- Favicons -->
    <link href="{{ url('/img/logo/logo-login.png') }}" rel="icon">
    <link href="{{ url('/img/logo/logo-login.png') }}" rel="apple-touch-icon">

    <!-- loader-->
    <link href="{{ asset('/theme/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('/theme/js/pace.min.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/theme/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('/theme/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/theme/css/icons.css') }}" rel="stylesheet">

    <!-- fontawesome icon -->
    <link href="https://kit-pro.fontawesome.com/releases/v6.2.1/css/pro.min.css" rel="stylesheet">

    <!--  OwlCarousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- font -->
    
    </head>
<style>
    video::-webkit-media-controls-timeline {
        display: none;
    }
    video::-webkit-media-controls-current-time-display,
    video::-webkit-media-controls-time-remaining-display {
        display: none;
    }

    body ,html{
        background-color: #fff !important;
    }

    #navbar-botttom {
        position: fixed !important;
        bottom: 0;
        text-align: center;
        left: 0;
        right: 0;
        background: #fff;
        border-radius: 10px 10px 0 0;
        -webkit-border-radius: 10px 10px 0 0;
        -moz-border-radius: 10px 10px 0 0;
        -ms-border-radius: 10px 10px 0 0;
        -o-border-radius: 10px 10px 0 0;
        z-index: 99999;
    }

    .col-navbar {
        padding-top: 10px;
        padding-right: 0px;
        padding-left: 0px;
        color: #616161;
    }

    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        /* margin-top: 5px; */
    }

    .text-truncate p {
        margin-bottom: 5px;
    }

    /* .calendar-btn {
        position: absolute;
        top: 25px;
        right: 10px;
        display: flex;
    }

    .calendar-btn div {
        background-color: #fff;
        padding: 5px;
        border-radius: 50px;
        font-size: 20px;
        width: 32px;
        height: 32px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .calendar-btn div:first-child {
        margin-right: 10px;
    } */

    .div-navbar-top {
        position: fixed;
        top: 0;
        /* left: 250px; */
        right: 0;
        height: 60px;
        background: #ffffff;
        border-bottom: 1px solid rgb(228 228 228 / 0%);
        background-clip: border-box;
        z-index: 10;
        box-shadow: 0 0.125rem 0.25rem rgb(136 152 170 / 15%);
    }

    .div-navbar-top .navbar {
        width: 100%;
        height: 60px;
        padding-left: 30px;
        padding-right: 30px;
    }

    .div-navbar-top .top-menu-left .nav-item .nav-link {
        padding-right: 0.5rem;
        padding-left: 0.5rem;
        color: #252323;
        font-size: 22px;
    }
    .div-navbar-top .navbar .navbar-nav .nav-link {
        padding-right: 0.8rem;
        padding-left: 0.8rem;
        color: #252323;
        font-size: 22px;
    }

    .div-navbar-botttom {
        border-top: 3px solid #616161;

    }

    .div-navbar-botttom .col-navbar a {
        color: #616161 !important;

    }

    .div-navbar-botttom .col-navbar i {
        font-size: 25px;
    }

    .div-navbar-botttom .col-navbar p {
        color: #616161 !important;
        font-size: 10px;
        text-overflow: unset;
        color: #fff;
        filter: none;
        font-weight: bolder;
    }

    .navbar-bottom-active {
        background-color: rgb(0, 55, 129, .20) !important;
        color: rgb(0, 55, 129) !important;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        max-width: 100px;
    min-width: 50px;
    }

    .navbar-bottom-active * {
        color: rgb(0, 55, 129) !important;
    }

    .text-color-obd{
        color: #0E2B81 !important;
    } @media only screen and (min-width: 744px){
         .div-navbar-botttom .col-navbar{
        max-width: 150px;
    }

    }
</style>
<header>
    <div class="w-100 div-navbar-top d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="top-menu-left">
                <!-- <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="app-emailbox.html"><i class="bx bx-envelope"></i></a>
                    </li>
                </ul> -->
                <div class="d-flex align-items-center">
                    <img src="{{ url('/img/logo/logo.png') }}" style="width:39px;height:37px">
                    <div class="ms-3 ">
                        <p class="m-0" style="font-size: 16;font-weight: bolder;">Allianz Journey</p>
                        <p class="m-0" style="font-size: 8px;">ALLIANZ ON-BOARDING WEB</p>
                    </div>
                </div>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class="bx bx-search"></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class="bx bx-x"></i></span>
                </div>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">	
                        <i class="fa-solid fa-magnifying-glass text-color-obd"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	
                        <i class="fa-regular fa-bookmark text-color-obd"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                        <span class="alert-count d-none"></span>
                        <i class="fa-regular fa-calendar text-color-obd"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                            <span class="alert-count"></span>
                            <i class="fa-regular fa-bell text-color-obd"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="container my-4">
    <div class="row">

        <div class="div-btn-back d-none">
            <!-- <button type="button" class="btn btn-sm btn-back  mt-3" onclick="goBack();">
            <i class="fa-solid fa-chevron-left"></i>
        </button> -->
            <a href="{{ url('/groups') }}" class="btn btn-sm btn-back  mt-3">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </div>

        <!-- <div class="col-12">
            <div class="text-center">
                <div class="col">
                    <img src="{{ url('/img/logo/logo-login.png') }}" id="header-text-login">
                </div>
            </div>
        </div> -->

        <div class="col-12 content-section mt-5 mb-5">
            <!-- <div class="calendar-btn">
                <div>
                    <i class="fa-solid fa-star" style="color: #e1bc1e;"></i>
                </div>
                <div>
                    <i class="fa-solid fa-calendar-days" style="color:#1d6de2;"></i>
                </div>
            </div> -->
            @yield('content')
        </div>
    </div>
</div>


<div id="navbar-botttom" class="container" style="z-index: 99998;">
    <div class="row justify-content-center mx-2 div-navbar-botttom">
        <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
            <div class=" mx-2 pt-2 pb-1 mb-2">
                <a href="{{ url('/home') }}">
                    <i class="fa-regular fa-graduation-cap fa-flip-horizontal"></i>
                    <p class="text-truncate mt-1 mb-0">
                        Training
                    </p>
                </a>
            </div>
        </div>

        <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
            <div class=" mx-2 pt-2 pb-1 mb-2">
                <a href="{{ url('/trainning') }}" class="">
                    <i class="fa-regular fa-clipboard-list"></i>
                    <p class="text-truncate mt-1 mb-0">
                        Product
                    </p>
                </a>
            </div>
        </div>
        <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
            <div class="navbar-bottom-active mx-2 pt-2 pb-1 mb-2">
                <a href="{{ url('/news') }}">
                    <i class="fa-regular fa-house"></i>
                    <p class="text-truncate mt-1 mb-0">
                        Home
                    </p>
                </a>
            </div>
        </div>
        <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
            <div class=" mx-2 pt-2 pb-1 mb-2">
                <a href="{{ url('/product') }}">
                    <i class="fa-regular fa-newspaper"></i>
                    <p class="text-truncate mt-1 mb-0">
                        News
                    </p>
                </a>
            </div>
        </div>
        <div class="col text-center text-truncate col-navbar d-flex justify-content-center">
            <div class=" mx-2 pt-2 pb-1 mb-2">
                <a href="{{ url('/product') }}">
                    <i class="fa-regular fa-wrench-simple fa-rotate-by" style="--fa-rotate-angle: 320deg;""></i>
                    <p class=" text-truncate mt-1 mb-0">
                        Career Path
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>


<div id="navbar-botttom" class="d-none" style="z-index: 9999999999999999;">
    <div class="container">
        <div class="row justify-content-evenly mx-2">
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/home') }}">
                    <i class="fa-solid fa-house text-white"></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Home
                    </p>
                </a>
            </div>

            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/trainning') }}">
                    <i class="fa-solid fa-books text-white""></i>
                    <p class=" text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Training
                        </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/trainning') }}">
                    <i class="fa-solid fa-passport text-white""></i>
                    <p class=" text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Company
                        </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/news') }}">
                    <i class="fa-solid fa-newspaper text-white""></i>
                    <p class=" text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        News
                        </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/product') }}">
                    <i class="fa-solid fa-layer-group text-white""></i>
                    <p class=" text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Product
                        </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/product') }}">
                    <i class="fa-solid fa-list-timeline text-white""></i>
                    <p class=" text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Career Path
                        </p>
                </a>
            </div>
            <!-- <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/product') }}">
                    <i class="fa-solid fa-calendar-days text-white""></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Calendar
                    </p>
                </a>
            </div> -->
            <!-- <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/profile') }}">
                    <i class="fa-solid fa-user text-white""></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Profile
                    </p>
                </a>
            </div> -->

        </div>
    </div>
</div>


<!-- เมนู 5 อัน วงกลม -->
<div id="navbar-botttom" style="z-index: 9999999999999999;" class="d-none">
    <div class="container">
        <div class="row justify-content-evenly mx-2">
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/trainning') }}">
                    <i class="fa-solid fa-books text-white""></i>
                    <p class=" text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Training
                        </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/trainning') }}">
                    <i class="fa-solid fa-passport text-white""></i>
                    <p class=" text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Company
                        </p>
                </a>
            </div>
            <div class=" text-center text-truncate col-navbar mheebar d-flex justify-content-center align-items-center" style=" width: 60px !important; height: 60px;margin-top: -12px;border: #fff 1px solid; background-color: #0495b5; border-radius: 50px;box-shadow: 0px 0px 30px 0px rgba(0,0,0,.05);">
                <a href="{{ url('/home') }}">
                    <i class="fa-solid fa-house text-white"></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Home
                    </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/news') }}">
                    <i class="fa-solid fa-newspaper text-white""></i>
                    <p class=" text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        News
                        </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/product') }}">
                    <i class="fa-solid fa-layer-group text-white""></i>
                    <p class=" text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Product
                        </p>
                </a>
            </div>

        </div>
    </div>
</div>

<!--app JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<!--notification js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


<script>
    $(".mobile-search-icon").on("click", function () {
		$(".search-bar").addClass("full-search-bar");
	});
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        // ตรวจสอบการเลื่อนตำแหน่ง
        check_current_rank();
    });

    function check_current_rank(){

        let current_rank = "{{ Auth::user()->current_rank }}" ;
        let last_rank = "{{ Auth::user()->last_rank }}" ;
        let check_video_congratulation = "{{ Auth::user()->check_video_congratulation }}" ;

        if(current_rank != last_rank && !check_video_congratulation){
            window.location.href = "{{ url('/show_video_congrats') }}?from="+"{{ url()->full() }}";
        }

    }
</script>