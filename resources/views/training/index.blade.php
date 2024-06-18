@extends('layouts.theme_user')

<style>
    /* .container-course{
        overflow: auto;
    } */

    /* @media screen and (max-width: 992px) {


        .container-course {
            overflow: auto;
            height: 435px;
        }
    }

    @media screen and (min-width: 992px) {} */

    .fav-course {
        width: 100%;
        flex-direction: row;
        display: flex;
        flex-wrap: wrap;
    }

    .long-item {
        /* aspect-ratio:  11/ 16; */
        /* width: 159px; */
        position: relative;
        width: 95%;
        height: 214px;
        background-color: #003781;
        color: #fff;
        margin: 5px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .long-item img {
        display: block;
        object-fit: contain;
        height: 100%;
        width: 100%;
    }

    .square-item img {
        display: block;
        object-fit: contain;
        height: 100%;
        width: 100%;
    }

    @media only screen and (min-width: 990px) and (max-width: 1200px) {
        /* .fav-course {
            scale: .83;
            margin-left: -30px;
        } */

        /* .all-coures {
            margin-top: -25px !important;
        } */
    }

    .square-item {
        /* aspect-ratio:  1/ 1; */
        /* width: 159px; */
        position: relative;
        width: 95%;
        height: 159px;
        background-color: #CADCFF;
        color: #003781;
        margin: 5px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .more-coures {
        min-width: 100%;
        display: flex;
        flex-wrap: wrap;
    }

    .more-coures .item {
        width: 50%;
        display: flex;
        flex-wrap: wrap;
        padding: 5px;
    }

    .more-coures .item div {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #CADCFF;
        color: #003781;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        padding: 5px;
    }

    .long-item .count-training {
        position: absolute;
        bottom: 15px;

    }

    .square-item .count-training {
        position: absolute;
        bottom: 10px;

    }
</style>
@section('content')
<div class="container p-0">
    <div class="main-body">
        <div class="row">
            <div class="mt-2">
                <h5 style="color: #003781; font-size: 18px; font-weight: bolder;">ยินดีต้อนรับเข้าสู่หลักสูตรการอบรม !</h5>
            </div>
            <div class="col-lg-5 container-course">
                <p style="color: #003781;">หมวดหมู่ของหลักสูตร</p>
                <div class="fav-course">
                    <div class="col-6">
                        <div class="w-100">
                            @if(!empty($photo_menu_highlight_1->id))
                            <a href="{{ url('/sub_training') . '/' . $photo_menu_highlight_1->id }}" class="long-item mt-3">
                                @else
                                <a href="{{ url('/sub_training/all') }}" class="long-item mt-3">
                                    @endif
                                    @if( !empty($photo_menu_highlight_1) )
                                    <img src="{{ $photo_menu_highlight_1->photo_menu }}">
                                    @else
                                    <div>
                                        <p style="font-size: 14px;margin-bottom: 2;">หลักสูตร</p>
                                        <p style="font-size: 18px;font-weight: bolder;margin-bottom: 0;">ทั้งหมด</p>
                                    </div>
                                    @endif
                                    <div class="count-training">
                                        @if(!empty($photo_menu_highlight_1->id))
                                        <span id="count_training_highlight_1" style="font-size: 24px;font-weight: bolder;color: #fff;"></span>
                                        @else
                                        <span style="font-size: 24px;font-weight: bolder;color: #fff;">{{ count($training) }}</span>
                                        @endif
                                        <span class="ms-1" style="color: #fff;">หลักสูตร</span>
                                    </div>
                                </a>
                                @if(!empty($photo_menu_highlight_2->id))
                                <a href="{{ url('/sub_training') . '/' . $photo_menu_highlight_2->id }}" class="square-item mt-3">
                                    @else
                                    <a href="{{ url('/sub_training/all') }}" class="square-item mt-3">
                                        @endif
                                        @if( !empty($photo_menu_highlight_2) )
                                        <img src="{{ $photo_menu_highlight_2->photo_menu }}">
                                        @else
                                        <div>
                                            <p style="font-size: 14px;margin-bottom: 2;">หลักสูตร</p>
                                            <p style="font-size: 18px;font-weight: bolder;margin-bottom: 0;">ทั้งหมด</p>
                                        </div>
                                        @endif
                                        <div class="count-training">
                                            @if(!empty($photo_menu_highlight_2->id))
                                            <span id="count_training_highlight_2" style="font-size: 24px;font-weight: bolder;color: #fff;"></span>
                                            @else
                                            <span style="font-size: 24px;font-weight: bolder;color: #fff;">{{ count($training) }}</span>
                                            @endif
                                            <span class="ms-1" style="color: #003781;">หลักสูตร</span>
                                        </div>
                                    </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="w-100">
                            @if(!empty($photo_menu_highlight_3->id))
                            <a href="{{ url('/sub_training') . '/' . $photo_menu_highlight_3->id }}" class="square-item mt-3">
                                @else
                                <a href="{{ url('/sub_training/all') }}" class="square-item mt-3">
                                    @endif
                                    @if( !empty($photo_menu_highlight_3) )
                                    <img src="{{ $photo_menu_highlight_3->photo_menu }}">
                                    @else
                                    <div>
                                        <p style="font-size: 14px;margin-bottom: 2;">หลักสูตร</p>
                                        <p style="font-size: 18px;font-weight: bolder;margin-bottom: 0;">ทั้งหมด</p>
                                    </div>
                                    @endif
                                    <div class="count-training">
                                        @if(!empty($photo_menu_highlight_3->id))
                                        <span id="count_training_highlight_3" style="font-size: 24px;font-weight: bolder;color: #fff;"></span>
                                        @else
                                        <span style="font-size: 24px;font-weight: bolder;color: #fff;">{{ count($training) }}</span>
                                        @endif
                                        <span class="ms-1" style="color: #003781;">หลักสูตร</span>
                                    </div>
                                </a>
                                @if(!empty($photo_menu_highlight_4->id))
                                <a href="{{ url('/sub_training') . '/' . $photo_menu_highlight_4->id }}" class="long-item mt-3">
                                    @else
                                    <a href="{{ url('/sub_training/all') }}" class="long-item mt-3">
                                        @endif
                                        @if( !empty($photo_menu_highlight_4) )
                                        <img src="{{ $photo_menu_highlight_4->photo_menu }}">
                                        @else
                                        <div>
                                            <p style="font-size: 14px;margin-bottom: 2;">หลักสูตร</p>
                                            <p style="font-size: 18px;font-weight: bolder;margin-bottom: 0;">ทั้งหมด</p>
                                        </div>
                                        @endif
                                        <div class="count-training">
                                            @if(!empty($photo_menu_highlight_4->id))
                                            <span id="count_training_highlight_4" style="font-size: 24px;font-weight: bolder;color: #fff;"></span>
                                            @else
                                            <span style="font-size: 24px;font-weight: bolder;color: #fff;">{{ count($training) }}</span>
                                            @endif
                                            <span class="ms-1" style="color: #fff;">หลักสูตร</span>
                                        </div>
                                    </a>
                        </div>
                    </div>
                </div>

                <script>
                    function get_count_training_highlight() {

                        for (let i = 1; i < 5; i++) {
                            fetch("{{ url('/') }}/api/get_count_training_highlight/" + i)
                                .then(response => response.text())
                                .then(result => {
                                    // console.log(i)
                                    // console.log(result);

                                    if (document.querySelector('#count_training_highlight_' + i)) {
                                        document.querySelector('#count_training_highlight_' + i).innerHTML = result;
                                    }
                                });
                        }

                    }
                </script>

                <style>
                    .all-coures {
                        position: relative;
                        background-color: #376AAF;
                        color: #fff;
                        margin-top: 10px;
                        border-radius: 10px;
                        -webkit-border-radius: 10px;
                        -moz-border-radius: 10px;
                        -ms-border-radius: 10px;
                        -o-border-radius: 10px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        padding: 20px;

                    }
                </style>
                <a href="{{ url('/sub_training/all') }}">
                    <div class="all-coures w-100 d-flex justify-content-evenly align-items-center">
                        <div>
                            <p style="font-size: 14px;margin-bottom: 0;">หลักสูตร</p>
                            <p style="font-size: 18px;font-weight: bolder;margin-bottom: 0;">ทั้งหมด</p>
                        </div>
                        <div>
                            <img src="{{ url('/img/icon/icon-all-training.png') }}" alt="" width="71">
                        </div>
                        <div>
                            <span style="font-size: 24px;font-weight: bolder;">{{ count($training) }}</span>
                            <span id style="font-size:14 px;">หลักสูตร</span>
                        </div>
                    </div>
                </a>
                <!-- <div class="more-coures">
                    <div class="item">
                        <div class="w-100">
                            <center>
                                <p style="font-size: 14px;color:#003781;font-weight: bold;text-align: center;">หลักสูตร</p>
                                <div class="d-flex ">
                                    <span style="color: #003781; font-size: 18px;font-weight: bolder;margin-right: 5px;">Blue<br>Star</span>
                                    <svg width="71" height="71" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.1514 21.7889C8.14382 23.6021 4.14005 24.507 3.18631 27.5701C2.23582 30.63 4.96359 33.8233 10.4224 40.2067L11.8351 41.8571C13.3845 43.6703 14.1625 44.5784 14.5108 45.6982C14.8591 46.8213 14.7419 48.0322 14.5075 50.4508L14.2927 52.6546C13.4692 61.1734 13.0558 65.4312 15.5492 67.3224C18.0426 69.2169 21.7924 67.4884 29.2857 64.0379L31.229 63.146C33.3578 62.1629 34.4222 61.6747 35.5517 61.6747C36.6812 61.6747 37.7457 62.1629 39.8777 63.146L41.8145 64.0379C49.311 67.4884 53.0609 69.2137 55.551 67.3257C58.0477 65.4311 57.6343 61.1734 56.8108 52.6546M60.6811 40.2067C66.1399 33.8266 68.8676 30.6332 67.9171 27.5701C66.9634 24.507 62.9596 23.5988 54.9521 21.7889L52.8819 21.3202C50.6065 20.8058 49.4705 20.5487 48.5558 19.8553C47.6444 19.162 47.0585 18.1106 45.8867 16.0077L44.819 14.0937C40.6948 6.69789 38.6343 3 35.5517 3C32.4691 3 30.4087 6.69789 26.2845 14.0937" stroke="#003781" stroke-width="5" stroke-linecap="round" />
                                        <path d="M25.8442 40.7148H21.499L27.1428 23.9876H32.5253L38.1691 40.7148H33.824L29.8953 28.2021H29.7646L25.8442 40.7148ZM25.2643 34.1317H34.3467V37.2028H25.2643V34.1317Z" fill="#003781" />
                                        <path d="M35.5859 50.8169V48.6138L43.3594 37.9575H35.5938V34.8169H48.25V37.02L40.4766 47.6763H48.2422V50.8169H35.5859Z" fill="#003781" />
                                    </svg>

                                </div>
                                <div class="mt-2">
                                    <span id="" style="font-size: 24px;font-weight: bolder;color: #003781;">15</span>
                                    <span class="ms-1" style="color: #003781;">หลักสูตร</span>
                                </div>
                            </center>
                        </div>

                    </div>
                    <div class="item">
                        <div class="w-100">
                            <center>
                                <p style="font-size: 14px;color:#003781;font-weight: bold;text-align: center;">หลักสูตร</p>
                                <div class="d-flex ">
                                    <span style="color: #003781; font-size: 18px;font-weight: bolder;margin-right: 5px;">Blue<br>Star</span>
                                    <svg width="71" height="71" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.1514 21.7889C8.14382 23.6021 4.14005 24.507 3.18631 27.5701C2.23582 30.63 4.96359 33.8233 10.4224 40.2067L11.8351 41.8571C13.3845 43.6703 14.1625 44.5784 14.5108 45.6982C14.8591 46.8213 14.7419 48.0322 14.5075 50.4508L14.2927 52.6546C13.4692 61.1734 13.0558 65.4312 15.5492 67.3224C18.0426 69.2169 21.7924 67.4884 29.2857 64.0379L31.229 63.146C33.3578 62.1629 34.4222 61.6747 35.5517 61.6747C36.6812 61.6747 37.7457 62.1629 39.8777 63.146L41.8145 64.0379C49.311 67.4884 53.0609 69.2137 55.551 67.3257C58.0477 65.4311 57.6343 61.1734 56.8108 52.6546M60.6811 40.2067C66.1399 33.8266 68.8676 30.6332 67.9171 27.5701C66.9634 24.507 62.9596 23.5988 54.9521 21.7889L52.8819 21.3202C50.6065 20.8058 49.4705 20.5487 48.5558 19.8553C47.6444 19.162 47.0585 18.1106 45.8867 16.0077L44.819 14.0937C40.6948 6.69789 38.6343 3 35.5517 3C32.4691 3 30.4087 6.69789 26.2845 14.0937" stroke="#003781" stroke-width="5" stroke-linecap="round" />
                                        <path d="M25.8442 40.7148H21.499L27.1428 23.9876H32.5253L38.1691 40.7148H33.824L29.8953 28.2021H29.7646L25.8442 40.7148ZM25.2643 34.1317H34.3467V37.2028H25.2643V34.1317Z" fill="#003781" />
                                        <path d="M35.5859 50.8169V48.6138L43.3594 37.9575H35.5938V34.8169H48.25V37.02L40.4766 47.6763H48.2422V50.8169H35.5859Z" fill="#003781" />
                                    </svg>

                                </div>
                                <div class="mt-2">
                                    <span id="" style="font-size: 24px;font-weight: bolder;color: #003781;">15</span>
                                    <span class="ms-1" style="color: #003781;">หลักสูตร</span>
                                </div>
                            </center>
                        </div>

                    </div>
                    <div class="item">
                        <div class="w-100">
                            <center>
                                <p style="font-size: 14px;color:#003781;font-weight: bold;text-align: center;">หลักสูตร</p>
                                <div class="d-flex ">
                                    <span style="color: #003781; font-size: 18px;font-weight: bolder;margin-right: 5px;">Blue<br>Star</span>
                                    <svg width="71" height="71" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.1514 21.7889C8.14382 23.6021 4.14005 24.507 3.18631 27.5701C2.23582 30.63 4.96359 33.8233 10.4224 40.2067L11.8351 41.8571C13.3845 43.6703 14.1625 44.5784 14.5108 45.6982C14.8591 46.8213 14.7419 48.0322 14.5075 50.4508L14.2927 52.6546C13.4692 61.1734 13.0558 65.4312 15.5492 67.3224C18.0426 69.2169 21.7924 67.4884 29.2857 64.0379L31.229 63.146C33.3578 62.1629 34.4222 61.6747 35.5517 61.6747C36.6812 61.6747 37.7457 62.1629 39.8777 63.146L41.8145 64.0379C49.311 67.4884 53.0609 69.2137 55.551 67.3257C58.0477 65.4311 57.6343 61.1734 56.8108 52.6546M60.6811 40.2067C66.1399 33.8266 68.8676 30.6332 67.9171 27.5701C66.9634 24.507 62.9596 23.5988 54.9521 21.7889L52.8819 21.3202C50.6065 20.8058 49.4705 20.5487 48.5558 19.8553C47.6444 19.162 47.0585 18.1106 45.8867 16.0077L44.819 14.0937C40.6948 6.69789 38.6343 3 35.5517 3C32.4691 3 30.4087 6.69789 26.2845 14.0937" stroke="#003781" stroke-width="5" stroke-linecap="round" />
                                        <path d="M25.8442 40.7148H21.499L27.1428 23.9876H32.5253L38.1691 40.7148H33.824L29.8953 28.2021H29.7646L25.8442 40.7148ZM25.2643 34.1317H34.3467V37.2028H25.2643V34.1317Z" fill="#003781" />
                                        <path d="M35.5859 50.8169V48.6138L43.3594 37.9575H35.5938V34.8169H48.25V37.02L40.4766 47.6763H48.2422V50.8169H35.5859Z" fill="#003781" />
                                    </svg>

                                </div>
                                <div class="mt-2">
                                    <span id="" style="font-size: 24px;font-weight: bolder;color: #003781;">15</span>
                                    <span class="ms-1" style="color: #003781;">หลักสูตร</span>
                                </div>
                            </center>
                        </div>

                    </div>
                    <div class="item">
                        <div class="w-100">
                            <center>
                                <p style="font-size: 14px;color:#003781;font-weight: bold;text-align: center;">หลักสูตร</p>
                                <div class="d-flex ">
                                    <span style="color: #003781; font-size: 18px;font-weight: bolder;margin-right: 5px;">Blue<br>Star</span>
                                    <svg width="71" height="71" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.1514 21.7889C8.14382 23.6021 4.14005 24.507 3.18631 27.5701C2.23582 30.63 4.96359 33.8233 10.4224 40.2067L11.8351 41.8571C13.3845 43.6703 14.1625 44.5784 14.5108 45.6982C14.8591 46.8213 14.7419 48.0322 14.5075 50.4508L14.2927 52.6546C13.4692 61.1734 13.0558 65.4312 15.5492 67.3224C18.0426 69.2169 21.7924 67.4884 29.2857 64.0379L31.229 63.146C33.3578 62.1629 34.4222 61.6747 35.5517 61.6747C36.6812 61.6747 37.7457 62.1629 39.8777 63.146L41.8145 64.0379C49.311 67.4884 53.0609 69.2137 55.551 67.3257C58.0477 65.4311 57.6343 61.1734 56.8108 52.6546M60.6811 40.2067C66.1399 33.8266 68.8676 30.6332 67.9171 27.5701C66.9634 24.507 62.9596 23.5988 54.9521 21.7889L52.8819 21.3202C50.6065 20.8058 49.4705 20.5487 48.5558 19.8553C47.6444 19.162 47.0585 18.1106 45.8867 16.0077L44.819 14.0937C40.6948 6.69789 38.6343 3 35.5517 3C32.4691 3 30.4087 6.69789 26.2845 14.0937" stroke="#003781" stroke-width="5" stroke-linecap="round" />
                                        <path d="M25.8442 40.7148H21.499L27.1428 23.9876H32.5253L38.1691 40.7148H33.824L29.8953 28.2021H29.7646L25.8442 40.7148ZM25.2643 34.1317H34.3467V37.2028H25.2643V34.1317Z" fill="#003781" />
                                        <path d="M35.5859 50.8169V48.6138L43.3594 37.9575H35.5938V34.8169H48.25V37.02L40.4766 47.6763H48.2422V50.8169H35.5859Z" fill="#003781" />
                                    </svg>

                                </div>
                                <div class="mt-2">
                                    <span id="" style="font-size: 24px;font-weight: bolder;color: #003781;">15</span>
                                    <span class="ms-1" style="color: #003781;">หลักสูตร</span>
                                </div>
                            </center>
                        </div>

                    </div>
                </div> -->
            </div>
            <style>
                .tabs {
                    display: flex;
                    position: relative;
                    background-color: #F4F4F4;
                    border: #DCE1E8 1px solid;
                    /* box-shadow: 0 0 1px 0 rgba(24, 94, 224, 0.15), 0 6px 12px 0 rgba(24, 94, 224, 0.15); */
                    padding: 0.2rem;
                    border-radius: 99px;
                    z-index:1;
                }

                .tabs * {
                    z-index: 2;
                }

                .container input[type="radio"] {
                    display: none;
                }

                .tab {
                    display: flex;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                    align-items: center;
                    justify-content: center;
                    height: 30px;
                    width: 100%;
                    font-size: .8rem;
                    color: #989898;
                    font-weight: 500;
                    border-radius: 99px;
                    cursor: pointer;
                    -webkit-transition: color 0.15s ease-in;
                    transition: color 0.15s ease-in;
                    font-weight: bolder;
                }

                /* .stroke-svg {
                    stroke: #989898;
                }
                .fill-svg {
                    fill: #989898;
                } */
                .container input[type="radio"]:checked+label {

                    color: #243287;

                }

                .container input[type="radio"]+label svg {
                    margin-left: -20px;
                    margin-right: 10px;
                }

                .container input[type="radio"]:checked+label svg .stroke-svg {
                    stroke: #003781;
                }

                .container input[type="radio"]:checked+label svg .fill-svg {
                    fill: #003781 !important;
                }

                .container input[id="radio-1"]:checked~.glider {
                    -webkit-transform: translateX(0);
                    -ms-transform: translateX(0);
                    transform: translateX(0);
                }

                .container input[id="radio-2"]:checked~.glider {
                    -webkit-transform: translateX(97%);
                    -ms-transform: translateX(97%);
                    transform: translateX(97%);
                }

                .glider {
                    position: absolute;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    height: 30px;
                    width: 50%;
                    background-color: #fff;
                    z-index: 1;
                    border-radius: 99px;
                    -webkit-transition: 0.25s ease-out;
                    transition: 0.25s ease-out;
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                    -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                    -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                }

                .btn-toggle-traning-appointment {
                    color: #989898 !important;
                    border: #E6E6E6 1px solid !important;
                    border-radius: 50px !important;
                    -webkit-border-radius: 50px !important;
                    -moz-border-radius: 50px !important;
                    -ms-border-radius: 50px !important;
                    -o-border-radius: 50px !important;
                    font-size: 12px !important;
                    padding: 6px 14px !important;
                }

                .btn-toggle-traning-appointment.active {
                    color: #fff !important;
                    background-color: #003781 !important;
                }
               
            </style>
            <div id="for_appointment" class="col-lg-7 mt-4" style="z-index: 5;position: relative;">
                <a href="#for_appointment" class="d-none" id="btn_a_div_for_appointment"></a>
                <div class="tabs" style="z-index: 5;">
                    <input type="radio" id="radio-1" name="tabs_traning_appointment" checked="">
                    <label class="tab" for="radio-1" onclick="show_schedule('อบรม')">
                        <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect class="stroke-svg" x="0.5" y="0.5" width="26" height="19" rx="2.5" fill="none" />
                            <rect class="fill-svg" x="6" y="23" width="15" height="1" rx="0.5" />
                            <rect class="fill-svg" x="5.63574" y="14.4985" width="14.7941" height="0.704481" rx="0.35224" />
                            <path class="fill-svg" d="M21.9062 7.98751L21.0126 7.09375C20.9829 7.06403 20.9476 7.04045 20.9088 7.02436C20.87 7.00828 20.8284 7 20.7863 7C20.7443 7 20.7027 7.00828 20.6639 7.02436C20.625 7.04045 20.5897 7.06403 20.56 7.09375L18.0938 9.56005C18.064 9.58966 18.0403 9.6249 18.0242 9.66373C18.0081 9.70256 17.9999 9.74421 18 9.78624V10.68C18 10.7649 18.0337 10.8463 18.0937 10.9063C18.1537 10.9663 18.2351 11 18.32 11H19.2138C19.2559 11.0001 19.2975 10.9919 19.3363 10.9758C19.3752 10.9597 19.4104 10.936 19.44 10.9062L21.9062 8.4401C21.936 8.41038 21.9595 8.3751 21.9756 8.33628C21.9917 8.29745 22 8.25583 22 8.21381C22 8.17178 21.9917 8.13016 21.9756 8.09133C21.9595 8.05251 21.936 8.01723 21.9062 7.98751ZM19.2138 10.68H18.32V9.78624L20.08 8.02631L20.9738 8.92008L19.2138 10.68ZM21.2 8.69369L20.3062 7.80012L20.7862 7.32014L21.68 8.21371L21.2 8.69369Z" />
                            <path class="fill-svg" d="M10.3128 14.6357H8.91505L12.0557 5.90847H13.577L16.7176 14.6357H15.3199L12.8525 7.4937H12.7844L10.3128 14.6357ZM10.5471 11.2181H15.0812V12.3261H10.5471V11.2181Z" />
                            <path class="fill-svg" d="M14.4174 12V11.2685L18.242 5.67188H14.3855V4.72727H19.5843V5.45881L15.7598 11.0554H19.6163V12H14.4174Z" />
                            <line class="stroke-svg" x1="10.5" y1="20" x2="10.5" y2="23" />
                            <line class="stroke-svg" x1="16.5" y1="20" x2="16.5" y2="23" />
                        </svg>
                        <span>ตารางอบรม</span>
                    </label>
                    <input type="radio" id="radio-2" name="tabs_traning_appointment">
                    <label class="tab" for="radio-2" onclick="show_schedule('สอบ')">
                        <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect class="stroke-svg" x="0.5" y="0.5" width="26" height="19" rx="2.5" fill="none" />
                            <rect class="fill-svg" x="6" y="23" width="15" height="1" rx="0.5" />
                            <rect class="fill-svg" x="5.63574" y="14.4985" width="14.7941" height="0.704481" rx="0.35224" />
                            <path class="fill-svg" d="M21.9062 7.98751L21.0126 7.09375C20.9829 7.06403 20.9476 7.04045 20.9088 7.02436C20.87 7.00828 20.8284 7 20.7863 7C20.7443 7 20.7027 7.00828 20.6639 7.02436C20.625 7.04045 20.5897 7.06403 20.56 7.09375L18.0938 9.56005C18.064 9.58966 18.0403 9.6249 18.0242 9.66373C18.0081 9.70256 17.9999 9.74421 18 9.78624V10.68C18 10.7649 18.0337 10.8463 18.0937 10.9063C18.1537 10.9663 18.2351 11 18.32 11H19.2138C19.2559 11.0001 19.2975 10.9919 19.3363 10.9758C19.3752 10.9597 19.4104 10.936 19.44 10.9062L21.9062 8.4401C21.936 8.41038 21.9595 8.3751 21.9756 8.33628C21.9917 8.29745 22 8.25583 22 8.21381C22 8.17178 21.9917 8.13016 21.9756 8.09133C21.9595 8.05251 21.936 8.01723 21.9062 7.98751ZM19.2138 10.68H18.32V9.78624L20.08 8.02631L20.9738 8.92008L19.2138 10.68ZM21.2 8.69369L20.3062 7.80012L20.7862 7.32014L21.68 8.21371L21.2 8.69369Z" />
                            <path class="fill-svg" d="M10.3128 14.6357H8.91505L12.0557 5.90847H13.577L16.7176 14.6357H15.3199L12.8525 7.4937H12.7844L10.3128 14.6357ZM10.5471 11.2181H15.0812V12.3261H10.5471V11.2181Z" />
                            <path class="fill-svg" d="M14.4174 12V11.2685L18.242 5.67188H14.3855V4.72727H19.5843V5.45881L15.7598 11.0554H19.6163V12H14.4174Z" />
                            <line class="stroke-svg" x1="10.5" y1="20" x2="10.5" y2="23" />
                            <line class="stroke-svg" x1="16.5" y1="20" x2="16.5" y2="23" />
                        </svg>
                        <span>ตารางสอบ</span>
                    </label>
                    <span class="glider"></span>
                </div>
                <div class="card py-4 px-2" style="margin-top: -15px;" id="content_training_schedule">
                    <div class="d-flex w-100 justify-content-between align-items-center my-3 px-2">
                        <a class=" m-0 p-0" onclick="goBack('อบรม');get_data_appointment_now('อบรม');">
                            <i class="fa-regular fa-chevron-left" style="font-size: 14px;color:#848CA1;"></i>
                        </a>

                        <span id="displayDate_appointment" style="font-size: 14px;color:#848CA1;"></span>

                        <a class=" m-0 p-0" onclick="goNext('อบรม');get_data_appointment_now('อบรม');">
                            <i class="fa-solid fa-chevron-right" style="font-size: 14px;color:#848CA1;"></i>
                        </a>
                    </div>
                    <div class="dropdown mx-2">
                        <!-- <button class="btn dropdown-toggle btn-toggle-traning-appointment active" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="document.querySelector('#dropdownMenuButton').classList.toggle('active')">
                            ทั้งหมด
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->

                        <!-- <button class="btn btn-toggle-traning-appointment">แนะนำ</button>
                        <button class="btn btn-toggle-traning-appointment">Blue Star</button>
                        <button class="btn btn-toggle-traning-appointment">Unit Links</button> -->

                   


                        <ul id="list_number_menu_of_appointment" class="nav nav-pills mb-3 d-flex justify-content-center dropdown show" role="tablist">
                            <li class="nav-item me-2 dropdown">

                                <a class="btn  dropdown-toggle nav-link btn-toggle-traning-appointment active" href="#" role="button" id="text_show_type_select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="document.querySelector('#dropdowntest').classList.add('show')">
                                    ทั้งหมด
                                </a>
                                <div class="dropdown-menu"  aria-labelledby="dropdownMenuLink" id="dropdowntest" >
                                    <!--  -->
                                </div>
                            </li>
                        </ul>
                        <script>
                            // ตารางอบรม
                            var now_view_training_type = 'all';

                            function get_data_appointment_now(type_appointment) {

                                let now_view_month = document.querySelector('#appointment_month');
                                let now_view_year = document.querySelector('#appointment_year');

                                // console.log(now_view_training_type);
                                // console.log(now_view_month.value);
                                // console.log(now_view_year.value);

                                fetch("{{ url('/') }}/api/get_data_appointment_now/" + now_view_training_type + "/" + now_view_month.value + "/" + now_view_year.value + "/" + type_appointment)
                                    .then(response => response.json())
                                    .then(result => {
                                        // console.log(result);

                                        if (result) {

                                            let content_appointment = document.querySelector('#content_appointment');
                                            content_appointment.innerHTML = '';

                                            let date_update = '';
                                            for (let i = 0; i < result.length; i++) {

                                                if (date_update != result[i].date_start) {
                                                    date_update = result[i].date_start;

                                                    let formatDate_show = formatDate(result[i].date_start);
                                                    let show_date = formatDate_show.split(',');

                                                    let html_datetime = `
                                <div class="d-flex w-100 align-items-center mt-3">
                                    <div class="name-date-appointment">` + show_date[0] + `</div>
                                    <div class="day-appointment">` + show_date[1] + `</div>
                                </div>
                            `;

                                                    content_appointment.insertAdjacentHTML('beforeend', html_datetime); // แทรกล่างสุด

                                                }


                                                let show_time = ``;
                                                if (result[i].time_start && result[i].time_end) {

                                                    let timeStart12 = formatTime24to12(result[i].time_start);
                                                    let timeEnd12 = formatTime24to12(result[i].time_end);

                                                    show_time = `
                                <p class="time-start">` + timeStart12 + `</p>
                                <p class="time-end">` + timeEnd12 + `</p>
                            `;
                                                } else if (result[i].time_start && !result[i].time_end) {
                                                    let timeStart12 = formatTime24to12(result[i].time_start);

                                                    show_time = `
                                <p class="time-start">` + timeStart12 + `</p>
                            `;
                                                } else if (!result[i].time_start && !result[i].time_end) {
                                                    show_time = `
                                <p class="time-start">All Day &nbsp;</p>
                            `;
                                                }

                                                let html = `
                            <div class="d-flex w-100 align-items-center mt-2">
                                <div>
                                    ` + show_time + `
                                </div>
                                <div class="content-appointment training-schedule">
                                    <div>
                                        <p class="title-appointment">` + result[i].title + `</p>
                                        <p class="detail-appointment">` + result[i].type_article + `</p>
                                    </div>
                                </div>
                            </div>
                        `;

                                                content_appointment.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                                            }

                                            document.querySelector('#btn_a_div_for_appointment').click();

                                        }

                                    });

                            }

                            function formatTime24to12(time24) {
                                const [hour, minute, second] = time24.split(':');
                                let hour12 = hour % 12 || 12; // Convert hour to 12-hour format, with 0 -> 12
                                let period = hour < 12 ? 'AM' : 'PM'; // Determine AM/PM
                                return `${hour12}:${minute} ${period}`;
                            }

                            function formatDate(dateString) {
                                // Create a new Date object from the dateString
                                const date = new Date(dateString);

                                // Create an options object to format the date
                                const options = {
                                    weekday: 'long',
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric'
                                };

                                // Format the date using Intl.DateTimeFormat
                                return new Intl.DateTimeFormat('en-UK', options).format(date);
                            }


                            function change_now_view_type(type_article, typemenu, text_type_article) {
                                document.querySelector('#dropdowntest').classList.remove('show');
                                now_view_training_type = type_article;

                                if (typemenu == 'menu_all') {
                                    document.querySelector('#text_show_type_select').innerHTML = text_type_article;
                                }

                                get_data_appointment_now('อบรม');
                            }

                            function get_list_number_menu_of_appointment() {
                                fetch("{{ url('/') }}/api/get_list_number_menu_of_appointment")
                                    .then(response => response.json())
                                    .then(result => {
                                        // console.log(result);
                                        if (result) {

                                            // 3 MENU
                                            let ul_list = document.querySelector('#list_number_menu_of_appointment');
                                            for (let i = 0; i < result['menu'].length; i++) {

                                                let type_article = result['menu'][i].type_article.replace("หลักสูตร", "");
                                                type_article = type_article.replace(" ", "");

                                                let html = `
                            <li class="nav-item me-2">
                                <a class="nav-link btn-toggle-traning-appointment" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" onclick="change_now_view_type('` + result['menu'][i].id + `', null, null)">` + type_article + `</a>
                            </li>
                        `;

                                                ul_list.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด
                                            }

                                            // Menu all
                                            let dropdowntest = document.querySelector('#dropdowntest');

                                            let html_item_all = `
                        <a class="dropdown-item" onclick="change_now_view_type('all','menu_all','ทั้งหมด')">
                            ทั้งหมด
                        </a>
                    `;

                                            dropdowntest.insertAdjacentHTML('beforeend', html_item_all); // แทรกล่างสุด

                                            for (let ii = 0; ii < result['all'].length; ii++) {

                                                let type_article_item = result['all'][ii].type_article.replace("หลักสูตร", "");
                                                type_article_item = type_article_item.replace(" ", "");

                                                let html_item = `
                            <a class="dropdown-item" onclick="change_now_view_type('` + result['menu'][ii].id + `','menu_all','` + type_article_item + `')">` + type_article_item + `</a>
                        `;

                                                dropdowntest.insertAdjacentHTML('beforeend', html_item); // แทรกล่างสุด
                                            }
                                        }
                                    });
                            }
                        </script>

                        <style>
                            .name-date-appointment {
                                font-size: 14px;
                                margin-right: 10px;
                                margin-bottom: 0;
                            }

                            .day-appointment {
                                font-size: 12px;
                                margin-bottom: 0;
                            }

                            .time-start {
                                font-size: 12px;
                                color: #646363;
                                margin: 0;
                            }

                            .time-end {
                                font-size: 12px;
                                color: #989898;
                                margin: 0;
                            }

                            .content-appointment {
                                position: relative;
                                margin-left: 20px;
                                padding: 10px;
                                color: #000;
                                display: flex;
                                align-items: center;
                                width: calc(100% - 80px);
                                border-radius: 0 10px 10px 0;
                                -webkit-border-radius: 0 10px 10px 0;
                                -moz-border-radius: 0 10px 10px 0;
                                -ms-border-radius: 0 10px 10px 0;
                                -o-border-radius: 0 10px 10px 0;
                            }

                            .content-appointment::after {
                                content: "";
                                height: 100%;
                                width: 10px;
                                position: absolute;
                                top: 50%;
                                left: 0px;
                                transform: translate(-50%, -50%);
                                border-radius: 50px;
                                -webkit-border-radius: 50px;
                                -moz-border-radius: 50px;
                                -ms-border-radius: 50px;
                                -o-border-radius: 50px;
                            }

                            .content-appointment.training-schedule::after {
                                background-color: #78CBE5;
                            }

                            .content-appointment.exam-schedule::after {
                                background-color: #FFBF44;
                            }

                            .content-appointment.training-schedule {
                                background-color: #D7F5FF;
                            }

                            .content-appointment.exam-schedule {
                                background-color: #FFF2BB;
                            }

                            .title-appointment {
                                font-size: 12px;
                                margin-bottom: 3px;
                                font-weight: bolder;
                            }

                            .detail-appointment {
                                font-size: 11px;
                                margin-bottom: 0;
                            }
                        </style>
                        <div id="content_appointment" class="appointment">
                            <!-- content_appointment -->
                        </div>
                    </div>
                </div>
                <style>
                    .btn-select-region {
                        position: relative;
                        background-color: #003781;
                        color: #fff;
                        border-radius: 50px;
                        -webkit-border-radius: 50px;
                        -moz-border-radius: 50px;
                        -ms-border-radius: 50px;
                        -o-border-radius: 50px;
                        width: 100%;
                        padding: 10px;
                    }

                    .btn-select-region:hover {
                        background-color: #003781;
                        color: #fff;
                    }

                    .btn-select-region .icon-arrow {
                        position: absolute;
                        top: 50%;
                        right: 0%;
                        transform: translate(-50%, -50%);
                        height: 18.2;
                    }

                    .btn-select-region i {
                        position: relative;
                        -webkit-transform: rotate(90deg);
                        transform: rotate(90deg);
                        transition: all .15s ease-in-out;
                    }

                    .btn-select-region.collapsed i {
                        -webkit-transform: rotate(0deg);
                        transform: rotate(0deg);
                        transition: all .15s ease-in-out;
                    }

                    #content_exam_schedule .collapse {
                        max-height: 350px;
                        overflow: auto;
                    }


                    #content_exam_schedule .collapse::-webkit-scrollbar-track {
                        border-radius: 10px;
                        background-color: #E6E6E6;
                        -webkit-box-shadow: inset 0 0 6px rgb(230, 230, 230);
                    }

                    #content_exam_schedule .collapse::-webkit-scrollbar {
                        width: 10px;
                        background-color: #E6E6E6;
                        border-radius: 10px;
                        right: 10px;
                    }

                    #content_exam_schedule .collapse::-webkit-scrollbar-thumb {
                        border-radius: 10px;
                        background-color: #989898;
                    }
                </style>
                <div id="content_exam_schedule" class="d-none">
                    <div class="card py-4 px-2" style="margin-top: -15px;z-index: 0;">

                        <h6 style="color: #243287;text-align: center;margin-top: 10px;">
                            <b>เลือกภูมิภาคที่ต้องการ</b>
                        </h6>
                        <div id="div_content_quiz_area">

                        </div>
                    </div>
                </div>

                <div class="card py-4 px-2 d-none" style="margin-top: -15px;z-index: 0;" id="content_training_exam">
                    <div class="d-flex w-100 justify-content-between align-items-center my-3 px-2">
                        <a class=" m-0 p-0" onclick="goBack('สอบ')">
                            <i class="fa-regular fa-chevron-left" style="font-size: 14px;color:#848CA1;"></i>
                        </a>

                        <span id="displayDate_exam" style="font-size: 14px;color:#848CA1;"></span>

                        <a class=" m-0 p-0" onclick="goNext('สอบ')">
                            <i class="fa-solid fa-chevron-right" style="font-size: 14px;color:#848CA1;"></i>
                        </a>
                    </div>
                    <div class="dropdown mx-2">
                        <div class="appointment">
                            <div class="d-flex w-100 align-items-center">
                                <div class="name-date-appointment">Wednesday</div>
                                <div class="day-appointment">25 April 2024</div>
                            </div>
                            <div class="d-flex w-100 align-items-center mt-2">
                                <div>
                                    <p class="time-start">16:00 pm</p>
                                    <p class="time-end">16:45 pm</p>
                                </div>
                                <div class="content-appointment training-schedule">
                                    <div>
                                        <p class="title-appointment">อบรมพนักงานใหม่</p>
                                        <p class="detail-appointment">หลักสูตร Star Blue</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex w-100 align-items-center mt-2">
                                <div>
                                    <p class="time-start">16:00 pm</p>
                                    <p class="time-end">16:45 pm</p>
                                </div>
                                <div class="content-appointment exam-schedule ">
                                    <div>
                                        <p class="title-appointment">อบรมพนักงานใหม่</p>
                                        <p class="detail-appointment">หลักสูตร Star Blue</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<input type="text" id="appointment_month" name="month" placeholder="MM" class="d-none">
<input type="text" id="appointment_year" name="year" placeholder="YYYY" class="d-none">

<input type="text" id="exam_month" name="month" placeholder="MM" class="d-none">
<input type="text" id="exam_year" name="year" placeholder="YYYY" class="d-none">
<script>
    document.addEventListener("DOMContentLoaded", function() {
        change_active_menu_theme_user('Training');
        get_count_training_highlight();
        get_list_number_menu_of_appointment();
        get_data_appointment_now('อบรม');
        create_list_quiz_area();
    });

    // ดึงข้อมูลวันที่ปัจจุบัน
    let today = new Date();
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    // ฟังก์ชั่นสำหรับอัปเดตการแสดงผล
    function updateDisplay(date) {
        const currentYear = date.getFullYear();
        const currentMonth = (date.getMonth() + 1).toString().padStart(2, '0'); // เดือนใน JavaScript นับจาก 0
        const monthName = monthNames[date.getMonth()];

        document.getElementById('appointment_month').value = currentMonth;
        document.getElementById('appointment_year').value = currentYear;
        document.getElementById('displayDate_appointment').textContent = `${monthName} ${currentYear}`;
    }
    function updateDisplayExam(date) {
        const currentYear = date.getFullYear();
        const currentMonth = (date.getMonth() + 1).toString().padStart(2, '0'); // เดือนใน JavaScript นับจาก 0
        const monthName = monthNames[date.getMonth()];

        document.getElementById('exam_month').value = currentMonth;
        document.getElementById('exam_year').value = currentYear;
        document.getElementById('displayDate_exam').textContent = `${monthName} ${currentYear}`;
    }
    // แสดงผลเดือนและปีปัจจุบันในแท็ก p ทันทีเมื่อโหลดหน้าเว็บ
    updateDisplay(today);
    updateDisplayExam(today);

    // ฟังก์ชั่นสำหรับปุ่ม ย้อนกลับ
    function goBack(type) {
        today.setMonth(today.getMonth() - 1);
        
        if (type == 'อบรม') {
            updateDisplay(today);
        } else {
            updateDisplayExam(today);
        }
    }

    // ฟังก์ชั่นสำหรับปุ่ม ถัดไป
    function goNext(type) {
        today.setMonth(today.getMonth() + 1);
        if (type == 'อบรม') {
            updateDisplay(today);
        } else {
            updateDisplayExam(today);
        }
    }
    function show_schedule(type) {
        if (type == 'อบรม') {
            document.querySelector('#content_training_schedule').classList.remove('d-none');
            document.querySelector('#content_exam_schedule').classList.add('d-none');
        document.querySelector('#content_training_exam').classList.add('d-none');

            document.querySelector('#btn_a_div_for_appointment').click();
        } else {
            document.querySelector('#content_training_schedule').classList.add('d-none');
            document.querySelector('#content_exam_schedule').classList.remove('d-none');
        document.querySelector('#content_training_exam').classList.add('d-none');

            document.querySelector('#btn_a_div_for_appointment').click();
        }
    }
    function create_list_quiz_area() {

        let div_content_quiz_area = document.querySelector('#div_content_quiz_area');
        div_content_quiz_area.innerHTML = '';

        fetch("{{ url('/') }}/api/get_list_quiz_area")
            .then(response => response.json())
            .then(result => {
                console.log(result);

                if (result) {

                    let update_area;
                    let update_round = 0;
                    for (let i = 0; i < result.length; i++) {

                        if (update_area != result[i].area) {
                            update_area = result[i].area;
                            update_round = update_round + 1;

                            let html = `

                                <div class="card mx-3">
                                    <a class="mb-0" onclick="goto_bottom()">
                                        <div  class="btn btn-select-region collapsed" data-toggle="collapse" data-target="#collapse_` + update_round + `" aria-expanded="true" aria-controls="collapse_` + update_round + `">
                                            ` + result[i].area + `
                                            <div class="icon-arrow">
                                                &nbsp;
                                                <i class="fa-solid fa-arrow-right "></i>
                                            </div>
                                        </div>
                                    </a>

                                    <div id="collapse_` + update_round + `" class="collapse" aria-labelledby="headingOne" data-parent="#div_content_quiz_area">
                                        <div id="div_content_collapse_` + update_round + `" class="card-body">
                                            <a class="d-block text-center my-2 cursor-pointer" onclick="show_content_appointment_quiz('` + result[i].id + `');">
                                                ` + result[i].sub_area + `
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            `;

                            div_content_quiz_area.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

                        } else {
                            let div_content_collapse = document.querySelector('#div_content_collapse_' + update_round);

                            let html_sub = `
                                <a class="d-block text-center my-2 cursor-pointer" onclick="show_content_appointment_quiz('` + result[i].id + `');">
                                    ` + result[i].sub_area + `
                                </a>
                            `;

                            div_content_collapse.insertAdjacentHTML('beforeend', html_sub); // แทรกล่างสุด
                        }

                    }
                }

            });

    }
    function goto_bottom(params) {
        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: 'smooth' // ทำให้การเลื่อนเป็นแบบนุ่มนวล
        });
    }
    function show_content_appointment_quiz(area_id) {
        console.log("Select ID >> " + area_id)

        document.querySelector('#content_training_schedule').classList.add('d-none');
        document.querySelector('#content_exam_schedule').classList.add('d-none');
        document.querySelector('#content_training_exam').classList.remove('d-none');

        // get_data_appointment_now_quiz(area_id);
    }

    // ตารางสอบ
    // function get_data_appointment_now_quiz(area_id){

    //     let now_view_month = document.querySelector('#appointment_month');
    //     let now_view_year = document.querySelector('#appointment_year');

    //     // console.log(now_view_month.value);
    //     // console.log(now_view_year.value);

    //     fetch("{{ url('/') }}/api/get_data_appointment_now_quiz/" + now_view_month.value + "/" + now_view_year.value + "/" + area_id)
    //         .then(response => response.json())
    //         .then(result => {
    //             // console.log(result);

    //             if(result){

    //                 let content_appointment = document.querySelector('#content_appointment');
    //                     content_appointment.innerHTML = '';

    //                 let date_update = '' ;
    //                 for (let i = 0; i < result.length; i++) {

    //                     if(date_update != result[i].date_start){
    //                         date_update = result[i].date_start;

    //                         let formatDate_show = formatDate(result[i].date_start);
    //                         let show_date = formatDate_show.split(',');

    //                         let html_datetime = `
    //                             <div class="d-flex w-100 align-items-center mt-3">
    //                                 <div class="name-date-appointment">`+show_date[0]+`</div>
    //                                 <div class="day-appointment">`+show_date[1]+`</div>
    //                             </div>
    //                         `;

    //                         content_appointment.insertAdjacentHTML('beforeend', html_datetime); // แทรกล่างสุด

    //                     }


    //                     let show_time = ``;
    //                     if( result[i].time_start && result[i].time_end ){

    //                         let timeStart12 = formatTime24to12(result[i].time_start);
    //                         let timeEnd12 = formatTime24to12(result[i].time_end);

    //                         show_time = `
    //                             <p class="time-start">`+timeStart12+`</p>
    //                             <p class="time-end">`+timeEnd12+`</p>
    //                         `;
    //                     }
    //                     else if(result[i].time_start && !result[i].time_end){
    //                         let timeStart12 = formatTime24to12(result[i].time_start);

    //                         show_time = `
    //                             <p class="time-start">`+timeStart12+`</p>
    //                         `;
    //                     }
    //                     else if(!result[i].time_start && !result[i].time_end){
    //                         show_time = `
    //                             <p class="time-start">All Day &nbsp;</p>
    //                         `;
    //                     }

    //                     let html = `
    //                         <div class="d-flex w-100 align-items-center mt-2">
    //                             <div>
    //                                 `+show_time+`
    //                             </div>
    //                             <div class="content-appointment training-schedule">
    //                                 <div>
    //                                     <p class="title-appointment">`+result[i].title+`</p>
    //                                     <p class="detail-appointment">`+result[i].type_article+`</p>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                     `;

    //                     content_appointment.insertAdjacentHTML('beforeend', html); // แทรกล่างสุด

    //                 }

    //                 document.querySelector('#btn_a_div_for_appointment').click();

    //             }

    //         });

    // }
</script>

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
@endsection