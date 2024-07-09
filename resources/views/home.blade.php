@extends('layouts.theme_user')

@section('content')
    <style>
        .logo {
            position: relative;
            width: 97.5px;
            height: 90.75px;
            overflow: visible; /* Prevent cutting off the logo */
        }
        .logo path {
            transform-origin: center;
            animation: move 0.5s infinite alternate; /* Increase the speed */
        }
        .logo path:first-of-type {
            animation: move-left-down 0.5s infinite alternate;
        }
        .logo path:last-of-type {
            animation: move-right-up 0.5s infinite alternate;
        }
        @keyframes move-left-down {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(-20px, 20px);
            }
        }
        @keyframes move-right-up {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(20px, -20px);
            }
        }

        .loader {
          display: flex;
          justify-content: center;
        }

        .bar {
          width: 3.5px;
          height: 9px;
          margin: 0 9px;
          border-radius: 10px;
          animation: loading_5192 1s ease-in-out infinite;
          background-color: #243286;
        }

        .bar:nth-child(1) {
          animation-delay: 0.01s;
        }

        .bar:nth-child(2) {
          animation-delay: 0.09s;
        }

        .bar:nth-child(3) {
          animation-delay: 0.19s;
        }

        .bar:nth-child(4) {
          animation-delay: 0.29s;
        }

        @keyframes loading_5192 {
          0% {
            transform: scale(1);
          }

          20% {
            transform: scale(1, 2.5);
          }

          40% {
            transform: scale(1);
          }
        }

    </style>

    <div class="d-flex justify-content-center mt-5">
        <svg class="logo" xmlns="http://www.w3.org/2000/svg" width="97.5" height="90.75" viewBox="0 0 130 121" fill="none">
            <path d="M128.444 101.75L121.673 89.1863H115.033H108.328H52.0818C49.9987 89.1863 48.1108 88.0796 47.0692 86.3219C46.0276 84.5642 45.9625 82.3508 46.939 80.528L57.8757 60.3472H37.4996H30.7943H24.1542L1.82506 101.75C-0.323223 105.722 -0.193024 110.344 2.08546 114.184C4.55924 118.286 8.986 120.759 13.9336 120.759H116.335C121.283 120.759 125.709 118.286 128.183 114.184C130.462 110.344 130.527 105.722 128.444 101.75Z" fill="#243286"></path>
            <path d="M77.2092 7.03074C74.8656 2.66908 70.2435 0 65.1007 0C59.9578 0 55.3358 2.66908 52.9922 7.03074L30.4678 48.6944H37.1079H43.7481H67.6396C69.7227 48.6944 71.6106 49.8011 72.6522 51.5588C73.6938 53.3165 73.7589 55.5298 72.7824 57.3526L61.8457 77.5335H101.882H108.522H115.162L77.2092 7.03074Z" fill="#243286"></path>
        </svg>
    </div>
    <div class="loader mt-5">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

@endsection
