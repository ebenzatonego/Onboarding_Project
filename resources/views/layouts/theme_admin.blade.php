<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor1">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicons -->
    <link href="{{ url('/img/logo/LOGO (2).png') }}" rel="icon">
    <link href="{{ url('/img/logo/LOGO (2).png') }}" rel="apple-touch-icon">

	<!--plugins-->
	<link rel="stylesheet" href="{{ asset('/theme/plugins/notifications/css/lobibox.min.css') }}" />

	<link href="{{ asset('/theme/plugins/simplebar/css/simplebar.css') }}">
	<link href="{{ asset('/theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('/theme/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('/theme/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/theme/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('/theme/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('/theme/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('/theme/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('/theme/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/theme/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('/theme/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('/theme/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('/theme/css/header-colors.css') }}" />
    <!-- fontawesome icon -->
	<link href="https://kit-pro.fontawesome.com/releases/v6.2.1/css/pro.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Laila:wght@700&family=Mitr&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">

    <!-- fullcalendar -->
    <link href="{{ asset('/theme/plugins/fullcalendar/css/main.min.css') }}" rel="stylesheet" />

    <title>Admin - AGENCY JOURNEY</title>

</head>

<style>
    *:not(i) {
		font-family: 'Prompt', sans-serif !important;
	}

    .bg-menu-bar{
        background: linear-gradient(to right, #011644 , #0455AC , #0467CE , #94daff)!important;
    }
</style>

@php
    // PASSWORD FOR LOG MENU
    $pass_lock = "superadmin";
@endphp

<body>

    <!-- Button trigger modal -->
    <button type="button" id="btn_modal_pass_lock" class="d-none" data-toggle="modal" data-target="#modal_pass_lock"></button>
    <!-- Modal -->
    <div class="modal fade" id="modal_pass_lock" tabindex="-1" aria-labelledby="Labelmodal_pass_lock" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="position: relative;">
            <h5 class="modal-title" id="Labelmodal_pass_lock">กรุณาใส่รหัสผ่าน</h5>
            <button type="button" class="close btn float-end" data-dismiss="modal" aria-label="Close" style="position: absolute;top: 10%;right: 0%;">
                <i class="fa-sharp fa-solid fa-circle-xmark fa-2xl"></i>
            </button>
          </div>
          <div class="modal-body">
            <img src="{{ url('/img/icon/locked.png') }}" class="d-none" style="width:50px;">
            <input type="password" id="input_pass_lock_menu" class="form-control">
            <a id="link_go_to" class="d-none"></a>
          </div>
          <div class="modal-footer">
            <button id="cf_pass_lock" type="button" class="btn btn-primary">ยืนยัน</button>
          </div>
        </div>
      </div>
    </div>

    <div class="wrapper">

        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="has-arrow">
                <div class="sidebar-header toggle-icon">
                    <img id="img_logo_sidebar" src="{{ url('/img/logo/LOGO (2).png') }}" class="d-none" style="width:35px;">
                    <!-- <h6 style="font-size: 20px;" class="logo-text">The Franchise builder 2024</h6> -->

                    <div class="text-center mt-3 logo-text">
                        <img src="{{ url('/img/logo/LOGO (2).png') }}" style="width:15%;">
                        <p class="mt-1" style="margin-left: 5px;color: #fff;font-size: 12px;">
                            ALLIANZ ON-BOARDING WEB
                        </p>
                    </div>

                    <div class="ms-auto">
                        <i id="icon_hide_sidebar" class="fa-solid fa-angle-left text-white"></i>
                    </div>
                </div>
            </div>
            <ul class="metismenu" id="menu">

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-regular fa-bars-progress"></i>
                        </div>
                        <div class="menu-title">
                            การจัดการ
                        </div>
                    </a>
                    
                    <ul>
                        <li>
                            <!-- onclick="pass_lock_menu('{{ url("/manage_video_welcome_page") }}');" -->
                            <a class="btn" href="{{ url('/manage_video_welcome_page') }}">
                                <i class="fa-solid fa-photo-film-music"></i> Video Intro
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/manage_video_congrats') }}">
                                <i class="fa-solid fa-sparkles"></i> Video Congrats
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/manage_content_popups') }}">
                                <i class="fa-solid fa-megaphone"></i> Content Popup
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-duotone fa-users"></i>
                        </div>
                        <div class="menu-title">
                            สมาชิก
                        </div>
                    </a>
                    
                    <ul>
                        <li>
                            <a class="btn" href="{{ url('/index_user_excel') }}">
                                <i class="fa-solid fa-circle-plus"></i> เพิ่มสมาชิก
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/list_admin') }}">
                                <i class="fa-sharp fa-solid fa-user-tie"></i> Admin
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="#">
                                <i class="fa-solid fa-address-card"></i> Member
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="{{ url('/list_upper_al') }}">
                                <i class="fa-duotone fa-user-group"></i> Upper Al
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="#">
                                <i class="fa-solid fa-people-roof"></i> Group Manager
                            </a>
                        </li>
                        <li>
                            <a class="btn" href="#">
                                <i class="fa-solid fa-users-rectangle"></i> Area Supervisor
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow">
                        <div class="parent-icon">
                            <i class="fa-regular fa-chart-mixed"></i>
                        </div>
                        <div class="menu-title">
                            Training
                        </div>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <i class="bx bx-right-arrow-alt"></i>หลักสูตร
                            </a>
                            <ul class="mm-collapse">
                                <li>
                                    <a class="btn" href="{{ url('/manage_training') }}">
                                        <i class="fa-regular fa-chart-mixed"></i> จัดการหลักสูตร
                                    </a>
                                </li>
                                <li>
                                    <a class="btn" href="{{ url('/training_create') }}">
                                        <i class="fa-solid fa-file-plus"></i> เพิ่มข้อมูลหลักสูตร
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="javascript:;">
                                <i class="fa-regular fa-chart-mixed"></i> ตารางอบรม/สอบ
                            </a>
                            <ul class="mm-collapse">
                                <li>
                                    <a class="btn" href="#">
                                        <i class="fa-solid fa-file-plus"></i> เพิ่มข้อมูล
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="">
                        <div class="parent-icon">
                            <i class="fa-solid fa-passport"></i>
                        </div>
                        <div class="menu-title">
                            Company Profile
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/news/create') }}" class="">
                        <div class="parent-icon">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <div class="menu-title">
                            News
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#" class="">
                        <div class="parent-icon">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <div class="menu-title">
                            Product
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#" class="">
                        <div class="parent-icon">
                            <i class="fa-solid fa-list-timeline"></i>
                        </div>
                        <div class="menu-title">
                            Career Path
                        </div>
                    </a>
                </li>


            </ul>
        </div>

        <header>
            <div class="topbar d-flex align-items-center bg-menu-bar">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu">
                        <i class="fa-solid fa-angle-right text-white"></i>
                    </div>
                    <div class="top-menu-left d-none d-lg-block">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/welcome_admin')}}">
                                    <i class="fa-solid fa-house text-white"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="header-notifications-list">
                                        <!--  -->
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="header-message-list">
                                        <!--  -->
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/calendar_admin')}}">
                                    <i class="fa-solid fa-calendar-days text-white"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if( !empty(Auth::user()->photo) )
                                <img src="{{ Auth::user()->photo }}" class="user-img">
                            @else
                                <img src="{{ url('/img/icon/profile.png') }}" class="user-img">
                            @endif
                            <div class="user-info ps-3">
                                <p class="user-name mb-0" style="color: #ffffff!important;">
                                    @if( !empty(Auth::user()->name) )
                                        {{ Auth::user()->name }}
                                    @else
                                        Name User
                                    @endif
                                </p>
                            </div>
                            <div style="margin-left:10px ;">
                                <i class="fa-solid fa-bars text-white"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>

                                <a class="dropdown-item btn" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out-circle'></i>
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
  
    <!-- Bootstrap JS -->
    <script src="{{asset('/theme/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <!-- <script src="{{asset('/theme/js/jquery.min.js')}}"></script> -->
    @php
        $full_url = url()->full() ;
    @endphp

    @if( $full_url != url("/log_web") )
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @endif
    
    <script src="{{asset('/theme/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('/theme/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('/theme/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <!--app JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="{{asset('/theme/js/app.js')}}"></script>
    <!--notification js -->
    <script src="{{ asset('/theme/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('/theme/plugins/notifications/js/notifications.min.js') }}"></script>
	<script src="{{ asset('/theme/plugins/notifications/js/notification-custom-script.js') }}"></script>
    
    <link href="{{ asset('/theme/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <!-- fullcalendar -->
    <script src="{{ asset('/theme/plugins/fullcalendar/js/main.min.js') }}"></script>

    <script>
        
        function pass_lock_menu(link){

            if("{{ Auth::user()->id }}" == "1"){
                document.querySelector('#link_go_to').setAttribute("href", link);
                document.querySelector('#link_go_to').click();
            }
            
            document.querySelector('#btn_modal_pass_lock').click();
            // input_pass_lock_menu
            // cf_pass_lock

            document.getElementById("cf_pass_lock").addEventListener("click", function() {
                let input = document.querySelector('#input_pass_lock_menu').value;

                if(input == "{{ $pass_lock }}"){
                    document.querySelector('#link_go_to').setAttribute("href", link);
                    document.querySelector('#link_go_to').click();
                }else{
                    alert("รหัสไม่ถูกต้อง!");
                }
            });

        }

    </script>

    <!-- ----------------------------- firebase --------------------------------- -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
    <script>
        // Initialize Firebase
        var firebaseConfig = {
            apiKey: "AIzaSyDdaRHU9RfAmLP9NHVnwvbEqBThNbwfs14",
            authDomain: "test-storage-63113.firebaseapp.com",
            projectId: "test-storage-63113",
            storageBucket: "test-storage-63113.appspot.com",
            messagingSenderId: "886771711607",
            appId: "1:886771711607:web:6ce7ba6fb159414ba65072"
        };
        firebase.initializeApp(firebaseConfig);
      
        var storage = firebase.storage();
    </script>

    <script>
        
    function formatDate_for_firebase(date) {
        let day = String(date.getDate()).padStart(2, '0');
        let month = String(date.getMonth() + 1).padStart(2, '0'); // เดือนนับจาก 0, ต้องบวก 1
        let year = date.getFullYear();
        
        let hours = String(date.getHours()).padStart(2, '0');
        let minutes = String(date.getMinutes()).padStart(2, '0');
        
        return `${day}-${month}-${year}__${hours}:${minutes}`;
    }

    </script>

</body>

</html>
