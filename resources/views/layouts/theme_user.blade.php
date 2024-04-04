<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Franchise builder 2024</title>

    <!-- Favicons -->
    <!-- <link href="{{ url('/img/logo/Favicons.png') }}" rel="icon">
    <link href="{{ url('/img/logo/Favicons.png') }}" rel="apple-touch-icon"> -->

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
      body{
        background-image: url("{{ asset('img/bg/user.png') }}");
        background-size: cover;
    }
    #navbar-botttom {
        position: fixed !important;
        bottom: 0;
        text-align: center;
        left: 0;
        right: 0;
        background: rgb(3, 174, 209);
        background: linear-gradient(180deg, rgba(3, 174, 209, 1) 0%, rgba(7, 101, 129, 1) 31%, rgba(9, 42, 67, 1) 100%);
        z-index: 99999;
    } .mheebar {
        padding-top: 10px;
    }

    .col-navbar {
        padding-right: 0px;
        padding-left: 0px;
    }
    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        margin-top: 5px;
    }
    .text-truncate p {
        margin-bottom: 5px;
    }
    .calendar-btn{
        position: absolute;
        top: 25px;
        right: 10px;
        display: flex;
    }
    .calendar-btn div{
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
    .calendar-btn div:first-child{
       margin-right: 10px;
    }
</style>
<div class="background"></div>
<div class="container ">
    <div class="row">

        <div class="div-btn-back d-none">
            <!-- <button type="button" class="btn btn-sm btn-back  mt-3" onclick="goBack();">
            <i class="fa-solid fa-chevron-left"></i>
        </button> -->
            <a href="{{ url('/groups') }}" class="btn btn-sm btn-back  mt-3">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </div>

        <div class="col-12">
            <div class="text-center">
                <div class="col">
                    <img src="{{ url('/img/logo/logo-login.png') }}" id="header-text-login">
                </div>

                <!-- <div class="col d-none d-lg-block">
                <img src="{{ url('/img/logo/Favicons.png') }}" style="width: 20%" id="header-text-login">
            </div> -->
            </div>
        </div>

        <div class="col-12 content-section mb-5">
            <div class="calendar-btn">
                <div>
                    <i class="fa-solid fa-star" style="color: #e1bc1e;"></i>
                </div>
                <div>
                    <i class="fa-solid fa-calendar-days" style="color:#1d6de2;"></i>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>
<!-- เมนู 6 อัน ปรกติ -->

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
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Training
                    </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/trainning') }}">
                    <i class="fa-solid fa-passport text-white""></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Company
                    </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/news') }}">
                    <i class="fa-solid fa-newspaper text-white""></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        News
                    </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/product') }}">
                    <i class="fa-solid fa-layer-group text-white""></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Product
                    </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/product') }}">
                    <i class="fa-solid fa-list-timeline text-white""></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
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
<div id="navbar-botttom"  style="z-index: 9999999999999999;">
    <div class="container">
        <div class="row justify-content-evenly mx-2">
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/trainning') }}">
                    <i class="fa-solid fa-books text-white""></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Training
                    </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/trainning') }}">
                    <i class="fa-solid fa-passport text-white""></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
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
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        News
                    </p>
                </a>
            </div>
            <div class="col text-center text-truncate col-navbar mheebar">
                <a href="{{ url('/product') }}">
                    <i class="fa-solid fa-layer-group text-white""></i>
                    <p class="text-truncate" style="font-size: 11px; text-overflow: unset; color: #fff; filter: none;">
                        Product
                    </p>
                </a>
            </div>
           
        </div>
    </div>
</div>