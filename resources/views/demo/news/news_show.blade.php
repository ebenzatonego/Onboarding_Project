@extends('layouts.theme_user')

@section('content')
<style>
    @media screen and (max-width: 500px) {

        .btn-share-group {
            padding: 24px;
        }
    }


    @media only screen and (max-width: 767px) {
        .title-news {
            padding-left: 24px;
        }

        .btn-share-group {
            padding: 24px;
        }

        .rating-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-right: 24px;
        }
    }


    @media screen and (min-width: 767px) {
        .btn-share-group {
            padding: 24px 0 24px 0;
        }

        .update_at {
            padding: 15px 0;
        }

        .rating-group {
            display: block;
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

    .btn-bookmark-news.active svg .bookmark-bg {
        fill: #EDB529;
    }

    .btn-bookmark-news.active svg .bookmark-icon {
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

    .update_at {
        color: #999;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
</style>
<div class="container p-0 conteiner-detail-news">
    <div class="row">
        <div class="col-lg-5 col-md-5 p-0" style="position: relative;">
            <button class="btn btn-back-all-course">
                <i class="fa-solid fa-arrow-left"></i>
                <span>กลับหน้ารวมหลักสูตร</span>
            </button>

            <img src="{{ url('/img/icon/ad2.png') }}" alt="" style="width: 100%;">
            <div class="d-flex justify-content-between">

                <div class="w-100 d-flex btn-share-group">
                    <button class="btn btn-like  me-1" onclick="action_btnlike_dislike(this.className)">
                        <div class="icon-btn d-flex">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="d-flex align-items-center ms-1">25</div>

                    </button>
                    <button class="btn btn-dislike me-1" onclick="action_btnlike_dislike(this.className)">
                        <div class="icon-btn">
                            <i class="fa-solid fa-thumbs-down"></i>
                        </div>
                    </button>
                    <button class="btn btn-share me-1">
                        <i class="fa-solid fa-share m-0"></i>
                    </button>
                </div>
                <div class=" px-2 py-0 d-flex align-items-start btn-bookmark-news cursor-pointer" onclick="action_btnlike_dislike(this.className)">
                    <svg width="33" height="42" viewBox="0 0 33 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="bookmark-bg" d="M31.3077 0H1C0.447715 0 0 0.447716 0 1V40.3889C0 41.1306 0.779123 41.6141 1.44379 41.285L15.71 34.2198C15.9897 34.0813 16.318 34.0813 16.5976 34.2198L30.8639 41.285C31.5286 41.6141 32.3077 41.1306 32.3077 40.3889V1C32.3077 0.447715 31.86 0 31.3077 0Z" fill="#CDCDCD" />
                        <path class="bookmark-icon" d="M12.8462 13.4417L7.21748 14.2246L7.11779 14.2441C6.96687 14.2825 6.82929 14.3587 6.7191 14.4648C6.6089 14.571 6.53004 14.7033 6.49057 14.8482C6.4511 14.9931 6.45243 15.1455 6.49442 15.2898C6.53642 15.4341 6.61757 15.5651 6.7296 15.6695L10.8073 19.4775L9.84567 24.8564L9.8342 24.9495C9.82496 25.0993 9.85737 25.2487 9.92811 25.3825C9.99885 25.5163 10.1054 25.6296 10.2368 25.7109C10.3682 25.7922 10.5198 25.8385 10.676 25.8451C10.8322 25.8518 10.9874 25.8184 11.1258 25.7486L16.1598 23.2093L21.1824 25.7486L21.2707 25.7875C21.4163 25.8425 21.5745 25.8594 21.7292 25.8364C21.8839 25.8134 22.0294 25.7513 22.1508 25.6565C22.2722 25.5618 22.3651 25.4377 22.4201 25.2971C22.475 25.1565 22.49 25.0044 22.4634 24.8564L21.5009 19.4775L25.5804 15.6686L25.6492 15.5967C25.7475 15.4805 25.812 15.3414 25.836 15.1936C25.86 15.0458 25.8428 14.8945 25.786 14.7551C25.7293 14.6157 25.635 14.4933 25.5129 14.4003C25.3907 14.3072 25.2451 14.2469 25.0907 14.2255L19.4621 13.4417L16.9459 8.54942C16.8731 8.40768 16.7604 8.28832 16.6205 8.20485C16.4807 8.12138 16.3193 8.07715 16.1546 8.07715C15.9898 8.07715 15.8284 8.12138 15.6886 8.20485C15.5487 8.28832 15.436 8.40768 15.3632 8.54942L12.8462 13.4417Z" fill="#FBFBFB" />
                    </svg>
                </div>
            </div>
            <div class="title-news">
                <div>
                    <p class="mb-2" style="color: #003781;font-size: 20px;font-style: normal;font-weight: 600;line-height: normal;">หลักสูตรการพัฒนาทักษะการขายเชิงกลยุทธ์ 505</p>
                </div>
                <div class="hastag-news">
                    <span>#หลักสูตร Unit Links</span>
                </div>
                <div class="rating-group">
                    <div class="rating-news mt-2 ">
                        <span style="color: #EDB529;font-size: 14px;font-style: normal;font-weight: 600;line-height: normal;margin-right: 5px;">4.5</span>
                        <i data-star="4.5" class="star-rating"></i>
                    </div>
                    <div class=" d-flex align-items-center">
                        <span class="update_at">Update : 30/05/2024 | 5.36 PM</span>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .hastag-news {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }

            .hastag-news span {
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

            .group-img {
                flex: 0 0 20%;
                max-width: 20%;
                position: relative;

                cursor: pointer;
            }

            .img-news {
                width: 100%;
                aspect-ratio: 1/1;
                object-fit: cover;
                filter: blur(1px) grayscale(100%);
            }

            .img-news.active {
                filter: blur(0) grayscale(0) !important;

            }

            .img-news.active+.icon-preview {
                display: none !important;

            }

            .preview-img {
                width: 100%;
            }

            .icon-preview {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: #fff !important;
                font-size: 33px;
                pointer-events: none;
                /* ปิดการใช้งาน hitbox */
            }
        </style>
        <div class="col-lg-7 col-md-7 px-4 mb-5">
            <!-- if ถ้ามีเวลาเข้าร่วม -->
            <div class="d-flex my-2">
                <i class="fa-light fa-calendar-days me-2" style="color: #0E2B81;font-size:18px"></i> <span style="color: #0E2B81;font-size: 12px;font-style: normal;font-weight: 600;line-height: normal;">Friday 19 April 2024 10:30 - 12:30 น. </span>
            </div>
            <!-- endif -->

            <!-- if ถ้ามี รายละเอียดการเข้าอบรม -->
            <div class="my-3">
                <div class="d-flex ">
                    <i class="fa-light fa-location-dot me-2"></i>
                    <div>
                        <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum magni reprehenderit, itaqu</p>
                        <a href="https://www.google.com/maps/dir//test" id="link-to-copy" style="color: #0872FF;font-size: 10px;font-style: normal;font-weight: 600;line-height: normal;text-decoration-line: underline;">https://www.google.com/maps/dir//test</a>
                        <i style="color: #9E9E9E;" class="fa-regular fa-copy mx-2" onclick="copyLink()"></i>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
            <!-- endif -->
            <div class="detail-news">
                <p class="mt-2">
                    การพัฒนาทักษะการขาย (Selling Skill) ให้กับนักขายมืออาชีพขั้นสูง จะช่วยทำให้พนักงานมีความมั่นใจในการขายสินค้าและบริการของตัวเองเพิ่มมากขึ้น เช่น.....     - การนำเสนอขายด้วยเครื่องมือในรูปแบบต่างๆ     - การเจรจาต่อรองอย่างเหนือชั้น     - การปิดการขายให้ลูกค้าเห็นคุณค่าด้วยตัวเอง การเรียนรู้ในรูปแบบ Blended Learning เชิงปฏิบัติการจริง ด้วยการฝึกฝนทักษะต่างๆ ด้วยตัวเอง ทำให้ผู้เรียน ได้ปรับปรุง แก้ไข แนวทางและเทคนิคการขายของตัวเองได้ทันที     - VDO (Self-Learning)     - Practices in Classroom     - Show & Share ซึ่งกันและกัน
                    รายละเอียดของหลักสูตรฝึกอบรมหลักการขายเชิงกลยุทธ์ (Strategic Selling) สนุกกับ คำสำคัญ ของงานขาย หัวใจสำคัญของการขายให้โดนใจ ทักษะพื้นฐานของการขาย คุณสมบัติของนักขายมืออาชีพ กิจกรรม: กำหนดแนวทางการขายเชิงกลยุทธ์ด้วย Canvasเทคนิคการนำเสนอด้วยเครื่องมือในรูปแบบต่างๆ (Presentation) การนำเสนอให้สอดคล้องคุณลักษณะของบุคคล (DISC) การนำเสนอด้วย Presentation Tools Kit การนำเสนอในรูปแบบ Pitching & Storytelling Role Playing: การฝึกฝนเทคนิคการนำเสนอให้โดนใจ เทคนิคการเจรจาต่อรองอย่างเหนือชั้น (Negotiation) หลักการเจรจาต่อรองอย่างมีคุณภาพ การกำหนดจุดประสงค์ให้ชัดเจน การประเมินทางเลือกของการเจรจา (BATNA) การบริหารจัดการให้การเจรจามีคุณภาพ (ZOPA) การเตรียมความพร้อมก่อนการเจรจาต่อรอง Role Playing: การฝึกฝนเทคนิคการเจรจาต่อรองอย่างสร้างสรรค์เทคนิคการปิดการขายให้ลูกค้าเห็นคุณค่า (Value Proposition)  
                </p>

                <img src="{{url('img/icon/preview-img2.png')}}" class="preview-img" alt="">
                <div class="row mb-3 row-cols-auto g-2 justify-content-start mt-3">
                    <div class="group-img ">
                        <img src="{{url('img/icon/preview-img.png')}}" class="img-news border rounded active" alt="">
                        <i class="fa-light fa-eye icon-preview"></i>
                    </div>
                    <div class="group-img">
                        <img src="{{url('img/icon/preview-img2.png')}}" class="img-news border rounded" alt="">
                        <i class="fa-light fa-eye icon-preview"></i>
                    </div>
                    <div class="group-img">
                        <img src="{{url('img/icon/preview-img2.png')}}" class="img-news border rounded" alt="">
                        <i class="fa-light fa-eye icon-preview"></i>
                    </div>
                    <div class="group-img">
                        <img src="{{url('img/icon/preview-img2.png')}}" class="img-news border rounded" alt="">
                        <i class="fa-light fa-eye icon-preview"></i>
                    </div>
                    <div class="group-img">
                        <img src="{{url('img/icon/preview-img2.png')}}" class="img-news border rounded" alt="">
                        <i class="fa-light fa-eye icon-preview"></i>
                    </div>
                    <div class="group-img">
                        <img src="{{url('img/icon/preview-img2.png')}}" class="img-news border rounded" alt="">
                        <i class="fa-light fa-eye icon-preview"></i>
                    </div>
                    <div class="group-img">
                        <img src="{{url('img/icon/preview-img2.png')}}" class="img-news border rounded" alt="">
                        <i class="fa-light fa-eye icon-preview"></i>
                    </div>
                    <div class="group-img">
                        <img src="{{url('img/icon/preview-img2.png')}}" class="img-news border rounded" alt="">
                        <i class="fa-light fa-eye icon-preview"></i>
                    </div>
                </div>

                <script>
                    const imgNewsElements = document.querySelectorAll('.img-news');

                    imgNewsElements.forEach(imgNews => {
                        imgNews.addEventListener('click', function handleClick() {
                            // Remove the 'active' class from all previously clicked images
                            imgNewsElements.forEach(otherImg => otherImg.classList.remove('active'));

                            // Add the 'active' class to the clicked image
                            this.classList.add('active');

                            // Update the 'src' attribute of the preview image
                            const previewImg = document.querySelector('.preview-img');
                            previewImg.src = this.src;
                        });
                    });
                </script>
                <div class="d-flex justify-content-end w-100" style="color: #989898;">
                    <i class="fa-regular fa-clock me-2"></i>
                    <span id="">30 นาที</span>
                </div>

                <div class="d-flex justify-content-center w-100 mt-0">
                    <video src="https://www.franchisebuilder2024.com/video/The%20Franchise%20Builder_Final.mp4" controls loop muted style="width:100%;border-radius: 10px; max-width: 700px;" class="video-preview mt-2"></video>
                </div>

                <div class="w-100 mt-3">
                    <p class="mb-0" style="color: #989898;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;">ถูกใจหลักสูตรนี้?</p>

                    <div class="d-flex justify-content-end ">
                        <button class="btn btn-like  me-1" onclick="action_btnlike_dislike(this.className)">
                            <div class="icon-btn d-flex">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </div>
                            <div class="d-flex align-items-center ms-1">25</div>

                        </button>
                        <button class="btn btn-dislike me-1" onclick="action_btnlike_dislike(this.className)">
                            <div class="icon-btn">
                                <i class="fa-solid fa-thumbs-down"></i>
                            </div>
                        </button>
                        <button class="btn btn-share me-1">
                            <i class="fa-solid fa-share m-0"></i>
                        </button>

                        <div class=" px-2 py-0 d-flex align-items-start btn-bookmark-news cursor-pointer" onclick="action_btnlike_dislike(this.className)">
                            <svg width="33" height="42" viewBox="0 0 33 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="bookmark-bg" d="M31.3077 0H1C0.447715 0 0 0.447716 0 1V40.3889C0 41.1306 0.779123 41.6141 1.44379 41.285L15.71 34.2198C15.9897 34.0813 16.318 34.0813 16.5976 34.2198L30.8639 41.285C31.5286 41.6141 32.3077 41.1306 32.3077 40.3889V1C32.3077 0.447715 31.86 0 31.3077 0Z" fill="#CDCDCD" />
                                <path class="bookmark-icon" d="M12.8462 13.4417L7.21748 14.2246L7.11779 14.2441C6.96687 14.2825 6.82929 14.3587 6.7191 14.4648C6.6089 14.571 6.53004 14.7033 6.49057 14.8482C6.4511 14.9931 6.45243 15.1455 6.49442 15.2898C6.53642 15.4341 6.61757 15.5651 6.7296 15.6695L10.8073 19.4775L9.84567 24.8564L9.8342 24.9495C9.82496 25.0993 9.85737 25.2487 9.92811 25.3825C9.99885 25.5163 10.1054 25.6296 10.2368 25.7109C10.3682 25.7922 10.5198 25.8385 10.676 25.8451C10.8322 25.8518 10.9874 25.8184 11.1258 25.7486L16.1598 23.2093L21.1824 25.7486L21.2707 25.7875C21.4163 25.8425 21.5745 25.8594 21.7292 25.8364C21.8839 25.8134 22.0294 25.7513 22.1508 25.6565C22.2722 25.5618 22.3651 25.4377 22.4201 25.2971C22.475 25.1565 22.49 25.0044 22.4634 24.8564L21.5009 19.4775L25.5804 15.6686L25.6492 15.5967C25.7475 15.4805 25.812 15.3414 25.836 15.1936C25.86 15.0458 25.8428 14.8945 25.786 14.7551C25.7293 14.6157 25.635 14.4933 25.5129 14.4003C25.3907 14.3072 25.2451 14.2469 25.0907 14.2255L19.4621 13.4417L16.9459 8.54942C16.8731 8.40768 16.7604 8.28832 16.6205 8.20485C16.4807 8.12138 16.3193 8.07715 16.1546 8.07715C15.9898 8.07715 15.8284 8.12138 15.6886 8.20485C15.5487 8.28832 15.436 8.40768 15.3632 8.54942L12.8462 13.4417Z" fill="#FBFBFB" />
                            </svg>
                        </div>

                    </div>
                    <div class="mt-5">
                        <a href="">
                            <i class="fa-solid fa-chevron-left"></i> กลับหน้ารวมหลักสูตร
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-vote-news {
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

    #rating_input .rating__input:checked~.rating__label .rating__icon--star {
        color: #ddd;
    }

    #rating_input .rating-group:hover .rating__label .rating__icon--star {
        color: orange;
    }

    #rating_input .rating__input:hover~.rating__label .rating__icon--star {
        color: #ddd;
    }

    .rating__text {
        color: #FFF;
        text-align: center;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .btn-vote-news {
        border-radius: 50px;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        -ms-border-radius: 50px;
        -o-border-radius: 50px;
        font-weight: bolder;
    }

    .btn-vote-news:disabled {
        background-color: #A3A3A3 !important;
        color: #57759C !important;
    }
</style>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rating">
  Launch demo modal
</button> -->
<div class="modal fade" id="rating" tabindex="-1" role="dialog" aria-labelledby="rating" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-vote-news">
            <p class="text-white text-center mb-5 font-20">ให้คะแนนผลิตภัณฑ์นี้</p>
            <div class="w-100 d-flex justify-content-center">

                <div id="rating_input">
                    <div class="rating-group">
                        <input disabled class="rating__input rating__input--none" name="rating" id="rating3-none" value="0" type="radio">

                        <label aria-label="1 star" class="rating__label" for="rating3-1">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text">1</p>
                            </div>
                        </label>
                        <input class="rating__input" checked name="rating" id="rating3-1" value="1" type="radio">

                        <label aria-label="2 stars" class="rating__label" for="rating3-2">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text">2</p>
                            </div>
                        </label>
                        <input class="rating__input" name="rating" id="rating3-2" value="2" type="radio">

                        <label aria-label="3 stars" class="rating__label" for="rating3-3">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text">3</p>
                            </div>
                        </label>
                        <input class="rating__input" name="rating" id="rating3-3" value="3" type="radio">

                        <label aria-label="4 stars" class="rating__label" for="rating3-4">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text">4</p>
                            </div>
                        </label>
                        <input class="rating__input" name="rating" id="rating3-4" value="4" type="radio">

                        <label aria-label="5 stars" class="rating__label" for="rating3-5">
                            <div>
                                <i class="rating__icon rating__icon--star fa-sharp fa-solid fa-star"></i>
                                <p class="rating__text">5</p>
                            </div>
                        </label>
                        <input class="rating__input" name="rating" id="rating3-5" value="5" type="radio">
                    </div>
                </div>

            </div>

            <div class="w-100 px-5 mt-3">
                <button class="btn w-100 bg-white btn-vote-news" data-dismiss="modal" aria-label="Close" onclick="getRating()">ให้คะแนน</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="dislike_news" tabindex="-1" role="dialog" aria-labelledby="rating" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-vote-news">
            <p class="text-white text-center mb-5 font-20">ให้เหตุผลที่ไม่ชอบผลิตภัณฑ์นี้</p>
            <div class="w-100 d-flex justify-content-center px-4 mb-2">
                <textarea class="form-control" id="reasons_dislike" placeholder="กรอกเหตุผลที่ไม่ชอบผลิตภัณฑ์นี้" rows="5" style="border-radius: 10px;" oninput="check_reasons_dislike()"></textarea>
            </div>

            <div class="w-100 px-4 mt-4">
                <button class="btn w-100 bg-white btn-vote-news" id="btn_submit_reasons_dislike" disabled onclick="submit_reasons_dislike();">ให้คะแนน</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCopySuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content mx-5" style="border-radius: 10px;border: 1px solid #D6D6D6;background: #FFF;box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.50);">
            <div class="modal-body text-center pt-4">
                <svg svg xmlns="http://www.w3.org/2000/svg" width="93" height="92" viewBox="0 0 93 92" fill="none">
                    <path d="M46.5 89.5692C52.3449 89.5767 58.1337 88.4475 63.5337 86.2466C68.9337 84.0457 73.8384 80.8164 77.9659 76.7444C82.1043 72.6832 85.3863 67.8572 87.6231 62.5439C89.8599 57.2306 91.0075 51.5348 91 45.7837C91.0074 40.0326 89.8598 34.3368 87.6229 29.0235C85.3861 23.7102 82.1042 18.8842 77.9659 14.8229C73.8384 10.7509 68.9337 7.52163 63.5337 5.32072C58.1337 3.11981 52.3449 1.99063 46.5 1.99808C40.6551 1.99075 34.8663 3.11998 29.4664 5.32089C24.0664 7.52179 19.1617 10.751 15.0341 14.8229C10.8957 18.8842 7.61387 23.7102 5.37705 29.0235C3.14024 34.3368 1.99259 40.0326 2.00004 45.7837C1.99246 51.5348 3.14006 57.2306 5.37688 62.5439C7.6137 67.8572 10.8956 72.6832 15.0341 76.7444C19.1617 80.8163 24.0664 84.0455 29.4664 86.2464C34.8663 88.4473 40.6551 89.5766 46.5 89.5692Z" stroke="#0E2B81" stroke-width="4" stroke-linejoin="round" />
                    <path d="M28.6992 45.7836L42.0492 58.9193L68.7492 32.6479" stroke="#0E2B81" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p style="color: #0E2B81;font-size: 16px;font-style: normal;font-weight: 600;line-height: normal;margin-top: 20px;">คัดลอกสำเร็จ !</p>
            </div>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<script>
    document.querySelectorAll('.star-rating').forEach(el => {
        const rating = parseFloat(el.getAttribute('data-star'));
        el.style.setProperty('--rating', (rating / 5) * 100 + '%');
        el.style.setProperty('--rating-width', `${(rating / 5) * 100}%`);
    });

    function action_btnlike_dislike(className) {

        if (className.includes('btn-like')) {
            // console.log('btn-like');
            document.querySelectorAll('.btn-like').forEach(function(element) {
                element.classList.toggle('active');
            });

            if (!className.includes('active')) {
                $('#rating').modal('show');
            }


        } else if (className.includes('btn-dislike')) {
            // console.log('btn-dislike');
            document.querySelectorAll('.btn-dislike').forEach(function(element) {
                element.classList.toggle('active');
            });

            if (!className.includes('active')) {
                $('#dislike_news').modal('show');
            }

        } else {
            document.querySelectorAll('.btn-bookmark-news').forEach(function(element) {
                element.classList.toggle('active');
            });
            document.querySelectorAll('.btn-bookmark').forEach(function(element) {
                element.classList.toggle('active');
            });
        }
    }
    //     document.querySelectorAll('.btn-like').forEach(function(button) {
    //     button.onclick = function() {
    //         // สิ่งที่ต้องการให้เกิดขึ้นเมื่อคลิกปุ่ม
    //         console.log('Button clicked!');
    //     };
    // });
    // document.addEventListener('DOMContentLoaded', function () {
    //     $('#rating').modal('show');
    // }) 

    function check_reasons_dislike() {
        let textarea = document.getElementById('reasons_dislike');

        if (textarea && textarea.value.trim()) {
            document.getElementById("btn_submit_reasons_dislike").disabled = false;

        } else {
            document.getElementById("btn_submit_reasons_dislike").disabled = true;

        }
    }

    function getRating() {
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        let selectedRating = 0;
        for (const input of ratingInputs) {
            if (input.checked) {
                selectedRating = input.value;
                break;
            }
        }

        alert(selectedRating);
    }

    function submit_reasons_dislike() {
        alert(
            document.querySelector('#reasons_dislike').value
        );
        $('#dislike_news').modal('hide');

    }

    function copyLink() {
        let link = document.getElementById('link-to-copy').href;
        let tempTextarea = document.createElement('textarea');
        tempTextarea.value = link;

        document.body.appendChild(tempTextarea);

        tempTextarea.select();

        document.execCommand('copy');

        document.body.removeChild(tempTextarea);

        $('#modalCopySuccess').modal('show');

        setTimeout(() => {
            $('#modalCopySuccess').modal('hide');

        }, 2000);
    }
</script>
@endsection